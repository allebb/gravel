<?php

namespace Ballen\Gravel;

/**
 * Gravel
 *
 * Gravel is a PHP library which provides easy access to get and display Gravatars.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/gravel
 * @link http://www.bobbyallen.me
 *
 */
class Gravatar
{

    /**
     * *
     * The standard 'HTTP' (non-secure) URL to gravatar.com.
     */
    const HTTP_GRAVATAR_URL = 'http://www.gravatar.com/';

    /**
     * The secure 'HTTPS' URL to gravatar.com.
     */
    const HTTPS_GRAVATAR_URL = 'https://secure.gravatar.com/';

    /**
     * The email address of which you want to return the Gravatar for.
     * @var string Email address for the user to return the Gravatar for.
     */
    private $email;

    /**
     * The size of the Gravatar to return.
     * @var int The size of the Gravatar to display.
     */
    private $size = 120;

    /**
     * Options for the default avatar to return when the avatar does not meet
     * the rating threshold or when no gravar is found for the user.
     * @var string Default gravatar image.
     */
    private $default_avatar = '404';

    /**
     * Set the threshold of the Gravatar image.
     * @var string Rating setting. (Default is set to 'g')
     */
    private $rating = 'g';

    /**
     * Enable Gravatar URL over HTTPS (good for sites using HTTPS!)
     * @var bool Use the HTTPS protocol to display avatar images. (Default is HTTPS)
     */
    private $secure = true;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        
    }

    /**
     * Generates the Hash for the email address suppiled.
     * @return string md5 hash of the email supplied.
     */
    private function generateAddressHash()
    {
        return md5($this->email);
    }

    /**
     * Set sthe email address for the person.
     * @param string $email The Email address of the Gravatar account.
     * @return \Ballen\Gravel\Gravatar
     */
    public function setEmail($email)
    {
        $this->email = (string) trim(strtolower($email));
        return $this;
    }

    /**
     * Set the avatar size you would like to get back.
     * @param int $size The size of the Gravatar to get back. (Default is 120)
     * @return \Ballen\Gravel\Gravatar
     */
    public function setSize($size = 120)
    {
        $this->size = (int) $size;
        return $this;
    }

    /**
     * Options for the default avatar to return when the avatar does not meet
     * the rating threshold or when no gravar is found for the user. Valid options
     * are:
     *
     * '404'      : do not load any image if none is associated with the email hash, instead return an HTTP 404 (File Not Found) response
     * 'mm'       : (mystery-man) a simple, cartoon-style silhouetted outline of a person (does not vary by email hash)
     * 'identicon': a geometric pattern based on an email hash
     * 'monsterid': a generated 'monster' with different colors, faces, etc
     * 'wavatar'  : generated faces with differing features and backgrounds
     * 'retro'    : awesome generated, 8-bit arcade-style pixelated faces
     * 'blank'    : a transparent PNG image (border added to HTML below for demonstration purposes)
     * @param string $option The prefix of the default avatar to return if no valid Gravatar is found for the supplied email address.
     * @return \Ballen\Gravel\Gravatar
     */
    public function setDefaultAvatar($option)
    {
        $this->default_avatar = (string) $option;
        return $this;
    }

    /**
     * Set the rating threshold, will not return a Gravatar unless its in this band.
     * Valid options are ('g' is default!)
     * 
     * 'g' : suitable for display on all websites with any audience type.
     * 'pg': may contain rude gestures, provocatively dressed individuals, the lesser swear words, or mild violence.
     * 'r' : may contain such things as harsh profanity, intense violence, nudity, or hard drug use.
     * 'x' : may contain hardcore sexual imagery or extremely disturbing violence.
     * @param string $rating
     * @return \Ballen\Gravel\Gravatar
     */
    public function setRating($rating)
    {
        $this->rating = (string) $rating;
        return $this;
    }

    /**
     * Set the protocol to be used for the image URL to HTTPS.
     * @return \Ballen\Gravel\Gravatar
     */
    public function setUseHTTPS()
    {
        $this->secure = true;
        return $this;
    }

    /**
     * Set the protocol to be used for the image URL to HTTP.
     * @return \Ballen\Gravel\Gravatar
     */
    public function setUseHTTP()
    {
        $this->secure = false;
        return $this;
    }

    /**
     * Builds and returns the final Gravatar URL.
     * @return string The URL to the Gravatar Image.
     */
    public function buildGravatarUrl()
    {
        if ($this->secure == true) {
            $first_segment = self::HTTPS_GRAVATAR_URL;
        } else {
            $first_segment = self::HTTP_GRAVATAR_URL;
        }
        if ($this->rating != null) {
            $rating = '&r=' . $this->rating;
        } else {
            $rating = '';
        }
        return (string) $first_segment . 'avatar/' . $this->generateAddressHash() . '?s=' . $this->size . '&r=' . $this->rating . '&d=' . $this->default_avatar . '' . $rating;
    }

    /**
     * @deprecated since 1.1.0
     * @return string The URL to the Gravatar Image.
     */
    public function buildImageURL()
    {
        return $this->buildGravatarUrl();
    }
}
