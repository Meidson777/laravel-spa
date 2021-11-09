@php

    $user_type = $_SESSION['user_type'];

@endphp
<!-- Menu Sidebar -->
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav__logo">
                <!-- <i class='bx bx-layer nav__logo-icon'></i> -->
                <img src="{{asset('img/logo.png')}}" class="header__img" style="margin-left: -12px;">
                <span class="nav__logo-name">ADMIN SPA</span>
            </a>

            <div class="nav__list">
                <a href="{{ route('admin.home') }}" class="nav__link active">
                    <i class='bx bx-desktop nav__icon'></i>
                    <span class="nav__name">Área de Trabalho</span>
                </a>

                <a href="?op=MainAgendamento" class="nav__link">
                    <i class='bx bxs-calendar nav__icon'></i>
                    <span class="nav__name">Agenda</span>
                </a>

                <a href="{{ route('admin.clients') }}" class="nav__link">
                    <i class='bx bx-user nav__icon'></i>
                    <span class="nav__name">Clientes</span>
                </a>

                @if ($user_type != 1)
                <a href="?op=FaturamentoFuncionario" class="nav__link">
                    <!-- <i class='bx bx-wrench'></i> -->
                    <i class='bx bx-dollar nav__icon'></i>
                    <span class="nav__name">Faturamento</span>
                </a>
                @endif
               
                <a href="index.php?op=MainQr" class="nav__link">
                    <i class='bx bx-barcode-reader nav__icon'></i>
                    <span class="nav__name">QrScanner</span>
                </a>

                <a href="{{ route('admin.services') }}" class="nav__link">
                    <!-- <i class='bx bx-wrench'></i> -->
                    <i class='bx bx-wrench nav__icon'></i>
                    <span class="nav__name">Serviços</span>
                </a>
                
                @if ($user_type != 0)
                    <a href="{{ route('admin.administrative') }}" class="nav__link">
                        <i class='bx bxs-data nav__icon'></i>
                        <span class="nav__name">Administrativo</span>
                    </a>
                @endif
        
            </div> 
            <a href="{{ route('admin.logout') }}" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Sair</span>
            </a>
        </div>
    </nav>
</div>
<!-- Menu Sidebar -->