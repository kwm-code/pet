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
 * The repository for Pets
 */
class PetRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function findByType(int $type)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        $constraints = [
            $query->equals('petType.uid', $type)
        ];

        $query->matching(
            $query->logicalAnd($constraints)
        );
        return $query->execute();
    }
}
