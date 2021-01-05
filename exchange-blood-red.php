<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Exchange Blood Donor Registration></title>
  <link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
  <div id="inner-full">
    <div id="header"><h2><a href='admin-home.php'style="text-decoration: none;color:white;">Blood Bank Management System</a></h2></div>
    <div id="body">
      <br>
      <?php
       $un=$_SESSION['un'];
       if(!$un)
       {
         header("Location:login.php");
       }
      ?>
      <h1>Exchange Blood Donor Registration</h1>
      <center><div id="form">
        <form action="" method="post">
        <table>
          <tr>
            <td width="200px" height="50px">Enter Name</td>
            <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
            <td width="200px" height="50px">Enter Full Name</td>
            <td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Full Name"></td>
          </tr>
          <tr>
            <td width="200px" height="50px">Enter Address</td>
            <td width="200px" height="50px"><textarea name="address"></textarea></td>
            <td width="200px" height="50px">Enter City</td>
            <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
          </tr>
          <tr>
            <td width="200px" height="50px">Enter Age</td>
            <td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age"></td>
            <td width="200px" height="50px">Enter E-mail</td>
            <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-mail"></td>
          </tr>
          <tr>
          <td width="200px" height="50px">Enter Mobile No</td>
          <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No"></td>
          <td width="200px" height="50px">Select Blood Group</td>
            <td width="200px" height="50px">
              <select name="bgroup">
                <option>O+</option>
                <option>B+</option>
                <option>A+</option>
                <option>AB+</option>
                <option>AB-</option>
                </select>
            </td>
          </tr>
          <tr>
            <td width="200px" height="50px">Exchange Blood Group</td>
            <td width="200px" height="50px">
              <select name="ebgroup">
                <option>O+</option>
                <option>B+</option>
                <option>A+</option>
                <option>AB+</option>
                <option>AB-</option>
                </select>
            </td>
            <td><input type="submit" name="sub" value="Save"></td>
          </tr>
        </table>
        </form>
        
        <?php
         if(isset($_POST['sub']))
         {
          //front end data input
          $name=$_POST['name'];
          $fname=$_POST['fname'];
          $address=$_POST['address'];
          $city=$_POST['city'];
          $age=$_POST['age'];
          $bgroup=$_POST['bgroup'];
          $email=$_POST['email'];
          $mno=$_POST['mno'];
          $ebgroup=$_POST['ebgroup'];
          //front end data input end

          //select and insert
          $q2="select * from donor_regis where bgroup='$bgroup'";
          $st=$db->query($q2);
          $num_row=$st->fetch();
          $id=$num_row['id'];
          $name=$num_row['name'];
          $b1=$num_row['bgroup'];
          $mno=$num_row['mno'];
          $q1="INSERT INTO out_stock_b (bname,name,mno) value(?,?,?)";
          $st1=$db->prepare($q1);
          $st1->execute([$b1,$name,$mno]);
          //select and insert end
   
          //delete code 
          $delete_q="delete from donor_regis where id='$id'";
          $st1=$db->prepare($delete_q);
          $st1->execute();
          //delete code end

          //exchange info insert
          $q=$db->prepare("INSERT INTO exchange_b (name,fname,address,city,age,bgroup,email,mno,ebgroup) VALUES(:name,:fname,:address,:city,:age,:bgroup,:email,:mno,:ebgroup)");
            $q->bindValue('name',$name);
            $q->bindValue('fname',$fname);
            $q->bindValue('address',$address);
            $q->bindValue('city',$city);
            $q->bindValue('age',$age);
            $q->bindValue('bgroup',$bgroup);
            $q->bindValue('email',$email);
            $q->bindValue('mno',$mno);
            $q->bindValue('ebgroup',$ebgroup);
            if($q->execute())
            {
              echo "<script>alert('Registration Successfull')</script>";
            }
            else
            {
              echo "<script>alert('Registration Fail')</script>";
            }
         } 
           ?>
      </div></center>
    </div>
    <div id="footer"><h4 align="center">Helpline:01824220409</h4>
    <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
  </div>
</body>
</html>




