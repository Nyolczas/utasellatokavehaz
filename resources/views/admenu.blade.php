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
            <div class="keret-bel p-3">
                <h2 class="text-center heading">Kávé különlegességek</h2>
                <hr>
                @forelse ($kave as $kv)
                <div class="tetel">
                    <div class="d-flex">
                        <div class="col-9">
                            <p class="mb-0 name">{{ $kv->name }}</p>
                            <p class="desc">{{ $kv->description }}</p>
                        </div>
                        <div class="col-3 price">{{ $kv->price }}</div>
                    </div>
                    <div class="d-flex">

                    </div>
                </div>
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
