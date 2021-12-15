@extends('layouts.Header')

@section('content')

<!-- Verifica se o usuario tem permissão para acessar  -->

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">

        <!-- Nested Row within Card Body -->

        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Atualizar Procedimento</h1>
            </div>
            
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $erro)
                        {{$erro}}
                        <br>
                    @endforeach
            </div>
            @endif

            
            
            <form class="user" method="POST" action=" {{ route('admin.create-procedure') }} ">
                @csrf
                <input type="text" name="id" value="{{ $procedure->idProcedimento }}">
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
                    <button type="submit"  class="btn btn-primary btn-sm mr-2 mb-2">ATUALIZAR</button>
                    <a href="{{ route('admin.procedure') }}" type="reset" class="btn btn-danger btn-sm ">CANCELAR</a>
                </div>
            </form>

        </div>

    </div>
</div>

@endsection