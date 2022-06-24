<!doctype html>
<html>
<head>
<style>
    #id {
        border: 1px solid #f00;
    }
</style>
</head>
<body>
<div id="app">
@foreach ($admins as $admin)
<div>
    {{ $admin->name }} /
    {{ $admin->email }} /
    {{ $admin->created_at }} /
    {{ $admin->updated_at }}
</div>
@endforeach
    {{ $admins->links() }} /
</div>
</body>
</html>
