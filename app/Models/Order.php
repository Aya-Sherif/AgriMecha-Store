<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public static function getOrdersLastWeek()
    {
        // Calculate the start and end dates of the last week
        $startOfWeek = Carbon::now()->startOfWeek()->subWeek();
        $endOfWeek = Carbon::now()->endOfWeek()->subWeek();

        // Retrieve the number of orders placed within the last week
        $ordersLastWeek = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

        return $ordersLastWeek;
    }
    public static function getWaitedOrdersCount()
{
    // Retrieve the number of orders with a pending status
    $waitedOrdersCount = Order::where('state', 'waited')->count();

    // You can also include other statuses that represent waited orders
    // For example, if "waiting" is another status indicating a waited order:
    // $waitedOrdersCount += Order::where('status', 'waiting')->count();

    return $waitedOrdersCount;
}

public static function getOrderStatusCountsPerMonth()
{
    $orderStatusCountsPerMonth = DB::table('orders')
        ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS month"),
                 DB::raw("SUM(CASE WHEN state = 'canceled' THEN 1 ELSE 0 END) AS cancelled_count"),
                 DB::raw("SUM(CASE WHEN state = 'Done' THEN 1 ELSE 0 END) AS done_count"))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        ->get();

    // Convert date strings to month names
    $monthNames = [];
    foreach ($orderStatusCountsPerMonth as $item) {
        // Parse the date string into a Carbon instance
        $date = Carbon::createFromFormat('Y-m', $item->month);

        // Get the month name
        $monthNames[] = $date->format('M'); // 'F' format represents the full month name
    }

    // Replace the date strings with month names
    foreach ($orderStatusCountsPerMonth as $key => $item) {
        $orderStatusCountsPerMonth[$key]->month = $monthNames[$key];
    }
    return $orderStatusCountsPerMonth;
}

    protected $fillable=['user_id' ];

}
