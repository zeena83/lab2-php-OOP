<?php
class Bio
{
    private $film;
    private $skadespelare;
    public function __construct($film, $skadespelare)
    {
        $this->film = $film;
        $this->skadespelare = $skadespelare;
    }

    public function move(){
        echo "Bio moves (in Parent Class)";
    }

    public function getFilm()
    {
        return $this->film;
    }
    public function setFilm($film)
    {
        $this->film = $film;
    }
    public function getSkadespelare()
    {
        return $this->skadespelare;
    }
    public function setSkadespelare($skadespelare)
    {
        $this->skadespelare = $skadespelare;
    }
}
?>
