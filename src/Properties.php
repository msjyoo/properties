<?php

namespace sekjun9878\Properties;

/**
 * Class Properties
 * @package sekjun9878\Properties
 */
class Properties
{
	/**
	 * Parse a properties string.
	 *
	 * @param string $input
	 * @return array|bool
	 */
	public static function parse($input)
	{
		$matches = [];
		$output = [];

		if(!preg_match_all('/([a-zA-Z0-9\-_\.]*)=([^\r\n]*)/u', $input, $matches, PREG_SET_ORDER))
		{
			return false;
		}

		foreach($matches as $order => $x)
		{
			$key = trim($x[1]);
			$value = trim($x[2]);

			switch(strtolower($value))
			{
				case "on":
				case "true":
				case "yes":
					$value = true;
					break;
				case "off":
				case "false":
				case "no":
					$value = false;
					break;
			}

			$output[$key] = $value;
		}

		return $output;
	}

	/**
	 * Dump an array to a properties string.
	 *
	 * @param array $input
	 * @return string
	 */
	public static function dump(array $input)
	{
		// Get a default value of UTC if not set, and set it.
		// This is set for the date() function below.
		date_default_timezone_set(date_default_timezone_get());

		$output = "#Properties Config file\r\n#".date("D M j H:i:s T Y")."\r\n";

		foreach($input as $key => $value)
		{
			if(is_bool($value) === true)
			{
				$value = ($value === true ? "on" : "off");
			}
			else if(is_array($value))
			{
				$value = implode(",", $value);
			}

			$output .= $key."=".$value."\r\n";
		}

		return $output;
	}
}