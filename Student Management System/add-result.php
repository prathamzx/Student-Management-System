<?php
session_start();
//error_reporting(0);
include('includes/config.php');
$tbl="tblstudents".$_SESSION['active_class'];
$msg = $error = "";
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
    $marks=array();
$class=$_POST['class'];
$studentid=$_POST['studentid']; 
$mark=$_POST['marks'];
$semister = $_POST['semister'];
$p_marks = $_POST['practical-marks'];
$p_s_marks = $_POST['practical-s-marks'];
$t_s_marks = $_POST['theory-s-marks'];


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
        break;
}


 $stmt = $dbh->prepare("select * from studentsubjects where StudentId = :stuid and Semister = :sem");
 $stmt->execute(array(':stuid' => $studentid, ':sem' => $semister));

// array of relevant `subject information` objects.
  $sid1=array();

  class Subject {
    public $hasPractical;
    public $subid;
  }

 while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
 
    $x = new Subject();
    $x->hasPractical = has_practical($dbh, $row['SubjectId']);
    $x->subid = $row['SubjectId'];
    array_push($sid1,$x);
 } 
$j = $k = $l = 0;
for($i=0;$i<count($mark);$i++){

    $mar=$mark[$i];
    $sid=$sid1[$i];
    $t_s_mark = $t_s_marks[$i];
    
     $sql="INSERT INTO  tblresult(StudentId,ClassId,SubjectId,".$sem.",".$t_s_sem.") VALUES(:studentid,:class,:sid,:marks,:t_s_marks)";
     $sql_update = "UPDATE tblresult SET ".$sem."=:marks, ".$t_s_sem."=:t_s_marks WHERE StudentId=:studentid AND ClassId=:class AND SubjectId=:sid";
   
   // var_dump($sid);

    if ($sid->hasPractical == 1) {
        $sql="INSERT INTO  tblresult(StudentId,ClassId,SubjectId,".$sem.",".$p_sem.",".$t_s_sem.",".$p_s_sem.") VALUES(:studentid,:class,:sid,:marks,:pmarks,:t_s_marks,:p_s_marks)";
        $sql_update = "UPDATE tblresult SET ".$sem."=:marks, ".$p_sem."=:pmarks, ".$t_s_sem."=:t_s_marks,".$p_s_sem."=:p_s_marks WHERE StudentId=:studentid AND ClassId=:class AND SubjectId=:sid";
        $query = $dbh->prepare($sql_update);
        $query->bindParam(':pmarks', $p_marks[$j++], PDO::PARAM_STR);
        $query->bindParam(':p_s_marks', $p_s_marks[$k++], PDO::PARAM_STR);
    }
    else {
        $query = $dbh->prepare($sql_update);
    }

    $query->bindParam(':studentid',$studentid,PDO::PARAM_STR);
    $query->bindParam(':class',$class,PDO::PARAM_STR);
    $query->bindParam(':sid',$sid->subid,PDO::PARAM_STR);
    $query->bindParam(':marks',$mar,PDO::PARAM_STR);
    $query->bindParam(':t_s_marks',$t_s_mark,PDO::PARAM_STR);
    $query->execute();
    //echo $sql;
    $lastInsertId = $dbh->lastInsertId();
    if($query->rowCount() > 0) {
        $msg="Result info added successfully";
    }
    else {
        $error="Something went wrong. Please try again";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Add Result </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <script>

function getStudents(val) {
   $.ajax({
    type: "POST",
    url: "get_student.php",
    data:'classid='+val,
    success: function(data){
        $("#studentid").html(data);
       // console.log(data);
        
    }
    });
}
function getSubjects(classid, studentid, sem) {
   
$.ajax({
        type: "POST",
        url: "get_student.php",
        data:'classid1='+ classid + "$" + studentid + "$" + sem,
        success: function(data){
            $("#subject").html(data);
         //   console.log(data);
            
        }
        });
}
    </script>
<script>

function getresult(sem) {   
var clid=$(".clid").val();
var val=$(".stid").val();
var sem = $("#semister").val();
var abh=clid+'$'+val+'$'+sem;
//alert(abh);
 getSubjects($('#classid').val(), $('#studentid').val(), sem);
    $.ajax({
        type: "POST",
        url: "get_student.php",
        data:'studclass='+abh,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
    // gets subjects for the student
   
}
</script>


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
                                    <h2 class="title">Declare Result</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Result</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                           
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
    <label for="default" class="col-sm-2 control-label">Class</label>
     <div class="col-sm-10">
     <select name="class" class="form-control clid" id="classid" onChange="getStudents(this.value);" required="required">
    <option value="">Select Class</option>
    <?php $sql = "SELECT * from tblclasses";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {   ?>
    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
    <?php }} ?>
     </select>
            </div>
    </div>
<div class="form-group">
                            <label for="date" class="col-sm-2 control-label ">Student Name</label>
                            <div class="col-sm-10">
                        <select name="studentid" class="form-control stid" id="studentid" required="required">
                        </select>
                            </div>
                         </div>
                        <div class="form-group">
                                <label for="date" class="col-sm-2 control-label ">Semister</label>
                            <div class="col-md-2">
                                <select name="semister" id="semister" class="form-control" onchange="getresult(this.value);">
                                  <option value="">Select Semister</option>
                                    <option value="1">I</option>
                                    <option value="2">II</option>
                                    <option value="3">III</option>
                                    <option value="4">IV</option>
                                    <option value="5">V</option>
                                    <option value="6">VI</option>
                                </select>
                             </div>
                            </div>
                                                
                        <div class="form-group">
                                                      
                            <div class="col-sm-10">
                        <div  id="reslt">
                        </div>
                             </div>
                        </div>
                                                    
                        <div class="form-group">
                            <label for="date" class="col-sm-2 control-label">Subjects</label>
                                                        <div class="col-sm-10">
                        <div  id="subject">
                        </div>
                              </div>
                        </div>


                                                    
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                 <button type="submit" name="submit" id="submit" class="btn btn-primary">Declare Result</button>
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
