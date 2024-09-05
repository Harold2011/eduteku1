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
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Bootcamps y retos de innovación</h1>
                <p class="mb-8 leading-relaxed text-center">
                    A continuación, encontrarás todos los bootcamps y retos de innovación que están a tu disposición.
                </p>                
            </div>
            @foreach($categories as $category)
                <h2 class="text-xl font-bold mb-4">{{ $category->name }}</h2>
                <div class="flex flex-wrap -m-4">
                    @foreach($category->bootcamps as $bootcamp)
                        <div class="p-4 md:w-1/3">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/img/'.$bootcamp->img_url) }}" alt="bootcamp">
                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{ $category->name }}</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $bootcamp->name }}</h1>
                                    <p class="leading-relaxed mb-3">{!! Str::limit(strip_tags($bootcamp->description), 100, '...') !!}</p>
                                    <div class="flex items-center flex-wrap ">
                                    <a href="{{ route('bootcampClient.show', $bootcamp->id) }}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Más detalles
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
</body>
</html>
