<?php
$mbox = imap_open("{mx.sdf.org:143}INBOX", "bardoman", 
"z1123f&13");

$bar="<br>*******************************************<br>";
if( $mbox ) {

     global $charset,$htmlmsg,$plainmsg,$attachments;
    $htmlmsg = $plainmsg = $charset = '';
    $attachments = array();

     $num = imap_num_msg($mbox);
     $search_string = 'BODY "TORUS"'; 

$emails = imap_search($mbox  , $search_string);
$size = sizeof($emails);
echo "size=" . $size . "<BR>";
echo "emails=><br>";
print_r($emails);
echo $bar;

for ($cnt = 0; $cnt <= $size; $cnt++) {//loop thru emails

 $result = imap_fetch_overview($mbox,$emails[$cnt],0);
    $overview=$result[0];
    if($overview->answered==0)
    {

$headerinfo = imap_headerinfo($mbox, $emails[$cnt]);

echo "date:" . date("F j, Y, g:i a", $headerinfo->udate) . "<br>"; 
echo "from address:" . $headerinfo->fromaddress . "<br>";
//if( $headerinfo->fromaddress ==  "+17209385087@tmomail.net")
//{
    if($headerinfo->Subject!== '')
    {
//        mail("$headerinfo->fromaddress","torusReply", "torusReply");
//    }
//}

echo "to address:" . $headerinfo->toaddress . "<br>";
echo "subject:" . $headerinfo->Subject . "<br><br>";
echo "emails[$cnt]=" . $emails[$cnt] . "<br>";

$st = imap_fetchstructure($mbox, $emails[$cnt]);

if (!empty($st->parts)) {
    for ($i = 0, $j = count($st->parts); $i < $j; $i++) {//loop thru parts
        $part = $st->parts[$i];

        if ($part->subtype == 'PLAIN') {
            
echo "<br>partType[" . $i . "]=>PLAIN<br>";
$body = imap_fetchbody($mbox, $emails[$cnt], $i+1);
$body=imap_base64($body);
echo $body;
 mail("$headerinfo->fromaddress","torusReply", $body);
  $status = imap_setflag_full($mbox, $emails[$cnt], "\\Answered");
        } 
/*
        if ($part->subtype == 'HTML') {
            
echo "<br>partType[" . $i . "]=>HTML<br>";
$body = imap_fetchbody($mbox, $emails[$cnt], $i+1);
echo imap_qprint($body);
//$body=imap_base64($body);
//echo $body;
// mail("$headerinfo->fromaddress","torusReply", $body);
        } 
        */


     }//end of part for loop
} 

echo $bar;
    }
//}
         }//end of email for loopo
}
}
     imap_close($mbox);


?>
