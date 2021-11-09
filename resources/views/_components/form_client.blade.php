@if($errors->any())
<div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $erro)
            {{$erro}}
            <br>
        @endforeach
</div>
@endif
<form class="user" method="post" action="{{ route('admin.create-client') }}">
    @csrf
    <!-- Code Cliente não visivel -->
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="hidden" class="form-control form-control-user" name="qrcode" id="code">
    </div>
    <label for="">Dados Pessoais</label>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-sm" value="{{ old('nomeCliente') }}" name="nomeCliente" placeholder="Nome Completo">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" value="{{ old('cpfCliente') }}" required placeholder="CPF" name="cpfCliente" SIZE="11" MAXLENGTH="11" minlength="11">
        </div>
        <div class="col-sm-3">
            <input type="date" class="form-control form-control-sm" required placeholder="DATA DE NASCIMENTO" name="dataNascimento">
        </div>

    </div>

    <hr>
    <label for="">Contato</label>
    <!-- Contato -->
    <div class="form-group row">
        <div class="col-sm-2 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-sm" value="{{ old('ddd') }}" required placeholder="DDD" name="ddd" SIZE="2" MAXLENGTH="2" minlength="2">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" value="{{ old('telefoneCliente') }}" required placeholder="CONTATO Ex: 99999-9999" name="telefoneCliente" SIZE="9" MAXLENGTH="9" minlength="9">
        </div>
        <div class="col-sm-7">
            <input type="email" class="form-control form-control-sm" value="{{ old('emailCliente') }}" required placeholder="EMAIL" name="emailCliente">
        </div>
    </div>
    <hr>
    <label for="">Endereço</label>
    <div class="form-group row">
        <div class="col-sm-2 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-sm" value="{{ old('cep') }}" placeholder="CEP" name="cep">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" value="{{ old('rua') }}" placeholder="RUA" name="rua">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" value="{{ old('numeroCasa') }}" placeholder="N° RESIDENCIA" name="numeroCasa">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" value="{{ old('bairro') }}" placeholder="BAIRRO" name="bairro">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" value="{{ old('cidade') }}" placeholder="CIDADE" name="cidade">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" value="{{ old('estado') }}" placeholder="ESTADO" name="estado">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary btn-sm mr-2 mb-2">CADASTRAR</button>
        <a href="{{ route('admin.clients') }}" class="btn btn-danger btn-sm ">CANCELAR</a>
    </div>
</form>

