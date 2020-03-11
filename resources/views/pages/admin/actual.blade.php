@extends('layouts.app')

@section('content')

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif

@include('includes.whiteheader', ['title' => 'Aktuális üzenet módosítása'])

<form method="POST" action= "{{ route('actual.update', ['actual' => 1]) }}">
    @csrf
    @method('PUT')
<div class="actual p-2">
    <div class="container actual-container p-4">
        <h1 class="text-center text-off-white heading mb-3">{{ $actual[0]->title }}</h1>
        <h5 class="text-center text-off-white">{{ $actual[0]->text }}</h5>
    </div>
</div>
<div class="container mt-4">
    <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
        <div class="keret-bel p-2">
            <div class="col-4"></div>
            <div class="col-8 mx-auto">
                <button class="btn btn-success btn-block mx-3" type="submit">Mentés</button>
            </div>
        </div>
    </div>
</div>
</form>

@endsection
