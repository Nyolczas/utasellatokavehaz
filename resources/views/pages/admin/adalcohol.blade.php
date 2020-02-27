@extends('layouts.app')

@section('content')

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif

@include('includes.whiteheader', ['title' => 'Szeszes italok szerkesztése'])

<div class="container mt-4">
    <div class="d-flex flex-wrap justify-content-center">
        {{-- Sörök START --}}
        <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
            <div class="keret-bel p-2">
                <h2 class="text-center heading">Üveges sörök</h2>
                <hr>
                @forelse ($beer as $br)
                @include('includes.tetelAdminCard', [
                    'tetel' => $br,
                    'update' => route('beer.update', ['beer' => $br->id]),
                    'destroy' => route('beer.destroy', ['beer' => $br->id])
                ])
                @empty
                <p>Nincs még sör hozzáadva!</p>
                @endforelse
                <hr>
                <div class="card">
                    <h4 class="card-header heading">Új sör hozzáadása</h4>
                    <form method="POST" action="{{ route('beer.store')}}" class="card-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Név" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" name="description" class="form-control"></textarea>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="form-group col-6 pl-0">
                                <input type="number" name="rank" class="form-control  input-rank" value={{ (count($beer) >= 1) ? $beer[count($beer)-1]->rank + 10 : 10 }} required>
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
        {{-- Sörök END --}}
        {{-- Borok START --}}
        <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
            <div class="keret-bel p-2">
                <h2 class="text-center heading">Borok</h2>
                <hr>
                <div class="row">
                    <div class="col-8 pr-1">
                        @forelse ($wine as $wn)
                        @include('includes.tetelAdminEgysegar', [
                            'tetel' => $wn,
                            'update' => route('wine.update', ['wine' => $wn->id]),
                            'destroy' => route('wine.destroy', ['wine' => $wn->id]),
                            'areaRows' => 2
                        ])
                        @empty
                        <p>Nincs még bor hozzáadva!</p>
                        @endforelse
                    </div>
                    <div class="col-4 pl-0 pb-2">
                        @if(count($wine)>0)
                        <form method="POST" action="{{ route('wine.update', ['wine' => 1]) }}" class="card h-100">
                            @csrf
                            @method('PUT')
                            <div class="card-body d-flex p-0">
                                <div class="col-4 m-0 px-1 py-3">
                                    @include('includes.bracket')
                                </div>
                                <div class="col-8 m-0 p-0 d-flex align-items-center justify-content-center">
                                    <input type="hidden" name="name" value="{{ $wine[0]->name  }}">
                                    <input type="hidden" name="description" value="{{ $wine[0]->description  }}">
                                    <input type="hidden" name="rank" value="{{ $wine[0]->rank  }}">
                                    <input type="text" name="price" class="col-3 px-0 input-hide price unit-price" value="{{ $wine[0]->price }}">
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
                    <h4 class="card-header heading">Új bor hozzáadása</h4>
                    <form method="POST" action="{{ route('wine.store')}}" class="card-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Név" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" name="description" class="form-control"></textarea>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="form-group">
                                <input type="number" name="rank" class="form-control  input-rank" value={{ (count($wine) >= 1) ? $wine[count($wine)-1]->rank + 10 : 10 }} required>
                                <input type="hidden" name="price" class="form-control" value={{ (count($wine) >= 1) ? $wine[0]->price : 0 }}>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block" type="submit">Hozzáadás</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- Borok END --}}
        {{-- Rövid italok START --}}
        <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
            <div class="keret-bel p-2">
                <h2 class="text-center heading">Rövid italok</h2>
                <hr>
                <div class="row">
                    <div class="col-8 pr-1">
                        @forelse ($spirit as $sp)
                        @include('includes.tetelAdminEgysegar', [
                            'tetel' => $sp,
                            'update' => route('spirit.update', ['spirit' => $sp->id]),
                            'destroy' => route('spirit.destroy', ['spirit' => $sp->id]),
                            'areaRows' => 1
                        ])
                        @empty
                        <p>Nincs még rövid ital hozzáadva!</p>
                        @endforelse
                    </div>
                    <div class="col-4 pl-0 pb-2">
                        @if(count($spirit)>0)
                        <form method="POST" action="{{ route('spirit.update', ['spirit' => 1]) }}" class="card h-100">
                            @csrf
                            @method('PUT')
                            <div class="card-body d-flex p-0">
                                <div class="col-4 m-0 px-1 py-3">
                                    @include('includes.bracket')
                                </div>
                                <div class="col-8 m-0 p-0 d-flex align-items-center justify-content-center">
                                    <input type="hidden" name="name" value="{{ $spirit[0]->name  }}">
                                    <input type="hidden" name="description" value="{{ $spirit[0]->description  }}">
                                    <input type="hidden" name="rank" value="{{ $spirit[0]->rank  }}">
                                    <input type="text" name="price" class="col-3 px-0 input-hide price unit-price" value="{{ $spirit[0]->price }}">
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
                    <h4 class="card-header heading">Új rövid ital hozzáadása</h4>
                    <form method="POST" action="{{ route('spirit.store')}}" class="card-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Név" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" name="description" class="form-control"></textarea>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="form-group">
                                <input type="number" name="rank" class="form-control  input-rank" value={{ (count($spirit) >= 1) ? $spirit[count($spirit)-1]->rank + 10 : 10 }} required>
                                <input type="hidden" name="price" class="form-control" value={{ (count($spirit) >= 1) ? $spirit[0]->price : 0 }}>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block" type="submit">Hozzáadás</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- Rövid italok END --}}
    </div>
</div>
@endsection
