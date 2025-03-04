<?php

/** @noinspection PhpFullyQualifiedNameUsageInspection */

/** @noinspection PhpMissingStrictTypesDeclarationInspection */

defined('TYPO3') or die();

$bootMediaoembed = function () {
    $currentVersion = \TYPO3\CMS\Core\Utility\VersionNumberUtility::getNumericTypo3Version();
    $lllPrefix = 'LLL:' . 'EXT:mediaoembed/Resources/Private/Language/locallang_db.xlf:';



    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Mediaoembed',
        'OembedMediaRenderer',
        /** @uses \Sto\Mediaoembed\Controller\OembedController::renderMediaAction() */
        [\Sto\Mediaoembed\Controller\OembedController::class => 'renderMedia'],
        [],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '
mod.wizards.newContentElement {
	wizardItems {
		special.elements {
			mediaoembed_oembedmediarenderer {
				iconIdentifier = extensions-mediaoembed-content-externalmedia
				title = ' . $lllPrefix . 'tt_content.CType.I.tx_mediaoembed
				description = ' . $lllPrefix . 'new_content_element_wizard_oembedmediarenderer_description
				tt_content_defValues {
					CType = mediaoembed_oembedmediarenderer
				}
			}
		}
		special.show := addToList(mediaoembed_oembedmediarenderer)
	}
}
'
    );
};

$bootMediaoembed();
unset($bootMediaoembed);
