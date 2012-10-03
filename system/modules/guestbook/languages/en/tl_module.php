<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  jedo-Webstudio 2010 
 * @author     Jens Doberenz <info@jedo-webstudio.de> 
 * @package    Guestbook 
 * @license    GNU/LGPL 
 * @filesource
 */

/************************************************************************************
 * 		MODULE CONFIG
 ************************************************************************************/
$GLOBALS['TL_LANG']['tl_module']['gb_avatar']          = array('Avatar oder Gravatar', 'Bitte w&auml;hlen Sie die variante des Userbildes aus.');
$GLOBALS['TL_LANG']['tl_module']['gb_avatarsize']          = array('Avatar Gr&auml;&szlig;e', 'Bitte w&auml;hlen Sie die Gr&auml;&szlig;e des Avatars.  empfohlen sind 100.');
$GLOBALS['TL_LANG']['tl_module']['gb_order']          = array('Sortierreihenfolge', 'Bitte w&auml;hlen Sie die Sortierreihenfolge.');
$GLOBALS['TL_LANG']['tl_module']['gb_perPage']        = array('Eintr&auml;ge pro Seite', 'Die Anzahl der Eintr&auml;ge pro Seite. Geben Sie 0 ein, um den automatischen Seitenumbruch zu deaktivieren.');
$GLOBALS['TL_LANG']['tl_module']['gb_moderate']       = array('Moderieren', 'Eintr&auml;ge best&auml;tigen, bevor sie auf der Webseite ver&ouml;ffentlicht werden.');
$GLOBALS['TL_LANG']['tl_module']['gb_bbcode']         = array('BBCode erlauben', 'Besuchern das Formatieren ihrer Eintr&auml;ge mittels BBCode erlauben.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableCaptcha'] = array('Sicherheitsfrage deaktivieren', 'Hier k&ouml;nnen Sie die Sicherheitsfrage abschalten (nicht empfohlen).');

$GLOBALS['TL_LANG']['tl_module']['gb_disableICQ'] = array('Formularfeld: ICQ deaktivieren', 'Hier k&ouml;nnen Sie dieses Eingabefeld abschalten.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableMSN'] = array('Formularfeld: MSN deaktivieren', 'Hier k&ouml;nnen Sie dieses Eingabefeld abschalten.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableSkype'] = array('Formularfeld: SKYPE deaktivieren', 'Hier k&ouml;nnen Sie dieses Eingabefeld abschalten.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableNotice'] = array('Notice deaktivieren', 'Hier k&ouml;nnen Sie dieses Informations Feld abschalten.');


$GLOBALS['TL_LANG']['tl_module']['gb_template']       = array('Template', 'Hier k&ouml;nnen Sie das Template der Eintr&auml;ge ausw&auml;hlen.');
$GLOBALS['TL_LANG']['tl_module']['gb_jumpTo']       = array('Redirect Einstellung', 'Hier k&ouml;nnen Sie die Seite ausw&auml;hlen zu der der User gelangt nachdem das Formular abgeschickt wurde.');


/************************************************************************************
 * 		MODULE ORDER SETTINGS
 ************************************************************************************/
$GLOBALS['TL_LANG']['tl_module']['ascending']  = '&auml;lterste zuerst';
$GLOBALS['TL_LANG']['tl_module']['descending'] = 'neuste zuerst';
?>