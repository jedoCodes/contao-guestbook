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
class GuestBook extends Module
{
    /** * Template * @var string */
    protected $strTemplate = 'mod_guestbook';
    /** * Display a wildcard in the back end * @return string */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### GUESTBOOK ENTRIES ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'typolight/main.php?do=modules&act=edit&id=' . $this->id;
            return $objTemplate->parse();
        }
        return parent::generate();
    }
    /** * Generate module */
 protected function compile()
    {
        $limit = null;
        $arrComments = array();
        // Pagination
if ($this->gb_perPage > 0)
        {
            $page = $this->Input->get('page') ? $this->Input->get('page') : 1;
            $limit = $this->gb_perPage;
            $offset = ($page - 1) * $this->gb_perPage;
            // Get total number of comments
            $objTotal = $this->Database->prepare("SELECT COUNT(*) AS count FROM tl_guestbook" . (!BE_USER_LOGGED_IN ? " WHERE published=1" : "")) ->execute($this->id);
            // Add pagination menu
            $objPagination = new Pagination($objTotal->count, $this->gb_perPage);
            $this->Template->pagination = $objPagination->generate("\n ");
        }
        // Get all published comments
        $gbEntriesStmt = $this->Database->prepare("SELECT * FROM tl_guestbook" . (!BE_USER_LOGGED_IN ? " WHERE published=1" : "") . " ORDER BY date" . (($this->gb_order == 'descending') ? " DESC" : ""));
        if ($limit)
        {
            $gbEntriesStmt->limit($limit, $offset);
        }
        $gbEntries = $gbEntriesStmt->execute($this->id);

        $total = $gbEntries->numRows;
        if ($total > 0)
        {
            $count = 0;
            $objTemplate = new FrontendTemplate($this->gb_template);
            while ($gbEntries->next())
            {

 if ($this->gb_avatar == 'gravatar')
{
	$gravatar_default =  $this->Environment->base."system/modules/guestbook/html/gravatar_big.jpg";
	$gravatar_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5($gbEntries->email) . "&default=" . $gravatar_default . "&size=" . $this->gb_avatarsize . "";

	$avatar =  '<img class="gravatar" src="' . $gravatar_url . '" alt="Gravatar of ' . $gbEntries->name . '" /><br />';
} else {
	$q = $this->Database->prepare("select avatar from tl_member where email='$gbEntries->email'")
			->execute($this->id);
	if($q->avatar) {
	$avatar = '<img class="gravatar" src="' . $q->avatar . '" alt="Avatar of ' . $gbEntries->name . '"  height="' . $this->gb_avatarsize . '" width="' . $this->gb_avatarsize . '" /><br />';
	} else {
	$gravatar_default =  $this->Environment->base."system/modules/guestbook/html/gravatar_big.jpg";
	$avatar = '<img class="gravatar" src="' . $gravatar_default . '" alt="Gravatar of ' . $gbEntries->name . '" height="' . $this->gb_avatarsize . '" width="' . $this->gb_avatarsize . '" /><br />';
	}
}

	$objTemplate->avatarsize = $this->gb_avatarsize;
                $objTemplate->avatar = $avatar;
                $objTemplate->name = $gbEntries->name;
                $objTemplate->email = $gbEntries->email;
                $objTemplate->website = $gbEntries->website;
                $objTemplate->message = trim($gbEntries->message);
                $objTemplate->comment = trim($gbEntries->comment);
                $objTemplate->skype = $gbEntries->skype;
                $objTemplate->icq = $gbEntries->icq;
                $objTemplate->msn = $gbEntries->msn;
                $objTemplate->datim = $this->parseDate($GLOBALS['TL_CONFIG']['datimFormat'], $gbEntries->tstamp);
                $objTemplate->date = $this->parseDate("d. M Y", $gbEntries->date);
                $objTemplate->class = (($count < 1) ? ' first' : '') . (($count >= ($total - 1)) ? ' last' : '') . (($count % 2 == 0) ? ' even' : ' odd');
                $objTemplate->id = 'c' . $gbEntries->id;
                $objTemplate->ip = $gbEntries->ip;
                $objTemplate->timestamp = $gbEntries->date;
                $arrComments[] = $objTemplate->parse();
                ++$count;
            }
        }
        $this->Template->comments = $arrComments;
    }
}
?>