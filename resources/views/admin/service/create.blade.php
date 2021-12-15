@php 
    $user_type = $_SESSION['user_type'];
@endphp
@extends('layouts.Header')

@section('content')

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">

        <!-- Nested Row within Card Body -->
@if(isset($msg))
    {{$msg}}
@endif
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Cadastrar Serviço</h1>
            </div>
            <form class="user" method="POST" action="{{ route('admin.create-service') }}">
                @csrf
                <input type="hidden" name="statusServico" value="Em Andamento">
                <div class="form-group row">
                    <label for="inputState" class="form-label">Cliente</label>
                    <select id="inputState" class="form-select form-control mb-2" name="Cliente_idCliente">
                        @foreach ($clients as $item)
                                    <option value="{{ $item->idCliente }}">{{ $item->nomeCliente }}</option>
                        @endforeach
                    </select>

                    <label for="inputState" class="form-label">Procedimento</label>
                    <select id="inputState" class="form-select form-control mb-2" name="Procedimento_idProcedimento">
                        @foreach ($procedure as $item)
                            <option value="{{ $item->idProcedimento }}">{{ $item->nomeProcedimento }}</option>
                        @endforeach
                    </select>
                    <!-- se o usuario for diferente de 0 mostra o select -->
                      @if($user_type != 0) 
                        <label for="inputState" class="form-label">Funcionario</label>
                        <select id="inputState" class="form-select form-control mb-2" name="Funcionario_idFuncionario">
                            @foreach ($employee as $item)
                                <option value="{{ $item->idFuncionario }}">{{ $item->nomeFuncionario }}</option>
                            @endforeach
                        </select>
                       @else
                            <input type="hidden" name="Funcionario_idFuncionario" value="@php echo $_SESSION['user_id']; @endphp">
                    @endif
                    <!-- se o usuario for diferente de 0 mostra o select -->

                    <label for="inputState" class="form-label">CODE</label>
                    <select id="inputState" class="form-select form-control mb-2" name="qrcode">
                        @foreach ($qrcode as $item)
                            <option value="{{ $item->idQrCode }}">{{ $item->code }}</option>
                        @endforeach
                    </select>

                    <!-- Adicionar um funcionario auxiliar -->
                    <div id="auxiliarFuncio">
                        <label for="inputState" class="form-label">Auxiliar</label>
                        <select id="inputState" class="form-select form-control mb-2" name="idFuncionarioAuxiliar">
                            @foreach ($employee as $item)
                                <option value="{{ $item->idFuncionario }}">{{ $item->nomeFuncionario }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Adicionar um funcionario auxiliar -->
                </div>


                <hr>
                <div class="form-group row">
                    <button type="submit" name="btnCadServico" class="btn btn-primary btn-sm mr-2 mb-2 ">CADASTRAR</button>
                    <button type="reset" class="btn btn-danger btn-sm ">CANCELAR</button>
                </div>
            </form>

            <br><button type="submit" class="btn btn-success btn-sm mr-2" id="btnAuxiliar" name="BtnAux" onclick="visibilityCamp()">Funcionario Auxiliar</button><br>
            <button type="submit" class="btn btn-danger btn-sm " id="btnAuxiliar2" onclick="visibilityCamp2()">Cancelar</button>

        </div>

    </div>
</div>
<script>
    document.getElementById('btnAuxiliar2').style.visibility = "hidden"
    document.getElementById('auxiliarFuncio').style.visibility = "hidden"

    function visibilityCamp() {
        document.getElementById('auxiliarFuncio').style.visibility = "visible"
        document.getElementById('btnAuxiliar').style.visibility = "hidden"
        document.getElementById('btnAuxiliar2').style.visibility = "visible"

    }

    function visibilityCamp2() {
        document.getElementById('auxiliarFuncio').style.visibility = "hidden"
        document.getElementById('btnAuxiliar').style.visibility = "visible"
        document.getElementById('btnAuxiliar2').style.visibility = "hidden"

    }
</script>

@endsection