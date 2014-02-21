<?php

require '../src/Ballen/Gravel/Gravatar.php';

use Ballen\Gravel\Gravatar;

/**
 * A very simple example of how to access and use the class...
 * - We set the email address of the Gravatar we want to display.
 * - We then set the default avatar, if Gravatar does not have an avatar for that email address.
 * - Set the rating threshold, this example we set 'mm' which means '', we will not return a Gravatar unless its in this band.
 * - We request that we want a HTTPS URL (great for sites that use SSL certificates)
 * - We then set the size of the gravatar to '220px' as opposed to the default which would be 120px
 * - Finally we grab the image URL based on our settings above using '->buildGravatarUrl();'
 */
$mygravatar = new Gravatar();
$mygravatar->setEmail('bobbyallen.uk@gmail.com')
        ->setDefaultAvatar('mm')
        ->setRating('x')
        ->setUseHTTPS()
        ->setSize(220);

echo "<img src=\"" . $mygravatar->buildGravatarURL() . "\">";
