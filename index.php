<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Assignment 07 - Names</title>
    <link rel="stylesheet" href="names.css">
</head>

<body>
    <?php
    include 'functions/utility-functions.php';
    include 'functions/names-functions.php';

    $fileName = 'names.txt';
    $fullNames = load_full_names($fileName);

    $firstNames = load_first_names($fullNames);

    $lastNames = load_last_names($fullNames);

    $allValidNames = load_valid_names($fullNames, $firstNames, $lastNames);

    //unpack allValidNames array into individual arrays
    for ($i = 0; $i < sizeof($allValidNames); $i++) {
        $validNames = $allValidNames[$i];
        $validFirstNames[] = $validNames['firstName'];
        $validLastNames[] = $validNames['lastName'];
        $validFullNames[] = $validNames['fullName'];
    }

    // dd($validFullNames);

    // $findMe = ',';
    // echo $fullNames[0] . '<br>';
    // echo strpos($fullNames[0], $findMe) . '<br>';
    // echo substr($fullNames[0], 0, strpos($fullNames[0], $findMe));
    // exit();

    // dd($firstNames);
    // dd($lastNames);
    // dd($validNames);


    // ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //
    echo '<h1>Names - Results</h1>';

    echo '<h2>Most Common First Names</h2>';
    $occurrenceCount = array_count_values($validFirstNames);
    arsort($occurrenceCount);
    $topFirstNames = array_slice($occurrenceCount, 0, 5, true);
    echo "<ol>";
    foreach ($topFirstNames as $name => $count) {
        if ($count > 1) {
            echo ("<li>" . $name . " with " . $count . " occurrences</li>");
        }
    }
    echo "</ol>";

    echo '<h2>Most Common Last Names</h2>';
    $occurrenceCount = array_count_values($validLastNames);
    arsort($occurrenceCount);
    $topLastNames = array_slice($occurrenceCount, 0, 5, true);
    echo "<ol>";
    foreach ($topLastNames as $name => $count) {
        if ($count > 1) {
            echo ("<li>" . $name . " with " . $count . " occurrences</li>");
        }
    }
    echo "</ol>";

    echo '<h2>Unique Full Names</h2>';
    $uniqueValidNames = (array_unique($validFullNames));
    echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
    echo "<input type='checkbox' id='hide-unique-full'><label for='hide-unique-full'>Hide Results</label>";
    echo '<ul id="unique-full" style="list-style-type:none">';
    foreach ($uniqueValidNames as $uniqueValidNames) {
        echo "<li>$uniqueValidNames</li>";
    }
    echo "</ul>";

    echo '<h2>Unique First Names</h2>';
    $uniqueFirstNames = (array_unique($validFirstNames));
    echo ("<p>There are " . sizeof($uniqueFirstNames) . " Unique First Names</p>");
    echo "<input type='checkbox' id='hide-unique-first'><label for='hide-unique-first'>Hide Results</label>";
    echo '<ul id="unique-first" style="list-style-type:none">';
    foreach ($uniqueFirstNames as $uniqueFirstNames) {
        echo "<li>$uniqueFirstNames</li>";
    }
    echo "</ul>";

    echo '<h2>Unique Last Names</h2>';
    $uniqueLastNames = (array_unique($validLastNames));
    echo ("<p>There are " . sizeof($uniqueLastNames) . " Unique Last Names</p>");
    echo "<input type='checkbox' id='hide-unique-last'><label for='hide-unique-last'>Hide Results</label>";
    echo '<ul id="unique-last" style="list-style-type:none">';
    foreach ($uniqueLastNames as $uniqueLastNames) {
        echo "<li>$uniqueLastNames</li>";
    }
    echo "</ul>";

    echo '<h2>All Valid Names</h2>';
    echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
    echo "<input type='checkbox' id='hide-all-valid'><label for='hide-all-valid'>Hide Results</label>";
    echo '<ul id="all-valid" style="list-style-type:none">';
    foreach ($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
    echo "</ul>";

    echo '<h2>All Names</h2>';
    echo "<p>There are " . sizeof($fullNames) . " total names</p>";
    echo "<input type='checkbox' id='hide-all-names'><label for='hide-all-names'>Hide Results</label>";
    echo '<ul id="all-names" style="list-style-type:none">';
    foreach ($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
    echo "</ul>";

    ?>

</body>

</html>
