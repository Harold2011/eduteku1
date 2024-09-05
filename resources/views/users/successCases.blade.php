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
          <div class="flex flex-wrap -m-4">
            <div class="flex flex-col text-center w-full mb-20">
                <h2 class="text-xs text-[#39A900] tracking-widest font-medium title-font mb-1">Talentos Tecnoparque</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Casos de éxito</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Tecnoparque es un área del Servicio Nacional de Aprendizaje (SENA) dedicada a asesorar y apoyar proyectos de emprendedores con base tecnológica. En este entorno, los emprendedores son conocidos como "Talentos". Estos talentos reciben orientación y recursos necesarios para desarrollar sus ideas innovadoras, transformándolas en soluciones tecnológicas que pueden impactar positivamente en diversos sectores. Tecnoparque se convierte así en un espacio clave para el crecimiento y fortalecimiento de la innovación tecnológica en el país, impulsando a los talentos a convertir sus proyectos en realidades exitosas.</p>
              </div>
              <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/img/memoria.jpg') }}" alt="blog">
                  <div class="p-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Jose Lopez</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Memoria todo color</h1>
                    <p class="leading-relaxed mb-3">La corporación memoria sueños y esperanzas impulsa el turismo de san Carlos combinando la cultura y la tecnología.</p>
                    <div class="flex items-center flex-wrap">
                      <a href="https://memoria.ingharoldmarin.online/" class="text-[#39A900] inline-flex items-center md:mb-2 lg:mb-0">Ir a la pagina
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M5 12h14"></path>
                          <path d="M12 5l7 7-7 7"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                  <iframe class="lg:h-48 md:h-36 w-full" src="https://www.youtube.com/embed/OhZWLoGE8hQ?list=PLnM1DCskDFaOHy86ZS0IRuzNVboKQHhB4" title="Andrius Bikes 2022 // Tecnoparque Rionegro" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  <div class="p-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Gabriel Jaime Cano Ospina</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">INGBIOCOMB</h1>
                    <p class="leading-relaxed mb-3">INGBIOCOMB S.A.S se dedica a la obtención de productos de biocombustibles y bio componentes. </p>
                    <div class="flex items-center flex-wrap">
                      <a class="text-[#39A900] inline-flex items-center md:mb-2 lg:mb-0">Ver video
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M5 12h14"></path>
                          <path d="M12 5l7 7-7 7"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                  <iframe class="lg:h-48 md:h-36 w-full" src="https://www.youtube.com/embed/wg8SBbTWweI?list=PLnM1DCskDFaOHy86ZS0IRuzNVboKQHhB4" title="Andrius Bikes 2022 // Tecnoparque Rionegro" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  <div class="p-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Roberto Arias</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">LA PIEL DEL PLANETA</h1>
                    <p class="leading-relaxed mb-3"> Conozcamos a Roberto Arias, emprendedor de Marinilla Antioquia, que promueve el consumo consiente a través de sus productos para el cuidado de la piel.</p>
                    <div class="flex items-center flex-wrap">
                      <a class="text-[#39A900] inline-flex items-center md:mb-2 lg:mb-0">Ver video
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M5 12h14"></path>
                          <path d="M12 5l7 7-7 7"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                  <iframe class="lg:h-48 md:h-36 w-full" src="https://www.youtube.com/embed/KKFa2ew9WKM?list=PLnM1DCskDFaOHy86ZS0IRuzNVboKQHhB4" title="Andrius Bikes 2022 // Tecnoparque Rionegro" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  <div class="p-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Andrius Bikes</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Andrius Bikes</h1>
                    <p class="leading-relaxed mb-3">Andres es un talento que nos cuenta su paso por tecnoparque nodo rionegro y su experiencia en el.</p>
                    <div class="flex items-center flex-wrap">
                      <a class="text-[#39A900] inline-flex items-center md:mb-2 lg:mb-0">Ver video
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M5 12h14"></path>
                          <path d="M12 5l7 7-7 7"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>              
              <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                  <iframe class="lg:h-48 md:h-36 w-full" src="https://www.youtube.com/embed/-7DAnl6HWS0?list=PLnM1DCskDFaOHy86ZS0IRuzNVboKQHhB4" title="Andrius Bikes 2022 // Tecnoparque Rionegro" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  <div class="p-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Andres</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Caracterización Fisicoquímica para un Sirope de Mora</h1>
                    <p class="leading-relaxed mb-3">Diana Arredondo llegó a Tecnoparque por la convocatoria. Su proyecto se llama “Caracterización Fisicoquímica para un Sirope de Mora”, y este tiene versatilidad de usos.
                        Conoce más sobre Diana y su producto en este video.</p>
                    <div class="flex items-center flex-wrap">
                      <a class="text-[#39A900] inline-flex items-center md:mb-2 lg:mb-0">Ver video
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M5 12h14"></path>
                          <path d="M12 5l7 7-7 7"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                  <iframe class="lg:h-48 md:h-36 w-full" src="https://www.youtube.com/embed/B_V6jSqK2z0?list=PLnM1DCskDFaOHy86ZS0IRuzNVboKQHhB4" title="Andrius Bikes 2022 // Tecnoparque Rionegro" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  <div class="p-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">GISOT CONSULTOR</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Empresas Creadoras “GISOT CONSULTOR”</h1>
                    <p class="leading-relaxed mb-3">Empresas Creadoras “GISOT CONSULTOR”.</p>
                    <div class="flex items-center flex-wrap">
                      <a class="text-[#39A900] inline-flex items-center md:mb-2 lg:mb-0">Ver video
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M5 12h14"></path>
                          <path d="M12 5l7 7-7 7"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            
          </div>
        </div>
      </section>
</body>
</html>
