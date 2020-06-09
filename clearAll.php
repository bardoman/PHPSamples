<?php

$bar="<br>********************************<br>";

$mbox = imap_open("{mx.sdf.org:143}INBOX", "bardoman", 
"z1123f&13");

$search_string = 'BODY TORUS'; 

$emails = imap_search($mbox  , $search_string);
$size = sizeof($emails);
echo "size=" . $size . "<BR>";
echo "emails=><br>";
print_r($emails);
echo $bar;

for ($cnt = 0; $cnt <= $size; $cnt++) {
$status = imap_clearflag_full($mbox, $emails[$cnt], "\\Answered");

$result = imap_fetch_overview($mbox,$emails[$cnt],0);

 echo $bar;

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
}   
imap_close($mbox);
?>
