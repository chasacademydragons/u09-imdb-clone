@extends('welcome')

@section('content')

<div class="container-fluid">

    <h2>Watchlists</h2>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">@sortablelink('id')</th>
                <th scope="col">@sortablelink('name')</th>
                <th scope="col">@sortablelink('created_at')</th>
                <th scope="col">@sortablelink('updated_at')</th>
                <th scope="col">@sortablelink('user_id')</th>
                <th><a href="/admin/add/watchlist" class="btn btn-success">Add new watchlist</a></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($watchlists as $watchlist)

            <tr>
                <th scope="row"> {{$watchlist['id']}}
                </th>
                <td>{{$watchlist["name"]}}</td>
                <td>{{$watchlist["created_at"]}}</td>
                <td>{{$watchlist["updated_at"]}}</td>
                <td>{{$watchlist["user_id"]}}</td>
                <td>
                    <form method="POST" action="{{ action('AdminController@deleteWatchlist', [$watchlist['id']]) }}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="watchlist" value="{{ $watchlist['id'] }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal"
                        data-target="#editModal{{$watchlist['id']}}">Edit</button>
                </td>
            </tr>

            @include('admin.modals.editWatchlist')

            @endforeach
        </tbody>
    </table>
    {{ $watchlists->links() }}

    <a href="/admin">Go Back</a>

</div>

@endsection
