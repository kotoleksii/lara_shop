<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // QueryBuilder examples
    public function get()
    {
//        dd('test');

//        $result = DB::table('orders')
//            ->where('id', 34)
//            ->get();

//        $result = DB::table('orders')
//            ->where('id', 23)
//            ->get();
//
//        $result = Order::find(23);

        $query = DB::table('orders');

//        $result = $query->find(23);

//        $result = $query->where('id', 23)->value('total_sum');

//        $result = $query->where('total_sum', '>', 100000)
//            ->pluck('status', 'total_sum');

//        $query->OrderBy('id')->chunk(20, function ($orders){
//            dump($orders);
//        });

//        $result = $query->count();

//        $result = $query->where('total_sum','>', 100000)
//            ->average('total_sum');

//        $result = $query->where('total_sum','>', 100000)
//            ->exists();

//        $result = $query->select('id', 'status')
//            ->where('total_sum','>', 100000)
//            ->distinct()
//            ->get();

//        $filter = [
//            'total_sum' => true,
//        ];
//        $result = $query->select('id');
//        if($filter['total_sum'])
//            $result = $result->addSelect('total_sum');
//
//        $result = $result->get();

//        $result = DB::table('orders')
//            ->select(DB::raw('count(*)'))
//            ->whereRaw(DB::raw('total_sum > 100000'))
//            ->get();

        // JOINS
//        $result = DB::table('users')
//            ->join('orders', 'orders.user_id', '=', 'users.id')
//            ->get();

//        $result = DB::table('users')
//            ->leftJoin('orders', 'orders.user_id', '=', 'users.id')
//            ->get();

//        $result = DB::table('users')
//            ->rightJoin('orders', 'orders.user_id', '=', 'users.id')
//            ->get();

//        $result = $query
//            ->where('id', '>', 10)
//            ->where('total_sum', '<>', 0)
//            ->get();
//
//        $result = $query
//            ->where([
//                ['id', '>', 10],
//                ['total_sum', '<>', 0],
//            ])->get();

//        $result = $query
//            ->where('id', '>', 10)
//            ->orWhere('status', '=', 1)
//            ->get();

//        $result = $query
//            ->where('id', '>', 100)
//            ->orWhere(function($query){
//                $query->where('total_sum', '>', 100000)
//                    ->where('status', '=', 1);
//            })
//            ->get();

//        $result = $query
//            ->whereBetween('total_sum', [100000, 200000])
//            ->get();

//        $result = $query
//            ->whereIn('total_sum', [402587, 17953])
//            ->get();

//            $result = $query
//            ->whereColumn('total_sum', 'delivery_sum')
//            ->get();

        // GROUPING

//        $result = $query->orderBy('status', 'desc')
//            ->get();

        $result = $query
            ->groupBy('status')
            ->having('status', '>', 0)
            ->select(DB::raw('count(*)'))
            ->get();

        dd($result);
    }
    // Casts
    public function getTest(): array
    {
//        $order = Order::find(12);
//        $order->total_sum_hr = 999.99;
//        $order->save();
//        return $order;

//        $order = Order::find(3);
//        $order->status = json_encode([
//            'status' => 2,
//        ]);
//        $order->save();
//        dd($order->status);

        $order = Order::with('user')->where('id', 12)->first();
        $order->makeHidden('user_id');
//        return $order->toArray();
//        return $order->toJson();
        return $order->attributesToArray();
    }
    // Collections
    public function getCollection()
    {
//        $nums = collect([2, 3, 4, 5, 3, 6, 2]);



//            dd($nums->duplicates());

//        Order::get()
//            ->each(function($item, $key) {
//                dump($item->status);
//            });

//        Order::get()->dd();

//        dd($nums->has(3));

//        dd(Order::get()->implode('status', ', '));
//        dd(collect($nums)->implode('|'));

//        $nums->push(101);
//        $nums->pull(0);
//        dd($nums->all());

//        dd($nums->shuffle());

//        $result = $nums->filter(function($value, $key){
//            return !($value % 2);
//        });
//        dd($result);

//        $orders = Order::get()->filter(function(Order $order){
//           return $order->total_sum_hr > 1000;
//        });
//        dd($orders);

//        $orders = Order::where('total_sum', '>', 1000000)->get();
//        dd($orders);

//        dd($nums->first());

//        $result = Order::get()->only([4, 5, 8]);
//        dd($result);

//        $result = Order::get()->pluck('total_sum', 'id');
//        dd($result);

//        $result = Order::where('total_sum', '>', 100000)
//            ->get()
//            ->search(function (Order $item, $key){
//                return $item->status === Order::STATUS_ARCHIVED;
//            });
//        dd($result);

//        return Order::get()->sortBy('status')->all();


    }
}
