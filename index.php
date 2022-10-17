<?php
require_once('csv_util.php');
$authorList = readCSV('authors.csv');
$quoteList = readCSV('quotes.csv');

echo '<h1>Quotes</h1>';

for($i = 0; $i < count($authorList)-1; $i++) {
    //loop through each quote
    for($j = 0; $j < count($quoteList)-1; $j++) {
        //does the quote id match the author id?
        if($authorList[$i][0] == $quoteList[$j][0]) {
            echo '<a href="detail.php">"'.$quoteList[$j][1].'"</a>';
            echo '<br>';
        }
    }
    echo '- '.$authorList[$i][1];
    echo '<br>';
    echo '<br>';
}
?>

<html>
<a href="create.php">Click here to create a quote!</a>
</html>