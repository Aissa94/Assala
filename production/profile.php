
<!-- Pour faire l'appel à la page "header.php" -->

<?php
    require "header.php";
?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <?php  
                        $employee = $connect->query("SELECT * FROM members WHERE memberId =".$_GET['id']);
                        while ($row = $employee->fetch()) {
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $row["lastname"]." ".$row["firstname"]; ?> <small>الملف الشخصي</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-9 col-sm-9 col-xs-12">

                                        <div class="profile_title">
                                            <div class="col-md-6">
                                                <div id="reportrange" class="pull-left">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    <span onchange="alert('aissa');"></span> <b class="caret"></b>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h2>تقرير العمل</h2>
                                            </div>
                                        </div>
                                        <br />
                                        <!-- start of user-activity-graph -->
                                        <div class="table-responsive">
                                        <table class="table table-striped jambo_table table-bordered nowrap bulk_action" dir="rtl">
                                        <thead>
                                            <tr class="headings">
                                                <th>الأيام</th>
                                                <th>الدخول</th>
                                                <th>الخروج</th>
                                                <th>ساعات العمل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $month = date('m');
                                                $year = date('Y');
                                                $start_date = "01-".$month."-".$year;
                                                $start_time = strtotime($start_date);
                                                $end_time = strtotime("+1 month", $start_time);
                                                $dates =  [];
                                                $timeIns =  [];
                                                $timeOuts = [];
                                                for($i=$start_time; $i<$end_time; $i+=86400)
                                                {
                                                $list[] = date('d-m-Y', $i);
                                                }  
                                                $presenceTable = $connect->query("SELECT * FROM presence WHERE idEmployee =".$_GET['id']);
                                                while ($row = $presenceTable->fetch()) {
                                                   $dates[] = $row["date"]; 
                                                   $timeIns[] = $row["timeIn"];
                                                   $timeOuts[] = $row["timeOut"];
                                                }
                                                $presenceTable->closeCursor();
                                                unset($connect);
                                                $j = 0;
                                                $TotalHours = 0;
                                                for ($i=0; $i<count($list); $i++) {
                                            ?>
                                            <tr>
                                                <?php if (in_array($list[$i], $dates)) { ?>
                                                <td class="present"><?php echo $list[$i]; ?></td>
                                                <td class="present"><?php echo $timeIns[$j]; ?></td>
                                                <td class="present"><?php echo $timeOuts[$j]; ?></td>
                                                <td class="present"><?php echo date("H:i", strtotime($timeOuts[$j]) - strtotime($timeIns[$j])); $TotalHours += date("H:i", strtotime($timeOuts[$j]) - strtotime($timeIns[$j])); $j++; ?></td>
                                                <?php } else { ?>
                                                    <td class="absent"><?php echo $list[$i]; ?></td>
                                                    <td class="absent"><?php echo ""; ?></td>
                                                    <td class="absent"><?php echo ""; ?></td>
                                                    <td class="absent"><?php echo ""; ?></td>
                                                <?php } ?>
                                            </tr>
                                            <?php 
                                                }
                                            ?> 
                                        </tbody>
                                    </table>
                                    </div>
                                        <!-- end of user-activity-graph -->

                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                    <!-- start recent activity -->
                                                    <ul class="messages">
                                                        <li>
                                                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-info">24</h3>
                                                                <p class="month">May</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">Desmond Davison</h4>
                                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                                <br />
                                                                <p class="url">
                                                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-error">21</h3>
                                                                <p class="month">May</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">Brian Michaels</h4>
                                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                                <br />
                                                                <p class="url">
                                                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                                    <a href="#" data-original-title="">Download</a>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-info">24</h3>
                                                                <p class="month">May</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">Desmond Davison</h4>
                                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                                <br />
                                                                <p class="url">
                                                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-error">21</h3>
                                                                <p class="month">May</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">Brian Michaels</h4>
                                                                <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                                <br />
                                                                <p class="url">
                                                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                                    <a href="#" data-original-title="">Download</a>
                                                                </p>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                    <!-- end recent activity -->

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                                    <!-- start user projects -->
                                                    <table class="data table table-striped no-margin">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Project Name</th>
                                                                <th>Client Company</th>
                                                                <th class="hidden-phone">Hours Spent</th>
                                                                <th>Contribution</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>New Company Takeover Review</td>
                                                                <td>Deveint Inc</td>
                                                                <td class="hidden-phone">18</td>
                                                                <td class="vertical-align-mid">
                                                                    <div class="progress">
                                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>New Partner Contracts Consultanci</td>
                                                                <td>Deveint Inc</td>
                                                                <td class="hidden-phone">13</td>
                                                                <td class="vertical-align-mid">
                                                                    <div class="progress">
                                                                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Partners and Inverstors report</td>
                                                                <td>Deveint Inc</td>
                                                                <td class="hidden-phone">30</td>
                                                                <td class="vertical-align-mid">
                                                                    <div class="progress">
                                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>New Company Takeover Review</td>
                                                                <td>Deveint Inc</td>
                                                                <td class="hidden-phone">28</td>
                                                                <td class="vertical-align-mid">
                                                                    <div class="progress">
                                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- end user projects -->

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                                                        craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_right">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <img class="img-responsive avatar-view" src="images/img.jpg" alt='<?php echo $row["lastname"]." ".$row["firstname"]; ?>' title='<?php echo $row["lastname"]." ".$row["firstname"]; ?>'>
                                            </div>
                                        </div>
                                        <h3><?php echo $row["lastname"]." ".$row["firstname"]; ?></h3>

                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <?php echo $row["adress"]; ?><i class="fa fa-map-marker user-profile-icon"></i>
                                            </li>

                                            <li>
                                                <?php echo $row["position"]; ?><i class="fa fa-briefcase user-profile-icon"></i>
                                            </li>

                                            <li class="m-top-xs">
                                                <a href='mailto:<?php echo $row["email"]; ?>'><?php echo $row["email"]; ?></a>
                                                <i class="fa fa-external-link user-profile-icon"></i>
                                            </li>
                                        </ul>

                                        <button class="btn btn-success btn-lg"><i class="fa fa-edit m-right-xs"></i>تعديل البيانات</button>
                                        <br /><br /><br />

                                        <!-- start skills -->
                                        <h3>نسبة الحضور والغياب</h3>
                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <p>نسبة الحضور</p>
                                                <div class="progress progress_sm">
                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <p>نسبة الغياب</p>
                                                <div class="progress progress_sm">
                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- end of skills -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                        $employee->closeCursor();
                        unset($connect);
                    ?> 
                </div>
            </div>
            <!-- /page content -->

<?php
    require "footer.php";
?>