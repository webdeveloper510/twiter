<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>

<div class="container">
<form method="post">
<label> Twitter UserId</label><br>
  <input type="text" name="use_id" id="">
        <input type="submit" name="button1" class="button" value="Submit" />
    </form>
	</div>
</body>
</html>

<?php
  if(array_key_exists('button1', $_POST)) {
	  $acc_id= $_POST['use_id'];
    button1($acc_id);
}

function button1($acc_id) {

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.twitter.com/2/users/'.$acc_id.'/followers',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAElNcwEAAAAAAj5cTfBXQj0vimY%2FyPjzR2%2BhKz0%3D3WmNfRvkvwXHvqwSrrcYeM8s3mRmT4Q6Evt1MauGHVktHDwmVT',
    'Cookie: guest_id=v1%3A165311087178061749'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$result= json_decode($response, true);

/*  echo '<pre>'; 
print_r($result); 
echo '</pre>';  */
?>

<div class="container">
  <table class="table">
    <thead>
      <tr>
	    <th>Id</th>
        <th>Name</th>
        <th>Username</th>
      </tr>
    </thead>
	    <tbody>
      
	<?php
foreach($result['data'] as $list){

	
	//print_r($list['id']);?>
	<tr>
	<td><?php echo $list['id'];?></td>
	<td><?php  echo $list['name'];?> </td>
	<td><?php  echo $list['username'];?></td>
</tr>
<?php
}
}
?>
    </tbody>
  </table>
  </div>
