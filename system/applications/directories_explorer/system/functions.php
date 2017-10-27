<?php

/**
 * Functions file.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

/**
 * Getter for the content of a directory.
 *
 * @param string $directory The URL of the directory to be analyzed.
 * @return array Returns the data array with each element containing an associative array.
**/

function get_content($directory)
{
	$elements = array();
	// DIRECTORY
	if(is_dir($directory))
	{
		$content = scandir($directory);
		// Showing folder's content
		for($i=0; $i<sizeof($content); $i++)
		{
			$subdirectory = $content[$i];
			
			if($directory != "/")
			{
				$subdirectory = "/".$content[$i];
			}
			
			if(!($content[$i]=="." || $content[$i]==".."))
			{
				array_push(
					$elements,
					array(
						'url' => 'index.php?dir='.$directory.$subdirectory,
						'name' => $content[$i]
					)
				);
			}
		}
	// FILE
	}
	else
	{
		// LINKER
		if(isset($_GET['link']))
		{
			// If there is a link
			array_push( $elements, array('url' => '', 'name' => $_GET['link']) );
		}
		else
		{
			// If there isn't a link
			array_push( $elements, array('url' => 'system/tools/linker.php?file='.$directory, 'name' => 'Get link') );
		}
		// TRANSFERER
		array_push( $elements, array('url' => 'system/tools/transferer.php?file='.$directory, 'name' => 'Download') );
		// DELETER
		array_push( $elements, array('url' => 'system/tools/deleter.php?path='.$directory, 'name' => 'Delete') );
	}
	return $elements;
}

/**
 * Checker for the form to allow the user to make a new folder.
 *
 * @param string $directory The URL of the directory into which to create the folder.
 * @return boolean Returns TRUE if the form can be displayed.
**/

function is_needed_new_folder_form($directory)
{
	// SEE: ternary operator.
	return (is_dir($directory))?TRUE:FALSE;
}

/**
 * Checker for the link to allow the user to delete a folder.
 *
 * @param string $directory The URL of the directory to delete.
 * @return boolea Returns TRUE if the link is needed.
**/

function is_needed_delete_dir_link($directory)
{
	// SEE: ternary operator.
	return (is_dir($directory) && $directory != "../../..//uploads" && strpos($directory,'uploads'))?TRUE:FALSE;
}

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

?>