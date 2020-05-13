<?php
        /* Template Name: Custom Search */        
        get_header(); ?>             
        <div class="contentarea">
            <div id="content" class="content_right container searchpagemargintop">  
                     <h3 class="mb-5">Search Result for : <?php echo "$s"; ?> </h3>       
                     <div class="row">
                        <div class="col-md-9">
                     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    
                <div id="post-<?php the_ID(); ?>" class="posts">        
                     
                    

                        <div class="col-md-6">
                            <div class="blogheadblogs"><a href="<?php the_permalink(); ?>">
                                <div class="zoomblogs">
                                    <img style="width: 100%;height: 210px;"
                                        src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="">
                                </div>
                                <div class="methdocolorblogs">
                                    <h3 class="collaboblogs "><?php the_title();?></h3>
                                    <h4><?php the_date();?></h4><h4><?php the_author();?></h4>
                                    <p><?php echo wp_trim_words( get_the_content(), 20, '...' );?></p>
                                </div></a>
                            </div>
                        </div> 


                        <div class="col-md-6">

                        </div>

                </div>
        <?php endwhile; ?>
    </div>
    <div class="col-md-3">
                   <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                   <div class="form-group"> <input type="text" name="s" id="search" value="" class="market_search form-control" placeholder="Search..."></div>
                 </form>


                    <h2 class="recent_post_heading">Recent Posts</h2>
 <?php
                  //for use in the loop, list 5 post titles related to first tag on current post
                      $tags = wp_get_post_tags($post->ID);
                   
                      if(count($tags) > 0){
                      $first_tag = $tags[0]->term_id;
                    }
                     
                    if( !empty( $first_tag ) ) { 
                        
                        $args=array(
                          'post_type' => 'blog',
                        'tag__in' => array($first_tag),
                        'post__not_in' => array($post->ID),
                        'posts_per_page'=>5
                        
                        );
                    } else {
                 
                        $args=array(
                          'post_type' => 'blog',
                        'category__in' => wp_get_post_categories($post->ID),
                        'post__not_in' => array($post->ID),
                        'posts_per_page'=>5

                        
                        );
                    }
                       $my_query = new WP_Query($args);
                      if( $my_query->have_posts() ) {
                      while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div href="#" class="recent_post_div">
                        <a href="<?php the_permalink(); ?>">
                         <h3><?php the_title();?></h3>
                         <p><?php the_date();?></p>   
                     </a>
                    </div>

                   
 <?php
                   endwhile;
                   }
                  wp_reset_query();
               
                  ?>

                </div>
            </div>
    <?php endif; ?>
</div>
</div>
    <?php get_footer(); ?>

