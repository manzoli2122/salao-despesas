@extends( Config::get('despesas.templateMaster' , 'templates.templateMaster')  )



@section( Config::get('despesas.templateMasterContentTitulo' , 'titulo-page')  )			
		Cadastrar / Editar Serviços
@endsection

    
@section( Config::get('despesas.templateMasterCss' , 'css')  ) 		
		<link rel="stylesheet" href="{{url('/bower_components/select2/dist/css/select2.min.css')}}">
@endsection


@section( Config::get('despesas.templateMasterScript' , 'script')  )	
        <script src="{{url('/bower_components/select2/dist/js/select2.full.min.js')}}"></script>			
@endsection



@section( Config::get('despesas.templateMasterContent' , 'contentMaster')  )
    
    <section class="row text-center placeholders">
        <div class="col-12 col-sm-12 placeholder">
            @if(isset($errors) && count($errors)>0)
                <div class="alert alert-warning">
                    @foreach($errors->all() as $erro)
                        <p>{{$erro}}</p>
                    @endforeach
                </div>
            @endif
        </div>        
    </section>


    
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">FORMULÁRIO</h3>
        </div>

         @if( isset($model))
                    {!! Form::model($model , ['route' => ['despesas.update' , $model->id], 'method' => 'PUT' , 'role' => 'form'])!!}
                @else
                    {!! Form::open(['route' => 'despesas.store', 'role' => 'form' ])!!}
                    {{ Form::hidden('tipo', 'despesa' ) }} 
                    
                @endif

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">


                             <div class="form-group" id="form-bandeira" >
                                <label for="categoria" >Categoria:</label>
                                {!! Form::select('categoria', 
                                    [
                                        'energia' => 'energia',
                                        'água' => 'água', 
                                        'telefone' => 'telefone',
                                        'internet' => 'internet',
                                        'aluguel' => 'aluguel',
                                        'produtos' => 'produtos',
                                        'impostos' => 'impostos',
                                        'limpeza, higiene' => 'limpeza, higiene',
                                        'assessoria contábil' => 'assessoria contábil',
                                        'manutenção' => 'manutenção',
                                        'Outros' => 'Outros'
                                    ]
                                    , null ,  ['placeholder' => 'Selecione a Categoria' , 'class' => 'form-control' ] ) !!}

                            </div>

                            <div class="form-group">
                                <label for="valor">Valor:</label>
                                {!! Form::number('valor', null, ['placeholder' => 'valor', 'step' => '0.01', 'class' => 'form-control']) !!}
                                
                                </div>
                            </div>


                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="descricao" >Descrição:</label>
                                {!! Form::text('descricao' , null , ['placeholder' => 'descricao', 'class' => 'form-control'])!!}
                            </div>
                       
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    
                        {!! Form::submit('Enviar' , ['class' => 'btn btn-success btn-sm']) !!}    
                        
                        <a class="btn btn-warning btn-sm" style="margin-left:50px;" href="{{ URL::previous()}}">Voltar</a>     
                              
                </div>


                {!! Form::close()!!}
        </div>
        
@endsection