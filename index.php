<?php
session_start();
?>
<?php
include('database.php');
$limit = 20;
$query = "SELECT COUNT(*) FROM vacancies";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$total_rows = $row[0];
$total_pages = ceil($total_rows / $limit);
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
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
  </svg>
  <?php include 'header.php'; ?>

  <div class="container">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Должность, профессия" aria-label="Recipient's username" aria-describedby="button-addon2">
      <button class="btn btn-outline-primary" type="button" id="button-addon2">Поиск</button>
    </div>
    <div class="row">
      <div class="<?php if (isset($_SESSION['user']) && $_SESSION['user_group'] == "student") {
                    echo 'col-sm-12 col-md-7 col-lg-7 col-xl-7 mb-2';
                  } else {
                    echo 'col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2';
                  } ?>">
        <div class=" p-5 text-dark bg-style rounded-3">
          <h2>1st Work</h2>
          <p>Ваш первый опыт работы!</p>
        </div>
      </div>
      <?php if (isset($_SESSION['user']) && $_SESSION['user_group'] == "student") {
        echo
        '<div class="col-sm-12  col-md-5 col-lg-5 col-xl-5">
        <div class="p-4 text-white bg-light rounded-3 border">
          <table class="table">
            <tbody>
              <tr>
                <td class="border-0">
                  <h5>События</h5>
                </td>
              </tr>
              <tr>
                <td class="border-0">Просмотры резюме</td>
                <td class="border-0">1</td>
              </tr>
              <tr>
                <td class="border-0">Отклики и приглашения</td>
                <td class="border-0">1</td>
              </tr>
              <tr>
                <td class="border-0">Избранные стажировки</td>
                <td class="border-0">1</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>';
      } ?>

    </div>
  </div>

  <section class="mt-3">
    <?php
    $sys_adm_query = "SELECT COUNT(category) as sys_adm FROM vacancies WHERE category = 'Системное администрирование'";
    $sites_query = "SELECT COUNT(category) as sites FROM vacancies WHERE category = 'Разработка сайтов'";
    $networks_query = "SELECT COUNT(category) as networks FROM vacancies WHERE category = 'Сетевое администрирование'";
    $ios_query = "SELECT COUNT(category) as ios FROM vacancies WHERE category = 'Разработка iOS приложений'";
    $androids_query = "SELECT COUNT(category) as androids FROM vacancies WHERE category = 'Разработка Android приложений'";
    $others_query = "SELECT COUNT(category) as others FROM vacancies WHERE category = 'Другое'";

    $sys_adm_result = mysqli_query($conn, $sys_adm_query);
    $sites_result = mysqli_query($conn, $sites_query);
    $networks_result = mysqli_query($conn, $networks_query);
    $ios_result = mysqli_query($conn, $ios_query);
    $androids_result = mysqli_query($conn, $androids_query);
    $others_result = mysqli_query($conn, $others_query);

    $sys_adm_row = mysqli_fetch_array($sys_adm_result);
    $sites_row = mysqli_fetch_array($sites_result);
    $networks_row = mysqli_fetch_array($networks_result);
    $ios_row = mysqli_fetch_array($ios_result);
    $androids_row = mysqli_fetch_array($androids_result);
    $others_row = mysqli_fetch_array($others_result);

    $sys_adm = $sys_adm_row['sys_adm'];
    $sites = $sites_row['sites'];
    $networks = $networks_row['networks'];
    $ios = $ios_row['ios'];
    $androids = $androids_row['androids'];
    $others = $others_row['others'];

    $sphere_array = array($sys_adm, $sites, $networks, $ios, $androids, $others);

    foreach ($sphere_array as $key => $value) {
      if (empty($value)) {
        $value = 0;
      }
    }
    ?>
    <div class="container">
      <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Системное администрирование</h5>
              <p class="card-text">
                <?php
                echo $sphere_array[0];
                if (
                  $sphere_array[0] % 10 == 0 ||
                  $sphere_array[0] % 10 == 5 ||
                  $sphere_array[0] % 10 == 6 ||
                  $sphere_array[0] % 10 == 7 ||
                  $sphere_array[0] % 10 == 8 ||
                  $sphere_array[0] % 10 == 9 ||
                  $sphere_array[0] % 100 == 11 ||
                  $sphere_array[0] % 100 == 12 ||
                  $sphere_array[0] % 100 == 13 ||
                  $sphere_array[0] % 100 == 14 ||
                  $sphere_array[0] % 100 == 15 ||
                  $sphere_array[0] % 100 == 16 ||
                  $sphere_array[0] % 100 == 17 ||
                  $sphere_array[0] % 100 == 18 ||
                  $sphere_array[0] % 100 == 19
                ) {
                  echo " стажировок";
                } elseif ($sphere_array[0] % 10 == 1) {
                  echo " стажировка";
                } elseif ($sphere_array[0] % 10 == 2 || $sphere_array[0] % 10 == 3 || $sphere_array[0] % 10 == 4) {
                  echo " стажировки";
                } ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Разработка сайтов</h5>
              <p class="card-text">
                <?php
                echo $sphere_array[1];
                if (
                  $sphere_array[1] % 10 == 0 ||
                  $sphere_array[1] % 10 == 5 ||
                  $sphere_array[1] % 10 == 6 ||
                  $sphere_array[1] % 10 == 7 ||
                  $sphere_array[1] % 10 == 8 ||
                  $sphere_array[1] % 10 == 9 ||
                  $sphere_array[1] % 100 == 11 ||
                  $sphere_array[1] % 100 == 12 ||
                  $sphere_array[1] % 100 == 13 ||
                  $sphere_array[1] % 100 == 14 ||
                  $sphere_array[1] % 100 == 15 ||
                  $sphere_array[1] % 100 == 16 ||
                  $sphere_array[1] % 100 == 17 ||
                  $sphere_array[1] % 100 == 18 ||
                  $sphere_array[1] % 100 == 19
                ) {
                  echo " стажировок";
                } elseif ($sphere_array[1] % 10 == 1) {
                  echo " стажировка";
                } elseif ($sphere_array[1] % 10 == 2 || $sphere_array[1] % 10 == 3 || $sphere_array[1] % 10 == 4) {
                  echo " стажировки";
                } ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Сетевое администрирование</h5>
              <p class="card-text">
                <?php
                echo $sphere_array[2];
                if (
                  $sphere_array[2] % 10 == 0 ||
                  $sphere_array[2] % 10 == 5 ||
                  $sphere_array[2] % 10 == 6 ||
                  $sphere_array[2] % 10 == 7 ||
                  $sphere_array[2] % 10 == 8 ||
                  $sphere_array[2] % 10 == 9 ||
                  $sphere_array[2] % 100 == 11 ||
                  $sphere_array[2] % 100 == 12 ||
                  $sphere_array[2] % 100 == 13 ||
                  $sphere_array[2] % 100 == 14 ||
                  $sphere_array[2] % 100 == 15 ||
                  $sphere_array[2] % 100 == 16 ||
                  $sphere_array[2] % 100 == 17 ||
                  $sphere_array[2] % 100 == 18 ||
                  $sphere_array[2] % 100 == 19
                ) {
                  echo " стажировок";
                } elseif ($sphere_array[2] % 10 == 1) {
                  echo " стажировка";
                } elseif ($sphere_array[2] % 10 == 2 || $sphere_array[2] % 10 == 3 || $sphere_array[2] % 10 == 4) {
                  echo " стажировки";
                } ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Разработка iOS приложений</h5>
              <p class="card-text">
                <?php
                echo $sphere_array[3];
                if (
                  $sphere_array[3] % 10 == 0 ||
                  $sphere_array[3] % 10 == 5 ||
                  $sphere_array[3] % 10 == 6 ||
                  $sphere_array[3] % 10 == 7 ||
                  $sphere_array[3] % 10 == 8 ||
                  $sphere_array[3] % 10 == 9 ||
                  $sphere_array[3] % 100 == 11 ||
                  $sphere_array[3] % 100 == 12 ||
                  $sphere_array[3] % 100 == 13 ||
                  $sphere_array[3] % 100 == 14 ||
                  $sphere_array[3] % 100 == 15 ||
                  $sphere_array[3] % 100 == 16 ||
                  $sphere_array[3] % 100 == 17 ||
                  $sphere_array[3] % 100 == 18 ||
                  $sphere_array[3] % 100 == 19
                ) {
                  echo " стажировок";
                } elseif ($sphere_array[3] % 10 == 1) {
                  echo " стажировка";
                } elseif ($sphere_array[3] % 10 == 2 || $sphere_array[3] % 10 == 3 || $sphere_array[3] % 10 == 4) {
                  echo " стажировки";
                } ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Разработка Android приложений</h5>
              <p class="card-text">
                <?php
                echo $sphere_array[4];
                if (
                  $sphere_array[4] % 10 == 0 ||
                  $sphere_array[4] % 10 == 5 ||
                  $sphere_array[4] % 10 == 6 ||
                  $sphere_array[4] % 10 == 7 ||
                  $sphere_array[4] % 10 == 8 ||
                  $sphere_array[4] % 10 == 9 ||
                  $sphere_array[4] % 100 == 11 ||
                  $sphere_array[4] % 100 == 12 ||
                  $sphere_array[4] % 100 == 13 ||
                  $sphere_array[4] % 100 == 14 ||
                  $sphere_array[4] % 100 == 15 ||
                  $sphere_array[4] % 100 == 16 ||
                  $sphere_array[4] % 100 == 17 ||
                  $sphere_array[4] % 100 == 18 ||
                  $sphere_array[4] % 100 == 19
                ) {
                  echo " стажировок";
                } elseif ($sphere_array[4] % 10 == 1) {
                  echo " стажировка";
                } elseif ($sphere_array[4] % 10 == 2 || $sphere_array[4] % 10 == 3 || $sphere_array[4] % 10 == 4) {
                  echo " стажировки";
                } ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Другое</h5>
              <p class="card-text">
                <?php
                echo $sphere_array[5];
                if (
                  $sphere_array[5] % 10 == 0 ||
                  $sphere_array[5] % 10 == 5 ||
                  $sphere_array[5] % 10 == 6 ||
                  $sphere_array[5] % 10 == 7 ||
                  $sphere_array[5] % 10 == 8 ||
                  $sphere_array[5] % 10 == 9 ||
                  $sphere_array[5] % 100 == 11 ||
                  $sphere_array[5] % 100 == 12 ||
                  $sphere_array[5] % 100 == 13 ||
                  $sphere_array[5] % 100 == 14 ||
                  $sphere_array[5] % 100 == 15 ||
                  $sphere_array[5] % 100 == 16 ||
                  $sphere_array[5] % 100 == 17 ||
                  $sphere_array[5] % 100 == 18 ||
                  $sphere_array[5] % 100 == 19
                ) {
                  echo " стажировок";
                } elseif ($sphere_array[5] % 10 == 1) {
                  echo " стажировка";
                } elseif ($sphere_array[5] % 10 == 2 || $sphere_array[5] % 10 == 3 || $sphere_array[5] % 10 == 4) {
                  echo " стажировки";
                } ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
  <a class="btn btn-primary feedback-btn">Статическая</a>
  <a class="btn btn-primary feedback-btn">Статическая</a>
  <a class="btn btn-primary feedback-btn">Статическая</a>
  <a class="btn btn-primary feedback-btn">Статическая</a>
  </div>
  <section class="mt-3 content">
    <div class="container">
      <h2>Стажировки</h2>
    </div>
    <div class="container box" id="target-content">
      <div class="d-flex justify-content-center">
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
          <span class="visually-hidden">Загрузка...</span>
        </div>
      </div>
    </div>

    <nav class="mt-4" aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php
        if (!empty($total_pages)) {
          for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == 1) {
        ?>
              <li class="page-item active" id="<?php echo $i; ?>"><a href="#target" data-id="<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            <?php
            } else {
            ?>
              <li class="page-item" id="<?php echo $i; ?>"><a href="#target" class="page-link" data-id="<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
            }
          }
        }
        ?>
      </ul>
    </nav>
  </section>

  <?php include 'footer.html'; ?>

  <!-- Modal -->
  <div class="modal fade " id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
      <div class="modal-content">
        <div class="modal-header">
          <a class="d-block d-sm-none" href="index.html">
            <svg width="40" viewBox="0 0 79 59" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M37.0959 22C36.8759 22 36.6859 21.92 36.5259 21.76C36.3659 21.6 36.2859 21.41 36.2859 21.19V9.07L32.9259 11.65C32.7259 11.79 32.5259 11.84 32.3259 11.8C32.1259 11.74 31.9459 11.61 31.7859 11.41L29.1459 7.99C29.0459 7.79 29.0159 7.58 29.0559 7.36C29.0959 7.12 29.2159 6.94 29.4159 6.82L36.6459 1.21C36.7459 1.13 36.8459 1.08 36.9459 1.06C37.0459 1.02 37.1659 0.999999 37.3059 0.999999H42.9759C43.1959 0.999999 43.3859 1.08 43.5459 1.24C43.7059 1.4 43.7859 1.59 43.7859 1.81V21.19C43.7859 21.41 43.7059 21.6 43.5459 21.76C43.3859 21.92 43.1959 22 42.9759 22H37.0959ZM54.1251 22.3C52.6851 22.3 51.4551 22.16 50.4351 21.88C49.4351 21.58 48.6151 21.21 47.9751 20.77C47.3551 20.31 46.8951 19.84 46.5951 19.36C46.2951 18.86 46.1351 18.41 46.1151 18.01C46.0951 17.79 46.1551 17.6 46.2951 17.44C46.4551 17.28 46.6351 17.2 46.8351 17.2H52.0551C52.0751 17.2 52.0951 17.2 52.1151 17.2C52.1351 17.2 52.1551 17.2 52.1751 17.2C52.4351 17.22 52.6651 17.31 52.8651 17.47C53.0851 17.61 53.3051 17.75 53.5251 17.89C53.7651 18.03 54.0351 18.1 54.3351 18.1C54.4951 18.1 54.6451 18.06 54.7851 17.98C54.9451 17.9 55.0251 17.79 55.0251 17.65C55.0251 17.47 54.9651 17.31 54.8451 17.17C54.7451 17.03 54.4751 16.89 54.0351 16.75C53.6151 16.59 52.9051 16.42 51.9051 16.24C50.9851 16.06 50.1051 15.78 49.2651 15.4C48.4251 15.02 47.7351 14.49 47.1951 13.81C46.6751 13.13 46.4151 12.27 46.4151 11.23C46.4151 10.37 46.7051 9.55 47.2851 8.77C47.8651 7.99 48.7151 7.35 49.8351 6.85C50.9751 6.35 52.3651 6.1 54.0051 6.1C55.2451 6.1 56.3451 6.24 57.3051 6.52C58.2651 6.8 59.0751 7.16 59.7351 7.6C60.4151 8.04 60.9351 8.51 61.2951 9.01C61.6551 9.51 61.8451 9.97 61.8651 10.39C61.8851 10.61 61.8251 10.8 61.6851 10.96C61.5451 11.12 61.3851 11.2 61.2051 11.2H56.4651C56.4251 11.2 56.3751 11.2 56.3151 11.2C56.2551 11.2 56.2051 11.2 56.1651 11.2C55.8851 11.2 55.6351 11.13 55.4151 10.99C55.1951 10.83 54.9751 10.68 54.7551 10.54C54.5351 10.38 54.2751 10.3 53.9751 10.3C53.8351 10.3 53.6951 10.35 53.5551 10.45C53.4351 10.53 53.3751 10.64 53.3751 10.78C53.3751 10.94 53.4351 11.1 53.5551 11.26C53.6751 11.4 53.9651 11.54 54.4251 11.68C54.8851 11.8 55.6351 11.94 56.6751 12.1C58.1151 12.3 59.2651 12.67 60.1251 13.21C60.9851 13.75 61.5951 14.37 61.9551 15.07C62.3351 15.77 62.5251 16.46 62.5251 17.14C62.5251 18.2 62.1951 19.12 61.5351 19.9C60.8951 20.68 59.9451 21.28 58.6851 21.7C57.4451 22.1 55.9251 22.3 54.1251 22.3ZM74.0432 22C72.6032 22 71.3132 21.81 70.1732 21.43C69.0532 21.03 68.1632 20.36 67.5032 19.42C66.8632 18.48 66.5432 17.19 66.5432 15.55V11.65H64.1732C63.9532 11.65 63.7632 11.57 63.6032 11.41C63.4432 11.25 63.3632 11.06 63.3632 10.84V7.21C63.3632 6.99 63.4432 6.8 63.6032 6.64C63.7632 6.48 63.9532 6.4 64.1732 6.4H66.5432V1.51C66.5432 1.29 66.6232 1.1 66.7832 0.939999C66.9432 0.779999 67.1332 0.699999 67.3532 0.699999H72.6032C72.8232 0.699999 73.0132 0.779999 73.1732 0.939999C73.3332 1.1 73.4132 1.29 73.4132 1.51V6.4H77.1932C77.4132 6.4 77.6032 6.48 77.7632 6.64C77.9232 6.8 78.0032 6.99 78.0032 7.21V10.84C78.0032 11.06 77.9232 11.25 77.7632 11.41C77.6032 11.57 77.4132 11.65 77.1932 11.65H73.4132V14.95C73.4132 15.41 73.5132 15.78 73.7132 16.06C73.9332 16.32 74.2632 16.45 74.7032 16.45H77.4332C77.6532 16.45 77.8432 16.53 78.0032 16.69C78.1632 16.85 78.2432 17.04 78.2432 17.26V21.19C78.2432 21.41 78.1632 21.6 78.0032 21.76C77.8432 21.92 77.6532 22 77.4332 22H74.0432ZM4.61195 58C4.21195 58 3.89195 57.88 3.65195 57.64C3.41195 57.38 3.27195 57.12 3.23195 56.86L0.471953 37.75C0.471953 37.73 0.471953 37.72 0.471953 37.72C0.471953 37.7 0.471953 37.68 0.471953 37.66C0.471953 37.48 0.531953 37.33 0.651953 37.21C0.791953 37.07 0.951953 37 1.13195 37H6.71195C7.37195 37 7.73195 37.27 7.79195 37.81L8.81195 46.27L10.042 42.52C10.082 42.38 10.172 42.2 10.312 41.98C10.452 41.76 10.702 41.65 11.062 41.65H14.122C14.482 41.65 14.732 41.76 14.872 41.98C15.012 42.2 15.102 42.38 15.142 42.52L16.372 46.24L17.392 37.81C17.452 37.27 17.812 37 18.472 37H24.052C24.232 37 24.382 37.07 24.502 37.21C24.642 37.33 24.712 37.48 24.712 37.66C24.712 37.68 24.712 37.7 24.712 37.72C24.712 37.72 24.712 37.73 24.712 37.75L21.952 56.86C21.932 57.12 21.792 57.38 21.532 57.64C21.292 57.88 20.972 58 20.572 58H16.282C15.882 58 15.582 57.9 15.382 57.7C15.202 57.48 15.092 57.31 15.052 57.19L12.592 51.04L10.132 57.19C10.092 57.31 9.97195 57.48 9.77195 57.7C9.59195 57.9 9.30195 58 8.90195 58H4.61195ZM34.5773 58.3C32.7373 58.3 31.1873 58.05 29.9273 57.55C28.6673 57.05 27.6973 56.3 27.0173 55.3C26.3573 54.3 25.9773 53.07 25.8773 51.61C25.8573 51.15 25.8473 50.68 25.8473 50.2C25.8473 49.7 25.8573 49.23 25.8773 48.79C25.9773 47.31 26.3873 46.08 27.1073 45.1C27.8273 44.1 28.8173 43.35 30.0773 42.85C31.3373 42.35 32.8373 42.1 34.5773 42.1C36.3173 42.1 37.8173 42.35 39.0773 42.85C40.3373 43.35 41.3273 44.1 42.0473 45.1C42.7673 46.08 43.1773 47.31 43.2773 48.79C43.3173 49.23 43.3373 49.7 43.3373 50.2C43.3373 50.68 43.3173 51.15 43.2773 51.61C43.1773 53.07 42.7873 54.3 42.1073 55.3C41.4473 56.3 40.4873 57.05 39.2273 57.55C37.9673 58.05 36.4173 58.3 34.5773 58.3ZM34.5773 53.5C35.1573 53.5 35.5173 53.34 35.6573 53.02C35.7973 52.68 35.8873 52.16 35.9273 51.46C35.9473 51.16 35.9573 50.74 35.9573 50.2C35.9573 49.66 35.9473 49.24 35.9273 48.94C35.8873 48.28 35.7973 47.78 35.6573 47.44C35.5173 47.08 35.1573 46.9 34.5773 46.9C34.0173 46.9 33.6573 47.08 33.4973 47.44C33.3573 47.78 33.2673 48.28 33.2273 48.94C33.2073 49.24 33.1973 49.66 33.1973 50.2C33.1973 50.74 33.2073 51.16 33.2273 51.46C33.2673 52.16 33.3573 52.68 33.4973 53.02C33.6573 53.34 34.0173 53.5 34.5773 53.5ZM46.3553 58C46.1353 58 45.9453 57.92 45.7853 57.76C45.6253 57.6 45.5453 57.41 45.5453 57.19V43.21C45.5453 42.99 45.6253 42.8 45.7853 42.64C45.9453 42.48 46.1353 42.4 46.3553 42.4H51.6053C51.8253 42.4 52.0153 42.48 52.1753 42.64C52.3353 42.8 52.4153 42.99 52.4153 43.21V44.26C53.0553 43.7 53.7653 43.25 54.5453 42.91C55.3453 42.57 56.1953 42.4 57.0953 42.4H58.5353C58.7553 42.4 58.9453 42.48 59.1053 42.64C59.2653 42.8 59.3453 42.99 59.3453 43.21V47.89C59.3453 48.11 59.2653 48.3 59.1053 48.46C58.9453 48.62 58.7553 48.7 58.5353 48.7H54.6653C54.0653 48.7 53.6153 48.85 53.3153 49.15C53.0153 49.45 52.8653 49.9 52.8653 50.5V57.19C52.8653 57.41 52.7853 57.6 52.6253 57.76C52.4653 57.92 52.2753 58 52.0553 58H46.3553ZM61.8827 58C61.6627 58 61.4727 57.92 61.3127 57.76C61.1527 57.6 61.0727 57.41 61.0727 57.19V37.51C61.0727 37.29 61.1527 37.1 61.3127 36.94C61.4727 36.78 61.6627 36.7 61.8827 36.7H67.1327C67.3527 36.7 67.5427 36.78 67.7027 36.94C67.8627 37.1 67.9427 37.29 67.9427 37.51V47.23L70.5827 42.91C70.6227 42.83 70.7127 42.73 70.8527 42.61C70.9927 42.47 71.1927 42.4 71.4527 42.4H77.5127C77.7127 42.4 77.8827 42.47 78.0227 42.61C78.1627 42.75 78.2327 42.92 78.2327 43.12C78.2327 43.2 78.2127 43.29 78.1727 43.39C78.1527 43.47 78.1227 43.53 78.0827 43.57L73.9727 49.42L78.8327 56.89C78.9127 57.01 78.9527 57.14 78.9527 57.28C78.9527 57.48 78.8827 57.65 78.7427 57.79C78.6027 57.93 78.4327 58 78.2327 58H71.9327C71.6327 58 71.4127 57.93 71.2727 57.79C71.1327 57.63 71.0427 57.53 71.0027 57.49L67.9427 52.39V57.19C67.9427 57.41 67.8627 57.6 67.7027 57.76C67.5427 57.92 67.3527 58 67.1327 58H61.8827Z" fill="#040000" />
            </svg>
          </a>
          <h5 class="modal-title ml-2 d-none d-sm-block" id="exampleModalLabel">Войти</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5 class="modal-title ml-2 d-block d-sm-none" id="exampleModalLabel">Войти</h5>
          <div class="mt-4 form">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Ваш E-mail</label>
              <input type="email" name="email" class="form-control" id="loginEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Ваш пароль</label>
              <input type="password" name="password" class="form-control password" id="loginPassword">
            </div>
            <div class="mb-1 form-check">
              <input type="checkbox" class="form-check-input password-checkbox" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Показать пароль</label>
            </div>
            <div class="mb-2">
              <a href="employer_login.php">Вход для работодателей</a>
            </div>
            <button type="submit" id="loginBtn" class="btn btn-primary">Войти</button>
            <div class="login_success">
              <div class="mt-3 alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                  <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                  Вы успешно авторизованы!
                </div>
              </div>
            </div>
            <div class="login_warning">
              <div class="mt-3 alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                  <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                  Логин или пароль неверны!
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    let showPassword = document.querySelectorAll('.password-checkbox');
    showPassword.forEach(item =>
      item.addEventListener('click', toggleType)
    );

    function toggleType() {
      let input_login = document.getElementById('loginPassword');
      if (input_login.type == 'password') {
        input_login.type = 'text';
      } else {
        input_login.type = 'password';
      }
    }
  </script>
  <script>
    const box = document.querySelector("#target-content");
    box.addEventListener("click", function(e){
      let targetItem = e.target;
      if (targetItem.closest(".feedback-btn")){
        targetItem.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Отклик...'
        let req = targetItem.dataset.req
        $.ajax({
          url: 'feedback-handler.php',
          type: 'POST',
          data: {
            feedback: req
          },
          success: function (dataResult) {
            console.log(dataResult);
            targetItem.innerHTML = "Вы откликнулись"
            targetItem.disabled = true;
          }
        })
      }
    })
  </script>
  <script src="js/modal_by_hash.js"></script>
  <script src="js/auth.js"></script>
  <script src="js/vacanciesAjax.js"></script>
  <script src="js/authAjax.js"></script>
</body>

</html>