<?php namespace KevBaldwyn\Esi\Elements;

use Closure;

class Inc extends Element {

    const NAME = 'include';

    private $options = [];

    /**
     * @var Closure
     * if the system is running in "developemnt" mode for example then this callback can be used to generate the content
     * rather than have the gateway generate the content the src url
     *
     * ie, bind this object into an ioc container, with the Closure checking a config then mapping the options to a MVC router and returning a view
     * if not in dev then just return the tag passed:
     *
     * $ioc->bind('esi.include', function($ioc) {
     *      return new KevBaldwyn\Esi\Elements\Inc([], function($tagString, $options) {
     *          if(Config::get('env') == 'development') {
     *              // use the src to map to a router and build a view
     *              $options['src'];
     *              $view = ...
     *              return $view;
     *          }
     *          return $tagString;
     *      });
     * });
     *
     * $element = $ioc->make('esi.include');
     * $element->setOptions(['src' => '/some/path']);
     * $writer = new Writer($element);
     * echo $writer->render();
     */
    private $inlineCallback;

    public function __construct(array $options = [], Closure $inlineCallback = null)
    {
        $this->inlineCallback = $inlineCallback;
        $this->setOptions($options);
    }

    public function setOptions(array $options = [])
    {
        $this->options = $options;
    }

    public function render($tagString)
    {
        if(!is_null($this->inlineCallback)) {
            $fn = $this->inlineCallback;
            return $fn($tagString, $this->options);
        }
        return $tagString;
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