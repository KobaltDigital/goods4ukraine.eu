@php

$volunteers = [[
        'name' => 'Reinier Sierag',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C4D03AQGbpkSm8XcBsQ/profile-displayphoto-shrink_400_400/0/1626265660326?e=2147483647&v=beta&t=upO6CNNifXr0t1HbucsEMowHWuWuEWL0y8wJyUlb0EA',
        'url' => 'https://www.linkedin.com/in/sierag/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Ruben Hoogeveen',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C5603AQGFNlpM_m3f1A/profile-displayphoto-shrink_400_400/0/1632477906829?e=1654128000&v=beta&t=1N0bp-DSQ0nTIsdHjBQPjZvCUBK5JysDUpVGFso4tPA',
        'url' => 'https://www.linkedin.com/in/ruben-hoogeveen/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Arne van Hoorn',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C5603AQGfI_4P_IsBaw/profile-displayphoto-shrink_400_400/0/1629296836414?e=1653523200&v=beta&t=FVKzqrSKzhGfu8O6o_Yy3nfbWIoSwo_7iszmc2C2mi0',
        'url' => 'https://www.linkedin.com/in/arne-van-hoorn-0844663/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Mick Bosman',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C4D03AQFKCZ9Jghku_Q/profile-displayphoto-shrink_400_400/0/1605107134866?e=2147483647&v=beta&t=CTxwtWrg_2-eXbAQwztRoh7yOjH6pHQwWWdICTcGIM0',
        'url' => 'https://www.linkedin.com/in/mick-bosman-7768b816b/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Huub Duinmeijer',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C4E03AQH3OB5zcTrMrQ/profile-displayphoto-shrink_400_400/0/1648197243160?e=1653523200&v=beta&t=GEfNc0nKBcJIQa5kabF8WdDyHXaSrmAKSuXQ8wDjw9w',
        'url' => 'https://www.linkedin.com/in/huub-duinmeijer-6ba563a9/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Brenda Koning',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C4D03AQEsRLWKt-0vxQ/profile-displayphoto-shrink_400_400/0/1626169602403?e=1653523200&v=beta&t=6m3tWYvzkGVNHFHc-DnrO0bfJYW_36sBVNQmq66YV20',
        'url' => 'https://www.linkedin.com/in/brenda-koning-aa436312/',
        'role' => 'Communicatie'
    ],
    [
        'name' => 'Kylian Wester',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C4D03AQEHEyNXVTXG8Q/profile-displayphoto-shrink_400_400/0/1558088501046?e=1653523200&v=beta&t=byTfgOgYbtL2vcPPZARihNwIzb2KiK6IoIZiBGWP840',
        'url' => 'https://www.linkedin.com/in/kylian-wester/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Luuk Kenselaar',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/D4E03AQEnJVjkwVgTBA/profile-displayphoto-shrink_400_400/0/1643897549689?e=1653523200&v=beta&t=e2zohY8SaLmrPekVXiDxkoc5LRj6m3KBmQWXoY2a_R8',
        'url' => 'https://www.linkedin.com/in/lkenselaar/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Milan Bakker',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C4D03AQGfx-pQr6CXaQ/profile-displayphoto-shrink_400_400/0/1645107278836?e=1653523200&v=beta&t=Tj5V_fOrxhzOO1q7RnU8XismDczw85DfuA9vFeIl0-Q',
        'url' => 'https://www.linkedin.com/in/milan-bakker-a9bb00141/',
        'role' => 'Developer'
    ],
    [
        'name' => 'Els Schipper',
        'img' =>
        'https://media-exp1.licdn.com/dms/image/C5603AQHVGqYB4jGzIA/profile-displayphoto-shrink_400_400/0/1633501324576?e=1653523200&v=beta&t=XZG652o69OVN2Jm4KxWrTBKXdhZKugjb5TCGflXUbOQ',
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
                    <h1>Over Goods4ukraine.eu</h1>
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
                        Hoe werkt Goods4ukraine.eu?
                    </h2>
                    <p>
                        Goods4ukraine.eu is een website die vraag en aanbod samenbrengt. Ondanks het feit dat de
                        website zich vooral kenmerkt door het laagdrempelige karakter ziet Goods4ukraine.eu het als haar
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