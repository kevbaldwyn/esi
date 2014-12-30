<?php  namespace KevBaldwyn\Esi\Elements; 

abstract class Element implements ElementInterface {

    public function render($tagString)
    {
        return $tagString;
    }

} 