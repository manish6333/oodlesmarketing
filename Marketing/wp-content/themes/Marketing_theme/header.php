<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<?php wp_head(); ?>
	<title><?php echo wp_get_document_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri();?>/image/favicon.ico" type="image/x-icon"/>
	<?php
	    if( $_SERVER['HTTP_HOST'] == 'marketing2.oodleslab.com' ){
	        echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
	    } else {
	        echo '<meta name="robots" content="index, follow">';
	    }
	?>
	
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PLTDC6D');</script>
		<!-- End Google Tag Manager -->
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-83062845-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-83062845-1');
</script>
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2500859770140013');
  fbq('track', 'PageView');
</script>
<noscript><emmg alt="facebook" height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2500859770140013&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	<script type="text/javascript">var admin_ajax = '<?php echo admin_url('admin-ajax.php'); ?>';</script>
	<script type="text/javascript">var site_url = '<?php echo site_url(); ?>';</script>
	
<script>var w=window;var p = w.location.protocol;if(p.indexOf("http") < 0){p = "http"+":";}var d = document;var f = d.getElementsByTagName('script')[0],s = d.createElement('script');s.type = 'text/javascript'; s.async = false; if (s.readyState){s.onreadystatechange = function(){if (s.readyState=="loaded"||s.readyState == "complete"){s.onreadystatechange = null;try{loadwaprops("2573bc7da3e92eab5437b980877633fdb","28316be0be8ec03a22c5e9213e32550f5","29231c6b7bf45cf5a419b0073ee6f606ed71b62c3142be692","246f59acc1640d8e6a271e7fffd25753be5d52eb2be66bf17","0.0");}catch(e){}}};}else {s.onload = function(){try{loadwaprops("2573bc7da3e92eab5437b980877633fdb","28316be0be8ec03a22c5e9213e32550f5","29231c6b7bf45cf5a419b0073ee6f606ed71b62c3142be692","246f59acc1640d8e6a271e7fffd25753be5d52eb2be66bf17","0.0");}catch(e){}};};s.src =p+"//marketinghub.zoho.in/hub/js/WebsiteAutomation.js";f.parentNode.insertBefore(s, f);</script>
</head>
<body>	
	
	<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
					
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/image/Oodles Marketing.svg" alt="Ecommerce oodles marketing website development company"></a>	
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<script type="text/javascript">
								
							</script>
							<ul class="navbar-nav ml-auto py-4 py-md-0">
   								<li id="menu-item-about" class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
									<a class="nav-link" href="<?php echo home_url(); ?>">Home</a>
								</li>
								<li id="menu-item-services" class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services <em class="fa fa-angle-down"></em></a>
                                    
                                    <div class="dropdown-menu">
										<a id="sub-menu-1" class="dropdown-item" href="<?php echo home_url(); ?>/seo-services/">Search Engine Optimization</a>
										<a id="sub-menu-2" class="dropdown-item" href="<?php echo home_url(); ?>/social-media/">Social Media Management</a>
										<a id="sub-menu-3" class="dropdown-item" href="<?php echo home_url(); ?>/ad-campaigns/">Pay-Per-Click Campaigns</a>
										<a id="sub-menu-4" class="dropdown-item" href="<?php echo home_url(); ?>/content-marketing/">Content Marketing</a>
										<a id="sub-menu-5" class="dropdown-item" href="<?php echo home_url(); ?>/app-store-optimisation/">App Store Optimisation</a>
										<a id="sub-menu-6" class="dropdown-item" href="<?php echo home_url(); ?>/amazon-marketing/">Amazon Marketing</a>
										<a id="sub-menu-7" class="dropdown-item" href="<?php echo home_url(); ?>/ecommerce-development/">eCommerce Development</a>
									</div>
								</li>
							
								<li id="menu-item-blog" class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
									<a class="nav-link" href="<?php echo home_url(); ?>/blogs/">Blog</a>
								</li>
								<li id="menu-item-contact" class="nav-item pl-4 pl-md-0 ml-0 ml-md-5">
									<a class="nav-link" href="<?php echo home_url(); ?>/contact-us/">Contact</a>
								</li>
							</ul>
						</div>
						
					</nav>		
				</div>
			</div>
		</div>
	</div>
	<div class="">
	</div>
	<div class="">
	</div>
	<a id="back-top" href="#top"><em class="fa fa-arrow-up" aria-hidden="true"></em></a>
