<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;




class ProfitsController extends Controller
{
    public function calculateProfit()
    {
        $chart_options = [
            'chart_title' => 'Profit by day',
            'report_type' => 'group_by_date',
            'model' => 'App\UsersBook',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'profit',
            'chart_type' => 'line',
        ];
        $chart = new LaravelChart($chart_options);

        return view('admin.profit', compact('chart'));
    }
}
