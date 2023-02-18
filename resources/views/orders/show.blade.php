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
                All Items For {{$order->order_for}}
            </h2>
        </div>
        {{-- <div class="col-4">
            <a href="{{route('orders.create')}}" class="btn btn-primary">
                Start New Order
            </a>

        </div> --}}


      </div>
      @if (session('success'))
            <div class="col-sm-12 text-center">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif

      <div class="row my-3">
            <div class="col-8 card">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Person</th>
                        <th scope="col">Item</th>
                        <th scope="col">price</th>
                        <th scope="col">comment</th>

                        {{-- <th scope="col">Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>

                        @forelse ($orderDetals as $item)
                        <tr>

                            <th scope="row">{{Auth::user()->name}}</th>
                            <td>{{$item->item}}</td>
                            <td>{{$item->price}} Le</td>
                            <td>{{$item->comment}}</td>

                        </tr>


                        @empty

                        <tr class="text-center">
                            <th colspan="4" class="alert alert-danger">There is no Items In This Order</th>

                         </tr>

                        @endforelse


                    </tbody>
                  </table>
            </div>
            <div class="col-4 ">
                <div class="my-3 h4">
                    {{-- <a href="" >
                        {{$count_invite}} Friends invited click to view
                     </a> --}}
                     <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        {{$count_invite}} Friends invited click to view
                     </a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Invited Friend</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        @foreach ($order->friends; as $friend_invit)


                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <div class="circle-rounded">
                                                    <img src="{{ asset('images/default.jpg') }}" width="50px" alt="">
                                                </div>
                                                <p class="lead m-0 ">{{ $friend_invit->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{ route('orders.delete.friend',$friend_invit->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger border-0 rounded-pill"
                                                id="delete_Friend" type="submit"><i class="fa-solid fa-user-minus"></i></button>

                                            </form>
                                        </div>


                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                </div>



            </div>

      </div>
      @if ($errors->any())
      <div class="col-sm-12 container mt-3"  >
          <div class="alert  alert-danger alert-dismissible fade show" role="alert">
          <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
              </div>
          </div>
      @endif

      <form action="{{route('orderdetails.store')}}" method="post" class="my-4">
        @csrf
        <div class="row">
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <div class="col-3">
                <label for="">Item</label>
                <input type="text" class="form-control" name="item" >
            </div>
            <div class="col-2">
                <label for="">amount</label>
                <input type="number" class="form-control" name="amount" min="1" max="5">
            </div>
            <div class="col-2">
                <label for="">price</label>
                <input type="number" class="form-control" name="price" min="1" >
            </div>
            <div class="col-3">
                <label for="">Comment</label>
               <textarea name="comment" id="" class="form-control" cols="5" rows="1"></textarea>
            </div>
            <div class="col-2">
                <label for="">Add item</label>
                <button type="submit" class="form-control btn btn-primary" >Add</button>
            </div>
          </div>
      </form>


          {{-- paginate --}}
         {{-- <div class="container my-5 w-50 m-auto text-center">
            <div class="row" style="float: right">
              {{ $posts->links() }}
            </div>
        </div> --}}
    </div>
@endsection
