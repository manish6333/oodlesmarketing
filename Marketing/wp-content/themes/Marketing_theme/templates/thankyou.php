<?php
   /*
     Template Name: Thank You
    */
   if( !empty( $_COOKIE['access_thankyou'] ) ){
       $all_ids = explode( ',', $_COOKIE['access_thankyou'] );
     
       if( in_array($_GET['id'], $all_ids) ){
   
   get_header();
    ?>
<script>
   fbq('track', 'Lead');
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe title="googletagmanager" src="https://www.googletagmanager.com/ns.html?id=GTM-PLTDC6D"
   height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<section class="thankyou-page sctn">
   <div class="thank-you-icon">
      <img src="<?php echo get_stylesheet_directory_uri();?>/image/checked-symbol.svg" alt="checked symbol blockchian solutions">
   </div>
   <div class="thank-you-bold">
      Thank You For Getting In Touch!
   </div>
   <div class="thank-you-thin">
      Our experts will reach you out soon.
   </div>
</section>
<?php 
   } else {
       wp_redirect( home_url() );
       }
   } else {
     wp_redirect( home_url() );
     }
get_footer(); ?>
