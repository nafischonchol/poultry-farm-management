<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Repositories\IBacchaMrittuRepository;

class BacchaMrittuController extends Controller
{
    private $mainRepo;
    public function __construct(IBacchaMrittuRepository $mainRepo)
    {
        $this->mainRepo = $mainRepo;
    }

    function index()
    {
        $data = $this->mainRepo->all(session("current_sheet"));
        return view("baccha.mrittu.index",['data'=>$data]);
    }

}
