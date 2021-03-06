<?php

namespace Manzoli2122\Salao\Despesas\Http\Controllers;

use Manzoli2122\Salao\Cadastro\Http\Controllers\Padroes\Controller ;
use Manzoli2122\Salao\Despesas\Models\Adiantamento;
use Manzoli2122\Salao\Despesas\Models\Funcionario;
use Manzoli2122\Salao\Despesas\Models\Salario;
use Illuminate\Http\Request;

use ChannelLog as Log;

class FuncionarioController extends Controller
{

    protected $model;
    protected $adiantamento;
    protected $name = "Funcioanrios";
    protected $view = "despesas::funcionarios";
    protected $route = "funcionarios";
    protected $logCannel;


    public function __construct(Funcionario $funcionario, Adiantamento $adiantamento){
        $this->model = $funcionario; 

        $this->logCannel = 'despesas';

        $this->adiantamento = $adiantamento;        
        $this->middleware('auth');

    }



    public function index()
    {
        $models = $this->model::ativo()->get();
        return view("{$this->view}.index", compact('models', 'title'));
    }



    
    public function show($id)
    {
        $title = "Visualizando {$this->name}";
        $model = $this->model->ativo()->find($id);
        if($model)
            return view("{$this->view}.show", compact('model'));
        return redirect()->route("{$this->route}.index");
    }






    public function storeAdiantamento(Request $request, $id)
    {         
        $dataForm = $request->all();              
        $insert = $this->adiantamento->create($dataForm); 

        $msg =  "CREATEs - " . 'Adiantamento Cadastrado(a) com sucesso !! ' . $insert . ' responsavel: ' . session('users') ;
        Log::write( $this->logCannel , $msg  ); 

        return redirect()->route("{$this->route}.show", ['id' => $id]);   
    }





    
    public function storeSalario($id)
    {        
        $funcionario = Funcionario::find($id);
        if($funcionario->valorSalarioLiquido()<=0){
            return  redirect()->route("funcionarios.show",['id' => $id]);
        }

        //$valor = 0.0;
        
        $salario = new Salario();
        $salario->funcionario()->associate($funcionario);
        $salario->valor =  $funcionario->valorSalarioLiquido() ;
        $salario->tipo = 'salario';
        $salario->descricao = $funcionario->name;
        $salario->save();

        foreach(   $funcionario->AtendimentosSemSalario() as $servico){
            $servico->salario()->associate($salario);
            $servico->save();
            //$valor = $valor + (($servico->servico->valor - $servico->desconto) * ($servico->servico->porcentagem_funcionario / 100 )) ;
        }



        foreach(  $funcionario->AdiantamentosSemSalario() as $adiantamento){
            $adiantamento->salario()->associate($salario);
            $adiantamento->save();
            //$valor = $valor - $adiantamento->valor  ;
        }



        $msg =  "CREATEs - " . 'Salario Cadastrado(a) com sucesso !! ' . $salario . ' responsavel: ' . session('users') ;
        Log::write( $this->logCannel , $msg  ); 
       // $salario->valor =  $valor ;       
       // $salario->save();

       return redirect()->route("{$this->route}.show", ['id' => $id]);          
       
        
    }
    


}
