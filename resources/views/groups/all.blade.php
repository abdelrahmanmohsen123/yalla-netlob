@extends('layouts.app')
@section('title','All Products')

@section('content')
<?php
use Carbon\Carbon;
?>
    <div class="container">
        <div class="">
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
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Add</button>

                    </div>
                </div>

              </form>
        </div>
    </div>
    <div class="container my-5">

      <div class="row">
        <div class="col-6">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    All Groubs
                </div>
                <ul class="list-group list-group-flush">
                    @if ($groubs !=null)
                        @foreach ($groubs as $groub)
                        <li class="list-group-item">{{$groub->name}}</li>
                        @endforeach
                    @else
                    <li class="list-group-item alert alert-danger">Ther is no Groub</li>
                    @endif
                  <li class="list-group-item">An item</li>

                </ul>
              </div>
        </div>
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

          {{-- paginate --}}
         {{-- <div class="container my-5 w-50 m-auto text-center">
            <div class="row" style="float: right">
              {{ $posts->links() }}
            </div>
        </div> --}}
    </div>
@endsection
