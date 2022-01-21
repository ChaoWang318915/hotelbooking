<?php
$config = parse_ini_file(__DIR__."/database.ini");

function create()
  {
    return view('admin.template.help.faq');
  }

if( $_SERVER['HTTP_HOST']=='localhost')
{
$host = $config['local_host']; /* Host name */
$user = $config['local_user']; /* User */
$password = $config['local_password']; /* Password */
$dbname = $config['local_dbname']; /* Database name */
}
else
{
$host = $config['host']; /* Host name */
$user = $config['user']; /* User */
$password = $config['password']; /* Password */
$dbname = $config['dbname']; /* Database name */
}
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$userid = $_SERVER['REMOTE_ADDR']; 


$postid = $_POST['postid'];
$type = $_POST['type'];
$category = $_POST['category'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE postid=".$postid." and userid='".$userid."' and category='".$category."'";

$result = mysqli_query($con,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

if($count == 0){
    $insertquery = "INSERT INTO like_unlike(userid,postid,type,category) values('".$userid."',".$postid.",".$type.",'".$category."')";
    mysqli_query($con,$insertquery);
}else {
    $updatequery = "UPDATE like_unlike SET type=" . $type . " where userid='".$userid."' and postid=".$postid." and category='".$category."'";
    mysqli_query($con,$updatequery);
}

// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type=1 and postid=".$postid." and category='".$category."'";
$result = mysqli_query($con,$query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type=0 and postid=".$postid." and category='".$category."'";
$result = mysqli_query($con,$query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];

$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);

 ?>