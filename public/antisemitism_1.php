
<?php require_once('../includes/initialize.php'); ?>

<?php $class_name="Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu="links"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>


<div class="row">
    <?php echo $session->message(); ?>
    <?php  echo isset($valid)? $valid->form_errors():"" ?>
</div>



<div class="row">
    <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-5">
        <div class="col-lg-3 ">
    <p>Discours Emmanuel Macron du Vel d'Hiv 17 juillet 2017</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/hB2j5zhXKmg" frameborder="0" allowfullscreen></iframe>
    </div>
        <div class="col-lg-3 col-lg-offset-1">
        <p>Discours Emmanuel Macron Ouradour sur Glane 2017</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/CanRyS9jn2Y" frameborder="0" allowfullscreen></iframe>
    </div>
        <div class="col-lg-3  col-lg-offset-1">
            <p>Alexandre Dujardin</p>

            <div class="fb-video" data-href="https://www.facebook.com/julcoh/videos/10152434170565251/" data-width="3000" data-show-text="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/julcoh/videos/10152434170565251/"><a href="https://www.facebook.com/julcoh/videos/10152434170565251/">Captured by Julien Cohen</a><p></p>Interview <a href="#" role="button">Alexandre Dujardin</a> </blockquote></div></div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-lg-6  col-lg-offset-2"  style="background-color: #ffffd4">
        <p>Rabbi Sacks’ brilliant speech
        <a href="http://www.israelvideonetwork.com/rabbi-sacks-brilliant-speech-on-antisemitism-silenced-the-eu/" class="h"> speech </a>on Antisemitism silenced the EU</p>

    </div>

</div>


<div class="row">
    <div class="col-lg-6  col-lg-offset-2"  style="background-color: #ffffd4">
        <p>Histoire du peuple juif en
            <a href="http://www.odyeda.com/fr/" class="h"> 1 page </a>.</p>

    </div>

</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff">
<!--        <div class="col-lg-12">-->
            <?php
            $text = "<p><strong>L'antisémitisme et les sémites. Bref mémo de Meïr Waintrater.</strong></p>
            
            <p>Meïr Waintrater SUR L'ANTISÉMITISME ET SUR LES «SÉMITES»</p>

            <p>Les mots «antisémitisme» et «sémites» ayant été ici l'objet d'un échange consternant, une mise au point factuelle me semble indispensable.</p>

            <p>1. Le mot «antisémitisme» a été inventé en 1879 par un polémiste allemand antijuif nommé Wilhelm Marr. Il a été utilisé dès le début des années 1880 dans les principales langues européennes. Ce mot a été inventé pour désigner la haine des Juifs, et il n’a jamais servi à désigner autre chose que cela.</p>

            <p>2. Le mot «sémite» désigne un groupe de langues (dont l’hébreu, l’arabe et l’araméen), et non pas des peuples. Englober les Juifs, les Arabes, etc. sous le nom de «sémites» est une pratique qui correspond à la pensée racialisante de la fin du XIXe siècle, et qui n’a pas sa place dans la culture contemporaine.</p>

            <p>3. Bref: ni les Arabes ni les Juifs ne sont des «sémites», et l’antisémitisme ne désigne pas la haine des «sémites». Si les gens veulent perdre leur temps à discuter, qu'ils se trouvent d'autres sujets plus intéressants.</p>";
//            echo "<pre>" . $text . "</pre><hr>";
            echo "" . $text . "<hr>";
?>

    </div>
            <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff">
<?php
                $text="<p><strong>René Bellaiche
January 18, 2016 · Paris, France · 
SUR L'ANTISEMITISME</strong></p>

<p>Antisémitisme est un mot forgé au 19e siècle en Allemagne, probablement pour redorer le blason du vieil antijudaïsme chrétien, terni par les Lumières et le rationalisme alors triomphant. \"Racialiser\" l'antijudaïsme religieux permettait de l'adapter à son temps et de lui donner un nouveau souffle.</p>

<p>Mais les juifs ne sont pas, ou plus, une \"race\", si tant est que les races - pures - existent. Et cet antijudaïsme modernisé et mythique qu'est l'antisémitisme a fini à son tour par perdre son crédit (le nazisme et la Shoah ayant achevé de le discréditer).</p>

<p>C'est alors qu'a commencé à poindre, via la renaissance d'un Etat juif, la troisième mouture de l'antijudaïsme : l'antisionisme, qui ne s'attaque pas au judaïsme en tant que religion ou en tant que \"race\", mais en tant que nation, qu'entité politique.</p>

<p>La passion antijuive renaît toujours, comme le Phénix, de ses cendres, métamorphosée. Son dernier avatar n'est pas le moins dangereux, parce qu'il se veut le plus \"objectif\".</p>";
                        echo "" . $text . "<hr>";


            ?>
        </div>
</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

        <?php
        $text="<p><strong>antisémitisme, racisme, sémite.. ne jouons pas sur les mots !
By Sophie Ernst on Thursday, August 16, 2012 at 2:32pm</strong></p>
<p>A propos des termes \"antisémitisme\", \"sémite\", \"racisme\",\"judéophobie\"... comment se sortir des polémiques sur les mots ? </p>
 
<p>Il y a toujours un petit malin qui fait la remarque : \"un Arabe ne peut pas être antisémite, puisqu'il est lui-même un sémite\". Outre que c'est de mauvaise foi, en général, sauf à traduire une vraie curiosité à base de perplexité, c'est surtout une confusion qui ignore le sens et l'usage de ces mots. 
Alors voici quelques élucidations des termes en question.</p>
 
<p>Sophie Ernst, à la suite d'une énième discussion sur le mur de SPS, 16 août 2012</p>
 
 
 
<p>Ce vieux débat est parfaitement maîtrisable, pas insoluble, mais il faut prendre le temps de développer un peu précisément les explications historiques et linguistiques.  Le terme \"sémitique\" est utilisé d'abord de façon vraiment innocente par des linguistes qui étudient et classent les groupes de langues ( et ici, c'est l'arabe, l'hébreu, l'arméen, etc), et pour  forger le nom de ce groupe, ils empruntent effectivement à une antique référence trouvée dans la Torah, à propos des fils de Shem. Mais à partir de cet usage légitime de classement des langues, c'est tout autre chose qui va se passer au cours de l'histoire du XIXè siècle. Des idéologues développent des pseudo-théories à prétention scientifique sur les \"races\" humaines à partir de vagues connaissances génétiques et biologiques, largement reconnues comme fausses de nos jours ; et ils font un classement de ces races sur une échelle de supériorité. Le \"racisme\" n'est pas, alors, la haine de l'autre mais cette idéologie qui justifie le classement des êtres humains en races pures ou impures, supérieures ou inférieures, leur attribue des vertus ou des \"tares\" héréditaires. La haine des autres a toujours existé, mais le racisme, en tant que -isme, est un phénomène historique récent, lié aux fausses théories issus des nouvelles sciences du XIXè.  De ce point de vue, l'antisémitisme est clairement un des éléments de cette pseudo théorie des races. Ce qui complique un peu c'est que \"racisme\", à partir de ce sens bien précis, a été beaucoup utilisé, notamment pour désigner le racisme aux Etats-Unis à l'égard des \"niggers\", des blacks, justement parce qu'il y avait dans l'esclavage des théories de justification par les   \"races inférieures\" et les \"races supérieures\". On l'a aussi employé pour désigner le rapport aux colonisés, supposés \"inférieurs\", selon les mêmes idéologies. De là, le terme a survécu à la disparition contemporaine du discours sur l'inégalité des races. Quelqu'un qui soutiendrait aujourdhui des théories raciales passerait pour cinglé, pas seulement pour dégueulasse. C'esst pourquoi la nouvelle extrême droite a troqué son discours pour une théorie de la différence des cultures. Aujourd'hui, racisme est couramment employé pour signifier la haine de l'autre, quel qu'il soit, la xénophobie, de xénos, étranger, et phobie, peur, aversion, soit la haine de l'étranger, même si cet \"étranger\"est notre concitoyen. </p>
 
<p>Ethel, Aurélien et les autres ont absolument raison, on se tue à le répéter, mais je vais développer, parce qu'on ne s'en tire pas forcément à coup de dictionnaire. Les concepts ne sont pas tous de même nature, et on a là un concept qui réfère à une réalité sociale- historique, on ne peut faire abstraction de l'histoire pour le comprendre, dans ce qu'il veut dire, et dans ce qu'il recouvre comme réalités. L'étymologie n'apprend rien, sinon que les utilisateurs du mot ont voulu avoir l'air \"savants\", les antisémites ont été non seulement des haineux, mais aussi des prétentieux qui s'imaginaient détenir une vision totale de l'histoire, expliquant la grandeur et le déclin des civilisations par une théorie délirante à base de pouvoir occulte et de biologie. \"Antisémite\" est un mot qui n'existe pas durant les longs siècles d'antijudaïsme et de persécution des Juifs que décrit Poliakoff. Il apparait au XIXè siècle, et il se pare d'une prétention savante, en faisant signe vers les nouvelles théories linguistiques. A ce moment-là, on se dit soi-même antisémite, ce n'est pas péjoratif mais proclamé comme une opinion politique. Comme l'a rappelé Aurélien, c'est incompréhensible hors de l'histoire moderne, de l'assimilation, des théories socio-biologiques qui se développent dans la foulée du darwinisme. On commence à fantasmer sur la \"race\" juive et ses tares héréditaires justement parce qu'elles sont cachées, et qu'il faut savoir reconnaitre le juif torve, comploteur, cupide, dans le voisin qui a l'air, mais seulement l'air, tellement normal que vous pourriez laisser votre fille l'épouser, alors que son hérédité parasiterait la vôtre ; ça c'est pour le délire proprement raciste, à base de théorie raciale, qui vise le juif en Allemagne et en France. A ce moment-là, l'Arabe, qui est avant tout un oriental lointain, est lui aussi placé dans la catégorie des races inférieures, à coloniser, il fait donc l'objet d'un racisme, mais ça n'a rien à voir, ce n'est en aucune façon de l'antisémitisme, qui est vraiment l'obsession du voisin juif, à la fois capitaliste et bientôt bolchevik, \"parasite\" vivant en symbiose au sein de la race pure et la suçant, la polluant au point de la dégénérer ; race sournoise, au projet de domination caché, race invisible qui prend les formes les plus trompeuses de la normalité et qu'il faut savoir reconnaître à quelques signes discrets. Alors, on peut toujours continuer à jouer sur les mots \"sémite\", mais c'est simplement ignorer l'histoire. \"Antisémitisme\", le terme réfère à une réalité historique précise, qu'on ne peut pas transformer à sa guise sauf à pédaler dans le yaourt. C'est aussi pour cette raison que beaucoup préfèrent parler, aujourd'hui, de judéophobie pour désigner l'hostilité observée   de nos jours envers les Juifs, notamment en milieu musulman, pour distinguer cette obsession haineuse de l'antisémitisme européen né au XIX siècle, avec les caractéristiques bien précises qu'il a pris alors. Pierre-André Taguieff a bien expliqué pourquoi il utilisait ce néologisme. Ce qui complique les choses est que l'anti-judaïsme traditionnel ( chrétien, catholique, protestant ou orthodoxe, ou musulman... ) peut aussi adopter des thèses modernistes empruntées au répertoire antisémite, avec ses immondes classiques, les protocoles des sages de Sion, Mein Kampf... Lorsque la judéophobie pas forcément très virulente, parfois superficielle, issue de préjugés religieux traditionnels, sur lesquels s'est greffée l'obsession haineuse d'Israël et des Juifs du monde entier, en finit par adopter des thèses complotistes où le \"Sionisme\" est fantasmé comme autrefois le Pouvoir juif occulte des financiers capitalistes suceurs de sang, alors la judéophobie a tendance à s'enraciner aussi comme antisémitisme : mais ça suppose un embrigadement idéologique assez poussé, avec une diffusion hélas bien amorcée des classiques tels que Mein Kampf. </p>
 
<p>A ce propos encore un mot : le délire racial- raciste des idéologues nazis était précis, comme délire. Du coup, il y avait des contradictions, notamment au sujet des tsiganes ; certes, la population allemande et les nazis n'étaient pas vraiment favorables à ces nomades méprisés ; sauf qu'en théorie ce sont les Aryens les plus hauts de la hiérarchie. D'où des fluctuations dans la politique menée, qui leur a quand même réservé pas mal de persécutions, quoique, paradoxalement, moins systématiquement qu'aux Juifs : encore une fois, le Juif le plus dangereux n'est pas le pouilleux, mais le voisin de palier qui vous ressemble comme deux  gouttes d'eau - le mythe cinématographique de l'Alien rend bien compte de cette phobie antisémite. En revanche, on a tort de dire que les nazis allaient exterminer tout le monde. L'autre grand projet d'Hitler, outre l'extermination de la race juive, était un projet de colonisation, la conquête de\" l'espace vital\", où les races inférieures à la race des Seigneurs aryens seraient réduites à l'esclavage, ou soumises à obéissance, avec plus ou moins d'autonomie selon leur pureté et leur niveau dans l'échelle des races. Selon ces théories, les Slaves étaient beaucoup plus bas que les Français, mais pouvaient être réduits en esclavage, alors que les Juifs devaient être éliminés jusqu'au dernier. </p>
 
 
<p>Dire que l'antisémitisme est différent, comme réalité et comme concept, de l'anti-judaïsme traditionnel de la chrétienté, ou de la judéophobie contemporaine qui se développe dans les pays musulmans, ou du racisme anti-noir ou anti-arabe, ou de la xénophobie, ce n'est pas pour hiérarchiser les haines sur une échelle du plus ou moins grave, du plus ou moins répréhensible, du plus ou moins dangereux. Absolument pas. Mais ça ne fonctionne pas pareil et ça c'est très important pour des raisons pratiques, ce n'est pas par goût oiseux des petites nuances sémantiques raffinées ! on a affaire à des variantes historiques, et si on veut lutter contre ces fléaux, il vaut mieux connaître leur logique exacte. On pourrait dire que ce n'est pas le même scénario, et du coup, à chaque fois, pas le même type de clientèle, de psychologie, de manifestations, de contre-poison.  </p>";
        echo "" . $text . "<hr>";

        ?>
    </div>
    </div>



    </div>







    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>



<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>


