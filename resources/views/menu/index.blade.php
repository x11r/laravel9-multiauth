<!doctype html>
<html>

<head>

</head>

<body>
    <div>
        <h1>menu</h1>
        <h2>members</h2>
        <div>
            <ul>
                @foreach ($members as $member)
                    <li>
                        <a href="{{ route('member.top', ['member_dir' => $member->url]) }}">
                            {{ $member->name }}({{ $member->email }}) ({{ $member->url }})
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <h2>User</h2>
        <div>
            <a href="{{ route('user.top') }}">user.top</a>
        </div>
    </div>
    <div>
        認証メール再送信
        {{ Form::open(['route' => 'verification.send', 'method' => 'post']) }}
        <input type="text" name="email" value="" size="40"><br />
        <input type="submit" value="送信">
        {{ Form::close() }}

    </div>
</body>

</html>
