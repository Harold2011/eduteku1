<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <title>Tecnoparque Rionegro</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased">
    @include('components.nav-landing')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                @foreach($multimedia as $multimedias)
                    <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">{{ $multimedias->name }}</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $multimedias->descripcion }}</p>
                @endforeach
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach($boletin as $boletins)
                    <div class="p-4 lg:w-1/4 md:w-1/2 w-full">
                        <div class="h-full flex flex-col items-center text-center border rounded-lg overflow-hidden">
                            <img alt="team" class="flex-shrink-0 w-full h-56 object-cover object-center mb-4" src="{{ asset($boletins->url) }}">
                            <div class="w-full px-4 py-6">
                                <h2 class="title-font font-medium text-lg text-gray-900">{{ $boletins->name }}</h2>
                                <h3 class="text-blue-500 font-bold mb-3"><a href="{{ $boletins->link }}" target="_blank">Descarga el boletin</a></h3>
                                <p class="mb-4">{{ $boletins->descripcion }}</p>
                            </div>
                            <div class="w-full flex justify-end px-4 py-2">
                                <i class="like-icon cursor-pointer fa-heart text-xl
                                    @if(in_array($boletins->id, $likes))
                                        fa-solid text-red-500
                                    @else
                                        fa-regular
                                    @endif"
                                    onclick="toggleLike('{{ $boletins->id }}')">
                                </i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        function toggleLike(multimediaId) {
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
                const likeIcon = document.querySelector(`i.like-icon`);
                likeIcon.classList.toggle('fa-solid', data.liked);
                likeIcon.classList.toggle('text-red-500', data.liked);
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
