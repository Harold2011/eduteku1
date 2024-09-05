<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                            <h1 class="font-bold pl-2">Usuarios</h1>
                        </div>
                    </div>
                    <div class="flex flex-wrap w-full py-20 px-12 lg:px-24 shadow-xl mb-24">
                        <div class="flex flex-col w-full">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-left text-sm font-light text-surface">
                                            <thead class="border-b border-neutral-200 font-medium">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">#</th>
                                                    <th scope="col" class="px-6 py-4">Nombre</th>
                                                    <th scope="col" class="px-6 py-4">Apellido</th>
                                                    <th scope="col" class="px-6 py-4">Correo</th>
                                                    <th scope="col" class="px-6 py-4">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    @if ($user->id !== Auth::user()->id)
                                                        <tr class="border-b border-neutral-200">
                                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $user->id }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">{{ $user->last_name }}</td>
                                                            <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                                                            <td class="">
                                                                <form action="{{ route('user.changeRole', $user->id) }}" method="POST">
                                                                    @csrf
                                                                    <button class="inline-flex items-center bg-green-500 border-0 py-1 px-3 focus:outline-none hover:bg-cyan-950 text-white rounded text-base mt-4 md:mt-0">
                                                                        @if ($user->hasRole('admin'))
                                                                            Cambiar a User
                                                                        @else
                                                                            Cambiar a Admin
                                                                        @endif
                                                                    </button>
                                                                </form>
                                                              </td>
                                                              <td class="">
                                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="bg-red-400 text-white p-2 rounded" onclick="confirmarBorrado({{ $user->id }})"><i class="fa fa-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr> 
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('modal-component-container').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('modal-component-container').classList.add('hidden');
        });

        function confirmarBorrado(id) {
            if (confirm("¿Estás seguro de que quieres borrar este dato?")) {
                document.getElementById('deleteForm_' + id).submit();
            }
        }
    </script>
</body>
</html>
