<?php

namespace App\Entity;

use App\Repository\BicycleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BicycleRepository::class)
 */
class Bicycle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Maker;

    /**
     * @ORM\Column(type="text")
     */
    private $Specifications;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumberOfGears;

    /**
     * @ORM\Column(type="float")
     */
    private $WheelDiameter;

    /**
     * @ORM\Column(type="integer")
     */
    private $PedalRpm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaker(): ?string
    {
        return $this->Maker;
    }

    public function setMaker(string $Maker): self
    {
        $this->Maker = $Maker;

        return $this;
    }

    public function getSpecifications(): ?string
    {
        return $this->Specifications;
    }

    public function setSpecifications(string $Specifications): self
    {
        $this->Specifications = $Specifications;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getNumberOfGears(): ?int
    {
        return $this->NumberOfGears;
    }

    public function setNumberOfGears(int $NumberOfGears): self
    {
        $this->NumberOfGears = $NumberOfGears;

        return $this;
    }

    public function getWheelDiameter(): ?float
    {
        return $this->WheelDiameter;
    }

    public function setWheelDiameter(float $WheelDiameter): self
    {
        $this->WheelDiameter = $WheelDiameter;

        return $this;
    }

    public function getPedalRpm(): ?int
    {
        return $this->PedalRpm;
    }

    public function setPedalRpm(int $PedalRpm): self
    {
        $this->PedalRpm = $PedalRpm;

        return $this;
    }
}
