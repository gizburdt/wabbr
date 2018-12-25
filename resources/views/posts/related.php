<?php if ($posts->have_posts()) : ?>
    <div class="wabbr wabbr-related-posts <?php echo $class; ?>">
        <?php while ($posts->have_posts()) : $posts->the_post(); ?>

            <div class="<?php echo implode(' ', get_post_class('wabbr-post')); ?>">
                <?php if ($show_thumbnail) : ?>
                    <a href="<?php echo get_permalink(); ?>" title="<?php echo the_title_attribute(['echo' => false]); ?>" class="wabbr-post-link"><?php echo get_the_post_thumbnail(get_the_ID(), $thumbnail_size, ['class' => 'wabbr-post-img '.$thumbnail_class]); ?></a>
                <?php endif; ?>

                <a href="<?php echo get_permalink(); ?>" title="<?php echo the_title_attribute(['echo' => false]); ?>" class="wabbr-post-link"><?php echo get_the_title(); ?></a>
            </div>

        <?php endwhile; ?>
    </div>
<?php endif; ?>
