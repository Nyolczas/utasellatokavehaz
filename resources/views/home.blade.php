@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="keret">
                <div class="keret-bel p-1">
                    <div class="card">
                        <h4 class="card-header heading">Vezérlőpult</h4>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            Bejelentkeztél!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
