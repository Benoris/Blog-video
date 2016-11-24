<?php
// Projet: Events
// Page: Vue 500.php
// Description: Vue affichant l'erreur 500
// Auteur: Pascal Comminot
// Version 1.0 PC 2.11.2016 / Codage initial,

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Erreur 500</title>
        <meta charset="utf-8" />
        <meta name="generator" content="NetBeans" />
        <link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/bootstrap.css" />
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Events</h1>
            </header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="listusers.html">Utilisateurs</a></li>
                        <li><a href="listevents.html">Evénements</a></li>
                    </ul>
                </div>
            </nav>
            <div class="row">
                <div class="col-sm-12">
                    <h4 class='alert alert-danger'>Une erreur interne s'est produite</h4>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>Message d'erreur :</p>
                    <pre><?= $e->getMessage(); ?></pre>
                    <p>Liste des paramètres reçus en GET :</p>
                    <pre><?= var_dump($_GET) ?></pre>
                    <p>Liste des paramètres reçus en POST :</p>
                    <pre><?= var_dump($_POST) ?></pre>
                </div>
            </div>
            
            
        </div> <!-- class="container" -->
        <script src="/js/jquery-1.12.1.js"></script>
        <script src="/bootstrap/dist/js/bootstrap.js"></script>
    </body>

</html>