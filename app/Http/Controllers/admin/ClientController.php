<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin/client/index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client_no = "1001";
        try{
        $client_no = Client::all()->last()->client_no;
        $client_no = $client_no+1;
         }
        catch (\Exception $e) {
        }
        return view("admin/client/insert",compact("client_no"));
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
            'name' => 'required|unique:client',
            'street' => 'nullable',
            'city' => 'required',
            'tin' => 'nullable|unique:client',
            'phone2' => 'nullable',
        ]);
        $k = 1;
               $clients = Client::all();
             foreach ($clients as $client) {
                $phone1 = $client->phone1;
                $phone2 = $client->phone2;
                if($phone1 == $request->phone1 || $phone2 == $request->phone2 || $phone2 == $request->phone1 || $phone1 == $request->phone2){
                    $k=0;
                }
            }
    
        if ($validator->fails() || $k = 0) {
           return back()->with('error','Given Data Invalid');
        }
        $client = new Client;
        $client->client_no = $request->client_no;
        $client->name = $request->name;
        $client->street = $request->street;
        $client->city = $request->city;
        $client->tin = $request->tin;
        $client->phone1 = $request->phone1;
        $client->phone2 = $request->phone2; 
        if($client->save()){
            return back()->with("success","Client Added Sucessfully");
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
        $client = Client::find($id);
        return view('admin/client/edit', compact('client','id'));
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
        Client::where('id', $id)->update(array(
            'name' => $request->name,
            'street' => $request->street,
            'city' => $request->city,
            'tin' => $request->tin,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
        ));
        return redirect('client/')->with('success', 'Client has been  updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if($client->delete()){
            return back()->with("success","Client deleted Sucessfully");
        }
    }
}
