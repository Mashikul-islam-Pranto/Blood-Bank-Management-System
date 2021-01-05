<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donor List</title>
   <link rel="stylesheet" type="text/css" href="css/s1.css">
   <style type="text/css">
     td{
      width: 200px;
      height:40px;


     }
   </style>
</head>
<body>
  <div id="full">
<div id="inner-full">
  <div id="header"><h2><a href='admin-home.php'style="text-decoration: none;color:white;">Blood Bank Management System</a></h2></div>
      
    <div id="body">
            <br>
            <?php
             echo $un=$_SESSION['un'];
             if(!$un)
           {
             header("Location:login.php");
           }
           ?>
             <h1>Stock Blood List</h1>
            <center><div id ="form">
             <table>
               <tr>
                 <td><center><b><font color="black">Name</b></font></center></td>
                 <td><center><b><font color="black">Qty</b></font></center></td>
               </tr>
               <tr>
                 <td><center>O+</center></td>
                 <td><center>
                   <?php
                   $q=$db->query("SELECT * FROM donor_regis WHERE bgroup='o+'");
                   echo $row=$q->rowcount();
                   ?>
                 </center></td>
               </tr>
               <tr>
                 <td><center>B+</center></td>
                 <td><center>
                  <?php
                   $q=$db->query("SELECT * FROM donor_regis WHERE bgroup='b+'");
                   echo $row=$q->rowcount();
                   ?></center></td>
               </tr>
               <tr>
                 <td><center>A+</center></td>
                 <td><center>
                   <?php
                   $q=$db->query("SELECT * FROM donor_regis WHERE bgroup='a+'");
                   echo $row=$q->rowcount();
                   ?>
                 </center></td>
               </tr>
               <tr>
                 <td><center>AB+</center></td>
                 <td><center>
                  <?php
                   $q=$db->query("SELECT * FROM donor_regis WHERE bgroup='ab+'");
                   echo $row=$q->rowcount();
                   ?></center></td>
               </tr>
               <tr>
                 <td><center>AB-</center></td>
                 <td><center>
                   <?php
                   $q=$db->query("SELECT * FROM donor_regis WHERE bgroup='ab-'");
                   echo $row=$q->rowcount();
                   ?>
                 </center></td>
               </tr>
                </table>
            </div></center>
            </div>
            <div id="footer"><h4 align="center">Helpline:01824220409</h4>
            <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
</div>
</div>
</body>
</html>

