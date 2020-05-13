<?php get_header();?>

<section class="service_carousal">
   <div class="container">
      <div class="row">
         <h3 class="relevent_work_h3">You might also be interested in</h3>
      </div>
      <div id="carousel_service_page" class="owl-carousel mt-5 mb-5 mobile_carousal_margin">
         <?php
            //for use in the loop, list 5 post titles related to first tag on current post
                $tags = wp_get_post_tags($post->ID);
              
                $first_tag = $tags[0]->term_id;
               
              if( !empty( $first_tag ) ) { 
                  
                  $args=array(
                  'tag__in' => array($first_tag),
                  'post__not_in' => array($post->ID),
                  'posts_per_page'=>-1,
                  'post_type' => 'relevant_work'
                  
                  );
              } else {
              
                  $args=array(
                  'category__in' => wp_get_post_categories($post->ID),
                  'post__not_in' => array($post->ID),
                  'posts_per_page'=>-1,
                  'post_type' => 'relevant_work'
                  
                  );
              }
                 $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) {
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
         <div class="item item_cursor" href="">
            <h3 class="service_carausal_h3" target="blank"><a class="service_carausal_h3" href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
            <p class="service_carausal_p" target="blank"><a class="service_carausal_p" href="<?php the_permalink() ?>"><?php echo wp_trim_words( get_the_content(), 40, '...' );?></a></p>
         </div>
         <?php
            endwhile;
            }
            wp_reset_query();
            // }
            ?>
      </div>
   </div>
</section>