<?php
# placed in Configuration/TCA/Overrides/tt_content.php
defined('TYPO3_MODE') or die();

$identifier = 'pet_pet';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$identifier] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($identifier,
    'FILE:EXT:pet/Configuration/FlexForms/flexform.xml');
