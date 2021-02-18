<?php
  session_start();

  if((!isset ($_SESSION['name_user']) == true) and (!isset ($_SESSION['password_user']) == true))
  {
    unset($_SESSION['name_user']);
    unset($_SESSION['password_user']);
    header('location:pages/sistema/acesso/login_user.php');
    }

  $logado = $_SESSION['name_user'];

  require("../../conect_bd.php");

  $query = "SELECT * FROM users";
  $busca = mysqli_query($link, $query);

  $nome = $_SESSION['name_user'];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="text-white" style="text-decoration: none;" href="../../index.php"><h1>DASHBOARD</h1></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator" hidden>
                  <img class="img-xs rounded-circle " src="../../assets/images/users/perfil-2.png" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $nome; ?></h5>
                  <span hidden>Admin</span>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navegação</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple text-primary"></i>
              </span>
              <span class="menu-title">Usuários</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="">Cadastrar usuário</a></li>
              </ul>
            </div>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="list-users.php">Listar usuários</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" hidden>
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../../assets/images/users/perfil-2.png" alt="" hidden>
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $nome; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Meu acesso</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="#">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Editar perfil</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="acesso/logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Sair</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="">Cadastre o usuário</h4>
                    <p class="card-description"></p>
                    <form class="forms-sample" id="form_user" method="POST" name="user_cadaster" action="">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status de Usuário:</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="1" required="required">ADMIN</label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="2" required="required">COMUM</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nome:</label>
                        <input type="text" name="name_user" class="form-control" id="exampleInputUsername1" placeholder="Nome aqui..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Idade:</label>
                        <input type="number" name="age_user" class="form-control" id="exampleInputUsername1" placeholder="Idade aqui..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">E-mail:</label>
                        <input type="email" name="email_user" class="form-control" id="exampleInputEmail1" placeholder="E-mail aqui..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Senha:</label>
                        <input type="password" name="password_user" class="form-control" id="exampleInputPassword1" placeholder="Senha aqui..." required="required">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirma a senha:</label>
                        <input type="password" name="password_confirm_user" class="form-control" id="exampleInputConfirmPassword1" placeholder="Confirme a senha aqui..." required="required">
                      </div>
                      <div class="form-group">
                      <label for="exampleFormControlSelect1">Escolha uma foto para seu perfil...</label>
                      <p>
                        <img class="rounded-circle" src="../../assets/images/users/perfil-1.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-2.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-3.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-4.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-5.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-6.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-7.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-8.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-9.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-10.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-11.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                        <img class="rounded-circle" src="../../assets/images/users/perfil-12.png" alt="" style="margin-left: 20px; height:5%; width:5%;">
                      </p>
                      <p>
                      <select name="profile_user" class="form-control" id="exampleFormControlSelect2" required="required">
                        <option value="../../assets/images/users/perfil-1.png" name="img_01">Foto 1</option>
                        <option value="../../assets/images/users/perfil-2.png" name="img_02">Foto 2</option>
                        <option value="../../assets/images/users/perfil-3.png" name="img_03">Foto 3</option>
                        <option value="../../assets/images/users/perfil-4.png" name="img_04">Foto 4</option>
                        <option value="../../assets/images/users/perfil-5.png" name="img_05">Foto 5</option>
                        <option value="../../assets/images/users/perfil-6.png" name="img_06">Foto 6</option>
                        <option value="../../assets/images/users/perfil-7.png" name="img_07">Foto 7</option>
                        <option value="../../assets/images/users/perfil-8.png" name="img_08">Foto 8</option>
                        <option value="../../assets/images/users/perfil-9.png" name="img_09">Foto 9</option>
                        <option value="../../assets/images/users/perfil-10.png" name="img_10">Foto 10</option>
                        <option value="../../assets/images/users/perfil-11.png" name="img_11">Foto 11</option>
                        <option value="../../assets/images/users/perfil-12.png" name="img_12">Foto 12</option>
                      </select>
                      </p>
                    </div>
                      <button type="submit" name="cadaster" class="btn btn-primary mr-2">Cadastrar</button>
                      <button type="reset" class="btn btn-danger">Limpar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <!-- End custom js for this page -->

    <?php
      //form return
      if(isset($_POST['cadaster'])){
        $name = $_POST['name_user'];
        $age = $_POST['age_user'];
        $email = $_POST['email_user'];
        $profile = $_POST['profile_user'];
        $password = $_POST['password_user'];
        $password_confirm = $_POST['password_confirm_user'];
        $status_user = $_POST['membershipRadios'];

        if($password != $password_confirm){
          echo "<script> alert('XXX SENHA NÃO CONFIRMADA! XXX') </script>";
        }
        else
        {
            //conexao banco 
            require("../../conect_bd.php");

            $sqlinsert = "INSERT INTO users(id_user, name_user, age_user, email_user, img_user, password_user, level_user) VALUES (default, '$name', '$age', '$email', '$profile', '$password', '$status_user')";

            mysqli_query($link, $sqlinsert) or die("XXX ERRO NO CADASTRO! XXX");

            echo "<script> alert('>>> CADASTRO CONCLUÍDO! <<<') </script>
                  <meta http-equiv='refresh' content=0.1;url='list-users.php'>";
          }
      }else{}

    ?>
  </body>
</html>