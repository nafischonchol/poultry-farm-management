<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ISheetRepository;
use App\Repositories\ICostRepository;
use App\Services\CostService;
use Auth;

class DashboardController extends Controller
{

    private $cost;
    private $sheet;
    private $costService;
    public function __construct(ICostRepository $cost,ISheetRepository $sheet)
    {
        $this->cost = $cost;
        $this->sheet = $sheet;
        $this->costService= new CostService();
    }

    function index()
    {
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
        $cost = $this->costService->getCost($data,$capital);

        return view("dashboard.dashboard",['sheet_list'=>$sheet_list,'current_sheet'=>$current_sheet,"cost"=>$cost]);
    }

}
