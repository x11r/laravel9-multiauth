@extends('layouts.admin')

@section('title', 'ファイルアップロードテスト')

@section('content')

    <div class="container">
        <h5>@yield('title')</h5>
        {{ Form::open(['url' => route('admin.store'), 'files' => true]) }}
        {{-- {{ csrf_field() }} --}}
        <div class="rows">
            <div class="col-md-4">
                ファイル選択
            </div>
            <div class="col-md-8">
                {{ Form::file('testFile1') }}
            </div>
        </div>
        <div class="rows">
            <div class="col-md-4">
                ファイル選択
            </div>
            <div class="col-md-8">
                {{ Form::file('testFile2') }}
            </div>
        </div>
        <div class="rows">
            <div class="col-md-4">
                文字列
            </div>
            <div class="col-md-8">
                {{ Form::text('messsage', 'メッセージ') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ Form::submit('送信してみる') }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
