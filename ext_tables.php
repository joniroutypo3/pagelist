<?php
  defined('TYPO3_MODE') || die('Access denied.');
  call_user_func(
    function () {
      $pagelistConiguration = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['pagelist'];
      if (!is_array($pagelistConiguration)) {
        $pagelistConiguration = unserialize($pagelistConiguration);
      }

      $pagelistArticle = 136;
      $pagelistEvent = 137;
      $pagelistProduct = 138;

      if ($pagelistConiguration['pagelistEnableArticles']) {
        $GLOBALS['PAGES_TYPES'][$pagelistArticle] = [
          'type' => 'web',
          'allowedTables' => '*',
        ];
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
        ->registerIcon(
          'apps-pagetree-article',
          TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
          [
            'source' => 'EXT:pagelist/Resources/Public/Images/Icons/ico_article.svg',
          ]
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
          'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $pagelistArticle . ')'
        );
      }
      if ($pagelistConiguration['pagelistEnableEvents']) {
        $GLOBALS['PAGES_TYPES'][$pagelistEvent] = [
          'type' => 'web',
          'allowedTables' => '*',
        ];
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
        ->registerIcon(
          'apps-pagetree-event',
          TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
          [
            'source' => 'EXT:pagelist/Resources/Public/Images/Icons/ico_event.svg',
          ]
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
            'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $pagelistEvent . ')'
        );
      }
      if ($pagelistConiguration['pagelistEnableProducts']) {
        $GLOBALS['PAGES_TYPES'][$pagelistProduct] = [
          'type' => 'web',
          'allowedTables' => '*',
        ];
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
        ->registerIcon(
          'apps-pagetree-product',
          TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
          [
            'source' => 'EXT:pagelist/Resources/Public/Images/Icons/ico_product.svg',
          ]
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
          'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $pagelistProduct . ')'
        );
      }
    }
  );