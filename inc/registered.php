
<?php
session_start(); 
include 'dbcon.php';
include ('functions.php');

if(isset($_POST['email'])){
$code=generateRandomCode();

$email = remove_junk(escape($_POST['email']));
$name = remove_junk(escape($_POST['name']));  
$pass = remove_junk(escape($_POST['password']));
$spass= sha1($pass); 
$address = remove_junk(escape($_POST['address']));    
$reffer_code = remove_junk(escape($_POST['reffer_code'])); 
if($reffer_code!=''){
    $sql="SELECT * FROM tbl_user WHERE reffer_code='$reffer_code' LIMIT 1";
    $res= mysqli_query($con, $sql);
    $row=mysqli_fetch_array($res);
    $reffer_id=$row['id'];
}else{
    $reffer_id='';
}


if(isset($_POST['email'])){
$ducode = mysqli_query($con,"SELECT * FROM tbl_user WHERE email = '$email'");
}
	
if($ducode->num_rows > 0) {
$_SESSION['errmsg'] = 'Email Address alrady used! Plz try another';
echo "<script>window.location='../register.php'</script>";
}else{       
$sql="INSERT INTO tbl_user(name,email,password,utype,address,reffer_id,reffer_code) VALUES ('$name','$email','$spass','user','$address','$reffer_id','$code')";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
$eid=$con->insert_id;    
if($result){   
if($reffer_id!=''){
$sql="INSERT INTO points(user_id,reffer_id,point) VALUES ('$eid','$reffer_id','22')";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));
}

$_SESSION['errmsg'] = 'User Register Successfully!!!';
echo "<script>window.location='../index.php'</script>";	
}else{
$_SESSION['errmsg'] = 'User insert fail!!!!';
echo "<script>window.location='../register.php'</script>";		
}
}
}    
?>