<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sheet;
use App\Models\Cost;

use Auth;
class DashboardController extends Controller
{
    function index()
    {
        $current_sheet_info = Sheet::where("user_id",Auth::user()->id)->where("current_sheet",1)->first();
        $sheet_list = Sheet::where("user_id",Auth::user()->id)->get();
        $current_sheet = 0;
        $capital = 0;
        if(isset($current_sheet_info))
        {
            $current_sheet = $current_sheet_info->sheet_no;
            $capital = $current_sheet_info->capital;
            session()->put("current_sheet",$current_sheet);
        }

        $cost = $this->getCost($current_sheet,$capital);

        return view("dashboard.dashboard",['sheet_list'=>$sheet_list,'current_sheet'=>$current_sheet,"cost"=>$cost]);
    }

    private function getCost($current_sheet,$capital)
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

        $data = Cost::where("sheet_no",$current_sheet)->where("user_id",Auth::user()->id)->groupBy("category")->selectRaw('sum(price*qty) as total,sum(qty) as totQty,sum(bonus_qty) as totBonusQty, category')->get();

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
