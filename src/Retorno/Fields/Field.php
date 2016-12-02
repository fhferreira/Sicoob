<?php

namespace Sicoob\Retorno\Fields;

class Field {

    public $type;

    public $name;

    public $rawValue;

    public $value;

    public $start;

    public $length;

    public $values = [];

    public function render()
    {
        if ($this->rawValue == null) {
            $this->rawValue = $this->value;
        } else {
            $this->value = $this->rawValue;
        }

        switch ($this->type) {
            case 'string':
                return $this->getString();
            case 'money':
                return $this->getMoney();
            case 'number':
                return $this->getNumber();
            case 'date':
                return $this->getDate();
            case 'hour':
                return $this->getHour();
            case 'array':
                return $this->getArray();
        }

        return null;
    }

    public function getArray()
    {
        return $this->value;
    }

    public function getString()
    {
        return $this->value;
    }

    public function getMoney()
    {
        $value = substr($this->value, 0, strlen($this->length) - 4);
        $decimal = substr($this->value, -2, 2);
        $this->value = (float) $value . '.' . $decimal;
        return round($this->value, 2);
    }

    public function getDate()
    {
        $day = substr($this->value, 0, 2);
        $month = substr($this->value, 2, 2);
        $year = substr($this->value, 4, 4);
        $this->value = sprintf("%s/%s/%s", $day, $month, $year);
        return $this->value;
    }

    public function getHour()
    {
        $hour = substr($this->value, 0, 2);
        $minute = substr($this->value, 2, 2);
        $this->value = sprintf("%s:%s", $hour, $minute);
        return $this->value;
    }

    public function getNumber()
    {
        return $this->value;
    }

    public function getValueIndex($all = false)
    {
        if ($all) {
            return $this->values;
        }

        return isset($this->values[$this->value]) ? $this->values[$this->value] : null;
    }
}