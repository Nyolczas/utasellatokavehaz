@extends('layouts.app')

@section('content')

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0">
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
        <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
            <div class="keret-bel p-2">
                <h2 class="text-center heading">Kávé különlegességek</h2>
                <hr>
                @forelse ($kave as $kv)

                @include('admin.kave._tetelCard')
                @empty
                <p>Nincs még kávé különlegesség hozzáadva!</p>
                @endforelse
                <hr>
                <div class="card">
                    <h4 class="card-header heading">Új kávé különlegesség hozzáadása</h4>
                    <form method="POST" action="{{ route('kave.store')}}" class="card-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Név" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" name="description" class="form-control"></textarea>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="form-group col-6 pl-0">
                                <input type="number" name="rank" class="form-control  input-rank" value={{ $kave[count($kave)-1]->rank + 10 }} required>
                            </div>
                            <div class="form-group col-6 pr-0">
                                <input type="text" name="price" class="form-control" placeholder="Ár" required>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block" type="submit">Hozzáadás</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
