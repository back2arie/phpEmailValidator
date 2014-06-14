<?php
include_once(dirname(__FILE__).'/../phpEmailValidator.php');
$result = '';
if($_POST)
{
    $phpEmailValidator = new phpEmailValidator;
    $email = $_POST['email'];

    if($phpEmailValidator->validate($email)) {
        $result = '<p class="bg-success" style="padding: 15px">'.$email.' is valid</p>';
    } else {
        $result = '<p class="bg-danger" style="padding: 15px">'.$email.' is not valid</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>phpEmailValidator demo</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <!-- Custom styles for this template -->
        <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">phpEmailValidator demo</a>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="starter-template">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post">
                            <div class="input-group input-group-lg">
                                <input type="text" name="email" class="form-control" placeholder="example@domain.com">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit">Verify!</button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

                <br />
                <?php echo $result;?>
                <p class="lead"><small>phpEmailValidator source code <a href="https://github.com/back2arie/phpEmailValidator">@github</a></small></p>

            </div>

        </div><!-- /.container -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    </body>
</html>
