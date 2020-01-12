@extends ('master')

@section ('content')
<!DOCTYPE html>
<html>
<head>
    <title>Export Data to Excel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
    </style>
</head>
<body>
<br />
<div class="container">
    <h3 align="center">Export Data to Excel</h3><br />
    <div align="center">
        <a href="{{ route('users.excel') }}" class="btn btn-success">Export to Excel</a>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <td>name</td>
                <td>admin</td>
                <td>email</td>
                <td>balance</td>
                <td>created_at</td>
                <td>updated_at</td>
            </tr>
            @foreach($user_data as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->admin }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->balance}}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>

</div>
</body>
</html>
@endsection
