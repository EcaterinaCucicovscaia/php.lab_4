<?php
$numbers = [];

for ($i = 0; $i < 20; $i++) {
    $numbers[] = rand(1, 100);
}

echo "<pre>";
print_r($numbers);
echo "</pre>";
?>
