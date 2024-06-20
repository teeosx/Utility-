<?php

// Set the number of rows per file
$rows_per_file = 1000;

// Set the name of the output folder
$output_folder = 'output';

// Open the input CSV file
$input_file = fopen('input.csv', 'r');

// Initialize the output file counter
$file_counter = 1;

// Initialize the row counter
$row_counter = 0;

// Initialize the output file
$output_file = fopen("$output_folder/output_$file_counter.csv", 'w');

// Read the input file line by line
while (($row = fgetcsv($input_file)) !== false) {
  // Write the row to the output file
  fputcsv($output_file, $row);

  // Increment the row counter
  $row_counter++;

  // If the row counter has reached the specified number of rows per file,
  // create a new output file and reset the row counter
  if ($row_counter == $rows_per_file) {
    fclose($output_file);
    $file_counter++;
    $output_file = fopen("$output_folder/output_$file_counter.csv", 'w');
    $row_counter = 0;
  }
}

// Close the input and output files
fclose($input_file);
fclose($output_file);

