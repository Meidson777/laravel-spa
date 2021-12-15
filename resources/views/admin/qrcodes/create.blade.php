@extends('layouts.Header')

@section('content')

<!-- Verifica se o usuario tem permissão para acessar  -->

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">

        <!-- Nested Row within Card Body -->

        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Cadastrar QrCode</h1>
            </div>
            
            @component('_components.form_qrcode')
                
            @endcomponent

        </div>

    </div>
</div>

@endsection