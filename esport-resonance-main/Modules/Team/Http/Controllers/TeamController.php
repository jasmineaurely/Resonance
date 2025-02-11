<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Match\Entities\MatchGroup;
use Modules\Team\Entities\Team;
use Modules\Team\Entities\TeamMember;

class TeamController extends Controller
{
    private function _getDatabaseConnection() {
        $databaseConnection = config('database.default');
        $databaseConfig = config('database.connections.' . $databaseConnection);


        return [
            'adapter' => [
                'driver' => 'Pdo_Mysql',
                'database' => $databaseConfig['database'],
                'username' => $databaseConfig['username'],
                'password' => $databaseConfig['password'],
                'charset' => 'utf8'
            ]
        ];
    }

    private function _getGroceryCrudEnterprise() {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        return $crud;
    }

    private function _show_output($output, $title = '') {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                  ->header('Content-Type', 'application/json')
                  ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;

        return view('grocery', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'title' => $title
        ]);
    }

    /**
     * Show the datagrid for customers
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Teams";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('teams');
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('Team', 'Teams');
        $crud->columns(['name', 'image', 'match_group_id', 'user_id']);
        $crud->fields(['name', 'image', 'match_group_id', 'user_id']);
        $crud->requiredFields(['name', 'image', 'match_group_id', 'user_id']);
        $crud->uniqueFields(['name']);
        $crud->setFieldUpload('image', 'storage', '../storage');
        $crud->displayAs([
            'user_id' => 'PIC',
            'match_group_id' => 'Tournament'
        ]);
        $crud->setRelation('user_id', 'users', '{name} {last_name} [{email} - {phone}]', ['role_id' => 2]);
        $crud->setRelation('match_group_id', 'match_groups', 'name', ['status_id' => 1]);
        $crud->uniqueFields(['user_id']);
        $crud->callbackAfterInsert(function ($s) {
            $data = Team::find($s->insertId);
            $data->created_at = now();
            $data->save();
            return $s;
        });
        $crud->callbackColumn('image', function ($value, $row) {
            return "<img src='". asset('storage/'. $value) ."' height='75'>";
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function member()
    {
        $title = "Team Members";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('team_members');
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('Team Member', 'Team Members');
        $crud->columns(['name', 'team_id']);
        $crud->fields(['name', 'team_id']);
        $crud->requiredFields(['name', 'team_id']);
        $crud->displayAs([
            'team_id' => 'Team'
        ]);
        $crud->setRelation('team_id', 'teams', 'name');
        $crud->callbackAfterInsert(function ($s) {
            $data = TeamMember::find($s->insertId);
            $data->created_at = now();
            $data->save();
            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function team()
    {
        $title = "Data Team";
        $team = Team::where('user_id', Auth::id())->first();
        $groups = MatchGroup::where('status_id', 1)->get();
        return view("team::index", compact('title', 'team', 'groups'));
    }

    public function simpan(Request $request)
    {

        if($request->has('hapus')){
            Team::where('user_id', Auth::id())->delete();
            return redirect()->route('team.team')->with('success', 'Team berhasil dihapus');
        }else{
            $request->validate([
                'name' => 'required|unique:teams,name',
                'image' => 'required|mimes:png,jpg,jpeg',
                'match_group_id' => 'required|numeric'
            ]);
        }

        if($request->hasFile('image')){
            $file = "logo-team--" . time() . '-' . Auth::id() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $file);
        }

        Team::updateOrCreate(
            ['user_id' => Auth::id()],
            ['name' => $request->name, 'image' => $file, 'match_group_id' => $request->match_group_id]
        );

        return redirect()->route('team.team')->with('success', 'Team berhasil diupdate');
    }
}
