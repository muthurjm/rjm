<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoices;
use App\Client;
use App\Product;
use App\InvoicesPurchase;
use DB;

class AdminInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = Invoices::orderBy('id', 'DESC')->get();
        foreach ($invoice as $invoices){
            $invoices["count"] = DB::table('invoices_purchase')->where("invoice_id", '=', $invoices->id)->count();
        }
        return view("admin/invoice/index",compact("invoice","products"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $invoice =  Invoices::find($id);
        $products =  InvoicesPurchase::all();
        return view("admin/invoice/view",compact("invoice","products"));     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoices::find($id);
        $clients = client::all();
        $products = Product::all();
        $invoicepurchases = InvoicesPurchase::all();
        return view('admin/invoice/edit', compact('clients','products','invoice','id','invoicepurchases'));
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
        $hsn = Invoices::find($id);
        if($hsn->delete()){
            return back()->with("success","Deleted Sucessfully");
        }
    }
}
