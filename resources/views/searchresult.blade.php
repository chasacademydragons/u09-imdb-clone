


@if(isset($body->results))
    @foreach ($body->results as $result)

    <h1>{{$result->title}} </h1>
    <p>  {{$result->id}}<p>
    <a href="{{ url('showmovie/' .$result->id. '/') }}"><img src="http://image.tmdb.org/t/p/w185/<?php echo $result->poster_path;?>"> </a>
    @endforeach
@else
    <h1>Didnt work</h1>
@endif 
