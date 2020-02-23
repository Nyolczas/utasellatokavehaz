@extends('layouts.app')

@section('content')

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif

@include('includes.whiteheader', ['title' => 'Meleg italok szerkesztése'])

<div class="container mt-4">
    <div class="d-flex flex-wrap">
        <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
            <div class="keret-bel p-2">
                <h2 class="text-center heading">Meleg italok</h2>
                <hr>
                @forelse ($hotdrinks as $hotdrink)
                @include('includes.tetelAdminCard', [
                    'tetel' => $hotdrink,
                    'update' => route('hotdrinks.update', ['hotdrink' => $hotdrink->id]),
                    'destroy' => route('hotdrinks.destroy', ['hotdrink' => $hotdrink->id])
                ])
                @empty
                <p>Nincs még meleg ital hozzáadva!</p>
                @endforelse
                <hr>
                <div class="card">
                    <h4 class="card-header heading">Új meleg ital hozzáadása</h4>
                    <form method="POST" action="{{ route('hotdrinks.store')}}" class="card-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Név" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="3" name="description" class="form-control"></textarea>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="form-group col-6 pl-0">
                                <input type="number" name="rank" class="form-control  input-rank" value={{ (count($hotdrinks) >= 1) ? $hotdrinks[count($hotdrinks)-1]->rank + 10 : 10 }} required>
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
