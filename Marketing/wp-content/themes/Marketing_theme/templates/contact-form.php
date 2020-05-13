<?php get_header(); 
 $host = $_SERVER['HTTP_HOST'];
   
 if($host=='localhost'){
     $re_captcha_publics = '6LfgZp0UAAAAAJrHkxb6uEGTP9gBvVguYRTKMcze';
 }elseif($host=='marketing2.oodleslab.com'){
     $re_captcha_publics = '6Lcjo50UAAAAACAz55CmP-Ot4M-Z9mHx1SB49BU_';
 }else{
     $re_captcha_publics = '6LfdzJ0UAAAAAGwZl3kEzNFtRrK7CDDw673vY-XY';
 }
?>
<section class="contact-us-home" id="contact-us">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="main-contact-form" id="main-contact-form">
               <div class="form-title line_lft">
                  <h3>You Have A Vision. We Have A Team To Accomplish It.</h3>
               </div>
               <div class="form-title_second line_lft">
                  <h3>Let’s Work Together!</h3>
               </div>
               <div class="main-form-area">
               <form  id="contactUsFormfooter" method="POST" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" name="username" id="username" class="user form-control contct-input-text  mobile_contact" placeholder="Name*">
                        <span class="name_error  error_text" > </span>
                        <span class="name-required-field error_text error-msg"></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="tel" name="user_phone_footer" id="user_phone_footer" class="form-control key_up_remove_error blc-input-text" placeholder="Phone Number" required="true">
                        <span class="phone_error  error_text" style="display:none"> </span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="email" placeholder="Email*" id="emailid" class="emailid form-control key_up_remove_error" name="emailid" value="" size="22" >
                        <span class="email_error  error_text" style="color: red;float: left;display:none"> </span>
                        <span class="email-require  error_text email-required-field error-hide"style="display:none">Email is required</span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <select class="form-control mobile_contact" id="quotes" name="quotes">
                           <option value="Request a quote" selected="">Request a quote</option>
                           <option value="Request for  proposal">Request for  proposal</option>
                           <option value="General Query">General Query</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <textarea name="usercomment" row="10" column="100" id="usercomment" class="form-control mobile_contact blc-textarea" placeholder="Message" cols="30" rows="10"></textarea>
                     </div>
                  </div>
               </div>
               <input type="text" name="previous_url" id="previous_url" class="form-control" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="display: none;">
               <input type="text" name="current_url" id="current_url" class="form-control" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" style="display: none;">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group attach">
                        <div class="attcment_icon">
                           <div class="row attachment-part">
                              <div class="col-md-12 files_list">
                                 <div class="attach">
                                    <label for="attachmentFile" style="font-weight: 500;cursor:pointer">
                                    <i class="fa fa-paperclip fa-lg open_uploader" aria-hidden="true"></i> 
                                    <span id="attchment_text" class="open_uploader">
                                    Attach Files
                                    </span>	</label>
                                    <input type="file" name="attachmentFile" id="attachmentFile" multiple="" class="form-control chooes_button attachment_File" style="display: none !important;">														
                                 </div>
                              </div>
                              <div class="file_error  error_text1">
                           <span class="file_max_size_error">  </span>
                           <span class="file_total_limit_error">  </span>
                        </div>
                           </div>
                        </div>
                       
                     </div>
                  </div>
                  <div class="col-md-6 custom_captcha form-group custom_captcha" style="display: inline-block;width: 100%;">
                     <div class="g-recaptcha recaptcha_customcss" data-sitekey="<?php echo $re_captcha_publics; ?>"></div>
                  </div>
                  <div class="col-md-12 text-right">
                     <div class="captcha-verification" style="color: red;padding-bottom: 15px;"></div>
                  </div>
               </div>
               <div class="row submit_btn">
                 <div class="custom_float" style="float: right; ">
                    <div class="col-md-12"><div class="form-submit">
                        <span id="sending_message" name="sending_message" style="color:#337ab7;display:none">Sending message..</span>
                        <button type="submit" id="submit_info" name="submit_info" class="expert-talk-btn animated-btn custom_cont_button" >Submit</button>
                        <span id="submit-error" style="display: none;" class="error_text">Error in sending email</span>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
          </div>
        </form>
      </div>
     </div>
    </div>
  </div>
</div>
</section>