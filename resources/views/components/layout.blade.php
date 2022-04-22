<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />

    @if (request()->routeIs('ads.show'))
    @stack('tags')
    @else
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta property="og:site_name" content="Goods4Ukraine.eu">
    <meta property="og:title"
        content="Goods4Ukraine - {{ __('Bringing people and goods together in times of need') }}" />
    <meta property="og:description"
        content="{{ __('Goods4Ukraine brings supply and demand together with the aim of helping refugees with missing necessities.') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{ now() }}" />
    <meta property="og:image" content="{{ secure_asset('/img/photo.jpg') }}" />
    <meta name="description"
        content="{{ __('Goods4Ukraine brings supply and demand together with the aim of helping refugees with missing necessities.') }}" />
    @endif

    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Roboto:wght@400;500;600;700&display=swap">
    <link async rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link async rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR-4XYGeEEnH5A0L3qVMt1yjcY8Exd82k&amp;libraries=places">
    </script>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KPYENL9SH4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KPYENL9SH4');
    </script>
</head>

<body class="antialiased text-black bg-light">
    <x-nav />
    {{ $slot }}

    <footer class="px-4 mx-auto border-t max-w-7xl sm:px-6 lg:px-8 md:py-10">
        <div class="my-5">
            <x-nav-sub />
        </div>
        <div class="items-center md:flex">
            <div class="mb-10 mr-10 lg:mb-2">
                <a href="/" title="">
                    <x-application-logo class="block w-auto h-10 fill-current lg:h-20" />
                </a>
            </div>
            <div class="mb-10 lg:mb-2 md:mr-10">
                <p class="text-sm text-black">
                    {{ __('Copyright', ['year' => date('Y')]) }}
                </p>
            </div>
            <div class="flex">
                <div class="mb-10 mr-10 lg:mb-2">
                    <a href="https://kobaltdigital.nl">
                        <svg width="70" height="26" viewBox="0 0 135 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M43.3029 44.914V49.8243H38.898V27H43.3029V38.9785L49.6306 32.2673H54.9793L48.0573 39.7468L54.9793 49.8243H49.9802L45.1558 42.9069L43.3029 44.914Z"
                                fill="#051432" />
                            <path
                                d="M70.0547 47.5244C68.2947 49.1748 66.1796 50 63.7096 49.9999C61.2395 49.9999 59.142 49.1805 57.4172 47.5419C55.6922 45.9036 54.8299 43.7499 54.8302 41.0808C54.8302 38.3892 55.7217 36.218 57.5046 34.5672C59.2876 32.9164 61.4026 32.0912 63.8497 32.0916C66.2969 32.0916 68.3828 32.9109 70.1075 34.5495C71.8322 36.1882 72.6945 38.3419 72.6945 41.0107C72.6942 43.7032 71.8143 45.8744 70.0547 47.5244ZM60.6506 44.5219C61.4776 45.4584 62.5438 45.9266 63.8493 45.9264C65.1548 45.9262 66.1919 45.4639 66.9607 44.5395C67.7296 43.615 68.1141 42.4503 68.1141 41.0455C68.1141 39.6407 67.7296 38.4761 66.9607 37.5517C66.1917 36.6271 65.1546 36.1648 63.8493 36.1646C62.544 36.1643 61.4778 36.6326 60.6506 37.5692C59.823 38.5057 59.4093 39.6645 59.4094 41.0455C59.4096 42.4266 59.8233 43.5853 60.6506 44.5219Z"
                                fill="#051432" />
                            <path
                                d="M84.1953 32.0916C86.4557 32.0916 88.3785 32.9344 89.9637 34.6199C91.549 36.3054 92.3414 38.4474 92.3409 41.0458C92.3409 43.6442 91.5485 45.7862 89.9637 47.4718C88.3789 49.1573 86.4561 50 84.1953 50C82.354 50 80.874 49.3796 79.7554 48.139H79.231L78.7416 49.8243H75.3156V27H79.6853V33.9878C80.8044 32.7237 82.3078 32.0917 84.1953 32.0916ZM80.7343 44.4343C81.4334 45.2656 82.3657 45.6811 83.5311 45.681C84.0887 45.6889 84.6421 45.5842 85.1586 45.3731C85.6751 45.162 86.1441 44.8487 86.5376 44.4519C87.3766 43.6327 87.7961 42.4973 87.7961 41.0458C87.7961 39.5942 87.3766 38.4589 86.5376 37.6397C86.144 37.243 85.675 36.9299 85.1585 36.7187C84.642 36.5076 84.0886 36.4029 83.5311 36.4107C82.3654 36.4107 81.4331 36.8262 80.7343 37.6572C80.0355 38.4883 79.6859 39.6178 79.6853 41.0458C79.6853 42.474 80.035 43.6035 80.7343 44.4343Z"
                                fill="#051432" />
                            <path
                                d="M109.047 43.9251C109.047 44.8854 109.216 45.5467 109.553 45.909C109.891 46.2714 110.41 46.4529 111.109 46.4533V49.8243H110.061C107.939 49.8243 106.587 49.0752 106.005 47.577C104.839 49.1924 102.998 50 100.482 49.9999C98.5003 49.9999 96.9271 49.5317 95.762 48.5953C94.597 47.6589 94.0143 46.3948 94.0141 44.803C94.0011 43.9918 94.1872 43.1898 94.5559 42.468C94.9141 41.7804 95.4519 41.2038 96.1117 40.8C96.7532 40.3964 97.4253 40.0442 98.1218 39.7465C98.9031 39.4338 99.7188 39.2158 100.551 39.0969C101.507 38.9452 102.264 38.8457 102.824 38.7984C103.383 38.7511 104.047 38.7043 104.817 38.658C104.747 36.809 103.756 35.8843 101.845 35.8839C101.432 35.8769 101.02 35.9301 100.621 36.042C100.339 36.115 100.072 36.24 99.8349 36.4106C99.6747 36.5359 99.5333 36.6837 99.4153 36.8496C99.3251 36.9699 99.2598 37.1071 99.223 37.2531L99.188 37.3934H94.8181C94.981 35.8018 95.686 34.5201 96.9332 33.5484C98.1803 32.5767 99.8526 32.0911 101.95 32.0916C104.14 32.0916 105.871 32.6768 107.141 33.8473C108.412 35.0177 109.047 36.8203 109.047 39.255L109.047 43.9251ZM98.4185 44.6626C98.4185 45.5053 98.9079 46.0438 99.8868 46.2778C101.029 46.5588 102.112 46.3247 103.138 45.5755C104.14 44.8501 104.676 43.8084 104.746 42.4503V42.0992C104.07 42.1696 103.54 42.234 103.156 42.2923C102.771 42.3507 102.294 42.4268 101.722 42.5206C101.266 42.5869 100.815 42.6926 100.376 42.8365C100.037 42.9593 99.7047 43.1 99.3802 43.2579C99.0858 43.3858 98.8319 43.5923 98.646 43.8549C98.4924 44.0956 98.4132 44.3767 98.4185 44.6626V44.6626Z"
                                fill="#051432" />
                            <path d="M113.731 27H118.275V49.8243H113.731V27Z" fill="#051432" />
                            <path
                                d="M133.133 45.3999L134.812 48.5252C134.657 48.6754 134.494 48.8161 134.322 48.9465C134.113 49.1106 133.647 49.3271 132.924 49.5961C132.197 49.8658 131.427 50.0025 130.652 49.9996C128.927 49.9996 127.452 49.4611 126.229 48.3843C125.006 47.3075 124.394 45.9029 124.394 44.1705V36.0244H120.897V32.5832H122.645C123.251 32.5832 123.735 32.396 124.096 32.0215C124.458 31.6469 124.638 31.1435 124.638 30.5112V27H128.868V32.2671H133.273V36.0244H128.868V43.89C128.864 44.1706 128.92 44.4489 129.031 44.7062C129.143 44.9635 129.308 45.194 129.515 45.3823C129.727 45.5848 129.976 45.7433 130.25 45.8487C130.523 45.9541 130.814 46.0045 131.106 45.9969C131.433 45.9931 131.757 45.9399 132.067 45.8389C132.337 45.7599 132.6 45.6602 132.854 45.5405L133.133 45.3999Z"
                                fill="#051432" />
                            <path
                                d="M19.9569 31.4612V49.4778C15.0564 49.4778 11.0872 45.4466 11.0872 40.4695C11.0872 35.4924 15.0564 31.4612 19.9569 31.4612Z"
                                fill="#F24725" />
                            <path
                                d="M11.0872 49.7124V27.1915C4.96706 27.1915 0 32.2362 0 38.4519C0 44.6677 4.96706 49.7124 11.0872 49.7124Z"
                                fill="#F24725" />
                            <g opacity="0.5">
                                <path
                                    d="M9.9243 5.65996V6.95996C9.3043 5.97996 8.0643 5.41996 6.7843 5.41996C4.1443 5.41996 2.2243 7.49996 2.2243 10.32C2.2243 13.22 4.2243 15.24 6.7243 15.24C8.0643 15.24 9.3043 14.56 9.9243 13.54V15H12.2443V5.65996H9.9243ZM7.2043 13.08C5.6843 13.08 4.5443 11.82 4.5443 10.32C4.5443 8.81996 5.6843 7.57996 7.1843 7.57996C8.5643 7.57996 9.8843 8.71996 9.8843 10.32C9.8843 11.88 8.6443 13.08 7.2043 13.08Z"
                                    fill="#051432" />
                                <path
                                    d="M20.2309 5.41996C19.2709 5.41996 17.8109 5.95996 17.3309 7.13996V5.65996H15.0109V15H17.3309V10.04C17.3309 8.23996 18.6509 7.61996 19.7109 7.61996C20.7509 7.61996 21.6509 8.41996 21.6509 9.91996V15H23.9709V9.75996C23.9709 7.03996 22.6309 5.41996 20.2309 5.41996Z"
                                    fill="#051432" />
                                <path
                                    d="M32.6552 3.77995C33.4952 3.77995 34.1552 3.15996 34.1552 2.35996C34.1552 1.53996 33.4952 0.939956 32.6552 0.939956C31.8352 0.939956 31.1352 1.53996 31.1352 2.35996C31.1352 3.15996 31.8352 3.77995 32.6552 3.77995ZM31.4952 15H33.8152V5.65996H31.4952V15Z"
                                    fill="#051432" />
                                <path
                                    d="M41.7934 5.41996C40.8334 5.41996 39.3734 5.95996 38.8934 7.13996V5.65996H36.5734V15H38.8934V10.04C38.8934 8.23996 40.2134 7.61996 41.2734 7.61996C42.3134 7.61996 43.2134 8.41996 43.2134 9.91996V15H45.5334V9.75996C45.5334 7.03996 44.1934 5.41996 41.7934 5.41996Z"
                                    fill="#051432" />
                                <path
                                    d="M49.3349 3.77995C50.1749 3.77995 50.8349 3.15996 50.8349 2.35996C50.8349 1.53996 50.1749 0.939956 49.3349 0.939956C48.5149 0.939956 47.8149 1.53996 47.8149 2.35996C47.8149 3.15996 48.5149 3.77995 49.3349 3.77995ZM48.1749 15H50.4949V5.65996H48.1749V15Z"
                                    fill="#051432" />
                                <path
                                    d="M58.3931 5.65996H56.4131V2.21995H54.0931V5.65996H52.4131V7.49996H54.0931V15H56.4131V7.49996H58.3931V5.65996Z"
                                    fill="#051432" />
                                <path
                                    d="M61.3271 3.77995C62.1671 3.77995 62.8271 3.15996 62.8271 2.35996C62.8271 1.53996 62.1671 0.939956 61.3271 0.939956C60.5071 0.939956 59.8071 1.53996 59.8071 2.35996C59.8071 3.15996 60.5071 3.77995 61.3271 3.77995ZM60.1671 15H62.4871V5.65996H60.1671V15Z"
                                    fill="#051432" />
                                <path
                                    d="M72.3852 5.65996V6.95996C71.7652 5.97996 70.5252 5.41996 69.2452 5.41996C66.6052 5.41996 64.6852 7.49996 64.6852 10.32C64.6852 13.22 66.6852 15.24 69.1852 15.24C70.5252 15.24 71.7652 14.56 72.3852 13.54V15H74.7052V5.65996H72.3852ZM69.6652 13.08C68.1452 13.08 67.0052 11.82 67.0052 10.32C67.0052 8.81996 68.1452 7.57996 69.6452 7.57996C71.0252 7.57996 72.3452 8.71996 72.3452 10.32C72.3452 11.88 71.1052 13.08 69.6652 13.08Z"
                                    fill="#051432" />
                                <path
                                    d="M82.6118 5.65996H80.6318V2.21995H78.3118V5.65996H76.6318V7.49996H78.3118V15H80.6318V7.49996H82.6118V5.65996Z"
                                    fill="#051432" />
                                <path
                                    d="M85.5459 3.77995C86.3859 3.77995 87.0459 3.15996 87.0459 2.35996C87.0459 1.53996 86.3859 0.939956 85.5459 0.939956C84.7259 0.939956 84.0259 1.53996 84.0259 2.35996C84.0259 3.15996 84.7259 3.77995 85.5459 3.77995ZM84.3859 15H86.7059V5.65996H84.3859V15Z"
                                    fill="#051432" />
                                <path
                                    d="M95.684 5.65996L93.224 12.06L90.744 5.65996H88.244L92.144 15H94.264L98.204 5.65996H95.684Z"
                                    fill="#051432" />
                                <path
                                    d="M108.584 10.24C108.584 7.31996 106.484 5.41996 103.824 5.41996C101.144 5.41996 98.9235 7.33996 98.9235 10.32C98.9235 13.24 101.044 15.24 103.824 15.24C105.524 15.24 107.184 14.48 108.044 13.12L106.484 11.94C105.944 12.7 104.964 13.14 103.964 13.14C102.564 13.14 101.564 12.44 101.304 11.14H108.544C108.564 10.8 108.584 10.5 108.584 10.24ZM101.304 9.51996C101.584 8.09996 102.604 7.47996 103.844 7.47996C105.144 7.47996 106.144 8.23996 106.284 9.51996H101.304Z"
                                    fill="#051432" />
                                <path
                                    d="M119.977 15.24C122.637 15.24 124.957 13.28 124.957 10.32C124.957 7.35996 122.637 5.41996 119.977 5.41996C117.317 5.41996 115.017 7.35996 115.017 10.32C115.017 13.28 117.317 15.24 119.977 15.24ZM119.977 13.08C118.537 13.08 117.357 11.96 117.357 10.32C117.357 8.71996 118.537 7.57996 119.977 7.57996C121.417 7.57996 122.617 8.71996 122.617 10.32C122.617 11.96 121.417 13.08 119.977 13.08Z"
                                    fill="#051432" />
                                <path
                                    d="M132.184 2.73996H132.824V0.579956H131.724C129.124 0.579956 127.844 2.19996 127.844 4.87996V5.65996H126.064V7.49996H127.844V15H130.164V7.49996H132.244V5.65996H130.164V4.75996C130.144 3.61996 130.604 2.73996 132.184 2.73996Z"
                                    fill="#051432" />
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="mr-10">
                    <a href="https://dropsolid.com/en/choice" target="_blank">
                        <svg width="89" height="26" viewBox="0 0 221 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path
                                    d="M34.2449 19.0503H40.4744L40.6328 22.1156C41.4998 21.1778 42.5235 20.3929 43.6596 19.795C44.8334 19.1302 46.1594 18.7697 47.5135 18.7472C47.9095 18.7426 48.3048 18.7804 48.6925 18.8598L48.2086 25.2935C47.4556 25.1043 46.6804 25.014 45.9033 25.0251C44.8349 25.017 43.7827 25.2826 42.8501 25.7958C42.0196 26.2276 41.3393 26.894 40.8968 27.7094V45.6513H34.2449V19.0503Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M56.3125 44.3349C54.2834 43.1515 52.6314 41.4327 51.5435 39.3732C50.4234 37.257 49.8521 34.9011 49.8805 32.5151C49.8553 30.1074 50.4261 27.7298 51.5435 25.5878C52.6251 23.517 54.278 21.7884 56.3125 20.6001C58.5391 19.3229 61.0831 18.6813 63.6595 18.747C66.233 18.682 68.774 19.3236 70.9977 20.6001C73.0347 21.793 74.6878 23.528 75.7667 25.6051C76.8841 27.7472 77.4549 30.1247 77.4296 32.5324C77.458 34.9184 76.8868 37.2743 75.7667 39.3905C74.6787 41.45 73.0268 43.1688 70.9977 44.3522C68.7715 45.6218 66.2317 46.2602 63.6595 46.1966C61.0827 46.2561 58.5396 45.6117 56.3125 44.3349ZM68.7716 38.5332C70.0883 36.787 70.7449 34.6434 70.6281 32.4718C70.7296 30.3021 70.0746 28.1635 68.7716 26.4104C68.1348 25.6906 67.3486 25.1135 66.466 24.718C65.5834 24.3226 64.6249 24.118 63.6551 24.118C62.6853 24.118 61.7268 24.3226 60.8442 24.718C59.9616 25.1135 59.1754 25.6906 58.5386 26.4104C57.2387 28.1646 56.5868 30.3032 56.6908 32.4718C56.5715 34.6423 57.225 36.7858 58.5386 38.5332C59.1793 39.2468 59.9668 39.8182 60.8489 40.2096C61.731 40.6009 62.6875 40.8033 63.6551 40.8033C64.6227 40.8033 65.5792 40.6009 66.4613 40.2096C67.3434 39.8182 68.1309 39.2468 68.7716 38.5332Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M116.567 45.7031C115.053 45.3617 113.579 44.8685 112.167 44.2311L112.757 38.6372C114.105 39.4407 115.535 40.1025 117.024 40.6115C118.326 41.0542 119.694 41.2795 121.072 41.2783C123.788 41.2783 125.146 40.3979 125.146 38.6372C125.166 38.2122 125.077 37.7889 124.888 37.4062C124.699 37.0235 124.415 36.6935 124.063 36.4465C122.853 35.6934 121.556 35.0831 120.201 34.628C118.055 33.9525 116.075 32.8469 114.385 31.3809C113.743 30.7313 113.245 29.9585 112.921 29.1107C112.597 28.2629 112.454 27.3584 112.502 26.4538C112.475 25.3838 112.704 24.3226 113.17 23.3556C113.636 22.3886 114.327 21.5427 115.185 20.8859C117.271 19.3692 119.828 18.6131 122.418 18.7471C125.307 18.7145 128.155 19.4154 130.689 20.782L130.099 26.3758C128.9 25.5449 127.618 24.8369 126.272 24.263C125.074 23.7704 123.787 23.5201 122.488 23.527C121.557 23.4738 120.633 23.7134 119.849 24.2111C119.542 24.435 119.295 24.7298 119.131 25.0695C118.967 25.4093 118.89 25.7835 118.907 26.1594C118.884 26.7546 119.084 27.3374 119.47 27.796C119.918 28.2722 120.456 28.6575 121.054 28.9303C121.732 29.268 122.858 29.7269 124.433 30.3331C126.52 31.0059 128.437 32.11 130.055 33.5716C130.642 34.2088 131.096 34.9535 131.39 35.7632C131.685 36.573 131.814 37.4319 131.771 38.2909C131.825 39.4038 131.605 40.5131 131.13 41.5246C130.655 42.5361 129.939 43.42 129.043 44.1012C127.225 45.4693 124.632 46.1534 121.265 46.1534C119.689 46.169 118.116 46.0092 116.576 45.6772"
                                    fill="#1D0D82" />
                                <path
                                    d="M141.142 44.335C139.118 43.1478 137.47 41.4298 136.382 39.3733C135.262 37.2571 134.691 34.9012 134.719 32.5152C134.694 30.1075 135.264 27.73 136.382 25.5879C137.463 23.5124 139.116 21.7781 141.151 20.5829C143.401 19.3671 145.926 18.7297 148.493 18.7297C151.06 18.7297 153.586 19.3671 155.836 20.5829C157.876 21.7753 159.532 23.5102 160.614 25.5879C161.727 27.7315 162.297 30.108 162.277 32.5152C162.301 34.9007 161.73 37.2556 160.614 39.3733C159.523 41.4335 157.868 43.1521 155.836 44.335C153.584 45.5454 151.059 46.1797 148.493 46.1797C145.928 46.1797 143.403 45.5454 141.151 44.335H141.142ZM153.619 38.5334C154.932 36.7859 155.586 34.6424 155.467 32.472C155.571 30.3033 154.919 28.1647 153.619 26.4105C152.981 25.6905 152.194 25.1133 151.311 24.7178C150.428 24.3223 149.468 24.1176 148.498 24.1176C147.527 24.1176 146.568 24.3223 145.685 24.7178C144.802 25.1133 144.015 25.6905 143.377 26.4105C142.077 28.1647 141.425 30.3033 141.529 32.472C141.41 34.6424 142.063 36.7859 143.377 38.5334C144.018 39.2471 144.807 39.8187 145.69 40.2101C146.572 40.6015 147.53 40.8039 148.498 40.8039C149.466 40.8039 150.423 40.6015 151.306 40.2101C152.189 39.8187 152.977 39.2471 153.619 38.5334Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M167.6 44.2571C166.416 42.8633 165.804 41.0844 165.884 39.2694V3.66284H172.536V36.5677C172.498 37.5692 172.578 38.5716 172.774 39.5551C172.811 39.7914 172.913 40.0133 173.068 40.1976C173.222 40.382 173.425 40.5219 173.653 40.6029C174.345 40.7613 175.056 40.8254 175.765 40.7934L175.176 46.1707H172.765C170.477 46.1707 168.761 45.53 167.617 44.2484"
                                    fill="#1D0D82" />
                                <path
                                    d="M179.98 8.72852H186.632V15.2662H179.98V8.72852ZM179.98 19.2754H186.632V45.6513H179.98V19.2754Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M217.674 19.0502V0H211.172V19.0502H203.974C201.263 19.0502 198.613 19.8414 196.358 21.3238C194.104 22.8063 192.347 24.9133 191.309 27.3784C190.272 29.8436 190 32.5562 190.529 35.1732C191.058 37.7902 192.364 40.194 194.281 42.0808C196.198 43.9675 198.641 45.2524 201.3 45.773C203.959 46.2935 206.715 46.0264 209.22 45.0053C211.725 43.9842 213.866 42.255 215.373 40.0364C216.879 37.8178 217.683 35.2095 217.683 32.5412V25.406H221.009V19.0502H217.674ZM211.172 32.4979C211.172 33.9009 210.749 35.2724 209.957 36.4388C209.164 37.6053 208.038 38.5143 206.721 39.0508C205.404 39.5873 203.955 39.7272 202.556 39.4529C201.158 39.1785 199.874 38.5022 198.867 37.5095C197.859 36.5169 197.174 35.2524 196.897 33.8761C196.62 32.4999 196.764 31.0737 197.31 29.778C197.857 28.4822 198.782 27.3752 199.968 26.597C201.155 25.8188 202.549 25.4043 203.974 25.406H211.172V32.4979Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M27.4172 19.0502V0H20.9149V19.0502H13.7086C10.9955 19.0502 8.3433 19.8426 6.088 21.3269C3.83269 22.8112 2.07567 24.9208 1.03941 27.3885C0.00314186 29.8562 -0.265752 32.571 0.266771 35.1891C0.799295 37.8073 2.10928 40.2111 4.03087 42.0961C5.95245 43.9811 8.39919 45.2626 11.0613 45.7782C13.7234 46.2939 16.4811 46.0205 18.9852 44.9928C21.4893 43.9651 23.6273 42.2291 25.1283 40.0049C26.6293 37.7806 27.4259 35.168 27.4172 32.4979V25.406H30.7431V19.0502H27.4172ZM20.9149 32.4979C20.9149 33.9005 20.4922 35.2717 19.7004 36.4379C18.9086 37.6042 17.7831 38.5132 16.4663 39.0499C15.1496 39.5867 13.7006 39.7271 12.3028 39.4535C10.9049 39.1799 9.62085 38.5044 8.61304 37.5126C7.60523 36.5208 6.91891 35.2571 6.64085 33.8815C6.3628 32.5058 6.50551 31.0798 7.05093 29.784C7.59635 28.4881 8.51999 27.3805 9.70505 26.6012C10.8901 25.822 12.2834 25.406 13.7086 25.406H20.9149V32.4979Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M96.0127 18.981C92.3784 18.9855 88.8943 20.4084 86.3245 22.9374C83.7546 25.4665 82.3088 28.8953 82.3042 32.472V39.5638H78.5823V45.963H82.3042V64H88.8065V45.963H96.0127C99.6485 45.963 103.135 44.5416 105.706 42.0115C108.277 39.4815 109.721 36.05 109.721 32.472C109.721 28.8939 108.277 25.4624 105.706 22.9324C103.135 20.4023 99.6485 18.981 96.0127 18.981ZM96.0127 39.5638H88.8065V32.472C88.8065 31.0693 89.2291 29.6982 90.021 28.5319C90.8128 27.3657 91.9383 26.4567 93.255 25.9199C94.5718 25.3832 96.0207 25.2427 97.4186 25.5164C98.8165 25.79 100.1 26.4654 101.108 27.4573C102.116 28.4491 102.802 29.7127 103.081 31.0884C103.359 32.4641 103.216 33.89 102.67 35.1859C102.125 36.4818 101.201 37.5894 100.016 38.3686C98.8312 39.1479 97.438 39.5638 96.0127 39.5638Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M112.528 63.6103V56.2846H115.335C115.996 56.2726 116.65 56.4245 117.235 56.7262C117.788 57.014 118.243 57.4531 118.546 57.9905C118.859 58.6046 119.022 59.2821 119.022 59.9691C119.022 60.656 118.859 61.3335 118.546 61.9477C118.243 62.485 117.788 62.9242 117.235 63.2119C116.65 63.5137 115.996 63.6656 115.335 63.6536L112.528 63.6103ZM113.901 62.4066H115.335C115.76 62.4228 116.181 62.3207 116.549 62.1122C116.878 61.9051 117.133 61.6025 117.279 61.2463C117.608 60.3896 117.608 59.4446 117.279 58.5879C117.133 58.2318 116.878 57.9292 116.549 57.722C116.181 57.5135 115.76 57.4115 115.335 57.4276H113.901V62.4066Z"
                                    fill="#1D0D82" />
                                <path d="M123.527 56.2415H122.154V63.6104H123.527V56.2415Z" fill="#1D0D82" />
                                <path
                                    d="M130.425 63.7576C129.716 63.7791 129.015 63.6147 128.392 63.2813C127.836 62.9701 127.385 62.5029 127.099 61.9392C126.785 61.3095 126.631 60.6141 126.65 59.9129C126.634 59.2114 126.807 58.5183 127.152 57.904C127.474 57.3395 127.953 56.8769 128.533 56.5705C129.158 56.2431 129.858 56.0791 130.566 56.0942C130.947 56.0941 131.328 56.1348 131.701 56.2154C132.024 56.2797 132.337 56.3844 132.633 56.5272L132.484 57.8087C132.201 57.681 131.906 57.5796 131.604 57.5057C131.267 57.4279 130.921 57.3901 130.574 57.3931C130.094 57.3715 129.618 57.4857 129.202 57.7221C128.856 57.9271 128.581 58.2285 128.41 58.5881C128.235 58.9931 128.148 59.4296 128.155 59.8696C128.146 60.3275 128.236 60.782 128.419 61.2031C128.581 61.5743 128.85 61.8905 129.193 62.1124C129.583 62.3415 130.032 62.4557 130.486 62.4414C130.645 62.4414 130.812 62.4414 130.988 62.4414L131.516 62.3548V61.03H130.486V59.9129H132.862V63.2121C132.534 63.3846 132.185 63.5155 131.824 63.6017C131.361 63.717 130.885 63.7723 130.407 63.7663"
                                    fill="#1D0D82" />
                                <path d="M137.499 56.2415H136.127V63.6104H137.499V56.2415Z" fill="#1D0D82" />
                                <path
                                    d="M142.523 63.6104V57.549H140.411V56.2415H146.016V57.549H143.896V63.6104H142.523Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M150.697 57.5575H151.058L148.894 63.619H147.565L150.205 56.25H151.498L154.138 63.619H152.809L150.697 57.5575ZM152.457 61.8871H149.316V60.6835H152.457V61.8871Z"
                                    fill="#1D0D82" />
                                <path d="M156.971 63.6104V56.2415H158.344V62.4155H161.423V63.6104H156.971Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M170.917 57.5575H171.278L169.113 63.619H167.785L170.424 56.25H171.718L174.358 63.619H173.029L170.917 57.5575ZM172.677 61.8871H169.536V60.6835H172.677V61.8871Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M180.376 63.7576C179.667 63.7791 178.966 63.6147 178.343 63.2813C177.787 62.9701 177.336 62.5029 177.05 61.9392C176.73 61.3111 176.573 60.6151 176.592 59.9129C176.576 59.2114 176.75 58.5183 177.094 57.904C177.419 57.3412 177.897 56.8792 178.475 56.5705C179.1 56.2431 179.8 56.0791 180.508 56.0942C180.892 56.0946 181.276 56.1352 181.652 56.2154C181.972 56.2795 182.283 56.3843 182.576 56.5272L182.426 57.8087C182.143 57.6797 181.849 57.5782 181.546 57.5057C181.209 57.4269 180.863 57.3891 180.517 57.3931C180.039 57.3708 179.566 57.4851 179.153 57.7221C178.803 57.9223 178.527 58.2251 178.361 58.5881C178.182 58.9918 178.095 59.4292 178.106 59.8696C178.094 60.3268 178.181 60.7813 178.361 61.2031C178.526 61.5749 178.798 61.891 179.144 62.1123C179.534 62.3429 179.983 62.4572 180.437 62.4414C180.596 62.4414 180.754 62.4414 180.93 62.4414L181.467 62.3548V61.03H180.437V59.9129H182.831V63.2121C182.503 63.3846 182.154 63.5155 181.793 63.6017C181.333 63.717 180.859 63.7723 180.385 63.7662"
                                    fill="#1D0D82" />
                                <path
                                    d="M186.104 63.6104V56.2415H190.89V57.549H187.503V59.1163H190.134V60.4239H187.503V62.3029H190.996V63.6104H186.104Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M194.102 63.6104V56.2415H195.448L198.651 60.9954V56.2415H200.024V63.6104H198.897L195.475 58.5621V63.6104H194.102Z"
                                    fill="#1D0D82" />
                                <path
                                    d="M206.983 63.7576C206.284 63.7729 205.593 63.6088 204.977 63.2814C204.408 62.9735 203.94 62.5105 203.631 61.9478C203.296 61.3274 203.13 60.6325 203.147 59.9303C203.127 59.2239 203.297 58.5249 203.64 57.904C203.962 57.3424 204.438 56.8805 205.012 56.5705C205.628 56.2431 206.319 56.0789 207.019 56.0942C207.383 56.0921 207.746 56.1328 208.101 56.2155C208.405 56.2863 208.7 56.3909 208.981 56.5272L208.831 57.8088C208.561 57.6874 208.281 57.5861 207.995 57.5057C207.682 57.4262 207.36 57.3884 207.036 57.3931C206.574 57.375 206.117 57.4861 205.716 57.7135C205.374 57.9219 205.099 58.2224 204.924 58.5794C204.582 59.4126 204.582 60.3441 204.924 61.1772C205.091 61.537 205.364 61.8389 205.708 62.0431C206.097 62.2737 206.547 62.388 207.001 62.3721C207.328 62.3753 207.653 62.3345 207.969 62.2509C208.27 62.1726 208.564 62.0712 208.849 61.9478L208.998 63.2294C208.7 63.3655 208.387 63.47 208.066 63.5411C207.723 63.6256 207.371 63.6664 207.019 63.6624"
                                    fill="#1D0D82" />
                                <path
                                    d="M213.759 63.6104V60.6317L211.128 56.2415H212.623L214.762 59.9822H214.119L216.257 56.2415H217.762L215.122 60.6317V63.6104H213.759Z"
                                    fill="#1D0D82" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="221" height="64" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <a href="https://github.com/KobaltDigital/goods4ukraine.eu" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" fill="none" class="">
                        <rect x=".75" y="1.275" width="22.5" height="22.5" rx="11.25"></rect>
                        <mask id="a" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24"
                            height="24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 .75C5.646.75.5 5.896.5 12.25c0 5.089 3.292 9.387 7.863 10.91.575.101.79-.244.79-.546 0-.273-.014-1.178-.014-2.142-2.889.532-3.636-.704-3.866-1.35-.13-.331-.69-1.352-1.18-1.625-.402-.216-.977-.748-.014-.762.906-.014 1.553.834 1.769 1.179 1.035 1.74 2.688 1.25 3.349.948.1-.747.402-1.25.733-1.538-2.559-.287-5.232-1.279-5.232-5.678 0-1.25.445-2.285 1.178-3.09-.115-.288-.517-1.467.115-3.048 0 0 .963-.302 3.163 1.179.92-.259 1.897-.388 2.875-.388.977 0 1.955.13 2.875.388 2.2-1.495 3.162-1.179 3.162-1.179.633 1.581.23 2.76.115 3.048.733.805 1.179 1.825 1.179 3.09 0 4.413-2.688 5.39-5.247 5.678.417.36.776 1.05.776 2.128 0 1.538-.014 2.774-.014 3.162 0 .302.216.662.79.547 4.543-1.524 7.835-5.837 7.835-10.911C23.5 5.896 18.354.75 12 .75Z"
                                fill="#fff">
                            </path>
                        </mask>
                        <g mask="url(#a)">
                            <path fill="#005BBB" d="M0 0h24v12H0z"></path>
                            <path fill="#FFD500" d="M0 12h24v12H0z"></path>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
    @empty(Session::get('language'))
    <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 md:align-middle md:max-w-lg md:w-full sm:p-6">
                <div class="flex items-center justify-center mx-auto">
                    <h3 class="text-lg font-medium leading-6 text-black" id="modal-title">Choose your language</h3>
                </div>
                <div class="mt-5 sm:mt-6">

                    <div class="flow-root mt-6">
                        <ul role="list" class="-my-5 divide-y divide-gray-200">
                            @foreach (languages() as $language)
                            <li class="py-4">
                                <a href="{{ route('sessions.languages.update', ['lang' => $language->locale]) }}"
                                    class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="object-cover w-12 h-8"
                                            src="{{ url(sprintf('img/%s.svg', $language->locale)) }}"
                                            alt="{{ $language->title }}s">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">{{ $language->title }}</p>
                                        <p class="text-sm text-gray-500 truncate">{{ $language->select_language_title }}
                                            <span aria-hidden="true">&rarr;</span></p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- @foreach (languages() as $language)

                        <img src="/img/{{ $language->locale }}.svg" class="w-full h-full mb-2"
                    alt="{{ $language->title }}" />
                    {{ $language->title }}
                    </a>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    @endempty

    @stack('scripts')

    <script async src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    @if (session()->has('success'))
    <script>
        const notyf = new Notyf({
            duration: 5000,
            dismissible: false
        })
        notyf.success('{{ session('
            success ') }}')
    </script>
    @endif

    @if (session()->has('error'))
    <script>
        const notyf = new Notyf({
            duration: 10000,
            dismissible: true
        })
        notyf.error('{{ session('
            error ') }}')
    </script>
    @endif
</body>

</html>
