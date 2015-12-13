<?php
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];

$to      = 'jitendrawithu@gmail.com';
$to1 = 'jitendra2u@yahoo.com';

$subject = 'Contact Form Query(My Creative Therapies)';
$message = "<table>
	<tr>
        <td style='display:inline-block;'>Subject : </td>
        <td style='display:inline-block;'>$subject</td>
		
    </tr>
    <tr style='clear:both'>
        <td style='display:inline-block;'>Name : </td>
        <td style='display:inline-block;'>$name</td>
    </tr>
    <tr style='clear:both'>
        <td style='display:inline-block;'>Email : </td>
        <td style='display:inline-block;'>$email</td>
    </tr>
	<tr style='clear:both'>
        <td style='vertical-align:top;'>Message : </td>
        <td style='display:inline-block;'>$msg</td>
    </tr>
</table>    
";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:<'.$email.'>' . "\r\n";

  mail($to, $subject, $message, $headers);
  mail($to1, $subject, $message, $headers);
  
?> 
