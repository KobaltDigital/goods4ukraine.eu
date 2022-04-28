<header class="py-2 md:static md:overflow-y-visible">
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
        <div class="relative flex justify-between">
            <div class="flex md:left-0 md:inset-y-0 lg:static xl:col-span-2">
                <div class="flex items-center flex-shrink-0">
                    <a href="/">
                        <x-application-logo class="block w-auto h-8 my-2 fill-current lg:h-16 lg:my-3"/>
                    </a>
                </div>
            </div>
            <div class="flex items-center md:right-0 md:inset-y-0">
                @if(Auth()->check())
                    <div class="ml-2 sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <x-button class="flex items-center transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </x-button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('admin.ads.index')">
                                    {{ __('Ads') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('admin.profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                          this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="mr-2 lg:mr-4">
                        <x-button href="{{ route('register') }}">{{ __("Register") }}</x-button>
                    </div>
                    <div class="">
                        <x-button-secondary href="{{ route('login') }}">{{ __("Login") }}</x-button-secondary>
                    </div>
                @endif

                <div class="mt-2 ml-2 md:mt-0 md:ml-4">
                    <x-langswitch/>
                </div>
            </div>
        </div>
    </div>
</header>
