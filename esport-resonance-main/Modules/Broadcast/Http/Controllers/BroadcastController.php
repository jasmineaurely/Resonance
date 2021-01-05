<?php

namespace Modules\Broadcast\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Modules\Broadcast\Entities\Broadcast;

class BroadcastController extends Controller
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
        $title = "Broadcasts";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('broadcasts');
        $crud->setSubject('Broadcast', 'Broadcasts');
        $crud->columns(['title', 'language', 'image', 'youtube']);
        $crud->fields(['title', 'language', 'image', 'youtube']);
        $crud->requiredFields(['title', 'language', 'image', 'youtube']);
        $crud->setSkin('bootstrap-v4');
        $crud->setFieldUpload('image', 'storage', '../storage');
        $crud->displayAs([
            'role_id' => 'Role',
            'youtube' => 'ID YouTube Video'
        ]);
        $crud->callbackColumn('youtube', function ($value, $row) {
            return "<a href='https://www.youtube.com/watch?v=$value' target='_blank'>$value</a>";
        });
        $crud->callbackColumn('image', function ($value, $row) {
            return "<img src='". asset('storage/'. $value) ."' height='75'>";
        });
        $crud->callbackAfterInsert(function ($s) {
            $data = Broadcast::find($s->insertId);
            $data->created_at = now();
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
