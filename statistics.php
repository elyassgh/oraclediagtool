<?php include_once('./database/config.php');
if (!$_COOKIE["loggedIn"]) {
    header('Location: ./login.php');
}
include_once('includes/head.php');
?>

                    <!-- Statistics area start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Instance Statistics</h4>
                                <p class="title"> Avrege Active Session last 30 Minutes, <small>All measures in &micro;Sec.</small></p>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Statistics area end -->

                    <!-- Advertising area start 
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Total Active Session Time</h4>
                                <small>All measures in &micro;Sec</small>
                                <canvas id="seolinechart8" height="233"></canvas>
                            </div>
                        </div>
                    </div>
                    -->

                    <!-- def area start -->
                        <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body bg1">
                                <h4 class="header-title text-white">Definitions :</h4>
                                <div class="tutu-content">
                                    <h4 class="title text-white">ADDM & AWR Statistics</h4>
                                    <p class="text-white">
                                    The ADDM analysis is performed from the top down, first identifying symptoms and then refining the analysis
                                    to reach the root causes of performance problems. ADDM uses the DB time statistic to identify performance
                                    problems. DB time is the cumulative time spent by the database in processing user requests, including both
                                    wait time and CPU time of all user sessions that are not idle.
                                    The goal of tuning the performance of a database is to reduce the DB time of the system for a given
                                    workload. By reducing DB time, the database is able to support more user requests using the same resources.
                                    System resources that are using a significant portion of DB time are reported as problem areas by ADDM,
                                    and they are sorted in descending order by the amount of related DB time spent. For more information about
                                    the DB time statistic, see "Time Model Statistics".
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- def area end -->
                    
<?php include_once('includes/tail.php'); ?>