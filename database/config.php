<?php

// login 
if (isset($_POST["dbalogin"])) {
    try {
            $conn = oci_connect($_POST["username"], $_POST["password"], "localhost/". $_POST["sid"]);
            if (!$conn) {
                $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
                </button>
                <strong>Error !</strong> Invalid Credentials.
                </div>';
                setcookie('error', $error, time() + 15 );
                header("Location:./login.php");
            } else {
                setcookie('loggedIn', true, time() + 7200 );
                setcookie('admin', $_POST["username"], time() + 7200 );
                setcookie('password', $_POST["password"], time() + 7200 );
                setcookie('sid', $_POST["sid"], time() + 7200 );
                oci_close($conn);
                header("Location:./index.php");
            }
    } catch (Exception $e) {
        exit(header("Location:./error.php"));
    }
}

//logout
if (isset($_POST["logout"])) {
    setcookie('loggedIn', false, time() + 7200 );
    exit(header("Location:./login.php"));
}

function getStatistics()
{
    try {
        $conn = oci_connect($_COOKIE["admin"], $_COOKIE["password"], "localhost/". $_COOKIE["sid"]);
    } catch(Exception $e) {
        exit(header("Location:./error.php"));
    }

    $sql = "
    SELECT * from (
        SELECT
          to_char(sysmetric_history.sample_time,'hh24:mi') as " . '"TIME"' . ",
          sysmetric_history.sample_time,
          ROUND(NVL(cpu,0)*100,2) as ".'"cpu_usage"'.",
          ROUND(NVL(bcpu,0)*100,2) as ".'"bg_cpu_usage"'.",
          ROUND(NVL(DECODE(SIGN((cpu+bcpu)-cpu_ora_consumed), -1, 0, ((cpu+bcpu)-cpu_ora_consumed)),0)*100,2) AS cpu_ora_wait,
          ROUND(NVL(scheduler,0)*100,2) as scheduler,
          ROUND(NVL(uio,0)*100,2) as ".'"user_IO"'.",
          ROUND(NVL(sio,0)*100,2) as ".'"system_IO"'.",
          ROUND(NVL(concurrency,0)*100,2) as concurrency,
          ROUND(NVL(COMMIT,0)*100,2) as COMMIT,
          ROUND(NVL(configuration,0)*100,2) as configuration,
          ROUND(NVL(network,0)*100,2) as network,
          ROUND(NVL(queueing,0)*100,2) as queueing
        FROM
          (SELECT
             TRUNC(sample_time,'MI') AS sample_time,
             SUM(DECODE(session_state,'ON CPU',DECODE(session_type,'BACKGROUND',0,1),0))/60 AS cpu,
             SUM(DECODE(session_state,'ON CPU',DECODE(session_type,'BACKGROUND',1,0),0))/60 AS bcpu,
             SUM(DECODE(wait_class,'Scheduler',1,0))/60 AS scheduler,
             SUM(DECODE(wait_class,'User I/O',1,0))/60 AS uio,
             SUM(DECODE(wait_class,'System I/O',1,0))/60 AS sio,
             SUM(DECODE(wait_class,'Concurrency',1,0))/60 AS concurrency,
             SUM(DECODE(wait_class,'Commit',1,0))/60 AS COMMIT,
             SUM(DECODE(wait_class,'Configuration',1,0))/60 AS configuration,
             SUM(DECODE(wait_class,'Network',1,0))/60 AS network,
             SUM(DECODE(wait_class,'Queueing',1,0))/60 AS queueing
           FROM ".'v$active_session_history'."
           WHERE sample_time>sysdate- INTERVAL '12' HOUR
           AND sample_time<=TRUNC(SYSDATE,'MI')
           GROUP BY TRUNC(sample_time,'MI')) ash,
          (SELECT
             TRUNC(begin_time,'MI') AS sample_time,
             VALUE/100 AS cpu_ora_consumed
           FROM ".'v$sysmetric_history'."
           WHERE GROUP_ID=2
           AND metric_name='CPU Usage Per Sec') sysmetric_history
        WHERE ash.sample_time (+)=sysmetric_history.sample_time
        ORDER BY sample_time DESC
        ) 
        where rownum <= 30
    ";

    $stid = oci_parse($conn, $sql);

    oci_execute($stid);

    $result = [];

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) { array_push($result,$row); }
    oci_free_statement($stid);
    oci_close($conn);
    return json_encode(array_reverse($result));
}

// Ajax call to get statistics
if (isset($_POST['call'])) {
    echo getStatistics();
}   

function getAshEvents()
{
    try {
        $conn = oci_connect($_COOKIE["admin"], $_COOKIE["password"], "localhost/". $_COOKIE["sid"]);
    } catch(Exception $e) {
        exit(header("Location:./error.php"));
    }

    $sql = 'SELECT session_id, event,
    SUM(wait_time + time_waited) total_wait_time
    FROM v$active_session_history
    WHERE event is not null
    AND sample_time BETWEEN SYSDATE - 180 / 1440 AND SYSDATE
    GROUP BY session_id, event
    ORDER BY 2';

    $stid = oci_parse($conn, $sql);

    oci_execute($stid);

    $result = [];

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) { array_push($result,$row); }
    oci_free_statement($stid);
    oci_close($conn);
    return $result;
}

function getAddmTasks()
{
    try {
        $conn = oci_connect($_COOKIE["admin"], $_COOKIE["password"], "localhost/". $_COOKIE["sid"]);
    } catch(Exception $e) {
        exit(header("Location:./error.php"));
    }

    $sql = 'SELECT * from DBA_ADVISOR_TASKS';

    $stid = oci_parse($conn, $sql);

    oci_execute($stid);

    $result = [];

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) { array_push($result,$row); }
    oci_free_statement($stid);
    oci_close($conn);
    return $result;
}

function getAddmFindings()
{
    try {
        $conn = oci_connect($_COOKIE["admin"], $_COOKIE["password"], "localhost/". $_COOKIE["sid"]);
    } catch(Exception $e) {
        exit(header("Location:./error.php"));
    }

    $sql = 'SELECT * from DBA_ADVISOR_FINDINGS';

    $stid = oci_parse($conn, $sql);

    oci_execute($stid);

    $result = [];

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) { array_push($result,$row); }
    oci_free_statement($stid);
    oci_close($conn);
    return $result;
}

function getHighloadSQL()
{
    try {
        $conn = oci_connect($_COOKIE["admin"], $_COOKIE["password"], "localhost/". $_COOKIE["sid"]);
    } catch(Exception $e) {
        exit(header("Location:./error.php"));
    }

    $sql = ' select 
        hash_value,
        disk_reads,
        executions,
        first_load_time,
        persistent_mem,
        runtime_mem,
        cpu_time,
        elapsed_time,
        sql_text
    from
    (select sql_text ,
        b.username ,
    round((a.disk_reads/decode(a.executions,0,1,
    a.executions)),2)
        disk_reads_per_exec,
        a.disk_reads ,
        a.buffer_gets ,
        a.parse_calls ,
        a.sorts ,
        a.executions ,
        a.rows_processed ,
        100 - round(100 *
        a.disk_reads/greatest(a.buffer_gets,1),2) hit_ratio,
        a.first_load_time ,
        sharable_mem ,
        persistent_mem ,
        runtime_mem,
        cpu_time,
        elapsed_time,
        address,
        hash_value
    from
    sys.v_$sqlarea a,
    sys.all_users b
    where
    a.parsing_user_id=b.user_id 
    order by elapsed_time desc)
    where rownum < 101';

    $stid = oci_parse($conn, $sql);

    oci_execute($stid);

    $result = [];

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) { array_push($result,$row); }
    oci_free_statement($stid);
    oci_close($conn);
    return $result;
}
