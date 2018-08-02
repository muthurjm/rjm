<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoices;
use App\Client;
use App\InvoicesPurchase;
use App\Product;
use App\Hsn;
use Validator;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_no = "1001";
        try{
        $bill_no = Invoices::all()->last()->invoice_number;
        $bill_no = $bill_no+1;
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
    {;
        $products = Product::find($request->id);
        return $products->stock;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
       return view("printinvoice");
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
             'invoice_number' => 'bail|required|unique:invoices',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Given Data Invalid');
        }
        $cgst_6 = $request->gst12/2;
        $cgst_9 = $request->gst18/2;
        $cgst_14 = $request->gst14/2;
        $client = new Invoices();
        $client->invoice_number = $request->invoice_number;
        $client->client_code = $request->client_code;
        $client->street = $request->street;
        $client->name = $request->name;
        $client->city = $request->city;
        $client->tin = $request->tin;
        $client->phone = $request->phone;
        $client->invoice_date = date("Y-m-d") ;
        $client->sub_total = $request->subtotal;
        $client->gst_18 = $request->gst18;
        $client->gst_12 = $request->gst12;
        $client->gst_28 = $request->gst28;
        $client->cgst_6 = $cgst_6;
        $client->cgst_9 = $cgst_9;
        $client->cgst_14 = $cgst_14;
        $client->sgst_6 = $cgst_6;
        $client->sgst_9 =  $cgst_9;
        $client->sgst_14 = $cgst_14;  
        $client->grand_total = $request->grandtotal;  
        $client->save();
        foreach($request->product_code as $keys => $sproduct_code){
            $purchaseproduct[$keys] = new InvoicesPurchase();
            if($sproduct_code != null &&  $request->quantity[$keys] != null){
            $purchaseproduct[$keys]->invoice_id = $client->id;
            $purchaseproduct[$keys]->product_code = $sproduct_code;
            $purchaseproduct[$keys]->hsn = $request->hsn[$keys];
            $purchaseproduct[$keys]->mrp = $request->mrp[$keys];
            $purchaseproduct[$keys]->product_name = $request->product[$keys];
            $purchaseproduct[$keys]->quantity = $request->quantity[$keys];
            $purchaseproduct[$keys]->price = $request->price[$keys];
            $purchaseproduct[$keys]->gst = $request->tax[$keys];
            $purchaseproduct[$keys]->amount = $request->amount[$keys];
                $product = Product::find($sproduct_code);
                Product::where('id',$sproduct_code)->update(array(
                    'stock' =>  $product->stock - $request->quantity[$keys],
                ));
                $purchaseproduct[$keys]->save();
            }
        }       
        return back()->with("success","Added Successfully");

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
