<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hsn;
use Validator;

class HsnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Hsn::all();
        return view('admin/hsn/index',compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/hsn/insert");
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
            'tax' => 'required',
             'hsn_code' => 'bail|required|unique:hsn',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Given Data Invalid');
        }
        $hsn = new Hsn;
        $hsn->hsn_code = $request->hsn_code;
        $hsn->tax = $request->tax;
        if($hsn->save()){
            return back()->with("success","Code Added Sucessfully");
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
        
        $hsn = Hsn::find($id);
        return view('admin/hsn/edit', compact('hsn','id'));
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
        Hsn::where('id', $id)->update(array(
            'hsn_code' => $request->hsn_code,
            'tax' => $request->tax,
        ));
        return redirect('hsn/')->with('success', 'Hsn Code has been  updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hsn = Hsn::find($id);
        if($hsn->delete()){
            return back()->with("success","Deleted Sucessfully");
        }
    }
}
