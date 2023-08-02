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
        $monster = new Monster(['name' => 'Ganon']);

        return $monster;
    }


    public function fight(Hero $hero, Monster $monster){
        $history = [];
        while ($hero->getHealthPoint() > 0 && $monster->getHealthPoint() > 0) {
            $damage = $monster->hit($hero);
            $history[] =  $monster->getName().' a frappé le '. $hero->getName() .' et lui a enlevé ' . $damage . ' points de vie';

            $damage = $hero->hit($monster);
            $history[] = $hero->getName() .' a frappé le '. $monster->getName() .' et lui a enlevé ' . $damage . ' points de vie';

        }
        return $history;
    }

}