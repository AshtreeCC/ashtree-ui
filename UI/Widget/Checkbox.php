<?php
namespace Ashtree\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Checkbox extends \Ashtree\UI\Widget {
    /**
     * 
     */
    protected $widget;
    
    protected $input;
    
    protected $label;
    
    protected $type = 'checkbox';
    
    public function __construct(){
        parent::__construct();
        
        if ($this->attrib['inline']) $this->label->setAttribute('class', 'checkbox-inline');
    }
    
    protected function setValue($value) {
        $this->input->nodeValue = $value;
    }
    
    public function getWidget() {
        $this->label->appendChild($this->input);
        $this->widget->appendChild($this->label);
        
        return $this->widget;
    }
}

