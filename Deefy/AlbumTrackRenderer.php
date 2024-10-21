<?php
require_once 'Renderer.php';
class AlbumTrackRenderer implements Renderer
{
    public AlbumTrack $album;

    public function __construct($album)
    {
        $this->album=$album;
    }

    public function __toString()
    {
        $rep = json_encode($this);
        echo "<br>\n";
        return $rep;
    }
    public function render(int $selector) :string
    {
        if ($this->album->duree <0)
        {throw new InvalidPropertyValueException('Valeur inférieur à 0 sont interdites');
            return " ";}

        if ($selector===2)
        {
            $rep = "<div> titre :".$this->album->titre." duree : ".$this->album->duree." secondes "." album : ".$this->album->album. "<audio/></div>";
        }
        else
        {
            $rep ="<div> titre :".$this->album->titre." duree : ".$this->album->duree." secondes ".
                "<audio controls src= '/media/cc0-audio/t-rex-roar.mp3'>
                <audio/></div>";
        }
      return $rep;
    }
}

print"</body> </html>" ;