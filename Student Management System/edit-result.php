<?php
session_start();
//error_reporting(0);
$tbl="tblstudents".$_SESSION['active_class'];
include('includes/config.php');
$msg = $error = "";
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

$stid=intval($_GET['stid']);

if(isset($_POST['submit'])) {

    $rowid=$_POST['id'];
    $marks=$_POST['marks']; 
    $p_marks = $_POST['practical-marks'];
    $semister = $_POST['semister'];
    if(isset($_POST['sessional-p-marks']))
    $p_s_marks = $_POST['sessional-p-marks'];
    $t_s_marks = $_POST['sessional-t-marks'];
    $sem = $p_sem = "";   
    switch ($semister) {
         case '1':
        $sem = 'sem_1';
        $p_sem = 'p_sem_1';
        $t_s_sem = 's_sem_1';
        $p_s_sem = 'p_s_sem_1';
        break;
    
    case '2':
        $sem = 'sem_2';
        $p_sem = 'p_sem_2';
        $t_s_sem = 's_sem_2';
        $p_s_sem = 'p_s_sem_2';
        break;
    case '3':
        $sem = 'sem_3';
        $p_sem = 'p_sem_3';
        $t_s_sem = 's_sem_3';
        $p_s_sem = 'p_s_sem_3';
        break;
    case '4':
        $sem = 'sem_4';
        $p_sem = 'p_sem_4';
        $t_s_sem = 's_sem_4';
        $p_s_sem = 'p_s_sem_4';
        break;
    case '5':
        $sem = 'sem_5';
        $p_sem = 'p_sem_5';
        $t_s_sem = 's_sem_5';
        $p_s_sem = 'p_s_sem_5';
        break;
    case '6':
        $sem = 'sem_6';
        $p_sem = 'p_sem_6';
        $t_s_sem = 's_sem_6';
        $p_s_sem = 'p_s_sem_6';
        break;
    default:
        $sem = "";
        $p_sem = "";
        $s_sem = "";
        $p_s_sem = "";
        $credit_sem = '';
        $p_credit_sem = '';
        break;
    }
    
    $x = $y = $z = 0;
    foreach($_POST['id'] as $count => $id){
        
        $mrks=$marks[$count];
        $iid=$rowid[$count];
        $t_s_mark = $t_s_marks[$count]; 

        // find subject at row = $iid
        // find the that subject has practicals or not
        // if not then update just the sem marks 
        // else update the p_sem marks also.
        $sub_id = get_subject_at_result_row($dbh, $id);
        $hasPractical = has_practical($dbh, $sub_id);
        
        $sql="update tblresult set ".$sem."=:marks, ".$t_s_sem."=:t_s_marks  where id=:iid ";
        
        if ($hasPractical == "1") {
            $sql = "UPDATE tblresult SET ".$sem."=:marks, ".$p_sem."=:p_marks, ".$p_s_sem."=:p_s_marks, ".$t_s_sem."=:t_s_marks WHERE id=:iid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':p_marks', $p_marks[$x++], PDO::PARAM_STR);
            $query->bindParam(':p_s_marks', $p_s_marks[$y++], PDO::PARAM_STR);

           // echo $sem."-".$p_sem."<br>";
        } 
        else {
            $query = $dbh->prepare($sql);    
        }
          /*  echo "p_marks = ".$p_marks[$x-1]."<br>";
            echo $sql."<br>";
*/
        $query->bindParam(':t_s_marks', $t_s_mark, PDO::PARAM_STR);
        $query->bindParam(':marks',$mrks,PDO::PARAM_STR);
        $query->bindParam(':iid',$iid,PDO::PARAM_STR);
        $query->execute();
        $msg="Result info updated successfully";
}

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin|  Student result info < </title>
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
                                    <h2 class="title">Student Result Info</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Result Info</li>
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
                                                    <h5>Update the Result info</h5>
                                                </div>
                                            </div>
         <div class="row"> <div class="col-md-12">
                           <center>  <span style="font-size:40px; color:#7c7373"><?php echo htmlentities($stid);?></span></center>
</div>
             <div class="col-md-12">
                 <span style="float:right;">
<form action="edit-result.php">
 
<input type="hidden" name="stid" value="<?php echo htmlentities($stid+1); ?>" >
    <input class="btn btn-success" type="submit" name="submit1" value="NEXT">
                                            </form> 
                     </span> 
                  <span style="float:left;">
<form action="edit-result.php">
 
<input type="hidden" name="stid" value="<?php echo htmlentities($stid-1); ?>" >
    <input class="btn btn-success" type="submit" name="submit1" value="PREV"> 
                                            </form> 
                       </span> </div>                    </div>        
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

$ret = "SELECT $tbl.StudentName,tblclasses.ClassName,tblclasses.Section from tblresult join $tbl on tblresult.StudentId=tblresult.StudentId join tblsubjects on tblsubjects.id=tblresult.SubjectId join tblclasses on tblclasses.id=$tbl.ClassId where $tbl.StudentId=:stid limit 1";
$stmt = $dbh->prepare($ret);
$stmt->bindParam(':stid',$stid,PDO::PARAM_STR);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($result as $row)
{  ?>


                                                    <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
<?php echo htmlentities($row->ClassName)?>(<?php echo htmlentities($row->Section)?>)
                                                        </div>
                                                    </div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<?php echo htmlentities($row->StudentName);?>
</div>
</div>
<?php } }?>

<script type="text/javascript">
    function getresult(sem) {
        var d = <?php echo $stid;?>+"$"+sem;
        $.ajax({
            type: "POST",
            url: "get-semister-marks.php",
            data:'data='+d,
            success: function(data){
                $("#semister-marks").html(data);
               // alert(data);
                
            }
            });
    }
</script>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Semister</label>
<div class="col-sm-3">
    <select name="semister" class="form-control" id="semister" onChange="getresult(this.value)">
        <option value="">Select Semister for Result</option>
        <option value="1">Semister 1</option>
        <option value="2">Semister 2</option>
        <option value="3">Semister 3</option>
        <option value="4">Semister 4</option>
        <option value="5">Semister 5</option>
        <option value="6">Semister 6</option>
    </select>

</div>
</div>


<div id="semister-marks"></div>                                                   

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
