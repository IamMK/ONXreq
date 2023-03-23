<?php
class TextInput
{
    protected $value = '';
    public function add($text)
    {
    }
    public function getValue()
    {
    }
}

class NumericInput extends TextInput
{
    public function add($text)
    {
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta etc. -->
    <title>Document</title>
</head>

<body>
    <!-- Beauty Site -->
    <form>
        <label for="textinput">Text Input</label>
        <input type="text" name="TextInput" id="textinput" />
        <label for="numericinput">Numeric Input</label>
        <input type="number" name="NumericInput" id="numericinput">
    </form>
</body>

</html>