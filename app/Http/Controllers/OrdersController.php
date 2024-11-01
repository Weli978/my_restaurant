<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\user;
use App\Models\orderdetails;
use App\Models\menu;
use App\Http\Requests\StoreordersRequest;
use App\Http\Requests\UpdateordersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Orders::all();
        return $orders;
    }
    public function getOrderDetails($order_id){
        $order = Orders::find($order_id);
        //user 
        $order->user = User::find($order->user_id);
        //order details
        $order->order_details = OrderDetails::where('order_id', $order->id)->get();
        //menu
        foreach ($order->order_details as $order_detail){
            $menu = Menu::find($order_detail->menu_id);
            $order_detail->menu_name = $menu->name;
            $order_detail->menu_price = $menu->price;
        }
        return $order;
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
     * @param  \App\Http\Requests\StoreordersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreordersRequest $request)
    {
        $order=New orders;
        $order->user_id = $request ->user_id;
        $order->order_type = $request ->order_type;
        $order->order_status = $request ->order_status;
        $order->order_total = $request ->order_total;
        $order->save();
        return $order;
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateordersRequest  $request
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateordersRequest $request, orders $orders)
    {
        $order = Orders::find(request->id);
        $order->user_id = $request ->user_id;
        $order->order_type = $request ->order_status;
        $order->order_status = $request ->order_status;
        $order->order_total = $request ->order_total;
        $order->save();
        return $order;
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(orders $orders)
    {
        //
    }
}
