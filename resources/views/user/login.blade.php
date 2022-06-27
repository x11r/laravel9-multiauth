@extends ('layouts.user')

@section ('content')
    <div id="app">
        <h1>
            user login
        </h1>
        {{ Form::open(['route' => 'user.auth']) }}
        <div>
            <div class="col-md-2">
                email
            </div>
            <div class="col-md-8">
                {{ Form::text('email', old('email'), ['class' => 'form-control ']) }}
            </div>
        </div>
        <div>
            <div class="col-md-2">
                password
            </div>
            <div class="col-md-8">
                {{ Form::text('empasswordail', old('password'), ['class' => 'form-control ']) }}
            </div>
        </div>
        <div class="col-md-10">
            {{ Form::submit('ログイン') }}
        </div>
        {{ Form::close() }}
    </div>
@endsection

