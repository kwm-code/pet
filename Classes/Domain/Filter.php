<?php

namespace GeorgRinger\Pet\Domain;

class Filter
{

    /** @var int */
    protected $minimumWeight = 0;

    /** @var int */
    protected $maximumWeight = 0;

    /** @var string */
    protected $sortBy = '';

    /** @var int */
    protected $minimumCuteness = 0;

    /** @var int */
    protected $maximumCuteness = 0;

    /** @var int */
    protected $petType = 0;

    public function __construct(array $settings = [])
    {
        foreach ($settings as $propertyName => $value) {
            if (property_exists(__CLASS__, $propertyName)) {
                $this->$propertyName = $value;
            }
        }
    }

    /**
     * @return int
     */
    public function getMinimumWeight(): int
    {
        return $this->minimumWeight;
    }

    /**
     * @param int $minimumWeight
     */
    public function setMinimumWeight(int $minimumWeight): void
    {
        $this->minimumWeight = $minimumWeight;
    }

    /**
     * @return int
     */
    public function getMaximumWeight(): int
    {
        return $this->maximumWeight;
    }

    /**
     * @param int $maximumWeight
     */
    public function setMaximumWeight(int $maximumWeight): void
    {
        $this->maximumWeight = $maximumWeight;
    }

    /**
     * @return string
     */
    public function getSortBy(): string
    {
        return $this->sortBy;
    }

    /**
     * @param string $sortBy
     */
    public function setSortBy(string $sortBy): void
    {
        $this->sortBy = $sortBy;
    }

    /**
     * @return int
     */
    public function getMinimumCuteness(): int
    {
        return $this->minimumCuteness;
    }

    /**
     * @param int $minimumCuteness
     */
    public function setMinimumCuteness(int $minimumCuteness): void
    {
        $this->minimumCuteness = $minimumCuteness;
    }

    /**
     * @return int
     */
    public function getMaximumCuteness(): int
    {
        return $this->maximumCuteness;
    }

    /**
     * @param int $maximumCuteness
     */
    public function setMaximumCuteness(int $maximumCuteness): void
    {
        $this->maximumCuteness = $maximumCuteness;
    }

    /**
     * @return int
     */
    public function getPetType(): int
    {
        return $this->petType;
    }

    /**
     * @param int $petType
     */
    public function setPetType(int $petType): void
    {
        $this->petType = $petType;
    }

}
