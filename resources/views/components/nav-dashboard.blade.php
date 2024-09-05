<nav aria-label="alternative nav">
    <div class="h-20 fixed sm:bg-gray-50 bottom-0 mt-12 md:relative md:h-screen w-full md:w-48 content-center">
        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                @role('admin')
                <li class="mr-3 flex-1">
                    <a href="{{ route('category.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-layer-group pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Categorías</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('state.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fas fa-toggle-on pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Estados</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('home.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-home pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Inicio</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route ('panelInfo') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-info pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Info</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('panelEdt') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-play pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">EDT</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('panelBulletin') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-book pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Boletin</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route ('user.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fas fa-users pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Usuarios</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route ('messages.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-envelope pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Mensajes</span>
                    </a>
                </li>
                @endrole
                @role('user')
                <li class="mr-3 flex-1">
                    <a href="{{ route ('messages.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-current no-underline hover:text-current border-b-2 border-gray-100 hover:border-green-500">
                        <i class="fa fa-heart pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Mis like</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                  <form action="https://moodle.eduteku.com/test/index.php" method="post">
                    <input type="hidden" value="{{ $email }}" name="email">
                    <input type="hidden" value="{{ $password }}" name="password">
                        <button type="submit" id="loginbtn">
                            <i class="fa fa-chalkboard-teacher pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-current md:text-current block md:inline-block">Realizar cursos</span>
                        </button>
                  </form>
                </li>
                @endrole
            </ul>
        </div>
    </div>
</nav>