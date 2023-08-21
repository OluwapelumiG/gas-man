<?php

namespace App\Http\Controllers;


use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //

    public function index(){
        $sales = Sales::orderBy('created_at', 'desc')->get()->toArray();
        return view('sales', ['sales' => $sales]);
    }

    public function store(Request $request, Sales $sale){
//        $sale = new Sales();

        $request->validate([
            'qty' => 'required',
            'price' => 'required',
        ]);

        if ($request->qty == ($request->price / 500)){
            $sale->qty = $request->qty;
            $sale->price = $request->price;
            $sale->customer = $request->customer ?? 'Desk';
            $sale->status = 'paid';
            $sale->invoice = "TRN".date('YmdHis');
            $sale->save();
            $sale_id = $sale->id;
            return response()->json(['status' => 'saved', 'sale' => $sale_id]);
//            echo "saved";
        }
        else{
            return response()->json(['status' => 'mismatch']);
        }
    }

    public function printout($id){
        $sale = Sales::find($id)->toArray();
        return view('receipt', ['sale' => $sale]);

    }
}
