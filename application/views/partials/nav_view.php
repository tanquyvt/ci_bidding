<body style="background-color: #f1f1f1;">
  <nav class="navbar navbar-default" role="navigation" style="background-color:white;">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?= strtoupper("Online auction"); ?></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">        

        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
        <ul class="nav navbar-nav navbar-right">

          <?php 
          if (isset($email)) {
            echo '<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">'. $email .' <b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li><a href="home/signout">Sign out</a></li>
            </ul>
            </li>';
          } else {
            echo '<li><a href="signin">Sign in</a></li>';
          }
          ?>

          <li><a href="signup">Sign up</a></li>
          <!-- <li><a href="home/signout">Sign out</a></li> -->
        </ul>
      </div><!-- /.navbar-collapse -->
    </div> <!-- /.container -->
  </nav>

  


  