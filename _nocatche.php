<?php 
function nocache() {
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // For HTTP/1.0 compatibility
header("Expires: 0"); // Proxies
header("Content-Type: text/html"); // Set the content type
}
?>