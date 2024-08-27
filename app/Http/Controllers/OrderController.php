<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $orders = Order::with('user', 'product')->get(); // Pastikan untuk memuat relasi
    return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mulai = Carbon::parse($request->mulai);
        $selesai = Carbon::parse($request->selesai);
        $hari = $mulai->diffInDays($selesai);
        $total = $hari * $request->harga;
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'telepon' => $request->telepon,
            'lokasi' => $request->lokasi,
            'catatan' => $request->catatan,
            'status' => 'unpaid',
            'total' => $total+$request->harga,
        ]);

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $order->total,
            ),
            'customer_details' => array(
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => $order->telepon,
                'address' => $order->lokasi,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $order->snap_token = $snapToken;
        $order->status = 'paid';
        $order->save();
        return view('order.detail', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
