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
                        <th scope="col">Invited</th>
                        <th scope="col">Status</th>
                        <th scope="col text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>

                            <th scope="row">{{$order->order_for}}</th>
                            <td>{{$order->restaurant_name}}</td>
                            <td>{{  $order->invites_count}}</td>
                            <td>{{$order->status}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">View</a>

                                    </div>
                                    <div class="col-2">
                                        <a href="{{route('orders.edit',$order->id)}}" class="btn btn-success">Finish </a>

                                    </div>
                                    <div class="col-2">
                                        <form action="{{route('orders.destroy',$order->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button  type="submit" class="btn btn-warning">Cancel</button>
                                        </form>
                                    </div>

                                </div>



                            </td>
                        </tr>


                        @empty

                        <tr class="text-center">
                            <th colspan="5" class="alert alert-danger">There is no Order</th>

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
