<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Message;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // User data
        $usersData = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear("created_at", date('Y'))
            ->where("role_as", "0")
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

        $get_week = \Carbon\Carbon::today()->subDays(7);
        $get_month = \Carbon\Carbon::today()->subDays(30);

        return view('dashboard.index', [
            "title" => "Dashboard Admin",
            "ordersCount" => Order::where('status', '0')->where('created_at', '>=', $get_week)->count(),
            "ordersItemCount" => OrderItem::where('created_at', '>=', $get_week)->count(),
            "messageCount" => Message::where('created_at', '>=', $get_week)->count(),
            "incomeCount" => Order::where('created_at', '>=', $get_month)->get(),
            "adminCount" => User::where('role_as', '1')->count(),
            "customersCount" => User::where('role_as', '0')->count(),
            "usersData" => $datas,
            "ordersData" => $orderDatas
        ]);
    }

    public function usersView()
    {
        return view('dashboard.users.index', [
            "title" => "Users Registered",
            "users" => User::orderBy('role_as', 'DESC')->paginate(10)
        ]);
    }

    public function userDetails($id)
    {
        return view('dashboard.users.user-details', [
            "title" => "User Details",
            "user" => User::find($id)
        ]);
    }

    public function updateRole(Request $request, $id)
    {
        $userId = User::find($id);

        $userId->role_as = $request->input('role_as');
        $userId->update();

        return redirect('/dashboard/users-registered')->with('status', 'Role Updated Successfully');
    }
}
