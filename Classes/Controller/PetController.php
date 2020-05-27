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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $pets = $this->petRepository->findAll();
        $this->view->assign('pets', $pets);
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
    }
}
