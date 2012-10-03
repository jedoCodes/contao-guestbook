<!-- indexer::stop -->
<div class="gb-entry clearfix <?php echo $this->class; ?>" id="<?php echo $this->id; ?>">
<div class="author_gravatar" style="width:<?php echo $this->avatarsize+20; ?>px;">
<?php
	echo '<span class="entry_date">' . $this->date . '</span>';		

?>
<?php echo $this->avatar; ?>
<div style="clear: both;"></div>
<?php
if( $this -> website ) {
	echo '<span><a href="'. $this->website .'" onclick="window.open(this.href); return false;"><img src="system/modules/guestbook/html/icons/con_homepage.png" style="border: none;" alt="Homepage" /></a></span>';

}

if( $this -> skype ) {
	echo '<img src="system/modules/guestbook/html/icons/con_skype.png" alt="'. $this->skype .'" title="Skype: '. $this->skype .'" style="border: none;" />';
}

if( $this -> icq ) {
	echo '<img src="system/modules/guestbook/html/icons/con_icq.png" alt="'. $this->icq .'" title="ICQ: '. $this->icq .'" style="border: none;" />';
}

if( $this -> msn ) {
	echo '<img src="system/modules/guestbook/html/icons/con_msn.png" alt="'. $this->msn .'" title="MSN: '. $this->msn .'" style="border: none;" />';
}
?>

</div>

<div class="author_entry"><h3 class="author-name"><?php echo $this->name; ?></h3>
<div class="entry-content">

	<?php echo $this->message; ?>

</div>

<?php if ($this->comment): ?>

<div class="admin-entry">

	<fieldset><legend><?php echo $GLOBALS['TL_LANG']['tl_guestbook']['comment']; ?></legend>

	 <?php echo $this->comment; ?>

	</fieldset>

</div>

<?php endif; ?>

</div>

<div style="clear: both"></div>

</div>



<!-- indexer::continue -->