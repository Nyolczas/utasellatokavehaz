<div class="col-12 col-md-6 col-xl-4">
    <div class="keret">
        <div class="keret-bel p-4">
            {{-- Üdítők start --}}
            <h2 class="text-center heading">Üdítők</h2>
            <hr>
            <div class="d-flex">
                <div class="col-8">
                    @forelse ($softdrink as $sd)
                    <div class="tetel-unit">
                        <p class="name">{{ $sd->name  }}</p>
                        <p class="desc">{{ $sd->description }}</p>
                    </div>
                    @empty
                    <p>Nincs még üdítő hozzáadva!</p>
                    @endforelse
                </div>
                <div class="col-4">
                    <div class="d-flex p-0 h-100">
                        <div class="col-4 m-0 px-1 py-3">
                            <img class="bracket" src="{{ asset('/img/decor/bracket.png') }}" alt="bracket">
                        </div>
                        <div class="col-8 m-0 p-0 d-flex align-items-center justify-content-center">
                            <p class="col-3 px-0 input-hide price unit-price">{{ $softdrink[0]->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Üdítők end --}}
            {{-- Gyümölcslevek start --}}
            <hr>
            <h2 class="text-center heading">Gyümölcslevek</h2>
            <hr>
            <div class="d-flex">
                <div class="col-8">
                    @forelse ($fruit as $fr)
                    <div class="tetel-unit">
                        <p class="name">{{ $fr->name  }}</p>
                        <p class="desc">{{ $fr->description }}</p>
                    </div>
                    @empty
                    <p>Nincs még gyümölcslé hozzáadva!</p>
                    @endforelse
                </div>
                <div class="col-4">
                    <div class="d-flex p-0 h-100">
                        <div class="col-4 m-0 px-1 py-3">
                            <img class="bracket" src="{{ asset('/img/decor/bracket.png') }}" alt="bracket">
                        </div>
                        <div class="col-8 m-0 p-0 d-flex align-items-center justify-content-center">
                            <p class="col-3 px-0 input-hide price unit-price">{{ $fruit[0]->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Gyümölcslevek end --}}
            {{-- ásványvizek start --}}
            <hr>
            <h2 class="text-center heading">Ásványvizek</h2>
            <hr>
            @forelse ($mineral as $mr)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="name">{{ $mr->name  }}</p>
                    <p class="desc">{{ $mr->description }}</p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $mr->price }}</p>
            </div>
            @empty
            <p>Nincs még ásványvíz hozzáadva!</p>
            @endforelse
            {{-- ásványvizek end --}}
            {{-- szörpök start --}}
            <hr>
            <h2 class="text-center heading">Szörpök</h2>
            <hr>
            @forelse ($syrup as $sr)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="name">{{ $sr->name  }}</p>
                    <p class="desc">{{ $sr->description }}</p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $sr->price }}</p>
            </div>
            @empty
            <p>Nincs még ásványvíz hozzáadva!</p>
            @endforelse
            {{-- szörpök end --}}
        </div>
    </div>
</div>
