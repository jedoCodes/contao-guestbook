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

$GLOBALS['TL_LANG']['tl_guestbook']['comment'] = 'Administrator Comment';


/************************************************************************************
 * 		FORMULAR
 ************************************************************************************/
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_name'] = 'Your Name :';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_email'] = 'Your E-Mail :';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_website'] = 'Your Homepage :';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_message'] = 'Your Messages :';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_icq'] = 'Ihre ICQ Nummer :';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_msn'] = 'Ihre MSN Adresse :';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_skype'] = 'Ihr Skype Name :';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_captcha'] = 'Sicherheitsfrage :';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_captchahelp'] = '<p>Bitte geben Sie die Summe (Zahl) der nachfolgenden Rechnung in das Feld ein. Diese Abfrage ist leider als Schutz gegen Spam-Versender notwendig. Wir bitten um Ihr Verst&auml;ndnis.</p>';


$GLOBALS['TL_LANG']['GUESTBOOK']['gb_fieldsetname'] = 'Ihre Angaben';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_fieldsetcaptcha'] ='Spamschutz';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_fieldsetcaptchahelp'] ='Zu unserer und Ihrer Sicherheit speichern wir die folgende IP-Adresse:  ';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_forminfo'] ='Die Felder mit <strong>*</strong> sind Pflicht-Angaben, diese m&uuml;ssen ausgef&uuml;lt werden. Ihre angegebene E-Mail Adresse wird nicht ver&ouml;ffendlicht.<br />';
$GLOBALS['TL_LANG']['GUESTBOOK']['gb_fieldmoderate'] = 'Dein Eintrag wird im G&auml;stebuch erscheinen, sobald wir ihn uns angesehen und freigegeben haben. Wir behalten uns das Recht vor, Beitr&auml;ge zu k&uuml;rzen, zu l&ouml;schen oder sie nicht freizugeben.';

/************************************************************************************
*  		        EMAIL
*************************************************************************************/

$GLOBALS['TL_LANG']['GUESTBOOK']['email_message']  = "%s hat einen neuen Gästebuch Eintrag auf Ihrer Webseite erstellt.\n\n---\n\n%s\n\n---\n\nAnsehen: %s\nBearbeiten: %s\n\nWenn Sie das Gästebuch moderieren, müssen Sie sich im Backend anmelden und den Eintrag zu veröffentlichen.";
$GLOBALS['TL_LANG']['GUESTBOOK']['email_subject'] = '%s :: Neuer Gästebucheintrag';
$GLOBALS['TL_LANG']['GUESTBOOK']['confirm']  = 'Ihr G&auml;stebuch Eintrag wurde hinzugef&�uml;gt und wird nach redaktioneller Pr&uuml;fung ve&ouml;rffentlicht.';
$GLOBALS['TL_LANG']['GUESTBOOK']['submit'] = 'Absenden';

?>