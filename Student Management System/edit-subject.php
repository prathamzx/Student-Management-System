<?php
session_start();
//error_reporting(0);
include('includes/config.php');
$error = $msg = "";
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['Update'])) {

$sid = $_GET['subjectid'];
$subjectname = $_POST['subjectname'];
$subjectcode = $_POST['subjectcode']; 
$haspracticals = $_POST['haspracticals'];
$maxtheorymarks = $_POST['maxtheorymarks'];
$maxtheorysessionalmarks = $_POST['maxtheorysessionalmarks'];
$subjectcredit = $_POST['subjectcredit'];

$sql="update tblsubjects set SubjectName=:subjectname,SubjectCode=:subjectcode, hasPractical=:haspracticals, MaxTheoryMarks=:maxtheorymarks, MaxTheorySessionalMarks=:maxtheorysessionalmarks, SubjectCredit=:subjectcredit where id=:sid";

    if (isset($_POST['maxpracticalmarks']) 
        && isset($_POST['maxpracticalsessionalmarks'])) {
        $maxpracticalmarks = $_POST['maxpracticalmarks'];
        $maxpracticalsessionalmarks = $_POST['maxpracticalsessionalmarks'];
        $sql = "update tblsubjects set SubjectName=:subjectname,SubjectCode=:subjectcode, hasPractical=:haspracticals, MaxTheoryMarks=:maxtheorymarks, MaxTheorySessionalMarks=:maxtheorysessionalmarks, SubjectCredit=:subjectcredit, MaxPracticalMarks=:maxpracticalmarks, MaxPracticalSessionalMarks=:maxpracticalsessionalmarks where id=:sid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':maxpracticalmarks', $maxpracticalmarks, PDO::PARAM_STR);
        $query->bindParam(':maxpracticalsessionalmarks', $maxpracticalsessionalmarks, PDO::PARAM_STR); 
    }
    else {
        $query = $dbh->prepare($sql);
    }
    

$query->bindParam(':subjectname',$subjectname,PDO::PARAM_STR);
$query->bindParam(':subjectcode',$subjectcode,PDO::PARAM_STR);
$query->bindParam(':haspracticals',$haspracticals,PDO::PARAM_STR);
$query->bindParam(':maxtheorymarks',$maxtheorymarks,PDO::PARAM_STR);
$query->bindParam(':maxtheorysessionalmarks',$maxtheorysessionalmarks,PDO::PARAM_STR);
$query->bindParam(':subjectcredit',$subjectcredit,PDO::PARAM_STR);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();

$msg="Subject Info updated successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin Update Subject </title>
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
                                    <h2 class="title">Update Subject</h2>
                                
                                </div>
                               
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Subjects</li>
                                        <li class="active">Update Subject</li>
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
                                                    <h5>Update Subject</h5>
                                                    <div class="text-right">
                                                        <a class="btn btn-danger text-right" href="deactivate-subject.php?id=<?=$_GET['subjectid'];?>">Delete Subject</a>
                                                    </div>
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

 <?php
$sid=intval($_GET['subjectid']);
$sql = "SELECT * from tblsubjects where id=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                               
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Subject Name</label>
                                                        <div class="col-sm-10">
 <input type="text" name="subjectname" value="<?php echo htmlentities($result->SubjectName);?>" class="form-control" id="default" placeholder="Subject Name" required="required">
                                                        </div>
                                                    </div>
<div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Subject Code</label>
                                                        <div class="col-sm-10">
 <input type="text" name="subjectcode" class="form-control" value="<?php echo htmlentities($result->SubjectCode);?>"  id="default" placeholder="Subject Code" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Subject Credits</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="subjectcredit" class="form-control" id="default" max="7" placeholder="Subject Credits" value="<?=$result->SubjectCredit?>" required="required">
                                                            <small>NOTE: 2 Credit points are reserved for Practicals (only if applicable)</small>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="padding:0px;margin:0">
                                                        <label for="default" class="col-sm-2 control-label">Maximum Theory Marks</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="maxtheorymarks" class="form-control" id="default" placeholder="Maximum Theory Marks" value="<?=$result->MaxTheoryMarks?>" required="required" max="150" min="1" required>
                                                        </div>
                                                        <label for="default" class="col-sm-2 control-label">Maximum Theory Sessional Marks</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="maxtheorysessionalmarks" class="form-control" id="default" placeholder="Maximum Theory Sessional Marks" value="<?=$result->MaxTheorySessionalMarks?>" required="required" max="150" min="1" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Practicals</label>
                                                        <div class="col-sm-10">
                                                            <div class="col-md-2">
                                                                <input type="radio" id="practicalsYES" name="haspracticals" value="1" <?php echo htmlentities($result->hasPractical) == 1?"checked='checked'":""?>/>Yes
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="radio" id="practicalsNO" name="haspracticals" value="0" <?php echo htmlentities($result->hasPractical) == 0?"checked='checked'":""?>/>No
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <?php }} ?>

                                                   <div id="parctical-div" style="display: none;">
                                                   <div class="row" style="padding:0px;margin:0">
                                                        <label for="default" class="col-sm-2 control-label">Maximum Practical Marks</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="maxpracticalmarks" class="form-control" id="maxpracticalmarks" value="<?=$result->MaxPracticalMarks?>" placeholder="Maximum Practical Marks" required="required" max="150" min="1">
                                                    </div>

                                                    <label for="default" class="col-sm-2 control-label">Maximum Practical Sessional Marks</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="maxpracticalsessionalmarks" class="form-control" id="maxpracticalsessionalmarks" placeholder="Maximum Theory Sessional Marks" value="<?=$result->MaxPracticalSessionalMarks?>" required="required" max="150" min="1">
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <script>
                                                        var div = document.getElementById('parctical-div');
                                                        var practicalsYES = document.getElementById('practicalsYES');
                                                        var practicalsNO = document.getElementById('practicalsNO');
                                                        if (practicalsYES.checked) {
                                                            var div = document.getElementById('parctical-div');
                                                            div.style.display = 'block';
                                                            document.getElementById('maxpracticalsessionalmarks').setAttribute('required', 'required')
                                                            document.getElementById('maxpracticalmarks').setAttribute('required', 'required')
                                                        }
                                                        else {

                                                            document.getElementById('maxpracticalsessionalmarks').removeAttribute('required')
                                                            document.getElementById('maxpracticalmarks').removeAttribute('required')
                                                        }
                                                        
                                                        </script>


                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="Update" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <!-- /.panel-body -->
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
