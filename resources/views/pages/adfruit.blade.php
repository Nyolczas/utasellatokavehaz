@extends('layouts.app')

@section('content')

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif

@include('includes.whiteheader', ['title' => 'Gyümölcslevek szerkesztése'])

<div class="container mt-4">
    <div class="d-flex flex-wrap">
        <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
            <div class="keret-bel p-2">
                <h2 class="text-center heading">Gyümölcslevek</h2>
                <hr>
                <div class="row">
                    <div class="col-8 pr-1">
                        @forelse ($fruit as $sd)
                        @include('includes.tetelAdminEgysegar', [
                            'tetel' => $sd,
                            'update' => route('fruit.update', ['fruit' => $sd->id]),
                            'destroy' => route('fruit.destroy', ['fruit' => $sd->id]),
                            'areaRows' => 1
                        ])
                        @empty
                        <p>Nincs még gyümölcslé hozzáadva!</p>
                        @endforelse
                    </div>
                    <div class="col-4 pl-0 pb-2">
                        @if(count($fruit)>0)
                        <form method="POST" action="{{ route('fruit.update', ['fruit' => 1]) }}" class="card h-100">
                            @csrf
                            @method('PUT')
                            <div class="card-body d-flex p-0">
                                <div class="col-4 m-0 px-1 py-3">
                                    <img class="bracket" src="{{ asset('/img/decor/bracket.png') }}" alt="bracket">
                                </div>
                                <div class="col-8 m-0 p-0 d-flex align-items-center justify-content-center">
                                    <input type="hidden" name="name" value="{{ $fruit[0]->name  }}">
                                    <input type="hidden" name="description" value="{{ $fruit[0]->description  }}">
                                    <input type="hidden" name="rank" value="{{ $fruit[0]->rank  }}">
                                    <input type="text" name="price" class="col-3 px-0 input-hide price unit-price" value="{{ $fruit[0]->price }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success btn-save mx-3" type="submit"></button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="card">
                    <h4 class="card-header heading">Új gyümölcslé hozzáadása</h4>
                    <form method="POST" action="{{ route('fruit.store')}}" class="card-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Név" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" name="description" class="form-control"></textarea>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="form-group">
                                <input type="number" name="rank" class="form-control  input-rank" value={{ (count($fruit) >= 1) ? $fruit[count($fruit)-1]->rank + 10 : 10 }} required>
                                <input type="hidden" name="price" class="form-control" value={{ (count($fruit) >= 1) ? $fruit[0]->price : 0 }}>
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
