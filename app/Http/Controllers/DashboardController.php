<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function dashboardData()
    {
        $res['totalCustomers'] = Customer::all()->count();
        $date = \Carbon\Carbon::today()->subDays(30);


        $res['lastSevenDaysCustomers'] = Customer::where('created_at', '>=', Carbon::today()->subDays(7))
            ->get()->count();
        $res['lastMonthCustomers'] = Customer::where('created_at', '>=', Carbon::today()->subDays(30))
            ->get()->count();

        return response()->json($res);
    }

    public function index()
    {
        return view('layouts.admin.pages.dashboard');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function chartData()
    {
        $customers = Customer::where('created_at', '>=', Carbon::today()->subDays(7))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->get();
//        where('created_at', '>=', Carbon::today()->subDays(7))
//            ->groupBy('created_at')
//            ->get();
        return $customers;
    }

    public function pieChartData()
    {
        $customers = Customer::select('feedback', DB::raw('count(*) as total'))
            ->groupBy('feedback')
            ->get();

        $customers = $customers->filter(function ($item) {
            if ($item->feedback == '-1') {
                $item->feedback = 'Already Have Camera';
                $item->color = '#2709b0';
            } else if ($item->feedback == '0') {
                $item->feedback = 'Not Interested';
                $item->color = '#030303';
            } else if ($item->feedback == '1') {
                $item->feedback = 'Interested';
                $item->color = '#00d0ff';
            } else if ($item->feedback == '2') {
                $item->feedback = 'Highly Interested';
                $item->color = '#00ff7e';

            } else if ($item->feedback == '3') {
                $item->feedback = 'Urgent Interested';
                $item->color = '##cf081f';

            }
            return $item;

        });
        return $customers;

    }
}
