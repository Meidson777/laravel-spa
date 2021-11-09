// Gera codigo randomico para qrcode cliente
function GerarCodeNumber() {
    var code = Math.floor(Math.random() * 1000000050000);
    document.getElementById("code").value = code;
}
// cria qrcode 
function createQrCode() {

    document.getElementById('qrcode').innerHTML ='';
    var userInput = document.getElementById('valor').value;
    var qrcode = new QRCode("qrcode", {
        text: userInput,
        width: 200,
        height: 200,
        colorDark: "black",
        colorLight: "white",
        correctLevel: QRCode.CorrectLevel.H
    });

    creatBtnDownQrcode();
    reloadPage();
}

function creatBtnDownQrcode() {
    document.getElementById('btndowndiv').innerHTML = '<button class="btn btn-success" id="btndown" onClick="down()"><i class="fas fa-download"></i> Download QR Code</button>';

}
function reloadPage() {
    $(document).ready(function () {
        setInterval(function () {
            cache_clear()
        }, 10000);

    });

    function cache_clear() {
        window.location.reload(true);
        // window.location.reload(); use this if you do not remove cache
    }
}


// Download QRCode Code
function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    delete link;
}

function down() {
    let code = document.getElementById('valor').value;
    console.log(code);
    let dataUrl = document.querySelector('#qrcode').querySelector('img').src;
    downloadURI(dataUrl, code + '-qrcode.png');
}
// Download QRCode Code

function SearchCode() {

    let scanner = new Instascan.Scanner(
        {
            video: document.getElementById('preview')
        }
    );
    scanner.addListener('scan', function (content) {
        // alert('Escaneou o conteudo: ' + content);
        window.location.href = '?op=BuscaClienteQr&id=' + content;
        // window.location.href = "../app/src/views/QrCodeBusca/BuscaCliente.php?id="+ content;
    });
    Instascan.Camera.getCameras().then(cameras => {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error("Não existe câmera no dispositivo!");
        }
    });
}