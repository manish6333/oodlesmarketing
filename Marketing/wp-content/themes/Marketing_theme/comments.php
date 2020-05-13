<?php
/**
 * @package WordPress
 * @subpackage my_framework
 */
// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
  if ( post_password_required() ) { ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
  <h3 class="space" id="comments"><?php comments_number('No Comments', '1 Comments', '% Comments' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

  <ol class="commentlist">
  <?php
  wp_list_comments( array(
   'style'       => 'ol',
   'short_ping'  => true,
   'avatar_size' => 56,
  ) );
  wp_list_comments();
  ?>
  </ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ( comments_open() ) : ?>
    <!-- If comments are open, but there are no comments. -->
    <p class="nocomments">No Comments Yet.</p>

   <?php else : // comments are closed ?>

  <?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
<hr/>
<div id="respond">
<div class="cancel-comment-reply">
  <small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="comment-form" id="commentform">

<h2><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>
<p>Your email address will not be published. Required fields are marked <span class="star">*</span></p>

<?php if ( is_user_logged_in() ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<div class="form-group relative">

    <input placeholder="Name" type="text" class= "author-comment" name="author" id="author"  value="" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
    <span class="star">*</span>
    <p class="author-comment-error error-hide" >Please enter your name</p>

</div>
<div class="form-group relative">
  
    <input placeholder="Email" type="text" class="email" name="email" id="email" value="" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
    <span class="star">*</span>
     <p  class="email-error error-hide" > Please Enter your name</p>
       <p  class="email-error-invalid error-hide"> Please Enter a valid email address</p>

</div>

<?php endif; ?>


<div class="form-group">
<textarea placeholder="Comments" class="form-control custom-comment" name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
<p class="custom-comment-error error-hide" >Please enter your comments here</p>
   <p class="custom-comment-error-invalid error-hide" >Please remove url from text</p>
</div>
<div class="form-group">

</div> 

<br>
<br>
<p>
<input class="btn-secondary" name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>


<script>
jQuery(document).ready(function($){
  $("#submit").click(function(e) {
     $(".author-comment").focusout(function(){
        $(this).css("border-color", "");
         $('.author-comment-error').hide();
    });
      $(".email").focusout(function(){
        $(this).css("border-color", "");
         $('.email-error').hide();
          $('.email-error-invalid').hide();
        
    }); $(".custom-comment").focusout(function(){
        $(this).css("border-color", "");
         $('.custom-comment-error').hide();
    }); 
    $(".g-recaptcha").focusout(function(){
       var newresponse = grecaptcha.getResponse();
       //recaptcha failed validation
       if (newresponse.length == 0) {
            $('#recaptcha-error').hide();      
              }
          });
    
    
    
    
    if ($('.author-comment').val() == '') {
     $('.author-comment').css('border-color', 'red');
      $('.author-comment-error').show();
       $(".author-comment-error").addClass("error-show");
       return false;
    }
else 
{
    $('.author-comment').css('border-color', '');
    $('.author-comment-error').hide();
} function isValidEmail(emailAddress) {
          var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
          return pattern.test(emailAddress);
      }
    var email = $(".email").val(); 
       if ($('.email').val() == '') {
    $('.email').css('border-color', 'red');
       $('.email-error').show();
       $(".email-error").addClass("error-show");
    return false;
    }
else 
{
    $('.email').css('border-color', '');
     $('.email-error').hide();
     <?php if ( !is_user_logged_in()){
?>
     if(isValidEmail(email))
     {
       $('.email').css('border-color', '');
 $('.email-error-invalid').hide();
     }
     else{
          $('.email').css('border-color', 'red');
             $('.email-error-invalid').show();
                $(".email-error-invalid").addClass("error-show");
             return false;
     }
     <?php }?>
}

var customCommentValue = $('.custom-comment').val();
function urlNotAllowed(customCommentValue){
var regexp = /((https?\:\/\/)|(www\.))(\S+)(\w{2,4})(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/g;
         return regexp.test(customCommentValue);
}
if ($('.custom-comment').val() == '') {
     $('.custom-comment').css('border-color', 'red');
     $('.custom-comment-error').show();
      $(".custom-comment-error").addClass("error-show");
      $('.custom-comment-error-invalid ').hide();
       return false;
    }
else 
{
    $('.custom-comment').css('border-color', '');
    $('.custom-comment-error').hide();
      if(urlNotAllowed(customCommentValue))
      {
 $('.custom-comment').css('border-color', 'red');
 $('.custom-comment-error-invalid').show();
   $(".custom-comment-error-invalid").addClass("error-show");
   return false;
      }
      else
      {
  $('.custom-comment').css('border-color', '');
  $('.custom-comment-error-invalid').hide();
      }
}
 var response = grecaptcha.getResponse();
        //recaptcha failed validation
        if (response.length == 0) {
          $('#recaptcha-error').show();
              $('.recaptcha-error').addClass("error-show");
          return false;
        }
          //recaptcha passed validation
        else {
       $('#recaptcha-error').hide();
        }  
  });
  });
</script>
