
<?php
// To connect to an IMAP server running on port 143 on the local machine,
// do the following:
$mbox = imap_open("{localhost:143}INBOX", "bardoman", "011235813");

// To connect to a POP3 server on port 110 on the local server, use:
//$mbox = imap_open ("{localhost:110/pop3}INBOX", "user_id", "password");

// To connect to an SSL IMAP or POP3 server, add /ssl after the protocol
// specification:
//$mbox = imap_open ("{localhost:993/imap/ssl}INBOX", "user_id", "password");

// To connect to an SSL IMAP or POP3 server with a self-signed certificate,
// add /ssl/novalidate-cert after the protocol specification:
//$mbox = imap_open ("{localhost:995/pop3/ssl/novalidate-cert}", "user_id", "password");

// To connect to an NNTP server on port 119 on the local server, use:
//$nntp = imap_open ("{localhost:119/nntp}comp.test", "", "");
// To connect to a remote server replace "localhost" with the name or the
// IP address of the server you want to connect to.
?>

