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
$GLOBALS['TL_LANG']['tl_module']['gb_avatar']          = array('Avatar oder Gravatar', 'Bitte wählen Sie die variante des Userbildes aus.');
$GLOBALS['TL_LANG']['tl_module']['gb_avatarsize']          = array('Avatar Gräße', 'Bitte wählen Sie die Gräße des Avatars.  empfohlen sind 100.');
$GLOBALS['TL_LANG']['tl_module']['gb_order']          = array('Sortierreihenfolge', 'Bitte wählen Sie die Sortierreihenfolge.');
$GLOBALS['TL_LANG']['tl_module']['gb_perPage']        = array('Einträge pro Seite', 'Die Anzahl der Einträge pro Seite. Geben Sie 0 ein, um den automatischen Seitenumbruch zu deaktivieren.');
$GLOBALS['TL_LANG']['tl_module']['gb_moderate']       = array('Moderieren', 'Einträge bestätigen, bevor sie auf der Webseite veröffentlicht werden.');
$GLOBALS['TL_LANG']['tl_module']['gb_bbcode']         = array('BBCode erlauben', 'Besuchern das Formatieren ihrer Einträge mittels BBCode erlauben.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableCaptcha'] = array('Sicherheitsfrage deaktivieren', 'Hier können Sie die Sicherheitsfrage abschalten (nicht empfohlen).');

$GLOBALS['TL_LANG']['tl_module']['gb_disableICQ'] = array('Formularfeld: ICQ deaktivieren', 'Hier können Sie dieses Eingabefeld abschalten.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableMSN'] = array('Formularfeld: MSN deaktivieren', 'Hier können Sie dieses Eingabefeld abschalten.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableSkype'] = array('Formularfeld: SKYPE deaktivieren', 'Hier können Sie dieses Eingabefeld abschalten.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableNotice'] = array('Notice deaktivieren', 'Hier können Sie dieses Informations Feld abschalten.');
$GLOBALS['TL_LANG']['tl_module']['gb_disableURL'] = array('Formularfeld: Homepage deaktivieren', 'Hier können Sie dieses Eingabefeld abschalten.');

$GLOBALS['TL_LANG']['tl_module']['gb_template']       = array('Template', 'Hier können Sie das Template der Einträge auswählen.');
$GLOBALS['TL_LANG']['tl_module']['gb_jumpTo']       = array('Redirect Einstellung', 'Hier können Sie die Seite auswählen zu der der User gelangt nachdem das Formular abgeschickt wurde.');


/************************************************************************************
 * 		MODULE ORDER SETTINGS
 ************************************************************************************/
$GLOBALS['TL_LANG']['tl_module']['ascending']  = 'älterste zuerst';
$GLOBALS['TL_LANG']['tl_module']['descending'] = 'neuste zuerst';
?>