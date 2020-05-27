<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'GeorgRinger.Pet',
            'Pet',
            'Pets'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('pet', 'Configuration/TypoScript', 'Pets');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pet_domain_model_pet', 'EXT:pet/Resources/Private/Language/locallang_csh_tx_pet_domain_model_pet.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pet_domain_model_pet');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pet_domain_model_pettype', 'EXT:pet/Resources/Private/Language/locallang_csh_tx_pet_domain_model_pettype.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pet_domain_model_pettype');

    }
);
