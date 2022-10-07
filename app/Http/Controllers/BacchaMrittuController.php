<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Repositories\IBacchaMrittuRepository;
use App\Repositories\ISheetRepository;


class BacchaMrittuController extends Controller
{
    private $mainRepo;
    private $sheet;

    public function __construct(IBacchaMrittuRepository $mainRepo,ISheetRepository $sheet)
    {
        $this->mainRepo = $mainRepo;
        $this->sheet = $sheet;

    }

    function index()
    {
        $data = $this->mainRepo->all(session("current_sheet"));
        $sheet_list = $this->sheet->all();

        return view("baccha.mrittu.index",['data'=>$data,'sheet_list'=>$sheet_list]);
    }

}
