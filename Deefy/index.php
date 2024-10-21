<?php
declare(strict_types=1);

require_once 'AlbumTrack.php';
require_once 'Playlist.php';
require_once 'AudioListRenderer.php';
require_once 'AlbumTrackRenderer.php';
require_once 'AudioTrack.php';
session_start();

if (isset($_GET['action'])) $action =$_GET['action'];
    else $action ='';

    $methode = $_SERVER['REQUEST_METHOD'];
    switch ($action)
    {
        case 'add-user':
            if ($methode==='GET')
            {$html='ajout d\'un utilisateur<br>
                <form action ="?action=add-user" method = "post">
                Email :<br><input type="email" name="email"/><br>
                Age :<br><input type="number" name="age"/><br>
                Genre :<br><input type="text" name="genre"/><br>
                <button type="submit">Connexion</button>
                </form>';}
                else if ($methode === 'POST')
                {
                    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                    $age =filter_var($_POST['age'],FILTER_SANITIZE_NUMBER_INT);
                    $genre =htmlspecialchars($_POST['genre'],1,null,true);

                    $html ="ajout d'un utilisateur : Email:<b>$email</b>, Age:<b>$age</b> ans, Genre musical:<b>$genre</b> ";
                }
            echo 'ajout d\'un utilisisateur';
            break;
        case 'add-playlist' :
            if ($methode==='GET')
            {$html='ajout d\'une playlist<br>
                <form action ="?action=add-playlist" method = "post">
                Nom:<br><input type="text" name="nom"/><br>
                <button type="submit">Ajouter</button>
                </form>';}
            else if ($methode === 'POST')
            {
                $nom = htmlspecialchars($_POST['nom'],1,null,true);
                $piste = [];
               if(isset($_SESSION['liste']))
               {$render = new AudioListRenderer($_SESSION['liste']);
                   $res = $render->render(2);
                   $html ="ajout d'une playlist : <b>$res</b>";}
               else{
                $play = new Playlist($nom,$piste);
                $_SESSION['liste']=$play;
                $render = new AudioListRenderer($_SESSION['liste']);
                $res = $render->render(2);
                $html ="ajout d'une playlist : <b>$res</b>";
               }
            }
            echo 'ajout d-une playlist';
            break;
        case 'add-albumtrack':
            if ($methode==='GET')
            {$html='ajout d\'un albumtrack<br>
                <form action ="?action=add-albumtrack" method = "post">
                Album:<br><input type="text" name="album"/><br>
                Duree:<br><input type="number" name="duree"/><br>
                NomPiste:<br><input type="text" name="nomPiste"/><br>
                Titre:<br><input type="text" name="titre"/><br>
                <button type="submit">Ajout track</button>
                </form>';}
            else if ($methode === 'POST')
            {
                $album = htmlspecialchars($_POST['album'],1,null,true);
                $duree = filter_var($_POST['duree'],FILTER_SANITIZE_NUMBER_INT);
                $nomPiste = htmlspecialchars($_POST['nomPiste'],1,null,true);
                $titre = htmlspecialchars($_POST['titre'],1,null,true);
                $albumtrack =new AlbumTrack($titre,$nomPiste,$duree,$album);


                $_SESSION['liste']->addPiste($albumtrack);
                $render=new AudioListRenderer($_SESSION['liste']);
                $res = $render->render(2);
                $html ="ajout d'un albumtrack : <b>$res</b>";


            }
            echo 'ajout d\'un albumtrack';
            break;
        default :
            $html='Bienvenue';
    }

    $html = "<!DOCTYPE html>
    <html lang='fr'>
    <head>
    <title>Le titre</title>
</head>
<body>
<a href='?action=add-user'>inscription</a>
<a href='?action=add-playlist'>playlist</a>
<a href='?action=add-albumtrack'>albumtrack</a>
<a href='.'>acceuile</a>
$html
</body>
</html>";
    echo $html;