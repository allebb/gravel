<?php
use \PHPUnit_Framework_TestCase;
use Ballen\Gravel\Gravatar;

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
class GravelTest extends PHPUnit_Framework_TestCase
{

    const TEST_EMAIL_ADDRESS = 'bobbyallen.uk@gmail.com';
    const DEFAULT_AVATAR_SIZE = 120;
    const DEFaULT_RATING_TYPE = Gravatar::RATING_G;

    /**
     * Tests simple instantiation and output using the constructor parameter and the __toString() method.
     */
    public function testSimpleAvatarRequest()
    {
        $instance = new Gravatar(GravelTest::TEST_EMAIL_ADDRESS);
        return $this->assertEquals('https://secure.gravatar.com/avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=404&r=g', $instance);
    }

    /**
     * Tests simple instantiation and output using the constructor parameter and the __toString() method.
     */
    public function testAvatarRequest()
    {
        $instance = new Gravatar();
        $instance->setEmail(GravelTest::TEST_EMAIL_ADDRESS);
        return $this->assertEquals('https://secure.gravatar.com/avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=404&r=g', $instance->buildGravatarUrl());
    }

    /**
     * Test setting a custom avatar size.
     */
    public function testCustomSizeAvatarRequest()
    {
        $instance = new Gravatar(GravelTest::TEST_EMAIL_ADDRESS);
        $instance->setSize(300);
        return $this->assertEquals('https://secure.gravatar.com/avatar/f4e4a981ae664a57e37616d5d15931d7?s=300&r=g&d=404&r=g', $instance->buildGravatarUrl());
    }

    /**
     * Test setting a custom defalt avatar.
     */
    public function testCustomDefaultAvatarRequest()
    {
        $instance = new Gravatar(GravelTest::TEST_EMAIL_ADDRESS);
        $instance->setDefaultAvatar(Gravatar::DEFAULT_WAVATAR);
        return $this->assertEquals('https://secure.gravatar.com/avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=wavatar&r=g', $instance->buildGravatarUrl());
    }

    /**
     * Test requesting HTTP URL.
     */
    public function testUseHttpProtocol()
    {
        $instance = new Gravatar(GravelTest::TEST_EMAIL_ADDRESS);
        $instance->setUseHTTP();
        return $this->assertEquals('http://www.gravatar.com/avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=404&r=g', $instance->buildGravatarUrl());
    }

    /**
     * Test requesting HTTPS URL.
     */
    public function testUseHttpsProtocol()
    {
        $instance = new Gravatar(GravelTest::TEST_EMAIL_ADDRESS);
        $instance->setUseHTTPS();
        return $this->assertEquals('https://secure.gravatar.com/avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=404&r=g', $instance->buildGravatarUrl());
    }

    /**
     * Test setting a custom rating.
     */
    public function testSetRating()
    {
        $instance = new Gravatar(GravelTest::TEST_EMAIL_ADDRESS);
        $instance->setRating(Gravatar::RATING_X);
        return $this->assertEquals('https://secure.gravatar.com/avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=x&d=404&r=x', $instance->buildGravatarUrl());
    }
}
