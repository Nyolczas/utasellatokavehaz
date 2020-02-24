<div class="col-12 col-md-6 col-xl-4">
    <div class="keret">
        <div class="keret-bel p-4">
            <h2 class="text-center heading">Meleg italok</h2>
            <hr>
            @forelse ($hotdrinks as $hotdrink)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="name">{{ $hotdrink->name  }}</p>
                    <p class="desc">{{ $hotdrink->description }}</p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $hotdrink->price }}</p>
            </div>
            @empty
            <p>Nincs még meleg ital hozzáadva!</p>
            @endforelse
        </div>
    </div>
</div>
