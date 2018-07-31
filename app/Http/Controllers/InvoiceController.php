<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoices;
use App\Client;
use App\InvoicesPurchase;
use App\Product;
use App\Hsn;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_no = "1000";
        try{
        $bill_no = Invoices::all()->last()->invoice_number;
        $bill_no = $client_no+1;
         }
        catch (\Exception $e) {
        }
        $clients = Client::all();
        $products = Product::all();
        return view("invoice",compact("bill_no","clients","products"));
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
    public function ajax1(Request $request)
    {
        $client_details = Client::find($request->id);
        if($client_details == null){
            return "something is wrong";
        }
        return $client_details;
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajax2(Request $request)
    {
        $product_details = Product::find($request->id);
        if($product_details == null){
            return "something is wrong";
        }
            $all = Hsn::find($product_details->hsn_id);
            $product_details["hsn"] = $all->hsn_code; 
            return $product_details;
    }
         /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajax3(Request $request)
    {
        $products = Product::all();
        return view("raw",compact("products"));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $_POST;
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
