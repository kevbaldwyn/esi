<?php namespace KevBaldwyn\Esi\Elements;

interface ElementInterface {

    public function getTagName();

    public function attributes();

    public function content();

    public function hasClosingTag();
} 