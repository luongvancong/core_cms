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
     * @param string $label
     * @param string $control
     */
    public function row($label, $control, $labelClass = "", $controlClass = "") {
        $defaultLabelClass = "control-label".($labelClass ? " ".$labelClass : " col-xs-12 col-sm-3");
        $defaultControlClass = ($controlClass ? " ".$controlClass : " col-xs-12 col-sm-9");
        $template = "<div class='form-group'>
                <div class='".$defaultLabelClass."'>%s</div>
                <div class='".$defaultControlClass."'>%s</div>
            </div>";
        return sprintf($template, $label, $control);
    }
}