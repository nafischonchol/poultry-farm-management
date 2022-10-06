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
        $current_sheet_info = Sheet::where("user_id",Auth::user()->id)->where("current_sheet",1)->get();
        $sheet_list = Sheet::where("user_id",Auth::user()->id)->get();
        $current_sheet = 0;
        if(isset($current_sheet_info[0]))
        {
            $current_sheet = $current_sheet_info[0]->sheet_no;
            session()->put("current_sheet",$current_sheet);
        }

        $cost = $this->getCost($current_sheet);

        return view("dashboard.dashboard",['sheet_list'=>$sheet_list,'current_sheet'=>$current_sheet,"cost"=>$cost]);
    }

    private function getCost($current_sheet)
    {
        $cost['total'] = 0;
        $cost['khaddo_bosta'] = 0;
        $cost['khaddo'] = 0;
        $cost['osud'] = 0;
        $cost['auto'] = 0;
        $cost['kather_ghura'] = 0;
        $data = Cost::where("sheet_no",$current_sheet)->where("user_id",Auth::user()->id)->groupBy("category")->selectRaw('sum(price*qty) as total, category')->get();
        if(isset($data[0]))
        {
            foreach($data as $item)
            {
                $cost['total'] += $item->total;
                if($item->category=="খাদ্য বস্তা")
                    $cost['khaddo'] = $item->total;
                else if($item->category=="ঔষধ")
                    $cost['osud'] = 0;
                else if($item->category=="অটো ভাড়া")
                    $cost['auto'] = 0;
                else if($item->category=="কাঠের গুঁড়া")
                    $cost['kather_ghura'] = 0;
            }
        }

        $khaddo_bosta = Cost::where("sheet_no",$current_sheet)->where("user_id",Auth::user()->id)->where('category','খাদ্য বস্তা')->selectRaw('sum(qty) as total')->first();
        if(isset($khaddo_bosta->total))
            $cost['khaddo_bosta'] = $khaddo_bosta->total;
        return $cost;

    }
}
