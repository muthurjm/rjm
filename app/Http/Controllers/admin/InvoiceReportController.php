<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;
use App\Client;
use App\InvoicesPurchase;
use App\Invoices;
use DB;

class InvoiceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Client::all();
        return view("admin/invoicereport/index",compact("reports"));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        // return $_POST;
        $data = $request->month;
        if($data[0] != null && $data[1] != null){
        $purchases = DB::table('invoices_purchase')
            ->whereBetween('date', [$data[0], $data[1]])
            ->where('category', 'LIKE', "%$data[2]%")
            ->where('client_id', 'LIKE', "%$data[3]%")
            ->orderBy('invoice_id', 'ASC')
            ->get();
        }
        else if($data[0] == null && $data[1] == null){
            $purchases = DB::table('invoices_purchase')
                ->where('category', 'LIKE', "%$data[2]%")
                ->where('client_id', 'LIKE', "%$data[3]%")
                ->orderBy('invoice_id', 'ASC')
                ->get();
            }
        foreach($purchases as $purchase){
            $id = $purchase->invoice_id;
            $invoice = Invoices::find($id);
            $purchase->number = $invoice->invoice_number;
            $purchase->name =  $invoice->name;
        }
        return $purchases;
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
