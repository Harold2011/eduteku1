<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<link rel="icon" href="{{ asset('storage/img/logo.jpg') }}" type="image/x-icon">
    <title>Panel de control</title>
  	@vite('resources/css/app.css')
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
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
                        <h1 class="font-bold pl-2">Panel de control</h1>
                    </div>
                </div>

                <div class="flex flex-wrap w-full">
                    @role('admin')
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route('category.index') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fa fa-layer-group fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Categorías</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('state.index') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fas fa-toggle-on fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Estados</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('home.index') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fas fa-home fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Inicio</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('panelInfo') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fas fa-info fa-2x fa-inverse mx-2"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Información</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('panelEdt') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fas fa-play fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">EDT</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('panelBulletin') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fas fa-book fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Boletín</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('bootcamp.index') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fas fa-chalkboard-teacher fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Bootcamp</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--/Metric Card-->
                        <a href="{{ route ('user.index') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Usuarios</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('messages.index') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fa fa-envelope fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Mensajes</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endrole
                    @role('user')
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('likeUser') }}">
                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i class="fa fa-heart fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Mis like</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                          <!--Metric Card-->
                      <form action="https://moodle.eduteku.com/test/index.php" method="post">
                        <input type="hidden" value="{{ $email }}" name="email">
                        <input type="hidden" value="{{ $password }}" name="password">
                              <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                  <button type="submit">
                                	<div class="flex flex-row items-center">
                                      <div class="flex-shrink pr-4">
                                          <div class="rounded-full p-5 bg-green-600"><i class="fa fa-chalkboard-teacher fa-2x fa-inverse"></i></div>
                                      </div>
                                     <div class="flex-1 text-right md:text-center">
                                          <h2 class="font-bold uppercase text-gray-600">Realizar cursos</h2>
                                     </div>
                                  </div>
                                  </button>
                              </div>
                      		</form>
                      </div>
                    @endrole
                </div>
            </div>
        </section>
    </div>
</main>
</body>
</html>
