<div class="card mb-2 tetel-card">
    <form method="POST" action="{{ $update }}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <input type="text" name="name" class="input-hide name" value="{{ $tetel->name  }}">
            @include('pages.admin._food_type_selectors', [
                'is_vegan' => $tetel->is_vegan,
                'contains_gluten' => $tetel->contains_gluten,
                'contains_lactose' => $tetel->contains_lactose,
                'contains_eggs' => $tetel->contains_eggs,
                ])
        <textarea rows="{{ $areaRows }}" name="description" class="input-hide desc"> {{ $tetel->description }}</textarea>
        </div>
        <div class="d-flex mt-1 card-footer justify-content-between">
            <input type="number" name="rank" value="{{ $tetel->rank }}" class="mr-1 px-1 input-hide input-rank" data-toggle="tooltip" data-placement="top" title="sorrend">
            <button class="btn btn-success btn-save mx-3" type="submit"></button>
            <p class="btn btn-danger btn-delete my-0 ml-3 op-0"></p>
        </div>
    </form>
    <form action="{{ $destroy }}" class="tetel-delete-btn">
        @csrf
        @method('DELETE')
        <input type="submit" value="" class="btn btn-danger btn-delete mt-0">
    </form>
</div>
