<div class="card mb-2 tetel-card">
    <form method="POST" action="{{ route('kave.update', ['kave' => $kv->id])}}">
        @csrf
        @method('PUT')
        <div class="d-flex align-items-center card-body">
            <div class="col-9 px-0">
                <input type="text" name="name" class="input-hide name" value="{{ $kv->name  }}">
                <textarea rows="2" name="description" class="input-hide desc">{{ $kv->description }}</textarea>
            </div>
            <input type="text" name="price" class="col-3 px-0 input-hide price" value="{{ $kv->price }}">
        </div>
        <div class="d-flex mt-1 card-footer">
            <input type="number" name="rank" value="{{ $kv->rank }}" class="mr-3 px-2 input-hide input-rank" data-toggle="tooltip" data-placement="top" title="sorrend">
            <button class="btn btn-success btn-block mx-3" type="submit">Mentés</button>
            <p class="btn btn-danger btn-block my-0 ml-3 op-0">Törlés</p>
        </div>
    </form>
    <form action="{{ route('kave.destroy', ['kave' => $kv->id]) }}" class="tetel-delete-btn">
        @csrf
        @method('DELETE')
        <input type="submit" value="Törlés" class="btn btn-danger mt-0">
    </form>
</div>
