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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="antialiased text-black bg-light">
  <x-nav />
  {{ $slot }}

  <footer class="px-4 mx-auto border-t max-w-7xl sm:px-6 lg:px-8 md:py-10">
    <div class="my-5">
      <x-nav-sub />
    </div>
    <div class="md:flex items-center">
      <div class="mb-10 lg:mb-2 mr-10">
        <a href="/">
          <x-application-logo class="block w-auto h-10 fill-current lg:h-20" />
        </a>
      </div>
      <div class="mb-10 lg:mb-2 md:mr-10">
        <p class="text-sm text-black">
          {{ __('Copyright', ['year' => date('Y')]) }}
        </p>
      </div>
      <div class="flex">
        <div class="mb-10 lg:mb-2 mr-10">
          <a href="https://kobaltdigital.nl">
            <svg width="70" height="26" viewBox="0 0 135 50" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M43.3029 44.914V49.8243H38.898V27H43.3029V38.9785L49.6306 32.2673H54.9793L48.0573 39.7468L54.9793 49.8243H49.9802L45.1558 42.9069L43.3029 44.914Z" fill="#051432"/>
              <path d="M70.0547 47.5244C68.2947 49.1748 66.1796 50 63.7096 49.9999C61.2395 49.9999 59.142 49.1805 57.4172 47.5419C55.6922 45.9036 54.8299 43.7499 54.8302 41.0808C54.8302 38.3892 55.7217 36.218 57.5046 34.5672C59.2876 32.9164 61.4026 32.0912 63.8497 32.0916C66.2969 32.0916 68.3828 32.9109 70.1075 34.5495C71.8322 36.1882 72.6945 38.3419 72.6945 41.0107C72.6942 43.7032 71.8143 45.8744 70.0547 47.5244ZM60.6506 44.5219C61.4776 45.4584 62.5438 45.9266 63.8493 45.9264C65.1548 45.9262 66.1919 45.4639 66.9607 44.5395C67.7296 43.615 68.1141 42.4503 68.1141 41.0455C68.1141 39.6407 67.7296 38.4761 66.9607 37.5517C66.1917 36.6271 65.1546 36.1648 63.8493 36.1646C62.544 36.1643 61.4778 36.6326 60.6506 37.5692C59.823 38.5057 59.4093 39.6645 59.4094 41.0455C59.4096 42.4266 59.8233 43.5853 60.6506 44.5219Z" fill="#051432"/>
              <path d="M84.1953 32.0916C86.4557 32.0916 88.3785 32.9344 89.9637 34.6199C91.549 36.3054 92.3414 38.4474 92.3409 41.0458C92.3409 43.6442 91.5485 45.7862 89.9637 47.4718C88.3789 49.1573 86.4561 50 84.1953 50C82.354 50 80.874 49.3796 79.7554 48.139H79.231L78.7416 49.8243H75.3156V27H79.6853V33.9878C80.8044 32.7237 82.3078 32.0917 84.1953 32.0916ZM80.7343 44.4343C81.4334 45.2656 82.3657 45.6811 83.5311 45.681C84.0887 45.6889 84.6421 45.5842 85.1586 45.3731C85.6751 45.162 86.1441 44.8487 86.5376 44.4519C87.3766 43.6327 87.7961 42.4973 87.7961 41.0458C87.7961 39.5942 87.3766 38.4589 86.5376 37.6397C86.144 37.243 85.675 36.9299 85.1585 36.7187C84.642 36.5076 84.0886 36.4029 83.5311 36.4107C82.3654 36.4107 81.4331 36.8262 80.7343 37.6572C80.0355 38.4883 79.6859 39.6178 79.6853 41.0458C79.6853 42.474 80.035 43.6035 80.7343 44.4343Z" fill="#051432"/>
              <path d="M109.047 43.9251C109.047 44.8854 109.216 45.5467 109.553 45.909C109.891 46.2714 110.41 46.4529 111.109 46.4533V49.8243H110.061C107.939 49.8243 106.587 49.0752 106.005 47.577C104.839 49.1924 102.998 50 100.482 49.9999C98.5003 49.9999 96.9271 49.5317 95.762 48.5953C94.597 47.6589 94.0143 46.3948 94.0141 44.803C94.0011 43.9918 94.1872 43.1898 94.5559 42.468C94.9141 41.7804 95.4519 41.2038 96.1117 40.8C96.7532 40.3964 97.4253 40.0442 98.1218 39.7465C98.9031 39.4338 99.7188 39.2158 100.551 39.0969C101.507 38.9452 102.264 38.8457 102.824 38.7984C103.383 38.7511 104.047 38.7043 104.817 38.658C104.747 36.809 103.756 35.8843 101.845 35.8839C101.432 35.8769 101.02 35.9301 100.621 36.042C100.339 36.115 100.072 36.24 99.8349 36.4106C99.6747 36.5359 99.5333 36.6837 99.4153 36.8496C99.3251 36.9699 99.2598 37.1071 99.223 37.2531L99.188 37.3934H94.8181C94.981 35.8018 95.686 34.5201 96.9332 33.5484C98.1803 32.5767 99.8526 32.0911 101.95 32.0916C104.14 32.0916 105.871 32.6768 107.141 33.8473C108.412 35.0177 109.047 36.8203 109.047 39.255L109.047 43.9251ZM98.4185 44.6626C98.4185 45.5053 98.9079 46.0438 99.8868 46.2778C101.029 46.5588 102.112 46.3247 103.138 45.5755C104.14 44.8501 104.676 43.8084 104.746 42.4503V42.0992C104.07 42.1696 103.54 42.234 103.156 42.2923C102.771 42.3507 102.294 42.4268 101.722 42.5206C101.266 42.5869 100.815 42.6926 100.376 42.8365C100.037 42.9593 99.7047 43.1 99.3802 43.2579C99.0858 43.3858 98.8319 43.5923 98.646 43.8549C98.4924 44.0956 98.4132 44.3767 98.4185 44.6626V44.6626Z" fill="#051432"/>
              <path d="M113.731 27H118.275V49.8243H113.731V27Z" fill="#051432"/>
              <path d="M133.133 45.3999L134.812 48.5252C134.657 48.6754 134.494 48.8161 134.322 48.9465C134.113 49.1106 133.647 49.3271 132.924 49.5961C132.197 49.8658 131.427 50.0025 130.652 49.9996C128.927 49.9996 127.452 49.4611 126.229 48.3843C125.006 47.3075 124.394 45.9029 124.394 44.1705V36.0244H120.897V32.5832H122.645C123.251 32.5832 123.735 32.396 124.096 32.0215C124.458 31.6469 124.638 31.1435 124.638 30.5112V27H128.868V32.2671H133.273V36.0244H128.868V43.89C128.864 44.1706 128.92 44.4489 129.031 44.7062C129.143 44.9635 129.308 45.194 129.515 45.3823C129.727 45.5848 129.976 45.7433 130.25 45.8487C130.523 45.9541 130.814 46.0045 131.106 45.9969C131.433 45.9931 131.757 45.9399 132.067 45.8389C132.337 45.7599 132.6 45.6602 132.854 45.5405L133.133 45.3999Z" fill="#051432"/>
              <path d="M19.9569 31.4612V49.4778C15.0564 49.4778 11.0872 45.4466 11.0872 40.4695C11.0872 35.4924 15.0564 31.4612 19.9569 31.4612Z" fill="#F24725"/>
              <path d="M11.0872 49.7124V27.1915C4.96706 27.1915 0 32.2362 0 38.4519C0 44.6677 4.96706 49.7124 11.0872 49.7124Z" fill="#F24725"/>
              <g opacity="0.5">
              <path d="M9.9243 5.65996V6.95996C9.3043 5.97996 8.0643 5.41996 6.7843 5.41996C4.1443 5.41996 2.2243 7.49996 2.2243 10.32C2.2243 13.22 4.2243 15.24 6.7243 15.24C8.0643 15.24 9.3043 14.56 9.9243 13.54V15H12.2443V5.65996H9.9243ZM7.2043 13.08C5.6843 13.08 4.5443 11.82 4.5443 10.32C4.5443 8.81996 5.6843 7.57996 7.1843 7.57996C8.5643 7.57996 9.8843 8.71996 9.8843 10.32C9.8843 11.88 8.6443 13.08 7.2043 13.08Z" fill="#051432"/>
              <path d="M20.2309 5.41996C19.2709 5.41996 17.8109 5.95996 17.3309 7.13996V5.65996H15.0109V15H17.3309V10.04C17.3309 8.23996 18.6509 7.61996 19.7109 7.61996C20.7509 7.61996 21.6509 8.41996 21.6509 9.91996V15H23.9709V9.75996C23.9709 7.03996 22.6309 5.41996 20.2309 5.41996Z" fill="#051432"/>
              <path d="M32.6552 3.77995C33.4952 3.77995 34.1552 3.15996 34.1552 2.35996C34.1552 1.53996 33.4952 0.939956 32.6552 0.939956C31.8352 0.939956 31.1352 1.53996 31.1352 2.35996C31.1352 3.15996 31.8352 3.77995 32.6552 3.77995ZM31.4952 15H33.8152V5.65996H31.4952V15Z" fill="#051432"/>
              <path d="M41.7934 5.41996C40.8334 5.41996 39.3734 5.95996 38.8934 7.13996V5.65996H36.5734V15H38.8934V10.04C38.8934 8.23996 40.2134 7.61996 41.2734 7.61996C42.3134 7.61996 43.2134 8.41996 43.2134 9.91996V15H45.5334V9.75996C45.5334 7.03996 44.1934 5.41996 41.7934 5.41996Z" fill="#051432"/>
              <path d="M49.3349 3.77995C50.1749 3.77995 50.8349 3.15996 50.8349 2.35996C50.8349 1.53996 50.1749 0.939956 49.3349 0.939956C48.5149 0.939956 47.8149 1.53996 47.8149 2.35996C47.8149 3.15996 48.5149 3.77995 49.3349 3.77995ZM48.1749 15H50.4949V5.65996H48.1749V15Z" fill="#051432"/>
              <path d="M58.3931 5.65996H56.4131V2.21995H54.0931V5.65996H52.4131V7.49996H54.0931V15H56.4131V7.49996H58.3931V5.65996Z" fill="#051432"/>
              <path d="M61.3271 3.77995C62.1671 3.77995 62.8271 3.15996 62.8271 2.35996C62.8271 1.53996 62.1671 0.939956 61.3271 0.939956C60.5071 0.939956 59.8071 1.53996 59.8071 2.35996C59.8071 3.15996 60.5071 3.77995 61.3271 3.77995ZM60.1671 15H62.4871V5.65996H60.1671V15Z" fill="#051432"/>
              <path d="M72.3852 5.65996V6.95996C71.7652 5.97996 70.5252 5.41996 69.2452 5.41996C66.6052 5.41996 64.6852 7.49996 64.6852 10.32C64.6852 13.22 66.6852 15.24 69.1852 15.24C70.5252 15.24 71.7652 14.56 72.3852 13.54V15H74.7052V5.65996H72.3852ZM69.6652 13.08C68.1452 13.08 67.0052 11.82 67.0052 10.32C67.0052 8.81996 68.1452 7.57996 69.6452 7.57996C71.0252 7.57996 72.3452 8.71996 72.3452 10.32C72.3452 11.88 71.1052 13.08 69.6652 13.08Z" fill="#051432"/>
              <path d="M82.6118 5.65996H80.6318V2.21995H78.3118V5.65996H76.6318V7.49996H78.3118V15H80.6318V7.49996H82.6118V5.65996Z" fill="#051432"/>
              <path d="M85.5459 3.77995C86.3859 3.77995 87.0459 3.15996 87.0459 2.35996C87.0459 1.53996 86.3859 0.939956 85.5459 0.939956C84.7259 0.939956 84.0259 1.53996 84.0259 2.35996C84.0259 3.15996 84.7259 3.77995 85.5459 3.77995ZM84.3859 15H86.7059V5.65996H84.3859V15Z" fill="#051432"/>
              <path d="M95.684 5.65996L93.224 12.06L90.744 5.65996H88.244L92.144 15H94.264L98.204 5.65996H95.684Z" fill="#051432"/>
              <path d="M108.584 10.24C108.584 7.31996 106.484 5.41996 103.824 5.41996C101.144 5.41996 98.9235 7.33996 98.9235 10.32C98.9235 13.24 101.044 15.24 103.824 15.24C105.524 15.24 107.184 14.48 108.044 13.12L106.484 11.94C105.944 12.7 104.964 13.14 103.964 13.14C102.564 13.14 101.564 12.44 101.304 11.14H108.544C108.564 10.8 108.584 10.5 108.584 10.24ZM101.304 9.51996C101.584 8.09996 102.604 7.47996 103.844 7.47996C105.144 7.47996 106.144 8.23996 106.284 9.51996H101.304Z" fill="#051432"/>
              <path d="M119.977 15.24C122.637 15.24 124.957 13.28 124.957 10.32C124.957 7.35996 122.637 5.41996 119.977 5.41996C117.317 5.41996 115.017 7.35996 115.017 10.32C115.017 13.28 117.317 15.24 119.977 15.24ZM119.977 13.08C118.537 13.08 117.357 11.96 117.357 10.32C117.357 8.71996 118.537 7.57996 119.977 7.57996C121.417 7.57996 122.617 8.71996 122.617 10.32C122.617 11.96 121.417 13.08 119.977 13.08Z" fill="#051432"/>
              <path d="M132.184 2.73996H132.824V0.579956H131.724C129.124 0.579956 127.844 2.19996 127.844 4.87996V5.65996H126.064V7.49996H127.844V15H130.164V7.49996H132.244V5.65996H130.164V4.75996C130.144 3.61996 130.604 2.73996 132.184 2.73996Z" fill="#051432"/>
              </g>
              </svg>
          </a>
        </div>
        <a href="https://github.com/KobaltDigital/goods4ukraine.eu" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" width="36px" height="36px" fill="none" class="">
            <rect x=".75" y="1.275" width="22.5" height="22.5" rx="11.25"></rect>
            <mask id="a" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12 .75C5.646.75.5 5.896.5 12.25c0 5.089 3.292 9.387 7.863 10.91.575.101.79-.244.79-.546 0-.273-.014-1.178-.014-2.142-2.889.532-3.636-.704-3.866-1.35-.13-.331-.69-1.352-1.18-1.625-.402-.216-.977-.748-.014-.762.906-.014 1.553.834 1.769 1.179 1.035 1.74 2.688 1.25 3.349.948.1-.747.402-1.25.733-1.538-2.559-.287-5.232-1.279-5.232-5.678 0-1.25.445-2.285 1.178-3.09-.115-.288-.517-1.467.115-3.048 0 0 .963-.302 3.163 1.179.92-.259 1.897-.388 2.875-.388.977 0 1.955.13 2.875.388 2.2-1.495 3.162-1.179 3.162-1.179.633 1.581.23 2.76.115 3.048.733.805 1.179 1.825 1.179 3.09 0 4.413-2.688 5.39-5.247 5.678.417.36.776 1.05.776 2.128 0 1.538-.014 2.774-.014 3.162 0 .302.216.662.79.547 4.543-1.524 7.835-5.837 7.835-10.911C23.5 5.896 18.354.75 12 .75Z"
                fill="#fff"></path>
            </mask>
            <g mask="url(#a)">
              <path fill="#005BBB" d="M0 0h24v12H0z"></path>
              <path fill="#FFD500" d="M0 12h24v12H0z"></path>
            </g>
          </svg>
        </a>
      </div>
    </div>
    </div>
  </footer>
  @empty(Session::get('language'))
  <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div
        class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 md:align-middle md:max-w-lg md:w-full sm:p-6">
        <div class="flex items-center justify-center mx-auto">
          <h3 class="text-lg font-medium leading-6 text-black" id="modal-title">Choose your language</h3>
        </div>
        <div class="grid-cols-2 mt-5 sm:mt-6 sm:grid md:grid-cols-3 sm:gap-3">
          @foreach (languages() as $language)
          <div class="py-5 text-center border bottom-1">
            <div class="flex justify-center mx-auto">
              <img src="/img/{{ $language->locale }}.svg" class="w-1/2 my-3 sm:mt-5" />
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

  @stack('scripts')

  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  @if (session()->has('success'))
  <script>
      const notyf = new Notyf({duration: 5000, dismissible: false})
          notyf.success('{{ session('success') }}')
  </script>
  @endif

  @if (session()->has('error'))
  <script>
      const notyf = new Notyf({duration: 10000, dismissible: true})
          notyf.error('{{ session('error') }}')
  </script>
  @endif

</body>
</html>
