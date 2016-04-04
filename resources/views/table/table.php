<?php if ($responsive) : ?><div class="table-responsive wabbr-table-responsive"><?php endif; ?>

    <table class="table wabbr wabbr-table <?php echo $class; ?>"><?php echo do_shortcode($content); ?></table>

<?php if ($responsive) : ?></div><?php endif; ?>
