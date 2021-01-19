<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'FREESIXTYFIVE.FsfZollerTextmedia',
            'Zollertextmedia',
            [
                'Textmedia' => 'list'
            ],
            // non-cacheable actions
            [
                'Textmedia' => ''
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        zollertextmedia {
                            iconIdentifier = fsf_zoller_textmedia-plugin-zollertextmedia
                            title = Text Media
                            description = LLL:EXT:fsf_zoller_textmedia/Resources/Private/Language/locallang_db.xlf:tx_fsf_zoller_textmedia_zollertextmedia.description
                            tt_content_defValues {
                                CType = list
                                list_type = fsfzollertextmedia_zollertextmedia
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'fsf_zoller_textmedia-plugin-zollertextmedia',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:fsf_zoller_textmedia/Resources/Public/Icons/zoller_z.svg']
			);
		
    }
);
