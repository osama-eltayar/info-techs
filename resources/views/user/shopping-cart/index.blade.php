
@extends('user.layouts.app')
@section('header')

@endsection
@section('content')
        <div class="shopping-cart">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1>Shopping cart</h1>
                    </div>

                    <div class="col-lg-4 col-md-5 col-12">
                        <!-- Start Form -->
                        <section class="form-section" >
                            <div class="form-content">
                                <h3>Card Information</h3>
                                <div id="payment-form">

                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <section class="form-section">
                            <div class="form-content">
                                <h3>Shopping card details</h3>
                                <div class="item-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Item</p>
                                        </div>
                                        <div class="col-6 text-right">
                                            <p>Price</p>
                                        </div>
                                    </div>
                                </div>
                                @foreach($items as $item)
                                    <div class="product-card">
                                        <div class="num">{{$loop->iteration}}-</div>
                                        <div class="img">
                                            <img src="{{asset('')}}media/images/prod.png" alt="product">
                                        </div>
                                        <div class="product-info">
                                            <div class="product-status {{$item->course->type_class_name}}">{{$item->course->type_string}}</div>
                                            <p>{{$item->course->title}}</p>
                                        </div>
                                        <div class="last-side">
                                            <div class="product-price">{{$item->price}}$</div>
                                            <div class="action">
                                                <button type="button" data-action="{{route('shopping-cart.destroy',$item->id)}}" class="btn remove-item"><i class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="row" id="invoice">
                                    @include('user.shopping-cart.partials.details')
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script src="{{asset('js/shopping-cart.min.js')}}"></script>
@endsection
