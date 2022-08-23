<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    //
    public function index(){
        $chart_options = [
            'chart_title' => 'Departements by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\dept',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);
        $chart_options2 = [
            'chart_title' => 'Employes by Departements',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\emp',
            'report_type' => 'group_by_relationship',
            'relationship_name' => 'dept',
            'group_by_field' => 'name',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            'filter_period' => 'month', // show users only registered this month
        ];

        $chart2 = new LaravelChart($chart_options2);
        return view('home')->with([
            'chart1'=>$chart1,
            'chart2'=>$chart2,
        ]);
    }
}
