<?php

namespace Manzoli2122\Salao\Despesas\Http\Controllers;

use Manzoli2122\Salao\Despesas\Models\Despesa;
use Illuminate\Http\Request;
use Manzoli2122\Salao\Cadastro\Http\Controllers\Padroes\SoftDeleteController ;

class DespesaController extends SoftDeleteController
{

    

    protected $model;
    protected $name = "Despesas";
    protected $view = "despesas::despesas";
    protected $route = "despesas";



    public function __construct(Despesa $despesa  ){
        $this->model = $despesa;       
        $this->middleware('auth');

        $this->middleware('permissao:despesas')->only([ 'index' , 'show' , 'pesquisar' ]) ;        
        $this->middleware('permissao:despesas-cadastrar')->only([ 'create' , 'store']);
        $this->middleware('permissao:despesas-editar')->only([ 'edit' , 'update']);
        $this->middleware('permissao:despesas-soft-delete')->only([ 'destroySoft' ]);
        $this->middleware('permissao:despesas-restore')->only([ 'restore' ]);
                $this->middleware('permissao:despesas-admin-permanete-delete')->only([ 'destroy' ]);
        $this->middleware('permissao:despesas-apagados')->only([ 'indexApagados' , 'showApagado' , 'pesquisarApagados']) ;
                   

    }
    

    public function index()
    {
        $apagados = false;
        $models = $this->model->index($this->totalPage);
        return view("{$this->view}.index", compact('models', 'apagados'));
    }
       


}
