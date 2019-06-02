<?php
class SvenskaFilm extends Bio
{
    private $producerad;
    private $tv;
    public function __construct($film, $skadespelare, $tv)
    {
        $this->tv = $tv;
        parent::__construct($film, $skadespelare);
    }

    // Overrides Parent Class
    public function move(){
        echo "YYYYSVENSKAFILMYYYYYY";
    }


    public function setProducerad($producerad)
    {
        $this->producerad = $producerad;
    }
    public function getProducerad()
    {
        return $this->producerad;
    }
    public function setTv($tv)
    {
        $this->tv = $tv;
    }
    public function getTv()
    {
        return $this->tv;
    }
}
?>
