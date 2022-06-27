@extends ('layouts.user')

@section ('content')
    <div id="app">
        <h1>
            Member.top
        </h1>
        <div>
            <ul>
                <li><a href="{{ route('user.top') }}">user.top</a></li>
            </ul>
        </div>
    </div>
@endsection
