<!---->


<!-- TODO stylesheet footer  header below layout context -->

<!doctype html>
<html lang="en">
<head>
    <!--    <meta charset="utf-8">-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    ;
    <title>ikamy.ch </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">


</head>

<body>


<div id='container-view' class="container-fluid">


    <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top " role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand active" href="http://www.ikamy.ch/public/index.php"><span style='color: #0016b0'><b>i</b></span><span
                            style='color: green'><b>k</b></span><span style='color: red'><b>a</b></span><span
                            style='color: darkorchid'><b>m</b></span><span style='color: royalblue'><b>y</b></span><span
                            style='color:red'><b>.</b></span><span style='color: palevioletred'><b>c</b></span><span
                            style='color: darkcyan'><b>h</b></span><span style="color: blue"> </span></a>

            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="admin/index.php">Home</a>

                    </li>

                    <li class=''><a href='http://www.ikamy.ch/Inspinia/index.php'>Galleries</a></li>

                    <li
                            class=" dropdown"><a href="#" data-toggle="dropdown">About us<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class=''><a href='about_us.php'>About us1</a></li>
                            <li class=''><a href='about_us_2.php'>About us 2</a></li>
                            <li class=''><a href='angular.php'>About Us 3</a></li>
                            <li class=''><a href='angular2.php'>AngularJS Login</a></li>
                        </ul>
                    </li>


                    <li
                    ><a href="myLinks.php?category=Others">Links</a></li>


                    <li
                            class=" dropdown"><a href="#" data-toggle="dropdown">Other<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="transmed_form.php">Transmed_form</a></li>
                            <li><a href="transmed_form2.php">Transmed_form2</a></li>

                            <li class="divider"></li>

                            <li><a href="_f/article/judaisme.php">Judaisme</a></li>
                            <li><a href="_f/article/antisemitism_1.php">Antisemitism</a></li>
                            <li><a href="_f/article/antisionism.php">Antisionism 1</a></li>
                            <li><a href="_f/article/shoah.php">Shoah</a></li>
                            <li><a href="_f/article/jokes_quotes.php">Jokes Quotes</a></li>
                            <li><a href="_f/article/juif_arabe1.php">Juif Arabe</a></li>
                            <li><a href="_f/article/bhl.php">BHL</a></li>
                            <li><a href="_f/article/psychologie.php">Psychologie</a></li>
                            <li class="divider"></li>
                            <li><a href="_f/IT/lesson_git.php">Git</a></li>
                            <li><a href="_f/IT/lesson_OOP_PHP.php">OOP PHP</a></li>


                        </ul>
                    </li>


                    <li
                            class="active"><a href="contact.php">Contact</a></li>


                </ul>


                <ul class="nav navbar-nav navbar-right">

                    <!--                <p class="navbar-text " style="">--><!--</p>-->
                    <!---->


                    <li><a href="admin/login.php"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </li>


                </ul>


            </div>
        </nav>


    </div>


    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <div class="background_light_blue">

                <h2 class="page-header text-center" style="color: #0000ff">Contact Us</h2>
                <form class="form-horizontal" role="form" method="post" action="/public/contact.php">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="First & Last Name" value="">
                            <p class='text-danger'></p></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="example@domain.com" value="
                                                ">
                            <p class='text-danger'></p></div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Message</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" rows="4" id="message" name="message">
                            </textarea>
                            <p class='text-danger'></p></div>
                    </div>
                    <div class="form-group">
                        <label for="human" class="col-sm-3 control-label">2 + 3 = ?</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                            <p class='text-danger'></p></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br>
    <footer class="row nav navbar-fixed-bottom my_footer">
        <div class="row">
            <div class="socialmediaicons pull-right" style="margin-right: 5em;">

            </div>
            <div class="text-center">
                <p class="text-center">
                    <small>&#xA9;&nbsp;2014 - 2017, <span style='color: #0016b0'><b>i</b></span><span
                                style='color: green'><b>k</b></span><span style='color: red'><b>a</b></span><span
                                style='color: darkorchid'><b>m</b></span><span
                                style='color: royalblue'><b>y</b></span><span style='color:red'><b>.</b></span><span
                                style='color: palevioletred'><b>c</b></span><span
                                style='color: darkcyan'><b>h</b></span></small>
                </p>
            </div>
        </div>
    </footer>

</div>   <!--Div class container-->


<script src="//code.jquery.com/jquery-latest.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea'});</script>

<script src="js/bootstrap.min.js"></script>
<script src="myjs/socialmedia.js"></script>


<script src="js/test_tooltips.js"></script>
</body>
</html>


