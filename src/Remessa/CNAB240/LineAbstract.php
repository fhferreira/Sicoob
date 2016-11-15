<?php
namespace Sicoob\Remessa\CNAB240;

use Sicoob\Remessa\Fields\Field;

abstract class LineAbstract {

    //Field Types, Positions
    public $configs = [];
    //Field Objects, Positions
    public $fields = [];
    //Original
    public $data   = [];

    public $size   = 240;

    public function construct($attributes = [])
    {
        $this->fill($attributes);
    }

    public function fill($attributes) {
        $this->data = $attributes;
        $sum = 0;
        foreach($this->configs as $name => $config) {
            $field = new Field();
            $field->type = $config['type'];
            $field->name = $name;
            $field->size = $config['size'];
            $sum += $config['size'];
            if (isset($attributes[$name])) {
                $field->value = $attributes[$name];
            } elseif ($config['default']) {
                $field->value = $config['default'];
            }
            $this->fields[$name] = $field;
        }
        //var_dump(get_class($this),$sum);
    }

    public function render()
    {
        $renderedFields = [];
        //print_r($this->fields);
        foreach($this->fields as $field) {
            array_push($renderedFields, $field->render());
        }
        return implode("", $renderedFields);
    }
}