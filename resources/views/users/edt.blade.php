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
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        .card-content {
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }
        .card-content iframe {
            flex-grow: 1;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            border: 4px solid #E5E7EB;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .card-content:hover .overlay {
            opacity: 1;
        }
        .like-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            z-index: 20;
        }
        .like-indicator {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #E5E7EB;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body class="font-sans antialiased">
    @include('components.nav-landing')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                @foreach ($multimedia as $multimedias)
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $multimedias->name }}</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $multimedias->descripcion }}</p>
                @endforeach
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($edt as $edts)
                    <div class="lg:w-1/3 sm:w-1/2 p-4 relative">
                            <div class="flex relative h-full card-content">
                                <iframe class="absolute inset-0 w-full h-full object-cover object-center" src="https://www.youtube.com/embed/{{ $edts->link }}" title="EDTS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <div class="overlay px-8 py-10 relative z-10">
                                    <h2 class="tracking-widest text-sm title-font font-medium text-green-500 mb-1">EDT</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $edts->name }}</h1>
                                    <p class="leading-relaxed">{{ $edts->descripcion }}</p>
                                    <i class="like-icon fas fa-heart text-3xl absolute top-2 right-2
                                        @if(in_array($edts->id, $likes))
                                            text-red-500
                                        @else
                                            text-gray-400
                                        @endif"
                                        onclick="toggleLike(this, '{{ $edts->id }}')">
                                    </i>
                                    <a href="https://www.youtube.com/embed/{{ $edts->link }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fa-solid fa-eye absolute button-2 right-2">Ver EDT</i>
                                    </a>
                                    <div class="like-indicator
                                        @if(in_array($edts->id, $likes))
                                            bg-red-500
                                        @endif
                                    "></div>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function toggleLike(icon, edtId) {
            fetch(`/like/${edtId}`, {
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
                icon.classList.toggle('text-red-500', data.liked);
                const indicator = icon.nextElementSibling;
                if (data.liked) {
                    indicator.classList.add('bg-red-500');
                } else {
                    indicator.classList.remove('bg-red-500');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                window.location.href = '/login';
            });
        }
    </script>
</body>
</html>
