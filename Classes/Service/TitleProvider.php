<?php
namespace GeorgRinger\Pet\Service;
use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;

class TitleProvider extends AbstractPageTitleProvider
{
    public function setTitle(string $title): void
    {
        
        $this->title = $title;
    }
}
