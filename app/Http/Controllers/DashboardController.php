<?php

namespace App\Http\Controllers;


use App\City;
use App\State;
use App\Inquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->getChartData();
        return view('admin.inquiry.dashboard', compact('data'));
    }

    public function getChartData()
    {
        $inquires = Inquiry::where('date', '>=', Carbon::now()->addDays(-7)->format('Y-m-d'))
            ->select('date', DB::raw('count(*) as total'))
            ->groupBy('date')
            ->get()->toArray();

        $today = Carbon::now();
        $startDate = Carbon::now()->addDays(-7);
        $data = [];
        do{
            $date = $startDate->toDateString();
            $column = array_column($inquires, 'date');
            $key = array_search($date, $column);
            if(is_numeric($key)){
                $data[$date] = $inquires[$key]['total'];
            }else {
                $data[$date] = 0;
            }

            $startDate = $startDate->addDay();
        }
        while($startDate->diffInDays($today, false) >= 0);

        return $data;
    }

    public function getInquiryList()
    {
        $list = Inquiry::all();

        return DataTables::of($list)
            ->editColumn('full_name', function ($data){
                return $data->full_name;
            })
            ->editColumn('company_name', function ($data){
                return $data->company_name;
            })
            ->editColumn('email', function ($data){
                return ($data->email);
            })
            ->editColumn('phone', function ($data){
                return $data->phone;
            })
            ->editColumn('city', function ($data){
                return $data->getCity->name;
            })
            ->editColumn('state', function ($data){
                return $data->getState->name;
            })
            ->make(true);
    }
}
