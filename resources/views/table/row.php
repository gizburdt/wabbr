<tr class="wabbr wabbr-table-row <?php echo $class; ?>">
    <?php foreach($data as $cell) : ?>
        <?php echo do_shortcode('[table-cell]'.$cell.'[/table-cell]'); ?>
    <?php endforeach; ?>
</tr>
