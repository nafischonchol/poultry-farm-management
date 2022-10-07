<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ISheetRepository;
use App\Repositories\ICostRepository;
use App\Repositories\IBacchaMrittuRepository;
use App\Services\CostService;
use Auth;

class DashboardController extends Controller
{

    private $cost;
    private $sheet;
    private $costService;
    private $bacchaMrittu;
    public function __construct(ICostRepository $cost,ISheetRepository $sheet,IBacchaMrittuRepository $bacchaMrittu)
    {
        $this->cost = $cost;
        $this->sheet = $sheet;
        $this->costService= new CostService();
        $this->bacchaMrittu = $bacchaMrittu;
    }

    function index()
    {
        try{
            $current_sheet_info = $this->sheet->currentSheet();
            $sheet_list = $this->sheet->all();

            $current_sheet = 0;
            $capital = 0;
            if(isset($current_sheet_info))
            {
                $current_sheet = $current_sheet_info->sheet_no;
                $capital = $current_sheet_info->capital;
                session()->put("current_sheet",$current_sheet);
            }
            $data = $this->cost->costTotal();
            $costSummery = $this->costService->getCost($data,$capital);

            $baccha['mrittu'] = $this->bacchaMrittu->mrittuTotal(session('current_sheet'))->total;
            $baccha['bikri'] = 0;
        }
        catch(\Exception $e)
        {
            return back()->with("warning",$e->getMessage());
        }

        return view("dashboard.dashboard",['sheet_list'=>$sheet_list,'current_sheet'=>$current_sheet,"cost"=>$costSummery,'baccha'=>$baccha]);
    }

}
