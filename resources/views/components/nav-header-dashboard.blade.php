<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-100 z-10 pt-2 pb-1 px-1 mt-0 h-auto fixed w-full top-0">

        <div class="flex flex-wrap z-10 items-center justify-between">
            <!-- Logo -->
            <div class="flex flex-1 justify-center md:justify-start text-current">
                <a href="{{ route('dashboard') }}" aria-label="Home">
                    <img class="h-14" src="{{ asset('storage/img/logosena.png') }}" alt="logo" />
                </a>
            </div>

            <!-- Placeholder div to keep the layout balanced -->
            <div class="hidden md:flex flex-1 justify-center text-current px-2">
            </div>

            <!-- Menu Items -->
            <div class="flex flex-1 justify-center md:justify-end w-full md:w-auto pt-2 md:pt-0">
                <ul class="flex flex-wrap justify-center md:justify-end items-center w-full">
                    <li class="px-2">
                        <a href="{{ route('index.index') }}">
                            <button class="inline-block py-2 px-4 text-current no-underline" type="button">
                                <i class="fas fa-globe fa-fw"></i> Regresar al portal web
                            </button>
                        </a>
                    </li>
                    <li class="px-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="inline-block py-2 px-4 text-current no-underline" type="submit">
                                <i class="fas fa-sign-out-alt fa-fw"></i> Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</header>
