<?php
namespace Ashtree\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Hidden extends \Ashtree\UI\Widget {
    /**
     * 
     */
    protected $widget;
    
    protected $input;
    
    protected $type = 'hidden';
    
    public function getWidget() {
        if (!is_null($this->input)) $this->widget->appendChild($this->input);
        
        return $this->widget;
    }
}

