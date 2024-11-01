<?php
/*
Plugin Name: ZippySG Core
Plugin URI: https://zippy.sg
Description: Don't Remove. Extends Code important.
Version: 1.0
Author: Zippy SG
Author URI: https://zippy.sg
	Copyright: © 2021 WooThemes.
	License: GNU General Public License v3.0
	License URI: https://zippy.sg
*/
// Disable XML-RPC in WordPress   
add_filter('xmlrpc_enabled', '__return_false');

/***<!-- ---####*** Edit teamplate design Post/Page ***####--- ***/
add_filter('use_block_editor_for_post', '__return_false');

/***<!-- ---####*** ADD SMPT Not Need Plugin ***####--- ***/
add_action( 'phpmailer_init', 'setup_phpmailer_init' );
function setup_phpmailer_init( $phpmailer ) {
    $phpmailer->Host = 'smtp.gmail.com'; // for example, smtp.mailtrap.io
    $phpmailer->Port = 587; // set the appropriate port: 465, 2525, etc.
    $phpmailer->Username = 'smtp.connect.server@gmail.com'; // your SMTP username
    $phpmailer->Password = 'zsgobbdpfbwfskns'; // your SMTP password
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = 'tls'; // preferable but optional
    $phpmailer->IsSMTP();
}

/*** How to Change the Logo and URL on the WordPress Login Page ***/
add_filter('login_headerurl','custom_loginlogo_url');
function custom_loginlogo_url($url) {
	return '/';
}

// <!-- ---####*** Disable All Update Notifications with Code ***####--- --> 
function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

/*** Add css in Login Form on Dashboard ***/
function my_login_stylesheet() {?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url("/wp-content/uploads/2022/07/logo.png");
			width: 100%;
            background-size: 48%;
        }
        #login form#loginform .input, #login form#registerform .input, #login form#lostpasswordform .input {
         border-width: 0px;
         border-radius: 0px;
         box-shadow: unset;
     }
     #login form#loginform .input, #login form#registerform .input, #login form#lostpasswordform .input {border-bottom: 1px solid #d2d2d2;}
     #login form .submit .button {
         background-color: #005c8f;
         width: 100%;
         height: 40px;
         border-width: 0px;
         margin-top: 10px;
     }
     .login .button.wp-hide-pw{
         color: #005c8f;
     }
 </style>

<?php }
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function collectiveray_remove_version_scripts_styles($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('style_loader_src', 'collectiveray_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'collectiveray_remove_version_scripts_styles', 9999);

// Hiding the WordPress version
function dartcreations_remove_version() {
	return '';
} 
add_filter('the_generator', 'dartcreations_remove_version');


function myContentFooter() {
    ?>
    <div class="ppocta-ft-fix">
        <a id="zaloButton" href="https://wa.me/+84932129990" target="_blank"><span>Whatsapp: +84932129990</span></a>
    </div>
    <style>    
        #footer .button.icon {
            background: #005c8f;
            border: solid 1px white;
            -webkit-box-shadow: -3px 3px 8px 2px rgb(0 0 0 / 50%);
            -moz-box-shadow: -3px 3px 8px 2px rgba(0,0,0,0.5);
            box-shadow: -3px 3px 8px 2px rgb(0 0 0 / 50%);
            color: #fff;
        }
        .ppocta-ft-fix {
            width: 52px;
            position: fixed;
            bottom: 15px;
            left: 30px;
            text-align: center;
            z-index: 99999;
        }
        @media (max-width: 768px) {
            .ppocta-ft-fix {
                bottom: 5%;
            }
        }
        @media (max-width: 640px) {
            a#messengerButton:hover span{
                display: none;
            }
        }

        #zaloButton {
            display: inline-block;
            position: relative;
            width: 50px;
            height: 50px;
            line-height: 50px;
            border-radius: 100%;
            background: url("/wp-content/uploads/2022/08/whatsapp-logo.png") center center no-repeat;
            background-size: 100%;
        }
        a#zaloButton {outline:none; }
        a#zaloButton:hover {
            text-decoration:none;
            background: url("/wp-content/uploads/2022/08/whatsapp-logo.png") center center no-repeat;
            background-size: 100%;
        }
        a#zaloButton span {
            z-index:10;
            display:none; 
            padding:10px;
            left:56px;
            width:240px; 
            line-height:16px;
            border-radius:4px;
            box-shadow: 5px 5px 8px #CCC;
        }
        a#zaloButton:hover span {
            display:inline; position:absolute; color:#111;
            border:1px solid #DCA; background:#fffAF0;
        } 

        @media (max-width: 640px) {
            a#zaloButton:hover span{
                display: none;
            }
        }

        @media (max-width: 640px) {
            a#calltrap-btn:hover span {
                display: none;
            }
            .ppocta-ft-fix {width: 100%;}
            #zaloButton {
                float: left;
            }
        }
    </style>
    
    <?php
}
add_action( 'wp_footer', 'myContentFooter' );

add_action('admin_head', 'my_custom_fonts');

// Apply Custom CSS to Admin Area - Use Flatsome Theme
function my_custom_fonts() {
  echo '<style>
  li.toplevel_page_flatsome-panel img {
    width: 20px;
    height: 20px;
    padding-top: 7px!important;
    opacity:1 !important;
} 
</style>';
}

/**
* Enables the HTTP Strict Transport Security (HSTS) header in WordPress.

*/

function tg_enable_strict_transport_security_hsts_header_wordpress() {
    header('Strict-Transport-Security: max-age=31536000  env=HTTPS' );
    header(' X-XSS-Protection "1; mode=block" ' );
    header(' X-Content-Type-Options nosniff ' );
    header(' X-Frame-Options DENY ' );
    // header(' Referrer-Policy: strict-origin-when-cross-origin ' );
    // header(' Content-Security-Policy: frame-ancestors "none" ' );
    header(' Permissions-Policy "accelerometer=(), ambient-light-sensor=(), autoplay=(), battery=(), camera=(), cross-origin-isolated=(), display-capture=(), document-domain=(), encrypted-media=(), execution-while-not-rendered=(), execution-while-out-of-viewport=(), fullscreen=(), geolocation=(), gyroscope=(), interest-cohort=(), layout-animations=(), legacy-image-formats=(), magnetometer=(), microphone=(), midi=(), navigation-override=(), oversized-images=(), payment=(), picture-in-picture=(), publickey-credentials-get=(), screen-wake-lock=(), sync-script=(), sync-xhr=(), usb=(), vertical-scroll=(), web-share=(), wake-lock=(), xr-spatial-tracking=()" ' );
}

add_action( 'send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress' );