<?php

namespace GeorgRinger\Pet\Domain\Model;

class Filter
{

    /** @var int */
    protected $minimumWeight = 0;

    /** @var int */
    protected $maximumWeight = 0;

    /** @var int */
    protected $minimumCuteness = 0;

    /** @var int */
    protected $maximumCuteness = 0;

    /** @var int */
    protected $petType = 0;

    /** @var int */
    protected $easyToHandle = 0;

    /** @var string */
    protected $sortBy = '';

    public function __construct(array $configuration = [])
    {
        foreach ($configuration as $name => $value) {
            if (property_exists(__CLASS__, $name)) {
                if ($name === 'sortBy') {
                    $this->$name = (string)$value;
                } else {
                    $this->$name = (int)$value;
                }
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
     * @return int
     */
    public function getMaximumWeight(): int
    {
        return $this->maximumWeight;
    }

    /**
     * @return int
     */
    public function getMinimumCuteness(): int
    {
        return $this->minimumCuteness;
    }

    /**
     * @return int
     */
    public function getMaximumCuteness(): int
    {
        return $this->maximumCuteness;
    }

    /**
     * @return int
     */
    public function getPetType(): int
    {
        return $this->petType;
    }

    /**
     * @return int
     */
    public function getEasyToHandle(): int
    {
        return $this->easyToHandle;
    }

    /**
     * @return string
     */
    public function getSortBy(): string
    {
        return $this->sortBy;
    }

    /**
     * @param int $minimumWeight
     */
    public function setMinimumWeight(int $minimumWeight): void
    {
        $this->minimumWeight = $minimumWeight;
    }

    /**
     * @param int $maximumWeight
     */
    public function setMaximumWeight(int $maximumWeight): void
    {
        $this->maximumWeight = $maximumWeight;
    }

    /**
     * @param int $minimumCuteness
     */
    public function setMinimumCuteness(int $minimumCuteness): void
    {
        $this->minimumCuteness = $minimumCuteness;
    }

    /**
     * @param int $maximumCuteness
     */
    public function setMaximumCuteness(int $maximumCuteness): void
    {
        $this->maximumCuteness = $maximumCuteness;
    }

    /**
     * @param int $petType
     */
    public function setPetType(int $petType): void
    {
        $this->petType = $petType;
    }

    /**
     * @param int $easyToHandle
     */
    public function setEasyToHandle(int $easyToHandle): void
    {
        $this->easyToHandle = $easyToHandle;
    }

    /**
     * @param string $sortBy
     */
    public function setSortBy(string $sortBy): void
    {
        $this->sortBy = $sortBy;
    }



}
