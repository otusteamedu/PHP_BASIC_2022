<?php

function getImages(): array {
    return array_diff(scandir("img"), array('..', '.'));
}