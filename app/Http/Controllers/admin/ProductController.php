<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Hsn;
use DB;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $hsn_id = $product->hsn_id;
            $hsn = Hsn::find($hsn_id);
            $hsn_code = $hsn->hsn_code;
            $product['hsn_code'] = $hsn_code;
            $tax = $hsn->tax;
            $product['tax'] = $tax;
        }
        return view('admin/product/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_no = "100";
        try{
        $product_no = Product::all()->last()->product_no;
        $product_no = $product_no+1;
         }
        catch (\Exception $e) {
        }
        $hsnes = Hsn::all();
        return view("admin/product/insert",compact("product_no","hsnes"));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'product_name' => 'bail|unique:client',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Product Already Exist');
        }
        $product  = new Product();
        $product->product_no = $request->product_no;
        $product->hsn_id = $request->hsn_code;
        $product->product_name = $request->name;
        $product->mrp = $request->mrp;
        $product->sales = $request->sales;
        $product->invoice_price = $request->invoice_price;
        if($product->save()){
            return back()->with("success","Product Added Sucessfully");
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
        $products = Product::all();
        $hsns = Hsn::all();
        foreach ($products as $product) {
            if($product->id == $id){
            $hsn_id = $product->hsn_id;
            $hsn = Hsn::find($hsn_id);
            $hsn_code = $hsn->hsn_code;
            $product['hsn_code'] = $hsn_code;
            $tax = $hsn->tax;
            $product['tax'] = $tax;
            return view('admin/product/edit', compact('product','id','hsns'));
        }
    }
    // return $product;
        
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
        // return $_POST;
        Product::where('id', $id)->update(array(
            'hsn_id' => $request->hsn_code,
            'product_name' => $request->name,
            'mrp' => $request->mrp,
            'sales' => $request->sales,
            'invoice_price' => $request->invoice_price,
        ));
        return redirect('product/')->with('success', 'Product has been  updated sucessfully');
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