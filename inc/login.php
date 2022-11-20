<?php session_start();
include ('dbcon.php');
include ('functions.php');
$today = strftime("%Y-%m-%d", time()); 
if(isset($_POST['email']) && $_POST['password'] != ''){
    $uname= $_POST['email'];
    $passw= sha1($_POST['password']);
    $sql="SELECT * FROM tbl_user WHERE email='$uname' AND password='$passw' LIMIT 1";
    $res= mysqli_query($con, $sql);
    $row=mysqli_fetch_array($res);
    $count= mysqli_num_rows($res);
    
    if($count <= 0){  
    $_SESSION['errmsg'] = 'You enter wrong user name or password!';
    $_SESSION['uid']=0;
    $_SESSION['softiclogin']=false;
    header("location:../index.php");    
    }else{    
        $_SESSION['softiclogin']=true;    
        $_SESSION['utype']=$row['utype'];
        $_SESSION['name']=$row['name'];     
        $_SESSION['uid']=$row['id']; 
        $_SESSION['reffer_code']=$row['reffer_code'];   
        if(isset($_SESSION['cuPages'])){
            
        }else{
        $_SESSION['cuPages']="home.php";    
        }
        header("location:../".$_SESSION['cuPages']);    

    }    
}else{
header("location:../index.php");      
}

?>
