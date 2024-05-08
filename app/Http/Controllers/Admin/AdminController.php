<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {

        //Users
        $nousers = User::all()->count();
        $userCountsByGovernorate = User::getUserCountsByGovernorate();

        // Extract data for pie chart
        $governorates = [];
        $userCounts = [];
        foreach ($userCountsByGovernorate as $result) {
            $governorates[] = $result->governorate;
            $userCounts[] = $result->user_count;
        }


        // Replace this with your actual data retrieval logic
        // Query to get the number of orders in each month
        //Orders
        $noorders = Order::all()->count();
        $orderCounts = Order::select(DB::raw('COUNT(*) as total_orders'), DB::raw('MONTH(created_at) as month'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        $months = [];
        $orderData = [];

        foreach ($orderCounts as $orderCount) {
            $months[] = date('M', mktime(0, 0, 0, $orderCount->month, 1));
            $orderData[] = $orderCount->total_orders;
        }
        $BestSellerProducts = PModel::getBestSellerProducts();

        return view('admin.index', compact('nousers', 'noorders', 'months', 'orderData', 'governorates', 'userCounts','BestSellerProducts'));
    }
}
