<?php

$dbDetails = array(
    'host' => 'localhost',
    'user' => 'yuri',
    'pass' => 'romanus99',
    'db'   => 'unige'
);
$table = "utenti";
$primaryKey = 'email';

$columns = array(
    array('db' => 'nome', 'dt' => 0),
    array('db' => 'cognome',  'dt' => 1),
    array('db' => 'email',      'dt' => 2),
);

require 'ssp.class.php';

echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);

?>