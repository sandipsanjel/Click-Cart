@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Your Orders</h4>
            {{-- <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br> --}}
            @foreach($orders as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>Name: {{$item->name}}</h2>
                      <h5>Order Status: {{$item->order_status}}</h5>
                      <h5>Payment Status: {{$item->payment_status}}</h5>
                      <h5>Payment method: {{$item->payment_method}}</h5>
                      <h5>Address: {{$item->address}}</h5>
                      {{-- <h5>{{$item->description}}</h5> --}}
                    </div>
             </div>
             {{-- <div class="col-sm-3">
                <a href="/removecart/{{$item->product_id}}" class="btn btn-warning" >Remove to Cart</a>
             </div> --}}
            </div>
            @endforeach
          </div>
          {{-- <a class="btn btn-success" href="
          ordernow">Order Now</a> <br> <br> --}}

     </div>
</div>
@endsection 