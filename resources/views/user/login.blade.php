@extends ('layouts.user')

@section ('content')
    <div id="app">
        <h1>
            user login
        </h1>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ Form::open(['route' => 'user.auth']) }}
        <div>
            <div class="col-md-2">
                email
            </div>
            <div class="col-md-8">
                {{ Form::text('email', old('email'), ['class' => 'form-control', 'size' => '40']) }}
            </div>
        </div>
        <div>
            <div class="col-md-2">
                password
            </div>
            <div class="col-md-8">
                {{ Form::text('password', old('password'), ['class' => 'form-control', 'size' => '40']) }}
            </div>
        </div>
        <div class="col-md-10">
            {{ Form::submit('ログイン') }}
        </div>
        {{ Form::close() }}
    </div>
@endsection

