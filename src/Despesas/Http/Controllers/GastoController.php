<?php

namespace  AManzoli2122\Salao\Despesas\Http\Controllers;

use Illuminate\Http\Request;

class GastoController extends Controller
{
 

    public function __construct(  ){
        $this->middleware('auth');
    }  
       


    public function index()
    {
        return view("despesas::index");
    }
        
}
