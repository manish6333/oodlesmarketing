/* Javascript */
/* Nav bar js */
(function($) { "use strict";
	// $(function() {
	// 	var header = $(".start-style");
	// 	$(window).scroll(function() {    
	// 		var scroll = $(window).scrollTop();
		
	// 		if (scroll >= 10) {
	// 			header.removeClass('start-style').addClass("scroll-on");
	// 		} else {
	// 			header.removeClass("scroll-on").addClass('start-style');
	// 		}
	// 	});
	// });		
		
	//Animation
	
	$(document).ready(function() {
		$('body.hero-anime').removeClass('hero-anime');
	});

	//Menu On Hover	
	$('body').on('mouseenter mouseleave','.nav-item',function(e){
        var _d=$(e.target).closest('.nav-item');_d.addClass('show');
				setTimeout(function(){
				_d[_d.is(':hover')?'addClass':'removeClass']('show');
				},1);	
	});	
	
	//Switch light/dark
	$("#switch").on('click', function () {
		if ($("body").hasClass("dark")) {
			$("body").removeClass("dark");
			$("#switch").removeClass("switched");
		}
		else {
			$("body").addClass("dark");
			$("#switch").addClass("switched");
		}
	});  



	jQuery("#carousel").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 1
    },

    600: {
      items: 3
    },

    1024: {
      items: 5
    },

    1366: {
      items: 5
    }
  }
});



jQuery("#carousel_service_page").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 1,
      dots:true
    },

    600: {
      items: 3
    },

    1024: {
      items: 3
    },

    1366: {
      items: 3
    }
  }
});



jQuery("#carousel_testemonial").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 1
    },

    600: {
      items: 1
    },

    1024: {
      items: 1
    },

    1366: {
      items: 1
    }
  }
});
// Service carousel
$("#check_user_phone_footer").on("keyup", function() {
        var phone_value = $(this).val().replace(/[^+\d]/g, '');
        $(this).val(phone_value);
    });
	})(jQuery); 
	// nav bar js end
	(function($) {
									var location = window.location.pathname;
									if(location.includes('/blog')) {
										$('#menu-item-blog').addClass('active');
									} else if(location.includes('/contact-us')) {
										$('#menu-item-contact').addClass('active');
									} else if(location.includes('/seo-services') || location.includes('/social-media') || location.includes('/ad-campaigns') || location.includes('/content-marketing') || location.includes('/app-store-optimisation') || location.includes('/amazon-marketing')) {
										$('#menu-item-services').addClass('active');
										if(location.includes('/seo-services')) {
											$('#sub-menu-1').addClass('active');
										}
										if(location.includes('/social-media')) {
											$('#sub-menu-2').addClass('active');
										}
										if(location.includes('/ad-campaigns')) {
											$('#sub-menu-3').addClass('active');
										}
										if(location.includes('/content-marketing')) {
											$('#sub-menu-4').addClass('active');
										}
										if(location.includes('/app-store-optimisation')) {
											$('#sub-menu-5').addClass('active');
										}
										if(location.includes('/amazon-marketing')) {
											$('#sub-menu-6').addClass('active');
										}
									} else {
										$('#menu-item-about').addClass('active');
									}
								})(jQuery);
	// email funtionality or js
		function goToByScroll(id) {
      $('html,body').animate({
          scrollTop: $("#" + id).offset().top
      }, 'slow');
    }
  //    // contact form validations and mailing funtions
  //     function validateEmail(email) {
  //       var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  //       return re.test(email);
  //   }
  //   function create_cookie() {
  //       var max = 999999999,
  //           min = 11111;
  //       var rand_num = Math.random() * (+max - +min) + +min;
  //       previous_contact_submit = jQuery.parseJSON(localStorage.getItem('contact_submit_history')) || [];
  //       previous_contact_submit.push(rand_num);
  //       var itemforcache = localStorage.setItem('contact_submit_history', JSON.stringify(previous_contact_submit));
  //       var now = new Date();
  //       var time = now.getTime();
  //       time += 3600 * 1000;
  //       now.setTime(time);
  //       document.cookie = 'access_thankyou=' + previous_contact_submit + '; path=/';
  //       return rand_num;
  //   }

  //   $(".open_uploader").on("click", function() {
  //       $('#attachmentFile').trigger('click');
  //   });

  //   $("input#attachmentFile").on('change', function(fileEv) {
  //       console.log( fileEv );
  //       $("#attchment_text").text( fileEv.target.files[0].name );
  //   });

  //   $('#contactUsForm').on('submit', function(ContSubEvt){
  //   ContSubEvt.preventDefault();
  //   var stat_error = 0;
  //   var $name = $(this).find("input#check_user_name_footer").val();
  //   var $contact_no = $(this).find("input#check_user_phone_footer").val();
  //   var $email = $(this).find("input#user_email");
  //   var $quotes = $(this).find("select#quotes option:selected").text();
  //   var $user_query = $(this).find("#check_user_query_footer").val();
  //   var $attachmentFileField = $(this).find("input#attachmentFile");

  //   var $attachmentFile = $attachmentFileField[0].files;
  //   var fileTotalSize = 0;
  //   var _formSubmitBtn = $(".custom_cont_button");
  //   if( validateEmail( $email.val() ) ){
  //     $($email).removeClass('required_error');
  //     $('.email_error').hide();
  //     $('.email_error').html("");
  //   } else {
  //     stat_error = 1;
  //     $($email).addClass('required_error');
  //     $('.email_error').show();
  //     $('.email_error').html("Please enter a valid email");
  //   }
  //    var recapta = jQuery('#g-recaptcha-response').val().trim();
  //   if( recapta == '' ){
  //       jQuery('.error-recap').show();
  //       stat_error = 1;
  //   } else {
  //       jQuery('.error-recap').hide();
  //   }
  //   contactFieldsData = {
  //     'user_name'       : $name,
  //     'user_phone'      : $contact_no,
  //     'user_email'      : $email.val(),
  //     'quotes_'         : $('#quotes_').val(),
  //     'user_query'      : $user_query,
  //   };
  //   if( $('.input_career_mail').length ){
  //     var career_mail = $('.input_career_mail').attr('value');
  //   } else {
  //     var career_mail = 0;
  //   }
  //   if( stat_error == 1 ){
  //     return false;
  //   } else {
  //     filesObject =new FormData();
  //     filesObject.append('fields', JSON.stringify(contactFieldsData));
  //     filesObject.append('previous_url', document.referrer );
  //     filesObject.append('current_url', window.location.href );
  //     filesObject.append('all_history', localStorage.getItem('location_history') );
  //     filesObject.append('g-recaptcha-response', recapta ); 
  //     filesObject.append('files', $attachmentFile);
  //     filesObject.append('action', 'custom_conatct_us_submit');    
  //     filesObject.append('career_mail', career_mail);
  //     $.each($attachmentFile, function(i, v){
  //       filesObject.append(i, v);
  //     });
  //     // $.each(FinalFiles, function(i, v){
  //     //   filesObject.append(i, v);
  //     // });
  //   }
  //   $.ajax({
  //     url : admin_ajax,
  //     type: 'POST',
  //     data: filesObject,
  //     processData: false,
  //     beforeSend: function(){
  //       _formSubmitBtn.attr("disabled", "disabled");
  //       _formSubmitBtn.append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
  //     },
  //     contentType: false,
  //     success: function( res ){
  //       var should_return = false;
  //       if( res.errors != '' ){
  //         $.each(res.errors, function(i, v){
  //           $("#"+i).addClass('required_error');
  //           should_return = true;
  //         });
  //       }
  //         // Show Success msg
  //         var rand_number = create_cookie();
  //         window.location.href=  site_url+"/thankyou?id="+rand_number;
  //     }, 
  //     error: function(xhr){
  //     },
  //     complete: function(){
  //       _formSubmitBtn.removeAttr("disabled", "disabled");
  //       _formSubmitBtn.find('i').remove();
        
  //       $("body #contactUsForm")[0].reset();
  //       FinalFiles = [];
  //       $(".files_list").html("");
  //       $("#attchment_text").text('Attach files');
  //     }
  //   });
  //   return false;
  // });
/**
     * @author : Aparajita Singh
     * @description : Thanku page generate unique id using cookies
     */ 
    function create_cookie(){
      var max = 999999999,
      min = 11111;
      var rand_num = Math.random() * (+max - +min) + +min;
      previous_contact_submit = jQuery.parseJSON( localStorage.getItem('contact_submit_history') ) || [];
      
      previous_contact_submit.push( rand_num );
      
      var itemforcache = localStorage.setItem('contact_submit_history', JSON.stringify( previous_contact_submit ));
      
      var now = new Date();
      var time = now.getTime();
      time += 3600 * 1000;
      now.setTime(time);
      document.cookie = 'access_thankyou='+previous_contact_submit+'; path=/';
      return rand_num;
    }
    /**
      * @author : Aparajita Singh
      * @description : contact from js
    */ 
    jQuery(document).ready(function(){
      var initial_url = window.location.href;
      var url = initial_url .split( '/' );
    //localhost url for testing
      //var base_url= document.location.origin + '/' + window.location.pathname.split ('/') [1] + '/'+ window.location.pathname.split ('/') [2] + '/';
    // production url   
       var base_url= document.location.origin + '/' + window.location.pathname.split ('/') [0] +  '/';
      var FinalFiles = [];
        $('.email-error').hide();
        $('.email-require').hide();
        $( "#sending_message" ).hide();
       // contact from
        $("#contactUsFormfooter").on('submit', (function (e) {
          $(".captcha-verification").text('');
          var recp_val = jQuery('#g-recaptcha-response').val();
          e.preventDefault();
          if(recp_val != ""){
                // reset error fields
                jQuery('.file-error').hide();
                jQuery('.email-require').hide();
                if (!String.prototype.trim) {
                String.prototype.trim = function () {
                return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
                };
              }
                const username = jQuery('#username').val().trim();
                var $emailid = jQuery('#emailid').val().trim();
                const user_phone_footer = jQuery('#user_phone_footer').val().trim();
                const quotes = jQuery('#quotes').val().trim();
                const usercomment = jQuery('#usercomment').val().trim();
                const attachmentFile = $('#attachmentFile');
                const is_file_field_valid = attachmentFile.val() ? validate_file(attachmentFile) : true;
                if (!is_file_field_valid) {
                jQuery('.file-error').show();
                return;
                }
                var checked_userNames = check_names();
                var checked_userEmail = check_email();
                function check_email() {
                var email = jQuery(".emailid").val().trim();
                if (jQuery('.emailid').val().trim() == '') {
                    jQuery('.emailid').css('border-color', '#ff0000');
                    jQuery('.email-require').show();
                    jQuery('.email-error').hide();
                    return false;
                } else {
                    jQuery('.email-require').hide()
                    jQuery('.emailid').css('border-color', '');
                 if( validateEmail(email) ){
                    jQuery('.emailid').removeClass('required_error');
                    $('.email_error').hide();
                    $('.email_error').html("");
                    return true;
                } else {
                    stat_error = 1;
                    jQuery('.emailid').addClass('required_error');
                    $('.email_error').show();
                    $('.email_error').html("Please enter a valid email");
                    return false;
                }
                      
              }
                
          }
        //Email validation function
           function validateEmail(email) {
           var re = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z\-]+\.)+[a-z]{2,6}$/;
           return re.test(email);
      }
           jQuery('#emailid').on('keyup', check_email );
           jQuery('#username').on('keyup', check_names );
           jQuery("input").on("keyup",function(){
           jQuery(this).parent().find(".error-msg").hide();
        })
      //name validation
        function check_names(){ 
          if (jQuery('#username').val().trim() == ''){
            $(".name-required-field").html('Name is required');
            $(".name-error").hide();
            jQuery('#username').css('border-color', '#d40f2a');
            return false;
          }else{
            jQuery('#username').css('border-color', '#d40f2a');
            jQuery('.name-error').show();
            return true;
            }
          }
                  function validatePhone(phone) {
                  var validity = new RegExp("^[0-9]{6,15}$");
                  return validity.test(phone);
                  }
                  var $user_phone_footer = $(this).find("input#user_phone_footer").val();
                  if( $user_phone_footer != '' ){
                  if( !validatePhone($user_phone_footer) ){
                  stat_error = 1;
                  $('.phone_error').show();
                  $('.phone_error').html("Please enter a valid phone");
                  } else {
                  $('.phone_error').hide();
                  $('.phone_error').html("");
                   }
                }
    
                if (checked_userEmail && is_file_field_valid && checked_userNames) {
                    const dataToSend = new FormData(this);
                    $.each(FinalFiles, function(i, v){
                    dataToSend.append(i, v);
                });
                    const dataObjForLocalStorage = { username,emailid, user_phone_footer, quotes, usercomment };
                    localStorage.setItem('unSavedContactForm', JSON.stringify(dataObjForLocalStorage));
                    send_via_Click_active = true;
                    sendDataToServer(dataToSend, false, false);
                }
             }else{
                  $(".captcha-verification").text('Please verify ReCaptcha');
             }
        }));
    
        function validate_file(attachmentFile) {
        const max_file_size = 250000000; // (Kb)
        var totalFileSize = attachmentFile[0].files[0].size / 1024;
        return (totalFileSize < max_file_size) && (FinalFiles.length <= 5);
      }
        var fileTotalSize = 0;
       //On change files
      $("input#attachmentFile").on('change', function(fileEv){
        $(".file_error").hide();
        var fileLength  = FinalFiles.length;
        $.each(fileEv.target.files, function(i, v){
          $(".appended_files").find("span."+v.name.replace(/[^A-Z0-9]/ig, "_")).parent().remove();
          fileTotalSize += v.size;
          index_id = (i + fileLength);
          FinalFiles[i + fileLength] = v;
          if( v.name.length > 11 ){
                var fl_name = v.name.substring(0, 11) + '...';
          } else {
                var fl_name = v.name;
          }
          $(".files_list").append("<div class='appended_files'><span class='"+ v.name.replace(/[^A-Z0-9]/ig, "_") +"'>"+ fl_name +" <a href='javascript:void(0)' class='custom_contact_file_remove' data-attr-id='"+index_id+"' ><i class='fa fa-times attch_cross_icon' aria-hidden='true'></i></a></span></div>");
        });
    
        if( FinalFiles.length > 5 ){
          $(".file_error").show();
          $(".file_max_size_error").text('Max 5 files are allowed.');
        } 
        validate_file();
    
        if( FinalFiles.length > 0 ){
          $("#attchment_text").text('');
        }
      });
    
       // Remove file
      jQuery("body").on("click", '.custom_contact_file_remove', function(){ 
            var input = $('input#attachmentFile');
            var dataAttrId = $(this).attr('data-attr-id');
            $(this).parents(".appended_files").remove();
            $(".appended_files").each(function(i, v){
            $(this).find('.custom_contact_file_remove').attr("data-attr-id", i);
      });
            delete FinalFiles[dataAttrId];
            FinalFiles = FinalFiles.filter(function(el){
              return el != null;
      });
    
        if( FinalFiles.length < 1 ){
          $("#attchment_text").text('Attach files');
          input.replaceWith(input.val('').clone(true));
        }
    
        if( FinalFiles.length < 5 ){
          // stat_error = 1;
          $(".file_max_size_error").text('');
        } 
    
        if( FinalFiles.length < 5 || FinalFiles.length == 5 ){
          $(".file_max_size_error").text('');
        }
    
        validate_file();
        
    });
    
    var attachedFileSize = 0;
    function validate_file(){
      var currentFileSize = 0;
      $.each(FinalFiles, function(i, v){
        currentFileSize += v.size;
      });  
      attachedFileSize = currentFileSize/1000; //converted to kb
      if( attachedFileSize > 25000 ){
      $(".file_error").show();
      $(".file_max_size_error").text('Max File size limit exceed');
      }
      
      return (FinalFiles.length <= 5 && attachedFileSize <= 25000 );
    }
     // On submit event add below code
        function sendDataToServer(dataToSend, contentType, processData, viaLocal){
            jQuery('#submit_info').hide();
            $('#sending_message').show();
            const ajaxObj = {
              url: base_url + 'php/mail_smtp-contact.php',
              type: "POST",
              data: dataToSend,
              cache: false,
              processData,
            success: function (data) {
                  jQuery('#submit_info').show();
                  $('#sending_message').hide();
                  $('#attchment_text').text('Attach Files');
                  localStorage.removeItem('unSavedContactForm');
                  send_via_Click_active = false;
                  document.getElementById("contactUsFormfooter").reset();
                  $(".appended_files").css('display','none');
                  document.getElementById("contactUsFormfooter").reset();  
                  var rand_number = create_cookie();
                  window.location= base_url+"/thank-you?id="+rand_number;
                  jQuery(".spinner-container").fadeOut(100);
                  document.getElementById("main-contact-form").reset();
                  },
            error: function (data) {
                  $('#sending_message').hide();
                    jQuery(".spinner-container").fadeOut();
                    if (send_via_Click_active) {
                      jQuery('#submit-error').show();
                      jQuery('#submit_info').show();
                      send_via_Click_active = false;
                      setTimeout(() => {
                        jQuery('#submit-error').hide();
                      }, 5000);
                    }
                  }
          };
          if (viaLocal) {    // for content type - json, Content type (C) is uppercase
            ajaxObj.ContentType = contentType;    // why (c) needs to be uppercase -  to be find out
          } else {
            ajaxObj.contentType = contentType;
          }
          $.ajax(ajaxObj);
          }      
     });

    /**
     * @author : Aparajita Singh
     * @description : Onload captcha js
     */ 
//captcha reload at bottom
run_first_time = false;
jQuery(window).scroll(function() {
  if( jQuery('.custom_captcha').length ){
    if( !run_first_time ){
      var pageTop       = jQuery(window).scrollTop();
      var pageBottom    = pageTop + jQuery(window).height();
      var elementTop    = jQuery('.custom_captcha').offset().top;
      var elementBottom = elementTop + jQuery('.custom_captcha').height();
      if( ((elementTop <= pageBottom) && (elementBottom >= pageTop)) ){
        run_first_time = true;
        if( !jQuery("#re_captcha_custom").length ){
          var po = document.createElement('script');
          po.type = 'text/javascript';
          po.async = true;
          po.defer = true;
          po.src = 'https://www.google.com/recaptcha/api.js';
          var elem = document.querySelector('script[nonce]');
          var n = elem && (elem['nonce'] || elem.getAttribute('nonce'));
          if (n)
          {
              po.setAttribute('nonce', n);
          }
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(po, s);
          }
      } else {
      }
    }
  }
});
 /**
     * @author : Aparajita Singh
     * @description : Load more js
     */ 
// blog load more
jQuery(document).ready(function() {
// loadmore js
   var ppp = 10; // Post per page
   pageNumber = 10;
   function load_posts(){
   var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax&offset='+pageNumber;
   //console.log(str);
   $.ajax({
       type: "POST",
       dataType: "html",
       url: admin_ajax,
       data: str,
       beforeSend : function(){
         $('.blog_loading').show();
         $('.load_src').hide();
       },
       success: function(data){
           data = jQuery.parseJSON( data );
           console.log( data );
           var $data = data.html;
           if($data != '' && data != 0){
            if( data.hide_load_more ){
               $("#more_posts").hide();
            }
               $("#ajax-posts .container .row .col-md-9 .row").append($data);
               $("#more_posts").attr("disabled",false);
           } else{
               $("#more_posts").hide();
           }   
           pageNumber = pageNumber+ppp;
       },
       complete : function(){
            $('.blog_loading').hide();
           $('.load_src').show();
       },
       error : function(jqXHR, textStatus, errorThrown) {
           $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
       }
   });
   return false;
   }
   $("#more_posts").on("click",function(){ // When btn is pressed.
   $("#more_posts").attr("disabled",true); // Disable the button, temp.
   load_posts();
   });

});
 /**
     * @author : Aparajita Singh
     * @description : Footer cookies js
     */ 
    jQuery(document).ready(function($) {
      $('.alert_background_coockies').removeClass("show");
      if(localStorage.getItem('cookies_yes')!='true'){
      $('.alert_background_coockies').fadeIn();
  }
      else if(localStorage.getItem('cookies_yes')=='true')
  {
      $('.alert_background_coockies').fadeOut(0);
  }
      $('#cokkies-submit').click(function()
  {
      localStorage.setItem('cookies_yes','true');
      $('.alert_background_coockies').fadeOut();
  })

/**
  * @author : Aparajita Singh
  * @description : Top-up button js
*/
  $("#back-top").hide();
  // fade in #back-top
  $(function () {
      $(window).scroll(function () {
          if ($(this).scrollTop() > 500) {
              $('#back-top').fadeIn();
          } else {
              $('#back-top').fadeOut();
          }
      });
      // scroll body to 0px on click
      $('a#back-top').click(function () {
          $('body,html').animate({
              scrollTop: 0
          }, 800);
          return false;
      });
 });
/**
  * @author : Aparajita Singh
  * @description : Text-input field not include special character 
*/
$('.user').on('keypress', function(e) {
  var regex = new RegExp("^[a-zA-Z ]*$");
  var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
  if (regex.test(str)) {
    return true;
  }
  e.preventDefault();
  return false;
}); 
/**
* @author : Aparajita Singh
* @description : Phone-input field not include special character 
*/
  var input = document.getElementById('user_phone_footer');
  $('#user_phone_footer').on('keypress', function() {
  input.value = input.value.replace(/\D+/g, "");
});
});
// single.php js
jQuery(document).ready(function(){   
  jQuery( ".relevantwork a" ).each(function( index ) {
        
                          var html='';
                          var path=window.location.href;
                         //  alert(path);
                          var to = path.lastIndexOf('/');
                          to = to == -1 ? url.length : to + 1;
                          url = path.substring(0, to);
                        // console.log(url);
                          
                          site= path.replace(/\/$/, "");                         
                          var current_url=jQuery( this ).attr('href');
                       //  alert(current_url);                                
                          if(current_url==url){                                 
                    // alert("match");
                           jQuery(this).addClass('relevant-color');                        
                           }  
                                      
                         });
                   });
// single.php js2
(function()
           {
             // jQuery("#relevant").hide();          
                if( window.localStorage )
                {           
                        var category=jQuery("#category").find('a').text();
                        //alert(category);
                        if(category)
                        {
                            jQuery.ajax({               
                              type: "POST",
                              url: "<?php echo home_url(); ?>/php/category.php",
                              data:{'variable': category},
                              success: function(msg){     
                                  //  alert(msg);
                                  jQuery("#relevant").hide();  
                                  // console.log(msg);
                              }
                          });  
                          }
                      }
})();  


document.addEventListener("DOMContentLoaded", function() {
  let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
  let active = false;

  const lazyLoad = function() {
    if (active === false) {
      active = true;

      setTimeout(function() {
        lazyImages.forEach(function(lazyImage) {
          if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
            lazyImage.src = lazyImage.dataset.src;
            lazyImage.srcset = lazyImage.dataset.srcset;
            lazyImage.classList.remove("lazy");

            lazyImages = lazyImages.filter(function(image) {
              return image !== lazyImage;
            });

            if (lazyImages.length === 0) {
              document.removeEventListener("scroll", lazyLoad);
              window.removeEventListener("resize", lazyLoad);
              window.removeEventListener("orientationchange", lazyLoad);
            }
          }
        });

        active = false;
      }, 200);
    }
  };

  document.addEventListener("scroll", lazyLoad);
  window.addEventListener("resize", lazyLoad);
  window.addEventListener("orientationchange", lazyLoad);
});