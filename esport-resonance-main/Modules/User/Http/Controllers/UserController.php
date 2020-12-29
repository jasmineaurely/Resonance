<?php

namespace Modules\User\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $title = "User Management";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('users');
        $crud->setSubject('User', 'Users');
        $crud->columns(['name', 'last_name', 'phone', 'role_id', 'email']);
        $crud->addFields(['email', 'name', 'last_name', 'phone', 'role_id', 'password']);
        $crud->editFields(['email', 'name', 'last_name', 'phone', 'role_id']);
        $crud->requiredFields(['email', 'name', 'last_name', 'phone', 'role_id']);
        $crud->setSkin('bootstrap-v4');
        $crud->setRelation('role_id', 'roles', 'name');
        $crud->displayAs([
            'role_id' => 'Role'
        ]);
        $crud->callbackAfterInsert(function ($s) {
            $user = User::find($s->insertId);
            $user->password = Hash::make($user->password);
            $user->created_at = now();
            $user->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
