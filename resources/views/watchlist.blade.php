


<h1>Select Watchlist</h1>
 <form method="GET" action="{{ action('WatchlistController@loadSelectedWatchlist') }}" >
    <select name="watchlists">
    @foreach ($allWatchlists as $watchlist)
    <option value="<?php echo $watchlist->id;?>"><?php echo $watchlist->name;?></option>

    @endforeach
    
    </select>
    <button type="submit">Show Watchlist</button>
</form>

<!---  Refaktorisera ovanstående formulär till att göra en submit när man väljer en select "onchange"-> fire submit -->

