<?php
    require_once('csv_util.php');
    print_r($_GET['id'].'<hr />');
    echo '<h1>Are you sure you want to delete this quote?</h1>';
?>

<html>
    <body>
        <form method="post">
            <input type="submit" name="button1" value="Erase"/>
        </form>
    </body>
</html>

<?php
    if(isset($_POST['button1'])) {
        echo 'Quote has been successfully wiped from the history books.<br>';
        echo '<a href="index.php">Return to index</a>';
        
        eraseLine('quotes.csv', $_GET['id']);
    }
?>