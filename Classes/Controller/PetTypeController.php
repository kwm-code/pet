<?php
namespace GeorgRinger\Pet\Controller;


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
 * PetTypeController
 */
class PetTypeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * petTypeRepository
     *
     * @var \GeorgRinger\Pet\Domain\Repository\PetTypeRepository
     * @inject
     */
    protected $petTypeRepository = null;

    /**
     * petRepository
     *
     * @var \GeorgRinger\Pet\Domain\Repository\PetRepository
     * @inject
     */
    protected $petRepository = null;


    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $petTypes = $this->petTypeRepository->findAll();
        $this->view->assign('petTypes', $petTypes);
    }

    /**
     * action show
     *
     * @param \GeorgRinger\Pet\Domain\Model\PetType $petType
     * @return void
     */
    public function showAction(\GeorgRinger\Pet\Domain\Model\PetType $petType)
    {
        $this->view->assign('petType', $petType);
        if ($petType) {
            $this->view->assign('pets', $this->petRepository->findByType($petType->getUid()));
        }
    }
}
