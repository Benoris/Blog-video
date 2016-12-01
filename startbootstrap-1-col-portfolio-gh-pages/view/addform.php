<?php ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ajouter une vidéo</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/1-col-portfolio.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php?action=listvideo">Videos</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="add.php">Ajouter une video</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Formulaire
                        <small>Ajouter une video</small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <form action="index.php?action=register" method="post">
                    <div class="input-group">
                    <label for="title">Titre: </label>
                    <input type="text" name="title" id="title" required="">
                    </div>
                    <br>
                    <div class="input-group">
                    <label for="soustitre">Sous-titre: </label>
                    <input type="text" name="soustitle" id="soustitle" required="">
                    </div>
                    <br>
                    <div class="input-group">
                    <label for="description">Description: </label><br>
                    <textarea name="description" id="description" rows="4" cols="50">
                    </textarea>
                    </div>
                    <br>
                    <div class="input-group">
                    <label for="link">Lien de partage: </label>
                    <input type="text" size="60" name="link" id="link" required="">
                    </div>
                    <br>
                    <div class="input-group">
                        <select name="categorie">                            
                            <option></option>
                        </select>
                    </div>
                    <div class="input-group">
                    <label for="pwd">Mot de passe:</label>
                    <input type="password" name="pwd" id="pwd">
                    </div>
                    <br>
                    <div class="input-group">
                    <label for="confirm">Confirmez le mot de passe:</label>
                    <input type="password" name="confirm_pwd" id="confirm_pwd">
                    </div>
                    <p><input type="submit" name="send" id="send" value="Envoyer"></p>
                    
                </form>
            </div>
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Blog video 2016</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
