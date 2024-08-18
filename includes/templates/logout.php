<?php 
session_start();
session_unset();
session_destroy();

echo '<style>
    #buttons{display: flex;}
    #button{display: none;}
    </style>';
header("Refresh:0;url=getstart.php");

?>