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
$GLOBALS['TL_DCA']['tl_guestbook'] = array
(
/************************************************************************************
*         CONFIGURATIONS
************************************************************************************/
'config' => array
(
'dataContainer'                   => 'Table',
'doNotCopyRecords'                => true,
'enableVersioning'                => false,
'closed'                          => true
),
/************************************************************************************
*         LIST
************************************************************************************/
'list' => array
(
'sorting' => array
(
'mode'                    => 1,
'fields'                  =>  array('date'),
'flag'                    => 6,
'panelLayout'             => 'filter;search,limit'
),
'label' => array
(
'fields'                  => array('name'),
'format'                  => '%s',
'label_callback'          => array('tl_guestbook', 'listGbEntries')
),
'global_operations' => array
(
'all' => array
(
'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
'href'                => 'act=select',
'class'               => 'header_edit_all',
'attributes'          => 'onclick="Backend.getScrollOffset();"'
)
),
'operations' => array
(
'edit' => array
(
'label'               => &$GLOBALS['TL_LANG']['tl_guestbook']['edit'],
'href'                => 'act=edit',
'icon'                => 'edit.gif'
),
'delete' => array
(
'label'               => &$GLOBALS['TL_LANG']['tl_guestbook']['delete'],
'href'                => 'act=delete',
'icon'                => 'delete.gif',
'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
),
'toggle' => array
(
'label'               => &$GLOBALS['TL_LANG']['tl_guestbook']['toggle'],
'icon'                => 'invisible.gif',
'attributes'          => 'onclick="Backend.getScrollOffset(); return; AjaxRequest.toggleVisibility(this, %s);"',
'button_callback'     => array('tl_guestbook', 'toggleIcon')
),
'show' => array
(
'label'               => &$GLOBALS['TL_LANG']['tl_guestbook']['show'],
'href'                => 'act=show',
'icon'                => 'show.gif'
)
)
),
/************************************************************************************
*         PALETTES
************************************************************************************/
'palettes' => array
(
'__selector__'                => array('redirect'),
'default'                     => '{author_legend},name,email,icq,website,,msn,skype;{message_legend},titel,message;{date_legend:hide},tstamp,date;{comment_legend:hide},comment;{published_legend},published',
),
/************************************************************************************
*         FIELDS
************************************************************************************/
'fields' => array
(
'name' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['name'],
'exclude'                 => true,
'search'                  => true,
'inputType'               => 'text',
'eval'                    => array('mandatory'=>true, 'maxlength'=>128)
),

'email' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['email'],
'exclude'                 => true,
'inputType'               => 'text',
'eval'                    => array('mandatory'=>true, 'maxlength'=>128, 'rgxp'=>'email', 'decodeEntities'=>true, 'tl_class'=>'w50')
),
'icq' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['icq'],
'exclude'                 => true,
'search'                  => true,
'inputType'               => 'text',
'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50')
),
'msn' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['msn'],
'exclude'                 => true,
'search'                  => true,
'inputType'               => 'text',
'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50')
),
'skype' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['skype'],
'exclude'                 => true,
'search'                  => true,
'inputType'               => 'text',
'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50')
),
'website' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['website'],
'exclude'                 => true,
'search'                  => true,
'inputType'               => 'text',
'eval'                    => array('maxlength'=>128, 'rgxp'=>'url', 'decodeEntities'=>true, 'tl_class'=>'w50')
),
'message' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['message'],
'exclude'                 => true,
'inputType'               => 'textarea',
'eval'                    => array('rte'=>'tinyMCE')
),
'comment' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['comment'],
'exclude'                 => true,
'inputType'               => 'textarea',
'eval'                    => array('rte'=>'tinyMCE')
),

		'date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['date'],
			'default'                 => time(),
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 8,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard')
		),

		'tstamp' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['tstamp'],
			'default'                 => time(),
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 8,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard')
		),

'published' => array
(
'label'                   => &$GLOBALS['TL_LANG']['tl_guestbook']['published'],
'exclude'                 => true,
'filter'                  => true,
'inputType'               => 'checkbox',
'eval'                    => array('doNotCopy'=>true)
)
)
);
class tl_guestbook extends Backend
{
    /************************************************************************************
    *         DATABASE RESULT
    ************************************************************************************/
    protected $arrData = null;
    /************************************************************************************
    *         LIST GUESTBOOK ENTRIES
    ************************************************************************************/
    public function listGbEntries($arrRow)
    {
        if (is_null($this->arrData))
        {
            $objData = $this->Database->execute("SELECT id, name FROM tl_guestbook");
            while ($objData->next())
            {
                $this->arrData[$objData->id] = $objData->name;
            }
        }
        $key = $arrRow['published'] ? 'published' : 'unpublished';
        /************************************************************************************
        *         BACKEND OUTPUT
        ************************************************************************************/
        return '
        <div class="guestbook_wrap">
        <div class="cte_type ' . $key . '"><strong><a href="mailto:' . $arrRow['email'] . '" title="' . specialchars($arrRow['email']) . '">' . $arrRow['name'] . '</a></strong> - ' . $this->parseDate($GLOBALS['TL_CONFIG']['datimFormat'], $arrRow['date']) . ' - IP ' . $arrRow['ip'] . '</div>
        <div class="limit_height mark_links' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h15' : '') . ' block">' . $arrRow['message'] . '</div></div>' . "\n    ";
    }
    /************************************************************************************
    *         TOGGLE PUBLISHED ICON
    ************************************************************************************/
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        if (strlen($this->Input->get('id')))
        {
            $this->toggleVisibility($this->Input->get('id'), ($this->Input->get('state') == 1));
            $this->redirect($this->getReferer());
        }
        $href .= '&id='.$row['id'].'&state='.$row['published'];
        if ($row['published']) { $icon = 'visible.gif'; }
        return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
    }
    /************************************************************************************
    *         TOGGLE PUBLISHED ON DATABASE
    ************************************************************************************/
    public function toggleVisibility($intId, $blnVisible)
    {
        // Update database
        $this->Database->prepare("UPDATE tl_guestbook SET published='" . ($blnVisible ? '' : 1) . "' WHERE id=?")
        ->execute($intId);
    }
}
?>