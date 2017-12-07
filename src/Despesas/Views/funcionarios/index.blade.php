@extends( Config::get('despesas.templateMaster' , 'templates.templateMaster')  )



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
				Listagem dos Funcionarios						
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
						
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover table-striped">
								<tr>
									<th>Nome</th>
									<th></th>
									<th>Adiantamento</th>
									<th>Salário</th>
								</tr>
								@forelse($models as $model)				
									<tr>
										<td> {{$model->name}} </td>	
										<td>
											@permissao('funcionarios')								
												<a class="btn btn-success btn-sm" href='{{route("funcionarios.show", $model->id)}}'>
													<i class="fa fa-eye" aria-hidden="true"></i>Exibir</a>								
											@endpermissao							
										</td>
		
										<td>
											@permissao('adiantamento-cadastrar')
												<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#adiantamentoModal">
													<i class="fa fa-plus" aria-hidden="true"></i>
													Cadastrar  
												</a>
											@endpermissao											
										</td>

										<td>
											@permissao('salario-cadastrar')
												<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#salarioModal">
													<i class="fa fa-plus" aria-hidden="true"></i>
													Cadastrar  
												</a>
											@endpermissao											
										</td>


									</tr>
								@empty									
								@endforelse
							</table>
					</div>
				</div>
				</div>
			</div>



@endsection