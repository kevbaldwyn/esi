<?php namespace KevBaldwyn\Tests\Esi;

use \Mockery as m;
use \PHPUnit_Framework_TestCase;
use KevBaldwyn\Esi\Writer;

class WriterTest extends PHPUnit_Framework_TestCase {

    public function testRenderWithoutClosingTag()
    {
        $el = static::getElementMock();
        $el->shouldReceive('hasClosingTag')->andReturn(false);
        $el->shouldReceive('content')->andReturn('');
        $el->shouldReceive('attributes')->andReturn('');
        $writer = new Writer($el);

        $this->assertSame('<esi:name  />', $writer->getTagString());
    }

    public function testRenderWithClosingTag()
    {
        $el = static::getElementMock();
        $el->shouldReceive('hasClosingTag')->andReturn(true);
        $el->shouldReceive('content')->andReturn('');
        $el->shouldReceive('attributes')->andReturn('');
        $writer = new Writer($el);

        $this->assertSame('<esi:name  ></esi:name>', $writer->getTagString());
    }

    static public function getElementMock()
    {
        $el = m::mock('KevBaldwyn\Esi\Elements\ElementInterface');
        $el->shouldReceive('getTagName')->andReturn('name');

        return $el;
    }
}