@extends('layouts.app')
@section('title', 'All Order')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@endpush

@push('style')
    <style>
        .mt-100 {
            margin-top: 100px
        }

        body {
            background: #00B4DB;
            background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
            background: linear-gradient(to right, #0083B0, #00B4DB);
            color: #514B64;
            min-height: 100vh
        }
    </style>
@endpush

@section('content')
    <?php
    use Carbon\Carbon;
    ?>

    <div class="container my-5">

        <div class="row">
            <div class="col-8">
                <h2>
                    Add Orders
                </h2>
            </div>
            @if ($errors->any())
                <div class="col-sm-12 container mt-3">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif


        </div>

        <div class="row my-3">
            <div class="col-6 card">
                <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 my-3">
                        <label for="formGroupExampleInput" class="form-label"> Order For </label>

                        <select class="form-select" name="order_for" aria-label="Default select example">
                            <option selected disabled>Open this select menu</option>
                            <option value="Launch">Launch</option>
                            <option value="Breackfast">Breackfast</option>
                            <option value="Dinner">Dinner</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Restaurant name </label>
                        <input type="text" class="form-control" name="restaurant_name" id="formGroupExampleInput">
                    </div>
                    <div class=" offser-md-3  form-group">
                        <h6 class="pt-2">Invite Friends</h6>
                        <select name="invite_friends[]" multiple='multiple' id="tags" class="tags form-control">
                            @foreach ($friends_user as $friend_user )
                                 <option value="{{$friend_user->id}}">{{$friend_user->name}}</option>
                            @endforeach


                        </select>

                        @error('tags')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        <div class="mb-3 ">
                            <label for="formFile" class="form-label">upload image</label>
                            <input class="form-control" type="file" name="menu_image" id="formFile">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>
        </div>
        {{-- paginate --}}
        {{-- <div class="container my-5 w-50 m-auto text-center">
            <div class="row" style="float: right">
              {{ $posts->links() }}
            </div>
        </div> --}}
    </div>
    @push('script')
    @endpush
@section('js')
    <script>
        $(document).ready(function() {
            $("#tags").select2({});
            placeholder: 'select';
            allowClear: true;
        });
    </script>
@endsection


@endsection
