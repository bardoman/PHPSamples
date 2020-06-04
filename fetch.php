<?php

$bar="<br>********************************<br>";

$mbox = imap_open("{mx.sdf.org:143}INBOX", "bardoman", 
"z1123f&13");

//$MC = imap_check($mbox);

// Fetch an overview for all messages in INBOX
//$result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);

$status = imap_setflag_full($mbox, "78", "\\Answered");

//$status = imap_clearflag_full($mbox, "78", "\\Answered");



$result = imap_fetch_overview($mbox,"78",0);

 var_dump($result);

 echo $bar;

//foreach ($result as $overview) {
   
//var_dump($overview);

$overview=$result[0];

echo $bar;

    echo "#{$overview->msgno} ({$overview->date}) - From: {$overview->from}
    {$overview->subject}\n";
    
    echo "<br>subject=    $overview->subject<br>";
    echo "<br>from  =     $overview->from<br>"; 
    echo "<br>to    =     $overview->to<br>";
    echo "<br>date=       $overview->date  <br>";
    echo "<br>message_id =$overview->message_id <br>";
    echo "<br>references =$overview->references <br>";
    echo "<br>in_reply_to=$overview->in_reply_to<br>";
    echo "<br>size  =     $overview->size<br>";
    echo "<br>uid   =     $overview->uid <br>";
    echo "<br>msgno=      $overview->msgno <br>";
    echo "<br>recent=     $overview->recent<br>";
    echo "<br>flagged=    $overview->flagged <br>";
    echo "<br>answered=   $overview->answered<br>";
    echo "<br>deleted =   $overview->deleted <br>";
    echo "<br>seen  =     $overview->seen <br>";
    echo "<br>draft =     $overview->draft <br>";
    echo "<br>udate =     $overview->udate <br>";


    echo $bar;
//}   
imap_close($mbox);
?>
