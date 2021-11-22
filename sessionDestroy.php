<?php
ob_start();
session_start();
session_destroy();
header("Location: L7grifes.html");
exit;
ob_end_flush();
