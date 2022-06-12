<?php require_once("database.php");
session_start();
if (isset($_POST['usersearch'])) { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Результаты поиска</title>
        <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php if (isset($_SESSION['user']) && $_SESSION['user_group'] == "employer") {
            include 'employer_header.php';
        } else {
            include 'header.php';
        } ?>
        <section class="content">
            <div class="container">
                <?php
                $_monthsList = array(
                    1 => "января",
                    2 => "февраля",
                    3 => "марта",
                    4 => "апреля",
                    5 => "мая",
                    6 => "июня",
                    7 => "июля",
                    8 => "августа",
                    9 => "сентября",
                    10 => "октября",
                    11 => "ноября",
                    12 => "декабря"
                );

                $user_search = $_POST['usersearch'];
                $where_list = array();
                $query_usersearch = "SELECT * FROM vacancies";
                $clean_search = str_replace(',', ' ', $user_search);
                $search_words = explode(' ', $user_search);
                $final_search_words = array();

                if (count($search_words) > 0) {
                    foreach ($search_words as $word) {
                        if (!empty($word)) {
                            $final_search_words[] = $word;
                        }
                    }
                }

                foreach ($final_search_words as $word) {
                    $where_list[] = " name LIKE '%$word%'";
                }

                $where_clause = implode(' OR ', $where_list);

                if (!empty($where_clause)) {
                    $query_usersearch .= " WHERE $where_clause";
                }

                $res_query = mysqli_query($conn, $query_usersearch);

                while ($res_array = mysqli_fetch_array($res_query)) {
                ?>
                    <div class="card w-100 mb-2">
                        <div class="card-body">
                            <h5 class="card-title"><a href="vacancy.php?vacancy=<?php echo $res_array['id']; ?>"><?php echo $res_array['name']; ?></a></h5>
                            <p class="card-text text-primary"><?php echo $res_array["salary"] . ' ' . $res_array["currency"]; ?></p>
                            <p class="card-text"><?php echo $res_array["description"]; ?></p>
                            <p class="card-text">Сфера деятельности: <span class="text-muted"><?php echo $res_array["category"]; ?></span></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <?php include 'footer.html'; ?>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: index.php");
}
?>