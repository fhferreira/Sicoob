<?php

namespace Sicoob\Retorno\CNAB240;

use Sicoob\Helpers\Helper;
use Sicoob\Retorno\Fields\Field;

abstract class LineAbstract
{
    public $line;

    public $fields = [];

    public $configs = [];

    public function __construct($line = null)
    {
        if ($line)
            $this->fill($line);
    }

    public function fill($line)
    {
        $this->line = $line;
        foreach ($this->configs as $configName => $config) {
            $field = new Field();
            $field->type = $config['type'];
            $field->start = $config['start'];
            $field->end = $config['end'];
            $field->length = $config['length'];
            $field->values = isset($config['values']) ? $config['values'] : null;
            $field->name = $configName;
            $field->value = Helper::cutInterval($line, $config['start'], $config['end']);

            if (isset($config['helper'])) {
                $helper = $config['helper'];
                $field->value  = Helper::$helper($field->value);
            }

            $field->render();

            if ($field->type == 'money') {
                $field->value = (float) $field->value;
            }

            $this->fields[$configName] = $field;
        }
    }

}