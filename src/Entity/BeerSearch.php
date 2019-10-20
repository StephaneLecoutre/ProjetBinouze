<?php

namespace App\Entity;

class BeerSearch {

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $brewery;

    /**
     * @var string|null
     */
    private $city;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return BeerSearch
     */
    public function setName(?string $name): BeerSearch
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return BeerSearch
     */
    public function setType(?string $type): BeerSearch
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrewery(): ?string
    {
        return $this->brewery;
    }

    /**
     * @param string|null $brewery
     * @return BeerSearch
     */
    public function setBrewery(?string $brewery): BeerSearch
    {
        $this->brewery = $brewery;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return BeerSearch
     */
    public function setCity(?string $city): BeerSearch
    {
        $this->city = $city;
        return $this;
    }

}