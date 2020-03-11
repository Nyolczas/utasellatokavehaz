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
{{-- Aktuális --}}
@include('pages.actual')
{{-- Rólunk START --}}
@include('pages.about')
{{-- Rólunk END --}}

{{-- Image START --}}
<div class="imageabout"></div>
{{-- Image END --}}

{{-- Menü START --}}
@include('includes.whiteheader', ['title' => 'Menü'])
<div class="container py-4">
    <div class="row flex-wrap">
        @include('pages.menuItems.hotdrinks')
        @include('pages.menuItems.kave')
        @include('pages.menuItems.softdrinks')
        @include('pages.menuItems.alcohols')
        @include('pages.menuItems.foods')
    </div>
</div>
{{-- Menü END --}}
@endsection
