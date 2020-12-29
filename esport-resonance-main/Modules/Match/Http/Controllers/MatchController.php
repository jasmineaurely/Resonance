<?php

namespace Modules\Match\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Modules\Match\Entities\Match;
use Modules\Match\Entities\MatchFinish;
use Modules\Match\Entities\MatchGroup;
use Modules\Match\Entities\MatchRound;
use Modules\Match\Entities\MatchStatus;

class MatchController extends Controller
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
    public function group()
    {
        $title = "Match Groups";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('match_groups');
        $crud->setSubject('Match Group', 'Match Groups');
        $crud->columns(['name']);
        $crud->fields(['name']);
        $crud->requiredFields(['name']);
        $crud->setSkin('bootstrap-v4');
        $crud->callbackAfterInsert(function ($s) {
            $data = MatchGroup::find($s->insertId);
            $data->created_at = now();
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function round()
    {
        $title = "Match Rounds";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('match_rounds');
        $crud->setSubject('Match Round', 'Match Rounds');
        $crud->columns(['name']);
        $crud->fields(['name']);
        $crud->requiredFields(['name']);
        $crud->setSkin('bootstrap-v4');
        $crud->callbackAfterInsert(function ($s) {
            $data = MatchRound::find($s->insertId);
            $data->created_at = now();
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function upcoming()
    {
        $title = "Upcoming Matches";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('matches');
        $crud->setSubject('Upcoming Match', 'Upcoming Matches');
        $crud->columns(['team_1', 'team_2', 'match_date', 'match_time', 'match_location', 'match_group_id', 'match_round_id']);
        $crud->addfields(['team_1', 'team_2', 'match_date', 'match_time', 'match_location', 'match_details', 'stadium', 'match_group_id', 'match_round_id', 'image']);
        $crud->editfields(['match_status_id', 'team_1', 'team_2', 'match_date', 'match_time', 'match_location', 'match_details', 'stadium', 'match_group_id', 'match_round_id', 'image']);
        $crud->requiredFields(['team_1', 'team_2', 'match_date', 'match_time', 'match_location', 'match_details', 'stadium', 'match_group_id', 'match_round_id', 'image']);
        $crud->setSkin('bootstrap-v4');
        $crud->setTexteditor(['match_details']);
        $crud->setRelation('team_1', 'teams', 'name');
        $crud->setRelation('team_2', 'teams', 'name');
        $crud->setRelation('match_group_id', 'match_groups', 'name');
        $crud->setRelation('match_round_id', 'match_rounds', 'name');
        $crud->setRelation('match_status_id', 'match_statuses', 'name');
        $crud->setFieldUpload('image', 'storage', '../../storage');
        $crud->callbackAfterInsert(function ($s) {
            $data = Match::find($s->insertId);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackBeforeInsert(function ($s) {
            $s->data['match_status_id'] = 1;
            return $s;
        });
        $crud->displayAs([
            'match_group_id' => 'Group',
            'match_round_id' => 'Round',
            'match_status_id' => 'Status'
        ]);
        $crud->where([
            'match_status_id' => 1
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function live()
    {
        $title = "Live Matches";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('matches');
        $crud->setSubject('Live Match', 'Live Matches');
        $crud->unsetAdd();
        $crud->columns(['team_1', 'team_2', 'score_team_1', 'score_team_2', 'score_additional_team_1', 'score_additional_team_2', 'match_date', 'match_time', 'match_location', 'match_group_id', 'match_round_id']);
        $crud->fields(['match_status_id', 'match_finish_id', 'score_team_1', 'score_team_2', 'score_additional_team_1', 'score_additional_team_2']);
        $crud->setSkin('bootstrap-v4');
        $crud->setRelation('team_1', 'teams', 'name');
        $crud->setRelation('team_2', 'teams', 'name');
        $crud->setRelation('match_group_id', 'match_groups', 'name');
        $crud->setRelation('match_round_id', 'match_rounds', 'name');
        $crud->setRelation('match_status_id', 'match_statuses', 'name');
        $crud->setRelation('match_finish_id', 'match_finishes', 'name');
        $crud->setFieldUpload('image', 'storage', '../../storage');
        $crud->displayAs([
            'match_group_id' => 'Group',
            'match_round_id' => 'Round',
            'score_additional_team_1' => 'Penalty Score Team 1',
            'score_additional_team_2' => 'Penalty Score Team 2',
            'match_status_id' => 'Status',
            'match_finish_id' => 'Finish'
        ]);
        $crud->where([
            'match_status_id' => 2
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function index()
    {
        $title = "Finished Matches";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('matches');
        $crud->setSubject('Finished Match', 'Finished Matches');
        $crud->unsetAdd()->unsetEdit();
        $crud->columns(['team_1', 'team_2', 'score_team_1', 'score_team_2', 'score_additional_team_1', 'score_additional_team_2', 'match_date', 'match_time', 'match_location', 'match_finish_id', 'match_group_id', 'match_round_id']);
        $crud->setSkin('bootstrap-v4');
        $crud->setRelation('team_1', 'teams', 'name');
        $crud->setRelation('team_2', 'teams', 'name');
        $crud->setRelation('match_group_id', 'match_groups', 'name');
        $crud->setRelation('match_round_id', 'match_rounds', 'name');
        $crud->setRelation('match_status_id', 'match_statuses', 'name');
        $crud->setRelation('match_finish_id', 'match_finishes', 'name');
        $crud->setFieldUpload('image', 'storage', '../../storage');
        $crud->displayAs([
            'match_group_id' => 'Group',
            'match_round_id' => 'Round',
            'score_additional_team_1' => 'Penalty Score Team 1',
            'score_additional_team_2' => 'Penalty Score Team 2',
            'match_status_id' => 'Status',
            'match_finish_id' => 'Finish'
        ]);
        $crud->where([
            'match_status_id' => 3
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
