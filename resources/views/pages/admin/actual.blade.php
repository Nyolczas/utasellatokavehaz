@extends('layouts.app')

@section('content')

@include('includes.whiteheader', ['title' => 'Aktuális üzenet módosítása'])

<form method="POST" action= "{{ route('actual.update', ['actual' => 1]) }}" style="    margin: -48px;">
    @csrf
    @method('PUT')
<div class="{{ $actual[0]->is_active == 1 ?  'actual': 'actual actual-hidden' }} p-2">
    <div class="container actual-container p-4">
        <input type="text" name="title" class="text-center text-off-white heading mb-3 actual-title" value="{{ $actual[0]->title }}">
        <textarea rows="2" name="text" class="input-hide text-center text-off-white actual-text">{{ $actual[0]->text }}</textarea>
    </div>
</div>
<div class="container mt-4">
    <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
        <div class="keret-bel p-2 d-flex align-items-center">
            <div class="col-6">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="is_active" value="true" class="custom-control-input" id="is_active" {{ $actual[0]->is_active == 1 ?  'checked=""': '' }}>
                    <label class="custom-control-label" for="is_active">Mutat</label>
                </div>
            </div>
            <div class="col-6 mx-auto">
                <button class="btn btn-success btn-block mx-3" type="submit">Mentés</button>
            </div>
        </div>
    </div>
</div>
</form>

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0 bottom-alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif

@endsection
