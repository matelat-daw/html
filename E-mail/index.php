<<<<<<< HEAD
<?php
    //check for new messages.

    echo "<h1>Verifica los Mensajes IMAP de Gmail</h1>";

    $mailbox = imap_open("{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX", "matelat@gmail.com","cmpazrwvngjpmbhw");

    // Check messages.
    $check = imap_check($mailbox);
    $today = "";
    $date = $check->Date;
    $qtty = $check->Nmsgs;
    $temp = explode(" ", $date);
    for ($i = 0; $i < 4; $i++)
    {
        $today .= $temp[$i];
    }
    echo "<h3>$today</h3>
    <pre>
    Fecha de los Mensajes Más Recientes : $check->Date
    <br></pre>";
    /* print("Connection type : " . $check->Driver);
    print("<BR>");
    print("Name of the mailbox : " . $check->Mailbox);
    print("<BR>");
    print("Number of messages : " . $check->Nmsgs);
    print("<BR>");
    print("Number of recent messages : " . $check->Recent);
    print("<BR>");
    print("</PRE>"); */

    // show headers for messages.

    while ($qtty > 0)
    {
        $header = imap_headerinfo($mailbox, $qtty);
        print("<pre>");
        $mail_today = "";
        $mail_date = $header->Date;
        $mail_temp = explode(" ", $mail_date);
        for ($i = 0; $i < 4; $i++)
        {
            $mail_today .= $mail_temp[$i];
        }
        if ($today == $mail_today)
        {
            print("Fecha del Mansaje : $header->Date<br>
            Asunto del Mensaje : $header->Subject<br></pre>");
            /* print("Header To : " . $header->to) . "<BR>
            Header From : " . $header->From . "<BR>
            Header cc : " . $header->cc . "<BR>
            Header ReplyTo : " . $header->ReplyTo . "<BR>"); */

            /* print("<PRE>"
            imap_body($mailbox, $qtty))
            "</PRE><HR>"); */
        }
        $qtty--;
    }

    imap_close($mailbox);
?>
=======
<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-mail Monitor</title>
</head>
<body>
    
</body>
</html>
>>>>>>> cb49e361 (Update 02-05-2024 08:14)
