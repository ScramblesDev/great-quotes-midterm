<?php
    //this reads and prints the entire csv file into a php array
    //EXAMPLE:
    //$convertedArray = readCSV('authors.csv');
    //print_r($convertedArray);
    function readCSV($csvFile) : array {
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
    function elementOfCSV($csvfile, $index) {
        $csv = readCSV($csvfile);
        return $csv[$index];
    }

    //this adds a new record to the end of the csv file
    //EXAMPLE:
    //$myrecord = array("Peter#Griffin");
    //addRecord('authors.csv', $myrecord);
    function addRecord($csvFile, $newrecord) {
        $fh = fopen($csvFile, "a");
        fputs($fh, implode('#', $newrecord)."\n"); //remember that $newrecord is an array of strings!
        fclose($fh);
    }

    //converts a PHP array into a CSV file
    function convertToCSV(string $csvfile, array $myArray) {
        //open file
        $fh = fopen($csvfile, 'w');
        //loop through
        for ($i = 0; $i < count($myArray); $i++) {
            //new line formula????
            fputs($fh, implode('#', $myArray[$i])."\n"); //remember that $newrecord is an array of strings!
        }
        //close the file
        fclose($fh);
    }

    //modifies a specific line of a csv file (by converting the csv to a php array, replacing the requested value within, and converting to a csv once more)
    //EXAMPLE:
    //$newData = ["2", "This is a quote I want to insert"];
    //modifyLine('authors.csv', 3, $newData);
    function modifyLine(string $csvfile, int $requestedRecordIndex, array $newRecord) {
        //convert the data to a php array
        $convertedPHPArray = readCSV($csvfile);

        //replace the array embedded in the converted data to one that the user gives
        $convertedPHPArray[$requestedRecordIndex] = $newRecord;

        //convert the php array back into a csv file
        convertToCSV($csvfile, $convertedPHPArray);
    }
    
    //erases a specific line of a csv file
    function eraseLine($csvfile, $requestedRecordIndex) {
        //convert the data to a php array
        $convertedPHPArray = readCSV($csvfile);

        //make the requested position blank
        $convertedPHPArray[$requestedRecordIndex] = [""];

        //convert the php array back into a csv file
        convertToCSV($csvfile, $convertedPHPArray);
    }

    //deletes a specific line of a csv file
    function deleteLine($csvfile, $requestedRecordIndex) {
        //convert the data to a php array
        $convertedPHPArray = readCSV($csvfile);

        //make the requested position blank
        $convertedPHPArray[$requestedRecordIndex] = "";

        //convert the php array back into a csv file
        convertToCSV($csvfile, $convertedPHPArray);
    }
?>