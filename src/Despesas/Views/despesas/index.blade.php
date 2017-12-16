@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )
	Listagem das Despesas
@endsection



@section( Config::get('app.templateMasterMenuLateral' , 'menuLateral')  )				
	@permissao('despesas-apagados')
		<li><a href="{{  route('despesas.apagados')}}"><i class="fa fa-circle-o text-red"></i> <span>Despesas Apagadas</span></a></li>
	@endpermissao
@endsection


		

@section( Config::get('app.templateMasterContent' , 'content')  )

<div class="col-xs-12">
    <div class="box box-success">
		@permissao('operadoras-cadastrar')
        	<div class="box-header align-right">			
				<a href="{{ route('despesas.create')}}" class="btn btn-success" title="Adicionar uma nova Operadora">
					<i class="fa fa-plus"></i> Cadastrar Despesa
				</a>			           
        	</div>
		@endpermissao 

        <div class="box-body">
            <table class="table table-bordered table-striped table-hover" id="datatable">
                <thead>
                    <tr>
						<th pesquisavel>ID</th>
						<th pesquisavel>Tipo</th>
						<th>Descrição</th>
						<th>Data</th>
						<th>Valor</th>		
						
                        <th class="align-center" style="width:100px">Ações</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection


@push(Config::get('app.templateMasterScript' , 'script') )
	<script src="{{ mix('js/datatables-padrao.js') }}" type="text/javascript"></script>

	<script>
		$(document).ready(function() {
			var dataTable = datatablePadrao('#datatable', {
				order: [[ 0, "asc" ]],
				ajax: { 
					url:'{{ route('despesas.getDatatable') }}'
				},
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'tipo', name: 'tipo' },
					{ data: 'descricao', name: 'descricao' },
					{ data: 'created_at', name: 'created_at' },
					{ data: 'valor', name: 'valor' },
				
					{ data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
				],
			});

			dataTable.on('draw', function () {
				$('[btn-excluir]').click(function (){
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'operadora'])", "{{ route('despesas.apagados') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});
			});
		});
	</script>
@endpush


