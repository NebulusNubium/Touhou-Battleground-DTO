<?php

namespace App\Controller;

use App\services\damageCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
public function test(damageCalculator $calcul): Response
    {
        $attackerPower = 30;
        $defenderDefense = 18;
        $baseSkillPower = 10;
        $isCritical = true;
        $damageMultiplier = 1.2;
        $armour = 2;

        $damage = $calcul->DamageReceived(
            $attackerPower,
            $defenderDefense,
            $baseSkillPower,
            $isCritical,
            $damageMultiplier,
            $armour,
        );

        return $this->render('home/home.html.twig', [
            'damage' => $damage,
            'attackerPower' => $attackerPower,
            'defenderDefense' => $defenderDefense,
            'baseSkillPower' => $baseSkillPower,
            'isCritical' => $isCritical,
            'multiplier' => $damageMultiplier,
            'armour'=>$armour,
        ]);
    }
}