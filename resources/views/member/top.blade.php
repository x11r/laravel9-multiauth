@extends ('layouts.user')

@section ('content')
    <div id="app">
        <h1>
            Member.top
        </h1>
        @if (Auth::guard('member')->check())
            <div>{{ Auth::guard('user')->user()->name }}でログイン中({{ Auth::guard()->user()->email }})</div>
        @endif

        <div>
            <ul>
                <li><a href="{{ route('user.top') }}">member.top</a></li>
                <li><a href="{{ route('member.users.index', ['member_dir' => $memberDir]) }}">member.users.index</a></li>
            </ul>
        </div>
    </div>
@endsection
