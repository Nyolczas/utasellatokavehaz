<div class="col-12 col-md-6 col-xl-4">
    <div class="keret">
        <div class="keret-bel p-4">
            {{-- Egységáras ételek start --}}
            @if( count($foodunified) > 0 )
            <h2 class="text-center heading">Ételek</h2>
            <hr>
            <div class="d-flex">
                <div class="col-9 p-0">
                    @foreach ($foodunified as $fd)
                    <div class="tetel-unit">
                        <p class="name">{{ $fd->name  }}</p>
                        <p class="desc">{{ $fd->description }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-3 p-0">
                    <div class="d-flex p-0 h-100">
                        <div class="col-5 m-0 px-1 py-3">
                            @include('includes.bracket')
                        </div>
                        <div class="col-7 m-0 p-0 d-flex align-items-center justify-content-center">
                            <p class="col-3 px-0 input-hide price unit-price">{{ $foodunified[0]->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- Egységáras ételek end --}}
            {{-- Egyedi áras ételek START --}}
            @if(count($foodunique) > 0)
            @foreach ($foodunique as $unique)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="name">{{ $unique->name  }}</p>
                    <p class="desc">{{ $unique->description }}</p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $unique->price }}</p>
            </div>
            @endforeach
            @endif
            {{-- Egyedi áras ételek END --}}
            {{-- Étel extrák ételek Start --}}
            @if(count($foodextra) > 0)
            @foreach ($foodextra as $extra)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="desc p-0">{{ $extra->name  }}</p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $extra->price }}</p>
            </div>
            @endforeach
            @endif
            {{-- Étel extrák ételek END --}}

        </div>
    </div>
</div>
