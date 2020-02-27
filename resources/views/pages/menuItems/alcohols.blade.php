<div class="col-12 col-md-6 col-xl-4">
    <div class="keret">
        <div class="keret-bel p-4">
            {{-- Sörök start --}}
            @if(count($beer) > 0)
            <h2 class="text-center heading">Üveges sörök</h2>
            <hr>
            @foreach ($beer as $br)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="mb-0"> <span class="name">{{ $br->name  }}</span> <span class="desc pl-1">{{ $br->description }}</span></p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $br->price }}</p>
            </div>
            @endforeach
            @endif
            {{-- Sörök end --}}
            {{-- Borok start --}}
            @if( count($wine) > 0 )
            <hr>
            <h2 class="text-center heading">Borok</h2>
            <hr>
            <div class="d-flex">
                <div class="col-9 p-0">
                    @foreach ($wine as $wn)
                    <div class="tetel-unit">
                        <p class="name">{{ $wn->name  }}</p>
                        <p class="desc">{{ $wn->description }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-3 p-0">
                    <div class="d-flex p-0 h-100">
                        <div class="col-5 m-0 px-1 py-3">
                            @include('includes.bracket')
                        </div>
                        <div class="col-7 m-0 p-0 d-flex align-items-center justify-content-center">
                            <p class="col-3 px-0 input-hide price unit-price">{{ $wine[0]->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- Borok end --}}
            {{-- Rövid italok start --}}
            @if(count($spirit) > 0)
            <hr>
            <h2 class="text-center heading">Rövid italok</h2>
            <hr>
            <div class="d-flex">
                <div class="col-9 p-0">
                    @foreach ($spirit as $sp)
                    <div class="tetel-unit">
                        <p class="mb-0"> <span class="name">{{ $sp->name  }}</span> <span class="desc pl-0">{{ $sp->description }}</span> </p>
                    </div>
                    @endforeach
                </div>
                <div class="col-3 p-0">
                    <div class="d-flex p-0 h-100">
                        <div class="col-5 m-0 px-1 py-3">
                            @include('includes.bracket')
                        </div>
                        <div class="col-7 m-0 p-0 d-flex align-items-center justify-content-center">
                            <p class="col-3 px-0 input-hide price unit-price">{{ $spirit[0]->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {{-- Rövid italok end --}}
        </div>
    </div>
</div>
