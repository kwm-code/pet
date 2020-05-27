<?php
namespace GeorgRinger\Pet\Domain\Model;


/***
 *
 * This file is part of the "Pets" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Georg Ringer <mail@ringer.it>
 *
 ***/
/**
 * Pet
 */
class Pet extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * teaser
     * 
     * @var string
     */
    protected $teaser = '';

    /**
     * description
     * 
     * @var string
     */
    protected $description = '';

    /**
     * media
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $media = null;

    /**
     * weight
     * 
     * @var float
     */
    protected $weight = 0.0;

    /**
     * cuteness
     * 
     * @var int
     */
    protected $cuteness = 0;

    /**
     * petType
     * 
     * @var \GeorgRinger\Pet\Domain\Model\PetType
     */
    protected $petType = null;

    /**
     * easyToHandle
     * 
     * @var bool
     */
    protected $easyToHandle = false;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->media = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the teaser
     * 
     * @return string $teaser
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Sets the teaser
     * 
     * @param string $teaser
     * @return void
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Adds a FileReference
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $medium
     * @return void
     */
    public function addMedium(\TYPO3\CMS\Extbase\Domain\Model\FileReference $medium)
    {
        $this->media->attach($medium);
    }

    /**
     * Removes a FileReference
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $mediumToRemove The FileReference to be removed
     * @return void
     */
    public function removeMedium(\TYPO3\CMS\Extbase\Domain\Model\FileReference $mediumToRemove)
    {
        $this->media->detach($mediumToRemove);
    }

    /**
     * Returns the media
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Sets the media
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
     * @return void
     */
    public function setMedia(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $media)
    {
        $this->media = $media;
    }

    /**
     * Returns the weight
     * 
     * @return float $weight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Sets the weight
     * 
     * @param float $weight
     * @return void
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Returns the cuteness
     * 
     * @return int $cuteness
     */
    public function getCuteness()
    {
        return $this->cuteness;
    }

    /**
     * Sets the cuteness
     * 
     * @param int $cuteness
     * @return void
     */
    public function setCuteness($cuteness)
    {
        $this->cuteness = $cuteness;
    }

    /**
     * Returns the petType
     * 
     * @return \GeorgRinger\Pet\Domain\Model\PetType $petType
     */
    public function getPetType()
    {
        return $this->petType;
    }

    /**
     * Sets the petType
     * 
     * @param \GeorgRinger\Pet\Domain\Model\PetType $petType
     * @return void
     */
    public function setPetType(\GeorgRinger\Pet\Domain\Model\PetType $petType)
    {
        $this->petType = $petType;
    }

    /**
     * Returns the easyToHandle
     * 
     * @return bool $easyToHandle
     */
    public function getEasyToHandle()
    {
        return $this->easyToHandle;
    }

    /**
     * Sets the easyToHandle
     * 
     * @param bool $easyToHandle
     * @return void
     */
    public function setEasyToHandle($easyToHandle)
    {
        $this->easyToHandle = $easyToHandle;
    }

    /**
     * Returns the boolean state of easyToHandle
     * 
     * @return bool
     */
    public function isEasyToHandle()
    {
        return $this->easyToHandle;
    }
}
