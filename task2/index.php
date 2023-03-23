<?php
class TextInput
{
    protected $value = '';
    public function add($text)
    {
        $this->value .= trim($text);
    }
    public function getValue(): string
    {
        return $this->value;
    }
}

class NumericInput extends TextInput
{
    public function add($text)
    {
        if (is_numeric($text)) {
            parent::add($text);
        }
    }
}
