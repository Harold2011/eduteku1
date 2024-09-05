<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <title>Bootcamps</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('components.nav-landing')
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="hero" src="{{ asset('storage/img/'.$bootcamp->img_url) }}">
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $bootcamp->name }}</h1>
                <div class="text-justify">
                    <p class="mb-8 leading-relaxed">{!! $bootcamp->description !!}</p>
                </div>
            </div>
                <!-- Patrocinadores -->
                <div class="mt-10">
                    <h2 class="text-2xl font-bold mb-4 text-center">Instituciones participantes</h2>
                    <div class="flex flex-wrap justify-center gap-8">
                        @foreach($sponsors as $sponsor)
                            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 flex items-center justify-center">
                                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center justify-center mx-auto max-w-xs">
                                    <img class="h-44 w-auto object-contain mb-4" src="{{ asset('storage/img/'.$sponsor->img_url) }}" alt="{{ $sponsor->name }}">
                                    <h3 class="text-lg font-semibold text-center">{{ $sponsor->name }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Criterios de Aceptación -->
                    <h2 class="text-2xl font-bold mt-16 mb-6 text-center">Criterios de aceptación</h2> <!-- Ajuste de márgenes -->
                    <div class="flex justify-center">
                        <div class="text-center">
                            @if($bootcamp->file)
                                <a href="{{ asset('storage/pdf/'.$bootcamp->file) }}" download class="text-indigo-500 hover:underline">
                                    <img src="{{ asset('storage/img/iconoPDF.png') }}" class="h-8 w-auto inline-block"> <!-- Tamaño reducido del icono -->
                                    Descargar PDF
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Curso -->
                    <h2 class="text-2xl font-bold mt-16 mb-6 text-center">Curso</h2> <!-- Ajuste de márgenes -->
                    <div class="flex justify-center">
                        <div class="text-center">
                            @if($bootcamp->url_course)
                                <a href="{{ $bootcamp->url_course }}" download class="text-indigo-500 hover:underline">
                                    <img src="{{ asset('storage/img/course.png') }}" class="h-8 w-auto inline-block"> <!-- Tamaño reducido del icono -->
                                    Ir al curso relacionado.
                                </a>
                            @endif
                        </div>
                    </div>
                      <!-- fin -->
                
            </div>
        </div>
    </section>
</body>
</html>

