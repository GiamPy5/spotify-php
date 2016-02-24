<?php

namespace Giampaolo\Spotify\Tests;

use Mockery as M;
use PHPUnit_Framework_TestCase;

abstract class AbstractTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        M::close();
    }
}