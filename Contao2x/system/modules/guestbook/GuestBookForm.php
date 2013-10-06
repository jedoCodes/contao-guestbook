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
* @package    jdws-guestbook
* @license    GNU/LGPL
* @filesource
*/
class GuestBookForm extends Module
{
    /**
    * Template
    * @var string
    */
    protected $strTemplate = 'mod_guestbookform';
    /**
    * Display a wildcard in the back end
    * @return string
    */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### GUESTBOOK FORM ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'typolight/main.php?do=modules&act=edit&id=' . $this->id;
            return $objTemplate->parse();
        }
        return parent::generate();
    }
    /**
    * Generate module
    */
    protected function compile()
    {
        // Get front end user object
        $this->import('FrontendUser', 'User');
        // Access control
        if ($this->protected && !BE_USER_LOGGED_IN)
        {
            if (!FE_USER_LOGGED_IN)
            {
                $this->Template->protected = true;
                return;
            }
            $arrGroups = deserialize($this->groups);
            if (is_array($arrGroups) && count(array_intersect($this->User->groups, $arrGroups)) < 1)
            {
                $this->Template->protected = true;
                return;
            }
        }
        // Form fields
        $arrFields = array
        (
        'name' => array
        (
        'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_name'],
        'name' => 'gbname',
        'value' => trim($this->User->firstname . ' ' . $this->User->lastname),
        'inputType' => 'text',
        'eval' => array('mandatory'=>true, 'maxlength'=>128)
        ),
        'email' => array
        (
        'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_email'],
        'name' => 'gbemail',
        'value' => $this->User->email,
        'inputType' => 'text',
        'eval' => array('rgxp'=>'email', 'mandatory'=>true, 'maxlength'=>128, 'decodeEntities'=>true, 'tl_class'=>'w50')
        )
        ); 
        if (!$this->gb_disableURL)
        {
            $arrFields['website'] = array
        (
        'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_website'],
        'name' => 'gbwebsite',
        'value' => $this->User->website,
        'inputType' => 'text',
        'eval' => array('rgxp'=>'url', 'maxlength'=>128, 'decodeEntities'=>true,'tl_class'=>'w50')
        );
}
        if (!$this->gb_disableICQ)
        {
            $arrFields['icq'] = array
        (
        'name' => 'gbicq',
        'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_icq'] ,
        'inputType' => 'text',
        'eval' => array('maxlength'=>64, 'decodeEntities'=>true,'tl_class'=>'w50')
        );
}
        if (!$this->gb_disableMSN)
        {
            $arrFields['msn'] = array
        (
        'name' => 'gbmsn',
        'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_msn'] ,
        'inputType' => 'text',
        'eval' => array('maxlength'=>64, 'decodeEntities'=>true,'tl_class'=>'w50')
        );
}
        if (!$this->gb_disableSkype)
        {
            $arrFields['skype'] = array
        (
        'name' => 'gbskype',
        'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_skype'] ,
        'inputType' => 'text',
        'eval' => array('maxlength'=>64, 'decodeEntities'=>true,'tl_class'=>'w50')
        );
	}
		if ($this->gb_bbcode)
        {
        // Comment field
        $arrFields['message'] = array
        (
        'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_message'] ,
        'name' => 'gbmessage',
        'inputType' => 'textarea',
        'eval' => array('rows'=>10, 'cols'=>75, 'allowHtml'=>true)
        );
		}else{
        $arrFields['message'] = array
        (
        'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_message'] ,
        'name' => 'gbmessage',
        'inputType' => 'textarea',
        'eval' => array( 'mandatory'=>true, 'rows'=>10, 'cols'=>75, 'allowHtml'=>true)
        );
		}
        // Captcha
        if (!$this->gb_disableCaptcha)
        {
            $arrFields['captcha'] = array
            (
            'label' => $GLOBALS['TL_LANG']['GUESTBOOK']['gb_captcha'] ,
            'name' => 'gbcaptcha',
            'inputType' => 'captcha',
            'eval' => array('mandatory'=>true)
            );
        }
        if ($this->gb_moderate)
        {
            $this->Template->moderate = true;
        }
        if ($this->gb_bbcode)
        {
            $this->Template->bbcode = true;
        }
        $doNotSubmit = false;
        $arrWidgets = array();

        // Initialize widgets
        foreach ($arrFields as $arrField)
        {
            $strClass = $GLOBALS['TL_FFL'][$arrField['inputType']];
            // Continue if the class is not defined
            if (!$this->classFileExists($strClass))
            {
                continue;
            }
            $arrField['eval']['required'] = $arrField['eval']['mandatory'];
            $objWidget = new $strClass($this->prepareForWidget($arrField, $arrField['name'], $arrField['value']));
            // Validate widget
            if ($this->Input->post('FORM_SUBMIT') == 'tl_guestbook')
            {
                $objWidget->validate();
                if ($objWidget->hasErrors())
                {
                    $doNotSubmit = true;
                }
            }
            $arrWidgets[] = $objWidget;
        }
        $this->Template->fields = $arrWidgets;
        $this->Template->submit = $GLOBALS['TL_LANG']['GUESTBOOK']['submit'];
        $this->Template->action = ampersand($this->Environment->request);
        $this->Template->messages = $this->getMessages();

        // Confirmation message
        if ($_SESSION['TL_GUESTBOOKENTRIE_ADDED'])
        {
            $this->Template->confirm = $GLOBALS['TL_LANG']['GUESTBOOK']['confirm'];
            $_SESSION['TL_GUESTBOOKENTRIE_ADDED'] = false;
        }
        // Add comment
        if ($this->Input->post('FORM_SUBMIT') == 'tl_guestbook' && !$doNotSubmit)
        {
            $this->addGbEntrie();
            // Pending for approval
            if ($this->gb_moderate)
            {
                $_SESSION['TL_GUESTBOOKENTRIE_ADDED'] = true;
            }
            $this->reload();
        }
    }
    /**
    * Replace bbcode and add the comment to the database
    *
    * Supports the following tags:
    *
    * - [b][/b] bold
    * - [i][/i] italic
    * - [u][/u] underline
    * - [img][/img]
    * - [code][/code]
    * - [color=#ff0000][/color]
    * - [quote][/quote]
    * - [quote=tim][/quote]
    * - [url][/url]
    * - [url=http://][/url]
    * - [email][/email]
    * - [email=name@domain.com][/email]
    */
    protected function addGbEntrie()
    {
			$this->import('String');


        $strWebsite = $this->Input->post('gbwebsite');
        // Add http:// to website
        if (strlen($strWebsite) && !preg_match('@^https?://|ftp://|mailto:@i', $strWebsite))
        {
            $strWebsite = 'http://' . $strWebsite;
        }
        $strComment = trim($this->Input->post('gbmessage', true));
        // Replace bbcode
        if ($this->gb_bbcode)
        {
            $arrSearch = array
            (
            '[b]', '[/b]',
            '[i]', '[/i]',
            '[u]', '[/u]',
            '[code]', '[/code]',
            '[/color]',
            '[quote]', '[/quote]'
            );
            $arrReplace = array
            (
            '<strong>', '</strong>',
            '<em>', '</em>',
            '<span style="text-decoration:underline;">', '</span>',
            '<div class="code"><p>' . $GLOBALS['TL_LANG']['MSC']['com_code'] . '</p><pre>', '</pre></div>',
            '</span>',
            '<div class="quote">', '</div>'
            );
            $strComment = str_replace($arrSearch, $arrReplace, $strComment);
            $strComment = preg_replace('/\[color=([^\]]+)\]/i', '<span style="color:$1;">', $strComment);
            $strComment = preg_replace('/\[quote=([^\]]+)\]/i', '<div class="quote"><p>' . sprintf($GLOBALS['TL_LANG']['MSC']['com_quote'], '$1') . '</p>', $strComment);
            $strComment = preg_replace('/\[img\]([^\[]+)\[\/img\]/i', '<img src="$1" alt="" />', $strComment);
            $strComment = preg_replace('/\[url\]([^\[]+)\[\/url\]/i', '<a href="$1">$1</a>', $strComment);
            $strComment = preg_replace('/\[url=([^\]]+)\]([^\[]+)\[\/url\]/i', '<a href="$1">$2</a>', $strComment);
            $strComment = preg_replace('/\[email\]([^\[]+)\[\/email\]/i', '<a href="mailto:$1">$1</a>', $strComment);
            $strComment = preg_replace('/\[email=([^\]]+)\]([^\[]+)\[\/email\]/i', '<a href="mailto:$1">$2</a>', $strComment);
            $strComment = preg_replace(array('@</div>(\n)*@', '@\r@'), array("</div>\n", ''), $strComment);
        }
        // Encode e-mail addresses
        if (strpos($strComment, 'mailto:') !== false)
        {
            $this->import('String');
            $strComment = $this->String->encodeEmail($strComment);
        }
        // Prevent cross-site request forgeries
        $strComment = preg_replace('/(href|src|on[a-z]+)="[^"]*(typolight\/main\.php|javascript|vbscri?pt|script|alert|document|cookie|window)[^"]*"+/i', '$1="#"', $strComment);
        // Prepare record
        $arrSet = array
        (
        'tstamp' => time(),
        'name' => $this->Input->post('gbname'),
        'email' => $this->Input->post('gbemail', true),
        'website' => '',
        'message' => nl2br_pre($strComment),
        'ip' => $this->Environment->ip,
        'icq' => '',
        'msn' => '',
        'skype' => '',
        'date' => time(),
        'published' => 1
        );
        // Moderate
        if ($this->gb_moderate)
        {
            $arrSet['published'] = '';
        }
        if (!$this->gb_disableURL)
        {
            $arrSet['website'] = $strWebsite;
        }
        if (!$this->gb_disableICQ)
        {
            $arrSet['icq'] = $this->Input->post('gbicq');
        }
        if (!$this->gb_disableMSN)
        {
            $arrSet['msn'] = $this->Input->post('gbmsn');
        }
        if (!$this->gb_disableSkype)
        {
            $arrSet['skype'] = $this->Input->post('gbskype');
        }


        //$insert = $this->Database->prepare("INSERT INTO  tl_guestbook %s")->set($arrSet)->execute();
       $insertId = $this->Database->prepare("INSERT INTO tl_guestbook %s")->set($arrSet)->execute()->insertId;


        // Inform admin
/*
        $objEmail = new Email();
        $objEmail->from = $GLOBALS['TL_ADMIN_EMAIL'];
        $objEmail->subject = sprintf($GLOBALS['TL_LANG']['GUESTBOOK']['email_subject'], $this->Environment->host);
        // Add comment details
        $objEmail->text = sprintf($GLOBALS['TL_LANG']['GUESTBOOK']['email_message'],
        $arrSet['name'] . ' (' . $arrSet['email'] . ')',
        //strip_tags($arrSet['message']),
        strip_tags($arrSet['strComment']),
        $this->Environment->base . $this->Environment->request,
        $this->Environment->base . 'typolight/main.php?do=guestbook&act=edit&id=' . $insert->insertId);
        $objEmail->sendTo($GLOBALS['TL_ADMIN_EMAIL']);
*/

			// Notification
			$objEmail = new Email();

			$objEmail->from = $GLOBALS['TL_ADMIN_EMAIL'];
			$objEmail->fromName = $GLOBALS['TL_ADMIN_NAME'];
			$objEmail->subject = sprintf($GLOBALS['TL_LANG']['MSC']['email_subject'], $this->Environment->host);

			// Convert the comment to plain text
			$strComment = strip_tags($strComment);
			$strComment = $this->String->decodeEntities($strComment);
			$strComment = str_replace(array('&', '<', '>'), array('&', '<', '>'), $strComment);

			// Add comment details
			$objEmail->text = sprintf($GLOBALS['TL_LANG']['MSC']['com_message'],
									  $arrSet['name'] . ' (' . $arrSet['email'] . ')',
									  $strComment,
									  $this->Environment->base . $this->Environment->request,
									  $this->Environment->base . 'contao/main.php?do=guestbook&act=edit&id=' . $insertId);

			$objEmail->sendTo($GLOBALS['TL_ADMIN_EMAIL']);



        // Redirect
        if (strlen($this->gb_jumpTo))
        {
            $objNextPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
            ->limit(1)
            ->execute($this->gb_jumpTo);
            if ($objNextPage->numRows)
            {
                $this->redirect($this->generateFrontendUrl($objNextPage->fetchAssoc()));
            }
        }
        $this->jumpToOrReload($this->jumpTo);
    }
}
?>