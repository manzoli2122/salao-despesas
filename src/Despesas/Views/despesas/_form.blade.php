<div class="box-body">	
     <div class="row">
        <div class="col-md-6">

            <div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
                <label for="categoria">Nome</label>
                 <select class="form-control" name="categoria"  required>
                    <option value="">Selecione a Categoria</option>
                    <option value="energia" >  energia  </option>
                    <option value="água" >  água  </option>
                    <option value="telefone" >  telefone  </option>
                    <option value="internet" >  internet </option>
                    <option value="aluguel" >  aluguel  </option>
                    <option value="produtos" >  produtos  </option>
                    <option value="impostos" >  impostos  </option>
                    <option value="limpeza" >  limpeza  </option>
                    <option value="assessoria contábil" >  assessoria contábil  </option>
                    <option value="manutenção" >  manutenção  </option>
                    <option value="avon" >  avon  </option>
                    <option value="Outros" >  Outros  </option>
                </select>             
                {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
                <label for="valor">Valor</label>
                <input type="number" step="0.01" class="form-control" name="valor" placeholder="Valor"
                    value="{{$model->valor or old('valor')}}">
                {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
            </div>   
            
        </div>
        <div class="col-md-6">


            <div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" placeholder="Descrição"
                    value="{{$model->descricao or old('descricao')}}">
                {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
            </div>

        </div> 
    </div> 
 </div>  
    