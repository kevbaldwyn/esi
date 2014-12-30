<?php namespace KevBaldwyn\Esi\Elements;

class Inc implements ElementInterface {

    const NAME = 'include';

    private $options = [];

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function getTagName()
    {
        return static::NAME;
    }

    public function attributes()
    {
        $atts = [];
        foreach($this->options as $key => $value) {
            $atts[] = $key . '="' . $value . '"';
        }
        return implode(' ', $atts);
    }

    public function content()
    {
        return '';
    }

    public function hasClosingTag()
    {
        return false;
    }

} 