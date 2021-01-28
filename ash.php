<?php include_once('./database/config.php');
if (!$_COOKIE["loggedIn"]) {
    header('Location: ./login.php');
}
$data = getAshEvents();
$data2 = getHighloadSQL();
include_once('includes/head.php');
?>

                    <!--Table start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Witing Events in Active Session History</h4>
                                <small>Activties last 3 Hours.</small>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                        
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Session ID</th>
                                                    <th scope="col">Event</th>
                                                    <th scope="col">Total Waiting Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php foreach ($data as $row) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row['SESSION_ID'] ?></th>
                                                    <td><?php echo $row['EVENT'] ?></td>
                                                    <td><?php echo $row['TOTAL_WAIT_TIME'] ?> <span>&micro;Sec</span></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table end -->

                    <!--Table start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">High Load SQL Queries</h4>
                                <small>All Time variables are measured in &micro;Sec.</small>
                                <br>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                    <th scope="col">Hash Value</th>
                                                    <th scope="col">Executions</th>
                                                    <th scope="col">Elapsed Time</th>
                                                    <th scope="col">CPU Time</th>
                                                    <th scope="col">First Load Time</th>
                                                    <th scope="col">Disk Reads</th>
                                                    <th scope="col">Persistent Mem.</th>
                                                    <th scope="col">Run Time Mem.</th>
                                                    <th scope="col">SQL Text</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data2 as $row) {?>
                                                <tr>
                                                    <td><?php echo $row['HASH_VALUE']; ?></td>
                                                    <td><?php echo $row['EXECUTIONS']; ?></td>
                                                    <td><?php echo $row['ELAPSED_TIME']; ?></td>
                                                    <td><?php echo $row['CPU_TIME']; ?></td>
                                                    <td><?php echo $row['FIRST_LOAD_TIME']; ?></td>
                                                    <td><?php echo $row['DISK_READS']; ?></td>
                                                    <td><?php echo $row['PERSISTENT_MEM']; ?></td>
                                                    <td><?php echo $row['RUNTIME_MEM']; ?></td>
                                                    <td><?php echo $row['SQL_TEXT']; ?></td>

                                                </tr>
                                            <?php } ?>                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- def area start -->
                     <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body bg1">
                                <h4 class="header-title text-white">Definitions :</h4>
                                <div class="tutu-content">
                                    <h4 class="title text-white">ASH</h4>
                                    <p class="text-white">
                                    ASH or The V$ACTIVE_SESSION_HISTORY view provides sampled session activity in the instance. Active sessions are sampled every second and are stored in a circular buffer in SGA. Any session that is connected to the database and is waiting for an event that does not belong to the Idle wait class is considered as an active session. This includes any session that was on the CPU at the time of sampling.
                                    Each session sample is a set of rows and the V$ACTIVE_SESSION_HISTORY view returns one row for each active session per sample, returning the latest session sample rows first. Because the active session samples are stored in a circular buffer in SGA, the greater the system activity, the smaller the number of seconds of session activity that can be stored in the circular buffer. This means that the duration for which a session sample appears in the V$ view, or the number of seconds of session activity that is displayed in the V$ view, is completely dependent on the database activity.
                                    As part of the AWR snapshots, the content of V$ACTIVE_SESSION_HISTORY is also flushed to disk. Because the content of this V$ view can get quite large during heavy system activity, only a portion of the session samples is written to disk.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- def area end -->


<?php include_once('includes/tail.php'); ?>