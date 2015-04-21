 <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css" title="style" />
<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" type="text/css" title="style" />
<script src="/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</head>

<style type="text/css">

.navbar-brand, .navbar-nav>li>a {
    text-shadow: 0 0px 0 rgba(255,255,255,.25);
}
</style>
<div class="container">
    <div class="carousel">
 <nav id="mainNav" class="navbar navbar-default navbar-fixed-top"  style="border-color: #232f3e;">
        <div class="container-fluid" style="background-color:#232f3e">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="/amazon">amazon</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a class="page-scroll" href="#about">Your Amazon.com</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Today's Deals</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Gift Cards</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Sell</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Help</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop by Department <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <?php foreach ($category_data as $key => $value) {
                            # code...
                            echo "<li><a href='#'>$value[category_name]</a></li>";
                        }
                        ?>

                      
                        </ul>
                    </li>
                      <li>
                        <a class="page-scroll" href="/login">Your Account <?php if($username) { echo '['.$username.']'; } ?></a>
                    </li>
                    <?php if($username) { ?>
                     <li>
                        <a class="page-scroll" href="/logout">logout</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
</div>