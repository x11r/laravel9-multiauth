@extends ('layouts.member')

@section('content')

    <div>
        {{ Form::open(['route' => ['member.users.update', 'user' => $user]]) }}
        @csrf

        <div class="rows">

            <div class=col-md-2">
                名前
            </div>
            <div class=col-md-8">
                {{ Form::text('name', $user->name, ['size' => 40]) }}
            </div>
        </div>
        <div class="rows">
            <div class=col-md-2">
                email
            </div>
            <div class="col-md-8">
                {{ Form::text('email', $user->email, ['size' => 40]) }}
            </div>
        </div>
        <div>
            {{ Form::submit('編集実行') }}
        </div>
        {{ Form::close() }}
    </div>

@endsection
