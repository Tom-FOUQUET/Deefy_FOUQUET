<?php
require_once 'AudioList.php';
class Playlist extends AudioList
{
    protected string $nomArtiste;
    protected string $dateSortie;


    function addPiste($piste): void
    {
        $this->pistes[] = $piste;

    }

    function supPiste($indice): void
    {
        unset($this->pistes[array_search($indice, $this->pistes)]);
    }
}