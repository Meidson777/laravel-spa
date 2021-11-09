<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SPA Admin - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
</head>

<body class="bg-gradient-warning">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col d-lg-block">
                                <img src="{{ asset('img/logo.png')}}" class="img-fluid img-thumbnail">
                            </div>
                            <div class="col-lg-7 justify-content-center">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem Vindo !</h1>
                                    </div>
                                    @if($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                                @foreach ($errors->all() as $erro)
                                                    {{$erro}}
                                                    <br>
                                                @endforeach
                                        </div>
                                    @endif

                                    @if(isset($erro))
                                        <div class="alert alert-danger" role="alert">
                                            
                                               {{$erro}}
                                           
                                        </div>
                                    @endif
                                    
                                    <form method="POST" action="{{route('login-auth')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" value="{{ old('email') }}" class="form-control form-control-sm mb-2" id="exampleInputEmail" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" value="{{ old('senha') }}"  class="form-control form-control-sm mb-2" id="exampleInputPassword" placeholder="Senha" name="senha">
                                        </div>
                                        <input type="submit" value="Entrar" class="btn btn-sm btn-primary">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- <a class="small" href="">Esqueceu sua senha</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>