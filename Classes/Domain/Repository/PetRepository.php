<?php

namespace GeorgRinger\Pet\Domain\Repository;


use GeorgRinger\Pet\Domain\Filter;
use TYPO3\CMS\Extbase\Persistence\Repository;

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
class PetRepository extends Repository
{

    public function findByMultiple(int $type, $cuteness, $weight)
    {

    }

    public function findByFilter(Filter $filter)
    {
        $query = $this->createQuery();

        $query->getQuerySettings()->setRespectStoragePage(false);

        $constraints = [];

        if ($filter->getMinimumCuteness()) {
            $constraints[] = $query->greaterThanOrEqual('cuteness', $filter->getMinimumCuteness());
        }
        if ($filter->getMaximumCuteness()) {
            $constraints[] = $query->lessThanOrEqual('cuteness', $filter->getMaximumCuteness());
        }
        if ($filter->getMaximumWeight()) {
            $constraints[] = $query->lessThanOrEqual('weight', $filter->getMaximumWeight());
        }
        if ($filter->getPetType()) {
            $constraints[] = $query->equals('petType', $filter->getPetType());
        }

        if (!empty($constraints)) {
            $query->matching(
                $query->logicalAnd($constraints)
            );
        }
        return $query->execute();
    }

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
