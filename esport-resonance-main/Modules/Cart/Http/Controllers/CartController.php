<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\Auth;
use Modules\Cart\Entities\ProductPay;
use Modules\Cart\Entities\ProductPayMethod;
use Modules\Store\Entities\ProductCheckout;

class CartController extends Controller
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
        $title = "My Carts";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_checkouts');
        $crud->unsetAdd()->unsetEdit()->unsetDelete()->unsetDeleteMultiple();
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('My Carts', 'My Carts');
        // $crud->unsetColumns(['user_id', 'updated_at']);
        $crud->columns(['kode', 'updated_at', 'first_name', 'last_name', 'email', 'phone', 'country', 'city', 'zip', 'note', 'address', 'address_detail', 'company_name', 'jumlah', 'dibayar', 'created_at']);
        $crud->callbackColumn('dibayar', function ($value, $row) {
            if($value == 0){
                $t = "Belum Dibayar";
            }else{
                $t = "Sudah Dibayar";
            }
            return $t;
        });
        $crud->callbackColumn('jumlah', function ($value, $row) {
            return 'Rp'.number_format($value, 0, ',', '.');
        });
        $crud->callbackColumn('updated_at', function ($value, $row) {
            $d = ProductCheckout::findOrFail($row->id);
            if($d->dibayar == 0){
                return "<a href='".route('mycart.konfirmasi', $d->kode)."' class='btn btn-primary btn-sm btn-block'>Bayar</a>";
            }else{
                return "-";
            }
        });
        $crud->displayAs([
            'updated_at' => 'Pembayaran'
        ]);
        $crud->setActionButton('Products', 'fa fa-eye', function ($row) {
            $d = ProductCheckout::findOrFail($row->id);
            return route('mycart.products', $d->kode);
        }, true);
        $crud->where([
            'user_id' => Auth::id()
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function konfirmasi(ProductCheckout $productcheckout)
    {
        $methods = ProductPayMethod::all();
        $title = "Payment Confirmation : " . $productcheckout->kode;
        return view('cart::konfirmasi', compact('methods', 'title', 'productcheckout'));
    }

    public function konfirmasi_store(ProductCheckout $productcheckout, Request $request)
    {
        $file = "bukti-pembayaran-" . $request->user()->id . '-' . date('Ymd-Hi') . '-' . time() . '.' . $request->file('bukti')->extension();
        $request->file('bukti')->storeAs('public', $file);

        $d = new ProductPay();
        $d->note = $request->note;
        $d->product_pay_method_id = $request->product_pay_method_id;
        $d->user_id = Auth::id();
        $d->product_checkout_id = $productcheckout->id;
        $d->bukti = $file;
        $d->save();

        return redirect()->back()->with('success', 'Konfirmasi Pembayaran telah diterima. Mohon tunggu konfirmasi dari Admin.');
    }

    public function confirmation()
    {
        $title = "Payment Confirmation";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_pays');
        $crud->unsetAdd();
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('Payment Confirmation', 'Payment Confirmation');
        $crud->columns(['user_id', 'product_pay_method_id', 'note', 'bukti', 'is_paid']);
        $crud->editFields(['is_paid']);
        $crud->defaultOrdering('is_paid');
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->setRelation('product_pay_method_id', 'product_pay_methods', 'name');
        $crud->setFieldUpload('bukti', 'storage', '../storage');
        $crud->displayAs([
            'user_id' => 'Member',
            'product_pay_method_id' => 'Payment Method',
            'is_paid' => 'Status'
        ]);
        $crud->fieldType('is_paid', 'checkbox_boolean');
        $crud->callbackAfterUpdate(function ($s) {
            $d = ProductPay::find($s->primaryKeyValue);

            if($d->is_paid == 1){
                $d->product_checkout->update([
                    'dibayar' => 1
                ]);
            }

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function methods()
    {
        $title = "Payment Method";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_pay_methods');
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('Payment Method', 'Payment Method');
        $crud->columns(['name', 'note']);
        $crud->fields(['name', 'note']);
        $crud->requiredFields(['name', 'note']);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function admin()
    {
        $title = "Carts";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_checkouts');
        $crud->unsetAdd()->unsetEdit()->unsetDelete()->unsetDeleteMultiple();
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('Carts', 'Carts');
        $crud->unsetColumns(['updated_at']);
        $crud->callbackColumn('dibayar', function ($value, $row) {
            if($value == 0){
                $t = "Belum Dibayar";
            }else{
                $t = "Sudah Dibayar";
            }
            return $t;
        });
        $crud->callbackColumn('jumlah', function ($value, $row) {
            return 'Rp'.number_format($value, 0, ',', '.');
        });
        $crud->setActionButton('Products', 'fa fa-eye', function ($row) {
            $d = ProductCheckout::findOrFail($row->id);
            return route('mycart.adminproducts', $d->kode);
        }, true);
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->displayAs([
            'user_id' => 'Member'
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function products($kode)
    {
        $title = "My Carts";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_buys');
        $crud->unsetAdd()->unsetEdit()->unsetDelete()->unsetDeleteMultiple();
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('My Carts', 'My Carts');
        $crud->unsetColumns(['user_id', 'updated_at', 'kode', 'checkout']);
        $crud->callbackColumn('harga_satuan', function ($value, $row) {
            return 'Rp'.number_format($value, 0, ',', '.');
        });
        $crud->callbackColumn('harga_total', function ($value, $row) {
            return 'Rp'.number_format($value, 0, ',', '.');
        });
        $crud->where([
            'user_id' => Auth::id(),
            'kode' => $kode
        ]);
        $crud->setRelation('product_id', 'products', 'name');
        $crud->displayAs([
            'product_id' => 'Product'
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function adminproducts($kode)
    {
        $title = "My Carts";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_buys');
        $crud->unsetAdd()->unsetEdit()->unsetDelete()->unsetDeleteMultiple();
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('My Carts', 'My Carts');
        $crud->unsetColumns(['updated_at', 'kode', 'checkout']);
        $crud->callbackColumn('harga_satuan', function ($value, $row) {
            return 'Rp'.number_format($value, 0, ',', '.');
        });
        $crud->callbackColumn('harga_total', function ($value, $row) {
            return 'Rp'.number_format($value, 0, ',', '.');
        });
        $crud->where([
            'kode' => $kode
        ]);
        $crud->setRelation('product_id', 'products', 'name');
        $crud->displayAs([
            'user_id' => 'Member',
            'product_id' => 'Product'
        ]);
        $crud->setRelation('user_id', 'users', '{name} {last_name}');

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
