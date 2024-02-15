<?php
session_start();

session_destroy();

echo "
<script>
alert('anda Telah Logout');
location='login.php';
</script>
";
