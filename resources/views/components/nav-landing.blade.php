<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img class="h-20" src="{{ asset('storage/img/logosena.png') }}" alt="logo" />
    </a>
    <button id="menu-toggle" data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>
    <div class="hidden w-full md:flex md:items-center md:space-x-2" id="navbar-default">
      <ul class="font-medium flex flex-wrap p-0 m-0 space-x-2">
        <li>
          <a href="{{ url('/') }}" class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Inicio</a>
        </li>
        <li>
          <a href="{{ url('info') }}" class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">¿Qué hacemos en Tecnoparque?</a>
        </li>
        <li>
          <a href="{{ url('edt') }}" class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Eventos de divulgación Tecnologica (EDT)</a>
        </li>
        <li>
          <a href="{{ url('bulletin') }}" class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Boletines tecnológicos</a>
        </li>
        <li>
          <a href="{{ url('successCases') }}" class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Casos de éxito</a>
        </li>
        <li>
          <a href="{{ url('ruta') }}" class="block py-1 px-2 text-sm text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#39A900] dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Ruta</a>
        </li>
        @auth
        @if(auth()->user()->hasRole('user') || auth()->user()->hasRole('admin'))
          <a href="{{ route('login')}}">
            <button class="inline-flex items-center bg-[#39A900] border-0 py-1 px-2 text-sm focus:outline-none hover:bg-[#00314D] text-white rounded">Ir al panel
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </button>
          </a>
        @endif
      @else
        <a href="{{ route('login')}}">
          <button class="inline-flex items-center bg-[#39A900] border-0 py-1 px-2 text-sm focus:outline-none hover:bg-[#00314D] text-white rounded">Iniciar sesión
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </a>
      @endif
      </ul>
    </div>
  </div>
</nav>
<div class="mt-24"></div>
<script>
  document.getElementById('menu-toggle').addEventListener('click', function() {
    const menu = document.getElementById('navbar-default');
    menu.classList.toggle('hidden');
  });
</script>
