<?php

defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	'pagelist',
	'Configuration/TypoScript/',
	'Pagelist'
);
