<?php

require_once 'AudioTrack.php';
class AlbumTrack extends AudioTrack
{
    protected string $album;
    protected int $annee;
    protected int $numPiste;

    protected String $artiste;

    public function __construct($titre, $nomDeFichier,$duree,$album)
    {
        parent::__construct($titre, $nomDeFichier,$duree);
        $this->album=$album;
    }

}

print"</body> </html>" ;