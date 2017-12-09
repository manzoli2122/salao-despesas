<?php

namespace  Manzoli2122\Salao\Despesas\Http\Controllers;

//use Illuminate\Http\Request;
use Manzoli2122\Salao\Cadastro\Http\Controllers\Padroes\Controller ;

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
