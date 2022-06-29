@extends ('layouts.member')

@section('content')

    <div>
        <div class="col-md-10">
            <div>
{{--                <a href="{{ route('user.create') }}">新規</a>--}}
            </div>


            @if ($members)
                @foreach ($members as $member)
                    <div class="rows">
                        <div class=col-md-2">
                            {{ $member->name }}
                        </div>
                        <div class=col-md-2">
                            {{ $member->email }}
                        </div>
                        <div>
                            <a href="{{ route('user.members.edit', ['member' => $member]) }}">edit</a>
                            <a href="{{ route('member.login', ['member_dir' => $member->url]) }}" target="_blank">member login</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div>登録なし</div>
            @endif
        </div>
    </div>

@endsection
