<?php namespace KevBaldwyn\Esi;

class Writer {

    private $element;
    private $string;

    public function __construct(Elements\ElementInterface $el)
    {
        $this->element = $el;
    }

    public function getTagString()
    {
        $this->string = '<esi:' . $this->element->getTagName() . ' ';
        $this->string .= trim($this->element->attributes());
        if($this->element->hasClosingTag()) {
            $this->string .= ' >';
        }

        $this->string .= $this->element->content();

        if($this->element->hasClosingTag()) {
            $this->string .= '</esi:' . $this->element->getTagName() . '>';
        }else{
            $this->string .= ' />';
        }

        return $this->string;
    }

    public function render()
    {
        return $this->element->render($this->string);
    }
} 