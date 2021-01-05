<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Modules\Store\Entities\ProductCategory;
use Illuminate\Support\Str;
use Modules\Store\Entities\Product;
use Modules\Store\Entities\ProductImage;

class StoreController extends Controller
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

    public function category()
    {
        $title = "Product Categories";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_categories');
        $crud->setSubject('Product Category', 'Product Categories');
        $crud->columns(['name']);
        $crud->fields(['name']);
        $crud->requiredFields(['name']);
        $crud->setSkin('bootstrap-v4');
        $crud->uniqueFields(['name']);
        $crud->callbackAfterInsert(function ($s) {
            $data = ProductCategory::find($s->insertId);
            $data->slug = Str::slug($data->name);
            $data->save();
            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function product_category(Product $product)
    {
        $title = "Product Categories of " . $product->name;
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_cats');
        $crud->setSubject('Product Category', 'Product Categories');
        $crud->columns(['product_category_id']);
        $crud->fields(['product_category_id']);
        $crud->requiredFields(['product_category_id']);
        $crud->setRelation('product_category_id', 'product_categories', 'name');
        $crud->setSkin('bootstrap-v4');
        $crud->where([
            'product_id' => $product->id
        ]);
        $crud->displayAs([
            'product_category_id' => 'Category'
        ]);
        $crud->callbackBeforeInsert(function ($s) use ($product) {
            $s->data['product_id'] = $product->id;
            return $s;
        });
        $crud->callbackAfterInsert(function ($s) {
            $data = ProductCategory::find($s->insertId);
            $data->save();
            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function product_image(Product $product)
    {
        $title = "Product Images of " . $product->name;
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_images');
        $crud->setSubject('Product Image', 'Product Images');
        $crud->columns(['image']);
        $crud->fields(['image']);
        $crud->requiredFields(['image']);
        $crud->setFieldUpload('image', 'storage', '../../../storage');
        $crud->setSkin('bootstrap-v4');
        $crud->where([
            'product_id' => $product->id
        ]);
        $crud->displayAs([
            'product_category_id' => 'Category'
        ]);
        $crud->callbackBeforeInsert(function ($s) use ($product) {
            $s->data['product_id'] = $product->id;
            return $s;
        });
        $crud->callbackAfterInsert(function ($s) {
            $data = ProductImage::find($s->insertId);
            $data->save();
            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function index()
    {
        $title = "Products";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('products');
        $crud->setSubject('Product', 'Products');
        $crud->columns(['name', 'sku', 'price', 'description', 'tags', 'thumbnail']);
        $crud->fields(['name', 'sku', 'price', 'description', 'tags', 'thumbnail']);
        $crud->requiredFields(['name', 'sku', 'price', 'description', 'tags', 'thumbnail']);
        $crud->setSkin('bootstrap-v4');
        $crud->uniqueFields(['name']);
        $crud->fieldType('price', 'numeric');
        $crud->setFieldUpload('thumbnail', 'storage', '../storage');
        $crud->setTexteditor(['description']);
        $crud->setActionButton('Categories', 'fa fa-list', function ($row) {
            return route('store.productcategory', $row->id);
        }, true);
        $crud->setActionButton('Images', 'fa fa-image', function ($row) {
            return route('store.productimage', $row->id);
        }, true);
        $crud->callbackAfterInsert(function ($s) {
            $data = Product::find($s->insertId);
            $data->slug = Str::slug($data->name);
            $data->save();
            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Product::find($s->primaryKeyValue);
            $data->slug = Str::slug($data->name);
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

}
