<?php
session_start();
?>
<?php
include('database.php');
if (isset($_SESSION['id']) && $_SESSION['user_group'] == "employer") {
    $emp_id = $_SESSION['id'];
    $sql = "SELECT v.name as vacancy_name, users.name as username, users.surname as usersurname, MONTH(fb.feedback_time) as month, DAYOFMONTH(fb.feedback_time) as day, TIME_FORMAT(fb.feedback_time, '%k:%i') as time, fb.check_status, fb.id as fb_id FROM feedback fb LEFT JOIN vacancies v ON v.id = fb.vacancy_id LEFT JOIN users ON users.id = fb.user_id WHERE v.employer_id = '$emp_id' ORDER BY fb.id DESC";
    $result = mysqli_query($conn, $sql);
    $_monthsList = array(
        1 => "янв.",
        2 => "фев.",
        3 => "мар.",
        4 => "апр.",
        5 => "мая",
        6 => "июн.",
        7 => "июл.",
        8 => "авг.",
        9 => "сен.",
        10 => "окт.",
        11 => "ноя.",
        12 => "дек."
    );



?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Главная</title>
        <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php include 'header.php'; ?>
        <section class="content content_scroll">
            <div class="container" id="target-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <!-- row -->

                                        <tr>
                                            <!-- label -->
                                            <!-- star -->
                                            <td><i class="fa fa-star text-warning"></i></td>
                                            <td>
                                                <a href="feedback.php?feedback=<?php echo $row['fb_id'] ?>" class="link">
                                                    <span class="mb-0 <?php if ($row['check_status'] == 0) {
                                                                            echo "fw-bold text-dark";
                                                                        } else {
                                                                            echo "text-dark";
                                                                        } ?>"><?php echo $row['username'] . " " . $row['usersurname'] ?></span>
                                                    <span class="d-block d-sm-none <?php if ($row['check_status'] == 0) {
                                                                                        echo "fw-bold text-dark";
                                                                                    } else {
                                                                                        echo "text-dark";
                                                                                    } ?>"><?php echo $row['vacancy_name'] ?></span>
                                                </a>
                                            </td>
                                            <!-- Message -->
                                            <td>
                                                    <span class="d-none d-sm-block <?php if ($row['check_status'] == 0) {
                                                                                        echo "fw-bold";
                                                                                    } else {
                                                                                        echo "text-dark";
                                                                                    } ?>"><?php echo $row['vacancy_name'] ?></span>
                                            </td>
                                            <!-- Attachment -->
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <!-- Time -->
                                            <td class="<?php if ($row['check_status'] == 0) {
                                                            echo "fw-bold";
                                                        } else {
                                                            echo "text-dark";
                                                        } ?>"><?php echo $row['day'] . ' ' . $_monthsList[$row['month']] . ' в ' . $row['time']; ?></td>

                                        </tr>

                                        <!-- row -->
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.html'; ?>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/sendFeedBackAjax.js"></script>
    </body>

    </html>
<?php } else {
    header("location: index.php");
} ?>