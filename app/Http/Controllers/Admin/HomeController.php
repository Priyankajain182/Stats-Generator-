<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Cases by Country and Date',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\Infection',
            'conditions'            => [
                ['name' => 'India (135.26 crores people)', 'condition' => 'country_id = 95', 'color' => 'green'],
                ['name' => 'United States (32.82 crores people)', 'condition' => 'country_id = 229', 'color' => 'blue'],
                ['name' => 'Italy (6.04 crores people)', 'condition' => 'country_id = 102', 'color' => 'red'],
            ],
            'group_by_field'        => 'report_date',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'infections',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
        ];

        $chart1 = new LaravelChart($settings1);


       
        return view('home', compact('chart1'));
    }
}
