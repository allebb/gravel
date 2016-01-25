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
     * Instructs not to load any image if none is associated with the email hash, instead return an HTTP 404 (File Not Found) response.
     * @see https://en.gravatar.com/site/implement/images/
     */
    const DEFAULT_404 = "404";

    /**
     * A simple, cartoon-style silhouetted outline of a person "Mystery-man" (does not vary by email hash)
     * @see https://en.gravatar.com/site/implement/images/
     */
    const DEFAULT_MYSTERYMAN = "mm";

    /**
     * A geometric pattern based on an email hash
     * @see https://en.gravatar.com/site/implement/images/
     */
    const DEFAULT_IDENTICON = "identicon";

    /**
     * A generated 'monster' with different colors, faces, etc
     * @see https://en.gravatar.com/site/implement/images/
     */
    const DEFAULT_MONSTER = "monsterid";

    /**
     * Generated faces with differing features and backgrounds
     * @see https://en.gravatar.com/site/implement/images/
     */
    const DEFAULT_WAVATAR = "wavatar";

    /**
     * Awesome generated, 8-bit arcade-style pixelated faces
     * @see https://en.gravatar.com/site/implement/images/
     */
    const DEFAULT_RETRO = "retro";

    /**
     * A transparent PNG image (border added to HTML below for demonstration purposes)
     * @see https://en.gravatar.com/site/implement/images/
     */
    const DEFAULT_BLANK = "blank";

    /**
     * Suitable for display on all websites with any audience type.
     * @see https://en.gravatar.com/site/implement/images/
     */
    const RATING_G = 'g';

    /**
     * May contain rude gestures, provocatively dressed individuals, the lesser swear words, or mild violence.
     * @see https://en.gravatar.com/site/implement/images/
     */
    const RATING_PG = 'pg';

    /**
     * May contain such things as harsh profanity, intense violence, nudity, or hard drug use.
     * @see https://en.gravatar.com/site/implement/images/
     */
    const RATING_R = 'r';

    /**
     * May contain hardcore sexual imagery or extremely disturbing violence.
     * @see https://en.gravatar.com/site/implement/images/
     */
    const RATING_X = 'x';

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
    private $default_avatar = self::DEFAULT_404;

    /**
     * Set the threshold of the Gravatar image.
     * @var string Rating setting. (Default is set to 'g')
     */
    private $rating = self::RATING_G;

    /**
     * Enable Gravatar URL over HTTPS (good for sites using HTTPS!)
     * @var bool Use the HTTPS protocol to display avatar images. (Default is HTTPS)
     */
    private $secure = true;

    /**
     * Class constructor.
     * @param string $email Optionally construct the object with the email address.
     * @return void
     */
    public function __construct($email = null)
    {
        if (!is_null($email)) {
            $this->setEmail($email);
        }
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
        $this->email = trim(strtolower($email));
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
        $this->default_avatar = $option;
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
        $this->rating = $rating;
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
        $base_url = self::HTTPS_GRAVATAR_URL;
        if (!$this->secure) {
            $base_url = self::HTTP_GRAVATAR_URL;
        }
        return $base_url . 'avatar/' . $this->generateAddressHash() . '?s=' . $this->size . '&r=' . $this->rating . '&d=' . $this->default_avatar;
    }

    /**
     * Returns the Gravar URL of the current instance.
     * @return string
     */
    public function __toString()
    {
        return $this->buildGravatarUrl();
    }
}
