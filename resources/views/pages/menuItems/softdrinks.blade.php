<div class="col-12 col-md-6 col-xl-4">
    <div class="keret">
        <div class="keret-bel p-4">
            {{-- Üdítők start --}}
            @if( count($softdrink) > 0 )
            <h2 class="text-center heading">Üdítők</h2>
            <hr>
            <div class="d-flex align-items-center">
                <div class="col-8">
                    @foreach ($softdrink as $sd)
                    <div class="tetel-unit">
                        <p class="name">{{ $sd->name  }}</p>
                        <p class="desc">{{ $sd->description }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-4">
                    <div class="d-flex p-0 h-100">
                        <div class="col-4 m-0 px-1 pb-3">
                            @include('includes.bracket')
                        </div>
                        <div class="col-8 m-0 p-0 d-flex align-items-center justify-content-center">
                            <p class="col-3 px-0 input-hide price unit-price">{{ $softdrink[0]->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- Üdítők end --}}
            {{-- Gyümölcslevek start --}}
            @if(count($fruit) > 0)
            <hr>
            <h2 class="text-center heading">Gyümölcslevek</h2>
            <hr>
            <div class="d-flex align-items-center">
                <div class="col-8">
                    @foreach ($fruit as $fr)
                    <div class="tetel-unit">
                        <p class="mb-0"> <span class="name">{{ $fr->name  }}</span> <span class="desc pl-0">{{ $fr->description }}</span> </p>
                    </div>
                    @endforeach
                </div>
                <div class="col-4">
                    <div class="d-flex p-0">
                        <div class="col-4 m-0 px-1 pb-3">
                            @include('includes.bracket')
                        </div>
                        <div class="col-8 m-0 p-0 d-flex align-items-center justify-content-center">
                            <p class="col-3 px-0 input-hide price unit-price">{{ $fruit[0]->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- Gyümölcslevek end --}}
            {{-- ásványvizek start --}}
            @if(count($mineral) > 0)
            <hr>
            <h2 class="text-center heading">Ásványvizek</h2>
            <hr>
            @foreach ($mineral as $mr)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="name">{{ $mr->name  }}</p>
                    <p class="desc">{{ $mr->description }}</p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $mr->price }}</p>
            </div>
            @endforeach
            @endif
            {{-- ásványvizek end --}}
            {{-- szörpök start --}}
            @if(count($syrup) > 0)
            <hr>
            <h2 class="text-center heading">Szörpök</h2>
            <hr>
            @foreach ($syrup as $sr)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="name">{{ $sr->name  }}</p>
                    <p class="desc">{{ $sr->description }}</p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $sr->price }}</p>
            </div>
            @endforeach
            @endif
            {{-- szörpök end --}}
        </div>
    </div>
</div>
