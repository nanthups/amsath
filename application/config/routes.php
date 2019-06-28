<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

$route['admin/login'] = 'admin/admin/login';
$route['admin/logout'] = 'admin/admin/logout';

$route['admin/reset-password/(:any)'] = 'admin/admin/reset_password/$1';
$route['admin/reset-password'] = 'admin/admin/reset_password';

$route['admin/admin-users/(:any)/(:any)/(:any)'] = 'admin/user/list_admin_users/$1/$2/$3';
$route['admin/admin-users/(:any)/(:num)'] = 'admin/user/list_admin_users/$1/$2';
$route['admin/admin-users/(:any)'] = 'admin/user/list_admin_users/$1';
$route['admin/admin-users'] = 'admin/user/list_admin_users';

$route['admin/admin-user/(:any)/(:any)/(:any)/(:num)'] = 'admin/user/searchs/$1/$2/$3/$4';
$route['admin/admin-user/(:any)/(:any)/(:num)'] = 'admin/user/searchs/$1/$2/$3';
$route['admin/admin-user/(:any)'] = 'admin/user/searchs/$1';

$route['admin/list-pages/(:any)/(:any)/(:any)'] = 'admin/pages/list_pages/$1/$2/$3';
$route['admin/list-pages/(:any)/(:num)'] = 'admin/pages/list_pages/$1/$2';
$route['admin/list-pages/(:num)'] = 'admin/pages/list_pages/$1';
$route['admin/list-pages'] = 'admin/pages/list_pages';

$route['admin/list-page/(:any)/(:any)/(:num)'] = 'admin/pages/searchs/$1/$2/$3';
$route['admin/list-page/(:any)/(:any)'] = 'admin/pages/searchs/$1/$2';
$route['admin/list-page/(:any)'] = 'admin/pages/searchs/$1';

$route['admin/add-pages/(:any)/(:any)/(:any)'] = 'admin/pages/add_pages/$1/$2/$3';
$route['admin/add-pages/(:any)/(:num)'] = 'admin/pages/add_pages/$1/$2';
$route['admin/add-pages/(:any)'] = 'admin/pages/add_pages/$1';
$route['admin/add-pages'] = 'admin/pages/add_pages';


$route['admin/list-category1/(:any)/(:any)/(:any)'] = 'admin/Category1/list_category1/$1/$2/$3';
$route['admin/list-category1/(:any)/(:num)'] = 'admin/Category1/list_category1/$1/$2';
$route['admin/list-category1/(:num)'] = 'admin/Category1/list_category1/$1';
$route['admin/list-category1'] = 'admin/Category1/list_category1';

$route['admin/list-category1/(:any)/(:any)/(:num)'] = 'admin/Category1/searchs/$1/$2/$3';
$route['admin/list-category1/(:any)/(:any)'] = 'admin/Category1/searchs/$1/$2';
$route['admin/list-category1/(:any)'] = 'admin/Category1/searchs/$1';
$route['admin/list-category1/search'] = 'admin/Category1/searchs';

$route['admin/add-category1/(:any)/(:any)/(:any)'] = 'admin/Category1/add_category1/$1/$2/$3';
$route['admin/add-category1/(:any)/(:num)'] = 'admin/Category1/add_category1/$1/$2';
$route['admin/add-category1/(:any)'] = 'admin/Category1/add_category1/$1';
$route['admin/add-category1'] = 'admin/Category1/add_category1';

$route['admin/list-category2/(:any)/(:any)/(:any)'] = 'admin/Category2/list_category2/$1/$2/$3';
$route['admin/list-category2/(:any)/(:num)'] = 'admin/Category2/list_category2/$1/$2';
$route['admin/list-category2/(:num)'] = 'admin/Category2/list_category2/$1';
$route['admin/list-category2'] = 'admin/Category2/list_category2';

$route['admin/list-category2/(:any)/(:any)/(:num)'] = 'admin/Category2/searchs/$1/$2/$3';
$route['admin/list-category2/(:any)/(:any)'] = 'admin/Category2/searchs/$1/$2';
$route['admin/list-category2/(:any)'] = 'admin/Category2/searchs/$1';
$route['admin/list-category2/search'] = 'admin/Category2/searchs';

$route['admin/add-category2/(:any)/(:any)/(:any)'] = 'admin/Category2/add_category2/$1/$2/$3';
$route['admin/add-category2/(:any)/(:num)'] = 'admin/Category2/add_category2/$1/$2';
$route['admin/add-category2/(:any)'] = 'admin/Category2/add_category2/$1';
$route['admin/add-category2'] = 'admin/Category2/add_category2';

$route['admin/list-category3/(:any)/(:any)/(:any)'] = 'admin/Category3/list_category3/$1/$2/$3';
$route['admin/list-category3/(:any)/(:num)'] = 'admin/Category3/list_category3/$1/$2';
$route['admin/list-category3/(:num)'] = 'admin/Category3/list_category3/$1';
$route['admin/list-category3'] = 'admin/Category3/list_category3';

$route['admin/list-category3/(:any)/(:any)/(:num)'] = 'admin/Category3/searchs/$1/$2/$3';
$route['admin/list-category3/(:any)/(:any)'] = 'admin/Category3/searchs/$1/$2';
$route['admin/list-category3/(:any)'] = 'admin/Category3/searchs/$1';
$route['admin/list-category3/search'] = 'admin/Category3/searchs';

$route['admin/add-category3/(:any)/(:any)/(:any)'] = 'admin/Category3/add_category3/$1/$2/$3';
$route['admin/add-category3/(:any)/(:num)'] = 'admin/Category3/add_category3/$1/$2';
$route['admin/add-category3/(:any)'] = 'admin/Category3/add_category3/$1';
$route['admin/add-category3'] = 'admin/Category3/add_category3';


$route['admin/list-product/(:any)/(:any)/(:any)'] = 'admin/Product/list_product/$1/$2/$3';
$route['admin/list-product/(:any)/(:num)'] = 'admin/Product/list_product/$1/$2';
$route['admin/list-product/(:num)'] = 'admin/Product/list_product/$1';
$route['admin/list-product'] = 'admin/Product/list_product';

$route['admin/list-product/(:any)/(:any)/(:num)'] = 'admin/Product/searchs/$1/$2/$3';
$route['admin/list-product/(:any)/(:any)'] = 'admin/Product/searchs/$1/$2';
$route['admin/list-product/(:any)'] = 'admin/Product/searchs/$1';

$route['admin/add-product/(:any)/(:any)/(:any)'] = 'admin/Product/add_product/$1/$2/$3';
$route['admin/add-product/(:any)/(:num)'] = 'admin/Product/add_product/$1/$2';
$route['admin/add-product/(:any)'] = 'admin/Product/add_product/$1';
$route['admin/add-product'] = 'admin/Product/add_product';

$route['admin/list-attribute/(:any)/(:any)/(:any)'] = 'admin/attribute/list_attribute/$1/$2/$3';
$route['admin/list-attribute/(:any)/(:num)'] = 'admin/attribute/list_attribute/$1/$2';
$route['admin/list-attribute/(:num)'] = 'admin/attribute/list_attribute/$1';
$route['admin/list-attribute'] = 'admin/attribute/list_attribute';

$route['admin/list-attribute/(:any)/(:any)/(:num)'] = 'admin/attribute/searchs/$1/$2/$3';
$route['admin/list-attribute/(:any)/(:any)'] = 'admin/attribute/searchs/$1/$2';
$route['admin/list-attribute/(:any)'] = 'admin/attribute/searchs/$1';

$route['admin/add-attribute/(:any)/(:any)/(:any)'] = 'admin/attribute/add_attribute/$1/$2/$3';
$route['admin/add-attribute/(:any)/(:num)'] = 'admin/attribute/add_attribute/$1/$2';
$route['admin/add-attribute/(:any)'] = 'admin/attribute/add_attribute/$1';
$route['admin/add-attribute'] = 'admin/attribute/add_attribute';


$route['admin/list-attribute-values/(:any)/(:any)/(:any)'] = 'admin/values/list_values/$1/$2/$3';
$route['admin/list-attribute-values/(:any)/(:num)'] = 'admin/values/list_values/$1/$2';
$route['admin/list-attribute-values/(:num)'] = 'admin/values/list_values/$1';
$route['admin/list-attribute-values'] = 'admin/values/list_values';

$route['admin/list-attribute-values/(:any)/(:any)/(:num)'] = 'admin/values/searchs/$1/$2/$3';
$route['admin/list-attribute-values/(:any)/(:any)'] = 'admin/values/searchs/$1/$2';
$route['admin/list-attribute-values/(:any)'] = 'admin/values/searchs/$1';

$route['admin/add-attribute-values/(:any)/(:any)/(:any)'] = 'admin/values/add_values/$1/$2/$3';
$route['admin/add-attribute-values/(:any)/(:num)'] = 'admin/values/add_values/$1/$2';
$route['admin/add-attribute-values/(:any)'] = 'admin/values/add_values/$1';
$route['admin/add-attribute-values'] = 'admin/values/add_values';


$route['admin/list-brand/(:any)/(:any)/(:any)'] = 'admin/brand/list_brand/$1/$2/$3';
$route['admin/list-brand/(:any)/(:num)'] = 'admin/brand/list_brand/$1/$2';
$route['admin/list-brand/(:num)'] = 'admin/brand/list_brand/$1';
$route['admin/list-brand'] = 'admin/brand/list_brand';

$route['admin/list-brand/(:any)/(:any)/(:num)'] = 'admin/brand/searchs/$1/$2/$3';
$route['admin/list-brand/(:any)/(:any)'] = 'admin/brand/searchs/$1/$2';
$route['admin/list-brand/(:any)'] = 'admin/brand/searchs/$1';

$route['admin/add-brand/(:any)/(:any)/(:any)'] = 'admin/brand/add_brand/$1/$2/$3';
$route['admin/add-brand/(:any)/(:num)'] = 'admin/brand/add_brand/$1/$2';
$route['admin/add-brand/(:any)'] = 'admin/brand/add_brand/$1';
$route['admin/add-brand'] = 'admin/brand/add_brand';

$route['admin/list-reg/(:any)/(:any)/(:any)'] = 'admin/reg/list_reg/$1/$2/$3';
$route['admin/list-reg/(:any)/(:num)'] = 'admin/reg/list_reg/$1/$2';
$route['admin/list-reg/(:num)'] = 'admin/reg/list_reg/$1';
$route['admin/list-reg'] = 'admin/reg/list_reg';

$route['admin/list-reg/(:any)/(:any)/(:num)'] = 'admin/reg/searchs/$1/$2/$3';
$route['admin/list-reg/(:any)/(:any)'] = 'admin/reg/searchs/$1/$2';
$route['admin/list-reg/(:any)'] = 'admin/reg/searchs/$1';

$route['admin/list-coupon/(:any)/(:any)/(:any)'] = 'admin/coupon/list_coupon/$1/$2/$3';
$route['admin/list-coupon/(:any)/(:num)'] = 'admin/coupon/list_coupon/$1/$2';
$route['admin/list-coupon/(:num)'] = 'admin/coupon/list_coupon/$1';
$route['admin/list-coupon'] = 'admin/coupon/list_coupon';

$route['admin/list-coupon/(:any)/(:any)/(:num)'] = 'admin/coupon/searchs/$1/$2/$3';
$route['admin/list-coupon/(:any)/(:any)'] = 'admin/coupon/searchs/$1/$2';
$route['admin/list-coupon/(:any)'] = 'admin/coupon/searchs/$1';

$route['admin/add-coupon/(:any)/(:any)/(:any)'] = 'admin/coupon/add_coupon/$1/$2/$3';
$route['admin/add-coupon/(:any)/(:num)'] = 'admin/coupon/add_coupon/$1/$2';
$route['admin/add-coupon/(:any)'] = 'admin/coupon/add_coupon/$1';
$route['admin/add-coupon'] = 'admin/coupon/add_coupon';

$route['admin/list-web/(:any)/(:any)/(:any)'] = 'admin/web/list_web/$1/$2/$3';
$route['admin/list-web/(:any)/(:num)'] = 'admin/web/list_web/$1/$2';
$route['admin/list-web/(:num)'] = 'admin/web/list_web/$1';
$route['admin/list-web'] = 'admin/web/list_web';

$route['admin/list-web/(:any)/(:any)/(:num)'] = 'admin/web/searchs/$1/$2/$3';
$route['admin/list-web/(:any)/(:any)'] = 'admin/web/searchs/$1/$2';
$route['admin/list-web/(:any)'] = 'admin/web/searchs/$1';

$route['admin/list-agreement/(:any)/(:any)/(:any)'] = 'admin/agreement/list_agreement/$1/$2/$3';
$route['admin/list-agreement/(:any)/(:num)'] = 'admin/agreement/list_agreement/$1/$2';
$route['admin/list-agreement/(:num)'] = 'admin/agreement/list_agreement/$1';
$route['admin/list-agreement'] = 'admin/agreement/list_agreement';

$route['admin/list-agreement/(:any)/(:any)/(:num)'] = 'admin/agreement/searchs/$1/$2/$3';
$route['admin/list-agreement/(:any)/(:any)'] = 'admin/agreement/searchs/$1/$2';
$route['admin/list-agreement/(:any)'] = 'admin/agreement/searchs/$1';

$route['admin/list-banner/(:any)/(:any)/(:any)'] = 'admin/banner/list_banner/$1/$2/$3';
$route['admin/list-banner/(:any)/(:num)'] = 'admin/banner/list_banner/$1/$2';
$route['admin/list-banner/(:num)'] = 'admin/banner/list_banner/$1';
$route['admin/list-banner'] = 'admin/banner/list_banner';

$route['admin/list-banner/(:any)/(:any)/(:num)'] = 'admin/banner/searchs/$1/$2/$3';
$route['admin/list-banner/(:any)/(:any)'] = 'admin/banner/searchs/$1/$2';
$route['admin/list-banner/(:any)'] = 'admin/banner/searchs/$1';

$route['admin/add-banner/(:any)/(:any)/(:any)'] = 'admin/banner/add_banner/$1/$2/$3';
$route['admin/add-banner/(:any)/(:num)'] = 'admin/banner/add_banner/$1/$2';
$route['admin/add-banner/(:any)'] = 'admin/banner/add_banner/$1';
$route['admin/add-banner'] = 'admin/banner/add_banner';

$route['admin/list-website/(:any)'] = 'admin/website/list_website/$1';
$route['admin/list-website'] = 'admin/website/list_website';

$route['admin/list-ads/(:any)/(:any)/(:any)'] = 'admin/ads/list_ads/$1/$2/$3';
$route['admin/list-ads/(:any)/(:num)'] = 'admin/ads/list_ads/$1/$2';
$route['admin/list-ads/(:num)'] = 'admin/ads/list_ads/$1';
$route['admin/list-ads'] = 'admin/ads/list_ads';

$route['admin/list-ads/(:any)/(:any)/(:num)'] = 'admin/ads/searchs/$1/$2/$3';
$route['admin/list-ads/(:any)/(:any)'] = 'admin/ads/searchs/$1/$2';
$route['admin/list-ads/(:any)'] = 'admin/ads/searchs/$1';


$route['admin/list-vmsg/(:any)/(:any)/(:any)'] = 'admin/vmsg/list_vmsg/$1/$2/$3';
$route['admin/list-vmsg/(:any)/(:num)'] = 'admin/vmsg/list_vmsg/$1/$2';
$route['admin/list-vmsg/(:num)'] = 'admin/vmsg/list_vmsg/$1';
$route['admin/list-vmsg'] = 'admin/vmsg/list_vmsg';

$route['admin/list-vmsg/(:any)/(:any)/(:num)'] = 'admin/vmsg/searchs/$1/$2/$3';
$route['admin/list-vmsg/(:any)/(:any)'] = 'admin/vmsg/searchs/$1/$2';
$route['admin/list-vmsg/(:any)'] = 'admin/vmsg/searchs/$1';


$route['admin/list-words/(:any)/(:any)/(:any)'] = 'admin/words/list_words/$1/$2/$3';
$route['admin/list-words/(:any)/(:num)'] = 'admin/words/list_words/$1/$2';
$route['admin/list-words/(:num)'] = 'admin/words/list_words/$1';
$route['admin/list-words'] = 'admin/words/list_words';

$route['admin/list-words/(:any)/(:any)/(:num)'] = 'admin/words/searchs/$1/$2/$3';
$route['admin/list-words/(:any)/(:any)'] = 'admin/words/searchs/$1/$2';
$route['admin/list-words/(:any)'] = 'admin/words/searchs/$1';

$route['admin/add-words/(:any)/(:any)/(:any)'] = 'admin/words/add_words/$1/$2/$3';
$route['admin/add-words/(:any)/(:num)'] = 'admin/words/add_words/$1/$2';
$route['admin/add-words/(:any)'] = 'admin/words/add_words/$1';
$route['admin/add-words'] = 'admin/words/add_words';


$route['admin/list-chat/(:any)/(:any)/(:any)'] = 'admin/chat/list_chat/$1/$2/$3';
$route['admin/list-chat/(:any)/(:num)'] = 'admin/chat/list_chat/$1/$2';
$route['admin/list-chat/(:num)'] = 'admin/chat/list_chat/$1';
$route['admin/list-chat'] = 'admin/chat/list_chat';

$route['admin/list-chat/(:any)/(:any)/(:num)'] = 'admin/chat/searchs/$1/$2/$3';
$route['admin/list-chat/(:any)/(:any)'] = 'admin/chat/searchs/$1/$2';
$route['admin/list-chat/(:any)'] = 'admin/chat/searchs/$1';



$route['admin/list-photos/(:any)/(:any)/(:any)'] = 'admin/photos/list_photos/$1/$2/$3';
$route['admin/list-photos/(:any)/(:num)'] = 'admin/photos/list_photos/$1/$2';
$route['admin/list-photos/(:num)'] = 'admin/photos/list_photos/$1';
$route['admin/list-photos'] = 'admin/photos/list_photos';

$route['admin/list-photos/(:any)/(:any)/(:num)'] = 'admin/photos/searchs/$1/$2/$3';
$route['admin/list-photos/(:any)/(:any)'] = 'admin/photos/searchs/$1/$2';
$route['admin/list-photos/(:any)'] = 'admin/photos/searchs/$1';




$route['admin'] = 'admin/admin/home';
$route['admin/home'] = 'admin/admin/home';

//$route['signup'] = 'user/register';
$route['reset-password'] = 'User/forgotpassword';

//$route['view-profile'] = 'Site_visitor/viewprofile';
//$route['image-details/(:any)'] = 'Site_visitor/image_details/$1';


/** Visitor routes **/
$route['sign-up'] = 'Site_visitor/signup';
$route['user-login'] = 'Site_visitor/userlogin';
$route['best-search'] = 'Site_visitor/common_search';
$route['view-profile'] = 'Site_visitor/viewprofile';
$route['user-profile/(:any)'] = 'User/profile/$1';
$route['experts-list'] = 'Site_visitor/experts_list';
$route['expert-search'] = 'Site_visitor/expert_search';
$route['experts-list/(:any)'] = 'Site_visitor/experts_list/$1';
$route['image-details/(:any)'] = 'Site_visitor/image_details/$1';
$route['image-list'] = 'Site_visitor/image_list';
$route['image-search'] = 'Site_visitor/image_search';
$route['image-search/(:any)'] = 'Site_visitor/image_search/$1';
$route['image-list/(:any)'] = 'Site_visitor/image_list/$1';
$route['image-cart/(:any)'] = 'Site_visitor/image_cart/$1';
$route['delete-cart/(:any)'] = 'Site_visitor/delete_item_cart/$1';
$route['file-cart'] = 'Site_visitor/filecart';
$route['item-cart/(:any)'] = 'Site_visitor/item_cart/$1';

/** User Dashboard **/
$route['user-dashboard'] = 'User/dashboard';
$route['user-sell-files'] = 'User/sellfiles';
$route['user-sell-shop'] = 'User/sellshop';
$route['user-user-works'] = 'User/sellwork';
$route['user-profile'] = 'User/profile';
$route['user-bio'] = 'User/edit_bio';
$route['user-contact'] = 'User/edit_contact';
$route['user-biography'] = 'User/add_biography';
$route['user-biography/(:any)'] = 'User/edit_biography/$1';
$route['manage-biography'] = 'User/manage_bio';
$route['delete-biography/(:any)'] = 'User/delete_bio/$1';
$route['manage-contact'] = 'User/contact_update';
$route['user-appearance'] = 'User/edit_appearance';
$route['manage-appearance'] = 'User/appearance_update';
$route['user-profile-settings'] = 'User/edit_profile';
$route['user-ads-listing'] = 'User/listads';
$route['user-add-ads'] = 'User/addads';
$route['user-manage-ads'] = 'User/manage_ads';
$route['user-ad-return/(:any)'] = 'User/returnads/$1';
$route['user-ad-delete/(:any)'] = 'User/deleteads/$1';
$route['user-notification'] = 'User/user_noti';
$route['user-profile-delete'] = 'User/delete_profile';
$route['user-profile-message/(:any)'] = 'User/user_message/$1';
$route['sell-files'] = 'Filemanage/insertFile';
$route['edit-file/(:any)'] = 'Filemanage/returnFile/$1';
$route['delete-file/(:any)'] = 'Filemanage/deleteFile/$1';
$route['logout'] = 'User/logout';
/** Followers **/
$route['un-follow/(:any)'] = 'User/unfollow/$1';
$route['follow/(:any)'] = 'User/follow/$1';
/** Chat **/
$route['send-message'] = 'ChatController/send_text_message';
$route['get-chat-history/(:any)'] = 'ChatController/get_chat_history/$1';
$route['chat-clear/(:any)'] = 'ChatController/chat_clear_client_cs/$1';
/** Chat Groups **/
$route['get-group-members/(:any)'] = 'ChatController/get_group_members/$1';
$route['get-group-history/(:any)'] = 'ChatController/get_group_history/$1';
$route['create-group'] = 'ChatController/create_group';
/** User Agreement **/
$route['user-agreement-list'] = 'AgreementController/agreementList';
$route['user-agreement-add'] = 'AgreementController/agreementAdd';
$route['user-agreement'] = 'AgreementController/manageAgreement';


$route['list-product/(:num)'] = 'product/getdata/$1';
$route['product-details/(:num)/(:num)'] = 'product/getdata/$1/$2';

$route['cart'] = 'product/cart';
$route['wishlist'] = 'product/view_wishlist';
$route['file-wishlist/(:any)'] = 'Site_visitor/view_wishlist/$1';

$route['default_controller'] = 'Site_visitor';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
