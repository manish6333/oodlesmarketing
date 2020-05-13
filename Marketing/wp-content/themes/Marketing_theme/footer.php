<?php
   /**
    * The template for displaying the footer
    *
    * Contains the closing of the #content div and all content after.
    *
    * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
    *
    * @package WordPress
    * @subpackage Twenty_Nineteen
    * @since 1.0.0
    */
   
   ?>
<!-- cookies start -->
<div class="alert alert-warning alert-dismissible show alert_background_coockies" role="alert" style="display: none;">
   <div class="row">
      <div class="col-md-10 col-xs-12">
         <p class="coockies_content">
            Cookies are important to the proper functioning of a site. To improve your experience, we use cookies to remember log-in details and provide secure log-in, collect statistics to optimize site functionality, and deliver content tailored to your interests.
            Click Agree and Proceed to accept cookies and go directly to the site or click on <a href="https://www.oodlestechnologies.com/privacy-policy/" target="_blank" >View Cookie</a> Settings to see detailed descriptions of the types of cookies and choose whether to accept certain cookies while on the site.
         </p>
      </div>
      <div class="col-md-2 coockies_agree">
         <button type="button" name="coockies" value="Submit" id="cokkies-submit" class="btn coockies_btn buttons" style="background: #2f83c5;color: white;">Ok</button>
      </div>
   </div>
</div>
<!-- cookies end  -->
<footer style="background-color: #f1f1f1;" class="">
   <div class="container footermargin">
      <div class="row m-0">
         <div class="col-sm-3 col-md-4">
            <span class=" holisticmargin" href="">
            <img src="<?php echo get_stylesheet_directory_uri();?>/image/holistic log.svg" alt="E-commerce Oodles technologies marketing studios services">
            </span>
            <div class="row">
               <h4 class="follow_us_footer">
                  <span>Follow us</span>
                  <div class="social_icon_on">
                     <div class="socialIconHover"> 
                        <a target="blank" href="https://www.facebook.com/oodlesmarketing/"> 
                        <img class="grayscale" src="<?php echo get_stylesheet_directory_uri();?>/image/icon-facebook-.svg" alt="Facebook" class="a_Hover"> 
                        </a>
                     </div>
                     <div class="socialIconHover">
                        <a target="blank" href="https://twitter.com/OodlesMarketing" target="_blank"> 
                        <img class="grayscale" src="<?php echo get_stylesheet_directory_uri();?>/image/icon-twitter.svg" alt="twitter" class="a_Hover"> 
                        </a>
                     </div>
                     <div class="socialIconHover"> 
                        <a href="https://www.linkedin.com/company/oodlesmarketing/" target="_blank"> 
                        <img class="grayscale" src="<?php echo get_stylesheet_directory_uri();?>/image/icon-LinkedIn-.svg" alt="Linkedin" class="a_Hover"> 
                        </a>
                     </div>
                     <div class="socialIconHoverWithoutHover"> 
                        <a href="https://wa.me/919667991503" class="img_whatsapp" target="_blank" title="WhatsApp"> 
                        <img src="<?php echo get_stylesheet_directory_uri();?>/image/icon-whatsapp-.svg" alt="whatsapp" class=""> 
                        </a> 
                        <a href="skype:gauravjain.oodles?chat" target="_blank" class="img_skype" title="Skype"> 
                        <img src="<?php echo get_stylesheet_directory_uri();?>/image/icon-Skype-.svg" alt="Skype" class=""> 
                        </a> 
                        <a target="blank"href="https://telegram.me/Gaurav_oodles"> 
                        <img src="<?php echo get_stylesheet_directory_uri();?>/image/icon-telegram-.svg"alt="Telegram" class=""> 
                        </a>
                     </div>
                  </div>
               </h4>
            </div>
         </div>
         <div class="col-md-8">
            <div class="row">
               <div class="col-sm-3 col-md-3">
               <?php dynamic_sidebar( 'sidebar-1' ); ?> 
               </div>
               <div class="col-sm-3 col-md-3  footer_service">
               <?php dynamic_sidebar( 'sidebar-2' ); ?> 
               </div>
               <div class="col-sm-2 col-md-3  footer_company">
               <?php dynamic_sidebar( 'sidebar-3' ); ?> 
               </div>
               <div class="col-sm-2 col-md-3   footer_company">
               <?php dynamic_sidebar( 'sidebar-4' ); ?> 
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <section class="copywrite_sec">
      <h3>Copyright © <?php  $firstYear = '2016';$lastYear = (int)date('Y'); echo $firstYear."-".$lastYear; ?> <a href="https://www.oodlestechnologies.com/" target="_blank">Oodles Technologies</a>. All rights reserved.</h3>
   </section>
   <script type="application/ld+json">
   {
     "@context": "https://schema.org",
     "@type": "Organization",
     "name": "Oodles Marketing",
     "url": "https://www.oodlesmarketing.com/",
     "sameAs": [
       "https://www.facebook.com/oodlesmarketing/",
       "https://twitter.com/OodlesMarketing",
       "https://www.linkedin.com/company/oodlesmarketing"
     
     ]
   }
</script>
</footer>
<?php wp_footer(); ?>
</body>
</html>