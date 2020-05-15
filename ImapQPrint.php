<?php
$mbox = imap_open("{mx.sdf.org:143}INBOX", "bardoman", "011235813");

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
echo "<br>";
echo "<br>*******************************************<br>";

for ($cnt = 0; $cnt <= $size; $cnt++) {


$obj_thang = imap_headerinfo($mbox, $emails[$cnt]);

echo "date:" . $obj_thang->udate . "<br>";
echo "from address:" . $obj_thang->fromaddress . "<br>";
echo "to address:" . $obj_thang->toaddress . "<br>";
echo "subject:" . $obj_thang->Subject . "<br><br>";


echo "emails[$cnt]=" . $emails[$cnt] . "<br>";

$st = imap_fetchstructure($mbox, $emails[$cnt]);
//echo "structure_var_dump=> <br>";
//var_dump($st);
echo "<br>";

if (!empty($st->parts)) {
    for ($i = 0, $j = count($st->parts); $i < $j; $i++) {
        $part = $st->parts[$i];



        if ($part->subtype == 'PLAIN') {
             $body = imap_fetchbody($mbox, $emails[$cnt], $i+1);
echo "<br>partType=>PLAIN<br>";
echo "body=> <br>";
echo imap_qprint($body);
        }
        else if($part->subtype == 'HTML') {
             $body = imap_fetchbody($mbox, $emails[$cnt], $i+1);
              echo "<br>partType=>HTML<br>";
echo "body=> <br>";
echo imap_qprint($body);
        }
     }
} else {
    $body = imap_body($mbox, $emails[$cnt]);
}





//echo imap_qprint($body);
//echo imap_qprint(imap_body($mbox, $emails[$cnt]));

echo "<br>*******************************************<br>";
         }


     //close the stream
     imap_close($mbox);
}


?>
