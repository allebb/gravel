<?php

require '../src/Ballen/Gravel/Gravatar.php';

use Ballen\Gravel\Gravatar;

$mygravatar = new Gravatar();
$mygravatar->setEmail('bobbyallen.uk@gmail.com')
        ->setDefaultAvatar('mm')
        ->setRating('x')
        ->setUseHTTPS()
        ->setSize(220);

echo "<img src=\"" . $mygravatar->buildImageURL() . "\">";
