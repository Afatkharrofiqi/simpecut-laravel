<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!--link the bootstrap css file-->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">

    <style type="text/css">
        .colbox {
            margin-left: 0px;
            margin-right: 0px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-12 col-sm-12">
            <h1>Sistem Informasi Manajemen Pengajuan Cuti</h1>
        </div>
    </div>
</div>
<hr/>

<div class="container">
    <div class="row">
        <div class="col-lg-offset-4 col-lg-4 col-sm-12 well">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <legend>Login</legend>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="email" class="control-label">Username</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="email" name="email" placeholder="Email" type="text" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="password" name="password" placeholder="Password" type="password" required autocomplete="current-password"/>
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
                            <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<!--load jQuery library-->
<script src="{{ asset("js/jquery-2.1.4.js") }}"></script>
<!--load bootstrap.js-->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
</body>
</html>
