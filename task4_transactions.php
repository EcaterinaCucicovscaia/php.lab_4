<?php
// Ассоциативный массив транзакций
$transactions = [
    [
        "transaction_id" => 1,
        "transaction_date" => "2019-01-01",
        "transaction_amount" => 230.00,
        "transaction_description" => "Payment for groceries",
        "merchant_name" => "SuperMart",
    ],
    [
        "transaction_id" => 2,
        "transaction_date" => "2020-02-15",
        "transaction_amount" => 85.70,
        "transaction_description" => "Dinner with friends",
        "merchant_name" => "Local Restaurant",
    ],
    [
        "transaction_id" => 3,
        "transaction_date" => "2021-06-30",
        "transaction_amount" => 250.75,
        "transaction_description" => "Electronics purchase",
        "merchant_name" => "TechStore",
    ],
    [
        "transaction_id" => 4,
        "transaction_date" => "2022-03-12",
        "transaction_amount" => 0.68,
        "transaction_description" => "Book order",
        "merchant_name" => "OnlineBooks",
    ],
    [
        "transaction_id" => 5,
        "transaction_date" => "2023-11-08",
        "transaction_amount" => 130.25,
        "transaction_description" => "Clothing order",
        "merchant_name" => "FashionHub",
    ],
];

// Функция для подсчёта общей суммы
function calculateTotalAmount($transactions) {
    return array_reduce($transactions, function($carry, $item) {
        return $carry + $item['transaction_amount'];
    }, 0);
}

// Функция для вычисления среднего значения
function calculateAverage($transactions) {
    $total = calculateTotalAmount($transactions);
    return count($transactions) > 0 ? $total / count($transactions) : 0;
}

// Функция для получения массива описаний
function mapTransactionDescriptions($transactions) {
    return array_map(function($item) {
        return $item['transaction_description'];
    }, $transactions);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Транзакции</title>
</head>
<body>

<h2>Список транзакций</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr style="background-color: #a6a6a6; color: #252525">
        <th>ID</th>
        <th>Дата</th>
        <th>Сумма транзакции</th>
        <th>Описание транзакции</th>
        <th>Название организации</th>
    </tr>
    <?php foreach ($transactions as $transaction) { ?>
        <tr>
            <td><?= $transaction['transaction_id'] ?></td>
            <td><?= $transaction['transaction_date'] ?></td>
            <td><?= number_format($transaction['transaction_amount'], 2) ?></td>
            <td><?= $transaction['transaction_description'] ?></td>
            <td><?= $transaction['merchant_name'] ?></td>
        </tr>
    <?php } ?>
</table>

<br>

<h3>Аналитика:</h3>
<ul>
    <li><strong>Общая сумма транзакций:</strong> <?= number_format(calculateTotalAmount($transactions), 2) ?></li>
    <li><strong>Средняя сумма транзакции:</strong> <?= number_format(calculateAverage($transactions), 2) ?></li>
    <li><strong>Все описания:</strong>
        <ul>
            <?php foreach (mapTransactionDescriptions($transactions) as $desc): ?>
                <li><?= $desc ?></li>
            <?php endforeach; ?>
        </ul>
    </li>
</ul>

</body>
</html>
