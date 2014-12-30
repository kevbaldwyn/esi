<?php namespace KevBaldwyn\Tests\Esi\Elements;

use \Mockery as m;
use \PHPUnit_Framework_TestCase;
use KevBaldwyn\Esi\Elements\Inc;

class IncTest extends PHPUnit_Framework_TestCase {

    public function testBuildAttributes()
    {
        $el = new Inc([
            'src' => '/some/path',
            'onerror' => 'continue'
        ]);
        $this->assertSame('src="/some/path" onerror="continue"', $el->attributes());
    }

} 