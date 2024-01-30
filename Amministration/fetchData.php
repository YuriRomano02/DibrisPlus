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
    array( 
        'db'        => 'email', 
        'dt'        => 3, 
        'formatter' => function( $d, $row ) { 
            return ' 
                <form method="post" action="delete.php">
                <a href="edit.php?id='.$d.'">Edit</a>&nbsp; 
                <a href="delete.php?email=<?php echo $d; ?>">Delete</a>
                </form>
            '; 
        } 
    ) 
);

require 'ssp.class.php';

echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);


?>