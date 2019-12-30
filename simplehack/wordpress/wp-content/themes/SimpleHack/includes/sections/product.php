<?php
$params = array('posts_per_page' => 3, 'post_type' => 'product');
$wc_query = new WP_Query($params);

echo '<section class="s-box">';
echo '<div class="g-container g-col">';
echo '<div class="list clearfix">';

 if ($wc_query->have_posts()) : while ($wc_query->have_posts()) : $wc_query->the_post(); 
    echo '<div class="item g-col g-33 has-btn">';
        echo '<div class="inner">';
            echo '<div class="image-wrapper">';
              ?>
               <img src=" <?php the_post_thumbnail_url();  ?>" alt="" class="image-square">
               <?php 
            ?>
           
            <?php
        echo '</div>'; 
          echo '<div class="wysiwyg ">'; ?>
            <h4><?php the_title();?></h4>
            <p><?php the_excerpt();?></p>
          <?php echo '</div>';
                echo '<div class="btn">';
          ?>

          <a href=" <?php the_permalink(); ?>" >Check it out</a>
          <?php
      echo '</div>';
     echo '</div>';    
    echo '</div>';     
    endwhile; 
    echo '</div>';
    echo '</div>';
    echo '</section>'; 
wp_reset_postdata(); endif; 