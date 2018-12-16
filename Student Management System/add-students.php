<?php

session_start();
//error_reporting(0);
include_once('includes/config.php');
$msg = "";
$error = "";
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit'])) {
    $studentname=$_POST['fullname'];
    $fathername=$_POST['fathername'];
    //$roolid=$_POST['rollid']; 
    $enrollmentid=$_POST['enrollmentid'];
    $studentbatch=$_POST['batch']; 
    $dob = strtotime($_POST['dob']);
    $dob = date('Y-m-d H:i:s', $dob); 
    $gender=$_POST['gender']; 
    $category=$_POST['category']; 
    $classid=$_SESSION['active_class']; 
    $status=1;
    $tbl="tblstudents".$classid;
    $sql="INSERT INTO $tbl (StudentName,FatherName,EnrollmentId,StudentBatch,DOB,Gender,Category,ClassId,Status) VALUES(:studentname,:fathername,:enrollmentid,:studentbatch,:dob,:gender,:category,:classid,:status)";
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
    $query->bindParam(':fathername',$fathername,PDO::PARAM_STR);
    //$query->bindParam(':roolid',$roolid,PDO::PARAM_STR);
    $query->bindParam(':enrollmentid',$enrollmentid,PDO::PARAM_STR);
    $query->bindParam(':studentbatch',$studentbatch,PDO::PARAM_STR);
    $query->bindParam(':dob',$dob, PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':classid',$classid,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
    

       //  $sql2="update tblstudents SET RollId= ?";
        //  $stmt = $dbh->prepare($sql);
         //$stmt->execute($);
  
//echo $stmt;
    
    $lastInsertId = $dbh->lastInsertId();

if($lastInsertId) { 
    $msg="Student info added successfully";
         $sql="select StudentId from $tbl where EnrollmentId=?";
             $stmt = $dbh->prepare($sql);
         $stmt->execute([$enrollmentid]);
         $rno=$stmt -> fetch(PDO::FETCH_ASSOC);
       // $rno="bkjb";
         $s=substr(date("Y"),2,2);
    $sql="select ClassNameNumeric from tblclasses where id=$classid";
    $stmt = $dbh->prepare($sql);
         $stmt->execute();
    $cin=$stmt -> fetch(PDO::FETCH_ASSOC);
         // $rno=substr_replace($rno,$s,2,1);
                //$SESSION['dob']=$SESSION['dob']+$semister;
                $sql1=" UPDATE $tbl SET StudentId =? where EnrollmentId=?";
    $stmt = $dbh->prepare($sql1);
         foreach ($rno as $r)
             $r=substr_replace($r,$s,0,2);
    $r=substr_replace($r,$cin,2,1);
                 $stmt->execute([$r,$enrollmentid]);

     $sql2="update $tbl set RollId=StudentId where EnrollmentId=?";
    $stmt = $dbh->prepare($sql2);
     $stmt->execute([$enrollmentid]);
    // $SESSION['dob']=substr($dob,2,2);
     //$sql1=" UPDATE tblstudents SET RollId =? where EnrollmentId=?";
    //$stmt = $dbh->prepare($sql1);
  // $stmt->bindParam(':enrollmentid',$enrollmentid,PDO::PARAM_STR);
   // $stmt->execute([$SESSION['dob'],$enrollmentid]);

}
else {
    $error="Something went wrong. Please try again";  echo $query->error;
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Student Admission< </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Admission</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Admission</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Student's Name</label>
<div class="col-sm-4">
<input type="text" name="fullname" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
<label for="default" class="col-sm-2 control-label">Father's Name</label>
<div class="col-sm-4">
<input type="text" name="fathername" class="form-control" id="fathername" required="required" autocomplete="off">

</div>
</div>

<div class="form-group">
<!--<label for="default" class="col-sm-2 control-label">Roll Id</label>
<div class="col-sm-4">
<input type="text" name="rollid" class="form-control" id="rollid" maxlength="7" required="required" autocomplete="off">
</div>-->
<label for="default" class="col-sm-2 control-label">Enrollment Id</label>
<div class="col-sm-4">
<input type="text" name="enrollmentid" class="form-control" id="enrollmentid" maxlength="7" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Batch</label>
<div class="col-sm-4">
<select name="batch" id="sbatch" class="form-control">
    <?php
        $res = get_batches($dbh);
        if ($res != null) {
            foreach($res as $r) {
                ?>
                    <option value="<?=$r->id;?>"><?=$r->BatchStart.' - '.$r->BatchEnd;?></option>
                <?php
            }
        }
    ?>
</select>
</div>
<label for="default" class="col-sm-2 control-label">Date Of Birth</label>
<div class="col-sm-4">
<input type="date" name="dob" class="form-control" id="dob" required="required" autocomplete="off">
</div>
</div>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
</div>
</div>
                                                    
 <div class="form-group">
<label for="default" class="col-sm-2 control-label">Category</label>
<div class="col-sm-10">
<input type="radio" name="category" value="General" required="required" checked="">General 
    <input type="radio" name="category" value="OBC" required="required">OBC
    <input type="radio" name="category" value="SC" required="required">SC
    <input type="radio" name="category" value="ST" required="required">ST
</div>
</div>
  <!--<div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>

 </select>
                                                        </div>
                                                    </div>
                                                    
-->
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
<?php

//session_start();
//error_reporting(0);
