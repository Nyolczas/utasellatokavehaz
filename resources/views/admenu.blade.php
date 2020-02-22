@extends('layouts.app')

@section('content')
@if(session()->has('status'))
<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif
<div class="w-100 white-header d-flex justify-content-center align-items-center mb-5">
    <img src="{{ asset('/img/decor/deko-bal.png') }}" alt="deko-bal" class="mr-3">
    <h1 class="heading mb-1">Menü</h1>
    <img src="{{ asset('/img/decor/deko-jobb.png') }}" alt="deko-jobb" class="ml-3">
</div>
<div class="container mt-4">
    <div class="d-flex flex-wrap">
        <div class="col-12 col-md-6 col-xl-4 keret">
            <div class="keret-bel p-4">
                <h2 class="text-center heading">Kávé különlegességek</h2>
                <hr>
                @forelse ($kave as $kv)
                <form method="POST" action="{{ route('kave.update', ['kave' => $kv->id])}}" class="tetel">
                    @csrf
                    @method('PUT')
                    <div class="d-flex align-items-end">
                        <div class="col-9 px-0">
                            <input type="text" name="name" class="input-hide name" value="{{ $kv->name  }}">
                            <textarea rows="3" name="description" class="input-hide desc" value="{{ $kv->description }}"></textarea>
                        </div>
                        <input type="text" name="price" class="col-3 px-0 input-hide price" value="{{ $kv->price }}">
                    </div>
                    <div class="d-flex mt-1">
                        <button class="btn btn-success btn-block mr-3" type="submit">Mentés</button>
                    <a class="btn btn-danger btn-block mt-0 ml-3" href="{{ route('kave.destroy', ['kave' => $kv->id]) }}">Törlés</a>
                    </div>
                </form>
                @empty
                <p>Nincs még kávé különlegesség hozzáadva!</p>
                @endforelse
                <div class="card">
                    <h4 class="card-header heading">Új kávé különlegesség hozzáadása</h4>
                    <form method="POST" action="{{ route('kave.store')}}" class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Név</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Leírás</label>
                            <textarea rows="3" name="description" class="form-control"></textarea>
                        </div>
                        <div class="d-flex mb-4 flex-wrap">
                            <div class="form-group d-flex mb-0">
                                <label for="price">Ár</label>
                                <input type="text" name="price" class="form-control mb-0 mx-2">
                            </div>
                            <div class="form-group d-flex mb-0">
                                <label for="rank" class="ml-3">Sorrend</label>
                                <input type="text" name="rank" class="form-control mb-0 mx-2">
                            </div>
                            <button class="btn btn-success btn-block ml-3" type="submit">Mentés</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
