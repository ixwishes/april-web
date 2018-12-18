<?php session_start() ;
require_once(dirname(__FILE__) . '/Connector.class.php');
?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
<title>april-lin.com</title>
<link rel="stylesheet" type="text/css" href="http://april-lin.com/css/app.css">
</head>

<body>

<?php

if (!isset($_SESSION['user'])) {
    include 'login.tem.php';
    exit;
} else {
    $db = new Connector();

    if ($db->hasError()) {
        $db->close();
        returnError('database');
    } else {
        $clients = $db->getClients();
        include 'clients.tem.php';
        exit;
    }
}

?>

</body>
</html>

<?php

function returnError($error=null)
{
    $message = urlencode($error);
    header('Location: http://april-lin.com/old?error=' . $message);
    exit;
}



?>
