<?php
class TextInput
{
    protected $value = 'xd';
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
        $text = preg_replace('[0-9]', '', $text);
        $this->value = trim($text);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta etc. -->
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        main {
            padding: 20px;
            width: 500px;
            margin: auto;
            text-align: center;
        }

        .userInterface {
            margin: auto;
            width: 500px;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .userInterface__el {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <!-- Beauty Site -->
    <form class="userInterface">
        <div class="userInterface__el"></div>
        <label for="textinput">Text Input</label>
        <input type="text" name="TextInput" id="textinput" />
        <div class="userInterface__el"></div>
        <label for="numericinput">Numeric Input</label>
        <input type="number" name="NumericInput" id="numericinput">
        <button class="userInterface__el" type="submit">Add</button>
    </form>
    <main>
        <?php
        $foo = new TextInput();

        echo $foo->getValue();
        ?>
    </main>
</body>

</html>