<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //

    public function index(){
        $salesData = Sales::selectRaw('DATE(created_at) as date, SUM(qty) as total_qty')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total_qty')
            ->toArray();

        $priceData = Sales::selectRaw('DATE(created_at) as date, SUM(price) as total_sales')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total_sales')
            ->toArray();

        $today = Carbon::today();
        $startOfWeek = $today->startOfWeek()->subDays(1); // Adjust to start from Sunday
        $endOfWeek = $today->endOfWeek();

//        $salesData = Sales::selectRaw('DATE(created_at) as date, SUM(price) as total_sales')
//            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
//            ->groupBy('date')
//            ->orderBy('date')
//            ->get();
//
//        $salesData = Sales::selectRaw('SUM(price) as total_sales')
//            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
//            ->pluck('total_sales')
//            ->toArray();

        // Create an array with all days from Sunday to Monday
        $daysOfWeek = [];
        for ($i = 0; $i <= 6; $i++) {
            $daysOfWeek[] = $startOfWeek->copy()->addDays($i)->format('D (d-m)');
        }

        return view('dashboard', ['salesData' => $salesData, 'priceData' => $priceData, 'daysOfWeek' => $daysOfWeek]);
    }
}
