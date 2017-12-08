<?php

namespace Manzoli2122\Salao\Despesas\Http\Controllers;


use Manzoli2122\Salao\Despesas\Models\Adiantamento;
use Manzoli2122\Salao\Despesas\Models\Funcionario;
use Manzoli2122\Salao\Despesas\Models\Salario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    protected $model;

    protected $adiantamento;

    protected $name = "Funcioanrios";

    protected $view = "despesas::funcionarios";

    protected $route = "adiantamento";



    public function __construct(Funcionario $funcionario, Adiantamento $adiantamento){
        $this->model = $funcionario; 
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
        return redirect()->route("funcionarios.index");
    }














    public function storeAdiantamento(Request $request, $id)
    {         
        $dataForm = $request->all();              
        $insert = $this->adiantamento->create($dataForm); 

        return redirect()->route("funcionarios.show", ['id' => $id]);          
        
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



        
       // $salario->valor =  $valor ;       
       // $salario->save();

       return redirect()->route("funcionarios.show", ['id' => $id]);          
       
        
    }
    


}
