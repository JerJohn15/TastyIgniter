<?php
/**
 * TastyIgniter
 *
 * An open source online ordering, reservation and management system for restaurants.
 *
 * @package Igniter
 * @author Samuel Adepoyigi
 * @copyright (c) 2013 - 2016. Samuel Adepoyigi
 * @copyright (c) 2016 - 2017. TastyIgniter Dev Team
 * @link https://tastyigniter.com
 * @license http://opensource.org/licenses/MIT The MIT License
 * @since File available since Release 1.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * File helper functions
 *
 * @category       Helpers
 * @package        Igniter\Helpers\TI_file_helper.php
 * @link           http://docs.tastyigniter.com
 */

if ( ! function_exists('unzip_file'))
{
	/**
	 * Unzip File
	 *
	 * @param      $file
	 * @param null $extractTo
	 *
	 * @return string
	 */
	function unzip_file($file, $extractTo = NULL)
	{
		if ( ! class_exists('ZipArchive', FALSE)) return FALSE;

		$zip = new ZipArchive;

		(!empty($extractTo)) OR $extractTo = dirname($file);

		if ( ! file_exists($file)) return FALSE;

		chmod($file, 0777);

		if ($zip->open($file) === TRUE) {
			$dirname = trim($zip->getNameIndex(0), DIRECTORY_SEPARATOR);

			$zip->extractTo($extractTo);
			$zip->close();

			return $dirname;
		} else {
			return FALSE;
		}
	}
}

/* End of file TI_file_helper.php */
/* Location: ./system/tastyigniter/helpers/TI_file_helper.php */