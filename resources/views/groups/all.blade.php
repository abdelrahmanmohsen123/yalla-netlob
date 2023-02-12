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
                        Add Groub
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
                                <form method="post" action="{{route('groubs.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <label for="exampleInputEmail1" class="form-label lead">
                                            Group</label>

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
        <div class="col-6">
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    All Groubs
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
                <ul class="list-group list-group-flush">
                    @if ($groubs !=null)
                        @foreach ($groubs as $groub)


                            <div class="row">
                                <div class="col-6">
                                    <li class="list-group-item ">{{$groub->name}}</li>
                                </div>
                                <div class="col-4 btn btn-outline-success">
                                  <a href="{{route('groubs.show',$groub->id)}}" id="add_user">add user</a>
                                </div>
                                <div class="col-2 btn btn-outline-danger">
                                    delete
                                </div>
                            </div>


                        @endforeach
                    @else
                    <li class="list-group-item alert alert-danger">Ther is no Groub</li>
                    @endif


                </ul>
              </div>
        </div>
        @isset($groub)
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    all users
                    {{$groub->name}}
                </div>
                @if (session('success_add_user'))
                        <div class="col-sm-12 text-center">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                {{ session('success_add_user') }}
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
                @isset($friends)


                <form action="{{route('addFrientoGroub')}}" method="post">
                    @csrf



                    <input type="hidden" value="{{$groub->id}}" name="groub_id">
                    <div class="row my-3">
                        <div class="col-6 ">
                            <select class="form-select" name="friend_id" aria-label="Default select example">
                                <option selected disabled>select friend</option>
                                @foreach ($friends as $friend)
                                <option value="{{$friend->id}}">{{ $friend->name }}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class="col-6">
                        <button type="submit" class="btn btn-primary" name="add_user_to_groub">add to groub</button>

                        </div>
                    </div>
                </form>
                @endisset




            </div>
            @isset($friendsInGroub)
            <div class="row my-4">
                @foreach ($friendsInGroub as $friendIn)

                <div class="col-6 my-2">

                    <div class="">
                        <p class="lead">{{$friendIn->name}}</p>
                    </div>
                    <div class="circle-rounded">
                        <img src="{{asset('images/default.jpg')}}" width="50px" alt="">
                    </div>
                    <div class=" btn btn-outline-danger">
                        remove
                    </div>

            </div>

                @endforeach

            </div>
            @endisset


        </div>
        @endisset

      </div>


          {{-- paginate --}}
         {{-- <div class="container my-5 w-50 m-auto text-center">
            <div class="row" style="float: right">
              {{ $posts->links() }}
            </div>
        </div> --}}
    </div>
@endsection
