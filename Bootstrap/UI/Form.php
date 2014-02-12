<?php
namespace Bootstrap\UI;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Form extends \Ashtree\UI\Form {
    /**
     * 
     */
    protected $form;
    
    protected $attrib;
    
    public function __construct($params=null){
        parent::__construct($params);
        
        if (isset($this->attrib['inline']))     $this->form->setAttribute('class', 'form-inline');
        if (isset($this->attrib['horizontal'])) $this->form->setAttribute('class', 'form-horizontal'); 
    }
}
