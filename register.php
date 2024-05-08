<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrasi</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="bg-green">
    <div class="container">
        <div class="login-box">
            <center>
                <h2 style="margin: 0">Registrasi</h2>
            </center>
            <div class="login-box-body">
                <form action="proses_register.php" method="POST">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nama" name="nama" required="required"
                            autocomplete="off">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username"
                            required="required" autocomplete="off">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            required="required" autocomplete="off">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name="sebagai" required="required">
                            <option value="">- Pilih</option>
                            <option value="administrator">Administrator</option>
                            <option value="kasir">Kasir</option>
                            <option value="pimpinan">Pimpinan</option>
                        </select>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-offset-8 col-xs-4">
                            <button type="submit" class="btn btn-success btn-block btn-flat">DAFTAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>