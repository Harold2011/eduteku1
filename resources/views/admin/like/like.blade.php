<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Likes</title>
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">       
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
    @include('components.nav-header-dashboard')
<main>
    <div class="flex flex-col md:flex-row">
        @include('components.nav-dashboard')
        <section class="w-full">
            <div id="main" class="main-content mt-12 md:mt-2 pb-24 md:pb-5">
                <div class="bg-gray-100 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-green-500 p-4 shadow text-2xl text-current">
                        <h1 class="font-bold pl-2">Mis like</h1>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg mb-8 p-4">
                <h2 class="text-2xl font-bold mb-4">EDT</h2>
                <div class="flex flex-wrap w-full">
                @foreach ($likes as $like)
                    @if ($like->multimedia->category_id == 5)
                        <div class="lg:w-1/3 sm:w-full z-0 p-4 relative">
                            <div class="flex relative h-full card-content">
                                <iframe class="absolute inset-0 w-full h-full object-cover object-center" src="https://www.youtube.com/embed/{{ $like->multimedia->link }}" title="EDTS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <div class="overlay px-8 py-10 w-full relative z-10" style="background: linear-gradient(to bottom right, rgba(229, 231, 235, 0.8), rgba(209, 213, 219, 0.8));">
                                    <h2 class="tracking-widest text-sm title-font font-medium text-green-500 mb-1">EDT</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $like->multimedia->name }}</h1>
                                    <p class="leading-relaxed">{{ $like->multimedia->descripcion }}</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <a href="https://www.youtube.com/embed/{{ $like->multimedia->link }}" target="_blank" rel="noopener noreferrer" class="text-gray-500">
                                            <i class="fa-solid fa-eye mr-2">Ver EDT</i>
                                        </a>
                                        <i class="like-icon fas fa-heart text-3xl
                                            @if(in_array($like->multimedia->id, $likes->pluck('multimedia_id')->toArray()))
                                                text-red-500
                                            @else
                                                text-gray-400
                                            @endif"
                                            onclick="toggleLike(this, '{{ $like->multimedia->id }}')">
                                        </i>
                                    </div>
                                    <div class="like-indicator mt-2
                                        @if(in_array($like->multimedia->id, $likes->pluck('multimedia_id')->toArray()))
                                            bg-red-500
                                        @endif
                                    "></div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-2xl font-bold mb-4">Boletines</h2>
            <div class="flex flex-wrap w-full">
                @foreach ($likes as $like)
                    @if ($like->multimedia->category_id == 7)
                        <div class="p-4 lg:w-1/4 md:w-1/2 w-full">
                            <div class="h-full flex flex-col items-center text-center border rounded-lg overflow-hidden">
                                <img alt="team" class="flex-shrink-0 w-full h-56 object-cover object-center mb-4" src="{{ asset($like->multimedia->url) }}">
                                <div class="w-full px-4 py-6">
                                    <h2 class="title-font font-medium text-lg text-gray-900">{{ $like->multimedia->name }}</h2>
                                    <h3 class="text-blue-500 font-bold mb-3"><a href="{{ $like->multimedia->link }}" target="_blank">Descarga el boletin</a></h3>
                                    <p class="mb-4">{{ $like->multimedia->descripcion }}</p>
                                </div>
                                <div class="w-full flex justify-end px-4 py-2">
                                    <i class="like-icon cursor-pointer fa-heart text-xl
                                        @if(in_array($like->multimedia->id, $likes->pluck('multimedia_id')->toArray()))
                                            fa-solid text-red-500
                                        @else
                                            fa-regular
                                        @endif"
                                        onclick="toggleLike(this, '{{ $like->multimedia->id }}')">
                                    </i>
                                </div>
                                <div class="like-indicator
                                    @if(in_array($like->multimedia->id, $likes->pluck('multimedia_id')->toArray()))
                                        bg-red-500
                                    @endif
                                "></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
            @if($likes->isEmpty())
                <p class="text-center w-full">No has dado like a ningún elemento.</p>
            @endif
                </div>
        </section>
    </div>
</main>
<script>
    function toggleLike(icon, multimediaId) {
        fetch(`/like/${multimediaId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            icon.classList.toggle('fa-solid', data.liked);
            icon.classList.toggle('text-red-500', data.liked);
            const likeIndicator = icon.parentElement.querySelector('.like-indicator');
            if (likeIndicator) {
                likeIndicator.classList.toggle('bg-red-500', data.liked);
            }
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            window.location.href = '/login';
        });
    }
</script>
</body>
</html>
