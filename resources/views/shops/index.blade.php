@extends('layouts.app')
@section('title','index')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-9">
                @can('create',App\Models\Shop::class)
                    <a class="btn btn-outline-primary"
                       href="{{route('shops.create')}}">{{ __('messages.add product') }}</a>
                @endcan
                <div class="col" style="align-items: end">
                    <div class="row row-cols-1 row-cols-md-3 g-1">
                        @foreach($shops as $shop)
                            <div class="col-sm-5">
                                <div class="card" style="width: 18rem;">
                                    <a href="{{route('shops.show' , $shop->id) }}">
                                        <img class="card-img-top" src="{{asset($shop->image)}}" alt="Card image cap">
                                    </a>
                                    <div class="card-body text-center">
                                        <h2 class="card-title">{{$shop->title}}</h2>
                                        <hr>

                                        <h4 class="card-text">{{$shop->{'content_'.app()->getLocale()} }}</h4>
                                        <h5 class="card-text">{{$shop->price}} KZT</h5>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


