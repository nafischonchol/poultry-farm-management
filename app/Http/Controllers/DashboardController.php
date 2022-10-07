<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ISheetRepository;
use App\Repositories\ICostRepository;
use Auth;

class DashboardController extends Controller
{

    private $cost;
    private $sheet;
    public function __construct(ICostRepository $cost,ISheetRepository $sheet)
    {
        $this->cost = $cost;
        $this->sheet = $sheet;
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

        $cost = $this->getCost($capital);

        return view("dashboard.dashboard",['sheet_list'=>$sheet_list,'current_sheet'=>$current_sheet,"cost"=>$cost]);
    }

    private function getCost($capital)
    {
        $cost['capital'] = $capital;
        $cost['left_capital'] = $capital;

        $cost['total'] = 0;
        $cost['khaddo_bosta'] = 0;
        $cost['khaddo'] = 0;
        $cost['osud'] = 0;
        $cost['auto'] = 0;
        $cost['kather_ghura'] = 0;
        $cost['baccha_cost'] = 0;
        $cost['baccha_qty'] = 0;
        $cost['baccha_bonus_qty'] =0;
        $cost['total_baccha_qty'] = 0;

        $data = $this->cost->costTotal();

        if(isset($data[0]))
        {
            foreach($data as $item)
            {
                $cost['total'] += $item->total;
                if($item->category=="খাদ্য")
                {
                    $cost['khaddo'] = $item->total;
                    $cost['khaddo_bosta'] = $item->totQty;
                }
                else if($item->category=="ঔষধ")
                    $cost['osud'] = $item->total;
                else if($item->category=="অটো ভাড়া")
                    $cost['auto'] = $item->total;
                else if($item->category=="কাঠের গুঁড়া")
                    $cost['kather_ghura'] = $item->total;
                else if($item->category == "বাচ্চা")
                {
                    $cost['baccha_cost'] = $item->total;
                    $cost['baccha_qty'] = $item->totQty;
                    $cost['baccha_bonus_qty'] = $item->totBonusQty;
                    $cost['total_baccha_qty'] = $cost['baccha_qty'] + $cost['baccha_bonus_qty'] ;
                }
            }
        }
        $cost['left_capital'] = $cost['capital'] - $cost['total'];
        return $cost;

    }
}
