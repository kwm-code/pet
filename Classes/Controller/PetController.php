<?php

namespace GeorgRinger\Pet\Controller;

use GeorgRinger\Holiday\Service\TitleProvider;
use GeorgRinger\Pet\Domain\Filter;
use GeorgRinger\Pet\Service\MetatagService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * PetController
 */
class PetController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * petRepository
     *
     * @var \GeorgRinger\Pet\Domain\Repository\PetRepository
     * @inject
     */
    protected $petRepository = null;

    /**
     * petRepository
     *
     * @var \GeorgRinger\Pet\Domain\Repository\PetTypeRepository
     * @inject
     */
    protected $petTypeRepository = null;


    /**
     * @param array $extraFilter
     */
    public function listAction(array $extraFilter = []): void
    {
        $filter = new Filter($this->settings);

        $pets = $this->petRepository->findByFilter($filter);

        $this->view->assign('pets', $pets);
        $this->view->assign('filter', $filter);
        $this->view->assign('petTypes', $this->petTypeRepository->findAll());
    }

    /**
     * action show
     *
     * @param \GeorgRinger\Pet\Domain\Model\Pet $pet
     * @return void
     */
    public function showAction(\GeorgRinger\Pet\Domain\Model\Pet $pet)
    {
        $this->view->assign('pet', $pet);

        $metatagService = GeneralUtility::makeInstance(MetatagService::class);
        $metatagService->addTitle($pet->getName());
        $metatagService->addDescription($pet->getTeaser());
    }
}
