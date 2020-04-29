
    <div class="container">
    <div class="row">    
    @foreach ($trips as $trip)

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



