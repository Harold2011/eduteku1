<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
        <title>Tecnoparque Rionegro</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased">
    @include('components.nav-landing')
        <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
            @foreach ($multimedia as $multimedias)
                <h2 class="text-xs text-[#39A900] tracking-widest font-medium title-font mb-1">Tecnoparque Nodo Rionegro</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $multimedias->name }}</h1>
                <p class="mb-8 leading-relaxed text-justify">{{ $multimedias->descripcion }}</p>
                <div class="max-w-xl max-h-xl mx-auto">
                    <img class="object-cover object-center rounded" alt="hero" src="{{ asset($multimedias->url) }}">
                </div>                
            @endforeach
            </div>
            <div class="flex flex-wrap">
                @foreach ($lineas as $linea)
                <div class="relative xl:w-1/4 lg:w-1/2 max-w-96 sm:mx-auto md:mx-auto md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                    <div class="overflow-hidden rounded-lg shadow-lg">
                        <div class="relative z-0">
                            <img class="w-full h-40 object-cover" src="{{ asset($linea->url) }}" alt="{{ $linea->name }}"> 
                            <div class="absolute inset-0 bg-black opacity-50"></div> 
                        </div>
                        <div class="relative z-10 text-justify w-full bg-white h-[400px] p-2 w-4/5 overflow-y-auto"> 
                            <h2 class="text-lg sm:text-xl text-gray-800 font-medium title-font mb-2">{{ $linea->name }}</h2>
                            <p class="leading-relaxed text-gray-600 text-base mb-4">{{ $linea->descripcion }}</p>
                            <a class="text-[#39A900] inline-flex items-center" href="https://redtecnoparque.com/lineas/">Conoce más...
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="flex flex-col text-center w-full mb-20">
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Si tienes una idea, regístrala en red Tecnoparque Colombia.</p>
                <a href="https://tecnoparque.com.co/registro"><button class="flex mx-auto mt-16 text-white bg-[#39A900] border-0 py-2 px-8 focus:outline-none hover:bg-[#00314D] rounded text-lg">Registra tu idea</button></a>
            </div>
        </div>
    </section>
    </body>
</html>