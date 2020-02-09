<?php

namespace Ballen\Gravel\Facades;

/**
 * GravelMapper
 *
 * Gravatar Mapper provides a binding/class method aliases for Laravel to provide friendly syntax.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/gravel
 * @link http://www.bobbyallen.me
 *
 */
class GravatarMapper
{

    /**
     * Instance container for Gravatar Library dependency injection.
     * @var Ballen\Gravel\Gravatar
     */
    private $gravatar;

    public function __construct()
    {
        $this->gravatar = new Ballen\Gravel\Gravatar();
    }

    /**
     * Make the gravatar with the supplied email address.
     * @param string $email The email address for the Gravatar.
     * @return Ballen\Gravel\Gravatar
     */
    public function make($email)
    {
        $this->gravatar->setEmail($email);
        return $this;
    }

    /**
     * Set a custom gravatar size, default is 120px.
     * @param int $size Gravatar image size
     * @return Ballen\Gravel\Gravatar
     */
    public function size($size)
    {
        $this->gravatar->setSize($size);
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
    public function defaultGravatar($option)
    {
        $this->gravatar->setDefaultAvatar($option);
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
    public function rating($rating)
    {
        $this->gravatar->setRating($rating);
        return $this;
    }

    /**
     * Returns a HTTPS formatted URL instead, ideal for sites that implement HTTPS and do not wish to trigger SSL warnings regarding 'some content on this page is not encrytped'.
     * @param boolean $enable Retreive HTTPS formatted Gravatar links?
     * @return \Ballen\Gravel\Gravatar
     */
    public function https($enable = true)
    {
        $this->gravatar->setUseHTTPS();
        if (!$enable) {
            $this->gravatar->setUseHTTP();
        }
        return $this;
    }

    /**
     * Builds and returns the final Gravatar URL.
     * @return string The URL to the Gravatar Image.
     */
    public function get()
    {
        return $this->gravatar->buildGravatarUrl();
    }
}
