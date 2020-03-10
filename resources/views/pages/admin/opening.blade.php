@extends('layouts.app')

@section('content')

@if(session()->has('status'))
<div class="alert alert-dismissible alert-success mb-0">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{  session() ->get('status') }}</strong>
</div>
@endif

@include('includes.whiteheader', ['title' => 'Nyitvatartás módosítása'])

<div class="container mt-4">
    <div class="d-flex flex-wrap">
        <div class="col-12 col-md-6 col-xl-4 keret mx-auto">
            <div class="keret-bel p-2">
                <h2 class="text-center heading">Nyitvatartás</h2>
                <form method="POST" action= "{{ route('opening.update', ['opening' => 1]) }}">
                    @csrf
                    @method('PUT')
                    <div class="d-flex align-items-center card-body">
                        <h5 class="col-7 px-0">
                            <input type="text" name="time" class="input-hide name" value="{{ $opening[0]->time  }}">
                        </h5>
                        <div class="col-5">
                            <button class="btn btn-success btn-block mx-3" type="submit">Mentés</button>
                        </div>
                    </div>
                </form>
                @for ($i = 1; $i < 7; $i++)
                @include('includes.opening_tetel_adbin', [
                    'tetel' => $opening[$i],
                    'update' => route('opening.update', ['opening' => $opening[$i]->id]),
                ])
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
