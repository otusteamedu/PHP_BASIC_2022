<?php

include_once('functions.php');

if (isset($_FILES['picture']) && $_FILES['picture']['size'] > 0) {
    addedImages($_FILES, '../../lib/img/gallery/');
}
