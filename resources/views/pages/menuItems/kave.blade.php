<div class="col-12 col-md-6 col-xl-4">
    <div class="keret">
        <div class="keret-bel p-4">
            <h2 class="text-center heading">Kávé különlegességek</h2>
            <hr>
            @forelse ($kave as $kv)
            <div class="d-flex align-items-end tetel">
                <div class="col-9 px-0">
                    <p class="name">{{ $kv->name  }}</p>
                    <p class="desc">{{ $kv->description }}</p>
                </div>
                <p class="col-3 px-0 price mb-0" >{{ $kv->price }}</p>
            </div>
            @empty
            <p>Nincs még kávé különlegesség hozzáadva!</p>
            @endforelse
        </div>
    </div>
</div>
