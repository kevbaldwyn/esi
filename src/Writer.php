<?php namespace KevBaldwyn\Esi;

class Writer {

    private $element;

    public function __construct(Elements\ElementInterface $el)
    {
        $this->element = $el;
    }

    public function render()
    {
        $str = '<esi:' . $this->element->getTagName() . ' ';
        $str .= trim($this->element->attributes());
        if($this->element->hasClosingTag()) {
            $str .= ' >';
        }

        $str .= $this->element->content();

        if($this->element->hasClosingTag()) {
            $str .= '</esi:' . $this->element->getTagName() . '>';
        }else{
            $str .= ' />';
        }

        return $str;
    }
} 