<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');
/**
* TYPOlight webCMS
* Copyright (C) 2005-2009 Leo Feyer
*
* This program is free software: you can redistribute it and/or
* modify it under the terms of the GNU Lesser General Public
* License as published by the Free Software Foundation, either
* version 2.1 of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
* Lesser General Public License for more details.
*
* You should have received a copy of the GNU Lesser General Public
* License along with this program. If not, please visit the Free
* Software Foundation website at http://www.gnu.org/licenses/.
*
* PHP version 5
* @copyright  Copyright (C) 2008 - 2009 JD-WebService. All rights reserved.
* @author     JD-WebService
* @package    GuestBook
* @license    GNU/LGPL
* @filesource
*/
/**
* Add palette to tl_module
*/
$GLOBALS['TL_DCA']['tl_module']['palettes']['guestbookform'] = '{type_legend},name,headline,type,gb_jumpTo;{config_legend},gb_moderate,gb_bbcode,gb_disableURL,gb_disableCaptcha,gb_disableICQ,gb_disableMSN,gb_disableSkype,gb_disableNotice;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['guestbooklist'] = '{title_legend},name,headline,type;{config_legend},gb_order,gb_perPage,gb_avatar,,gb_avatarsize,gb_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
* Add fields to tl_module
*/

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_order'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_order'],
'default'                 => 'ascending',
'exclude'                 => true,
'inputType'               => 'select',
'options'                 => array('ascending', 'descending'),
'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_avatar'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_avatar'],
'default'                 => 'gravatar',
'exclude'                 => true,
'inputType'               => 'select',
'options'                 => array('avatar', 'gravatar'),
'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_avatarsize'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_avatarsize'],
'exclude'                 => true,
'inputType'               => 'text',
'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_perPage'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_perPage'],
'exclude'                 => true,
'inputType'               => 'text',
'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_jumpTo'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_jumpTo'],
'exclude'                 => true,
'inputType'               => 'pageTree',
'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_moderate'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_moderate'],
'exclude'                 => true,
'inputType'               => 'checkbox',
'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_bbcode'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_bbcode'],
'exclude'                 => true,
'inputType'               => 'checkbox',
'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_disableCaptcha'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_disableCaptcha'],
'exclude'                 => true,
'inputType'               => 'checkbox',
'eval'                    => array('tl_class'=>'w50')
);


$GLOBALS['TL_DCA']['tl_module']['fields']['gb_disableICQ'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_disableICQ'],
'exclude'                 => true,
'inputType'               => 'checkbox',
'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_disableURL'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_disableURL'],
'exclude'                 => true,
'inputType'               => 'checkbox',
'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['gb_disableMSN'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_disableMSN'],
'exclude'                 => true,
'inputType'               => 'checkbox',
'eval'                    => array('tl_class'=>'w50')
);


$GLOBALS['TL_DCA']['tl_module']['fields']['gb_disableSkype'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_disableSkype'],
'exclude'                 => true,
'inputType'               => 'checkbox',
'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_disableNotice'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_disableNotice'],
'exclude'                 => true,
'inputType'               => 'checkbox',
'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gb_template'] = array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_module']['gb_template'],
'default'                 => 'gb_simple',
'exclude'                 => true,
'inputType'               => 'select',
'options'                 => $this->getTemplateGroup('gb_'),
'eval'                    => array('tl_class'=>'w50')

);
?>