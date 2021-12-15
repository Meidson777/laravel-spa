@extends('layouts.Header')

@section('content')

<!-- Verifica se o usuario tem permissão para acessar  -->

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">

        <!-- Nested Row within Card Body -->

        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Agendamento</h1>
            </div>
            

            <form class="user" method="post"  action="{{ route('admin.new-scheduling') }}">
                @csrf
                <!-- Code Cliente não visivel -->
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

                    <label for="" class="form-label">Data Agendamento</label>
                    <input type="datetime-local" class="form-control" name="dataAgendamento" required>
                </div>


                <hr>
                <div class="form-group row">
                    <button type="submit" name="btnCadAgendamento" id="BtnAgendar" class="btn btn-primary btn-sm mr-2 mb-2">AGENDAR</button>
                    <button type="reset" class="btn btn-danger btn-sm ">CANCELAR</button>
                </div>
            </form><br> 
            <small><a href="?op=NovoCliente">Não achou o cliente ?</a></small>


        </div>

    </div>
</div>

@endsection