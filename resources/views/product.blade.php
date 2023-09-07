@extends('master')
{{-- from here content section starts  --}}
@section("content")
<div class="custom-products">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      {{-- Indicatiors --}}
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        {{-- for dynamic sliders content --}}
        <div class="carousel-inner">
          @foreach ($products as $item)
          <div class="item {{$item['id']==1?'active':''}}">
          <a href="detail/{{$item['id']}}"> 
                <img class="slider-img" src="{{$item['gallery']}}">
              <div class="carousel-caption slider-text">
                <h3>{{$item['name']}}</h3> 
                <p>{{$item['description']}}</p>
              </div>
              </a>
            </div>
      
            @endforeach
        </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
@endsection