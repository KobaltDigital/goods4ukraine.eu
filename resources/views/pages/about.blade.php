@php

$volunteers = [[
        'name' => 'Reinier Sierag',
        'img' => asset('img/team/reinier-sierag.jpg'),
        'url' => 'https://www.linkedin.com/in/sierag/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Ruben Hoogeveen',
        'img' => asset('img/team/ruben-hoogeveen.jpg'),
        'url' => 'https://www.linkedin.com/in/ruben-hoogeveen/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Arne van Hoorn',
        'img' => asset('img/team/arne-van-hoorn.jpg'),
        'url' => 'https://www.linkedin.com/in/arne-van-hoorn-0844663/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Mick Bosman',
        'img' => asset('img/team/mick-bosman.jpg'),
        'url' => 'https://www.linkedin.com/in/mick-bosman-7768b816b/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Huub Duinmeijer',
        'img' => asset('img/team/huub-duinmeijer.jpg'),
        'url' => 'https://www.linkedin.com/in/huub-duinmeijer-6ba563a9/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Brenda Koning',
        'img' => asset('img/team/brenda-koning.jpg'),
        'url' => 'https://www.linkedin.com/in/brenda-koning-aa436312/',
        'role' => 'Communicatie'
    ],
    [
        'name' => 'Kylian Wester',
        'img' => asset('img/team/kylian-wester.jpg'),
        'url' => 'https://www.linkedin.com/in/kylian-wester/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Luuk Kenselaar',
        'img' => asset('img/team/luuk-kenselaar.jpg'),
        'url' => 'https://www.linkedin.com/in/lkenselaar/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Milan Bakker',
        'img' => asset('img/team/milan-bakker.jpg'),
        'url' => 'https://www.linkedin.com/in/milan-bakker-a9bb00141/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Els Schipper',
        'img' => asset('img/team/els-schipper.jpg'),
        'url' => 'https://www.linkedin.com/in/elsschipper/',
        'role' => 'PR'
    ]];
    shuffle($volunteers);
@endphp

<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <x-nav-sub />
            </div>
            <div class="md:grid md:gap-6 md:grid-cols-2">
                <div class="bg-white p-6 overflow-hidden shadow rounded-lg mb-6 prose max-w-none">
                    <h1>Over Goods4Ukraine.eu</h1>
                    <p class="intro">
                        Goods4Ukraine brengt vraag en aanbod bij elkaar met als doel om vluchtelingen te helpen aan
                        missende
                        benodigdheden.
                    </p>
                    <p>
                        Het platform Goods4Ukraine is speciaal opgezet om vluchtelingen uit Oekraïne te helpen aan
                        benodigheden. Heb je speelgoed, babyspullen, een woonplek of vervoer die je gratis wil
                        aanbieden,
                        dan kun je eenvoudig je aanbod plaatsen op de website.
                    </p>
                    <p>
                        Het plaatsen werkt als volgt, je registreert je met je e-mailadres zodat je je advertentie
                        eventueel
                        kunt aanpassen of kunt sluiten. Reageert iemand op je aanbod, dan ontvang je een mail. Je kunt
                        er
                        zelf voor kiezen om met diegene in contact te komen.
                    </p>
                </div>
                <div class="bg-white p-6 overflow-hidden shadow rounded-lg mb-6 prose max-w-none">
                    <h2>
                        Hoe werkt Goods4Ukraine.eu?
                    </h2>
                    <p>
                        Goods4Ukraine.eu is een website die vraag en aanbod samenbrengt. Ondanks het feit dat de
                        website zich vooral kenmerkt door het laagdrempelige karakter ziet Goods4Ukraine.eu het als haar
                        missie om hen zo goed mogelijk te adviseren over prettig, veilig en verantwoord handelen. De
                        website
                        is zeer eenvoudig in gebruik. Het enige dat hiervoor nodig is, is een e-mailadres, enkele
                        lokatiegegevens en een paar minuten tijd.
                    </p>
                    <h3>
                        Duurzaam en lokaal
                    </h3>
                    <p>
                        Door de lokatiegegevens kunnen we de vraag- en aanbod optimaal laten samenkomen. Hierdoor
                        proberen we lokaal en duurzame matches te maken.
                    </p>
                </div>
            </div>
            <div class="bg-white p-6 overflow-hidden shadow rounded-lg mb-10max-w-none">
                <h2 class="text-center">
                    Vrijwilligers
                </h2>
                <ul role="list"
                    class="p-10 mx-auto grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-4 md:gap-x-6 lg:max-w-5xl lg:gap-x-10 lg:gap-y-12 xl:grid-cols-4">
                    @foreach($volunteers as $volunteer)
                        <li>
                            <a href="{{ $volunteer['url'] }}" class="space-y-4 text-center border border-white hover:border-blue hover:bg-white block p-3 rounded">
                                <img class="mx-auto h-20 w-20 rounded-full lg:w-24 lg:h-24" src="{{ $volunteer['img'] }}"
                                    alt="">
                                <div class="space-y-2">
                                    <div class="text-xs font-medium lg:text-sm">
                                        <h3>{{ $volunteer['name'] }}</h3>
                                        <p class="text-accent">{{ $volunteer['role'] }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    <!-- More people... -->
                </ul>
            </div>
        </div>
    </div>
</x-layout>
