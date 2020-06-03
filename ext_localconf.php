<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'GeorgRinger.Pet',
            'Pet',
            [
                'Pet' => 'list, show',
                'PetType' => 'list, show'
            ],
            // non-cacheable actions
            [
                'Pet' => '',
                'PetType' => ''
            ]
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(trim('
    config.pageTitleProviders {
        pet {
            provider = GeorgRinger\Pet\Service\TitleProvider
            before = altPageTitle,record,seo
        }
    }'));

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '
         mod.web_layout.tt_content.preview.list {
            pet_pet = EXT:pet/Resources/Private/Templates/BackendPreview.html
        }
        mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pet {
                        iconIdentifier = pet-plugin-pet
                        title = LLL:EXT:pet/Resources/Private/Language/locallang_db.xlf:tx_pet_pet.name
                        description = LLL:EXT:pet/Resources/Private/Language/locallang_db.xlf:tx_pet_pet.description
                        tt_content_defValues {
                            CType = list
                            list_type = pet_pet
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

			$iconRegistry->registerIcon(
				'pet-plugin-pet',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:pet/Resources/Public/Icons/user_plugin_pet.svg']
			);

    }
);
