<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\Product;
use App\Models\Province;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Session;
use Cookie;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $cartItems = Cart::content();
        // $products = Product::all()->take(3);
        return view('frontend.orders.index', ['cartItems' => $cartItems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Cart::count() > 0) {
            $products  = Product::all()->take(3);
            $provinces = Province::all();
            $districts = District::all();
            return view('frontend.orders.checkout', [
                        'products'  => $products,
                        'provinces' => $provinces,
                        'districts' => $districts]);
        } else {
            return redirect()->route('cart');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save Customer Info
        $customer           = new Customer;
        $customer->fullname = $request->fullname;
        $customer->email    = $request->email;
        $customer->phone    = $request->phone;
        $customer->ward     = $request->ward;
        $customer->province = $request->province;
        $customer->district = $request->district;
        $customer->note     = $request->note;
        $customer->save();

        // Save Bill Info
        foreach (Cart::content() as $product) {
            $bill               = new Bill;
            $bill->customer_id  = $customer->id;
            $bill->product_name = $product->name;
            $bill->quantity     = $product->qty;
            $bill->price        = $product->price;
            $bill->save();
        }
        
        // Save Order Info
        $order              = new Order;
        $order->customer_id = $customer->id;
        $order->quantity    = $request->quantity;
        $order->total       = $request->total;
        $order->subtract    = $request->subtract;
        $order->subtotal    = $request->subtotal;
        $order->payment     = $request->payment;
        $order->save();
        $customer_id = $customer->id;

        Cart::destroy();
        $request->session()->forget(['code', 'percent']);
        // $customer_id = cookie('customer_id', $customer_id, 1);
        // echo $customer_id;
        // $request->session()->put('customer_id', $customer_id);

        return redirect()->route('order.stored')->cookie('customer_id', $customer_id, 0.1);

    }

    public function stored(Request $request)
    {

        $customer_id = Cookie::get('customer_id');
        $customer = Customer::where('id', $customer_id)->first();
        if (Cookie::get('customer_id')) {
            return view('frontend.orders.checkout_success', ['customer' => $customer]);
        } else {
            return redirect()->route('home');
        }
    }

    public function show_districts(Request $request)
    {
        // $products  = Product::all()->take(3);
        $provinces = Province::where('name', $request->name)->first();
        $districts = $provinces->districts;
        foreach ($districts as $district) {
            echo "<option value='$district->name'>$district->name</option>";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
