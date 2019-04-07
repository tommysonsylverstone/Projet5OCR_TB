<?php

session_start();
session_destroy();
header('Location: mainPageView.php');
