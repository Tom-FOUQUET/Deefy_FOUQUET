<?php
class AudioTrack
{
    private String $titre;
    private int $duree;
    private String $nomDeFichier;

    public function __construct($titre,$nomDeFichier,$duree)
    {
        $this->titre=$titre;
        $this->nomDeFichier=$nomDeFichier;
        $this->duree=$duree;
    }

    public function __toString()
    {
        $rep =" ";
        $rep = json_encode($this);
        echo "<br>\n";
        return $rep;
    }

    public function __get(string $at):mixed {
        if (property_exists ($this, $at)) return $this->$at;
        throw new Exception ("$at: invalid property");
    }
    public function __set(string $at,mixed $val):void {
        if ( property_exists ($this, $at) ) {
            $this->$at = $val;
        } else throw new Exception ("$at: invalid property");
    }

}