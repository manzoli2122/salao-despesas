<div class="modal fade bd-example-modal-lg" id="salarioModal{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="salarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:90%;" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:green; color:white;">               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Adicionar Salario</h4>
            </div>
            <div class="modal-body"> 
                <form method="POST" action="{{route('salario.store', $model->id)}}" accept-charset="UTF-8" class="form form-search form-ds">
                    {{csrf_field()}}                    	
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h1>Liquido a receber R$ {{number_format($model->valorSalarioLiquido(), 2,',' , '')}}  </h1>
                        </div>                                                 
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <h1> <input class="btn btn-success" value="Cadastrar Salário" type="submit"> </h1>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <h1> <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> </h1>
                        </div>
                    </div>                                       
                </form>
                <section class="row text-center relatorio"> 
                    <div class="col-12 col-sm-9 comissoes" style="margin-bottom:10px; ">
                        <h3 style=" background:green; color:white;" > Comissões a receber R$ {{number_format($model->valorBrutoSalario(), 2,',' , '')}} (Bruto)</h3>
                        <div class="row">  
                            @forelse($model->AtendimentosSemSalario() as $atendimento)                                 
                                <div class="col-md-4">
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">{{$atendimento->servico->nome}}</h3>                                                          
                                        </div>                        
                                        <div class="box-body">                               
                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-info clearfix">                               
                                                    <span class="pull-left">{{$atendimento->created_at->format('d/m/Y')}}</span>
                                                    <span class="pull-right badge bg-red">Bruto R$ {{number_format($atendimento->valor, 2 ,',' , '')}}</span>
                                                </div>
                                                <div class="direct-chat-info clearfix">                               
                                                    <span class="pull-left">
                                                        @if($atendimento->cliente->apelido!= '')
                                                            {{$atendimento->cliente->apelido}}
                                                        @else 
                                                            {{$atendimento->cliente->name}}
                                                        @endif	
                                                    </span>
                                                    <span class="pull-right badge bg-green">Liquido R$ {{number_format($atendimento->valorFuncioanrio(), 2 ,',' , '')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            @empty				
                            @endforelse  
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 vales" style="margin-bottom:0px;">
                        <h3 style=" background:orange; color:white;" >Vales R$ {{number_format($model->valorAdiantamento(), 2,',' , '')}}      </h3>         
                        <div class="row">                        
                            @forelse($model->AdiantamentosSemSalario() as $adiantamento)					
                                <div class="col-md-12">
                                    <div class="box box-warning">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">{{$adiantamento->descricao}}</h3>															
                                        </div>                        
                                        <div class="box-body">                               
                                            <div class="direct-chat-msg">											
                                                <div class="direct-chat-info clearfix">                               
                                                    <span class="pull-left"> {{$adiantamento->created_at->format('d/m/Y')}} </span>
                                                    <span class="pull-right badge bg-orange">R$ {{number_format($adiantamento->valor, 2 ,',' , '')}} </span>
                                                </div>
										    </div>
								        </div>
							        </div>
						        </div>  					
					        @empty				
					        @endforelse							
                        </div>  
                    </div>
                </section>      
            </div>            
        </div>
    </div>
</div>