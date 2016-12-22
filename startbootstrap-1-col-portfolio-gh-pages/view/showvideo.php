<?php
require_once 'htmltools.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog-vidéo</title>

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
                        <a href="index.php?action=addvideo">Ajouter une video</a>
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
                <h1 class="page-header">Bienvenu dans notre blog-vidéo
                    <small>Postez vos vidéo favorites!</small>
                </h1>
            </div>
        </div>
        <div id="divcat">
            
            <form action="?action=filtre" method="post">
                <label for="cat">Categorie:</label>
                <select name="categorie">
                    <?php foreach ($categories as $categorie) :?>
                    <option value="<?php echo $categorie['idCategorie']; ?>"><?php echo $categorie['NomCategorie']; ?></option>                    
                    <?php endforeach; ?>
                </select>
                <!--<input type="hidden" name="idCategorie" value="<?php// echo $categorie['idCategorie']; ?>">-->
                <input type="submit" name="rechercher" value="Rechercher">
            </form>
            
            
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <?php foreach ($videos as $video) :?>
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <iframe width="650" height="300" src="<?php echo $video['Lien']//le lien de la vidéo ?>" frameborder="0" allowfullscreen></iframe>
                </a>
            </div>
            <div class="col-md-5">
                <?php//Ici on récupère les données pour les ajouter dans notre site ?>
                <h3><?php echo $video['Titre'] ?></h3>
                <h4><?php echo $video['SousTitre'] ?></h4>
                <p><?php echo $video['Description'] ?></p>
                
                <form method="post" action="controllers/deletevideo.php">
                    <input type="hidden" name="idVideo" value="<?php echo $video['idVideo'] ?>">
                    <?php if(isset($video['MDP'])) : ?>
                    <p>Mot de passe : <input type="password" name="mdp" required></p>                    
                    <?php if(isset($_SESSION['error']))
                        echo $_SESSION['error']; ?>
                    <?php endif; ?>
                    <input class="btn btn-primary" type="submit" name="delete" value="Supprimer"><span class="glyphicon glyphicon-chevron-right"></span>
                    </form>
                
                <form action="?action=updatevideo" method="post">
                    <input type="hidden" name="idVideo" value="<?php echo $video['idVideo'] ?>">
                    <input class="btn btn-primary" type="submit" name="update" value="Modifier"><span class="glyphicon glyphicon-pencil"></span>
                </form>
                
            </div>
        </div>
        <?php endforeach; ?>
        <!-- /.row -->

        <hr>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Linh &copy; Blog-video</p>
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
