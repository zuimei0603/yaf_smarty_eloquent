<?php
/**
 * Created by PhpStorm.
 * User: sgyh
 * Date: 2017/5/24
 * Time: 15:42
 */

class Smarty_Adapter implements \Yaf\View_Interface
{
    /**
     * Smarty object
     * @var Smarty
     */
    public $_smarty;

    /**
     * Constructor
     *
     * @param string $tmplPath
     * @param array $extraParams
     * @return void
     */
    public function __construct($tmplPath = null, $extraParams = array()) {

        $this->_smarty = new Smarty;

        if (null !== $tmplPath) {
            $this->setScriptPath($tmplPath);
        }

        foreach ($extraParams as $key => $value) {
            $this->_smarty->$key = $value;
        }
    }

    /**
     * Assign variables to the template
     *
     * Allows setting a specific key to the specified value, OR passing
     * an array of key => value pairs to set en masse.
     *
     * @see __set()
     * @param string|array $spec The assignment strategy to use (key or
     * array of key => value pairs)
     * @param mixed $value (Optional) If assigning a named variable,
     * use this as the value.
     * @return void
     */
    public function assign($spec, $value = null) {
        if (is_array($spec)) {
            $this->_smarty->assign($spec);
            return;
        }

        $this->_smarty->assign($spec, $value);
    }

    /**
     * Processes a template and returns the output.
     *
     * @param string $name The template to process.
     * @return string The output.
     */
    public function render($name,$tpl_vars=null) {
        return $this->_smarty->fetch($name);
    }

    public function setScriptPath($view_directory ){
        if (is_readable($view_directory)) {
            $this->_smarty->template_dir = $view_directory;
            return;
        }
    }
    public function getScriptPath(){
        return $this->_smarty->template_dir;
    }
    public function display($view , $tpl_vars = NULL ){
        $this->_smarty->display($view);
    }
}