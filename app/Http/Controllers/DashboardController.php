<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ISheetRepository;
use App\Repositories\ICostRepository;
use App\Repositories\IBacchaMrittuRepository;
use App\Services\CostService;
use App\Services\DateTimeService;

use Auth;

class DashboardController extends Controller
{

    private $cost;
    private $sheet;
    private $costService;
    private $dateTimeService;
    private $bacchaMrittu;

    public function __construct(ICostRepository $cost,ISheetRepository $sheet,IBacchaMrittuRepository $bacchaMrittu)
    {
        $this->cost = $cost;
        $this->sheet = $sheet;
        $this->costService= new CostService();
        $this->dateTimeService= new DateTimeService();
        $this->bacchaMrittu = $bacchaMrittu;
    }

    function index()
    {
        try{
            $current_sheet_info = $this->sheet->currentSheet();
            $sheet_list = $this->sheet->all();

            $sheet['current_sheet'] = 0;
            $sheet['day'] = 0;
            $sheet['start_date'] = date("Y-m-d");
            $sheet['capital'] = 0;
            if(isset($current_sheet_info))
            {
                $sheet['current_sheet']  = $current_sheet_info->sheet_no;
                $sheet['start_date'] = $current_sheet_info->start_date;
                $sheet['capital']  = $current_sheet_info->capital;
                session()->put("current_sheet",$sheet['current_sheet'] );
            }
            $data = $this->cost->costTotal();
            $costSummery = $this->costService->getCost($data,$sheet['capital'] );
            $sheet['day'] = $this->dateTimeService->remainingDayBetweenTwoDate(date('Y-m-d'),$sheet['start_date']);

            // echo $sheet['day'];
            // die;
            $baccha['mrittu'] = $this->bacchaMrittu->mrittuTotal(session('current_sheet'))->total;
            $baccha['bikri'] = 0;
        }
        catch(\Exception $e)
        {
            return back()->with("warning",$e->getMessage());
        }

        return view("dashboard.dashboard",['sheet_list'=>$sheet_list,'sheet'=>$sheet,"cost"=>$costSummery,'baccha'=>$baccha]);
    }

}
