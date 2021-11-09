@if($errors->any())
<div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $erro)
            {{$erro}}
            <br>
        @endforeach
</div>
@endif
<form class="user" method="POST" action="{{ route('admin.create-employee')}}">
    @csrf
    <label for="">Dados Pessoais</label>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-sm" value="{{ old('nomeFuncionario') }}" name="nomeFuncionario" placeholder="Nome Completo">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" value="{{ old('cpfFuncionario') }}" placeholder="CPF" name="cpfFuncionario" SIZE="11" MAXLENGTH="11" minlength="11">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" value="{{ old('telefoneFuncionario') }}" placeholder="CONTATO Ex: ddd 99999-9999" name="telefoneFuncionario" SIZE="11" MAXLENGTH="11" minlength="11">
        </div>
    </div>

    <hr>
    <!-- Contato -->
    <div class="form-group row">

        <div class="col-sm-3">
            <input type="email" class="form-control form-control-sm" value="{{ old('emailFuncionario') }}" placeholder="EMAIL" name="emailFuncionario">
        </div>
        <div class="col-sm-3">
            <input type="password" class="form-control form-control-sm" placeholder="senha" name="senha">
        </div>
        <div class="col-sm-3">
            <input type="password" class="form-control form-control-sm" placeholder="confirmar senha" name="senha2">
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
            <input type="text" class="form-control form-control-sm" value="{{ old('numCasa') }}" placeholder="N° RESIDENCIA" name="numCasa">
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
        <button type="submit" name="btnCadFuncionario" class="btn btn-primary btn-sm mr-2 mb-2">CADASTRAR</button>
        <a href="index.php" class="btn btn-danger btn-sm ">CANCELAR</a>
    </div>
</form>