# Page List

**TYPO3 CMS extension for easy to configure teasers, news lists, product pages etc.**

## System requirements

- TYPO3 8.7 LTS – 9.*
- fluid_styled_content

## Features

- List of sub pages
- List of selected pages
- List of pages in category
- Set start from, limit and sort by
- Easy to add custom templates

## Installation

 - From TER: **pagelist**, or composer: **t3brightside/pagelist**
 - Include static template after fluid_styled_content

## Usage

Add as any other content element. Select desired template in content element settings.

## Admin

### Add custom template

**PageTS**

Add new template number '3' and name it:
```typoscript
TCEFORM.tt_content.tx_pagelist_template.addItems {
  3 = My New Template
}
```

**TypoScript**

Change constants:
```typoscript
pagelist.styles = EXT:pagelist/Resources/Public/Styles/pagelist.css
pagelist.templateRootPaths = EXT:pagelist/Resources/Private/Templates/
pagelist.partialRootPaths = EXT:pagelist/Resources/Private/Partials/
```

**Fluid**

Add new section wheres IF condition determines template nr '3' to: _Resources/Private/Templates/Pagelist.html_
```html
<f:if condition="{data.tx_pagelist_template} == 3">
  <div class="pagelist pagelist-mytemplate template-{data.tx_pagelist_template}">
    <f:for each="{menu}" as="page" iteration="iterator">
      <f:render partial="MyNewTemplate" arguments="{_all}"/>
    </f:for>
  </div>
</f:if>
```
Create new partial: _Resources/Private/Partials/MyNewTemplate.html_

## Sources

-  [GitHub][a47ab545]
-  [Packagist][40819ab1]
-  [TER][15e0f507]

  [a47ab545]: https://github.com/t3brightside/pagelist "GitHub"
  [40819ab1]: https://packagist.org/packages/t3brightside/pagelist "Packagist"
  [15e0f507]: https://extensions.typo3.org/extension/pagelist/ "Typo3 Extension Repository"

Development and maintenance
---------------------------

[Brightside OÜ][ab26eed2] – TYPO3 development and hosting specialised web agency

  [ab26eed2]: https://t3brightside.com/ "TYPO3 specialized web agency"
