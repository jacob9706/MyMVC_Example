<?php
function raise_error($message, $type = "Error")
{
	$template = $GLOBALS['CONFIG_ERRORS']['error_template'];
	if (file_exists($template)) {
		include $template;
		if (strtolower($type) == "error")
			die();
	}
}