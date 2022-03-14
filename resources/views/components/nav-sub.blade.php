<ul class="flex text-sm text-blue">
    <li><a class="hover:bg-white hover:underline px-4 border py-2 rounded-full {{ request()->routeIs('about') ? 'border-accent bg-white' : 'border-white' }}" href="{{ route('about') }}" >Over Goods4ukraine</a></li>
    <li><a class="hover:bg-white hover:underline px-4 border py-2 rounded-full {{ request()->routeIs('privacy') ? 'border-accent bg-white' : 'border-white' }}" href="{{ route('privacy'); }}">Privacyverklaring</a></li>
    <li><a class="hover:bg-white hover:underline px-4 border py-2 rounded-full {{ request()->routeIs('cookies') ? 'border-accent bg-white' : 'border-white' }}" href="{{ route('cookies') }}">Cookiebeleid</a></li>
    <li><a class="hover:bg-white hover:underline px-4 border py-2 rounded-full {{ request()->routeIs('rules') ? 'border-accent bg-white' : 'border-white' }}" href="{{ route('rules') }}">Verboden objecten</a></li>
    <li><a class="hover:bg-white hover:underline px-4 border py-2 rounded-full {{ request()->routeIs('terms-of-use') ? 'border-accent bg-white' : 'border-white' }}" href="{{ route('terms-of-use') }}">Gebruikersvoorwaarden</a></li>
</ul>


