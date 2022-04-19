<?php

if(empty($segments[2]) && $method === 'GET')
    echo 'settings';
elseif ($segments[2] === 'add' && $method === 'GET')
    echo'';
elseif ($segments[2] === 'add' && $method === 'POST')
    echo'';