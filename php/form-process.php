<?php

    if (isset($_POST['enviar'])) {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['event']) && !empty($_POST['message'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $event = $_POST['event'];
            $message = $_POST['message'];
            $mail = mail($name, $email, $event, $message);

            if ($mail) {
                echo 'Enviado';
            }
        }
    }

?>