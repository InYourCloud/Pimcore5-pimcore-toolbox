<?php if ($this->editmode) { ?>
    <?= \Toolbox\Tool\ElementBuilder::buildElementConfig('headline', $this) ?>
<?php } ?>
<div class="toolbox-element toolbox-headline <?= $this->select('headlineAdditionalClasses')->getData(); ?>">
    <?php if (!$this->input('anchorName')->isEmpty()) { ?><a id="<?= \Pimcore\File::getValidFilename($this->input('anchorName')->getData()) ?>"></a><?php } ?>
    <?= $this->template('toolbox/headline.php') ?>
</div>