<?php

namespace App\Services;

class DateTimeService{

    function calculateDifferenceBetweenTwoDate($date1,$date2)
    {
        $date1 = new \DateTime($date1);
        $date2 = new \DateTime($date2);
        $interval = $date1->diff($date2);
        return "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
    }

    function addMonthToDate($numberMonth,$oldMonth)
    {
        $numberMonth = "+".$numberMonth." months";
        $newMonth = date('Y-m-d', strtotime($numberMonth, strtotime($oldMonth)));
        return $newMonth;
    }

    static function staticAddMonthToDate($numberMonth,$oldMonth)
    {
        $numberMonth = "+".$numberMonth." months";
        $newMonth = date('Y-m-d', strtotime($numberMonth, strtotime($oldMonth)));
        return $newMonth;
    }

    function remainingDayBetweenTwoDate($future,$timefromdb)
    {
        $future = strtotime($future); //Future date.
        $timefromdb = strtotime($timefromdb);
        $timeleft = $future-$timefromdb;
        $daysleft = round((($timeleft/24)/60)/60);
        return $daysleft;
    }

    //for warenty due day
    public static function getDueDay($month,$purchase)
    {
        $warrenty = (new self)->addMonthToDate($month,$purchase);
        $due = (new self)->remainingDayBetweenTwoDate($warrenty,date("Y-m-d"));
        return $due;
    }
}
