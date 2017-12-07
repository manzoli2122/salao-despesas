
<div class="modal fade bd-example-modal-lg" id="salarioModal" tabindex="-1" role="dialog" aria-labelledby="salarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width:90%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="margin-left:50px;" class="modal-title" id="exampleModalLabel">Adicionar Salario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 


                <section class="row text-center placeholders">
                    <div class="col-12 col-sm-12 placeholder">
                        <hr>
                        @forelse($model->AtendimentosSemSalario() as $servico)

                            <div class="row">	
                                <div class="col-4 text-left">			
                                    <p><b>{{$servico->servico->nome}}  </b>    </p>						
                                    
                                </div>
                                <div class="col-2 text-right">
                                    {{-- Carbon\Carbon::parse($servico->created_at)->format('d/m/Y ') --}}			
                                    {{ $servico->created_at->format('d/m/Y')}}						
                                </div>
                                <div class="col-2 text-right">			
                                    <p>  {{$servico->cliente->name }} </p>						
                                </div>
                                <div class="col-2 text-right">			
                                    <p> Valor R$ {{  number_format($servico->valor  , 2 ,',', '') }} </p>						
                                </div>
                                <div class="col-1 text-right">			
                                    <p>  {{$servico->porcentagem_funcionario }}% </p>						
                                </div>
                                <div class="col-1 text-right">			
                                    <p> R$ {{ number_format( $servico->valorFuncioanrio()  , 2 ,',', '') }} </p>						
                                </div>
                            </div>                            
                            <hr>
                        @empty                                                    
                                <p>Nenhum usuario encontrado</td>                            
                        @endforelse

                            <div class="row">	
                                <div class="col-4 text-left">  </div>
                                <div class="col-2 text-right"></div>
                                <div class="col-2 text-right"></div>
                                <div class="col-2 text-right">Total Bruto</div>
                                <div class="col-2 text-right">			
                                    <p> R$ {{ number_format( ($model->valorBrutoSalario() )  , 2 ,',', '') }} </p>						
                                </div>
                            </div>  
                    </div> 

                    
                    <div class="col-12 col-sm-12 placeholder">
                    <hr>
                        <h4 style="text-align:center;">Adiantamentos</h4>
                    </div>  

                    <div class="col-12 col-sm-12 placeholder">
                        <hr>
                            @forelse($model->AdiantamentosSemSalario() as $adiantamento)

                                <div class="row">	
                                    <div class="col-4 text-left">			
                                        <p><b>{{ $adiantamento->descricao }}  </b>    </p>						
                                        
                                    </div>
                                    <div class="col-4 text-right">
                                        {{-- Carbon\Carbon::parse($servico->created_at)->format('d/m/Y ') --}}			
                                        {{ $adiantamento->created_at->format('d/m/Y')}}						
                                    </div>
                                    <div class="col-4 text-right">			
                                        <p> Valor R$ {{  number_format($adiantamento->valor  , 2 ,',', '')  }} </p>						
                                    </div>
                                    
                                </div>
                                
                                <hr>

                            @empty
                                                        
                                    <p>Nenhum usuario encontrado</td>
                                
                            @endforelse
                            <div class="row">	
                                <div class="col-4 text-left">  </div>
                                <div class="col-2 text-right"></div>
                                <div class="col-2 text-right"></div>
                                <div class="col-2 text-right">Total Adiantamento</div>
                                <div class="col-2 text-right">			
                                    <p> R$ {{ number_format( ($model->valorAdiantamento() )  , 2 ,',', '') }} </p>						
                                </div>
                            </div>  
                    </div> 



                    <div class="col-12 col-sm-12 placeholder">
                        <hr>                           
                            <div class="row" style="color:red">	
                                <div class="col-4 text-left">  </div>
                                <div class="col-2 text-right"></div>
                                <div class="col-2 text-right"></div>
                                <div class="col-2 text-right">Valor Salário Liquido</div>
                                <div class="col-2 text-right">			
                                    <p> R$ {{ number_format( ($model->valorSalarioLiquido() )  , 2 ,',', '') }} </p>						
                                </div>
                            </div>  
                            <hr> 
                    </div> 

                </section>





                {!! Form::open(['route' => ['salario.store' , $model->id ], 'class' => 'form form-search form-ds'])!!}
               
                    <div class="row">
                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                        <div class="col-4 col-md-4 ml-auto">
                            <div class="form-group">
                                {!! Form::submit('Enviar' , ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                    </div>
                                   
                {!! Form::close()!!}

      
      
            </div>

            
        </div>
    </div>
</div>



