<?php
/**
 * WP HubSpot API
 *
 * @package wp-airbrake-api
 */

/*
* Plugin Name: WP Airbrake API
* Plugin URI: https://github.com/wp-api-libraries/wp-airbrake-api
* Description: Perform API requests to Airbrake in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-airbrake-api
* GitHub Branch: master
* Text Domain: wp-airbrake-api
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }


if ( ! class_exists( 'AirbrakeAPI' ) ) {

	/**
	 * AirbrakeAPI Class.
	 */
	class AirbrakeAPI {

		/**
		 * BaseAPI Endpoint
		 *
		 * @var string
		 * @access protected
		 */
		protected $base_uri = 'https://airbrake.io/api/';

		/**
		 * __construct function.
		 *
		 * @access public
		 * @param mixed $api_key
		 * @return void
		 */
		function __construct( $api_key, $oauth_token = null ) {

			static::$api_key = $api_key;

			$this->args['headers'] = array(
            'Content-Type' => 'application/json',
	        );

			if ( ! empty( $oauth_token ) ) {
				$this->args['headers'] = array(
					'Authorization' => 'Bearer '. $oauth_token,
				);
			}

		}

		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {

			$response = wp_remote_request( $request, $this->args );

			$code = wp_remote_retrieve_response_code($response );
			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'wp-airbrake-api' ), $code ) );
			}
			$body = wp_remote_retrieve_body( $response );
			return json_decode( $body );
		}


		/* Pagination. */

		/* Cursor Pagination. */

		/* Error Notifications. */

		/* Projects. */

		/* Deploys. */

		/* Groups. */

		/* Notices. */

		/* Project Activites. */


		/* iOS Crash Reports. */

		function add_ios_crash_report() {

		}

	}

}
