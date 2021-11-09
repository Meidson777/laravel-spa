<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINK BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- ===== CSS SIDEBAR ===== -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css')}}">

    

    <!-- SCRIPT PASTE MAIN -->
    <script src="{{ asset('js/index.js')}}"></script>
    <script src="{{ asset('js/qrcode.js')}}"></script>

    <title>Dashboard - SPA</title>

</head>
<body id="body-pd">
    
    <!-- Menu navbar -->
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        
        <div class="btn-group">
            <div class="dropdown" data-bs-toggle="dropdown">
                <div class="header__img">
                    <!-- <img src="./src/assets/img/perfil.jpg"> -->
                    <i class='bx bxs-user-circle icon__main'></i>
                </div>
            </div>
            <!-- <ul class="dropdown-menu "> -->
                <!-- <li><a class="dropdown-item" href="#"><i class='bx bx-user nav__icon'></i> Perfil</a></li> -->
                <!-- <li><a class="dropdown-item" href="../logout.php"> <i class='bx bx-log-out nav__icon'></i> Sair</a></li> -->
                <!-- <li><a class="dropdown-item" href="#">Menu item</a></li> -->
            <!-- </ul> -->
        </div>

    </header>

    {{-- SideBar --}}
    @component('_components.sidebar')
        
    @endcomponent
    {{-- SideBar --}}

    <main style="margin-top: 8%;">
        @yield('content')
    </main>

        <!--===== MAIN JS =====-->
        <script src="{{ asset('js/sidebar.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
   </html>