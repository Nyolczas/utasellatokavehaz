@extends('layouts.app')

@section('content')

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif

@include('includes.whiteheader', ['title' => 'Ételek szerkesztése'])

<div class="container mt-4">
    <div class="d-flex flex-wrap justify-content-center align-items-start">
        {{-- Egységáras ételek START --}}
        <div class="col-12 col-md-6 col-xl-4 mx-auto">
            <div class="keret">
                <div class="keret-bel p-2">
                    <h2 class="text-center heading">Egységáras ételek</h2>
                    <hr>
                    <div class="row">
                        <div class="col-8 pr-1">
                            @forelse ($foodunified as $fuf)
                            @include('includes.etel_tetel_admin_egysegar', [
                                'tetel' => $fuf,
                                'update' => route('foodunified.update', ['foodunified' => $fuf->id]),
                                'destroy' => route('foodunified.destroy', ['foodunified' => $fuf->id]),
                                'areaRows' => 3
                            ])
                            @empty
                            <p>Nincs még étel hozzáadva!</p>
                            @endforelse
                        </div>
                        <div class="col-4 pl-0 pb-2">
                            @if(count($foodunified)>0)
                            <form method="POST" action="{{ route('foodunified.update', ['foodunified' => 1]) }}" class="card h-100">
                                @csrf
                                @method('PUT')
                                <div class="card-body d-flex p-0">
                                    <div class="col-4 m-0 px-1 py-3">
                                        @include('includes.bracket')
                                    </div>
                                    <div class="col-8 m-0 p-0 d-flex align-items-center justify-content-center">
                                        <input type="hidden" name="name" value="{{ $foodunified[0]->name  }}">
                                        <input type="hidden" name="description" value="{{ $foodunified[0]->description  }}">
                                        <input type="hidden" name="rank" value="{{ $foodunified[0]->rank  }}">
                                        <input type="text" name="price" class="col-3 px-0 input-hide price unit-price" value="{{ $foodunified[0]->price }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success btn-save mx-3" type="submit"></button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                    <hr class="mt-0">
                    <div class="card">
                        <h4 class="card-header heading">Új étel hozzáadása</h4>
                        <form method="POST" action="{{ route('foodunified.store')}}" class="card-body">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Név" required>
                            </div>
                            <div class="form-group">
                                <textarea rows="3" name="description" class="form-control"></textarea>
                            </div>
                            @include('pages.admin._food_type_selectors', [
                                'id' => 8888888,
                                'is_vegan' => 0,
                                'contains_gluten' => 0,
                                'contains_lactose' => 0,
                                'contains_eggs' => 0,
                                ])
                            <div class="d-flex flex-wrap">
                                <div class="form-group">
                                    <input type="number" name="rank" class="form-control  input-rank" value={{ (count($foodunified) >= 1) ? $foodunified[count($foodunified)-1]->rank + 10 : 10 }} required>
                                    <input type="hidden" name="price" class="form-control" value={{ (count($foodunified) >= 1) ? $foodunified[0]->price : 0 }}>
                                </div>
                            </div>
                            <button class="btn btn-success btn-block" type="submit">Hozzáadás</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Egységáras ételek END --}}
        {{-- Egyedi áras ételek START --}}
        <div class="col-12 col-md-6 col-xl-4 mx-auto">
            <div class="keret">
                <div class="keret-bel p-2">
                    <h2 class="text-center heading">Egyedi áras ételek</h2>
                    <hr>
                    @forelse ($foodunique as $fuq)
                    @include('includes.etel_tetel_admin_card', [
                        'tetel' => $fuq,
                        'update' => route('foodunique.update', ['foodunique' => $fuq->id]),
                        'destroy' => route('foodunique.destroy', ['foodunique' => $fuq->id])
                    ])
                    @empty
                    <p>Nincs még étel hozzáadva!</p>
                    @endforelse
                    <hr>
                    <div class="card">
                        <h4 class="card-header heading">Új étel hozzáadása</h4>
                        <form method="POST" action="{{ route('foodunique.store')}}" class="card-body">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Név" required>
                            </div>
                            <div class="form-group">
                                <textarea rows="3" name="description" class="form-control"></textarea>
                            </div>
                            @include('pages.admin._food_type_selectors', [
                                'id' => 999999,
                                'is_vegan' => 0,
                                'contains_gluten' => 0,
                                'contains_lactose' => 0,
                                'contains_eggs' => 0,
                                ])
                            <div class="d-flex flex-wrap">
                                <div class="form-group col-6 pl-0">
                                    <input type="number" name="rank" class="form-control  input-rank" value={{ (count($foodunique) >= 1) ? $foodunique[count($foodunique)-1]->rank + 10 : 10 }} required>
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
        {{-- Egyedi áras ételek END --}}
        <div class="col-12 col-md-6 col-xl-4  mx-auto">
            {{-- Étel extrák START --}}
            <div class="keret">
                <div class="keret-bel p-2">
                    <h2 class="text-center heading">Étel extrák</h2>
                    <hr>
                    @forelse ($foodextra as $fx)
                    @include('includes.extra_tetel_admin_card', [
                        'tetel' => $fx,
                        'update' => route('foodextra.update', ['foodextra' => $fx->id]),
                        'destroy' => route('foodextra.destroy', ['foodextra' => $fx->id])
                    ])
                    @empty
                    <p>Nincs még extra hozzáadva!</p>
                    @endforelse
                    <hr>
                    <div class="card">
                        <h4 class="card-header heading">Új extra hozzáadása</h4>
                        <form method="POST" action="{{ route('foodextra.store')}}" class="card-body">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Név" required>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="form-group col-6 pl-0">
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
            {{-- Étel extrák END --}}
            {{-- Saláta extrák START --}}
            <div class="keret mx-auto">
                <div class="keret-bel p-2">
                    <h2 class="text-center heading">Saláták</h2>
                    <hr>
                    @forelse ($salad as $sl)
                    @include('includes.extra_tetel_admin_card', [
                        'tetel' => $sl,
                        'update' => route('salad.update', ['salad' => $sl->id]),
                        'destroy' => route('salad.destroy', ['salad' => $sl->id])
                    ])
                    @empty
                    <p>Nincs még saláta hozzáadva!</p>
                    @endforelse
                    <hr>
                    <div class="card">
                        <h4 class="card-header heading">Új saláta hozzáadása</h4>
                        <form method="POST" action="{{ route('salad.store')}}" class="card-body">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Név" required>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="form-group col-6 pl-0">
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
            {{-- Saláta extrák END --}}
        </div>
    </div>
</div>
@endsection
