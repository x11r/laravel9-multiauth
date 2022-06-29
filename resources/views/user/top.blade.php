@extends ('layouts.user')

@section ('content')
    <div id="app">
        <h1>
            User.top
        </h1>
        <div>
            @if (Auth::guard('user')->check())
                <div> {{ Auth::guard('user')->user()->name }}でログイン中</div>
            @endif
        </div>
        <div>
            <ul>
                <li><a href="{{ route('user.members.index') }}">member.users.index</a></li>
            </ul>
        </div>
    </div>
@endsection
