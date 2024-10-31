<?php
/*Plugin Name: pixie dust
Description: prev page log-in redirect
Version: 0.1
Author: Elizabeth Shilling	
URI:  http://www.orcawebperformance.com
License: GPL2

*/

/* redirect users to prev page after login */
function pixiedust_ecs_redirect_to_prev_page() {
global $redirect_to;
$login = wp_login_url();
$page_to_redirect = $_SERVER[HTTP_REFERER];
if (($page_to_redirect == $login) || $page_to_redirect == null) $redirect_to = get_option('siteurl');
else if (!isset($_GET['redirect_to'])) {
//$redirect_to = get_option('siteurl');
$redirect_to = $page_to_redirect;
}

}
add_action('login_form', 'pixiedust_ecs_redirect_to_prev_page');

//[pixie_login_btn]
add_shortcode('pixie_login_btn', 'pixiedust_ecs_login_btn_html'); 
//base html to be added at bottom of post
function pixiedust_ecs_login_btn_html() {
					if( is_user_logged_in() == false ){
					$baseline  = ' <a href="';
					$baseline .= wp_login_url();
					$baseline .= '" class="pixiedust_ecs_log-in" >log-in';
					$baseline .= '</a>';
					

					return $baseline;                  }
										}
