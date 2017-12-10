
<div class="modal fade bd-example-modal-lg" id="adiantamentoModal{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="adiantamentoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:orange; color:white;">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 style="margin-left:50px;" class="modal-title" id="exampleModalLabel"><b>Adicionar Adiantamento</b></h4>
            </div>
            <div class="modal-body">        
                
                
                {!! Form::open(['route' => ['adiantamento.store' , $model->id ], 'class' => 'form form-search form-ds'])!!}
               
                    {{ Form::hidden('funcionario_id',  $model->id ) }}
                    {{ Form::hidden('tipo', 'adiantamento' ) }}

                   <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="descricao" class="col-form-label text-right">Descrição:</label>
                                {!! Form::text('descricao' , null , ['placeholder' => 'Descrição', 'class' => 'form-control'])!!}                                
                            </div>

                            <div class="form-group">
                                <label for="valor" class="col-form-label text-right">Valor:</label>
                                {!! Form::number('valor', null, ['placeholder' => 'Valor', 'step' => '0.01', 'class' => 'form-control']) !!}                        
                            </div>
                        
                        </div>

                    </div>
                     


                    <div class="row">
                        <div class="col-5 col-md-5">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                        <div class="col-5 col-md-5 ml-auto">
                            <div class="form-group">
                                {!! Form::submit('Enviar' , ['class' => 'btn btn-warning']) !!}
                            </div>
                        </div>
                    </div>
                    
                    
                {!! Form::close()!!}

      
      
            </div>

            
        </div>
    </div>
</div>



