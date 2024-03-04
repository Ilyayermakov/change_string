<?php

function revertCharacters($inputString) {
    return implode('', array_reverse(preg_split('//u', $inputString, -1, PREG_SPLIT_NO_EMPTY)));
}

// Обработка формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["user_input"];
    $result = revertCharacters($userInput);
} else {
    $result = "";
}

// unit-тест
$testInput = "Hello World!";
$expectedOutput = "!dlroW olleH";
$unitTestResult = revertCharacters($testInput) === $expectedOutput;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение строки</title>
</head>
<body>
    <h1>Изменение строки</h1>
    
    <form method="post" action="">
        <label for="user_input">Введите Вашу строку:</label>
        <input type="text" name="user_input" id="user_input" required>
        <button type="submit">Принять</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>Обратная строка: <?php echo $result; ?></p>
    <?php endif; ?>

    <!-- unit-тест -->
    <p>Тест: <?php echo $unitTestResult ? 'Passed' : 'Failed'; ?></p>
</body>
</html>
