<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Roboto:wght@400;500;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="text-black antialiased bg-light">
    <x-nav />
    {{ $slot }}
    <footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  md:py-10 border-t">
              <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">
                <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
                  <div class="flex-shrink-0 flex items-center">
                    <a href="#">
                      <x-application-logo class="block h-20 w-auto fill-current" />
                    </a>
                  </div>
                </div>                
                <div class="flex items-center md:absolute md:right-0 md:inset-y-0">
                    <x-button href="/add/create">{{ __('Contact') }}</x-button>
                  </div>
                </div>
              </div>
              <div class="my-5">                  
                <ul class="flex text-sm text-blue">
                    <li class="mr-6 hover:underline"><a href="">Over Goods4ukraine</a></li>
                    <li class="mr-6 hover:underline"><a href="">Perskamer</a></li>
                    <li class="mr-6 hover:underline"><a href="">Privacyverklaring</a></li>
                    <li class="mr-6 hover:underline"><a href="">Cookiebeleid</a></li>
                    <li class="mr-6 hover:underline"><a href="">Algemene Voorwaarden</a></li>
                </ul>
              </div>
              <div class="flex justify-between">
                <div class="my-5 md:mr-32">                  
                    <p class="text-black text-sm">
                        {{ __('Copyright', ['year' => date('Y')]) }}
                    </p>  
                  </div>
                  <div class="my-5">                  
                    <img src="/img/poweredbykobalt.svg" class="h-10" />
                </div>    
              </div>
            </div>
    </footer>
    @empty(Session::get('language'))
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 md:align-middle md:max-w-lg md:w-full sm:p-6">
                <div class="mx-auto flex items-center justify-center">
                    <h3 class="text-lg leading-6 font-medium text-black" id="modal-title">Choose your language</h3>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid grid-cols-2 md:grid-cols-3 sm:gap-3">
                    @foreach (languages() as $language)
                    <div class="text-center p-5">
                        <div class="mx-auto flex justify-center">
                            <img src="/img/{{ $language->locale }}.svg" class="w-full my-3 sm:mt-5" />
                        </div>
                        <x-button href="{{ route('sessions.languages.update', ['lang' => $language->locale]) }}"
                            class="text-center">{{ $language->title }}</x-button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endempty
</body>

</html>