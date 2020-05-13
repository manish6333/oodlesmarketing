<?php
   /* 
    *single default template file
    */
   get_header();
   ?>
<div class="blog-section">
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-sm-8 col-xs-12 pl0">
            <?php 
               if(have_posts()):
               ?> 
            <?php
               while(have_posts()): the_post();
               $postid = get_the_ID();
               ?>                
            <ul class="blog-list">
               <li>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <div class="clearfix"></div>
                  <ul class="publish">
                     <li><a href="<?php the_permalink(); ?>"><em class="glyphicon glyphicon-calendar"></em><?php echo get_the_date("F d, Y",$postid );?></a></li>
                     <li>
                            <span id="category" style="display: none;"><?php the_terms( $postid, 'relevant_work_category', '', ", ", '' ); ?></span>


                            <a href="<?php echo get_comments_link( $postid ); ?>"><em class="glyphicon glyphicon-comment"></em>
                            <?php comments_number( 'Leave a Comment', '1 comment', '% comment' ); ?>
                              </a>
                     </li>
                     <li>
                        <span id="category" style="display: none;"><?php the_terms( $postid, 'relevant_work_category', '', ", ", '' ); ?></span>
                       
                     </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="sharethis-inline-share-buttons market-single-blog"></div>
               </li>
            </ul>
            <div class="clearfix"></div>
            <div class="content-text content-box">
               <?php $blogContent = the_content(); 
                  $url = str_replace("http://", "https://", $blogContent);
                  echo $url;
                  ?>
            </div>
            <?php endwhile; ?>    
            <?php endif; ?>
          
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12 pr0">
            <div class="sidebar">
               <div class="sidebar-box widget_search" id="search-2">
                  <form method="GET" action = "<?php bloginfo('url'); ?>/">
                     <input type="text" name="s" value="" placeholder="Search">
                  </form>
               </div>
               <div class="clearfix"></div>
               <div class="relevent_work">
                  <ul class="list-group" id="relevant">
                     <?php
                        $cate=$_SESSION["category"] ;  
                        $args = array( 'post_type' => 'relevant_work',
                        'numberposts' => 25, // Number of recent posts thumbnails to display
                        'post_status' => 'publish',
                        'relevant_work_category' => $cate);
                        $recent_posts = wp_get_recent_posts( $args );
                        if($recent_posts)
                        {
                        ?>
                     <h2>Relevant Work</h2>
                     <div class="scrollbar relev-scroll-list" id="style-5">
                        <?php
                           foreach( $recent_posts as $recent ){
                               ?>
                        <li class="list-group-item relevantwork">
                           <a href="<?php echo get_permalink($recent['ID']); ?>" title="<?php echo esc_attr($recent['post_title']); ?>'"><?php echo $recent["post_title"]; ?></a>
                        </li>
                        <?php
                           }
                            }?>
                     </div>
                  </ul>
               </div>
               <div class="clearfix"></div>
                     <!-- <div class="sidebar-box widget_recent_entries" id="recent-posts-2">
                           <h5 class="widget-heading">Recent Posts</h5>

                     <div class="latest_blog">
                           <?php get_template_part('content','recentpost'); ?>
                     
                        </div>
                     </div>   -->
            </div>
         </div>
      </div>
   </div>
</div>
<!--footer start-->
<?php get_footer(); ?>