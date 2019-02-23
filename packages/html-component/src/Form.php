<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 23/02/19
 * Time: 18:35
 */

namespace BlackBear\HtmlComponent;


class Form
{
    /**
     * @var string
     */
    private $type;

    public function __construct($type = 'horizontal')
    {
        $this->type = $type;
    }

    /**
     * @param string $label
     * @param string $control
     */
    public function row($label, $control, $required = false, $labelClass = "", $controlClass = "") {
        $defaultLabelClass = "col-xs-12 col-sm-2";
        $defaultControlClass = "col-xs-12 col-sm-10";
        $groupClass = '';
        if($this->getType() === 'vertical') {
            $defaultLabelClass = 'col-xs-12';
            $defaultControlClass = 'col-xs-12';
            $groupClass = ' row';
        }

        $labelClass = $labelClass ? $defaultLabelClass.' '.$labelClass : $defaultLabelClass;
        $controlClass = $controlClass ? $defaultControlClass.' '.$controlClass: $defaultControlClass;

        $template = "<div class='form-group".$groupClass."'>
                <div class='".$labelClass."'><div class='control-label'>%s%s</div></div>
                <div class='".$controlClass."'>%s</div>
            </div>";
        $htmlRequired = $required ? " <b class='text-danger'>*</b>" : "";
        return sprintf($template, $label, $htmlRequired, $control);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}