@extends ('layouts.member')

@section('content')

    <div>
        <div class="col-md-10">
            <div>
                <a href="{{ route('member.users.create') }}">新規</a>
            </div>


            @foreach ($users as $user)
                <div class="rows">
                    <div class=col-md-2">
                        {{ $user->name }}
                    </div>
                    <div class=col-md-2">
                        {{ $user->email }}
                    </div>
                    <div>
                        <a href="{{ route('member.users.edit', ['user' => $user]) }}">edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
