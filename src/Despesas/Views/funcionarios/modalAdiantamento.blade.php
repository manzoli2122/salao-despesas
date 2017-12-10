
<div class="modal fade bd-example-modal-lg" id="adiantamentoModal{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="adiantamentoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="margin-left:50px;" class="modal-title" id="exampleModalLabel">Adicionar Adiantamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">        
                {!! Form::open(['route' => ['adiantamento.store' , $model->id ], 'class' => 'form form-search form-ds'])!!}
               
                    {{ Form::hidden('funcionario_id',  $model->id ) }}
                    {{ Form::hidden('tipo', 'adiantamento' ) }}

                   

                    <div class="form-group row">
                         <label for="descricao" class="col-form-label col-2 text-right">Descrição:</label>
                        {!! Form::text('descricao' , null , ['placeholder' => 'Descrição', 'class' => 'form-control col-9'])!!}
                        
                    </div>


                     <div class="form-group row">
                        <label for="valor" class="col-form-label col-2 text-right">Valor:</label>
                        {!! Form::number('valor', null, ['placeholder' => 'Valor', 'step' => '0.01', 'class' => 'form-control  col-9']) !!}
                
                    </div>


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



