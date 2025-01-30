<aside class="main-menu" id="menu">
    <header>
        <img src="{{ asset('assets/media/images/CUSTOMSHOP-PRO-logo_white.svg') }}" alt="CustomShop PRO">
        <button type="button" class="toogle-menu"></button>
    </header>
    <div class="content-menu">
        <section>
            <span class="title-section">Inicio</span>
            <a href="{{ route('dashboard') }}" class="item-aside {{ Request::is('/') ? 'active' : '' }}">
                <span class="ic-menu resumen"></span>
                Resumen
            </a>
        </section>
        <section>
            <span class="title-section">Productos</span>
            <a href="{{ route('products') }}" class="item-aside {{ Request::is('productos') ? 'active' : '' }}">
                <span class="ic-menu product"></span>
                Todos los productos
            </a>
            <a href="{{ route('new-product') }}" class="item-aside {{ Request::is('nuevo-producto') ? 'active' : '' }}">
                <span class="ic-menu newProduct"></span>
                Nuevo producto
            </a>
        </section>
        <section>
            <span class="title-section">Categorías</span>
            <a href="{{ route('categories') }}" class="item-aside {{ Request::is('categorias') ? 'active' : '' }}">
                <span class="ic-menu category"></span>
                Todas las categorías
            </a>
            <a href="{{ route('new-category') }}" class="item-aside {{ Request::is('nueva-categoria') ? 'active' : '' }}">
                <span class="ic-menu newCategory"></span>
                Nueva categoría
            </a>
        </section>
        <section>
            <span class="title-section">Pedidos</span>
            <a href="{{ route('history') }}" class="item-aside {{ Request::is('historial-pedidos') ? 'active' : '' }}">
                <span class="ic-menu history"></span>
                Historial de pedidos
            </a>
        </section>
        @if(auth()->user()->isAdmin())
        <section>
            <span class="title-section">Pagos</span>
            <a href="{{ route('payment') }}" class="item-aside {{ Request::is('metodo-pagos') ? 'active' : '' }}">
                <span class="ic-menu payment"></span>
                Configurar medios de pago
            </a>
        </section>
        @endif
        <section class="user-options">
            <span class="name-user">{{ Auth::user()->nombreUs }} {{ Auth::user()->apellidosUs }}</span>
            @if(auth()->user()->isAdmin())
            <a href="{{ route('users') }}" class="item-aside {{ Request::is('usuarios') ? 'active' : '' }}">Usuarios<span class="icon-user users"></span></a>
            @endif
            <!-- Formulario para cerrar sesión -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="item-aside">
                    Cerrar sesión
                    <span class="icon-user logout"></span>
                </button>
            </form>
            <a href="#" class="item-aside">Ayuda<span class="icon-user help"></span></a>
        </section>
    </div>
    <button type="button" class="toggle-menu-aside d-none"></button>
</aside>

<div class="menu-backdrop"></div>