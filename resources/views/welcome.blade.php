@extends('layouts.app')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div id="carousel01" class="w-100 carousel-img"></div>
        </div>
        <div class="carousel-item">
            <div id="carousel02" class="w-100 carousel-img"></div>
        </div>
        <div class="carousel-item">
            <div id="carousel03" class="w-100 carousel-img"></div>
        </div>
    </div>
    <h1 class="welcome-main">Utasellátó Kávéház és Bisztró</h1>
</div>
@include('includes.whiteheader', ['title' => 'Menü'])
<div class="container py-4">
    <div class="row flex-wrap">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="keret">
                <div class="keret-bel p-4">
                    <h2 class="text-center heading">Meleg italok</h2>
                    <hr>
                    @forelse ($hotdrinks as $hotdrink)
                    <div class="d-flex align-items-end tetel">
                        <div class="col-9 px-0">
                            <p class="name">{{ $hotdrink->name  }}</p>
                            <p class="desc">{{ $hotdrink->description }}</p>
                        </div>
                        <p class="col-3 px-0 price mb-0" >{{ $hotdrink->price }}</p>
                    </div>
                    @empty
                    <p>Nincs még meleg ital hozzáadva!</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="keret">
                <div class="keret-bel p-4">
                    <h2 class="text-center heading">Kávé különlegességek</h2>
                    <hr>
                    @forelse ($kave as $kv)
                    <div class="d-flex align-items-end tetel">
                        <div class="col-9 px-0">
                            <p class="name">{{ $kv->name  }}</p>
                            <p class="desc">{{ $kv->description }}</p>
                        </div>
                        <p class="col-3 px-0 price mb-0" >{{ $kv->price }}</p>
                    </div>
                    @empty
                    <p>Nincs még kávé különlegesség hozzáadva!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
