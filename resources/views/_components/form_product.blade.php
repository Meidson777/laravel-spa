@if($errors->any())
<div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $erro)
            {{$erro}}
            <br>
        @endforeach
</div>
@endif

<form class="user" method="POST" action="{{ route('admin.create-product') }}">
@csrf
    <!-- Code Cliente não visivel -->
    <label for="">Dados Produto</label>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-sm" id="" name="nomeProduto" placeholder="NOME PRODUTO">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" placeholder="DESCRIÇÃO" name="descricaoProduto">
        </div>
        <div class="col-sm-4">
            <label for="">TIPO PRODUTO</label>
            <select name="tipoProduto" class="form-select form-control-sm">
                <!-- <option value="VENDA">VENDA</option> -->
                <option value="PROCEDIMENTO">PROCEDIMENTO</option>
            </select>
        </div>
        <div class="col-sm-4 mt-3">
            <input type="text" class="form-control form-control-sm" placeholder="VALOR COMPRA" name="valorCompra">
        </div>
        <div class="col-sm-4 mt-3">
            <input type="number" class="form-control form-control-sm" placeholder="VALOR VENDA" name="valorVenda">
        </div>

    </div>
    <hr>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary btn-sm mr-2 mb-2">CADASTRAR</button>
        <a href="{{ route('admin.products') }}" class="btn btn-danger btn-sm ">CANCELAR</a>
    </div>
</form>