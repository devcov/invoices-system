<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sum1 =Invoices::sum('total');

        $summ1 = Invoices::where('Value_Status', 1)->sum('total');
        $summ2 = Invoices::where('Value_Status', 2)->sum('total');
        $summ3 = Invoices::where('Value_Status', 3)->sum('total');


        if (!$sum1 == 0) {
            $per1 = ($summ1 * 100) / $sum1;
            $per2=($summ2 * 100) / $sum1;
            $per3=($summ3 * 100) / $sum1;
        } else {
            $per1 = 0;
            $per2 = 0;
            $per3 = 0;
        }


        $chartjs = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['الكلية','مدفوعة', 'غير مدفوعة','مدفوعة جزئيا'])
        ->datasets([
            [
                "label" =>"احصاء الفواتير",


                'backgroundColor' => ['rgb(51, 48, 228)','rgb(43, 122, 11)','rgb(235, 29, 54)', 'rgb(239, 91, 12)'],
                'data' => [round($sum1,2),round($per1,2) , round($per2,2),round($per3,2)]


            ],



        ])
        ->options([]);

        $chartjs2 = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['كلية','مدفوعة', 'غير مدفوعة','مدفوعة جزئيا'])
        ->datasets([
            [
                'backgroundColor' => ['#3330E4','#2B7A0B','#FF6384', '#EF5B0C'],
                'hoverBackgroundColor' => ['#3330E4','#2B7A0B','#FF6384', '#EF5B0C'],
                'data' => [round($sum1,2),round($per1,2) , round($per2,2),round($per3,2)]
            ]
        ])
        ->options([]);

return view('home', compact('chartjs','chartjs2'));



    }


}
