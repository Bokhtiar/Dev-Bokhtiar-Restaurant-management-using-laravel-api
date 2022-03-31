<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          if (User::where('email', $request->email)->where('id', $request->user_id)->exists()) {

          $order = new Order;
          $order->name = $request->name;
          $order->email = $request->email;
          $order->phone = $request->phone;
          $order->user_id = $request->user_id;
          $order->rec_name = $request->rec_name;
          $order->rec_email = $request->rec_email;
          $order->rec_phone = $request->rec_phone;
          $order->rec_address_1 = $request->rec_address_1;
          $order->rec_address_2 = $request->rec_address_2;
          $order->message = $request->message;
            $order->save();



           foreach (Cart::where('user_id', $request->user_id)
                   ->where('order_id',NULL)
                   ->get() as $cart) {
            $cart['order_id']=$order->order_id;
            $cart->save();
          }
          return response([
            'message' => "created successfully",
            'order' => $order,
            'status' => 200,
          ]);

        }else{
          return response([
            'message' => "not match credintial",
            'status' => 400,
          ]);
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
