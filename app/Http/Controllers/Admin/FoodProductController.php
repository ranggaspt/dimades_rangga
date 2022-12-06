<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Mitra;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class FoodProductController extends ProductController implements ControllerInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('type','1')->orderBy('name','ASC')->paginate(10);
        $this->data['products'] = $products;
        return view('admin.food.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name','ASC')->get();
        $mitra = Mitra::orderBy('name','ASC')->get();
        $this->data['category'] = $category;
        $this->data['mitra'] = $mitra;
        return view('admin.food.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $params['type'] = '1';
        try {
            if ($product->create($params)) {
                Session::flash('success', 'Product has been updated');
            } else {
                Session::flash('error', 'Product could not be update');
            }
            return redirect()->route('food.index');
        } catch (\Throwable $th) {
            Session::flash('error', "Periksa Kembali Isian");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('name','ASC')->get();
        $mitra = Mitra::orderBy('name','ASC')->get();
        $product = Product::findOrFail(Crypt::decrypt($id));
        $this->data['category'] = $category;
        $this->data['mitra'] = $mitra;
        $this->data['data'] = $product;
        return view('admin.food.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $params['type'] = '1';
        try {
            $product = Product::findOrFail(Crypt::decrypt($id));
            if ($product->update($params)) {
                Session::flash('success', 'Product has been updated');
            } else {
                Session::flash('error', 'Product could not be update');
            }
            return redirect()->route('food.index');
        } catch (\Throwable $th) {
            Session::flash('error', "Periksa Kembali Isian");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail(Crypt::decrypt($id));
        if ($product->delete()) {
            Session::flash('success', 'Product has been deleted');
        }
        return redirect()->route('food.index');
    }
}
