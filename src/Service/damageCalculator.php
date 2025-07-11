<?php 
namespace App\Service;

use App\DTO\CharacterDTO;

class damageCalculator
{
    public function damageReceived(
        int $attackerPower,
        int $defenderDefense,
        int $baseSkillPower = 0,
        bool $isCritical = false,
        float $damageMultiplier = 1.0, 
        int $armour,
    ): int {
        $degatBase = ($attackerPower + $baseSkillPower - $defenderDefense)*($armour/10);

        //cout critique
        if ($isCritical) {
            $degatBase = (int) round($degatBase * 1.5);
        }

        // multiplicateurs
        $degatFinal = (int) round($degatBase * $damageMultiplier);

        // dégats final jamais en dessous de 0
        return max($degatFinal, 0);
    }

}