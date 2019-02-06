<!DOCTYPE html>
<html lang="pt">

<head>
  <title>Login INVÁLIDOS</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/landing-page.css" rel="stylesheet">


  <?php include('../inc/css.php'); ?>
  <!-- END-CSS -->
</head>

<body>

  <!-- Navigation -->
  <!-- MENU -->
  <?php include('../inc/menu.php'); ?>
  <!-- END-MENU -->

  <!-- Header -->
  <a name="about"></a>
  <div class="intro-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="intro-message">
            <h1>USUÁRIO OU SENHA INVÁLIDOS</h1>
            <h3>Volte e conserte...</h3>
            <hr class="intro-divider">
            <ul class="list-inline intro-social-buttons">
              <li>
                <button onClick="history.go(-1)" class="btn btn-default btn-lg" style="width: 275px;"><span class="network-name">Volta</span></button>
              </li>
            </ul>
            <ul class="list-inline intro-social-buttons">
              <li>
                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
              </li>
              <li>
                <a href="https://github.com/joaoteixeira/4B-web-grupo-02" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->

  </div>
  <!-- Page Content -->

  <!-- FOOTER -->
  <!-- Icones -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="footer-caixa" style="margin-top: -144px; background-color: #fbfbfb8c;">
    <!-- Footer -->
    <footer class="page-footer font-small special-color-dark pt-4" style="background-color: #eadcdc00;">
      <!-- Footer Elements -->
      <div class="container">

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
          <li class="list-inline-item">
            <a href="#" target="_blank" class="footer-font btn-floating btn-fb mx-1">
              <i class="fa fa-facebook"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#" target="_blank" class="footer-font btn-floating btn-tw mx-1">
              <i class="fa fa-twitter"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#" target="_blank" class="footer-font btn-floating btn-gplus mx-1">
              <i class="fa fa-google-plus"> </i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#" target="_blank" class="footer-font btn-floating btn-gplus mx-1">
              <i class="fab fa-instagram"></i>
            </a>

          </li>
        </ul>
        <!-- Social buttons -->

      </div>
      <!-- Footer Elements -->

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        © 2018 Copyright: Foperoma
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->

  </div>


  <!-- JS -->
  <?php include('../inc/js.php');?>
  <!-- END JS -->


</body>

</html>
