<?php
require_once 'Renderer.php';
class AudioListRenderer implements Renderer
{
    public  AudioList $AL;
public function __construct(AudioList $y)
{
    $this->AL=$y;
}

    public function render(int $selector) :string
    {
        $res=' ';

        if ($this->AL->nbPiste <0)
        {throw new InvalidPropertyValueException('Valeur inférieur à 0 sont interdites');
            }

        if ($selector===2)
        {

            $rep = "<div> titre :".$this->AL->nom."<br>\n". "albums : "."<audio/></div>";
            for ($i=0;$i<count($this->AL->pistes);$i++)
            {

                $r = new AlbumTrackRenderer($this->AL->pistes[$i]);
                $rep = $rep. $r->render(1)."<br>\n";
            }
        }
        else
        {
            $rep ="<div> titre :".$this->AL->nom. "<audio/></div>";
        }
        return $rep;
    }

}