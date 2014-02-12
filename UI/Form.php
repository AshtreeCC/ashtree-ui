<?php
namespace Ashtree\UI;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Form {
   /**
    *
    */
    protected $dom;

    protected $form;
    
    protected $attrib;
    
    /**
     * 
     */
    public $method = 'post';
    
    public $action = '';
    
    public $role = 'form';
    
    /**
     * 
     * @param array $params
     */
    public function __construct($params) {
        $this->dom = new \DOMDocument();
        $this->form = $this->dom->createElement('form');
        
        // Layout
        $this->attrib = $params;
        
        if (isset($params['method'])) $this->method = $params['method'];
        if (isset($params['action'])) $this->action = $params['action'];
        if (isset($params['role']))   $this->role = $params['role'];
    }
    
    public function add($element) {
        foreach ($element->getWidget()->childNodes as $widget) {
            
            $this->form->appendChild($this->dom->importNode($widget, true));
        }
        
    }
    
    protected function setAttrib($name, $value) {
        $this->form->setAttribute($name, $value);
    }
    
    public function render() {
        $this->setAttrib('method', $this->method);
        $this->setAttrib('action', $this->action);
        $this->setAttrib('role', $this->role);
        print $this->dom->saveHTML($this->form);
    }
}

