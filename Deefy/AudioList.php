<?php
class AudioList
{
public String $nom;

private int $nbPiste;
private int $dureeTotale;
protected array $pistes;

public function __construct(String $nom, $tab)
{
    $this->nom=$nom;
    $this->pistes=$tab;
    $this->nbPiste=sizeof($this->pistes);
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
}