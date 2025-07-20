<?php require_once('../../../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (User::is_employee()) {
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

            $text .= "<pre style='background-color: white'>
                                            KIVY DESkTOP
The basic kivy in Python
from kivy.app import App

class MainWidget(Widget):
    pass
    

    
class BoxLayoutExample(BoxLayout):
    pass

\"\"\"
def __init__(self, **kwargs):
        super().__init__(**kwargs)

        self.orientation='vertical'
        b1=Button(text='A')
        b2=Button(text='B')
        b3=Button(text='C')
        self.add_widget(b1)
        self.add_widget(b2)
        self.add_widget(b3)
\"\"\"

class MainWidget(Widget):
    pass                                                
    
class TheLabApp(App):
    pass


TheLabApp().run()    
    
            </pre>";


            $text .= "<pre style='background-color: white'>
                                KIVY File
the kv file name must be equal to run method TheLabApp().run()   TheLab.kv   so without App at the end

at the top of the kv file put the Def that will run 
BoxLayoutExample:
\<BoxLayoutExample\>

                              

</pre>";


            echo $text;

            ?>


        </div>
    </div>


</div>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
