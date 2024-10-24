<?php

namespace App\Http\Controllers;

use App\Models\orderdetails;
use App\Http\Requests\StoreorderdetailsRequest;
use App\Http\Requests\UpdateorderdetailsRequest;

class OrderdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Orderdetails=Orderdetails::all();
        return $Orderdetails;
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
     * @param  \App\Http\Requests\StoreorderdetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderdetailsRequest $request)
    {
        
        $Orderdetails=New Orderdetails;
        $Orderdetails->order_id = $request ->order_id;
        $Orderdetails->quantity = $request ->quantity;
        $Orderdetails->menu_id = $request ->menu_id;
        $$Orderdetails->save();
        return $payment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orderdetails  $orderdetails
     * @return \Illuminate\Http\Response
     */
    public function show(orderdetails $orderdetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderdetails  $orderdetails
     * @return \Illuminate\Http\Response
     */
    public function edit(orderdetails $orderdetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderdetailsRequest  $request
     * @param  \App\Models\orderdetails  $orderdetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderdetailsRequest $request, orderdetails $orderdetails)
    {
        $Orderdetails = Orderdetails::find(request->id);
        $Orderdetails->order_id = $request ->order_id;
        $Orderdetails->quantity = $request ->quantity;
        $Orderdetails->menu_id = $request ->menu_id;
        $Orderdetails->save();
        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orderdetails  $orderdetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderdetails $orderdetails)
    {
        //
    }
}
