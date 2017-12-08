@extends( Config::get('despesas.templateMaster' , 'templates.templateMaster')  )


		
		
@section( Config::get('despesas.templateMasterMenuLateral' , 'menuLateral')  )
			@if($apagados)
				@permissao('despesas')
					<li><a href="{{ route('despesas.index')}}"><i class="fa fa-circle-o text-blue"></i> <span>Despesas Ativas</span></a></li>
				@endpermissao
			@else
				@permissao('despesas-cadastrar')
					<li><a href="{{ route('despesas.create')}}"><i class="fa fa-circle-o text-blue"></i> <span>Cadastrar Despesa</span></a></li>
				@endpermissao
				@permissao('despesas-apagados')
					<li><a href="{{  route('despesas.apagados')}}"><i class="fa fa-circle-o text-red"></i> <span>Despesas Apagadas</span></a></li>
				@endpermissao
			@endif			
@endsection


@section( Config::get('despesas.templateMasterScript' , 'script')  )
        	<script>$(function(){setTimeout("$('.hide-msg').fadeOut();",5000)});</script>
@endsection


		
@section( Config::get('despesas.templateMasterCss' , 'css')  ) 			
			<style type="text/css">
					.btn-sm{
						padding: 1px 10px;
					}
					.pagination{
						margin:0px;
						display: unset;
						font-size:12px;
					}
			</style>
@endsection


@section( Config::get('despesas.templateMasterContentTitulo' , 'titulo-page')  )	
			Listagem das Despesa
			@if($apagados)
				 Apagados
			@endif						
@endsection

	

@section( Config::get('despesas.templateMasterContent' , 'contentMaster')  )
		<section class="row Listagens">
				<div class="col-12 col-sm-12 lista">		
					@if(Session::has('success'))
						<div class="alert alert-success hide-msg" style="float: left; width:100%; margin: 10px 0px;">
						{{Session::get('success')}}
						</div>
					@endif
				</div>
			</section>

			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">

							@if(isset($dataForm))
								{!! $models->appends($dataForm)->links() !!}
							@else
								{!! $models->links() !!}
							@endif


							@if($apagados)
								{!! Form::open(['route' => 'despesas.pesquisarApagados' , 'method' => 'get' ]) !!}
							@else
								{!! Form::open(['route' => 'despesas.pesquisar' , 'method' => 'get' ]) !!}
							@endif								
									<div class="input-group input-group-sm" style="width: 190px; margin-left:auto;">
										{!! Form::text('key' , null , ['class' => 'form-control' , 'placeholder' => 'Pesquisar Serviços' , 'aria-label' => 'Search']) !!}
										<div class="input-group-btn">
											<button style="margin-right:10px;" class="btn btn-outline-success my-2 my-sm-0 " type="submit">
												<i class="fa fa-search" aria-hidden="true"></i>
											</button>	
										</div>
									</div>			
							{!!  Form::close()  !!}
								
							

						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover table-striped">
								<tr>
									<th>Tipo</th>
									<th>Descrição</th>
									<th>Data</th>
									<th>Valor</th>					
									<th>Ações</th>
								</tr>
								@forelse($models as $model)				
									<tr>
										<td>  {{$model->tipo}} </td>											
										<td> {{ $model->descricao }} @if($model->tipo == 'adiantamento') - {{$model->funcionario->apelido}}  @endif </td>
										<td> {{ $model->created_at->format('d/m/Y') }} </td>				
										<td> R$ {{number_format($model->valor, 2,',','')}} </td>
										
										
										<td>
										
											@if($apagados)
												@permissao('despesas-show-apagados')								
														<a class="btn btn-success btn-sm" href='{{route("despesas.showapagado", $model->id)}}'>
															<i class="fa fa-eye" aria-hidden="true"></i>Exibir</a>								
												@endpermissao	

												@permissao('despesas-restore')
													<a class="btn btn-warning btn-sm" href='{{route("despesas.restore", $model->id)}}'>
														<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Reativar</a>
												@endpermissao 														
														
												@permissao('despesas-delete-mater-ulta-mega')	
													<a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="$(this).find('form').submit();" >
														{!! Form::open(['route' => ['despesas.destroy', $model->id ],  'method' => 'DELETE' ])!!}                                        
														{!! Form::close()!!}    
														<i class="fa fa-trash" aria-hidden="true"></i>Extinguir</a> 		        
													
												@endpermissao
											@else
												@permissao('despesas-show')								
														<a class="btn btn-success btn-sm" href='{{route("despesas.show", $model->id)}}'>
															<i class="fa fa-eye" aria-hidden="true"></i>Exibir</a>								
												@endpermissao	

												@permissao('despesas-editar')								
														<a class="btn btn-warning btn-sm" href='{{route("despesas.edit", $model->id)}}'>
															<i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>								
												@endpermissao				
											
												@permissao('despesas-soft-delete')			
													<a class="btn btn-danger btn-sm"  href="javascript:void(0);" onclick="$(this).find('form').submit();" >
															{!! Form::open(['route' => ['despesas.destroySoft', $model->id ],  'method' => 'DELETE' ])!!}                                        
															{!! Form::close()!!}    
															<i class="fa fa-trash" aria-hidden="true"></i>Apagar</a>													
												@endpermissao
											@endif
											
										</td>
									</tr>
								@empty
									
								@endforelse
							</table>
					</div>


					
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
				</div>
			</div>


@endsection