@extends('user.layouts.app')
@section('header')
    <title></title>
@endsection
@section('content')
<div class="page-wrapper">

        <!-- Start Banner-->
        <section class="banner" style="background-image: url('/media/images/banner5.png');">
            <h1> My Invoices</h1>
        </section>

        <!-- Start Nav Links-->
        <section class="nav-links">
            <div class="container">
                <a href="#">Home page</a>
                <span>|</span>
                <a href="#"> My Invoices</a>
            </div>
        </section>

        <!-- Start Form -->
        <section class="form-section">
            <div class="form-content table-box">
                <form action="">
                    <div class="title">
                        <i class="fa-solid fa-file-invoice-dollar"></i>  My Invoices
                    </div>
                    <div class="filter">
                        <div class="row no-gutters justify-content-between">
                            <div class="col-auto input-row">
                                <h3>Filter by:</h3>
                            </div>
                            <div class="col-auto input-row">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="row">
                                            <div class="col-auto">
                                                <label for="from-date" class="visually-hidden">From date</label>
                                            </div>
                                            <div class="col-auto">
                                                <input  data-toggle="datepicker" name="from-date" id="from-date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="row">
                                            <div class="col-auto">
                                                <label for="from-date" class="visually-hidden">From date</label>
                                            </div>
                                            <div class="col-auto">
                                                <input  data-toggle="datepicker" name="from-date" id="from-date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-default">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto input-row">
                                <p>Total Invoice {{$invoices->count()}}</p>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><i class="fa-solid fa-caret-up"></i> <i class="fa-solid fa-caret-down"></i> Invoice number</th>
                            <th scope="col"><i class="fa-solid fa-caret-up"></i> <i class="fa-solid fa-caret-down"></i> Event type</th>
                            <th scope="col">Event</th>
                            <th scope="col"><i class="fa-solid fa-caret-up"></i> <i class="fa-solid fa-caret-down"></i> Date</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$invoice->transaction->number}}</td>
                            <td>{{$invoice->course->type_string}}</td>
                            <td>{{$invoice->course->title}}</td>
                            <td>{{$invoice->paid_at}}</td>
                            <td>$ {{$invoice->price}} </td>
                            <td><a href="{{route('invoices.print',$invoice->course_id)}}"><i class="fa-solid fa-file-pdf"></i> Print</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item page-number"><a class="page-link" href="#">page 1 of 1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

        <div class="qus">
            <a href="#"><i class="fa-solid fa-circle-question"></i></a>
        </div>



    <!-- Modal -->

</div>
@endsection
@section('script')
    <script src="/js/invoices/list.min.js"></script>
    <script>
        $('[data-toggle="datepicker"]').datepicker({
            autoHide: true
        });
    </script>
@endsection

