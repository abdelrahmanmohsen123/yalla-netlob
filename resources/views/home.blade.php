@extends('layouts.app')
<?php
use Carbon\Carbon;
?>
@section('title','Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            {{-- <legend>Lastest Orders</legend> --}}
                            <div class="card-header h2">Lastest Orders</div>
                            <div class="card-body">
                                @forelse ($latest_orders as $latest_order)
                                    <div class="container my-4">
                                        <a href="{{route('orders.show',$latest_order->id)}}" class="my-4">
                                            <h3>
                                                {{$latest_order->order_for}} on {{date('d/m/Y', strtotime($latest_order->created_at))}}

                                            </h3>
                                        </a>
                                    </div>
                                @empty
                                    <div class="alert alert-nfo text-center">
                                        <h3  class="alert alert-dark">There is no Order Yet</h3>

                                    </div>
                                @endforelse
                            </div>



                          </fieldset>
                    </div>
                    {{-- <div class="col-6">
                        <fieldset>
                            <div class="card-header">Friends Activity</div>
                            <div class="card-header h2">Friends Activity</div>
                            <div class="card-body">
                                @forelse ($latest_orders as $latest_order)
                                    <div class="container my-4">
                                        <a href="{{route('orders.show',$latest_order->id)}}" class="my-4">
                                            <h3>
                                                {{$latest_order->order_for}} on {{date('d/m/Y', strtotime($latest_order->created_at))}}

                                            </h3>
                                        </a>
                                    </div>
                                @empty
                                    <div class="alert alert-nfo">
                                        <h3  class="alert alert-danger">There is no Order Yet</h3>

                                    </div>
                                @endforelse
                            </div>
                          </fieldset>
                    </div> --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
