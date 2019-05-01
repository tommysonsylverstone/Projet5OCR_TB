<?php

function loadClass($class) {
	require 'models/'.$class.'.php';
}

spl_autoload_register('loadClass');
