<?php
require '../src/Gravatar.php';
use Ballen\Gravel\Gravatar;

/**
 * The simplest example which demonstrate the quickest way to output a persons avatar using the class constructor and the __toString() method to retrieve.
 */
$example1 = new Gravatar("bobbyallen.uk@gmail.com");
echo sprintf('<img src="%s">', $example1);

/**
 * Another example specifying furhter options..
 * - We set the email address of the Gravatar we want to display.
 * - We then set the default avatar that will be displayed if Gravatar does not have a valud avatar for that email address.
 * - Set the rating threshold, this example we set 'pg' which means '', we will not return a Gravatar unless its in under this band.
 * - We request that we want to use a HTTP URL instead (by default URLs will now use HTTP since v2.0.0)
 * - We then set the size of the gravatar to '220px' as opposed to the default which would be 120px
 * - Finally we grab the image URL based on our settings above using '->buildGravatarUrl();'
 */
$example2 = new Gravatar();
$example2->setEmail('bobbyallen.uk@gmail.com') // You can optionally set (or overide) the username here instead of using the class constructor as per the first example.
    ->setDefaultAvatar(Gravatar::DEFAULT_IDENTICON) // If the avatar does not exist, we'll output a predefined default type.
    ->setRating(Gravatar::RATING_PG) // Optionally set the rating type that we'll allow
    ->setUseHTTP() // We choose to use HTTP instead of the default HTTPS!
    ->setSize(220); // Don't want the default 120px? - No problem, we'll request the 220px by 220px version instead...
echo sprintf('<img src="%s">', $example2->buildGravatarUrl());

/**
 * An example of an invalid email address using a pre-set default Gravatar avatar:
 */
$example3 = new Gravatar('fakeemail@bobbyallen.me');
$example3->setDefaultAvatar(Gravatar::DEFAULT_RETRO);
echo sprintf('<img src="%s">', $example3->buildGravatarUrl());

/**
 * An example of specifying your own custom default avatar - simply specify the URL!
 */
$example4 = new Gravatar('fakeemail@bobbyallen.me');
$example4->setDefaultAvatar('http://blog.bobbyallen.me/wp-content/uploads/2016/01/custom-default-avatar.png');
echo sprintf('<img src="%s">', $example4->buildGravatarUrl());
