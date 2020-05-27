<?php
namespace GeorgRinger\Pet\Domain\Repository;


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
 * The repository for PetTypes
 */
class PetTypeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function findAll() {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        return $query->execute();
    }
}
