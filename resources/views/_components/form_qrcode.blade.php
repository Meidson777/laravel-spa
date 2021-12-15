@if($errors->any())
<div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $erro)
            {{$erro}}
            <br>
        @endforeach
</div>
@endif
<form class="user" method="post" action="{{ route('admin.create.qrcode') }}">
    @csrf
    <!-- Code Cliente não visivel -->
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="hidden" class="form-control form-control-sm" id="Qrcode" readonly name="idQrCode">
        </div>
        <div class="col-sm-12">
            <input type="text" class="form-control form-control-sm" placeholder="N° QR: EX: 01" name="code" maxlength="3" minlength="1" required>
        </div>
        <div class="col-sm-12">
            <input type="hidden" class="form-control form-control-sm" placeholder="N° QR: EX: 01" name="Code_idCliente" value="0">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <button type="submit" class="btn btn-primary btn-sm mr-2 mb-2">CADASTRAR</button>
        <a href="?op=MainCode" class="btn btn-danger btn-sm ">CANCELAR</a>
    </div>

</form>

<script>
    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }

    var code = makeid(20);
    document.getElementById("Qrcode").value = code;

</script>