<?php

session_start();

session_destroy();

header("location:?m=inicio");

exit();

?>