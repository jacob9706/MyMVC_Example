<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12
 * URL: Controller_Template.php
 */

require_once 'Base_Template.php';
class Controller_Template extends Base_Template
{
    /*********************************************
     * This is used to load a new view. All it
     * does is instantiate a new View_Template
     * object
     *********************************************/
    public function view($templates, array $variables)
    {
        new View_Template($templates, $variables);
    }
}