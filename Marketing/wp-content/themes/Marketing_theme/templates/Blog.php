<?php
   /*
   Template Name: Blogs
   */
   ?>
<?php get_header(); ?>
<!-- Body -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe title="googletagmanager" src="https://www.googletagmanager.com/ns.html?id=GTM-PLTDC6D"
   height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<section >
   <div class="banner_blogs iimg">
   <div class="block">
      <h3 class="mb-0">Blogs</h3>
      <h2 class="">Stay updated with our latest digital marketing insights</h2>
   </div>
</section>
<section class="blog_section_full" id="ajax-posts">
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <div class="row">
               <?php
                  $blogsperpage = get_query_var('paged');
                  $postsPerPage = 10;
                  $offset = 0;
                  $args =  array(
                      'post_type' => 'blog',
                      'posts_per_page' =>$postsPerPage,
                      'offset' => $offset,
                      'paged' => $blogsperpage
                  );
                  $loop = new WP_Query($args);
                  $published_posts = wp_count_posts('blog')->publish;
                
                  if ( $loop->have_posts() ) { 
                     while ( $loop->have_posts() ) {
                        $loop->the_post();
                        ?>
               <div class="col-md-6">
                  <div class="blogheadblogs">
                     <a href="<?php the_permalink(); ?>">
                        <div class="zoomblogs">
                           <img style="width: 100%;height: 210px;"
                              src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="">
                        </div>
                        <div class="methdocolorblogs">
                           <h3 class="collaboblogs "><?php the_title();?></h3>
                           <h4><?php echo get_the_date();?></h4>
                           <h4><?php the_author();?></h4>
                           <p><?php echo wp_trim_words( get_the_content(), 20, '...' );?></p>
                        </div>
                     </a>
                  </div>
               </div>
               <?php } wp_reset_postdata(); }?>
            </div>
            <div class="text-center buttonloadmore mb-3 mt-4">
              
               <div class="container_load" id="more_posts" style="text-align: center;display: block; cursor:pointer;">
                  <p class="blogload_more_button" style="display: inline-block;">Load more<span class="load_src">
                     <img alt="" style="width: 20px;" src="<?php echo get_stylesheet_directory_uri(); ?>/image/load.svg"></span><em class="fa fa-spinner fa-spin blog_loading" style="font-size:24px; display: none;"></em></p>
               </div>
               <?php //}?>
            </div>
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
                  <p><?php echo get_the_date();?></p>
               </a>
            </div>
            <?php
               endwhile;
               }
               wp_reset_query();
               ?>
         </div>
      </div>
   </div>
</section>
<?php get_template_part('templates/contact-form','page');?>
<script type='application/ld+json'>{"@context":"https:\/\/schema.org","@type":"WebSite","@id":"#website","url":"https:\/\/oodlesmarketing.com\/","name":"Oodles Marketing","potentialAction":{"@type":"SearchAction","target":"https:\/\/oodlesmarketing.com\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>
</body>
<!-- footer section -->
<?php get_footer(); ?>