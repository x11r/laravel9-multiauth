@extends ('layouts.user')

@section ('content')
    <div id="app">
        <h1>
            User.top
        </h1>
        <div>
            <ul>
                <li><a href="{{ route('member.top') }}">member.top</a></li>
            </ul>
        </div>
    </div>
@endsection
