<?php get_header(); ?>
<section id="blog_single_body">
   <div class="single_blog_title_div">
      <div class="container">
         <div>
            <h1 class="single_blog_title_main"><?php echo get_the_title();?></h1>
         </div>
         <div class="single_display_flex_name">
            <h4 class="single_blog_author_main"><?php the_author();?> |</h4>
            <h4 class="single_blog_date_main"><?php echo get_the_date('jS F Y');?></h4>
         </div>
      </div>
   </div>
   </div>
   <div class="single_blog_home_sec1">
      <div class="container ">
         <div class="row">
            <div class="col-md-8">
               <div>
                  <div>
                     <a href ="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" class="banner_image technologies_side_image" width="100%" alt="side_image"></a>
                  </div>
                  <div class="post_blog_icons">
                     <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                        <div class="share_post_blog for_face_book">
                           <em class="fa fa-facebook common_icon_css face_book"></em>
                           <span class="st-label">
                           Facebook</span>
                        </div>
                     </a>
                     <a href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>" target="_blank">
                        <div class="share_post_blog for_twitter">
                           <em class="fa fa-twitter common_icon_css twi_tter"></em>
                           <span class="st-label">
                           twitter</span>
                        </div>
                     </a>
                     <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink();?>" target="_blank">
                        <div class="share_post_blog for_google">
                           <em class="fa fa-linkedin-square common_icon_css goo_gle"></em>
                           <span class="st-label">linkedin</span>
                        </div>
                     </a>
                  </div>
                  <div class="single_blog_content_sec">
                     <p> <?php echo $post->post_content; ?> </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <form class="search-container">
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
                  // }
                  ?>
            </div>
               <?php
                  //for use in the loop, list 5 post titles related to first tag on current post
                  $tags = wp_get_post_tags($post->ID);
                     
                  $first_tag = $tags[0]->term_id;
                  if( !empty( $first_tag ) ) { 
                  $args=array(
                  'tag__in' => array($first_tag),
                  'post__not_in' => array($post->ID),
                  'posts_per_page'=>5
                  );
                  } else {
                 
                  $args=array(
                  'category__in' => wp_get_post_categories($post->ID),
                  'post__not_in' => array($post->ID),
                  'posts_per_page'=>5
                    );
                  }
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
               <?php
                  endwhile;
                  }
                  wp_reset_query();
                  // }
                  ?>
         </div>
      </div>
   </div>
</div>
</section>
<style type="text/css">
#blog_single_body{
	margin: 94px 0px 0px 0px;
}
#blog_single_body img{
	max-width: 100%;
	margin: 25px auto;
	height: auto;
	display: block;
}
#blog_single_body a:hover{
	color: #F36E24;
	text-decoration: none;
}
#blog_single_body p{
	text-align: left;
}
#blog_single_body h1,h2,h3,h4,h5,p,ol,li{
	margin: 20px 0px;
	text-align: left;
}
#blog_single_body h1,h2,h3,h4,h5{
	font-weight: 600;
	color: #000;
}
.related_blog_head{
	font-size: 20px;
	border-bottom: 1px solid #efefef;
	margin-bottom: 25px;
	padding-bottom: 10px;
	font-family: "Open Sans", sans-serif;
}
.single_side_sec_main_box{
	margin-left: 60px;
}
.single_blog_sidemenu_sec{
	margin-bottom: 25px;
	border-bottom: 1px solid #efefef;
	padding-bottom: 25px;
}

.single_blog_title_side_home{
	margin-bottom: 10px;
	font-size: 20px;
	font-weight: 600; 
	font-family: "Open Sans", sans-serif;
}
.single_display_flex_name{
	display: flex;
}

.single_blog_author_side_home{
	margin-right: 6px;
	font-size: 18px;
	font-weight: 300; 
	    font-family: "Open Sans", sans-serif;
}
.single_blog_date_side_home{
font-size: 16px;
font-weight: 300;
margin-top: 2px; 
    font-family: "Open Sans", sans-serif;
}
.single_blog_sidemenu_seclast{
	padding-bottom: 25px;
}
.single_blog_content_sec{ //print_r(wp_get_post_categories($post->ID));
	margin: 0px 0px 50px 0px;
}

.post_blog_icons {
	margin-top: 25px;
    padding-bottom: 20px;
    border-bottom: 0px solid #ced4da;
}
.for_face_book {
    background: #627ebb;
}
.share_post_blog {
    display: inline-block;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}
.common_icon_css {
    padding: 10px;
    color: white;
    border-radius: 3px;
}

.st-label {
    color: #fff;
    font-weight: 600;
    font-size: 11pt;
    padding-left: 5px;
    padding-right: 9px;
}
.face_book {
    background: #3B5998;
}
.for_twitter {
    background-color: #55acee;
}
.twi_tter {
    background: #4d92c7;
}
.goo_gle {
    background: #bb3733;
}
.for_google {
    background-color: #CB2027;
}

.single_blog_title_div{
	background-color: #f8f8f8!important;
	padding: 30px 0px;
	margin-bottom: 50px
}

.single_blog_title_main{
	margin: 0px 20px 0px 0px;
	font-size: 30px;
	font-weight: 500; 
	font-family: "Open Sans", sans-serif;
}
.single_blog_author_main{
	margin: 20px 8px 0px 0px;
	font-size: 16px;
	font-weight: 500; 
	font-family: "Open Sans", sans-serif;
}
.single_blog_date_main{
	margin: 20px 8px 0px 0px;
	font-size: 16px;
	font-weight: 500; 
	font-family: "Open Sans", sans-serif;
}



  @media (min-width: 320px) and (max-width: 780px) {

.single_side_sec_main_box {
    margin-left: 0px;
}
.single_blog_title_side_home {
    margin-bottom: 0px;
    font-size: 18px;
    font-weight: 600;
    font-family: "Open Sans", sans-serif;
    line-height: 28px;
}
.single_blog_sidemenu_sec {
    margin-bottom: 15px;
    border-bottom: 1px solid #efefef;
    padding-bottom: 16px;
}
.single_blog_title_main {
    margin: 0px 20px 0px 0px;
    font-size: 24px;
    font-weight: 500;
    font-family: "Open Sans", sans-serif;
    line-height: 32px;
}
.single_blog_date_main {
    margin: 20px 10px 0px 0px;
    font-size: 20px;
    font-weight: 500;
    font-family: "Open Sans", sans-serif;
}

.single_blog_author_main {
    margin: 20px 8px 0px 0px;
    font-size: 20px;
    font-weight: 500;
    font-family: "Open Sans", sans-serif;
}
.single_blog_title_div {
    margin-bottom: 16px;
}
#blog_single_body {
     margin: 0px 0px 0px 0px; 
}
  }
</style>
<?php get_footer(); ?>