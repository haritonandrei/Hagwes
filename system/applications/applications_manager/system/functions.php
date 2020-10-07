<?php

/**
 * Functions file.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

/**
 * Recursive function to remove a directory and its content.
 *
 * @param string $src The URL of the directory.
**/

function remove_directory($src)
{
    $dir = opendir($src);
	
    while(false !== ( $file = readdir($dir)) )
	{
        if (( $file != '.' ) && ( $file != '..' ))
		{
            $full = $src . '/' . $file;
            
			if ( is_dir($full) )
			{
                remove_directory($full);
            }
            else
			{
                unlink($full);
            }
        }
    }
    closedir($dir);
    rmdir($src);
}

/**
 * Recursive function to get the size of a directory.
 *
 * @param string $src The URL of the directory.
**/

function get_directory_size($src)
{
	$size = 0;
	
	foreach (glob(rtrim($src, '/').'/*', GLOB_NOSORT) as $each)
	{
		$size += is_file($each) ? filesize($each) : get_directory_size($each);
	}
	
	return $size;
}

?>