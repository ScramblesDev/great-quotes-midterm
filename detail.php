<?php
    require_once('csv_util.php');
    $authorList = readCSV('authors.csv');
    $quoteList = readCSV('quotes.csv');

    echo '<h1>"'.$quoteList[$_GET['id']][1].'"</h1>';
    echo '<h2>- '.$authorList[$_GET['id']][1].'</h2><br><br>';

    echo '<a href="delete.php?id='.$_GET['id'].'">Delete this quote</a><br>';
    echo '<a href="modify.php?id='.$_GET['id'].'">Modify this quote</a><br>';
?>