<?php
get_header(); ?>

<section class="s-404">
    <div class="g-container g-colx2 text-container">
        <div class="wysiwyg">
            <?php echo get_field('theme_setting_error_page_content', 'options'); ?>
            <a class="retun-home-404" href="<?php echo home_url();  ?>"> Take Me to Home page</a>
           
        </div>
    </div>
</section>

<?php get_footer();
?>
