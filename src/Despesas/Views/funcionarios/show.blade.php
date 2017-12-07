@extends('despesas::templates.templateDespesasLateral')


@section( Config::get('despesas.templateMasterContentTitulo' , 'titulo-page')  )			
		{{$model->name}}
	@endsection

	@section('small-titulo-page')				
		{{$model->email}}
	@endsection


@section( Config::get('despesas.templateMasterContent' , 'contentMaster')  )

	<section class="row text-center placeholders">
        
		<div class="col-12 col-sm-6">
			<p>Comissões a receber R$ {{number_format($model->valorBrutoSalario(), 2,',' , '')}} </p>	
		</div>



        
		<div class="col-12 col-sm-6">
			
		<table class="table table-bordered table-sm">
				<tr class="thead-dark">
					<th>Adiantamento não descontos</th>
					<th>Data</th>
					<th>Valor</th>
											
				</tr>
				@forelse($model->AdiantamentosSemSalario() as $adiantamento)				
					<tr>
						<td> {{$adiantamento->descricao}} </td>	
						<td> {{$adiantamento->created_at->format('d/m/Y')}} </td>	 	 		
						<td> R$ {{number_format($adiantamento->valor, 2 ,',' , '')}} </td>						
														
					</tr>
				@empty
					<tr>						
						<td>Nenhum atendimento encontrado</td>
					</tr>
                @endforelse
			</table>


		</div>
	
    </section>
		
		

	

	<section class="row text-center placeholders">
        
		<div class="col-12 col-sm-6">


		<p>Liquido a receber R$ {{number_format($model->valorSalarioLiquido(), 2,',' , '')}} </p>		


		</div>



    </section>
		
		

@include('despesas::funcionarios.modalAdiantamento')

@include('despesas::funcionarios.modalSalario')


@endsection