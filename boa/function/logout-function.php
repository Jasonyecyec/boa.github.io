<?php
session_start();
session_unset();
session_destroy();

//Go back to homepage
header("Location: ../index.php");