<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['product/(:any)'] = 'home/product/$1';
$route['cart'] = 'home/cart';
$route['checkout'] = 'home/checkout';
$route['shop'] = 'home/shop';
$route['wishlist'] = 'home/wishlist';
$route['account'] = 'home/account';
$route['orders'] = 'home/orders';
$route['logout'] = 'home/logout';
$route['change-password'] = 'home/change_password';

$route['update_profile']='home/update_profile';
$route['update_password']='home/update_password';
$route['update_address']='home/update_address';
$route['registerAccount']='home/registerAccount';
$route['loginAccount']='home/loginAccount';
$route['forgotPassword']='home/forgotPassword';
$route['reset_password/(:any)']='home/reset_password/$1';
$route['renew_password']='home/renew_password';
$route['add_subscribe']='home/add_subscribe';
$route['clear_cart']='ajax/clear_cart';
$route['apply_coupon']='ajax/apply_coupon';
$route['404_override'] = '';
$route['remove_wishlist']='ajax/remove_wishlist';
$route['translate_uri_dashes'] = FALSE;
$route['privacy-policy']='home/cms/privacy-policy';
$route['return-policy']='home/cms/return-policy';
$route['blog-ring-sidebar']='home/cms/blog-ring-sidebar';
$route['faq-page']='home/faq_page';
$route['orders-details/(:any)/(:any)']='home/orders_details/$1/$2';
$route['orders-summary/(:any)']='home/order_summary/$1';


// $route['blog-ring-sidebar']='home/cms/blog-ring-sidebar';
// $route['contact-us']='home/cms/contact-us';
// $route['exchange-policies']='home/cms/exchange-policies';
$route['add_reveiw']='ajax/add_reveiw';
$route['contact-us']='home/contact';
$route['about-us']='home/about_us';
$route['proceed_checkout']='ajax/proceed_checkout';
$route['contact_us']='home/contact_us';
$route['update_order_product_status']="ajax/update_order_product_status";
$route['update_order_status']="ajax/update_order_status";
?>