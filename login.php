<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TMRSOFT|Rent-A-Car Systems</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">TMRSOFT Rent-A-Car Systems</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="val.php" method="POST" onsubmit="return confSubmit()">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="usuario" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="contraseña" name="password" type="password" value="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block btn-outline" id="aceptar">Iniciar Sesion</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="scripts/libs/jquery.min.js"></script>
<script>
    function confSubmit() {
        $('#aceptar').html("<i class='fa fa-spinner fa-spin'></i> Iniciando sesion");
        $('#aceptar').attr("disabled","disabled");
        return true;
    }
</script>
</body>

</html>
