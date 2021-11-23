<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
    <form action="{{route('get_data')}}" method="post">
        @csrf
        <label>Daraz URL:</label>
        <input
        @if(Session::has('url'))
            value="{{ Session::get('url')}}"
        @endif
            type="text"
            name="url"
            placeholder="please enter daraz url here...">
        <button type="submit" class="btn btn-success">Get Data</button>
    </form>

    @if(Session::has('data'))
        {{ dd(Session::get('data'))}}
    @endif
    </body>
</html>
