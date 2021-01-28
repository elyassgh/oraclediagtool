<?php include_once('./database/config.php');
if (!$_COOKIE["loggedIn"]) {
    header('Location: ./login.php');
}
include_once('includes/head.php');
?>

<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Credits</h4>
                                <div id="accordion2" class="according accordion-s2">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#accordion21">Binôme </a>
                                        </div>
                                        <div id="accordion21" class="collapse show" data-parent="#accordion2">
                                            <div class="card-body">
                                                Elghazi Ilyass & Zakaria Maskan - IRISI 2
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse"
                                                href="#accordion23">About this tool</a>
                                        </div>
                                        <div id="accordion23" class="collapse" data-parent="#accordion2">
                                            <div class="card-body">
                                                This tool is a End-Module Project of Oracle Database Administration.
                                                <br>
                                                Ingéniere en réseaux et systémes d'information <br>
                                                Faculté des Sciences et Techniques Marrakech <br>
                                                Université Cadi Ayyad <br>
                                                2020/2021
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<?php include_once('includes/tail.php'); ?>