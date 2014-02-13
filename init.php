<?php
namespace Ashtree;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Autoload($className) {
    #echo __DIR__ . "/&lt;{$className}&gt;.php<br />";
    if (substr_count($className, 'Ashtree')) {
        $className = str_replace(['\\', __NAMESPACE__ . '/'], ['/', ''], $className);
        require_once(__DIR__ . "/{$className}.php");
        
    }
}

spl_autoload_register('\Ashtree\Autoload');





