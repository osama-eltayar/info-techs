
@extends('user.layouts.app')
@section('header')

@endsection
@section('content')
        <div class="shopping-cart">
            <div class="container-fluid">
                <form class="row">
                    <div class="col-12">
                        <h1>Shopping cart</h1>
                    </div>

                    <div class="col-lg-4 col-md-5 col-12">
                        <!-- Start Form -->
                        <section class="form-section">
                            <div class="form-content">
                                <h3>Billing information</h3>
                                <div class="form-group">
                                    <label for="fullname">Full name</label>
                                    <input type="text" name="fullname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                    <label class="custom-control-label" for="customCheck">
                                        Same data in card information
                                    </label>
                                </div>

                                <h3>Card Information</h3>
                                <div class="form-group">
                                    <label for="cardname">Card Holder name</label>
                                    <input type="text" name="cardname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="card-number">Card number</label>
                                    <input type="text" name="card-number" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-6">
                                        <div class="form-group">
                                            <label for="expiration-date">Expiration date</label>
                                            <input type="text" name="expiration-date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <div class="form-group">
                                            <label for="CVV">CVV</label>
                                            <input type="text" name="CVV" class="form-control">
                                        </div>
                                        <div class="text-right">
                                            <img src="{{asset('')}}media/images/icons.png" alt="icon">
                                        </div>
                                    </div>
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
                                            <div class="product-price">{{$item->course->price}}$</div>
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
                </form>
            </div>
        </div>
@endsection
@section('script')
    <script src="{{asset('js/shopping-cart.min.js')}}"></script>
@endsection
