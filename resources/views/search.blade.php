@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mr-4">
                <div class="card-header">Search By Trip Name</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" placeholder="search by name trip" class="form-control" name="keyword" id="searchtext"> 
                            </div>
                        </div> 
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-info" type="button" url="{{route('filter')}}" id="searchbtn"> Search</button>
                            </div>
                        </div> 
                    </div>
                    <div class="result">
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
</div>
<script>
    const searchBtn = document.getElementById('searchbtn');
    console.log(searchBtn);
    const searchBtnHandler = () =>{
        console.log("searchBtnHandler");
        const url = $('#searchbtn').attr('url');
        console.log(url);
        const keyword = $('#searchtext').val();
        console.log(keyword);
        const data = {
            keyword:keyword
        }
         sendHttpRequest('post' , url ,  data)
         .then(results=>{
             console.log(results);
            $('.result').html(results.data);
         });


    }
     function sendHttpRequest(method, url, data= null) {
      console.log(JSON.stringify(data) , url );
       return fetch(url, {
        method: method,
        body: JSON.stringify(data),
        headers: {
          "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
          "Content-Type": "application/json"
        }
      }).then(response => {
        //   console.log("Respooooose");
        return response.json();
      });
    }
    searchBtn.addEventListener('click' ,searchBtnHandler);
</script>
@endsection
