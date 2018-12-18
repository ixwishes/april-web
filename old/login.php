<?php
session_start();

require_once(dirname(__FILE__) . '/Connector.class.php');

if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Connector();

    if ($db->hasError()) {
        $db->close();
        returnError('database');
    } elseif (!isset($_POST['email']) || $_POST['email'] =='' || !isset($_POST['password'])) {
        $db->close();
        returnError('login_missing');
    } elseif (!$db->userRegistered($_POST['email'])) {
        $db->close();
        returnError('no_account');
    } else {

      //check the hash
        if (password_verify($_POST['password'], $db->getPassword($_POST['email']))) {

          // set valid login
            $credentials = $db->getUserInfo($_POST['email']);

            $_SESSION['user'] = array(
             'name' => $credentials['name'],
             'login' => $credentials['email'],
             'id' => $credentials['id']
              );

            header('Location: http://april-lin.com/old?login=success');
            $db->close();
            exit;
        } else {

            //bad password
            $db->close();
            returnError('invalid');
        }
    }
} else {
    //redirect GET
    header('Location: http://april-lin.com/old');
    exit;
}

 function returnError($error=null)
 {
     $message = urlencode($error);
     header('Location: http://april-lin.com/old?error=' . $message);
     exit;
 }
