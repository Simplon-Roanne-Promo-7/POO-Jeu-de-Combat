<?php



class Guerrier extends Hero
{
    private $specialHitCost = 30;

    public function specialHit(Monster $monster){
        $damage = 30;
        if ($monster->getHealthPoint() - $damage < 0) {
            $monster->setHealthPoint(0);
        }else{
            $monster->setHealthPoint($monster->getHealthPoint() - $damage);
        }
        $this->setEnergy($this->getEnergy() - $this->specialHitCost);
        return $damage;
    }
}