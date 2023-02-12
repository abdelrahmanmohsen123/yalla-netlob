@extends('layouts.app')
@section('title','All Products')

@section('content')
<?php
use Carbon\Carbon;
?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Friend
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Groub</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('friends.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <label for="exampleInputEmail1" class="form-label lead">
                                            Friend</label>

                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="name">

                                    </div>
                                    <div class="modal-footer my-3">
                                        <button type="submit" class="btn btn-primary">Add</button>

                                    </div>
                                </div>

                                </form>
                            </div>

                        </div>
                        </div>
                    </div>
            </div>


        </div>
    </div>
    <div class="container my-5">

      <div class="row">
        <div class="col-12">
            <div class="card" style="width: 100%">
                <div class="card-header">
                    All Friends
                </div>
                @if (session('success'))
                        <div class="col-sm-12 text-center">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    @if (session('fail'))
                    <div class="col-sm-12 text-center">
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            {{ session('fail') }}
                        </div>
                    </div>
                @endif
                {{-- <ul class="list-group list-group-flush"> --}}
                    <div class="container my-4">
                        <div class="row">
                        @if ($friends !=null)
                        @foreach ($friends as $friend)



                            <div class="col-4 my-2">

                                    <div class="">
                                        <p class="lead">{{$friend->name}}</p>
                                    </div>
                                    <div class="circle-rounded">
                                        <img src="{{asset('images/default.jpg')}}" width="100px" alt="">
                                    </div>
                                    <div class=" btn btn-outline-danger">
                                        unfriend
                                    </div>

                            </div>


                        @endforeach
                    @else
                    <li class="list-group-item alert alert-danger">Ther is no Groub</li>
                    @endif
                    </div>


                    </div>





                {{-- </ul> --}}
              </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    all users
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
                <div class="col-6">
                <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
            </div>

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
