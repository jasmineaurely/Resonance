<?php

namespace Modules\News\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\Auth;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsCategory;

class NewsController extends Controller
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
    public function category()
    {
        $title = "News Categories";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('news_categories');
        $crud->setSubject('News Category', 'News Categories');
        $crud->columns(['name']);
        $crud->fields(['name']);
        $crud->setSkin('bootstrap-v4');
        $crud->uniqueFields(['name']);
        $crud->callbackAfterInsert(function ($s) {
            $data = NewsCategory::find($s->insertId);
            $data->slug = Str::slug($data->name);
            $data->save();
            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function index()
    {
        $title = "News";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('news');
        $crud->setSubject('News', 'News');
        $crud->columns(['title', 'news_category_id', 'user_id', 'created_at']);
        $crud->requiredFields(['title', 'content', 'tags', 'image', 'news_category_id']);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('image', 'storage', '../storage');
        $crud->unsetFields(['slug', 'user_id', 'created_at', 'updated_at']);
        $crud->setSkin('bootstrap-v4');
        $crud->uniqueFields(['title']);
        $crud->setRelation('news_category_id', 'news_categories', 'name');
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->displayAs([
            'user_id' => 'Author',
            'news_category_id' => 'Category'
        ]);
        $crud->callbackAfterInsert(function ($s) {
            $data = News::find($s->insertId);
            $data->slug = Str::slug($data->title);
            $data->created_at = now();
            $data->user_id = Auth::id();
            $data->save();
            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
