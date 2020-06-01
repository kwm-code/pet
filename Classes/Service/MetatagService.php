<?php

declare(strict_types=1);

namespace GeorgRinger\Pet\Service;

use TYPO3\CMS\Core\MetaTag\MetaTagManagerInterface;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class MetatagService
{

    public function addTitle(string $title)
    {
        $titleProvider = GeneralUtility::makeInstance(TitleProvider::class);
        $titleProvider->setTitle($title);
    }

    public function addDescription(string $content)
    {
        $metaTagManagerRegistry = GeneralUtility::makeInstance(MetaTagManagerRegistry::class);
        $manager = $metaTagManagerRegistry->getManagerForProperty('description');
        $manager->addProperty('description', $content);
    }
}
