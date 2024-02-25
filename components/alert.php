<?php
if (isset($success_msg)) {
    foreach ($success_msg as $msg) {
        echo '<script>alert("' . $msg . '")</script>';
    }
}
if (isset($warning_msg)) {
    foreach ($warning_msg as $msg) {
        echo '<script>alert("' . $msg . '")</script>';
    }
}
if (isset($error_msg)) {
    foreach ($error_msg as $msg) {
        echo '<script>alert("' . $msg . '")</script>';
    }
}
if (isset($info_msg)) {
    foreach ($info_msg as $msg) {
        echo '<script>alert("' . $msg . '")</script>';
    }
}
?>
