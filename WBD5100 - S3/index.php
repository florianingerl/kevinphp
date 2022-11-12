<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>WBD5100 S3</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/formular.css" rel="stylesheet">
    </head>
    <body>

        <div class="container">
            <div class="row">

                <div class="col-md-4 col-md-push-4">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4>Login</h4>
                        </div>
                        <form action="validation.php" method="POST" class="panel-body">
                            <div class="col-md-4">
                                <label for="username">Username:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="col-md-4">
                                <label for="password">Passwort</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="password" id="password">
                            </div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary btn-lg" name="submit" id="submit" value="login">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>

    </body>
</html>
