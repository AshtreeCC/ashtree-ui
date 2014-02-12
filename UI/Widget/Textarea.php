<?php
namespace Ashtree\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Textarea extends \Ashtree\UI\Widget {
    /**
     *
     */
    protected $widget;
    
    protected $input;
    
    protected $attrib;
    
    protected $type = 'textarea';
    
    protected function setValue($value) {
        $this->input->nodeValue = $value;
    }
}

