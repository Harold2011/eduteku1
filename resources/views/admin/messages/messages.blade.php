<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensajes</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
	<link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
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
                @role('user')
                    <h1>No tienes permisos para acceder a este sitio.</h1>
                @endrole
                @role('admin')
                <div class="bg-gray-100 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-green-500 p-4 shadow text-2xl text-current">
                        <h1 class="font-bold pl-2">Mensajes</h1>
                    </div>
                </div>
                <div class="flex flex-wrap w-full py-20 px-12 lg:px-24 shadow-xl mb-24">
                    
                        <!--tablet-->
                        <div class="flex flex-col w-full">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                  <table
                                    class="min-w-full text-left text-sm font-light text-surface">
                                    <thead
                                      class="border-b border-neutral-200 font-medium">
                                      <tr>
                                        <th scope="col" class="px-6 py-4">#</th>
                                        <th scope="col" class="px-6 py-4">Correo</th>
                                        <th scope="col" class="px-6 py-4">Mensaje</th>
                                        <th scope="col" class="px-6 py-4">Fecha</th>
                                        <th scope="col" class="px-6 py-4">Acción</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($messages as $message)
                                      <tr class="border-b border-neutral-200">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $message->id }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $message->meil }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 w-1/3 overflow-hidden max-w-xs">
                                            <div class="text-ellipsis">{{ $message->message }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $message->date }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <form action="{{ route('messages.destroy', $message->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-400 text-white p-2 rounded" onclick="confirmarBorrado({{ $message->id }})"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                      </tr>
                                    @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!--Modal-->
                        <div id="modal-component-container" class="hidden fixed inset-0">
                            <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
                                <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen"></div>

                                <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all ms:my-8 sm:align-middle sm:max-w-lg w-full">
                                    <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4">
                                        <div class="modal-wrapper-flex sm:flex sm:item-start">
                                            <div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-600 sm:mx-0 sm:h-10 sm:w-10"><i class="fa fa-layer-group fa-2x fa-inverse"></i></div>
                                            <div class="modal-content text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium text-gray-900">Mensaje</h3>
                                                <div class="modal-text">
                                                    <p>... Este es un mensaje de prueba....</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-actions bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button id="closeModal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-green-500 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><i class="fa fa-plus"></i>Agregar</button>
                                    </form>
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

</script>
@endrole
</body>
</html>