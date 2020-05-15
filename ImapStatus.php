
<?php

$mbox = imap_open("{mx.sdf.org:143}INBOX", "bardoman", "011235813");
//$mbox = imap_open("{imap.example.com}", "username", "password", OP_HALFOPEN)
//     or die("can't connect: " . imap_last_error());

$status = imap_status($mbox, "{mx.sdf.org}INBOX", SA_ALL);
if ($status) {
  echo "Messages:   " . $status->messages    . "<br />\n";
  echo "Recent:     " . $status->recent      . "<br />\n";
  echo "Unseen:     " . $status->unseen      . "<br />\n";
  echo "UIDnext:    " . $status->uidnext     . "<br />\n";
  echo "UIDvalidity:" . $status->uidvalidity . "<br />\n";
} else {
  echo "imap_status failed: " . imap_last_error() . "\n";
}

imap_close($mbox);
?>

