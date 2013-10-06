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
* @copyright  Copyright &#40;C&#41; 2008 - 2009 JD-WebService. All rights reserved.
* @author     JD-WebService
* @package    GuestBook
* @license    GNU/LGPL
* @filesource
*/
if (TL_MODE == 'FE')
{
    $GLOBALS['TL_CSS'][]  = 'system/modules/guestbook/html/mod_guestbook.css';
}
/**
* -------------------------------------------------------------------------
* BACK END MODULES
* -------------------------------------------------------------------------
*
* Insert the module into the back end modules array using array_insert().
*/
$GLOBALS['BE_MOD']['content']['guestbook'] = array
(
'tables' => array('tl_guestbook'),
'icon'   => 'system/modules/guestbook/html/icon.png',
'stylesheet' => 'system/modules/guestbook/html/style.css'
);
/**
* -------------------------------------------------------------------------
* FRONT END MODULES
* -------------------------------------------------------------------------
*
* List all fontend modules and their class names.
*/
array_insert($GLOBALS['FE_MOD'], 4, array
(
'guestbook' => array
(
'guestbooklist' => 'GuestBook',
'guestbookform' => 'GuestBookForm'
)
));
?>