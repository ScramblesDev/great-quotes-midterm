<?php
    //this reads and prints the entire csv file into an array
    //EXAMPLE:
    //$csv = csvToArray('authors.csv');
    //print_r($csv);
    function readCSV($csvFile) {
        $file_to_read = fopen($csvFile, 'r');
    
        while (!feof($file_to_read) ) {
            $lines[] = fgetcsv($file_to_read, 1000, '#');
        }
        fclose($file_to_read);
        return $lines;
    }
    
    //this reads and prints one element of csv data that's been converted into a php array
    //EXAMPLE:
    //$csvElement = readOneElementOfCSV('authors.csv', 1, 0);
    //print_r($csvElement);
    function readOneElementOfCSV($csvFile, $index1, $index2) {
        $csv = readCSV($csvFile);
        return $csv[$index1][$index2];
    }

    //this adds a new record to the end of the csv file
    //EXAMPLE:
    //$myrecord = array("Peter#Griffin");
    //addRecord('authors.csv', $myrecord);
    function addRecord($csvFile, $newrecord) {
        $fh = fopen($csvFile, "a");
        fputcsv($fh, $newrecord); //remember that $newrecord is an array of strings!
        fclose($fh);
    }
?>