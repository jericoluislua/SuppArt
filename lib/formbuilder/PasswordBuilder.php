<?php

class PasswordBuilder extends Builder
{
    public function __construct()
    {
        $this->addProperty('label');
        $this->addProperty('name');
        $this->addProperty('value', null);
    }

    public function build()
    {
        $result = '<div class="form-group">';
        $result .= "    <label class=\"col-md-2 control-label\" for=\"textinput\">{$this->label}</label>";
        $result .= '    <div class="col-md-4">';
        if($this->name == "password")
        {
            $result .= "        <input name=\"{$this->name}\" type=\"password\" value=\"{$this->value}\" class=\"form-control input-md\" required>";
        }
        else
        {
            $result .= "        <input name=\"{$this->name}\" type=\"password\" value=\"{$this->value}\" class=\"form-control input-md\">";
        }
        $result .= '    </div>';
        $result .= '</div>';

        return $result;
    }
}
