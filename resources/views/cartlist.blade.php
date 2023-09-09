@extends('master')
{{-- from here content section starts  --}}
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Result for Products</h4>
                @foreach ($products as $item)
                    <div class="row searched-item cart-border">
                        <div class="col-sm-3">
                            <a href="detail/{{ $item->id }}">
                                <img class="trending-image" src="{{ $item->gallery }}">
                                {{-- <div class="div">
                                    <h2>{{ $item->name }}</h2>
                                    <h2>{{ $item->description }}</h2>
                                </div> --}}
                            </a>
                        </div>
                        <div class="col-sm-4">
                            {{-- <a href="detail/{{ $item->id }}"> --}}
                                {{-- <img class="trending-image" src="{{ $item->gallery }}">
                                <div class="div"> --}}
                                    <h2>{{ $item->name }}</h2>
                                    <h2>{{ $item->description }}</h2>
                                {{-- </div>
                            </a> --}}
                        </div>
                        <div class="col-sm-3">
                            <a href="detail/{{ $item->id }}">
                            <button class="btn btn-warning">Remove from cart</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
