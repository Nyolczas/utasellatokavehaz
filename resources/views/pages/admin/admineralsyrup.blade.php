@extends('layouts.app')

@section('content')

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0 bottom-alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif

@include('includes.whiteheader', ['title' => 'Ásványvizek és Szörpök szerkesztése'])

<div class="container mt-4">
    <div class="d-flex flex-wrap">
        <div class="col-12 col-md-6 col-xl-4 mx-auto">
            <div class="keret">
                <div class="keret-bel p-2">
                    <h2 class="text-center heading">Ásványvizek</h2>
                    <hr>
                    @forelse ($mineral as $mr)
                    @include('includes.tetelAdminCard', [
                        'tetel' => $mr,
                        'update' => route('mineral.update', ['mineral' => $mr->id]),
                        'destroy' => route('mineral.destroy', ['mineral' => $mr->id])
                    ])
                    @empty
                    <p>Nincs még ásványvíz hozzáadva!</p>
                    @endforelse
                    <hr>
                    <div class="card">
                        <h4 class="card-header heading">Új ásványvíz hozzáadása</h4>
                        <form method="POST" action="{{ route('mineral.store')}}" class="card-body">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Név" required>
                            </div>
                            <div class="form-group">
                                <textarea rows="3" name="description" class="form-control"></textarea>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="form-group col-6 pl-0">
                                    <input type="number" name="rank" class="form-control  input-rank" value={{ (count($mineral) >= 1) ? $mineral[count($mineral)-1]->rank + 10 : 10 }} required>
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
        <div class="col-12 col-md-6 col-xl-4 mx-auto">
            <div class=" keret">
                <div class="keret-bel p-2">
                    <h2 class="text-center heading">Szörpök</h2>
                    <hr>
                    @forelse ($syrup as $sr)
                    @include('includes.tetelAdminCard', [
                        'tetel' => $sr,
                        'update' => route('syrup.update', ['syrup' => $sr->id]),
                        'destroy' => route('syrup.destroy', ['syrup' => $sr->id])
                    ])
                    @empty
                    <p>Nincs még szörp hozzáadva!</p>
                    @endforelse
                    <hr>
                    <div class="card">
                        <h4 class="card-header heading">Új szörp hozzáadása</h4>
                        <form method="POST" action="{{ route('syrup.store')}}" class="card-body">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Név" required>
                            </div>
                            <div class="form-group">
                                <textarea rows="3" name="description" class="form-control"></textarea>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="form-group col-6 pl-0">
                                    <input type="number" name="rank" class="form-control  input-rank" value={{ (count($syrup) >= 1) ? $syrup[count($syrup)-1]->rank + 10 : 10 }} required>
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
</div>
@endsection
