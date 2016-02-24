<?php

/**
 * Giampaolo\Spotify\Follow\Button
 *
 * @author Giampaolo Falqui
 * @license Apache-2.0 http://www.apache.org/licenses/LICENSE-2.0
 */

namespace Giampaolo\Spotify\Follow;

use Giampaolo\Spotify\Follow\Exceptions\InvalidArgumentsException;

class Button
{
    protected $artist;

    protected $layout;

    protected $theme;

    /**
     * Sets the artist.
     *
     * @param string $artist It can be either a Spotify HTTP Link or a  Spotify URI.
     *
     * @throws InvalidArgumentsException if an invalid format is used.
     */
    public function setArtist($artist)
    {
        if (strrpos($artist, '/') !== false)
        {
            $this->artist = substr($artist, strrpos($artist, '/') + 1);

            return $this;
        }

        if (strrpos($artist, 'spotify:artist') !== false)
        {
            $this->artist = substr($artist, strrpos($artist, ':') + 1);

            return $this;
        }

        throw new InvalidArgumentsException("{$artist} has an invalid format and can not be used.");
    }

    /**
     * Gets the artist.
     *
     * @return string Artist ID.
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Sets the layout.
     *
     * @param string $layout Either basic (200x25) or detail (300x56).
     *
     * @throws InvalidArgumentsException if an invalid layout is used.
     */
    public function setLayout($layout)
    {
        $validLayouts = ['basic', 'detail'];

        if (! in_array($layout, $validLayouts))
        {
            throw new InvalidArgumentsException("{$layout} is an invalid layout and can not be used.");
        }

        $this->layout = $layout;

        return $this;
    }

    /**
     * Gets the layout.
     *
     * @return string Layout type.
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Sets the theme.
     *
     * @param string $theme Either bright or dark.
     *
     * @throws InvalidArgumentsException if an invalid theme is used.
     */
    public function setTheme($theme)
    {
        $validThemes = ['bright', 'dark'];

        if (! in_array($theme, $validThemes))
        {
            throw new InvalidArgumentsException("{$theme} is an invalid layout and can not be used.");
        }

        $this->theme = $theme;

        return $this;
    }

    /**
     * Gets the theme.
     *
     * @return string Theme type.
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Builds the Follow Button with the parameters set.
     *
     * @return string Iframe HTML code.
     */
    public function show()
    {
        $template = file_get_contents(__DIR__ . '/resources/layout.html');

        $code = sprintf($template, $this->artist, $this->layout, $this->theme);

        return $code;
    }
}