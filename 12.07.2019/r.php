
<?php

// the message you want to sign so that recipient can be sure it was you that
// sent it
$data = <<<EOD

You have my authorization to spend $10,000 on dinner expenses.

The CEO
EOD;
// save message to file
$fp = fopen("prova.xml", "w");
fwrite($fp, $data);
fclose($fp);
// encrypt it
if (openssl_pkcs7_sign("msg.txt", "signed.txt", "file://mycert.pem",
    array("file://mycert.pem", "mypassphrase"),
    array("To" => "joes@example.com", // keyed syntax
          "From: HQ <ceo@example.com>", // indexed syntax
          "Subject" => "Eyes only")
    )) {
    // message signed - send it!
    exec(ini_get("sendmail_path") . " < signed.txt");
}

?>
