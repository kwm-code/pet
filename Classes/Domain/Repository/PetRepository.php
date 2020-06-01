<?php

namespace GeorgRinger\Pet\Domain\Repository;


use GeorgRinger\Pet\Domain\Model\Filter;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
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

    public function findByFilter(Filter $filter)
    {
        $constraints = [];

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        if ($sortBy = $filter->getSortBy()) {
            $query->setOrderings([$sortBy => 'ASC']);
        }
        if ($easyToHandle = $filter->getEasyToHandle()) {
            if ($easyToHandle === 1) {
                $constraints[] = $query->equals('easyToHandle', 1);
            } elseif ($easyToHandle === 2) {
                $constraints[] = $query->equals('easyToHandle', 0);
            }
        }
        if ($type = $filter->getPetType()) {
            $constraints[] = $query->equals('petType', $type);
        }
        if ($minWeight = $filter->getMinimumWeight()) {
            $constraints[] = $query->greaterThanOrEqual('weight', $minWeight);
        }
        if ($maxWeight = $filter->getMaximumWeight()) {
            $constraints[] = $query->lessThanOrEqual('weight', $maxWeight);
        }
        if ($minCuteness = $filter->getMinimumCuteness()) {
            $constraints[] = $query->greaterThanOrEqual('cuteness', $minCuteness);
        }
        if ($maxCuteness = $filter->getMaximumCuteness()) {
            $constraints[] = $query->lessThanOrEqual('cuteness', $maxCuteness);
        }

        if (!empty($constraints)) {
            $query->matching(
                $query->logicalAnd($constraints)
            );
        }
        return $query->execute();
    }

    public function findByMultiple(int $type, $cuteness, $weight) {

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
