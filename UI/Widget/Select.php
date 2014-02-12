<?php
namespace Ashtree\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Select extends \Ashtree\UI\Widget {
    /**
     *
     */
    protected $widget;
    
    protected $input;
    
    protected $attrib;
    
    protected $type = 'select';
    
    protected function setValue($value){
        if (isset($this->attrib['options'])) {
            foreach($this->attrib['options'] as $option=>$text) {
                $key = (isset($this->attrib['usekey']) && $this->attrib['usekey']) ? $option : $text;
                $option = $this->widget->createElement('option');
                $option->setAttribute('value', $key);
                $option->nodeValue = $text;
                if ($value == $key) $option->setAttribute('selected', 'selected');
                $this->input->appendChild($option);
            }
        }
        unset($this->attrib['options']);
    }
}

