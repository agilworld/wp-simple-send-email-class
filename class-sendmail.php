<?php 

/**
 * Send Email Class
 * 
 * @author Dian Afrial <agil.rahadi@gmail.com>
 * @since  1.0
 * @license http://opensource.org/licenses/MIT  MIT License
 * @copyright 2016 
 */

class Sendmail {
	
	/** @var String set from name */
	public $_from_name;

	/** @var String set from email address */
	public $_from_address;
	
	public function __construct(){}
		
	/** Get from name */
	public function get_from_name() {
		return $this->_from_name;
	}
	
	/** Get from e-mail address */
	public function get_from_address() {
		return $this->_from_address;
	}
	
	/** Get content type text/html or text */
	public function get_content_type() {
		return 'text/html';
	}

	/** Let's go send email procedure */
	public function send( $to, $subject, $message, $headers = "Content-Type: text/html\r\n", $attachments = "" ) {	

		// Hook filter
		add_filter( 'wp_mail_from', array($this, 'get_from_address') );
		add_filter( 'wp_mail_from_name', array($this, 'get_from_name') );
		add_filter( 'wp_mail_content_type', array($this, 'get_content_type') );
		
		ob_start();
			
		wp_mail( $to, $subject, $message, $headers, $attachments );
		
		ob_end_clean();
		
		// Unhook
		remove_filter( 'wp_mail_from', array($this, 'get_from_address') );
		remove_filter( 'wp_mail_from_name', array($this, 'get_from_name') );
		remove_filter( 'wp_mail_content_type', array($this, 'get_content_type') );
	}
}
