<?php

function chargeClass($class) {
	require '../models/'.$class.'.php';
}

spl_autoload_register('chargeClass');
