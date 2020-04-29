@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mr-4">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($countries as $country)
                    <h2 class="mt-1"> {{$country->name}} </h2>
                    <hr/>   
                    @if(count($country->trips) > 0)
                        <div class="container">
                        <div class="row">    
                        @foreach ($country->trips as $trip)

                                    <div class="card" style="width: 18rem;">
                                        <div class="card-header">
                                             {{$trip->user->name}}
                                        </div>
                                        <img class="card-img-top" src="{{$trip->picture}}" alt="Card image cap">
                                        <div class="card-body">
                                        <h5 class="card-title">{{$trip->title}}</h5>
                                            <p class="card-text">{{$trip->description}}.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div> 

                        @endforeach
                </div>
            </div> 

                    @endif
                    @endforeach    
                          




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
