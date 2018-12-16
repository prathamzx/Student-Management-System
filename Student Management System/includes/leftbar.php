<div class="left-sidebar bg-black-300 box-shadow ">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                <h6 class="title">User</h6>
                                <small class="info">Pt. L.M.S.Govt. Post Graduate College</small>
                            </div>
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                   <center> <li class=""><span><?php if(isset($_SESSION['class_name']))echo $_SESSION['class_name'];?></span></li></center>
                                    <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?w=<?=isset($_SESSION['class_name'])?urldecode($_SESSION['class_name']):""?>&school=<?=isset($_SESSION['school'])?$_SESSION['school']:""?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                                     
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Batch</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="create-batch.php"><i class="fa fa-bars"></i> <span>Create Batch</span></a></li>
                                            <li><a href="manage-batches.php"><i class="fa fa fa-server"></i> <span>Manage Batches</span></a></li>
                                           
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Student Branch</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="create-class.php"><i class="fa fa-bars"></i> <span>Create Branch</span></a></li>
                                            <li><a href="manage-classes.php"><i class="fa fa fa-server"></i> <span>Manage Branches</span></a></li>
                                           
                                        </ul>
                                    </li>
  <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="create-subject.php"><i class="fa fa-bars"></i> <span>Create Subject</span></a></li>
                                            <li><a href="manage-subjects.php"><i class="fa fa fa-server"></i> <span>Manage Subjects</span></a></li>
                                           <li><a href="add-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Add Subject Combination </span></a></li>
                                           <a href="manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage Subject Combination </span></a></li>

                                           <li><a href="add-subjects-to-students.php"><i class="fa fa-newspaper-o"></i> <span>Add Subjects to Students </span></a></li>
                                           <li><a href="manage-student-subjects.php"><i class="fa fa-newspaper-o"></i> <span>Manage Student Subjects </span></a></li>
                                        </ul>
                                    </li>
   <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Students</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-students.php"><i class="fa fa-bars"></i> <span>Add Students</span></a></li>
                                            <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Manage Students</span></a></li>
                                           
                                        </ul>
                                    </li>
<li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Result</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-result.php"><i class="fa fa-bars"></i> <span>Add Result</span></a></li>
                                            <li><a href="manage-results.php"><i class="fa fa fa-server"></i> <span>Manage Result</span></a></li>
                                            <li><a href="managebackresult.php"><i class="fa fa fa-server"></i> <span>Manage Back Result</span></a></li>
                                            <li><a href="batch-result.php"><i class="fa fa fa-server"></i> <span>Batch Result</span></a></li>
                                            <li><a href="back-batch-result.php"><i class="fa fa fa-server"></i> <span>Batch Result-Back</span></a></li>
                                            
                                           
                                        </ul>
                                         <li><a href="find-result.php"><i class="fa fa fa-server"></i> <span> Generate Result</span></a></li>
                                        <li><a href="change-password.php"><i class="fa fa fa-server"></i> <span> Admin Change Password</span></a></li>
                                           
                                    </li>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>