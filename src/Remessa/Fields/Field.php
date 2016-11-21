<?php
namespace Sicoob\Remessa\Fields;

use Sicoob\Helpers\Helper;

/**
 * Class Field
 * @package Sicoob\Remessa\Fields
 */
class Field
{
    /**
     * @var string|null $name Should contain a description of field
     */
    public $name;

    /**
     * @var mixed $value Should contain a value of field
     */
    public $value;

    /**
     * @var mixed $oldValue Should contain a initial value of field
     */
    public $oldValue;

    /**
     * @var mixed $type Should contain a type of field
     */
    public $type;

    /**
     * @var mixed $type Should contain a size of field
     */
    public $size;

    /**
     * @var mixed $type Should contain a side to complete the size of field
     */
    public $side = STR_PAD_LEFT;

    /**
     * @return mixed Returns the field rendered value.
     */
    public function render()
    {
        $this->oldValue = $this->value;

        switch ($this->type) {
            case 'numeric':
                return $this->parse('numeric');
                break;
            case 'money':
                return $this->parse('money');
                break;
            case 'string_right':
                $this->side = STR_PAD_RIGHT;
                return $this->parse('string');
                break;
            case 'string':
                return $this->parse('string');
                break;
            default:
                return $this->value;
                break;
        }
    }

    /**
     * @param $type
     * @return mixed called function
     */
    protected function parse($type)
    {
        return $this->$type();
    }

    protected function upper()
    {
        $this->value = mb_strtoupper($this->value);
    }

    protected function unaccent()
    {
        $this->value = str_replace(array(
            'à',
            'á',
            'â',
            'ã',
            'ä',
            'ç',
            'è',
            'é',
            'ê',
            'ë',
            'ì',
            'í',
            'î',
            'ï',
            'ñ',
            'ò',
            'ó',
            'ô',
            'õ',
            'ö',
            'ù',
            'ú',
            'û',
            'ü',
            'ý',
            'ÿ',
            'À',
            'Á',
            'Â',
            'Ã',
            'Ä',
            'Ç',
            'È',
            'É',
            'Ê',
            'Ë',
            'Ì',
            'Í',
            'Î',
            'Ï',
            'Ñ',
            'Ò',
            'Ó',
            'Ô',
            'Õ',
            'Ö',
            'Ù',
            'Ú',
            'Û',
            'Ü',
            'Ý'
        ), array(
            'a',
            'a',
            'a',
            'a',
            'a',
            'c',
            'e',
            'e',
            'e',
            'e',
            'i',
            'i',
            'i',
            'i',
            'n',
            'o',
            'o',
            'o',
            'o',
            'o',
            'u',
            'u',
            'u',
            'u',
            'y',
            'y',
            'A',
            'A',
            'A',
            'A',
            'A',
            'C',
            'E',
            'E',
            'E',
            'E',
            'I',
            'I',
            'I',
            'I',
            'N',
            'O',
            'O',
            'O',
            'O',
            'O',
            'U',
            'U',
            'U',
            'U',
            'Y'
        ), $this->value);
    }

    /**
     * @return string Returns the string rendered with a complete size
     */
    protected function numeric()
    {
        $this->completeSize();
        return $this->value;
    }

    /**
     * @return string Returns the string rendered with a complete size
     */
    protected function money()
    {
        $this->value = Helper::removePoints($this->value);
        $this->completeSize();
        return $this->value;
    }

    /**
     * @return string Returns the string rendered with a complete size
     */
    protected function string()
    {
        $this->unaccent();
        $this->upper();
        $this->completeSize();
        return $this->value;
    }

    /**
     * @return string Returns the string rendered with a complete size
     */
    public function completeSize()
    {
        switch ($this->type) {
            case 'numeric':
                $character = '0';
                break;
            case 'money':
                $character = '0';
                break;
            case 'string':
                $character = ' ';
                break;
            default:
                $character = ' ';
                break;
        }
        if (strlen($this->value) > $this->size) {
            $this->value = substr($this->value, 0, $this->size);
        } else {
            $this->value = Helper::completeSize(
                $character,
                $this->value,
                $this->size,
                $this->side
            );
        }
    }
}
