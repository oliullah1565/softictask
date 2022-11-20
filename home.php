<?php session_start();
require_once 'inc/dbcon.php';
require_once 'inc/functions.php';
if(isset($_SESSION["softiclogin"]) && $_SESSION["softiclogin"] == true){
    $_SESSION['cuPages']='home.php'; 
    $cuPage='home.php';
    $uid=$_SESSION['uid'];
    $uty=$_SESSION['utype'];    
    $name=$_SESSION['name'];    
    $reffer_code=$_SESSION['reffer_code'];
}else{
    header('Location:index.php');
    exit;    
}
?>
<?php 
include('layout/head.php');
include('layout/sidebar.php');
include('layout/header.php');
?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php if($uty=='user'){?>
        <div class="card-body">
            <?php
               $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/softic/register.php?reffer=".$reffer_code;
               //echo $actual_link;
            ?>
                    
            <div class="template-demo">
                <input type="text" class="form-control p_input" value="<?php echo $actual_link;?>" id="myInput" readonly>
                <button  onclick="myFunction()" class="btn btn-primary btn-rounded btn-fw">Copy Reffer Code</a>
                
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">My Reffer</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Point</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            $tpoint=0;
                            $sql="SELECT * FROM points where reffer_id='$uid' ORDER BY id ASC";    
                            $query=mysqli_query($con,$sql)or die(mysqli_error($con));
                            while ($row=mysqli_fetch_array($query)){
                            $tpoint+=$row['point'];
                            ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo get_fild_data('tbl_user',$row['user_id'],'name');?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['point']; ?></td>
                          </tr>
                        <?php } ?>  
                        <tr>
                            <td colspan='3'>Total Point</td>
                            <td><?php echo $tpoint;?></td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        <?php } else{?>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All User</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Reffer By</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            $tpoint=0;
                            $sql="SELECT * FROM tbl_user where utype='user' ORDER BY id ASC";    
                            $query=mysqli_query($con,$sql)or die(mysqli_error($con));
                            while ($row=mysqli_fetch_array($query)){
                            ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo$row['name']; ?></td>
                            <td><?php echo$row['email']; ?></td>
                            <td><?php echo$row['address']; ?></td>
                            <td><?php if($row['reffer_id'] !=''){ echo get_fild_data('tbl_user',$row['reffer_id'],'name');} ?></td>
                          </tr>
                        <?php } ?>  
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>


        <?php } ?>
    </div>
</div>
<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}
</script>

<?php
include('layout/footer.php');

?>