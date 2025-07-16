<html>

<head>
    <title>PHP-Array</title>
</head>

<body>
    <?php
    $uneven_numbers = [];
    $array_length_counter = 0;
    for ($i = 1; $i <= 10; $i++) {
        if ($i % 2 == 0) {
            $uneven_numbers[$array_length_counter] = $i;
            $array_length_counter++;
        }
    }
    foreach ($uneven_numbers as $number) {
        echo $number . "<br />";
    }
    ?>
</body>

</html>