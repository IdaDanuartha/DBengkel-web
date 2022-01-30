<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // User data
        $usersData = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear("created_at", date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("count");

        $months = User::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("month");

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,);
        foreach ($months as $index => $month) {
            $datas[$month] = $usersData[$index];
        }

        // Order data
        $orderData = Order::select(DB::raw("COUNT(*) as count"))
            ->whereYear("created_at", date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("count");

        $orderMonths = Order::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("month");

        $orderDatas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,);
        foreach ($orderMonths as $index => $month) {
            $orderDatas[$month] = $orderData[$index];
        }


        return view('dashboard.index', [
            "title" => "Dashboard Admin",
            "productsCount" => Product::all()->count(),
            "categoriesCount" => Category::all()->count(),
            "ordersCount" => Order::all()->count(),
            "usersCount" => User::all()->count(),
            "usersData" => $datas,
            "ordersData" => $orderDatas
        ]);
    }

    public function usersView()
    {
        return view('dashboard.users.index', [
            "title" => "Users Registered",
            "users" => User::paginate(10)
        ]);
    }
}
