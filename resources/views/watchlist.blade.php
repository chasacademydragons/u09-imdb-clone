@extends('welcome')


@section('content')
<div class="container justify-content-center mt-5">
    <h1>Select Watchlist</h1>
    <form method="GET" action="{{ action('WatchlistController@loadSelectedWatchlist') }}" >
        <select name="watchlists">
        @foreach ($userWatchlists as $watchlist)
        <option value="<?php echo $watchlist->id;?>"><?php echo $watchlist->name;?></option>

        @endforeach
        
        </select>
        <button type="submit">Show Watchlist</button>
        <button><a href="watchlist/create">Create Watchlist</a></button>
    </form>
</div>
@endsection

<!---  Refaktorisera ovanstående formulär till att göra en submit när man väljer en select "onchange"-> fire submit -->

