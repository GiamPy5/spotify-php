<?php

namespace Giampaolo\Spotify\Tests\Follow\Stubs;

class ButtonStubWithLayoutExpectation
{
    public function expected()
    {
        $stub = <<<STUB
<iframe src="https://embed.spotify.com/follow/1/?uri=spotify:artist:1vCWHaC5f2uS3yhpwWbIA6&size=basic&theme=dark" width="300" height="56" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
STUB;

        return $stub;
    }
}