@extends('layouts.app')
@section('title','All Products')

@section('content')
<?php
use Carbon\Carbon;
?>

    <div class="container my-5">

      <div class="row">
        <div class="col-8">
            <h2>
                All Orders
            </h2>
        </div>
        <div class="col-4">
            <a href="{{route('orders.create')}}" class="btn btn-primary">
                Start New Order
            </a>

        </div>


      </div>
      @if (session('success'))
            <div class="col-sm-12 text-center">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif

      <div class="row my-3">
            <div class="col-12 card">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Order</th>
                        <th scope="col">Restaurant</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>

                            <th scope="row">{{$order->order_for}}</th>
                            <td>{{$order->restaurant_name}}</td>
                            <td>{{$order->status}}</td>
                            <td>
                                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">View</a>
                                <a href="" class="btn btn-success">Finish </a>
                                <a href="" class="btn btn-warning">Cancel</a>

                            </td>
                        </tr>


                        @empty

                        <tr class="text-center">
                            <th colspan="4" class="alert alert-danger">There is no Order</th>

                         </tr>

                        @endforelse


                    </tbody>
                  </table>
            </div>
      </div>

          {{-- paginate --}}
         {{-- <div class="container my-5 w-50 m-auto text-center">
            <div class="row" style="float: right">
              {{ $posts->links() }}
            </div>
        </div> --}}
    </div>
@endsection
