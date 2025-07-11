<?php

namespace App\DTO;

class CharacterDTO
{
    public function __construct(
        private int $id,
        private string $name,

        private int $level,
        private int $exp,

        private int $currentHp,
        private int $maxHp,

        private int $currentMana,
        private int $maxMana,

        private int $skillPoints,

        private int $attack,
        private int $speed,
        private int $evasion,
        private int $defense,
        private int $armour,

        private ?array $growthChances = null,
        private array $traits = [],
        private array $skills = [],
        private array $statusEffects = [],

        private bool $isAlive = true,
        private bool $isPlayer = true
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = max(1, $level);
    }

    public function getExp(): float
    {
        return $this->exp;
    }

    public function setExp(int $exp): void
    {
        $this->exp = max(0, $exp);
    }

    //Resources

    public function getCurrentHp(): int
    {
        return $this->currentHp;
    }

    public function setCurrentHp(int $hp): void
    {
        $this->currentHp = max(0, min($hp, $this->maxHp));
        $this->isAlive = $this->currentHp > 0;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function getCurrentMana(): int
    {
        return $this->currentMana;
    }

    public function setCurrentMana(int $mana): void
    {
        $this->currentMana = max(0, min($mana, $this->maxMana));
    }

    public function getMaxMana(): int
    {
        return $this->maxMana;
    }

    public function getSkillPoints(): int
    {
        return $this->skillPoints;
    }

    public function setSkillPoints(int $points): void
    {
        $this->skillPoints = max(0, $points);
    }

    // Stats

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getEvasion(): int
    {
        return $this->evasion;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getArmour(): int
    {
        return $this->armour;
    }

    public function getGrowthChances(): ?array
    {
        return $this->growthChances;
    }

    // Autres

    public function getTraits(): array
    {
        return $this->traits;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function getStatusEffects(): array
    {
        return $this->statusEffects;
    }

    public function addStatusEffect(string $effect): void
    {
        if (!in_array($effect, $this->statusEffects, true)) {
            $this->statusEffects[] = $effect;
        }
    }

    public function removeStatusEffect(string $effect): void
    {
        $this->statusEffects = array_values(
            array_filter(
                $this->statusEffects,
                fn ($e) => $e !== $effect
            )
        );
    }

    // Les true/false

    public function isAlive(): bool
    {
        return $this->isAlive;
    }

    public function setAlive(bool $state): void
    {
        $this->isAlive = $state;
    }

    public function isPlayer(): bool
    {
        return $this->isPlayer;
    }

    public function setPlayer(bool $flag): void
    {
        $this->isPlayer = $flag;
    }
}
