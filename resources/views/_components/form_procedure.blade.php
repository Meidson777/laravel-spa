@if($errors->any())
<div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $erro)
            {{$erro}}
            <br>
        @endforeach
</div>
@endif

<form class="user" method="POST" action="{{ route('admin.create-procedure') }}">
    @csrf
    <label for="">Dados Procedimento</label>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-sm" value="{{ $procedure->nomeProcedimento ?? old('nomeProcedimento')}}" name="nomeProcedimento" placeholder="NOME PROCEDIMENTO">
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-sm" value="{{ $procedure->descricaoProcedimento ?? old('descricaoProcedimento')}}" placeholder="DESCRIÇÃO" name="descricaoProcedimento">
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-sm" value="{{ $procedure->valorProcedimento ?? old('valorProcedimento')}}" placeholder="VALOR PROCEDIMENTO" name="valorProcedimento">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <button type="submit"  class="btn btn-primary btn-sm mr-2 mb-2">CADASTRAR</button>
        <a href="{{ route('admin.procedure') }}" type="reset" class="btn btn-danger btn-sm ">CANCELAR</a>
    </div>
</form>