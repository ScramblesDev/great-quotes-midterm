<?php
    //this reads and prints the entire csv file into a php array
    //EXAMPLE:
    //$convertedArray = readCSV('authors.csv');
    //print_r($convertedArray);
    function readCSV($csvFile) {
        $fh = fopen($csvFile, 'r');
    
        while (!feof($fh) ) {
            $lines[] = fgetcsv($fh, 1000, '#');
        }

        fclose($fh);
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

    function modifyLine($csvfile, $requestedRecordIndex, $newRecord) {
        //convert the data to a php array
        $convertedPHPArray = readCSV($csvfile);

        //
        return $convertedArray[$requestedRecordIndex];

        //convert the php array back into a csv file
        //$fputcsv($csvfile, $convertedPHPArray, '#')
    }

    $convertedPHPArray = readCSV('authors.csv');
    print_r($convertedPHPArray[0][1]);
?>