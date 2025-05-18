<?php
// Задаем путь к папке с изображениями (относительно сервера)
$dir = 'image/';
$fullPath = 'C:/xampp/htdocs/lab4/' . $dir;

// Сканируем содержимое директории
$files = scandir($fullPath);

// Если нет ошибок при сканировании
if ($files === false) {
    return;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея изображений</title>
    <style>
        img {
            width: 150px;
            height: auto;
            margin: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h2>Галерея изображений</h2>
    <div style="display: flex; flex-wrap: wrap;">
        <?php
        for ($i = 0; $i < count($files); $i++) {
            // Пропускаем текущий и родительский каталоги
            if (($files[$i] != ".") && ($files[$i] != "..")) {
                $path = $dir . $files[$i]; // путь для тега <img>
                // Проверим, действительно ли это .jpg-файл
                if (preg_match('/\.jpg$/i', $files[$i])) {
                    echo "<img src='$path' alt='image'>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
