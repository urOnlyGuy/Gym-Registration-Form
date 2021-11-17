<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $gender=$_POST['gender'];
  $current_wt=$_POST['current_wt'];
  $desire_wt=$_POST['desire_wt'];
  $height=$_POST['height'];
  $BMI=$_POST['BMI'];
  $address=$_POST['address'];
	$city=$_POST['city'];
  $state=$_POST['state'];
  $zip_code=$_POST['zip_code'];
  $country=$_POST['country'];
  $email=$_POST['email'];
	$phone=$_POST['phone'];
  $personal_trainer=$_POST['personal_trainer'];
  $gym_before=$_POST['gym_before'];
  

  

  $field1="<b>Gender:</b> ".$gender."<br>"."<b>Current Weight:</b> ".$current_wt."<br>"."<b>Desired weight:</b> ".$desire_wt."<br>"."<b>Height:</b> ".$height."<br>"."<b>BMI:</b> ".$BMI."<br>"."<b>Address: </b>"."<br>"."Street: ".$address."<br>"."City: ".$city."<br>"."State: ".$state."<br>"."Zip Code: ".$zip_code."<br>"."Country: ".$country."<br>"."<b>Do you require a personal trainer?:</b> ".$personal_trainer."<br>"."<b>Have you been in a Gym before?:</b> ".$gym_before;
}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>