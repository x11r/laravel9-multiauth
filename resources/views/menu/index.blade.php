<!doctype html>
<html>

<head>

</head>

<body>
    <div>
        <h1>menu</h1>
        <ul>
            <li><a href="/member/top">member/top</a></li>

        </ul>
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
