<?php
namespace Sicoob\Remessa\CNAB240;

use Sicoob\Remessa\Fields\Field;

/**
 * Class LineAbstract
 * @package Sicoob\Remessa\CNAB240
 */
abstract class LineAbstract
{

    //Field Types, Positions
    /**
     * @var array Configuration Fields
     */
    public $configs = [];
    //Field Objects, Positions
    /**
     * @var array Attributed fields
     */
    public $fields = [];
    //Original
    /**
     * @var array Original Values
     */
    public $data = [];

    /**
     * @var int Size of Line
     */
    public $size = 240;

    /**
     * @param array $attributes Constructor Object Fill attributes to Fields Objects and Original Values $data
     */
    public function construct($attributes = [])
    {
        $this->fill($attributes);
    }

    /**
     * @param $attributes Fill attributes to Fields Objects
     */
    public function fill($attributes)
    {
        $this->data = $attributes;
        //$sum = 0;
        foreach ($this->configs as $name => $config) {
            $field = new Field();
            $field->type = $config['type'];
            $field->name = $name;
            $field->size = $config['size'];
           // $sum += $config['size'];
            if (isset($attributes[$name])) {
                $field->value = $attributes[$name];
            } elseif ($config['default']) {
                $field->value = $config['default'];
            }
            $this->fields[$name] = $field;
        }
        //var_dump(get_class($this),$sum);
    }

    /**
     * @return string Render Line fields
     */
    public function render()
    {
        $renderedFields = [];
        //print_r($this->fields);
        foreach ($this->fields as $field) {
            array_push($renderedFields, $field->render());
        }
        return implode("", $renderedFields);
    }
}