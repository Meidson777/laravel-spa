@extends('layouts.Header')

@section('content')

<!-- chama  o script para leitura do qrcode -->
<script src="{{ asset('js/main.js')}}"></script>
<!-- chama  o script para leitura do qrcode -->


<div style="flex:1;justify-content:center; text-align: center;margin-bottom: 20px;">
    <div style="display: inline-block; border-radius:10px; ">
        <div style="width: 100%; border-radius:10px;" id="reader"></div>
    </div>
</div>

<!-- Reader Scanner QrCode -->
<script>

    function onScanSuccess(decodedText, decodedResult) {
        
        window.location.href = '/admin/scann/' + decodedText;
            // window.location.href = {{ route("admin.scanned")}} + decodedText;
        // alert(decodedText);
    }
    
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        });
    html5QrcodeScanner.render(onScanSuccess);



</script>
<!-- Reader Scanner QrCode -->

@endsection
