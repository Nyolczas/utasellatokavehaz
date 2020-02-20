@extends('layouts.app')

@section('content')
<div class="container mt-4 keret">
    <div class="keret-bel p-3">
        <h1 class="heading">Új kávékülönlegesség hozzáadása</h1>
        <form method="POST" action="{{ route('kave.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Név</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Leírás</label>
                <textarea rows="3" name="description" class="form-control"></textarea>
            </div>
            <div class="d-flex mb-4">
                <div class="form-group d-flex mb-0">
                    <label for="price">Ár</label>
                    <input type="text" name="price" class="form-control mb-0 mx-2">
                </div>
                <div class="form-group d-flex mb-0">
                    <label for="rank" class="ml-3">Sorrend</label>
                    <input type="text" name="rank" class="form-control mb-0 mx-2">
                </div>
                <button class="btn btn-success btn-block ml-3" type="submit">Mentés</button>
            </div>
        </form>
    </div>
</div>
@endsection
