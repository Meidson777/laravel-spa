@php 
    $user_type = $_SESSION['user_type'];
@endphp
@extends('layouts.Header')

@section('content')

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <!-- Nested Row within Card Body -->
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Finalizar Serviço</h1>
            </div>
            <form class="user" method="POST" action="{{ route('admin.finish-service') }}">
                @csrf
                <!-- Code Cliente não visivel -->
                <input type="hidden" class="form-control" name="Servico_idServico" value="{{ $service[0]->idServico}}">
                <input type="hidden" class="form-control" name="Servico_IdCliente" value="{{ $service[0]->idCliente}}">
                <input type="hidden" class="form-control" name="Servico_IdProcedimento" value="{{ $service[0]->idProcedimento}}">
                <!-- Code Cliente não visivel -->

                <div class="form-group row">
                    <label for="exampleInputEmail1" class="form-label">Cliente</label>
                    <input readonly type="text" class="form-control form-control" id="" value="{{ $service[0]->nomeCliente}}">

                    <label for="exampleInputPassword1" class="form-label">Procedimento</label>
                    <input type="text" class="form-control form-control" id="" value="{{ $service[0]->nomeProcedimento}}" disabled>

                    <label for="" class="form-label">Tipo de Pagamento</label>
                    <select id="pagamento" name="tipoPagamento" class="form-select form-control" onChange="update()">
                        <option value="CARTAO">CARTAO</option>
                        <option value="DINHEIRO">DINHEIRO</option>
                        <option value="PIX">PIX</option>
                    </select>

                    <label for="exampleInputPassword1" class="form-label">Valor</label>
                    <input type="text" class="form-control form-control" id="valorProcedimento" name="valorProce" value="{{ $service[0]->valorProcedimento}}" readonly>


                    <!-- Caso pagamento seja em dinheiro mostrar essa parte -->
                    <div id="paymoney">
                        <label for="" class="form-label mt-2">Valor Recebido</label>
                        <input type="text" class="form-control form-control" name="valorPagamento" id="valorRecebido" onchange="geraTroco()">
                        <label for="" class="form-label">Troco</label>
                        <input type="text" class="form-control form-control" value="0" id="troco" name="troco" readonly name="troco">
                    </div>
                    <!-- Caso pagamento seja em dinheiro mostrar essa parte -->
                </div>
                <hr>
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary btn-sm m-1">FINALIZAR</button>
                    <button type="reset" class="btn btn-danger btn-sm m-1 ">CANCELAR</button>
                </div>
            </form>

        </div>

    </div>
</div>

<script>
    document.getElementById('valorRecebido').disabled = true;
    function update() {

        var select = document.getElementById('pagamento');
        var text = select.options[select.selectedIndex].text;
        console.log(text); // Português

        if (text == 'DINHEIRO') {

            document.getElementById('valorRecebido').disabled = false;
            
            $("#valorRecebido, #troco").on("input", function() {

                var valorProcedimento = document.getElementById("valorProcedimento").value;
                var valorRecebido = document.getElementById("valorRecebido").value;

                var troco = valorRecebido - valorProcedimento;
                var arredondando = parseFloat(troco.toFixed(2));
                document.getElementById('troco').value = arredondando;

            });
        }
        if (text == 'PIX') {
            document.getElementById('valorRecebido').disabled = true;
            document.getElementById("troco").value = '';
        }
        if (text == 'CARTAO') {
            document.getElementById('valorRecebido').disabled = true;
            document.getElementById("troco").value = '';
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
@endsection