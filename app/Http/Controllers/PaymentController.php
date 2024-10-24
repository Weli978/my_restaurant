<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\user;
use App\Notifications\SendPaymentEmail;
use App\Http\Requests\StorepaymentRequest;
use App\Http\Requests\UpdatepaymentRequest;



class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment=Payment::all();
        return $payment;
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
     * @param  \App\Http\Requests\StorepaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepaymentRequest $request)
    {
        $payment=New payment;
        $payment->user_id = $request ->user_id;
        $payment->payment_type = $request ->payment_type;
        $payment->order_id = $request ->order_id;
        $payment->amount= $request ->amount;
        $payment->save();

        $user = user::find($request->user_id);
        $user->notify(new SendPaymentEmail($user,$payment));
        return $payment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaymentRequest  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepaymentRequest $request, payment $payment)
    {
        $payment = Payment::find(request->id);
        $payment->user_id = $request ->user_id;
        $payment->payment_type = $request ->payment_type;
        $payment->order_id = $request ->order_id;
        $payment->amount= $request ->amount;
        $payment->save();
        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        //
    }
}
