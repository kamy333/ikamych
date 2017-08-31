<?php require_once('../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "links"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">

    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <?php

        $text = "Le 26 avril 2012, Claude Askolovitch publie une tribune violente dans Marianne où il traite le président du CRIF Richard Prasquier, de « salaud » pour n’avoir, selon lui, pas condamné le score élevé de Marine Le Pen au premier tour de l’élection présidentielle dans un article paru dans le journal israélien Haaretz.
« Il est incapable, dans un texte adressé à un journal israélien, de condamner la violence faite à la France quand un leader politique est considéré comme « normal » en ne détestant que les musulmans. Incapable de dire que notre pays est malade, même quand les juifs ne sont pas les premières cibles (…) Il a oublié que des jeunes juifs, dans les années 80, fondaient SOS racisme avec des militants beurs et de gauche (…) Richard Prasquier ne comptabilise que les injures faites aux siens. Seuls ses morts valent un Kaddish. Il se s’alarme que si les juifs sont touchés (…) la morale et la raison de Prasquier s’arrêtent aux portes du ghetto (…) Aujourd’hui, la détestation des musulmans, subreptice ou revendiquée, grimée de laïcité ou affichée en haine de l’autre, fait partie du débat public, Marine Le Pen le démontre, un certain sarkozysme s’en est emparé, Richard Prasquier le confirme. Sartre écrivait également de belles choses sur les salauds qui détournent la tête quand le mal court. Le ghetto aussi compte ses salauds »,";
        echo "" . $text . "<hr>";
        ?>
    </div>

    <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-5">
        <div class="col-lg-3 ">
            <p>Discours Emmanuel Macron du Vel d'Hiv 17 juillet 2017</p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/hB2j5zhXKmg" frameborder="0"
                    allowfullscreen></iframe>
        </div>

        <div class="col-lg-3 col-lg-offset-1">
            <p>Discours Emmanuel Macron Ouradour sur Glane 2017</p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/CanRyS9jn2Y" frameborder="0"
                    allowfullscreen></iframe>
        </div>
        <div class="col-lg-3  col-lg-offset-1">
            <p>Alexandre Dujardin</p>

            <div class="fb-video" data-href="https://www.facebook.com/julcoh/videos/10152434170565251/"
                 data-width="3000" data-show-text="true">
                <div class="fb-xfbml-parse-ignore">
                    <blockquote cite="https://www.facebook.com/julcoh/videos/10152434170565251/"><a
                                href="https://www.facebook.com/julcoh/videos/10152434170565251/">Captured by Julien
                            Cohen</a>
                        <p></p>Interview <a href="#" role="button">Alexandre Dujardin</a></blockquote>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-lg-6  col-lg-offset-2" style="background-color: #ffffd4">
        <p>Rabbi Sacks’ brilliant speech
            <a href="http://www.israelvideonetwork.com/rabbi-sacks-brilliant-speech-on-antisemitism-silenced-the-eu/"
               class="h"> speech </a>on Antisemitism silenced the EU</p>

    </div>

</div>


<div class="row">
    <div class="col-lg-6  col-lg-offset-2" style="background-color: #ffffd4">
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
        $text = "<p><strong>René Bellaiche
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

        $text = "il y a eu des juifs à l'origine qui se sont convertis aux christianisme et qui ont participé à des exactions contre leurs communautés. Pareil pour les pays musulmans ou des juifs se sont convertis à l'Islam et ne sont pas tendre et pensent \"que les juifs sont pervertis\". J’en connais un personnellement. Et puis de nos jours lorsque on est athée et qu’on veut se détacher on ne va pas se convertir mais on essaie de saboter tout ce qui vient de son identité par ex Ce renier peut se trouver dans toutes les cultures , ce n’est pas que chez les juifs.

un résumé entendu sur ce sujet
L’antisémitisme a connu 3 phases dans l’histoire, en premier il est religieux , puis par la racialisation qui va jusqu’à son apogée avec le nazisme et enfin de nos jours à cause de son état. 
Pourquoi antisionisme c’est de l’antisémitisme car après la shoah on haït encore pour certains les juifs mais il est difficile de le justifier en public. Toujours dans l’histoire les personnes cherchent à justifier leur antisémitisme se sont cachés derrière les plus hautes autorités d’une culture. Au moyen-âge c’est la religion ,donc on avait le leitmotiv religieux anti-juifs . Puis le siècle des lumières , c’est la science , avec la fondements de l’idéologie Nazi le darwinisme social et les études « scientifiques » des races. De nos jours la plus haute autorité dont on se réfère sont les droits de l’homme. C’est pourquoi Israël ,une démocratie, la seule au MO avec une presse libre, un système judiciaire indépendant est régulièrement accusé des 5 grands péchés des droits de l’homme « racisme, apartheid ,crimes contre humanité, purification ethnique ou génocide ». Le nouveau antisémitisme a muté de sorte que ceux-là même vont renier qu’ils le sont et nous dire qu’ils n’ont rien contre les juifs ou le judaïsme, mais seulement contre le pays Israël, l’entité politique. Alors dans un monde avec 56 pays musulmans et 103 pays chrétiens il y en a un juif constituant ¼ de 1% de la population du MO et pourtant Israël est le seul des 193 pays membres des nations unis dont son droit à l’existence est remis en question régulièrement en tête l’Iran et pleins d’autres groupes engagé à le détruire. L’antisémitisme c’est renié aux juifs les même droits que l’on accorde aux autres et sa forme actuelle c’est l’antisémitisme. Il y a un bien évidemment une différence entre le judaïsme et le sionisme, entre juifs et israéliens mais cette différence n’existe que pour les juifs mais pas pour les antisémites car ce ne sont pas les israéliens victimes de Toulouse l’école juive ou l’hyper cachère à Paris qui sont assassinés etc. mais bien des juifs... Antisionisme est l’antisémitisme de notre temps. Au moyen-âge on accusait les juifs d’empoisonner les puits, diffuser la peste et tuer des enfants chrétiens pour utiliser le sang.
Avec le 19eme siècle et le nazisme on accuse les juifs de contrôler le capitalisme aux USA et le communisme Russe. Aujourd’hui on les accuse d’être derrière Daech ou les USA, d’empoisonnement des eaux des palestiniens et de donner des bonbons empoisonnés à des enfants afin de les tuer, On a ici tous les vieux mythes recyclés , calomnie du sang versé aux protocoles des sages de Sion . Les caricatures dans les journaux dans les pays arabes des juifs ou israéliens sont des répliques de l’époque antisémite du nazisme entre 1933 ou 1945. 

Bref on peut en discuter à n’en pas finir mais bien sûr vous ne croyez pas à tout ce que j’énonce mais je suis sûr que vous vous retrouvez dans certains points d’un antisémitisme déguisé. Si j’ai fait l’effort d’écrire c’est que Maggy a fait l’effort et tenter d’expliquer votre exclusion donc j’essaie même si d’avance je sais ne pas vous convaincre la raison de vous considérer antisémite. 

Est-ce que la colonisation est condamnable ? oui Est-ce un gouvernement de droite ? peut-on critiquer ?oui 

En tous les cas entre votre discours ou celui des Islamistes ou des militants actifs du BDS et qui prend une telle ampleur en Europe, on se dit que pour les juifs heureusement qu’Israël existe , car oui c’est aussi un état refuge.";
        echo "" . $text . "<hr>";
        ?>
    </div>

    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <a href="http://www.cgt.fr/IMG/pdf/2017_extremedroite_n14_fiche_fc_rc.pdf">cgt</a>
        <?php
        $text = "\"Il y a en France une tradition antisémite ancienne et ancrée qui, comme le racisme, traverse toute la société et tous les courants politiques, y compris à gauche.\"
[...]
\"ANTISÉMITISME ET RACISME : DEUX IDÉOLOGIES DE HAINE, MAIS AVEC CHACUNE LEUR LOGIQUE PROPRE
Si historiquement le racisme et l’antisémitisme se sont construits en visant des minorités différentes (l’ensemble des populations « non occidentales » pour le premier, les Juifs pour le second), la vraie différence réside dans la manière d’appréhender ces minorités. Le racisme est une idéologie de l’exploitation et de l’inégalité : certaines populations sont jugées inférieures, et à ce titre sont surexploitées, économiquement et socialement. La logique antisémite présente quant à elle les minorités ciblées comme des « corps étrangers », des parasites, à qui l’on prête une volonté de domination et l’origine des problèmes d’une société. C’est donc une logique complotiste et d’extermination : il faut se débarrasser des catégories mises en cause, qui n’auraient aucune place dans la société et dont l’existence même est posée comme problématique.
Faire des distinctions ne revient pas à faire une hiérarchie : toute atteinte à l’égalité et aux droits humains doit être combattue ; et il n’est pas besoin pour cela de faire des comparaisons, les faits suffisent. Mais pour lutter efficacement contre un phénomène, pour l’identifier précisément, il faut en comprendre les logiques et les conséquences.\"
 <a href=\"http://www.cgt.fr/IMG/pdf/2017_extremedroite_n14_fiche_fc_rc.pdf\">cgt</a>
Via Logan Shafir
www.cgt.fr
CGT.FR
";
        echo "" . $text . "<hr>";
        ?>
    </div>

    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

        <?php
        $text = "<p><strong>antisémitisme, racisme, sémite.. ne jouons pas sur les mots !
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

<div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

    <?php
    $text = "<strong>L.F. Céline / L'École des cadavres, Paris, 1938, p. 151</strong><br>
NB/ je connais encore quelques non juifs et quelques juifs qui continuent d'encenser le talent, que dis-je... le \"génie\" (!?) de cette ordure qui se croyait si malin et inventeur d'un style* (*dont on remarque ici d'ailleurs l'extrême pauvreté)...<br>
\"Les juifs, racialement, sont des monstres, des hybrides, des loupés tiraillés qui doivent disparaître. Dans l'élevage humain, ce ne sont, tout bluff à part, que bâtards gangrèneux, ravageurs, pourrisseurs. Le juif n'a jamais été persécuté par les aryens. Il s'est persécuté lui-même. Il est le damné des tiraillements de sa viande d'hybride […]<br>
Je me sens très ami d'Hitler, très ami de tous les Allemands, je trouve que ce sont des frères, qu'ils ont bien raison d'être racistes. Ça me ferait énormément de peine si jamais ils étaient battus. Je trouve que nos vrais ennemis c'est les Juifs et les francs-maçons. Que la guerre c'est la guerre des Juifs et des francs-maçons, que c'est pas du tout la nôtre. Que c'est un crime qu'on nous oblige à porter les armes contre des personnes de notre race, qui nous demandent rien, que c'est juste pour faire plaisir aux détrousseurs du ghetto. Que c'est la dégringolade au dernier cran de la dégueulasserie\".
";
    echo "" . $text ;

    ?>

</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <?php
        $text = "<strong>REPONSE A UN AMI DISTINGUANT L'ANTISIONISME DE L'ANTISEMITISME</strong>
        <p>Le mot \"sioniste\" est employé aujourd'hui à tort et à travers pour signifier exactement ce que le mot\" juif\" signifie dans la bouche ou sous la plume de l'antisémite : le tort et le travers, justement, c'est-à-dire le Mal. L'antisémitisme, \"grillé\" par le nazisme et la Shoah, a refait surface depuis quelques décennies sous une appellation différente et se voulant justement sans rapport aucun avec l'antisémitisme, dépourvu de la moindre hostilité envers les juifs en tant que peuple, \"race \"ou religion. Sa grande astuce étant d'enrôler des intellectuels juifs en mal de notoriété pour lui servir de caution : des juifs sont antisionistes, donc l'antisionisme n'est pas antijuif. Syllogisme qui ne trompe que les dupes, mais ils sont nombreux et influents, et l'imposture a fait flores. Heureusement, tout a une fin, et son succès même et ses inévitables excès sont en train de lui arracher son masque et de mettre au jour sa véritable identité : l'antisémitisme pur et dur.</p>
        <p>Il n'y a aucune raison quand on dénonce la politique d'un pays de se proclamer anti-quelque chose, par exemple, s'il s'agit de la France, antifranciste : il suffit de dire qu'on est contre sa politique, ou contre le dirigeant qui la conduit et l'incarne. Israël est le seul pays dont l'opposition à sa politique porte un nom, ce qui en fait une opposition en soi, et non à une politique. Bref, ceux qui dénoncent la politique israélienne en se proclamant antisionistes ne dénoncent pas la politique d'Israël mais, implicitement, son existence. La majorité des juifs du monde habitant Israël, et cet Etat étant aux juifs ce que l'Etat du Vatican est aux chrétiens, l'antisionisme est donc objectivement le refus de l'existence de 7 millions de juifs et du centre de la judéité, qui pourrait conduire, si les circonstances s'y prêtaient, à la destruction de l'Etat hébreu et de ses habitants, c'est-à-dire à une nouvelle Shoah.
            Il est tout à fait permis, et même nécessaire, de critiquer la politique israélienne, le \"grignotage \"de la Cisjordanie et tout ce qu'on voudra, mais à condition que cette critique porte sur des aspects précis, parce que, imprécise, sous le nom d'antisionisme, elle est forcément globale, c'est-à-dire essentielle, et ne peut porter que sur l'être même de l'Etat juif.</p>";
        echo "" . $text . "<hr>";

        ?>
    </div>

    <div class="row">
        <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-5">
            <div class="col-lg-3 ">
                <p>Left antisemitism in Britain</p>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/te684rBHzOA" frameborder="0"
                        allowfullscreen></iframe>
            </div>

            <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
                <?php

                $text = "<strong>INTERNATIONAL DEFINITION OF ANTISEMITISM</strong>
Antisemitism is a certain perception of Jews, which may be expressed as hatred toward Jews. Rhetorical and physical manifestations of antisemitism are directed toward Jewish or non-Jewish individuals and/or their property, toward Jewish community institutions and religious facilities.<br>
Manifestations might include the targeting of the state of Israel, conceived as a Jewish collectivity. However, criticism of Israel similar to that levelled against any other country cannot be regarded as antisemitic. Antisemitism frequently charges Jews with conspiring to harm humanity, and it is often used to blame Jews for “why things go wrong.” It is expressed in speech, writing, visual forms and action, and employs sinister stereotypes and negative character traits.<br>
Contemporary examples of antisemitism in public life, the media, schools, the workplace, and in the religious sphere could, taking into account the overall context, include, but are not limited to:
Calling for, aiding, or justifying the killing or harming of Jews in the name of a radical ideology or an extremist view of religion.<br>
Making mendacious, dehumanising, demonising, or stereotypical allegations about Jews as such or the power of Jews as collective — such as, especially but not exclusively, the myth about a world Jewish conspiracy or of Jews controlling the media, economy, government or other societal institutions.<br>
Accusing Jews as a people of being responsible for real or imagined wrongdoing committed by a single Jewish person or group, or even for acts committed by non-Jews.<br>
Denying the fact, scope, mechanisms (e.g. gas chambers) or intentionality of the genocide of the Jewish people at the hands of National Socialist Germany and its supporters and accomplices during World War II (the Holocaust).<br>
Accusing the Jews as a people, or Israel as a state, of inventing or exaggerating the Holocaust.<br>
Accusing Jewish citizens of being more loyal to Israel, or to the alleged priorities of Jews worldwide, than to the interests of their own nations.<br>
Denying the Jewish people their right to self-determination (e.g. by claiming that the existence of a State of Israel is a racist endeavour).<br>
Applying double standards by requiring of Israel a behaviour not expected or demanded of any other democratic nation.<br>
Using the symbols and images associated with classic antisemitism (e.g. claims of Jews killing Jesus or blood libel) to characterise Israel or Israelis.<br>
Drawing comparisons of contemporary Israeli policy to that of the Nazis.<br>
Holding Jews collectively responsible for actions of the state of Israel.﻿
";
                echo "" . $text . "<hr>";


                ?>
            </div>




        </div>
    </div>


    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


