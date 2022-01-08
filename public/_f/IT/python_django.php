<?php require_once('../../../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (!User::is_kamy()) {
    redirect_to('index.php');
} ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "lesson"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php //include_layout_template('nav.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Python Django</a></mark>
</h4>


<?php //echo str_repeat("<br>", 5) ?>

<div class="container">

    <div class="row">
        <div class="col-md-12 box">
            <?php


            $a = "<a href='https://www.djangoproject.com/'>Django Website</a>";
            $a1 = "<a href='https://www.youtube.com/watch?v=N7G2_OIJXlg'>Yt Install Django</a>";
            $a2 = "<a href='https://www.jetbrains.com/help/pycharm/debugging-django-template-tutorial.html'>Jetbrains Install Django</a>";
            $text = "<pre>
    {$a}
    {$a1}
    {$a2}
    
    DJANGO COMMANDS<br><br>
    INSTALL DJANGO
    Will install in the folder all django libraries
    <span style='color: violet'><b>pip install django</b></span><br><br>
    CREATE NEW PROJECT
    <span style='color: violet'><b>django-admin startproject project_name</b></span><br><br>
     START LOCAL SERVER
    (you may need to cd on project_name)
    <span style='color: violet'><b>python manage.py runserver</b></span><br><br>
    CREATE AN APP
    on the project we want to create a new app  eg app_name=menu
    <span style='color: violet'><b>python manage.py startapp app_name</b></span><br><br>
    DATABASE MIGRATION
    - Migration file generation (call this command when you have created a
    new model, or modified an existing one) :
    <span style='color: violet'><b>python manage.py makemigrations</b></span><br>
    - Apply the migrations to the database:
    <span style='color: violet'><b>python manage.py migrate</b></span>
    </pre>";


            $text .= "<pre>
     project_name/migrations/Models.py
     is where you put your database class
     register it setting.py 'app_name.apps.MenuConfig'  app_name=menu
    
     <span style='color: violet'><b>python manage.py createsuperuser</b></span>
     for dev: admin kamy 
     
    </pre>";

            $text .= "<pre>
    Open up cmd.exe (note: you may need to run it as an administrator, but this isn't always necessary), then run the below command:
    (Replace <PORT> with the port number you want, but keep the colon)  8000 for django
    netstat -ano | findstr :<PORT> 
   
   
    <span style='color: violet'><b>netstat -ano | findstr :8000</b></span>
     <PID> = number after the listen
    
    <span style='color: violet'><b>taskkill /PID <PID> /F</b></span>
    
    
    or if you have Node.js installed 
    <span style='color: violet'><b>npx kill-port 8000</b></span>
    
    in Python
from psutil import process_iter
from signal import SIGTERM # or SIGKILL

<span style='color: violet'>
for proc in process_iter():
    for conns in proc.connections(kind='inet'):
        if conns.laddr.port == 8080:
            proc.send_signal(SIGTERM) # or SIGKILL
            continue
</span>
    </pre>";


            $text .= "<pre style='background-color: white'>heroku

    <a href='https://devcenter.heroku.com/articles/heroku-cli'>heroku-cli download from documentation</a>
    

    <span style='color: violet'>heroku login</span>
    
                        <b>CHECKLIST : PUBLISH
                        DJANGO PROJECT ON HEROKU</b>
    1 - Gunicorn
    <span style='color: violet'>This module is needed to execute our web app on the server
    on the cmdline make sure to cd where in the directory which include 'manage.py' file
    <b>pip install gunicorn</b></span><br>
    2 - Procfile
    <span style='color: violet'>Create this file without any extension. It contains the command to execute our web
    application.
    <b>web: gunicorn pizzamama.wsgi</b></span><br>
    3 - Django-heroku
    <span style='color: violet'>Automatically manages Heroku settings for us.
    <b>pip install django-heroku
    settings.py : django_heroku.settings(locals())</b></span><br>
    4 - Settings : Static root
    <span style='color: violet'>Gives the filesystem path for static files.
    <b>STATIC_ROOT = os.path.join(BASE_DIR, 'staticfiles')</b></span><br>
    5 - requirements.txt
    <span style='color: violet'>Create this text file (name is all in lowercase). Heroku will detect this file and will deduct
    this is a Python project. This file must contains all the modules that our project needs.
    <b>pip freeze > requirements.txt</b></span><br>
    6 - Initialise GIT
    <span style='color: violet'>- Call <b>« Git init »</b> from the project directory (where « manage.py » is located)
    - Create a <b>.gitignore</b> file that contains:
    __pycache__/
    db.sqlite3</span><br>
    7 - Create our Heroku app
    <span style='color: violet'>- First make sure you called « heroku login »
    - <b>heroku create jrpizzamamadjangokamy</b> (replace by your unique app name)
      will give you a link to website <a target='_blank' href='https://jrpizzamamadjangokamy.herokuapp.com'>https://jrpizzamamadjangokamy.herokuapp.com</a>
      <br>
      <a href='https://jrpizzamamadjangokamy.herokuapp.com/api/GetPizzas'>https://jrpizzamamadjangokamy.herokuapp.com/api/GetPizzas</a>
      <br>
    - Call « <b>Heroku open</b> », then check that your app have been created successfully.</span><br>
    8 - Allowed Hosts
    <span style='color: violet'>In « settings.py » search for « ALLOWED_HOSTS » and add the string «
    <b>jrpizzamamadjangokamy.herokuapp.com</b> » in the list (replace by your app URL).</span>
        
        
                            FIRST TIME
    9 - settings.py if you have a database 
        <span style='color: violet'>heroku run python manage.py migrate</span>
    
    set up your admin password for the first time when you want to access your admin
    <span style='color: violet'>heroku run python manage.py createsuperuser</span> 
    
    settings.py
    debug=False  ---> for prod
    debug=True  ---> for Dev  if debug=false in dev it won't work.
    
    
    </pre>";


    $text .= "<pre>

                                                GIT COMMANDS
    GIT INIT
    <span style='color: violet'>Initialise GIT from the current directory. Use only once per project. This is
    a mandatory step to be able to call other GIT commands.</span><br>
    GIT ADD
    <span style='color: violet'>Include new or modified files in « Changes to be commited »
    - <b>git add filename</b> (add only one file)
    - <b>git add . </b> (add all files, sub-directories included)</span><br>
    GIT RESET HEAD
    <span style='color: violet'>This command is the opposite as GIT ADD. The selected files will be in
    the « Changes not staged for commit » list</span><br>
    GIT STATUS
    <span style='color: violet'>Display the states of the different files</span>
    GIT CHECKOUT
    <span style='color: violet'>Revert the local changes of a file by taking its last version (from the
    latest commit)
    - <b>git checkout filename</b></span><br>
    GIT COMMIT
    <span style='color: violet'>Creates a new commit from all the « Changes to be commited ».
    Warning: The « commit » is local. Nothing is sent to the server at this
    stage.
    - <b>git commit -m</b> « Describe your changes here »</span><br>
    GIT PUSH
    <span style='color: violet'>Sends all the commits to the server (Heroku in our case).
    - <b>git push heroku master</b></span>

    </pre>";
            echo $text;

            ?>


        </div>
    </div>


</div>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
