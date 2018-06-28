<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/HAuth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => true
			),

			/* "Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "1091230819614-fjgdd1umr1athhlgul14a59p87djl0sh.apps.googleusercontent.com", "secret" => "KNQcCYwDQ48o9LY15d9-yiC-" ),
"redirect_uri"=>"http://scubbidivingportal.tk",

			), */

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "208084229755389", "secret" => "5e7c1d6e5b298556dbae5bde619bb8f2"),
"scope"   => "email, user_about_me, user_birthday, user_hometown",
"trustForwarded" => FALSE,
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "DTE8l5M4u5UZE9NyVD173fkOx", "secret" => "o5WCq4IuaX4MzCX3JA577JHF1Dh6lvmLa6wJrWIOP6bQ1Hap6e" ),
"includeEmail" => true,
			),

			// windows live
			"Live" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			/* "LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "86x6lbq5ved2vs", "secret" => "fRblq1FJfvgkhvSg" )
			), */

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */