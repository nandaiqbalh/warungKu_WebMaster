<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayUser['listUser'] = Product::all();
        return view('product')->with($arrayUser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // die();

        // ini menghandle uploading image ke dalam database
        $fileName = '';
        if ($request->gambar->getClientOriginalName()) {
            // ubah spaci jadi gaada spasi
            $file = str_replace(' ', '', $request->gambar->getClientOriginalName());
            // get date                 supaya namanya ngga sama dikasih random
            $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
            $request->gambar->storeAs('public/product', $fileName);
        }

        $product = Product::create(array_merge($request->all(), [
            // informasi (request data)  berupa "image" kita ganti jadi fileName
            'gambar' => $fileName
        ]));

        return redirect('product');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
