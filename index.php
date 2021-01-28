<?php include_once('./database/config.php');
if (!$_COOKIE["loggedIn"]) {
    header('Location: ./login.php');
}
$data1 = getAddmTasks();
$data2 = getAddmFindings();
include_once('includes/head.php');
?>

                    <!-- sales area start -->
                    <div class="col-xl-8 col-lg-8 mt-5 pl-0">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">ADDM Tasks</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>Task Id</th>
                                                <th>Task Name</th>
                                                <th>Created</th>
                                                <th>Modified</th>
                                                <th>Status</th>
                                                <th>Owner</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data1 as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['TASK_ID']; ?></td>
                                                    <td><?php echo $row['TASK_NAME']; ?></td>
                                                    <td><?php echo $row['CREATED']; ?></td>
                                                    <td><?php echo $row['LAST_MODIFIED']; ?></td>
                                                    <td><?php echo $row['STATUS']; ?></td>
                                                    <td><?php echo $row['OWNER']; ?></td>
                                                    <td><?php echo $row['DESCRIPTION']; ?></td>
                                                </tr>
                                            <?php } ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sales area end -->
                    <!-- timeline area start -->
                    <div class="col-xl-4 col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">ADDM Notifications</h4>
                                <div class="timeline-area">
                                    <?php foreach($data2 as $row) { ?>

                                    <div class="timeline-task">
                                    <div class="icon bg1">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="tm-title">
                                        <h4><?php echo utf8_encode($row['FINDING_NAME']); ?></h4>
                                        <?php switch ($row['TYPE']) {
                                            case 'INFORMATION':
                                                echo '<span class="badge badge-pill badge-primary">INFORMATION</span>';
                                                break;
                                            case 'PROBLEM':
                                                echo '<span class="badge badge-pill badge-danger text-white">PROBLEM</span>';
                                            break;
                                            case 'SYMPTOM':
                                                echo '<span class="badge badge-pill badge-dark">SYMPTOME</span>';
                                            break;
                                            case 'ERROR':
                                                echo '<span class="badge badge-pill badge-warning">ERROR</span>';
                                            break;
                                        }
                                        ?>
                                    </div>
                                    <p>
                                        <?php echo utf8_encode($row['MESSAGE']);?>
                                    </p>
                                    </div> 
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- timeline area end -->
                    <!-- def area start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body bg1">
                                <h4 class="header-title text-white">Definitions :</h4>
                                <div class="tutu-content">
                                    <h4 class="title text-white">ADDM TASKS</h4>
                                    <p class="text-white">
                                        The Automatic Database Diagnostic Monitor (ADDM) analyzes data in the Automatic
                                        Workload Repository (AWR) to identify potential performance bottlenecks. For
                                        each of the identified issues, it locates the root cause and provides
                                        recommendations for correcting the problem. An ADDM analysis task is performed
                                        and its findings and recommendations stored in the database every time an AWR
                                        snapshot is taken provided the statistics_level parameter is set to TYPICAL or
                                        ALL. The ADDM analysis includes: CPU Load , Memory Usage, I/O Usage, Resource
                                        Intensive SQL, Resource Intensive PL/SQL and Java, RAC Issues, Application
                                        Issues, Database Configuration Issues, Concurrency Issues and Object Contention.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- def area end -->

                    <!-- sales area start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">ADDM Alerts</h4>
                            </div>
                        </div>
                    </div>

                    <!-- def area start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body bg1">
                                <h4 class="header-title text-white">Definitions :</h4>
                                <div class="tutu-content">
                                    <h4 class="title text-white">ADDM ALERTS</h4>
                                    <p class="text-white">
                                        Alerts help you monitor your database proactively. Most alerts are notifications
                                        when particular metrics thresholds are crossed. For each alert, you can set
                                        critical and warning threshold values. These threshold values are meant to be
                                        boundary values that when crossed indicate that the system is in an undesirable
                                        state. For example, when a tablespace becomes 97% full this can be considered
                                        undesirable and have Oracle generate a critical alert.
                                        Other alerts correspond to database events such as Snapshot Too Old or Resumable
                                        Session suspended. These types of alerts indicate that the event has occurred.
                                        In addition to notification, you can set alerts to perform some action such as
                                        running a script. Scripts that shrink tablespace objects can be useful for a
                                        Tablespace Usage warning alert.
                                        By default, Oracle enables the following alerts: Table Space Usage (warning at
                                        85% full, critical at 97% full), Snapshot Too Old, Recovery Area Low on Free
                                        Space, and Resumable Session Suspended. You can modify these alerts or enable
                                        others by setting their metrics.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- def area end -->

                    

<?php include_once('includes/tail.php'); ?>
