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

<h1 class="text-center">Antisemitisme</h1>



<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>
<div class="row">
    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F151446978204%2Fvideos%2F10156026457398205%2F&show_text=0&width=560"
                width="560" height="409" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                allowTransparency="true" allowFullScreen="true"></iframe>
    </div>


    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        $link = "<a href='#'></a>";
        $img = " <img src=\" \" alt=\" \">";
        $text = $link . "POURQUOI N'AIME-T-ON PAS LES JUIFS ?\"
DELPHINE HORVILLEUR

Delphine HORVILLEUR est rabbin du Mouvement juif libéral de France (MJLF) et directrice de la rédaction de « Tenou'a » (www.tenoua.org). Elle a publié, avec Rachid Benzine, « Des mille et une façons d'être juif ou musulman » (Seuil). BALTEL/SIPA
Parce qu'ils ne sont pas Gentils », disait Jacques Lacan. Ce jeu de mots pose avec humour une question fondamentale : celle de la pérennité du mal. Qu'est-ce qui fait qu'à travers le temps jamais cette haine ne s'épuise, et qu'elle renaisse toujours, tel un Phénix, des cendres de l'Histoire ? Nul ne peut commencer à y répondre s'il n'admet d'abord la spécificité de l'antisémitisme : la haine des juifs n'est jamais un racisme ordinaire.
Là où le raciste, convaincu de sa supériorité physique, culturelle ou morale, fait de l'autre un « moins que lui », l'antisémite souffre souvent au contraire d'un étrange complexe d'infériorité.
Il reproche au juif d'être là où lui-même aurait « dû » être, d'avoir usurpé une place confortable qui aurait « dû » être la sienne, d'avoir comploté pour au final être un peu mieux loti que lui... ou parfois même d'avoir un peu trop souffert au point d'éclipser sa propre douleur, moins « grandiose ». Bref, le juif est souvent pour l'antisémite celui qui « est » ou celui qui « a » ce qu'il aurait dû être ou avoir. Et cette jalousie viscérale, cette envie ancestrale, reste étonnamment en vie dans ce qu'on nomme aujourd'hui le « nouvel antisémitisme ». Sa nouveauté n'est nulle part si ce n'est peut-être dans une revendication plus directe de la part de certains antisémites d'appartenir à un groupe discriminé, qui leur tient lieu de profond support identitaire.
Et voilà comment certains passent à l'acte comme s'ils vengeaient d'abord une injustice, comme s'il s'agissait presque d'une légitime défense. Obscène renversement des responsabilités qui fait que l'agressé, peu importe son âge, est perçu comme pas tout à fait innocent aux yeux de son agresseur. Et ce dernier est un peu moins coupable, pense-t-il, au nom d'humiliations sociales, coloniales, ou même proche-orientales (!) qu'il convoque comme autant de douleurs qu'il se charge héroïquement de venger.
Me revient en mémoire un étrange fait divers. En 2016, plusieurs jeunes agressent violemment un homme à Bussy-Saint-Georges, parce qu'ils le croient « juif et donc riche ». La police retrouve un SMS sur le téléphone d'un des agresseurs : « Les juifs, je les ais », écrit-il avec une faute d'orthographe. Une haine qui dit bien son nom : la conviction que l'on n'a pas ce que l'autre a. Une jalousie, en un mot, à l'égard de celui qui vient incarner mon manque et mon incomplétude.
Pas surprenant, dès lors, que l'antisémitisme prospère toujours là où l'armature et le lien social se fissurent. Il s'agit toujours de consolider une identité sur le dos d'un autre, de rendre cet autre coupable de la faille existentielle avec laquelle il est si fatigant de vivre. Et au final de se défausser sur lui de toute responsabilité personnelle, qui disparaîtra en même temps que celui qui dorénavant l'incarne.
Voilà comment dans l'Histoire, le juif fut tour à tour accusé d'être un peu trop bourgeois ou un peu trop révolutionnaire, d'être trop riche ou bien de vivre aux dépens d'un autre, d'être un peu trop viril ou trop féminin, obsédé par le sexe ou apathique, un peu trop visible ou à l'inverse beaucoup trop discret et indiscernable, bref d'être tour à tour une chose et son contraire.
C'est exactement ce qu'énonce déjà dans la Bible le plus célèbre des antisémites. On le croise dans le Livre d'Esther sous les traits d'un homme nommé Haman, un conseiller à la cour d'un souverain perse. Haman hait les juifs, rêve de les anéantir et leur reproche d'« être disséminé[s] au coeur de la nation [...] mais d'être à part de toutes les autres nations » (Esther 3.😎. Dans la Bible, ce « Gentil », qui ne l'est pas du tout, reproche précisément aux juifs d'être un peu trop comme les autres et pas assez comme les autres, à la fois à part et indiscernable.
En un temps de communautarisme où les « identités » se consolident les unes contre les autres, rien d'étonnant à ce que les mêmes arguments resurgissent. Si le juif incarne ce qui dans la nation tolère la faille et le mélange, c'est-à-dire une certaine porosité du monde, le haïr permet de s'imaginer que l'on peut exister sans l'autre.g";
        echo "" . $text . "<hr>";
        //                          echo "" . ebook($link,$text,4) . "<hr>";
        ?>
    </div>

    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        $link = "<a href='http://www.slate.fr/story/159637/antisemitisme-gauche-francaise-europeenne-juifs-israel'>antisemitisme-gauche-francaise-europeenne-juifs-israel</a>";
        $img = " <img src=\" \" alt=\" \">";
        $text = $link . "";
        echo "" . $text . "<hr>";
        //                              echo "" . ebook($link,$text,4) . "<hr>";
        ?>
    </div>

    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

        <?php
        $link = "<a href='#'></a>";
        $img = " <img src=\" \" alt=\" \">";
        $text = $link . "
   <p> <span style='color: blue'> René Bellaiche</span> La liberté d'expression s'arrête où commence l'expression de la haine, liberticide par essence. Il ne faut pas se résigner, mais utiliser tous les moyens légaux possibles pour s'opposer à cette réédition. Cette \"littérature\" est aussi dangereuse pour l'esprit que les drogues dures pour le corps.</p>
    
     <p> <span style='color: blue'> René Bellaiche</span> L'\"art\" n'est pas une valeur en soi : tuer avec... art ne change rien au caractère criminel du meurtre. Nous payons les conséquences de la sacralisation de l'art, devenu l'ersatz du sacré depuis la \"mort\" de Dieu.</p>
     
     <p> <span style='color: blue'> René Bellaiche</span> La morale doit primer l'art sur l'échelle des valeurs, ou alors il faut faire son deuil de la civilisation.</p>
    ";
        echo "" . $text . "<hr>";
        ?>
    </div>


    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <?php
        $text = "<a href='https://www.letemps.ch/opinions/2009/04/20/antiracisme-devoye-perversion-mots'>Opinions  L’antiracisme dévoyé par la perversion des mots</a>";
        $text .= "

<br> 
Jean-Claude Buhrer
Publié lundi 20 avril 2009 à 00:43.
OPINION
L’antiracisme dévoyé par la perversion des mots

Jean-Claude Buhrer, ancien correspondant du «Monde» à l’ONU, constate que la manipulation langagière conduit à vider les droits de l’homme de leur sens premier
<br> 

«Quand une société se corrompt, c’est le langage qui se gangrène en premier», disait Octavio Paz, prix Nobel mexicain de littérature. A en juger par les tiraillements récurrents qui ont émaillé ses travaux préparatoires et les incertitudes qui auront subsisté jusqu’à la dernière minute, ce propos pourrait fort bien s’appliquer à la Conférence de suivi contre le racisme, dite Durban 2, qui s’ouvre aujourd’hui au Palais des nations à Genève, sans que personne ne se hasarde à en prédire l’issue en fin de semaine. C’est que la conférence proprement dite de Durban, entachée par des débordements antisémites et d’inquiétantes dérives verbales, n’a pas fini de laisser des traces et l’ONU est encore loin d’en avoir amorti le choc.
<br>
Déjà au cours des travaux préparatoires, le groupe islamique s’était employé à gommer toute référence à cette forme particulière de racisme qu’est l’antisémitisme, lui opposant systématiquement les néologismes «anti-arabisme» et «islamophobie», de création récente, afin de vider le terme de son sens communément admis. Prétextant que «les Arabes constituent la majorité écrasante des Sémites», ses représentants n’ont pas hésité à avancer une proposition visant à «combattre les pratiques sionistes contre le sémitisme.» Commentaire d’un observateur: «Les tentatives visant à amputer l’antisémitisme de son plein sens ne sont pas uniquement antisémites, elles sont aussi antisémantiques.» En même temps, plusieurs paragraphes participaient d’une tentative de banalisation de la Shoah. «Par une manipulation du langage, notait un diplomate, on assiste à une entreprise de relativisme historique, visant à dénigrer la réalité du génocide perpétré par les nazis.»
<br>
De plus, sans reculer devant l’amalgame, un discours unilatéral s’est acharné à plaquer sur le Proche-Orient les schémas en usage en Afrique du Sud à l’époque de l’apartheid – ce qui est aussi une insulte à ses victimes, et s’est fait au détriment de toute autre cause. Ainsi détournés de leur sens originel, les mots ne veulent plus rien dire, jusqu’à en perdre toute signification de par leur banalisation. Devant ces dérapages, il aura fallu une ferme intervention du président de la Commission des droits de l’homme du Rwanda pour rappeler la singularité de chacun des mots shoah, apartheid ou génocide rwandais, autant d’armes contre «le révisionnisme, le négationnisme et la minimisation».
<br>
Comme si les dérapages de Durban n’avaient servi à rien, les mêmes travers ont refait surface lors de la préparation de la conférence de suivi. D’ailleurs, la haut-commissaire, Navanethem Pillay, a elle-même reconnu que les objectifs fixés à Durban n’ont pas été atteints. Durban I n’a pas réussi à empêcher les 300 000 morts du Darfour, la poursuite des tueries au Sri Lanka, ni les conflits qui ravagent la République démocratique du Congo et qui tuent «plus de personnes tous les six mois que le tsunami de 2004», selon l’Unicef. Sans parler des multiples victimes du racisme à travers le monde qui peuvent toujours attendre.
<br>
Les principales pierres d’achoppement demeurent la mise en accusation d’Israël et la diffamation des religions, chevaux de bataille préférés de l’Organisation de la conférence islamique (OCI). Fer de lance de cette remise en cause des acquis de la laïcité et d’intrusion de la religion à l’ONU, le mot «islamophobie», introduit pour la première fois dans un texte onusien à Durban. Selon ce terme, développé en Iran sous le régime khomeinyste afin de museler ses adversaires et d’étouffer toute critique, est «islamophobe» celui qui conteste la lapidation des femmes adultères ou d’autres châtiments corporels, ainsi que les dispositions prévues par la charia. Sous couvert de lutte contre la diffamation des religions, l’OCI cherche à faire passer de nouvelles normes anti-blasphème – celui-ci étant assimilé à du racisme – remettant en cause l’universalité des droits de l’homme et restreignant la liberté d’expression. Or, les droits de l’homme s’appliquent aux individus, et non aux religions ou croyances.
<br>
Faute de pouvoir agir sur la réalité bien réelle du racisme, un comité ad hoc, présidé par l’ambassadeur d’Algérie, a été chargé de rédiger des normes complémentaires sur le racisme. Insistant lourdement sur la diffamation des religions, ce comité a donné une nouvelle définition de l’antisémitisme, «d’abord dirigé contre les Arabes et, par extension, contre tous les musulmans». Dans la foulée, l’OCI a fait adopter une modification du mandat du rapporteur sur la liberté d’expression, désormais chargé de faire la chasse à ceux qui en abusent.
<br>
Cette novlangue à la manière d’Orwell a sans doute encore de beaux jours devant elle avec la présence à la conférence du président iranien, sans compter les émissaires de toutes les dictatures coalisés pour imposer leur loi commune. A force de concessions dans le but de ne pas rompre un dialogue impossible, les démocraties n’ont plus qu’à bien se tenir…
<br>

\"";
        echo "" . $text . "<hr>";
        ?>
    </div>
</div>


<div class="row">
    <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


        <?php
        $text = "<a href='http://www.europe1.fr/politique/valls-insulte-par-melenchon-je-le-connais-bien-cest-parfaitement-maitrise-3461990'>Europe1 Valks</a>";
        $text .= "";
        echo "" . $text . "<hr>";
        ?>
    </div>
    <div class="col-lg-10 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
        <?php
        $text = "<a href='#'></a>";
        $text .= "Élisabeth Badinter - Antisémitisme - \"Ne laissez pas les juifs mener seuls ce combat\"

La philosophe Élisabeth Badinter s’émeut de la non-mobilisation face aux violences antisémites des dix dernières années. Et analyse les changements politiques qui l’expliquent.<br>
Au cours des dernières décennies, vous ne vous êtes jamais exprimée publiquement -que ce soit sous forme d’entretien ou de texte- sur la question de l’antisémitisme. Pourquoi le faire aujourd’hui?<br><br>

Ce qui m’a décidée, c’est ce qui s’est passé avec Sarah Halimi. Le silence médiatique et politique qui a entouré le martyr de cette femme [NDLR: rouée de coups pendant une heure puis défenestrée au cri d' »Allahou Akbar » la nuit du 4 avril dernier] m’a énormément perturbée.<br>
Je n’ai pas compris comment, en France, on a pu passer sous silence pendant deux longs mois un acte aussi atroce. Je n’ai pas compris que les premiers articles de fond et enquêtes -en dehors de la presse communautaire- n’aient paru qu’à la fin de mai. Oui, c’est cela qui m’a menée à une réflexion profonde, puis à une prise de parole dont je n’avais pas nécessairement envie jusqu’alors. J’y étais réticente, car je ne veux en aucune sorte porter ombrage à mon pays vis-à-vis de l’étranger.<br>
Je sais à quel point la presse américaine, notamment, est friande des condamnations successives et excessives de la France sur cette question. Cela me désole, car la France n’est pas antisémite. Néanmoins, après Sarah Halimi, oui, j’ai ressenti le besoin de parler. 
<br><br>
Réticente jusqu’à présent à s’exprimer sur l’antisémitisme en France, Elisabeth Badinter a éprouvé le « besoin de parler après le meurtre de Sarah Halimi », en avril, et le silence de la communauté nationale qui a suivi.
afp.com/Loic Venance<br><br>

Concernant cet assassinat, justement, certains expliquent le silence par la prudence: la charge d’antisémitisme n’avait à l’époque pas été retenue par le procureur -le parquet a demandé, depuis, que l’acte soit requalifié… Qu’en pensez-vous?<br><br>

La prudence est le propre de la justice. Mais ma question est simple: pourquoi la presse n’a-t-elle pas enquêté, sans a-priori? Pourquoi n’a-t-on pas entendu les hommes et femmes politiques « demander des réponses », eux qui savent généralement si bien le faire? Enfin, les premiers éléments montraient qu’une femme de 65 ans avait été rouée de coups, défenestrée, que les témoins avaient entendu des choses comme « c’est pour venger mon peuple »…
Et la presse n’enquête pas? Ne va pas interroger le voisinage? A ce point de silence, c’est qu’on a choisi de ne pas enquêter! Au départ, j’ai même cru que c’était une « fake news », tellement le crime était énorme et tellement personne n’en parlait. Certains m’ont également expliqué que le meurtre avait eu lieu quinze jours avant la présidentielle, et que médias comme politiques ne voulaient pas rejouer l’épisode du fait divers ultraviolent qui avait influencé la fin de la campagne de 2002 [NDLR: le passage à tabac d’un retraité]. Désolée, mais cela ne me suffit pas… <br>
En mai 1990, 34 sépultures juives sont profanées à Carpentras. Des manifestations sont alors organisées, dont une à Paris, qui réunit 200000 personnes, en présence du président François Mitterrand. En 2006, le calvaire d’un jeune juif, Ilan Halimi, torturé et tué par le « gang des barbares », ne suscite pas la même mobilisation. Qu’est-ce qui a changé entre-temps?<br>
En 1990, l’émotion autour de la profanation de Carpentras -perpétrée par des skinheads- s’est vite cristallisée autour de l’antilepénisme. L’ensemble de la gauche pouvait donc défiler unie, sans ombre au tableau. Pour Ilan Halimi -kidnappé, torturé, massacré parce que juif et que « les juifs ont de l’argent »-, on découvre que l’extrême droite n’a plus le monopole de l’antisémitisme dans ce pays.<br>
Youssouf Fofana et son « gang des barbares » sont des jeunes de banlieue. En conséquence, la gauche n’a plus l’épouvantail fédérateur d’extrême droite pour défiler. C’est pourquoi la manifestation in memoriam qui suit la mort d’Ilan Halimi -bien maigrelette par rapport à Carpentras- est essentiellement une manifestation communautaire, et non un grand rassemblement républicain et universaliste.<br> 
Il y a de l’émotion dans le pays, certes, de la stupeur face à l’acharnement sadique dont ce jeune juif a été l’objet. Mais pas de manifestation. Pour moi, ces années signent le basculement d’une partie des nouvelles générations, et particulièrement celles de gauche, pour qui l’antisionisme est aujourd’hui plus important que la lutte contre l’antisémitisme. C’est un changement historique majeur. Depuis l’affaire Dreyfus, le combat contre l’antisémitisme a été porté par les forces de gauche, qui, bon an mal an, étaient unies sur ce thème. C’était presque un marqueur. Depuis, il y a eu scission. La gauche « à la Manuel Valls » est restée fidèle à ce combat, mais d’autres sont gênés, notamment parce que, pour eux, Israël est le mal absolu, et que les juifs sont forcément associés à la politique d’Israël. A côté de tout cela, il y a une masse silencieuse qui regrette ces violences, mais qui ne se sent pas obligée de manifester.
<br>
Comment expliquer « le silence de la communauté nationale »
<br>
Plus que l’antisionisme, n’y a-t-il pas aussi un bug de la gauche, qui ne parvient pas à gérer deux antiracismes de front? La plupart des violences contre les juifs étant désormais le fait d’agresseurs islamistes, elle craint -et c’est louable- la stigmatisation, et choisit donc de se taire, afin de ne pas « jeter de l’huile sur le feu »…
Oui, c’est en effet la position officielle de beaucoup. Ne pas jeter de l’huile sur le feu. Et j’ajouterai, pour certains: le souci d’être toujours du côté des plus faibles, des plus « victimes », tous les musulmans étant, dans leur esprit, les nouveaux damnés de la terre. Précisons deux choses: bien sûr que les Français arabo-musulmans sont eux aussi victimes de racisme, et qu’il faut le condamner à toute force. Bien sûr, aussi, qu’il ne faut en aucun cas accuser d’antisémitisme tous les musulmans. Voilà, c’est simple, et c’est clair. Une fois ces deux évidences posées, expliquez-moi, néanmoins, ce qui peut justifier le silence de la communauté nationale après Ilan Halimi, ou après Mohamed Merah?
<br>
Ce sont quand même deux événements qui ont suscité beaucoup d’émotion et fait beaucoup de bruit…
<br>
Les gouvernements font leur devoir. Les hommages officiels sont toujours impeccablement rendus. Mais -comment dire?- ça n’imprime pas les cerveaux. Nous avons tous, Français, des images chocs des attentats terroristes qui nous hantent. Des images que nous reconstituons dans notre tête, mais qu’on ne peut pas oublier.
On ne peut oublier ni ces amas de cadavres, les uns sur les autres au Bataclan, ni ce prêtre égorgé pendant son office, ni les journalistes de Charlie, exécutés les uns après les autres dans leur salle de rédaction, ni ce camion qui écrase des bébés à Nice… Ce sont des images gravées. 
Mais je ne m’explique pas pourquoi l’exécution par Mohamed Merah de trois enfants dans la cour d’une école juive ne semble pas imprimer autant. Pourquoi cet acte de nature nazie, qui consiste à rattraper par les cheveux une petite fille de 7 ans, pour lui tirer une balle dans la tête à bout portant, ne s’incruste pas autant dans la mémoire collective.
Cessons de nous « aligner sur cette minorité intolérante! »
<br>
Ça n' »imprime » pas autant?
<br>
Je vais vous citer deux oublis qui m’ont particulièrement marquée, et qui illustrent cela. Deux oublis provenant de personnes que je ne soupçonne au reste en rien d’antisémitisme. D’abord, le 13 juillet dernier, l’ex-secrétaire d’Etat à l’Aide aux victimes déclare, sur France info, que l’attentat de Nice est terrible, car « c’est le premier attentat qui a volontairement touché des enfants ».
<br>
Excusez- moi: la ministre des victimes qui oublie qu’il y a eu trois enfants juifs délibérément ciblés et assassinés, c’est stupéfiant, non? Et les journalistes présents dans le studio n’ont pas particulièrement sursauté, l’un croyant même bon de préciser: « Le premier en Europe, car, malheureusement, des enfants sont touchés par des attentats de ce genre dans d’autres pays qu’en Europe. »
<br>
Le deuxième oubli concerne la tribune publiée par des intellectuels français musulmans dans Le Journal du dimanche du 26 juillet 2016. C’est un bon texte, sur la nécessité de réformer l’islam de France, et sur la responsabilité qu’ils sont prêts à y prendre. Mais, dans l’entame de cette tribune, alors qu’ils listent les victimes des attentats des dernières années -« caricaturistes, jeunes écoutant de la musique, couple de policiers, enfants, femmes et hommes assistant à la célébration de la fête nationale, prêtre célébrant la messe »-, ils ne disent pas un mot des victimes juives, de Merah ou de l’Hyper Cacher. 
<br><br>
« Un malheureux oubli », ont-ils fait valoir par la suite. Ça signifie quelque chose, un oubli. On n’oublie jamais un rendez-vous d’amour, mais on oublie parfois un rendez-vous chez le dentiste! Cet oubli-là, dans cette tribune, m’a beaucoup attristée. Dans un texte en réponse, Philippe Val a émis l’hypothèse que cette omission avait été consentie pour ne pas heurter la partie minoritaire des musulmans qui ne veulent pas entendre parler de juifs.
Est-ce l’explication? En tout cas, il faudrait tout de même que l’on cesse de s’aligner sur cette minorité intolérante! Dans certains quartiers, elle dicte tant sa loi qu’il ne fait pas bon y être juif. Et des proviseurs d’établissement public s’y voient contraints d’orienter les enfants juifs vers les écoles confessionnelles, faute de pouvoir assurer leur sécurité dans cette enceinte de la République. « Qui mène ce combat aujourd’hui? »
<br>
N’y a-t-il pas, parallèlement, un mouvement de communautarisation des Français juifs?
<br>
C’est vrai pour une partie d’entre eux. Mais il y a bien d’autres communautarismes qui ont émergé depuis les années 1990. Et c’est cette tendance générale que je regrette infiniment, car elle affaiblit le sentiment de solidarité nationale. De même, je suis toujours troublée quand je vois brandir dans les manifestations des drapeaux étrangers, fussent-ils israéliens, palestiniens, ou autres.
<br>
Lorsqu’on parle d’antisémitisme, on entend souvent dire que la communauté juive « exagère » ou « dramatise »… Qu’en dites-vous?
<br>
Vous vous souvenez des manifestations propalestiniennes de juillet 2014? On y a entendu des cris: « Dehors les juifs! », et même « A mort les juifs! »… Dites-moi: de quelle autre catégorie de Français entend-on scander cela dans les rues? Dans une manifestation, en plus, où l’on pouvait trouver des personnalités que l’on pensait insoupçonnables, et qui n’ont pas eu un mot de condamnation… Certains argueront que ces cris-là étaient le fait de quelques-uns, qu’ils relevaient de l’anecdote. Encore une fois, ce qui ne relève pas de l’anecdote, c’est le silence qui leur fait suite.
D’une certaine façon, on a le sentiment que la masse silencieuse renvoie tout cela à des « affaires entre les juifs et les Arabes ». « C’est compliqué, entend-on, ils ont leurs conflits »… Depuis quand peut-on crier « A mort les juifs! » sans que ça fasse frissonner? Je sais bien que, pour les nouvelles générations, la guerre 39-45, c’est aussi lointain que la Saint-Barthélemy, mais tout de même! Où sont les gardiens de la lutte? Qui mène ce combat aujourd’hui? Tout se passe comme si depuis Ilan Halimi, on considère que l’antisémitisme est le problème des seuls juifs.
<br>
Pour vous, on a abandonné l’antisémitisme à une gestion communautaire?
<br>
Oh, il y a encore de grandes et belles voix qui s’élèvent, et il faut leur rendre un juste hommage. Des voix comme celles de Jacques Julliard, Marcel Gauchet, Jean-Pierre Le Goff, Michel Onfray, Sonia Mabrouk, Paul Thibaud, qui ont signé l’appel des intellectuels (1) pour exiger que la vérité soit faite sur le meurtre de Sarah Halimi.
<br>
J’ai été très émue en entendant, dans un documentaire, le témoignage du maire de Sarcelles, François Pupponi, désespéré de ne pouvoir répondre aux souffrances des habitants juifs de la ville, hier sereins, et aujourd’hui angoissés -quand ils ne sont pas partis… Sa tristesse et sa fraternité étaient sincères, et au moins ne niait- il pas le problème. Mais oui, je constate que ces voix se raréfient. Je dis à mes concitoyens: ne laissez pas les juifs mener seuls ce combat. Sans quoi il est perdu d’avance.";
        echo "" . $text . "<hr>";
        ?>
    </div>


    <div class="row">

        <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
            <?php
            $text = "Le racisme est une manière de déléguer à l'autre le dégoût qu'on a de soi-même. (Robert Sabatier)";
            echo "" . $text . "<hr>";
            ?>
        </div>


        <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
            <?php

            $text = "Le 26 avril 2012, Claude Askolovitch publie une tribune violente dans Marianne où il traite le président du CRIF Richard Prasquier, de « salaud » pour n’avoir, selon lui, pas condamné le score élevé de Marine Le Pen au premier tour de l’élection présidentielle dans un article paru dans le journal israélien Haaretz.
« Il est incapable, dans un texte adressé à un journal israélien, de condamner la violence faite à la France quand un leader politique est considéré comme « normal » en ne détestant que les musulmans. Incapable de dire que notre pays est malade, même quand les juifs ne sont pas les premières cibles (…) Il a oublié que des jeunes juifs, dans les années 80, fondaient SOS racisme avec des militants beurs et de gauche (…) Richard Prasquier ne comptabilise que les injures faites aux siens. Seuls ses morts valent un Kaddish. Il se s’alarme que si les juifs sont touchés (…) la morale et la raison de Prasquier s’arrêtent aux portes du ghetto (…) Aujourd’hui, la détestation des musulmans, subreptice ou revendiquée, grimée de laïcité ou affichée en haine de l’autre, fait partie du débat public, Marine Le Pen le démontre, un certain sarkozysme s’en est emparé, Richard Prasquier le confirme. Sartre écrivait également de belles choses sur les salauds qui détournent la tête quand le mal court. Le ghetto aussi compte ses salauds »,";
            echo "" . $text . "<hr>";
            ?>
        </div>
        <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
            <h4 class="text-center">Left-Wing Antisemitism</h4>
            <?php

            $text = "On peut télécharger le journal à l’adresse suivante:<a href='http://www.workersliberty.org/system/files/wl57.pdf'>http://www.workersliberty.org/system/files/wl57.pdf</a>";
            $text.="<br>Le journal Workers' Liberty, organe du parti trotskyste britannique Alliance for Workers' Liberty (AWL), consacre son numéro d’août 2017 à une ferme dénonciation de «l’antisémitisme de gauche».<br>

Voici la «une» très parlante de ce numéro, qui s’ouvre sur un éditorial de Sean Matgamna, le principal dirigeant et théoricien de l’AWL. (Extrait: « The distinction between “anti-Zionism” and antisemitism, is, increasingly, a small one. On some of the pseudo-Left it is ceasing to exist, or already, more or less, has. »)
<br>
Ce numéro de Workers' Liberty contient – entre autres – un long article intitulé “Trotsky and the Jewish question”, où on lit notamment:
<br>
The German socialist leader August Bebel once memorably
defined left-wing antisemitism as “the socialism of idiots”.
Much of the Trotskyist movement has fallen into an anti-Zionism
which is “the anti-imperialism of idiots”. In fact, into antisemitism.
Its stance is not, of course, racist, but it means
comprehensive hostility to most Jews alive, in whose post-Holocaust
Jewish identity Israel has a central place.
All of this has nothing to do with Trotsky’s politics, or with
his developing position on the question. It is “the Trotskyism
of idiots”! Bits and pieces of Trotskyist politics are deployed
one-sidedly and used in the service of vicarious Arab chauvinism.

";
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


