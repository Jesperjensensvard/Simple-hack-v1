<?php
get_header(); ?>

<section class="s-404">
    <div class="g-container g-colx2 text-container">
        <div class="wysiwyg">
            <?php echo get_field('theme_setting_error_page_content', 'options'); ?>
        </div>
    </div>
</section>

<?php get_footer();
?>
