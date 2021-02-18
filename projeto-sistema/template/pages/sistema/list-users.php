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
    <title>Listagem</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
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
                <li class="nav-item"> <a class="nav-link" href="cadaster-user.php">Cadastrar usuário</a></li>
              </ul>
            </div>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="">Listar usuários</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          </div>
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
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="">Usuários cadastrados</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table" style="text-align: center;">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Idade (ANOS)</th>
                            <th>E-mail</th>
                            <th>Perfil</th>
                            <th>Status</th>
                            <th>#</th>
                            <th>#</th>
                          </tr>
                        </thead>

                        <?php
                          require('../../conect_bd.php');

                          $query = "SELECT * FROM users ORDER BY id_user ASC";
                          $busca = mysqli_query($link, $query);
                          $registro = mysqli_num_rows($busca);

                          if($registro == 0){
                            echo "<label class='badge badge-danger'>Não há usuários cadastrados.</label>";
                          }else{
        
                          while ($dados = mysqli_fetch_array($busca)) {
                            $id_user = $dados['id_user'];
                            $name = $dados['name_user'];
                            $age = $dados['age_user'];
                            $email = $dados['email_user'];
                            $profile = $dados['img_user'];
                            $status = $dados['level_user'];
                          
                            if($status == '1'){
                              $level_show = "<label class='badge badge-primary'>Admin</label>";
                            }else{
                              $level_show = "<label class='badge badge-warning'>Comum</label>";
                            }
                        ?>
                                <tbody>
                                  <tr>
                                    <td><?php echo $id_user; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $age; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><img src="<?php echo $profile; ?>"></td>
                                    <td><?php echo $level_show; ?></td>
                                    <td><a href="#"><button type="button" class="btn btn-outline-success btn-rounded btn-fw">Editar <i class="mdi mdi-lead-pencil"></i></button></a></td>
                                    <td><a href="#"><button type="button" class="btn btn-outline-danger btn-rounded btn-fw">Apagar <i class="mdi mdi-block-helper"></i></button></a></td>
                                  </tr>
                                </tbody>
                          <?php }
                           } 
                           ?>
                      </table>
                    </div>
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>