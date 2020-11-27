<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'FREESIXTYFIVE.FsfZollerTextmedia',
            'Zollertextmedia',
            'Zoller Text Media'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('fsf_zoller_textmedia', 'Configuration/TypoScript', 'Zoller Text Media');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fsfzollertextmedia_domain_model_textmedia', 'EXT:fsf_zoller_textmedia/Resources/Private/Language/locallang_csh_tx_fsfzollertextmedia_domain_model_textmedia.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fsfzollertextmedia_domain_model_textmedia');

    }
);
