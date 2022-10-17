<?php
    require_once('csv_util.php');
    $authorList = readCSV('authors.csv');
    $authorLength = count($authorList)-1;
    //print_r($_GET['id']);
?>

<!DOCTYPE html>
<body>
    <form method="POST">
        Type the quote to replace the given quote.
        <input type="text" name="typedquote" placeholder="Enter a quote here!"/>
        <br><br>
        <button type="submit">Submit</button>
    </form>
</body>

<?php
    //Write the quote to quotes.csv
    if(isset($_POST['typedquote']) && ($_POST['typedquote']) != NULL) {
        //modifies the record
        modifyLine('quotes.csv', $_GET['id'], array($_GET['id'], $_POST['typedquote']));
        echo 'Quote modified!<br>';
        echo '<a href="detail.php?id='.$_GET['id'].'">Return to detail page</a>';
    }
?>
</html>