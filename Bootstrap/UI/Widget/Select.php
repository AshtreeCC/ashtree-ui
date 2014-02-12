<?php
namespace Bootstrap\UI\Widget;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Select extends \Ashtree\UI\Widget\Select {
    /**
     *
     */
    protected $widget;
    
    public function __construct($name, $params=null){
        parent::__construct($name, $params);
        
        $this->addClass('form-control');
    }
    
    public function getWidget() {
        $form_group = $this->widget->createElement('div');
        $form_group->setAttribute('class', 'form-group');
        if (!is_null($this->label))      $form_group->appendChild($this->label);
        if (!is_null($this->addon))      $form_group->appendChild($this->addon);
        else if (!is_null($this->input)) $form_group->appendChild($this->input);
        if (!is_null($this->help))       $form_group->appendChild($this->help);
        $this->widget->appendChild($form_group);
        
        return $this->widget;
    }
}

