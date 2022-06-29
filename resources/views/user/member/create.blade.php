@extends ('layouts.member')

@section('content')

    <div>
        {{ Form::open(['route' => ['member.users.store']]) }}
        @csrf

        <div class="col-md-10">
            新規登録
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="rows">

            <div class=col-md-2">
                名前
            </div>
            <div class=col-md-8">
                {{ Form::text('name', old('name'), ['size' => 40]) }}
            </div>
        </div>
        <div class="rows">
            <div class=col-md-2">
                email
            </div>
            <div class="col-md-8">
                {{ Form::text('email', old('email'), ['size' => 40]) }}
            </div>
        </div>
        <div>
            <div class="col-md-2">password</div>
            <div class="col-md-8">
                {{ Form::password('password') }}
            </div>
        </div>
        <div>
            <div class="col-md-2">password確認</div>
            <div class="col-md-8">
                {{ Form::password('password_confirmation') }}
            </div>
        </div>
        <div>
            {{ Form::submit('編集実行') }}
        </div>
        {{ Form::close() }}
    </div>

@endsection
