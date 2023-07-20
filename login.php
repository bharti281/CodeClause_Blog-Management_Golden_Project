<?php
ob_start();
session_start();
if(isset($_SESSION['user_data'])){
    header("location: https://assignmentis.000webhostapp.com/admin/index.php");
}
include 'config.php';
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-xl-5  col-md-4  m-auto p-5 mt-5 bg-primary bg-primary br-5 rounded border border-info">
            <form action="" method="POST">
               
               <h5 class="text-center mb-3 text-white">Login your account</h5>
                <div class="mb-3">

                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email"
                        name="email"required>
                </div>

                <div class="mb-3">

                    <input type="password" class="form-control " placeholder="Password" name="password"required>

                </div>
                <div class="mb-3 text-center">
                    <input type="submit" name="login_btn" class="btn btn-outline-light " value="Login" >

                </div>
<?php
if(isset($_SESSION['error'])){
$error =  $_SESSION['error'];
echo "<p class='bg-danger p-2 text-white'>".$error."</p>";
unset($_SESSION['error']);
}
 ?>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php';
if(isset($_POST['login_btn'])){
   $email = mysqli_real_escape_string($config, $_POST['email']);
   $pass = mysqli_real_escape_string($config,sha1($_POST['password']));
   
   $sql = "SELECT * FROM user WHERE email ='$email' AND password='$pass'";
   $query = mysqli_query($config,$sql);
   $data=mysqli_num_rows($query);
   if($data){
       $result = mysqli_fetch_assoc($query);
       $user_data= array($result['user_id'],$result['username'],$result['role']);
       $_SESSION['user_data'] = $user_data;
header("location: admin/index.php");
exit();
   }
   else{
      $_SESSION['error']= "Invaild email/password";
header("location: login.php");
exit();
   }
}
?>