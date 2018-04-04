<?php
	$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['pagelist_sub'] =  'mimetypes-x-content-pagelist';
	$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['pagelist_selected'] =  'mimetypes-x-content-pagelist';
	$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['pagelist_category'] =  'mimetypes-x-content-pagelist';

	array_splice(
		$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'],
		6,
		0,
		array(
			array(
				'List of Pages',
				'pagelist_selected',
				'mimetypes-x-content-pagelist'
			)
		)
	);
	array_splice(
		$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'],
		6,
		0,
		array(
			array(
				'List of Subpages',
				'pagelist_sub',
				'mimetypes-x-content-pagelist'
			)
		)
	);
	array_splice(
		$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'],
		6,
		0,
		array(
			array(
				'List of Categorized Pages',
				'pagelist_category',
				'mimetypes-x-content-pagelist'
			)
		)
	);

	$tempColumns = array(
		'tx_pagelist_template' => array(
	        'exclude' => 1,
	        'label'   => 'Template',
	        'config'  => array(
	            'type'     => 'select',
	            'renderType' => 'selectSingle',
				'default' => 0,
	            'items'    => array(), /* items set in page TsConfig */
	        ),
	    ),
		'tx_pagelist_orderby' => array(
	        'exclude' => 1,
	        'label'   => 'Sort by',
	        'config'  => array(
	            'type'     => 'select',
	            'renderType' => 'selectSingle',
				'default' => 0,
	            'items' => array(
                    array('Page tree (default)', '0'),
				    array('Page title (a → z)', 'title ASC'),
				    array('Page title (z → a)', 'title DESC'),
				    array('Last updated (now → past)', 'lastUpdated DESC'),
				    array('Last updated (past → now)', 'lastUpdated ASC'),
				    array('Publish date (now → past)', 'starttime DESC'),
				    array('Publish date (past → now)', 'starttime ASC'),
                ),
            ),
	    ),
		'tx_pagelist_startfrom' => array(
			'exclude' => 0,
			'label' => 'Start showing from number',
			'config' => array(
				'type' => 'input',
				'size' => '1',
			),
		),
		'tx_pagelist_limit' => array(
			'exclude' => 0,
			'label' => 'Number of pages shown',
			'config' => array(
				'type' => 'input',
				'size' => '1',
			),
		),
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
//	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tt_content', 'EXT:pagelist/Resources/Private/Language/locallang_db.xml');


	$GLOBALS['TCA']['tt_content']['types']['pagelist_sub'] = array(
		'showitem' => '
			--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
                pages;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:pages.ALT.menu_formlabel,
                --palette--;;pagelistSettings,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.accessibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.menu_accessibility;menu_accessibility,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
            --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements, tx_gridelements_container, tx_gridelements_columns
        '
	);
	$GLOBALS['TCA']['tt_content']['types']['pagelist_selected'] = $GLOBALS['TCA']['tt_content']['types']['pagelist_sub'];

	$GLOBALS['TCA']['tt_content']['palettes']['pagelistSettings']['showitem'] = '
		tx_pagelist_template,
		tx_pagelist_orderby,
		tx_pagelist_startfrom,
		tx_pagelist_limit,
	';

	$GLOBALS['TCA']['tt_content']['types']['pagelist_category'] = array(
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
                    selected_categories,
                    category_field,
					--palette--;;pagelistSettingsCat,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.accessibility,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.menu_accessibility;menu_accessibility,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
                --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements, tx_gridelements_container, tx_gridelements_columns
            ',
            'columnsOverrides' => [
                'category_field' => [
                    'config' => [
                        'itemsProcConfig' => [
                            'table' => 'pages'
                        ]
                    ]
                ]
            ]

        );
        $GLOBALS['TCA']['tt_content']['palettes']['pagelistSettingsCat']['showitem'] = '
		tx_pagelist_template,
		tx_pagelist_startfrom,
		tx_pagelist_limit,
	';