<?php

namespace App\Services;
use App\Models\Cost;
use Illuminate\Support\Facades\DB;
use Auth;
class CostService
{

    public function getCost($data,$capital)
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
