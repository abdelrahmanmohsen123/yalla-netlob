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
                <button type="button" class="btn btn-outline-danger fw-bold rounded-0 shadow" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Create <i class="fa-solid fa-people-group"></i>
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
                                <form method="post" action="{{ route('groubs.store') }}">
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
    <div class="container ">
        <div class="row ">
            <div class="col-md-12 col-lg-6 mt-2">
                <h5 class="text-muted m-2">My Groups</h5>
                <div class="card bg-white p-2 rounded-0 shadow border-0 group-card ">
                    <table class="table table-hover table-borderless">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Add user</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($groubs != null)
                                @foreach ($groubs as $groub)
                                    <tr>
                                        <th scope="row">{{ $groub->name }}</th>
                                        <td>
                                            <a class="btn btn-outline-primary border-0 rounded-pill"
                                                href="{{ route('groubs.show', $groub->id) }}" id="add_user"><i
                                                    class="fa-solid fa-user-plus"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-danger border-0 rounded-pill" href=""
                                                id="add_user"><i class="fa-solid fa-user-minus"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <li class="list-group-item alert alert-danger">Ther is no Groub</li>
                            @endif
                        </tbody>
                    </table>
                    @if (session('success'))
                        toastr()->success( {{ session('success') }}, 'Congrats', ['timeOut' => 2500]);
                    @endif
                    @if (session('fail'))
                        toastr()->error('Oops! Something went wrong!');
                    @endif
                </div>

            </div>
            @isset($groub)
                {{-- @dd($groub); --}}
                <div class="col-md-12 col-lg-6 mt-2">
                    <h5 class="m-2"> {{ $groub->name }}</h5>
                    <div class="card bg-white p-2 rounded-0 shadow border-0 ">
                        @if (session('success_add_user'))
                            toastr()->success( {{ session('success_add_user') }}, 'Congrats', ['timeOut' => 2500]);
                        @endif
                        @if (session('fail'))
                            toastr()->error('Oops! Something went wrong!');
                        @endif
                        @isset($friends)
                            <form action="{{ route('addFrientoGroub') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $groub->id }}" name="groub_id">
                                <div class="row my-3">
                                    <div class="d-flex ">
                                        <select class="form-select w-75 me-2 rounded-0 " name="friend_id"
                                            aria-label="Default select example">
                                            <option selected disabled>select your friend name</option>
                                            @foreach ($friends as $friend)
                                                <option value="{{ $friend->id }}">{{ $friend->name }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class=" btn btn-outline-primary fw-bold rounded-0 "
                                            name="add_user_to_groub">
                                            Add <i class="fa-solid fa-user-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endisset
                        @isset($friendsInGroub)
                            <div class="row ">
                                @foreach ($friendsInGroub as $friendIn)
                                    <div class="col-6 my-2 d-flex hover-overlay ripple shadow-1-strong">
                                        <div class="circle-rounded">
                                            <img src="{{ asset('images/default.jpg') }}" width="50px" alt="">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between w-100">
                                            <p class="lead m-0 ">{{ $friendIn->name }}</p>
                                            <button type="button" class=" btn btn-outline-danger border-0  fw-bold rounded-pill "
                                                name="add_user_to_groub">
                                                <i class="fa-solid fa-user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endisset
                    </div>
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
