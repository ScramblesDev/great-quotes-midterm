<?php
    require_once('csv_util.php');
    $authorList = readCSV('authors.csv');
    $authorLength = count($authorList)-1;
?>

<!DOCTYPE html>

<body>
    <form method="POST">
        <input type="text" name="typedquote" placeholder="Enter a quote here!"/>
        <br>

        Select an author:
        <select name="authorid">
            <?php foreach($authorList as $person){
                echo "<option value=$person[0]>$person[1]</option>";
            } ?>
        </select>
        <br>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>

<?php
    //Write the quote to quotes.csv
    if(isset($_POST['typedquote']) && ($_POST['typedquote']) != NULL) {
        addRecord('quotes.csv', array($_POST['authorid'].'#'.$_POST['typedquote']));
    }
    else {
        echo 'Please input a quote.';
    }

    //Array monitors for testing purposes
    /*
    $quoteList = readCSV('quotes.csv');
    $quoteLength = count($quoteList)-1;
    echo '<hr />';
    echo "POST Array<br><pre>"; print_r($_POST); echo "</pre>";
    echo "Authors Array<br><pre>"; print_r($authorList); echo "</pre>";
    echo "Quotes Array<br><pre>"; print_r($quoteList); echo "</pre>";
    */
?>
</html>