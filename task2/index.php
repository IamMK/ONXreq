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

$text = new TextInput();
$numeric = new NumericInput();

$text->add('Some text');
$text->add('S0me t3xt');

$numeric->add('Some text');
$numeric->add('S0me t3xt');
$numeric->add('12345');

print_r("Text Input: " . $text->getValue());
echo '<br />';
print_r("Numeric Input: " . $numeric->getValue());
