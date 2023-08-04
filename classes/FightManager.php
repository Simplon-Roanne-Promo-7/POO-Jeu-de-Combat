<?php


class FightManager
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createMonster()
    {
        $arrayMonster = ["Fantassin", "Ogre", "Sorcier"];

        $monsterType = $arrayMonster[rand(0, 2)];
        $monster = new $monsterType(['name' => 'Ganon']);
        return $monster;
    }


    public function fight(Hero $hero, Monster $monster){
        $history = [];
        while ($hero->getHealthPoint() > 0 && $monster->getHealthPoint() > 0) {
            $damage = $monster->hit($hero);
            $history[] =  $monster->getName().' a frappé le '. $hero->getName() .' et lui a enlevé ' . $damage . ' points de vie';
            
            if ($hero->getEnergy() >= 50) {
                $damage = $hero->specialHit($monster);
                $history[] = $hero->getName() .' a frappé le '. $monster->getName() .'avec une attaque spéciale et lui a enlevé ' . $damage . ' points de vie';
            }else{
                $damage = $hero->hit($monster);
                $history[] = $hero->getName() .' a frappé le '. $monster->getName() .' et lui a enlevé ' . $damage . ' points de vie';
            }
            $hero->setEnergy($hero->getEnergy() + 10);
            
        }
        return $history;
    }

}