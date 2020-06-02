<?php
$mbox = imap_open("{mx.sdf.org:143}INBOX", "bardoman", 
"z1123f&13");

$bar="<br>*******************************************<br>";
if( $mbox ) {

     global $charset,$htmlmsg,$plainmsg,$attachments;
    $htmlmsg = $plainmsg = $charset = '';
    $attachments = array();

     //Check no.of.msgs
     $num = imap_num_msg($mbox);

     //if there is a message in your inbox

      //   for ($cnt = 0; $cnt <= $num; $cnt++) {
         $search_string = 'BODY TORUS'; 

$emails = imap_search($mbox  , $search_string);
$size = sizeof($emails);
echo "size=" . $size . "<BR>";
echo "emails=><br>";
print_r($emails);
echo $bar;

for ($cnt = 0; $cnt <= $size; $cnt++) {

$headerinfo = imap_headerinfo($mbox, $emails[$cnt]);

echo "date:" . date("F j, Y, g:i a", $headerinfo->udate) . "<br>"; 
echo "from address:" . $headerinfo->fromaddress . "<br>";
if( $headerinfo->fromaddress ==  "+17209385087@tmomail.net")
{
    if($headerinfo->Subject!== '')
    {
        mail("$headerinfo->fromaddress","torusReply", "torusReply");
    }

}


echo "to address:" . $headerinfo->toaddress . "<br>";
echo "subject:" . $headerinfo->Subject . "<br><br>";


echo "emails[$cnt]=" . $emails[$cnt] . "<br>";

$st = imap_fetchstructure($mbox, $emails[$cnt]);
/*
echo "structure_var_dump=> <br>";
var_dump($st);

echo $bar;
echo "<br> imap_fetchbody all=> <br>";
$body = imap_fetchbody($mbox, $emails[$cnt], "");
echo imap_qprint($body);
echo $bar;
*/

if (!empty($st->parts)) {
    for ($i = 0, $j = count($st->parts); $i < $j; $i++) {
        $part = $st->parts[$i];

//echo "<br> part_var_dump[" . $i . "]=> <br>";
//var_dump($part);
//echo "<br>";



        if ($part->subtype == 'PLAIN') {
            
echo "<br>partType=>PLAIN<br>";
$body = imap_fetchbody($mbox, $emails[$cnt], $i+1);
$body=imap_base64($body);
echo $body;
        }
      /*  else if($part->subtype == 'HTML') {
              echo "<br>partType=>HTML<br>";

        }
        else
        {
              echo "<br>partType=>" . $part->subtype . "<br>";
        }
        
 echo "<br>partType=>" . $part->subtype . "<br>";

 $body = imap_fetchbody($mbox, $emails[$cnt], $i+1);
echo "body=> <br>";
echo imap_qprint($body);
echo $bar;*/

     }//end of for loop


} else {
  //  $body = imap_body($mbox, $emails[$cnt]);
}
//  $body = imap_fetchbody($mbox, $emails[$cnt], 1.1);
//echo "body=> <br>";
//$body = imap_8bit($body);
//echo imap_qprint($body);



//echo imap_qprint($body);
//echo imap_qprint(imap_body($mbox, $emails[$cnt]));

echo $bar;
         }


     //close the stream
     imap_close($mbox);
}


?>
