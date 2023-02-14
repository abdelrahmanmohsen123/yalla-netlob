@extends('layouts.app')
@section('title', 'All Products')

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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Groub</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('friends.store') }}">
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
                        toastr()->success( {{ session('success') }}, 'Congrats', ['timeOut' => 2500]);
                    @endif
                    @if (session('fail'))
                        toastr()->error('Oops! Something went wrong!');
                    @endif
                    {{-- <ul class="list-group list-group-flush"> --}}
                    <div class="container my-4 row row-cols-auto mx-auto justify-content-center ">
                        @if ($friends != null)
                            @foreach ($friends as $friend)
                                <div class="card  m-2 friend-card">
                                    <div class="d-flex align-items-center justify-content-between w-100">
                                        <div class="d-flex align-items-center">
                                            <div class="circle-rounded">
                                                <img src="{{ asset('images/default.jpg') }}" width="50px" alt="">
                                            </div>
                                            <p class="lead m-0 ">{{ $friend->name }}</p>
                                        </div>
                                        <button type="button"
                                            class=" btn btn-outline-danger border-0  fw-bold rounded-pill "
                                            name="add_user_to_groub">
                                            <i class="fa-solid fa-user-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <li class="list-group-item alert alert-danger">Ther is no Groub</li>
                        @endif
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
