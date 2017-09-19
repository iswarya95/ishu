<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Model\frontend\Product;
use Illuminate\Http\Request;
use App\Model\frontend\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\Model\frontend\User;
use Hash;
use Validator;
use Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('hh');
       $user= Auth::guard('user')->user()->id;//dd($user);
        $orders = Order::where('id',$user)->first();//dd($orders);
        return view('userpannel/order/index')->with( 'orders', $orders );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= Auth::guard('user')->user();//dd($user);
        $product = Product::pluck('product_name','id')->prepend('Please Select','');//dd($product);
        return view('userpannel/order/new')->with(['product'=>$product,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();//dd($order);
      $order->id = Auth::guard('user')->user()->id;//dd($order->id);
        $order->name = Auth::guard('user')->user()->name;//dd($order->name);
        $order->phone = 3245666666;
        $order->address = 'CHENNAI';
        $order->delivery_date = Input::get('delivery_date');//dd($order->delivery_date);
        $order->product_id = Input::get('product_id');
        $order->payment_option = Input::get('payment_option');
        $order->quantity = Input::get('quantity');
        $order->order_status = Input::get('order_status');

        if($order->save())
        {
            Session::flash('message','Order was successfully created');
            Session::flash('m-class','alert-success');
            return redirect('user/order');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('user/order/create');
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
        $order = Order::find($id);//dd($order);
        return view('userpannel/order/show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $product = Product::pluck('product_name','id');
        return view('userpannel/order/edit')->with(['order' => $order,'product' => $product]);
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
        $order = Order::find($id);//dd($order);

        $order->name = Input::get('name');dd($order->name);
       
        $order->delivery_date = Input::get('delivery_date');
        $order->product_id = Input::get('product_id');
        $order->payment_option = Input::get('payment_option');
        $order->quantity = Input::get('quantity');
        $order->order_status = Input::get('order_status');

        if($order->save())
        {
            Session::flash('message','Order was successfully updated');
            Session::flash('m-class','alert-success');
            return redirect('user/order');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('user/order/create');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();

        Session::flash('message','Order was successfully deleted');
        Session::flash('m-class','alert-success');
        return redirect('user/order');
    }

    //UPDATE Password
    public function password(){
        return View('password');
    }

    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'Current password is required',
            'password.required' => 'New password is required',
            'password.confirmed' => 'Passwords do not match',
            'password.min' => 'Password is too short (minimum is 6 characters)',
            'password.max' => 'Password is too long (maximum is 18 characters)',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            //dd($validator->errors());
            return redirect('user/password')->withErrors($validator);
        }
        else{
    
            if (Hash::check($request->mypassword, Auth::guard('user')->user()->password)){
               // dd('hash');
                $user = new User;//dd($user);
                $user->where('email', '=', Auth::guard('user')->user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('user/dashboard')->with('message', 'Password changed successfully')->with('m-class','alert-success');
            }
            else
            {
                return redirect('user/password')->with('message', 'Current password is invalid')->with('m-class','alert-danger');
            }
        }
    }
}
