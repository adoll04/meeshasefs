<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;
use App\Investment;

class InvestmentController extends Controller
{
    public function index()
    {
        //
        $investments=Investment::all();
        return view('investments.index',compact('investments'));
    }

    public function show($id)
    {
        $investments  = Investment::findOrFail($id);

        return view('investments.show',compact('investments'));
    }


    public function create()
    {

        $customers = Customer::lists('name','id');
        return view('investments.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $investments = new Investment($request->all());
        $investments->save();

        return redirect('investments');
    }

    public function edit($id)
    {
        $investments =Investment::find($id);
        return view('investments.edit',compact('investments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {

        $investments = new Investment($request->all());
        $investments=Investment::find($id);
        $investments->update($request->all());
        return redirect('investments');
    }

    public function destroy($id)
    {
        Investment::find($id)->delete();
        return redirect('investments');
    }

}
