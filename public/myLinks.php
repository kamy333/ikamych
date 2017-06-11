
<?php require_once('../includes/initialize.php'); ?>

<?php $class_name="Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu="links"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php //include_layout_template('nav.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<!--<h2 class="text-center"><a  target="_blank" href="https://www.lumosity.com/app/v4/dashboard">Exercice my brain in Lumonisity-->
<!--    </a></h2>-->

<div class="row">
    <?php echo $session->message(); ?>
    <?php  echo isset($valid)? $valid->form_errors():"" ?>
</div>



    <div class="row">
        <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-5">
            <?php echo Links::get_search_category(); ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-3 col-lg-offset-1">
            <?php //echo get_search_category(); ?>

            <?php echo Links::output_links(); ?>
        </div>

        <div class="col-lg-3 col-lg-offset-1">
            <?php //echo get_search_category(); ?>

            <?php echo Links::output_links('PHP'); ?>
        </div>

        <div class="col-lg-2 ">
            <?php //echo get_search_category(); ?>

            <?php echo Links::output_links('Bootstrap'); ?>
        </div>
        <div class="col-lg-2 ">
            <?php //echo get_search_category(); ?>

            <?php echo Links::output_links('udemy',true); ?>
        </div>

        </div>

        <div class="row">
    <div class="col-lg-2 col-lg-offset-1 ">

        <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
<tr>
<th class="text-center">Social</th>
</tr>
          <tr>	<td><a target="_blank" href="https://www.facebook.com/">Facebook</a> </td></tr>
          <tr>  <td><a target="_blank" href="https://www.linkedin.com/" >linkedin</a> </td></tr>
          <tr>  <td><a target="_blank" href="https://www.google.com/finance"> Google finance</a> </td></tr>
          <tr>  <td><a target="_blank" href="https://www.t411.io/top/100/">t411</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://kickass.to/">kickass</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://www.bluewin.ch/fr/index.html">bluewin</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://web.tvonline.swisscom.ch/#en/TV/Guide/Date/20121207/Browse" >TV air</a> </td></tr>
          <tr>  <td><a target="_blank" href="https://accounts.logme.in/login.aspx?clusterid=03&returnurl=https%3A%2F%2Fsecure.logmein.com%2Ffederated%2Floginsso.aspx&headerframe=https%3A%2F%2Fsecure.logmein.com%2Ffederated%2Fresources%2Fheaderframe.aspx&productframe=https%3A%2F%2Fsecure.logmein.com%2Fcommon%2Fpages%2Fcls%2Flogin.aspx&lang=en-US&skin=logmein&regtype=R&trackingproducttype=2">logmein</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://kickass.to/usearch/ufc/?field=time_add&sorder=desc">Dnld UFC</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://kickass.to/usearch/category:movies%20lang_id:5/">Dnld French Movie</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://www.cpasbienstreaming.fr/2015/02/une-merveilleuse-histoire-du-temps.html">Film</a> </td></tr>
            <tr>  <td><a target="_blank" href="SuperLearning/CourseSyllabusSuperLearner2.html"">Course Syllabus</a> </td></tr>
            <tr>  <td><a target="_blank" href="SuperLearning/CourseSyllabusSuperLearnerV2.0Udemy.pdf"">SuperLearning Material </a> </td></tr>
 
 
 
 </table>

    </div>

<!--
          <tr>  <td><a target="_blank" href=""> </a></td></tr>
          <tr>  <td><a target="_blank" href=""> </a></td></tr>
          <tr>  <td><a target="_blank" href=""> </a></td></tr>
          <tr>  <td><a target="_blank" href=""> </a></td></tr>

-->




 <div class="col-lg-2 ">
<table class="table table-striped table-bordered table-hover table-condensed table-responsive">
<tr>
  <th class="text-center">Israel</th>
</tr>
          <tr>  <td><a target="_blank" href="http://www.akadem.org/sommaire/themes/politique/geopolitique/guerre-et-paix/terrorisme-et-antisemitisme-la-france-sous-influence-16-03-2015-68384_193.php">Antisémite et terrorisme 1h00 </a> </td></tr>
          <tr>  <td><a target="_blank" href="http://www.akadem.org/sommaire/cours/l-antisemitisme-contemporain-en-france/dans-la-tete-des-antisemites-05-02-2015-67195_4566.php">Dans la tête des antisémites</a> </td></tr>
          <tr>  <td><a target="_blank" href="https://www.youtube.com/watch?v=GwBVHxjlMfU">the believers english</a> </td></tr>
          <tr>  <td><a target="_blank" href="https://www.youtube.com/watch?v=i9zKhAi0CRQ">the believers french</a> </td></tr>
          <tr>  <td><a target="_blank" href="https://www.marxists.org/francais/leon/CMQJ00.htm">La conception matérialiste de la question juive</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://www.lejdd.fr/Societe/Pierre-Andre-Taguieff-du-CNRS-Les-nouvelles-passions-antijuives-677752">Taguieff : "Les nouvelles passions antijuives"</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://www.franceculture.fr/oeuvre-la-deraison-antisemite-et-son-langage-dialogue-sur-l-histoire-et-l-identite-juive-alerte-de-j">La déraison antisémite et son langage</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://www.lemondedesreligions.fr/entretiens/videos/au-dela-de-la-violence-dialogue-entre-delphine-horvilleur-et-abdennour-bidar-02-04-2015-4617_207.php">Delphine Horvilleur</a> </td></tr>
          <tr>  <td><a target="_blank" href="http://lemondejuif.blogspot.fr/2013/03/parcours-de-lecture-yeshayahou-leibowitz.html">yeshayahou-leibowitz</a> </td></tr>
    	  <tr>  <td><a target="_blank" href="http://www.washingtonpost.com/posteverything/wp/2015/04/22/iran-executed-my-grandfather-now-the-regime-is-trying-to-hide-the-way-it-has-treated-other-jews/?postshare=591430489911647">Iran executed my grandfather </a></td></tr>
    	  <tr>  <td><a target="_blank" href="http://www.memorial98.org/2015/05/dieudonne-le-fond-dutroux.html">Dindonné</a></td></tr>


</table>
</div>



<!--
        <tr>  <td><a target="_blank" href=""> </a></td></tr>
        <tr>  <td><a target="_blank" href=""> </a></td></tr>
        <tr>  <td><a target="_blank" href=""> </a></td></tr>
        <tr>  <td><a target="_blank" href=""> </a></td></tr>
            
-->
    
    
    


<div class="col-lg-2">
    <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
        <tr>
            <th class="text-center">Antisémitisme</th>
        </tr>
        <tr>  <td><a target="_blank" href="http://ukmediawatch.org/2014/10/14/Shlomo-sands-sickening-guardian-article-slams-both-israel-and-judaism/">Shlomo Sand’s sickening Guardian articl</a>e</td></tr>
        <tr>  <td><a target="_blank" href="http://www.massorti.com/Comment-le-peuple-juif-fut-invente">Comment le peuple juif fut inventé</a></td></tr>
        <tr>  <td><a target="_blank" href="http://www.massorti.com/Comment-la-terre-d-Israel-fut">Comment la terre d’Israël fut inventée</a></td></tr>
        <tr>  <td><a target="_blank" href=""> </a></td></tr>

        <!--
        <tr>  <td><a target="_blank" href=""> </a></td></tr>
        <tr>  <td><a target="_blank" href=""> </a></td></tr>
        <tr>  <td><a target="_blank" href=""> </a></td></tr>
        <tr>  <td><a target="_blank" href=""> </a></td></tr>
        <tr>  <td><a target="_blank" href=""> </a></td></tr>

        -->

    </table>
</div>
            </div>



    <div class=" hide col-lg-3">
        <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
            <tr>
                <th class="text-center">Learning</th>
            </tr>

            <tr>  <td><a target="_blank" href="http://www.lynda.com/">lynda.com</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/PHP-tutorials/Introducing-PHP/123485-2.html"> Introducing-PHP</a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/MySQL-tutorials/PHP-MySQL-Essential-Training/119003-2.html">PHP-MySQL-Essential-Training</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/PHP-tutorials/php-with-OOP-beyond-the-basics/653-2.html">php-with-OOP-beyond-the-basics </a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/MySQL-tutorials/Up-Running-MySQL-Development/158373-2.html">Up-Running-MySQL-Development</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/PHP-tutorials/Setting-date-time-independently/188214/375112-4.html">PHP Date Time</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/PHP-tutorials/Exporting-Data-Files-PHP/158375-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2">Exporting Data to Files with PHP</a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/PHP-tutorials/Uploading-Files-Securely-PHP/158374-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2">Uploading Files Securely with PHP</a></td></tr>

            <tr>  <td><a target="_blank" href="http://www.lynda.com/phpMyAdmin-tutorials/Up-Running-phpMyAdmin/144202-2.html">Up-Running-phpMyAdmin</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/MySQL-tutorials/MySQL-Essential-Training/139986-2.html">MySQL-Essential-Training</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/HTML-tutorials/HTML-Essential-Training-2012/99326-2.html">HTML-Essential-Training</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/CSS-tutorials/Accessing-code-HTML-CSS-Dreamweaver/110716/114021-4.html?autoplay=true">Creating a Responsive Web Design</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/Web-Responsive-Design-tutorials/Responsive-Design-Fundamentals/104969-2.html">Responsive-Design-Fundamentals</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/jQuery-tutorials/jQuery-Essential-Training/183382-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2">JQuery-Essential</a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/jQuery-Mobile-tutorials/jQuery-Mobile-Essential-Training/167067-2.html">Jquery Mobile Esstl </a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/search?q=jquery">Lynda search jquery</a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/search?q=jquery+mobile">Lynda Search Jquery mobile </a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/search?q=php">Lynda Search PHP</a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/Ajax-tutorials/Updating-information-without-reloading-page-using-AJAX/150163/155367-4.html">Ajax Lynda</a></td></tr>
            <!--
                      <tr>  <td><a target="_blank" href=""> </a></td></tr>
                      <tr>  <td><a target="_blank" href=""> </a></td></tr>
                      <tr>  <td><a target="_blank" href=""> </a></td></tr>
                      <tr>  <td><a target="_blank" href=""> </a></td></tr>
                      <tr>  <td><a target="_blank" href=""> </a></td></tr>


            -->

        </table>
    </div>

    <div class=" hide col-lg-2 col-sm-5">
        <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
            <tr>
                <th class="text-center">Bootstrap</th>
            </tr>
            <tr>  <td><a target="_blank" href="http://getbootstrap.com/">Bootstrap</a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/search?q=bootstrap">bootstrap search Lynda </a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/Bootstrap-tutorials/Using-exercise-files/133339/151271-4.html?autoplay=true">Bootstrap-Lynda Basic</a> </td></tr>
            <tr>  <td><a target="_blank" href="http://www.lynda.com/Bootstrap-tutorials/Planning-thumbnail-gallery/161098/176516-4.html">Bootstrap Lynda interactive </a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-forms.php">bootstrap-forms </a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-tables.php">bootstrap-tables </a></td></tr>
            <tr>  <td><a target="_blank" href="https://gist.github.com/koenpunt/6424137#file-chosen-bootstrap-css">Bootstrap 3.0 theme for Chosen</a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.sitepoint.com/find-a-route-using-the-geolocation-and-the-google-maps-api/">Google map geolocalisation</a></td></tr>
            <tr>  <td><a target="_blank" href="http://www.paulund.co.uk/add-delete-confirmation-to-form"> </a>modal on form</td></tr>

        </table>
    </div>

 <div class="container"   >
     <div class="row">

    <div class ="col-md-3">
    <ul class="list-group">
<li  class="list-group-item"><strong><u>cinema israelien</u></strong></li>
<li  class="list-group-item"> Hatoufim Les prisonniers de guerre</li>
<li  class="list-group-item"> Les citronniers</li>
<li  class="list-group-item">Tu n'aimeras point</li>
<li  class="list-group-item">Jaffa</li>
<li  class="list-group-item">Valse avec Bachir</li>
<li  class="list-group-item">La visite de la fanfare</li>
<li  class="list-group-item">Zaytoune</li>
<li  class="list-group-item">Une vie précieuse</li>
<li  class="list-group-item">Va, vis et deviens !</li>
<li  class="list-group-item">Le procès de Viviane Amsalem</li>
<li  class="list-group-item">5 caméras brisées</li>

</ul>

</div>
</div>


 <!--</div> --> <!--row-->



<div class="row">


</div>

     <?php
     $text = "\"JUIF ? » par Alain Finkelkraut
Pour Alain Finkelkraut, \"c'est quand on n'est pas pratiquant que l'identité juive vous colle à la peau\". J'aime ce texte qui définit la condition de nombreux Juifs d'Europe, laïcs, intellectuels, humanistes, artistes, démocrates, libres penseurs, etc., mais profondément attachés à leur culture et à leur mémoire. Être juif sans pratiquer n'est une contradiction que pour ceux qui n'ont pas conscience de la dimension d'une identité qui ne se limite pas à une appartenance religieuse.
« Je crois que c’est quand on n’est pas pratiquant que l’identité juive vous colle à la peau parce que, pour un pratiquant, c’est Dieu qui colle : le pratiquant est celui dont l’existence se tient toute entière, se déroule devant Dieu. Mon existence avance comme elle le peut, Dieu n’est pas son témoin et, en même temps, je me sens juif, parce que je ne suis pas un juif pratiquant, je suis un juif identitaire. Qu’est-ce que ça veut dire? Non que la judéité soit une propriété, une manière d’être, qu’elle constitue mon caractère, si c’est vrai je n’en sais rien. Être juif, pour moi, c’est me sentir impliqué, concerné, compromis parfois, par ce que font les autres juifs. C’est un sentiment d’appartenance, d’affiliation et dans cette affiliation, il y a, par exemple, le lien torturé à Israël. Il y a un fait de sollicitude, d’inquiétude, d’admiration et parfois, d’impatience critique. Et puis aussi, si mon existence ne se tient pas devant Dieu, elle se tient, peut-être, devant les grands-parents que je n’ai jamais eus. Raymond Aaron disait : « Si, par extraordinaire, je devais apparaître devant mon grand-père qui vivait à Rambervillers, encore fidèle à la tradition, je voudrais, devant lui, ne pas avoir honte. Je voudrais lui donner le sentiment que, n’étant plus juif comme il l’était, je suis resté d’une certaine manière fidèle. » Je n’ai pas connu mes grands-parents, mais je pense à eux. Si je devais apparaître devant eux, eux qui étaient, en effet, encore fidèle à la tradition – l’un d’entre eux aimait les textes sacrés –, je souhaiterais qu’ils pensent, que je suis, à ma façon, dans la culture, et en France, resté fidèle. » 
Alain Finkelkraut";
     echo "<pre>" . $text . "</pre><hr>";

     $text = "";
     echo "<pre>" . $text . "</pre><hr>";


     $text = "";
     echo "<pre>" . $text . "</pre><hr>";


     $text = "<p>\"Quelques Juifs (genre apprentis Inglorious Basterds) organisent secrètement un attentat contre Adolf Hitler qui doit passer en voiture près de leur schtettl à midi. Ils préparent leur arme de
destruction massive, la planquent sous le pont à l'entrée du village et attendent. Passe midi, 12.30, 13
heures, Hitler n'arrive pas... Ils commencent à s'inquiéter et l'un dit à l'autre: \"Pourvu qu'il ne lui soit rien arrivé!\"</p>";
     //echo "<pre>" . h($text) . "</pre><hr>";
     echo "<pre>" . $text . "</pre><hr>";

     $text = "Une charmante demoiselle un peu court vêtue monte dans un bus à Jerusalem. 
Un orthodoxe assis à côté d'elle, au bout de deux stations lui tend une pomme.
-Merci, mais pourquoi me donnez vous une pomme?
-C'est en mangeant la pomme que notre mère Eve a pris conscience qu'elle était nue.
Deux stations plus tard la demoiselle lui rend la pomme.
-Pourquoi me rendez vous la pomme?
-C'est en mangeant la pomme que notre père Adam pris conscience que désormais il devrait travailler.";

     echo "<pre>" . $text . "</pre><hr>";


     $text = "Salomon est sur son lit de mort. Sa fidèle Sarah se tient comme il se doit auprès de lui, et se saisit
tendrement de sa main. Salomon lève vers elle un regard attendri et demande à sa femme d'une voix
fatiguée : <br>
- Dis moi, Sarah, mon amour, ma vie, quand nous vivions en Pologne et que les paysans du village voisin ont fait un
pogrom et ont brûlé notre maison, et que nous avons tout perdu, tu étais avec moi, comme
aujourd'hui, me tenant par la main, n'est-ce pas ?<br>
- Mais oui, Salomon, bien sûr, j'étais avec toi !<br>
- Et en 42, à Paris, quand nous avons dû fuir les rafles et une fois de plus tout laisser derrière
nous, nous étions encore ensemble, main dans la main, n'est-ce pas ?<br>
- Oui, Salomon, j'étais avec toi !<br>
- Et en 68, quand ils ont détruit le magasin, que l'entrepôt a pris feu et que l'assurance a
refusé de nous rembourser, tu étais encore là, comme aujourd'hui, à me tenir la main,
n'est-ce pas ?<br>
- Mais oui, Salomon, évidemment que j'étais avec toi !<br>
- Alors, tu sais quoi, Sarah, mon amour ... je crois que maintenant, tu peux me lâcher la main ... parce
qu'à force, après toutes ces épreuves que nous avons traversées ensemble ... je me demande
quand même si ce n'est pas toi qui me portes la poisse !!!</p> ";
     echo "<pre>" . $text . "</pre><hr>";


     $text = "Histoire juive :<br>

    Ca se passe dans les années 70 . Des immigrants juifs soviétiques arrivent en Israël. Un journaliste les interroge:<br>
    - Comment ca va l'antisémitisme en URSS?<br>
    - On ne peut pas se plaindre<br>
    - Comment est le climat en URSS?<br>
    - On ne peut pas se plaindre<br>
    - Et l'économie?<br>
    - On ne peut pas se plaindre<br>
    Eh bien alors, demande le journaliste pourquoi êtes vous venus en Israël?<br>
    - Parce qu'ici on peut se plaindre<br>";

     echo "<pre>" . $text . "</pre><hr>";

     $text = "Encore aujourd'hui, de nombreuses personnes, en écrivant le chiffre sept, utilisent une barre supplémentaire horizontale au milieu du chiffre.La plupart des typographies l'ont fait disparaître aujourd'hui, comme vous pouvez le constater ici: 7
Mais savez-vous pourquoi cette barre a survécu jusqu'à nos jours?Il faut remonter bien loin, aux temps bibliques.Lorsque Moise eut gravi le mont Sinaï et que les 10 commandements lui furent dictés, il redescendit vers son peuple et leur lut, à haute et forte voix, chaque commandement. Arrivé au septième, il annonça :
Tu ne désireras pas la femme de ton prochain. \"Et là, de nombreuses voix s'élevèrent parmi le peuple lui criant : \"Barre le sept, barre le sept !!!
( 7 13 amusant! merci Jean-Marc: bonne fête de Shavouoth à toi )";

     echo "<pre>" . $text . "</pre><hr>";


$text="C’est Dieudonné qui boit une bière dans un bar, lorsque rentre un Juif avec une kippa. Alors, Dieudonné annonce très fort :
– Tournée général, sauf pour le juif !
Tout le monde boit, et le juif va voir Dieudonné pour le remercier très chaleureusement. Alors, Dieudonné crie encore plus fort :
– Je repaye ma tournée, évidement, rien pour le juif !!!
Ce dernier le remercie encore plus chaleureusement. N’y comprenant rien, Dieudonné se tourne vers le barman :
– Je comprend pas, pourquoi il me remercie ce mec ?
– C’est parce que c’est lui le patron !";
echo "<pre>" . h($text) . "</pre><hr>";

$text="- Deux juifs se rencontrent sur le quai d'une gare:
- Où vas-tu ?
- Je vais à Cracovie.
- Tu me dis que tu vas à Cracovie, pour que je crois que tu vas à Lodz, alors que je sais que tu vas à Cracovie. Alors pourquoi mens-tu ?";
echo "<pre>" . h($text) . "</pre><hr>";

$text="A la sortie de la deuxième guerre mondiale, l'employé demande au candidat juif à l’émigration :
- Dans quel pays voulez vous vous rendre ?
- En Australie.
- En Australie ? mais c'est loin !
- Loin d'où ?";
echo "<pre>" . h($text) . "</pre><hr>";

$text="Au sentier a Paris un commerçant chinois va voir son voisin Élie pour se plaindre qu'il s'est encore fait cambrioler pour la 37eme fois ce trimestre alors que tous les autres commerçant juif eux presque pas.
Élie le console comme il peut et lui dit:
-Mais qu'est ce que je peut faite pour toi? En quoi puis je t'aider?
Le chinois répond :
- tu me vendz Mezouza! Il faut Mezouza pour magasin à moi!
Élie lui répond:
- Mais tu n'est pas juif! Tu crois que les voleurs ne viendrons pas grâce à la Mezouza ?
-D.ieu protège magasin avec Mezouza! Donnes moi mezzouza! Moi veux mezouza!
- Bon très bien je t'en apporte une
Une semaine après lui avoir fourni la Mezouza le chinois revient voir Élie qui lui demande:
- Alors tu t'es quand même fait cambrioler!?
- Non pas une fois! Mais moi te rendre Mezouza quand même!
- Mais pourquoi? Si cela t'a protégé des cambrioleurs!?
- Protection cambriolage parfait! Mais toute la journée beaucoup trop de rabbins venir demander tsedaka!!!!
";
echo "<pre>" . h($text) . "</pre><hr>";

     $text = "Un vieil homme juif de 82 ans, est assis dans un bar juste à côté de la table d'une magnifique jeune femme avec une poitrine extraordinaire.
il lui dit : \" Mademoiselle, si vous me laissez mordiller juste un de vos seins je vous donne 1000 €\"
\"êtes-vous fou? \" répondit-elle et elle sort du bar.
Le vieux juif la suit et en arrivant au coin de la rue, il lui répète : \"si vous me laissez mordiller vos deux seins je vous donne 10.000 €\".
\" Écoutez Monsieur, je ne suis pas ce genre de femme\".
\" Mademoiselle, j’augmente mon offre à 100.000 €, à mon âge c’est le seul fantasme que je puisse me permettre\".
Elle réfléchit un instant et elle lui dit: \" d’accord pour 100.000 €, mais juste une fois, mais pas ici : allons dans l’allée un peu plus sombre, là-bas\".
Ils vont dans l’allée, elle enlève sa blouse et révèle cette magnifique poitrine...
Aussitôt qu’il voit cela le vieux commence à les caresser doucement, à les embrasser, à les lécher, à se passer le visage sur ses seins.
Finalement la fille qui s'impatiente, lui dit: 
\"Est-ce que vous allez les mordiller finalement ?
\"Non\", dit le vieux \" finalement, c’est trop cher.";
     echo "<pre>" . h($text) . "</pre><hr>";


$text="3 mères juives discutent de leur fils respectifs...
La première:
- Moi mon fils, il et tellement riche qu'il pourrait acheter Paris!
La seconde, un peu vexée:
- Moi mon fils, il a tellement d'argent qu'il pourrait s'offrir Paris ET New-York!
Alors la troisième termine:
- Et qu'est ce qui vous fait croire que mon fils a envie de vendre?";
echo "<pre>" . h($text) . "</pre><hr>";


$text="C’est un curé et un rabbin, très bons amis. Le curé dit à son ami rabbin : « tu sais, je connais une magouille pour ne pas payer au restaurant : il suffit d’attendre que tous les clients soient partis et que le restaurant ferme ses portes, tu vas voir ! ». Ils se rendent donc au restaurant, commandent, dinent et attendent que tous les clients soient partis jusqu’à presque fermeture des portes ! Un serveur dit : ' ces messieurs ont-ils réglé ? ' Et le rabbin répond : « oui et nous attendons toujours notre monnaie ! »";
echo "<pre>" . h($text) . "</pre><hr>";


$text = "Enfin la vérité, toute la vérité sur la mort de Yasser Arafat, le leader palestinien.
Arafat, hospitalisé à Paris, se réveille d'un premier coma et interroge son médecin :
- Docteur, qui êtes-vous ?
- Je suis le professeur Israël. (Véridique !)
L'émotion est trop forte. C'est l'alerte cardiaque à nouveau. Les médecins se précipitent et réussissent à réanimer le leader palestinien.
- Où suis-je ? demande-t-il alors.
- Vous êtes à Villejuif, répondent en choeur les médecins.
Nouvelle alerte... Le cardiologue prévient:
- Encore une alerte comme celle-ci et je ne réponds plus de rien...
Arafat ouvre alors une dernière fois les yeux :
- Quel temps fait-il dehors ?
Et tous de répondre en coeur:
- Maussade..";
echo "<pre>" . h($text) . "</pre><hr>";

$text=" Deux hommes opposés par une affaire consultent un rabbin du tribunal rabbinique. Chacun défend alors son point de vue.
Après que le premier ait parlé, le rabbi lui dit:
- Tu as raison.
Après que le deuxième se soit exprimé, le rabbi lui dit aussi :
- Tu as raison.
Un des élèves du Rabbi lui demande alors:
- Rabbi, il n'est pas possible que les deux aient raison.
Alors le rabbi, après un moment de réflexion répond:
- C'est vrai, toi aussi tu as raison.";
echo "<pre>" . h($text) . "</pre><hr>";

$text="Bientôt Kippour... voilà une blague qui est un grand classique, et qui nous fait rire tous les ans....
-----------------
En prévision de Kippour, nous vous demandons de bien vouloir remplir ce formulaire et de le renvoyer dans les plus brefs délais
1. Où souhaitez-vous être assis ?
___ du côté des gens qui parlent
___ du côté des gens qui prient
2. Si vous êtes assis dans la section des parleurs, quelles catégories préférerez-vous ? (Indiquer l'ordre des priorités.)
___ Affaires
___ Sports
___ Médecine
___ Maladies graves qu'auraient eues un des fidèles
___ Potins, toutes catégories confondues
___ Potins concernant
- le rabbin
- le hazan
- la femme du rabbin la femme du hazan
- le shamash
- la femme du shamash
- la secrétaire du shamash
___ Mode
- comment les autres sont habillés
- où ils achètent leurs vêtements et combien ils les paient
___ Les derniers achats (voiture, appartement, maison de campagne...) et prix payé
___ Les dernières fêtes (Brit-Mila, Mariage, Bar-Mitsvah) et prix payé
___ Votre famille
___ Votre belle-famille
3. Auprès de qui souhaiteriez-vous être assis en priorité, pour une consultation professionnelle gratuite ?
___ Médecin généraliste
___ Dentiste
___ Gastro-entérologue
___ Pédiatre
___ Psychiatre pour enfant
___ Cardiologue
___ Rhumatologue
___ Comptable
___ Banquier
___ Notaire
___ Avocat
___ Avocat de divorce
___ Avocat d'affaires
___ Agent immobilier
___ Amateur de tennis/foot/golf
4. Vous désirez une place située (indiquer l'ordre de priorité)
___ en bout de rangée
___ près de la sortie
___ près des toilettes
___ près de vos beaux-parents
___ aussi loin que possible de vos beaux-parents
___ aussi loin que possible de vos ex-beaux-parents
___ près des hommes célibataires
___ près des femmes célibataires
___ là où personne ne peut vous voir/entendre parler pendant l'office
___ là où personne ne peut vous voir dormir pendant l'office
5. Vous souhaitez être assis là où
___ vous pouvez voir votre femme
___ vous pouvez ne pas voir votre femme
___ vous pouvez voir la meilleure amie de votre femme
___ votre femme ne peut pas voir que vous regardez sa meilleure amie
6. Vous souhaitez ne pas être placé à côté des personnes suivantes :
(Choix limité à 6 noms. Au delà, peut-être serait-il bon de songer à changer de synagogue.)
_________________________
_________________________
_________________________
_________________________
_________________________
_________________________
Signature : _______________________________________
Montant du don fait à la synagogue :_____________";
echo "<pre>" . h($text) . "</pre><hr>";

     $text = "Pendant la répétition du mariage, le futur marié prend le rabbin à part et lui dit à l'oreille :
\"Écoutez Monsieur le rabbin, voici un billet de 500 Euros.\"
En échange, je voudrais que vous modifiiez un peu le schéma classique de la cérémonie... 
En particulier, je voudrais que quand vous vous adresserez à moi, vous laissiez tomber la partie
 où je dois promettre \"d'aimer, honorer et respecter mon épouse,
  renoncer aux autres femmes et lui être fidèle à jamais\".
Le rabbin prend le billet sans mot dire, et le futur marié s'en va satisfait et confiant.
Le jour du mariage, le moment fatidique de la promesse approche.
 Le rabbin se tourne vers le marié et lui dit en le regardant droit dans les yeux :
\"Promets-tu de te prosterner devant elle, d'obéir à chacun de ses ordres,
 de lui apporter le petit déjeuner au lit tous les matins et de jurer 
 devant Dieu et ta femme exceptionnelle que jamais, au grand jamais, 
 tu ne regarderas une autre femme ?\"
Le jeune gars ravale sa salive, rougit, regarde autour de lui 
avec angoisse et répond d'une voix à peine perceptible :
\"Oui je le promets.\"
A la fin de la cérémonie, le marié s'approche du rabbin et lui dit :
\"On avait fait un marché !?!\"
Alors le rabbin lui met son billet de 500 Euros dans la poche et murmure à son oreille :
\"Elle m'a fait une meilleure offre......\"";

     echo "<pre>" . h($text) . "</pre><hr>";

$text="
Moché et Sarah fêtent leurs 25 années de mariage. L'événement est de taille et pourtant Sarah ne semble pas très heureuse. Moché lui demande:
- Sarah, qu'est-ce que tu as ? C'est nos 25 ans de mariage et tu ne parais pas heureuse.
La larme à l'oeil, Sarah chuchote avec des trémolos dans la voix:
- Oh si Moché, je suis heureuse mais c'est que tu vois, Moché, en 25 de mariage, tu ne m'as jamais rien acheté !!
Abasourdi, Moché s'exclame:
- Mais Sarah, tu ne m'as jamais dit que tu avais quelque chose à vendre? ";
echo "<pre>" . h($text) . "</pre><hr>";

?>

</div>
</div>  <!--container-->
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>


