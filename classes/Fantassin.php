<?php 


class Fantassin extends Monster
{

    public function hit(Hero $hero){
        $damage = rand(5, 20);
        
        if ($hero instanceof Archer) {
            $damage = $damage * 2;
        }

        if ($hero->getHealthPoint() - $damage < 0) {
            $hero->setHealthPoint(0);
        }else{
            $hero->setHealthPoint($hero->getHealthPoint() - $damage);
        }
        return $damage;
    }
}