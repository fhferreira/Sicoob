<?php

namespace Sicoob\Tests\Remessa\Field;

use Sicoob\Remessa\Fields\Field;
use PHPUnit_Framework_TestCase;

class FieldTest extends PHPUnit_Framework_TestCase
{

    public function testFieldString()
    {
        $field = new Field();
        $field->type = 'string';
        $field->value = 'FUNERARIA NOVA FRANCA LTDA';
        $field->size = 40;
        $field->render();
        $this->assertEquals($field->size, strlen($field->value));
        $this->assertEquals($field->oldValue, 'FUNERARIA NOVA FRANCA LTDA');
        $this->assertEquals('              ' . $field->oldValue, $field->value);
    }

    public function testFieldStringRight()
    {
        $field = new Field();
        $field->type = 'string_right';
        $field->value = 'FUNERARIA NOVA FRANCA LTDA';
        $field->size = 40;
        $field->render();
        $this->assertEquals($field->size, strlen($field->value));
        $this->assertEquals($field->oldValue, 'FUNERARIA NOVA FRANCA LTDA');
        $this->assertEquals($field->oldValue . '              ', $field->value);
    }

    public function testFieldNumeric()
    {
        $field = new Field();
        $field->type = 'numeric';
        $field->value = '1234';
        $field->size = 10;
        $field->render();
        $this->assertEquals($field->size, strlen($field->value));
        $this->assertEquals($field->oldValue, '1234');
        $this->assertEquals('000000' . $field->oldValue, $field->value);
    }

    public function testFieldMoney()
    {
        $field = new Field();
        $field->type = 'money';
        $field->size = 15;

        $field->value = 10.10;
        $field->render();
        $this->assertEquals($field->size, strlen($field->value));
        $this->assertEquals('000000000001010', $field->value);

        $field->value = 1050.10;
        $field->render();
        $this->assertEquals($field->size, strlen($field->value));
        $this->assertEquals('000000000105010', $field->value);
    }

}