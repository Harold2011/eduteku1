<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Instituciones</title>
    <link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
  <header>
      @include('components.nav-header-dashboard')
  </header>
  <main>
      @include('components.nav-dashboard')
      <div id="modal-component-container" class="fixed inset-0">
          <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
              <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
              <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen"></div>
              <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all ms:my-8 sm:align-middle sm:max-w-lg w-full">
                  <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4">
                      <div class="modal-wrapper-flex sm:flex sm:item-start">
                          <div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-500  sm:mx-0 sm:h-10 sm:w-10">
                              <i class="fa fa-chalkboard-teacher fa-2x fa-inverse"></i>
                          </div>
                          <div class="modal-content text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                              <h3 class="text-lg font-medium text-gray-900">Editar Instituciones</h3>
                              <div class="modal-text">             
                                  <form action="{{ route('sponsor.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                                          <div class="-mx-3 md:flex mb-6">
                                              <div class="md:w-full px-3">
                                                  <label for="name" class="uppercase tracking-wide text-black text-xs font-bold mb-2">Nombre:</label>
                                                  <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="name" type="text" name="name" value="{{ $sponsor->name }}" required>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="-mx-3 md:flex mb-6">
                                          <div class="md:w-full px-3">
                                              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="img_url">Imagen:</label>
                                              <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="img_url" type="file" name="img_url">
                                          </div>
                                      </div>
                                      <div class="modal-actions bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                          <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-green-500 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" type="submit">Guardar Cambios</button>
                                          <a href="{{ route('bootcamp.index') }}">
                                              <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-red-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" type="button">Cancelar</button>
                                          </a>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </main>
</body>
</html>
