@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )




@section( Config::get('app.templateMasterContent' , 'contentMaster')  )

    <section class="row text-center placeholders">
        <div class="col-12 col-sm-12 placeholder">
			<h5 style="text-align:center;">Cadastrar Adiantamento para {{ $funcionario->name}}</h5>
        </div>        
    </section>

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


    <section class="row text-center placeholders">
        <div class="col-2 col-sm-2 placeholder"></div>
        <div class="col-8 col-sm-8 placeholder">
        
             {!! Form::open(['route' => 'adiantamento.createAdiantamento', 'class' => 'form form-search form-ds'])!!}

                {{ Form::hidden('funcionario_id',  $funcionario->id ) }}
                {{ Form::hidden('tipo', 'adiantamento' ) }}
				<div class="form-group">
                    <label for="descricao" class="col-form-label">Descrição:</label>
                    {!! Form::text('descricao' , null , ['placeholder' => 'Descrição', 'class' => 'form-control'])!!}
				</div>
				<div class="form-group">
                    <label for="valor" class="col-form-label">Valor:</label>
                    {!! Form::number('valor', null, ['placeholder' => 'Valor', 'step' => '0.01', 'class' => 'form-control']) !!}
                </div>
				
				<div class="form-group">
                    {!! Form::submit('Enviar' , ['class' => 'btn btn-success']) !!}
				</div>
            {!! Form::close()!!}
        </div>   
        <div class="col-2 col-sm-2 placeholder"></div>     
    </section>


@endsection