<?php

namespace Giampaolo\Spotify\Tests\Follow;

use Giampaolo\Spotify\Follow\Button;
use Giampaolo\Spotify\Tests\AbstractTest;

class ButtonTest extends AbstractTest
{
    public function testArtistSetterWithSpotifyHttpLink()
    {
        $button = new Button;

        $button->setArtist('https://open.spotify.com/artist/1vCWHaC5f2uS3yhpwWbIA6');

        $expected = '1vCWHaC5f2uS3yhpwWbIA6';

        $this->assertTrue($button->getArtist() === $expected);
    }

    public function testArtistSetterWithSpotifyUri()
    {
        $button = new Button;

        $button->setArtist('spotify:artist:1vCWHaC5f2uS3yhpwWbIA6');

        $expected = '1vCWHaC5f2uS3yhpwWbIA6';

        $this->assertTrue($button->getArtist() === $expected);
    }

    /**
     * @expectedException Giampaolo\Spotify\Follow\Exceptions\InvalidArgumentsException
     */
    public function testArtistSetterWithInvalidFormat()
    {
        $button = new Button;

        $button->setArtist('wrong_format:1vCWHaC5f2uS3yhpwWbIA6');
    }

    public function testLayoutSetterWithValidLayout()
    {
        $button = new Button;

        $button->setLayout('basic');

        $expected = 'basic';

        $this->assertTrue($button->getLayout() === $expected);
    }

    /**
     * @expectedException Giampaolo\Spotify\Follow\Exceptions\InvalidArgumentsException
     */
    public function testLayoutSetterWithWrongLayout()
    {
        $button = new Button;

        $button->setLayout('invalid_layout');
    }

    public function testThemeSetterWithValidLayout()
    {
        $button = new Button;

        $button->setTheme('dark');

        $expected = 'dark';

        $this->assertTrue($button->getTheme() === $expected);
    }

    /**
     * @expectedException Giampaolo\Spotify\Follow\Exceptions\InvalidArgumentsException
     */
    public function testThemeSetterWithWrongLayout()
    {
        $button = new Button;

        $button->setTheme('invalid_theme');
    }

    public function testShowButton()
    {
        $stub = new Stubs\ButtonStubWithLayoutExpectation;

        $button = new Button;

        $button->setArtist('https://open.spotify.com/artist/1vCWHaC5f2uS3yhpwWbIA6');
        $button->setLayout('basic');
        $button->setTheme('dark');

        $result = $button->show();

        $this->assertTrue($result === $stub->expected());
    }
}