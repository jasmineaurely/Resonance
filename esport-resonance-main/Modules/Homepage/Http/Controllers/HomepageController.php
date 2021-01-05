<?php

namespace Modules\Homepage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Broadcast\Entities\Broadcast;
use Modules\Match\Entities\Match;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsCategory;
use Modules\Store\Entities\Product;
use Modules\Store\Entities\ProductBuy;
use Modules\Store\Entities\ProductCat;
use Modules\Store\Entities\ProductCategory;
use Modules\Store\Entities\ProductCheckout;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $latests = Match::where('match_status_id', 3)->get();
        $nexts = Match::where('match_status_id', 1)->latest()->take(1)->get();
        $slides = Match::latest()->take(3)->get();
        $new = News::latest()->first();
        return view('homepage::index', compact('latests', 'nexts', 'new', 'slides'));
    }

    public function news()
    {
        $new = News::latest()->first();
        $cats = NewsCategory::all();
        $news = News::latest()->get();
        return view('homepage::news.index', compact('new', 'cats', 'news'));
    }

    public function news_category(NewsCategory $newscategory)
    {
        $new = News::latest()->first();
        $cats = NewsCategory::all();
        $news = $newscategory->news;
        $cat_title = $newscategory->name;
        $title = $newscategory->name;
        return view('homepage::news.index', compact('new', 'cats', 'news', 'cat_title', 'title'));
    }

    public function news_read(News $news)
    {
        $new = News::latest()->first();
        $cats = NewsCategory::all();
        $cat_title = $news->news_category->name;
        $berita = News::latest()->take(4)->get();
        $title = $news->title;
        return view('homepage::news.detail', compact('new', 'cats', 'news', 'cat_title', 'berita', 'title'));
    }

    public function live()
    {
        $new = News::latest()->first();
        $data = Broadcast::latest()->take(3)->get();
        return view('homepage::broadcast', compact('new', 'data'));
    }

    public function schedule()
    {
        $new = News::latest()->first();
        $data = Match::where('match_status_id', 1)->latest()->get();
        return view('homepage::schedule', compact('new', 'data'));
    }

    public function belanja()
    {
        $new = News::latest()->first();
        $cats = ProductCategory::all();
        $products = Product::all();
        return view('homepage::store.index', compact('new', 'cats', 'products'));
    }

    public function belanja_category(ProductCategory $productcategory)
    {
        $new = News::latest()->first();
        $cats = ProductCategory::all();
        $products = ProductCat::where('product_category_id', $productcategory->id)->get();
        $title = $productcategory->name;
        return view('homepage::store.category', compact('new', 'cats', 'products', 'title'));
    }

    public function belanja_product(Product $product)
    {
        $new = News::latest()->first();
        $cats = ProductCategory::all();
        $title = $product->name;
        return view('homepage::store.product', compact('new', 'cats', 'title', 'product'));
    }

    public function belanja_beli(Request $request, Product $product)
    {
        $request->validate([
            'product_id' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);

        if(!$request->has('warna') or !$request->has('ukuran')){
            return redirect()->route('belanja_product', $product->slug)->with('error', 'Harus memilih Ukuran dan Warna terlebih dahulu!');
        }

        foreach($request->warna as $warna){
            foreach($request->ukuran as $ukuran){
                ProductBuy::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'harga_satuan' => $product->price,
                    'jumlah' => $request->qty,
                    'harga_total' => $product->price * $request->qty,
                    'warna' => $warna,
                    'ukuran' => $ukuran,
                ]);
            }
        }

        return redirect()->route('belanja_product', $product->slug)->with('success', 'Sudah masuk ke Cart');
    }

    public function cart()
    {
        $new = News::latest()->first();
        $carts = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->get();
        if($carts->count() < 1) return redirect()->route('belanja')->with('error', 'Cart masih kosong');
        return view("homepage::store.cart", compact('new', 'carts'));
    }

    public function cart_hapus($id)
    {
        $cek = ProductBuy::where('user_id', Auth::id())->where('id', $id)->delete();
        if($cek){
            return redirect()->route('cart')->with('success', 'Berhasil dihapus');
        }else{
            return redirect()->route('cart')->with('error', 'Gagal dihapus');
        }
    }

    public function cart_update(Request $request)
    {
        foreach($request->id as $i => $id){
            $data = ProductBuy::where('user_id', Auth::id())->where('id', $id)->first();
            $data->jumlah = $_POST['qty'][$i];
            $data->harga_total = $data->harga_satuan * $data->jumlah;
            $data->save();
        }

        return redirect()->route('cart')->with('success', 'Berhasil diupdate');
    }

    public function checkout()
    {
        $new = News::latest()->first();
        $carts = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->get();
        if($carts->count() < 1) return redirect()->route('belanja')->with('error', 'Cart masih kosong');
        return view("homepage::store.checkout", compact('new', 'carts'));
    }

    public function checkout_store(Request $request)
    {
        $kode = Str::random(30);

        $carts = ProductBuy::where('user_id', Auth::id())->where('checkout', 0)->get();
        $jumlah = 0;
        foreach($carts as $cart){
            $jumlah += $cart->harga_total;
            $cart->update([
                'kode' => $kode,
                'checkout' => 1
            ]);
        }

        ProductCheckout::create([
            'kode' => $kode,
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'note' => $request->note,
            'address' => $request->address,
            'address_detail' => $request->address_detail,
            'company_name' => $request->company_name,
            'jumlah' => $jumlah,
        ]);

        return redirect()->route('cart')->with('success', 'Berhasil checkout');
    }

}
