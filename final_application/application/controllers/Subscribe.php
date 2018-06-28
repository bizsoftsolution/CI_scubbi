<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Subscribe extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
		{
			redirect('login');
		}
			
	}
	function index()
	{
		$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('SAdmin/Subscribe/subscribe');
			$this->load->view('template/footer');
	}
	function sendMail()
	{
		$this->load->library('email');

			$subject = 'Confirm your subscription to the Scubbi Diving Portal News email list';
			//$message = '<p>Hi.</p>';

			// Get full html:
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="https://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
				<title>' . html_escape($subject) . '</title>
				<style type="text/css">
					body {
						font-family: Arial, Verdana, Helvetica, sans-serif;
						font-size: 16px;
					}
				</style>
			</head>
			<body>
				Hi
				<br><br>
				You received this message because someone requested an email subscription for anitha.bizsoft@gmail.com to a Scubbi Diving Portal.  If you did not make this request, please ignore the rest of this message.
<br><br>
Hello there,
<br>
You recently requested an email subscription to Scubbi Diving Portal . We cant wait to send the updates you want via email.
<br>
https://www.scubbi.com
<br><br>
--
This message was sent to you by Scubbi diving Portal (https://www.scubbi.com)
You received this message because someone requested a subscription to the feed, https://www.scubbi.com
If you received this in error, please disregard.  Do not reply directly to this email.
				
			</body>
			</html>';
			// Also, for getting full html you may use the following internal method:
			//$body = $this->email->full_html($subject, $message);

			$result = $this->email
					->from('sendmailbiz@gmail.com')
					->reply_to('sendmailbiz@gmail.com')    // Optional, an account where a human being reads.
					->to('anitha.bizsoft@gmail.com')
					->subject($subject)
					->message($body)
					->send();

			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();

			exit;

	}
}
?>