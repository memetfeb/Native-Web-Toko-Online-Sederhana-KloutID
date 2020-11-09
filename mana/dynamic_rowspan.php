<?php
/**
 * addRowspan
 * 
 * from an array of assoc mysql results, appends a column 'rowspan' by looking ahead
 * for keys with the same value.
 * 
 * @param string $span_key - key to base span on 
 * @param array $rows - 2d array of rows
 */
function addRowspan($span_key, &$rows) {
  for($i=0; $i<count($rows); $i++) {
    $rowspan = 1;
    for($j=$i; $j<$rows; $j++) {
      // lookahead
      if(isset($rows[$j+1])) {
          // this is not the last row...
          if ($rows[$j][$span_key] === $rows[$j+1][$span_key]) {
              // the next date is the same
              $rowspan++;
              // so set its rowspan to 0
              $rows[$j+1][$span_key] = 0;
              // and check the next
              continue;
          }
      }
      // here we have calculated the rowspan
      $rows[$i][$span_key] = $rowspan;
      // so jump ahead spanned rows in the main loop
      $i += $rowspan -1;
      break; // no more calculation necessary
    }
  }
}