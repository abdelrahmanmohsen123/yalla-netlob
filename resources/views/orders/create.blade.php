@extends('layouts.app')
@section('title','All Order')
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@endpush

@push('style')
<style>
.mt-100{margin-top: 100px}body{background: #00B4DB;background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);background: linear-gradient(to right, #0083B0, #00B4DB);color: #514B64;min-height: 100vh}

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


      </div>

      <div class="row my-3">
            <div class="col-6 card">
                <form action="{{route('orders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 my-3">
                        <label for="formGroupExampleInput"  class="form-label"> Order For </label>

                        <select class="form-select" name="order_for" aria-label="Default select example">
                            <option selected disabled>Open this select menu</option>
                            <option value="Launch">Launch</option>
                            <option value="Breackfast">Breackfast</option>
                            <option value="Dinner">Dinner</option>
                          </select>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput"  class="form-label">Restaurant name </label>
                        <input type="text" class="form-control" name="restaurant_name" id="formGroupExampleInput" >

                    </div>
                    <div class="mb-3">
                        <label for="Invite Friends">Invite Friends</label>
                        <div class="row d-flex justify-content-center mt-100">
                            <div class="col-md-6">
                                <select id="choices-multiple-remove-button"  multiple>
                                    <option value="HTML">HTML</option>
                                    <option value="Jquery">Jquery</option>
                                    <option value="CSS">CSS</option>
                                    <option value="Bootstrap 3">Bootstrap 3</option>
                                    <option value="Bootstrap 4">Bootstrap 4</option>
                                    <option value="Java">Java</option>
                                    <option value="Javascript">Javascript</option>
                                    <option value="Angular">Angular</option>
                                    <option value="Python">Python</option>
                                    <option value="Hybris">Hybris</option>
                                    <option value="SQL">SQL</option>
                                    <option value="NOSQL">NOSQL</option>
                                    <option value="NodeJS">NodeJS</option>
                                </select>
                             </div>
                    </div>

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
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="">
        $(document).ready(function(){

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            // maxItemCount:5,
            // searchResultLimit:5,
            // renderChoiceLimit:5
            });


        });
    </script>
    @endpush
@endsection
