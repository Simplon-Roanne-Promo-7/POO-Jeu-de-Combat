<?php



class Mage extends Hero
{

    public function specialHit(Monster $monster){
        $damage = 25;
        if ($monster->getHealthPoint() - $damage < 0) {
            $monster->setHealthPoint(0);
        }else{
            $monster->setHealthPoint($monster->getHealthPoint() - $damage);
        }
        $this->setEnergy($this->getEnergy() - 20);
        return $damage;
    }


}