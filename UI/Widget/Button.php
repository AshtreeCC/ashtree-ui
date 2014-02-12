<?php
namespace Ashtree\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Button extends \Ashtree\UI\Widget {
    /**
     * 
     */
    private $wrapper;
    
    /**
     * 
     */
    protected $widget;
    
    protected $input;
    
    protected $attrib;
    
    
    protected $type = 'button';
    
    public function __construct($name, $params=null){
        parent::__construct($name, $params);
        
        if (isset($this->attrib['align'])) $this->setAlign($this->attrib['align']);
    }
    
    protected function setValue($value) {
        $this->input->nodeValue = $value;
    }
    
    protected function setAlign($align) {
        $this->wrapper = $this->widget->createElement('div');
        $this->wrapper->setAttribute('align', $align);
        $this->wrapper->appendChild($this->input);
    }
    
    public function getWidget() {
        if (!is_null($this->wrapper)) $this->widget->appendChild($this->wrapper);
        else if (!is_null($this->input)) $this->widget->appendChild($this->input);
        
        return $this->widget;
    }
}

