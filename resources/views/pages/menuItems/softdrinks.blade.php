<div class="col-12 col-md-6 col-xl-4">
    <div class="keret">
        <div class="keret-bel p-4">
            <h2 class="text-center heading">Üdítők</h2>
            <hr>
            <div class="d-flex">
                <div class="col-8">
                    @forelse ($softdrink as $sd)
                    <div class="tetel">
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
            <hr>
            <h2 class="text-center heading">Gyümölcslevek</h2>
            <hr>
            <div class="d-flex">
                <div class="col-8">
                    @forelse ($fruit as $fr)
                    <div class="tetel">
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
        </div>
    </div>
</div>
