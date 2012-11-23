<?php

#Khwaja Anas Nasarullah
#22 January 2010

#this function will help simplify the use of php mail functionalities
#can also be used to send multiple mails

class Mail_Helper
{
	private $to = '';
	private $from='';
	private $subject='';
	private $message='';
	private $cc='';
	private $bcc='';
	private $head='';
	/*
	public function Mailer($to,$from,$subject,$message)
	{
		$this->to = $to;
		$this->from = $from;
		$this->subject = $subject;
		$this->message = $message;
		$this->head = 'From: '. $from . "\r\n" .
    	'Reply-To: '. $from . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	}
	*/
	public function Mailer($to,$from,$subject,$message,$cc,$bcc)
	{
		$this->to = $to;
		$this->from = $from;
		$this->subject = $subject;
		$this->message = $message;
		$this->head = 'From: '. $from . "\r\n" .
		'Reply-To: '. $from . "\r\n" .
		'CC: '. $cc ."\r\n".
		'BCC: '. $bcc ."\r\n".
		'X-Mailer: PHP/' . phpversion();
	}
	public function send_mail()
	{
		$message='';
		if (mail($this->to, $this->subject, $this->message, $this->head)) {
			$message = "Message successfully sent!";
		} else {
			$message = "Message delivery failed...";
		}		
		return $message;
	}
	public function send_mail_list($senderlist)
	{
		//this function will send mail to multiple receivers with a given array os strings containting email addresses
		$message='';
		foreach($senderlist as $s)
		{
			if (mail($s, $this->subject, $this->message, $this->head)) {
				$message="Message successfully sent!";
			} else {
				$message="Message delivery failed...";
			}	
		}
	}
}
?>
