<!-- indexer::stop -->

<?php if ($this->bbcode) : ?>
<script type="text/javascript" src="plugins/tinyMCE/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	theme : "advanced",
	mode : "textareas",
	plugins : "emotions,bbcode",
	theme_advanced_buttons1 : "bold,italic,underline,emotions,undo,redo",
	theme_advanced_buttons2 : "",
	theme_advanced_buttons3 : "",
	entity_encoding : "raw",
        	add_unload_trigger : false,
        	remove_linebreaks : false,
});
</script>
<?php endif; ?>

<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
	<?php if ($this->headline): ?>
		<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
	<?php endif; ?>
	<?php if (!$this->protected): ?>
	<div class="form" id="guestbookform">
	<?php if ($this->confirm): ?>
		<p class="confirm"><?php echo $this->confirm; ?></p>
	<?php else: ?>
	<form action="<?php echo $this->action; ?>" method="post">
	<div class="formbody">
		<input type="hidden" name="FORM_SUBMIT" value="tl_guestbook" />
<input type="hidden" name="REQUEST_TOKEN" value="{{request_token}}" />

		<?php echo $this->messages; ?> 
		<fieldset><legend><?php echo $GLOBALS['TL_LANG']['GUESTBOOK']['gb_fieldsetname']; ?></legend>
		<?php foreach ($this->fields as $objWidget): ?>
			<?php if ($objWidget instanceof FormCaptcha) echo "</fieldset>\n\n<fieldset><legend>". $GLOBALS['TL_LANG']['GUESTBOOK']['gb_fieldsetcaptcha']."</legend>".$GLOBALS['TL_LANG']['GUESTBOOK']['gb_captchahelp']; ?>
			<div class="gb-widget"><?php echo $objWidget->generateLabel(); ?> <?php echo $objWidget->generateWithError(); ?> <?php if ($objWidget instanceof FormCaptcha) echo $objWidget->generateQuestion(); ?></div>
			<?php if ($objWidget instanceof FormCaptcha) echo "</fieldset>"; ?>
		<?php endforeach; ?>

	<div class="submit_container">
  		<input type="submit" class="submit" value="<?php echo $this->submit; ?>" />
	</div>
	</div>
	</form>
<?php if (!$this->gb_disableNotice): ?>

	<div id="notice">
		<?php echo $GLOBALS['TL_LANG']['GUESTBOOK']['gb_forminfo']; ?>
		<?php echo $GLOBALS['TL_LANG']['GUESTBOOK']['gb_fieldsetcaptchahelp']; ?> <strong><?php echo $this->Environment->ip; ?></strong>.<br />
		<?php if ($this->moderate) : ?>
			<?php echo $GLOBALS['TL_LANG']['GUESTBOOK']['gb_fieldmoderate']; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>

	<?php endif; ?>
	</div>
	<?php endif; ?>

</div>



<!-- indexer::continue -->

