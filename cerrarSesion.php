<?php
session_destroy();
header("Location: index.html", TRUE, 301);
?>