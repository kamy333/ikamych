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

<h1 class="text-center">Jokes and Quotes</h1>


<div class="row">
    <?php echo $session->message(); ?>
    <?php  echo isset($valid)? $valid->form_errors():"" ?>
</div>

<div class="container-fluid"   >



    <!--</div> --> <!--row-->



    <div class="row">


    </div>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


            <?php
            //          $text = "<a href='#'></a>";
            $text = "Blague de Kippour
Un soir de Kippour, à Auschwitz, un groupe de rabbins prie à voix basse en rentrant des travaux forcés.
Un juif s'approche d'eux et leur dit: \"Moins fort SVP, dieu pourrait s’apercevoir qu'il ne nous a pas tous tués";
            echo "" . $text . "<hr>";
            ?>
        </div>


        <div class="row">
            <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


                <?php
                //          $text = "<a href='#'></a>";
                $text = "Il y a quelques années le Hamas avait décidé d’envoyer \"un cadeau\" au Président de l’Etat d’Israël. Il lui a envoyé une belle boite accompagnée d’une carte.
Le président ouvrit la boite et observa qu’elle contenait des crottes de merde.
Sur la carte était écrit : \"Pour vous et le fier peuple d’Israël\".
Le président d’Israël, Monsieur Shimon Peres, personne expérimentée et sage, décida de répondre et d'envoyer au Hamas un très joli paquet accompagné d’une carte.
Les leaders du Hamas furent très surpris de recevoir le paquet ; ils l’ouvrirent avec beaucoup de précautions craignant qu’il ne contienne une bombe.
Ils découvrirent qu’il contenait une petite \"puce\" rechargeable à l’énergie solaire et pouvant stocker 1800 Terabyte, et un écran 3D capable de fonctionner sur n’importe quel type de téléphone mobile, tablette ou PC.
En d’autres termes l’invention technologique la plus avancée,développée en Israël.
Les leaders du Hamas furent très impressionnés.
Ils lisent alors la carte qui disait :
Chaque leader offre le meilleur de ce que son peuple produit.";
                echo "" . $text . "<hr>";
                ?>
            </div>


            <div class="col-lg-4" style="background-color: #f1ffff;margin-top: 2em;margin-right: 2em;padding: 2em">
                <?php
                $text = "<p>\"Quelques Juifs (genre apprentis Inglorious Basterds) organisent secrètement un attentat contre Adolf Hitler qui doit passer en voiture près de leur schtettl à midi. Ils préparent leur arme de
destruction massive, la planquent sous le pont à l'entrée du village et attendent. Passe midi, 12.30, 13
heures, Hitler n'arrive pas... Ils commencent à s'inquiéter et l'un dit à l'autre: \"Pourvu qu'il ne lui soit rien arrivé!\"</p>";
                echo "" . $text ;
                ?>

            </div>
            <div class="col-lg-4" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
                <?php
                $text = "Une charmante demoiselle un peu court vêtue monte dans un bus à Jerusalem. <br>
Un orthodoxe assis à côté d'elle, au bout de deux stations lui tend une pomme.<br>
-Merci, mais pourquoi me donnez vous une pomme?<br>
-C'est en mangeant la pomme que notre mère Eve a pris conscience qu'elle était nue.<br>
Deux stations plus tard la demoiselle lui rend la pomme.<br>
-Pourquoi me rendez vous la pomme?<br>
-C'est en mangeant la pomme que notre père Adam pris conscience que désormais il devrait travailler.";
                echo "" . $text ;
                ?>

            </div>
</div>
        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
            <?php
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
            echo "" . $text ;
            ?>
        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
            <?php
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
            echo "" . $text ;
            ?>
        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
            <?php
            $text = "Encore aujourd'hui, de nombreuses personnes, en écrivant le chiffre sept, utilisent une barre supplémentaire horizontale au milieu du chiffre.La plupart des typographies l'ont fait disparaître aujourd'hui, comme vous pouvez le constater ici: 7<br>
Mais savez-vous pourquoi cette barre a survécu jusqu'à nos jours?Il faut remonter bien loin, aux temps bibliques.Lorsque Moise eut gravi le mont Sinaï et que les 10 commandements lui furent dictés, il redescendit vers son peuple et leur lut, à haute et forte voix, chaque commandement. Arrivé au septième, il annonça :<br>
Tu ne désireras pas la femme de ton prochain. \"Et là, de nombreuses voix s'élevèrent parmi le peuple lui criant : \"Barre le sept, barre le sept !!!<br>
( 7 13 amusant! merci Jean-Marc: bonne fête de Shavouoth à toi )";
            echo "" . $text ;
            ?>
        </div>

        <div class="row">

            <div class="col-lg-3 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
                <?php
                $text="C’est Dieudonné qui boit une bière dans un bar, lorsque rentre un Juif avec une kippa. Alors, Dieudonné annonce très fort :
– Tournée général, sauf pour le juif !<br>
Tout le monde boit, et le juif va voir Dieudonné pour le remercier très chaleureusement. Alors, Dieudonné crie encore plus fort :<br>
– Je repaye ma tournée, évidement, rien pour le juif !!!<br>
Ce dernier le remercie encore plus chaleureusement. N’y comprenant rien, Dieudonné se tourne vers le barman :<br>
– Je comprend pas, pourquoi il me remercie ce mec ?<br>
– C’est parce que c’est lui le patron !<br>";
                echo "" . $text ;
                ?>
            </div>


            <div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;margin-left:0.5em;padding: 2em">
                <?php
                $text="- Deux juifs se rencontrent sur le quai d'une gare:<br>
- Où vas-tu ?<br>
- Je vais à Cracovie.<br>
- Tu me dis que tu vas à Cracovie, pour que je crois que tu vas à Lodz, alors que je sais que tu vas à Cracovie. Alors pourquoi mens-tu ?<br>";
                echo "" . $text ;
                ?>
            </div>


            <div class="col-lg-3 " style="background-color: #f1ffff;margin-top: 2em;margin-left:0.5em;padding: 2em">
                <?php
                $text="A la sortie de la deuxième guerre mondiale, l'employé demande au candidat juif à l’émigration :<br>
- Dans quel pays voulez vous vous rendre ?<br>
- En Australie.<br>
- En Australie ? mais c'est loin !<br>
- Loin d'où ?<br>";
                echo "" . $text ;
                ?>

            </div>
</div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

            <?php
            $text="Au sentier a Paris un commerçant chinois va voir son voisin Élie pour se plaindre qu'il s'est encore fait cambrioler pour la 37eme fois ce trimestre alors que tous les autres commerçant juif eux presque pas.<br>
Élie le console comme il peut et lui dit:<br>
-Mais qu'est ce que je peut faite pour toi? En quoi puis je t'aider?<br>
Le chinois répond :<br>
- tu me vendz Mezouza! Il faut Mezouza pour magasin à moi!<br>
Élie lui répond:<br>
- Mais tu n'est pas juif! Tu crois que les voleurs ne viendrons pas grâce à la Mezouza ?<br>
-D.ieu protège magasin avec Mezouza! Donnes moi mezzouza! Moi veux mezouza!<br>
- Bon très bien je t'en apporte une<br>
Une semaine après lui avoir fourni la Mezouza le chinois revient voir Élie qui lui demande:<br>
- Alors tu t'es quand même fait cambrioler!?<br>
- Non pas une fois! Mais moi te rendre Mezouza quand même!<br>
- Mais pourquoi? Si cela t'a protégé des cambrioleurs!?<br>
- Protection cambriolage parfait! Mais toute la journée beaucoup trop de rabbins venir demander tsedaka!!!!<br>
";
            echo "" . $text ;
            ?>

        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

            <?php
            $text = "Un vieil homme juif de 82 ans, est assis dans un bar juste à côté de la table d'une magnifique jeune femme avec une poitrine extraordinaire.<br>
il lui dit : \" Mademoiselle, si vous me laissez mordiller juste un de vos seins je vous donne 1000 €\"
\"êtes-vous fou? \" répondit-elle et elle sort du bar.<br>
Le vieux juif la suit et en arrivant au coin de la rue, il lui répète : \"si vous me laissez mordiller vos deux seins je vous donne 10.000 €\".<br>
\" Écoutez Monsieur, je ne suis pas ce genre de femme\".<br>
\" Mademoiselle, j’augmente mon offre à 100.000 €, à mon âge c’est le seul fantasme que je puisse me permettre\".<br>
Elle réfléchit un instant et elle lui dit: \" d’accord pour 100.000 €, mais juste une fois, mais pas ici : allons dans l’allée un peu plus sombre, là-bas\".<br>
Ils vont dans l’allée, elle enlève sa blouse et révèle cette magnifique poitrine...<br>
Aussitôt qu’il voit cela le vieux commence à les caresser doucement, à les embrasser, à les lécher, à se passer le visage sur ses seins.<br>
Finalement la fille qui s'impatiente, lui dit:<br> 
\"Est-ce que vous allez les mordiller finalement ?<br>
\"Non\", dit le vieux \" finalement, c’est trop cher.<br>";
            echo "" . $text ;

            ?>

        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

            <?php

            $text="3 mères juives discutent de leur fils respectifs...
La première:<br>
- Moi mon fils, il et tellement riche qu'il pourrait acheter Paris!<br>
La seconde, un peu vexée:<br>
- Moi mon fils, il a tellement d'argent qu'il pourrait s'offrir Paris ET New-York!<br>
Alors la troisième termine:<br>
- Et qu'est ce qui vous fait croire que mon fils a envie de vendre?<br>";
            echo "" . $text ;

            ?>

        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

            <?php
            $text="C’est un curé et un rabbin, très bons amis. <br>Le curé dit à son ami rabbin : « tu sais, je connais une magouille pour ne pas payer au restaurant : il suffit d’attendre que tous les clients soient partis et que le restaurant ferme ses portes, tu vas voir ! ». <br>Ils se rendent donc au restaurant, commandent, dinent et attendent que tous les clients soient partis jusqu’à presque fermeture des portes ! Un serveur dit : ' ces messieurs ont-ils réglé ? ' Et le rabbin répond : « oui et nous attendons toujours notre monnaie ! »";
            echo wordwrap($text, 180, "<br>\n");

            ?>

        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

            <?php
            $text = "Enfin la vérité, toute la vérité sur la mort de Yasser Arafat, le leader palestinien.
Arafat, hospitalisé à Paris, se réveille d'un premier coma et interroge son médecin :<br>
- Docteur, qui êtes-vous ?<br>
- Je suis le professeur Israël. (Véridique !)<br>
L'émotion est trop forte. C'est l'alerte cardiaque à nouveau. Les médecins se précipitent et réussissent à réanimer le leader palestinien.<br>
- Où suis-je ? demande-t-il alors.<br>
- Vous êtes à Villejuif, répondent en choeur les médecins.<br>
Nouvelle alerte... Le cardiologue prévient:<br>
- Encore une alerte comme celle-ci et je ne réponds plus de rien...<br>
Arafat ouvre alors une dernière fois les yeux :<br>
- Quel temps fait-il dehors ?<br>
Et tous de répondre en coeur:<br>
- Maussade..<br>";
            echo "" . $text ;        ?>

        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

            <?php
            $text=" Deux hommes opposés par une affaire consultent un rabbin du tribunal rabbinique. Chacun défend alors son point de vue.<br>
Après que le premier ait parlé, le rabbi lui dit:<br>
- Tu as raison.<br>
Après que le deuxième se soit exprimé, le rabbi lui dit aussi :<br>
- Tu as raison.<br>
Un des élèves du Rabbi lui demande alors:<br>
- Rabbi, il n'est pas possible que les deux aient raison.<br>
Alors le rabbi, après un moment de réflexion répond:<br>
- C'est vrai, toi aussi tu as raison.<br>";
            echo "" . $text ;        ?>

        </div>
<br>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
                <?php
                $text="Bientôt Kippour... voilà une blague qui est un grand classique, et qui nous fait rire tous les ans....
-----------------<br>
En prévision de Kippour, nous vous demandons de bien vouloir remplir ce formulaire et de le renvoyer dans les plus brefs délais<br>
1. Où souhaitez-vous être assis ?<br>
___ du côté des gens qui parlent<br>
___ du côté des gens qui prient<br>
2. Si vous êtes assis dans la section des parleurs, quelles catégories préférerez-vous ? (Indiquer l'ordre des priorités.)<br>
___ Affaires<br>
___ Sports<br>
___ Médecine<br>
___ Maladies graves qu'auraient eues un des fidèles<br>
___ Potins, toutes catégories confondues<br>
___ Potins concernant<br>
- le rabbin<br>
- le hazan<br>
- la femme du rabbin la femme du hazan<br>
- le shamash<br>
- la femme du shamash<br>
- la secrétaire du shamash<br>
___ Mode<br>
- comment les autres sont habillés<br>
- où ils achètent leurs vêtements et combien ils les paient<br>
___ Les derniers achats (voiture, appartement, maison de campagne...) et prix payé<br>
___ Les dernières fêtes (Brit-Mila, Mariage, Bar-Mitsvah) et prix payé<br>
___ Votre famille<br>
___ Votre belle-famille<br>
3. Auprès de qui souhaiteriez-vous être assis en priorité, pour une consultation professionnelle gratuite ?<br>
___ Médecin généraliste<br>
___ Dentiste<br>
___ Gastro-entérologue<br>
___ Pédiatre<br>
___ Psychiatre pour enfant<br>
___ Cardiologue<br>
___ Rhumatologue<br>
___ Comptable<br>
___ Banquier<br>
___ Notaire<br>
___ Avocat<br>
___ Avocat de divorce<br>
___ Avocat d'affaires<br>
___ Agent immobilier<br>
___ Amateur de tennis/foot/golf<br>
4. Vous désirez une place située (indiquer l'ordre de priorité)<br>
___ en bout de rangée<br>
___ près de la sortie<br>
___ près des toilettes<br>
___ près de vos beaux-parents<br>
___ aussi loin que possible de vos beaux-parents<br>
___ aussi loin que possible de vos ex-beaux-parents<br>
___ près des hommes célibataires<br>
___ près des femmes célibataires<br>
___ là où personne ne peut vous voir/entendre parler pendant l'office<br>
___ là où personne ne peut vous voir dormir pendant l'office<br>
5. Vous souhaitez être assis là où<br>
___ vous pouvez voir votre femme<br>
___ vous pouvez ne pas voir votre femme<br>
___ vous pouvez voir la meilleure amie de votre femme<br>
___ votre femme ne peut pas voir que vous regardez sa meilleure amie<br>
6. Vous souhaitez ne pas être placé à côté des personnes suivantes :<br>
(Choix limité à 6 noms. Au delà, peut-être serait-il bon de songer à changer de synagogue.)<br>
_________________________<br>
_________________________<br>
_________________________<br>
_________________________<br>
_________________________<br>
_________________________<br>
Signature : _______________________________________<br>
Montant du don fait à la synagogue :_____________";
                echo "" . $text ;
                ?>
            </div>
        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">

            <?php
            $text = "Pendant la répétition du mariage, le futur marié prend le rabbin à part et lui dit à l'oreille :
\"Écoutez Monsieur le rabbin, voici un billet de 500 Euros.\"<br>
En échange, je voudrais que vous modifiiez un peu le schéma classique de la cérémonie... <br>
En particulier, je voudrais que quand vous vous adresserez à moi, vous laissiez tomber la partie
 où je dois promettre \"d'aimer, honorer et respecter mon épouse,
  renoncer aux autres femmes et lui être fidèle à jamais\".<br>
Le rabbin prend le billet sans mot dire, et le futur marié s'en va satisfait et confiant.<br>
Le jour du mariage, le moment fatidique de la promesse approche.<br>
 Le rabbin se tourne vers le marié et lui dit en le regardant droit dans les yeux :<br>
\"Promets-tu de te prosterner devant elle, d'obéir à chacun de ses ordres,
 de lui apporter le petit déjeuner au lit tous les matins et de jurer 
 devant Dieu et ta femme exceptionnelle que jamais, au grand jamais, 
 tu ne regarderas une autre femme ?\"<br>
Le jeune gars ravale sa salive, rougit, regarde autour de lui 
avec angoisse et répond d'une voix à peine perceptible :<br>
\"Oui je le promets.\"<br>
A la fin de la cérémonie, le marié s'approche du rabbin et lui dit :<br>
\"On avait fait un marché !?!\"<br>
Alors le rabbin lui met son billet de 500 Euros dans la poche et murmure à son oreille :
\"Elle m'a fait une meilleure offre......\"";

            echo "" . $text ;        ?>

        </div>

        <div class="col-lg-5 col-lg-offset-1" style="background-color: #fffdcd;margin-top: 2em;padding: 2em">

            <?php
            $text="
Moché et Sarah fêtent leurs 25 années de mariage. L'événement est de taille et pourtant Sarah ne semble pas très heureuse. Moché lui demande:<br>
- Sarah, qu'est-ce que tu as ? C'est nos 25 ans de mariage et tu ne parais pas heureuse.<br>
La larme à l'oeil, Sarah chuchote avec des trémolos dans la voix:<br>
- Oh si Moché, je suis heureuse mais c'est que tu vois, Moché, en 25 de mariage, tu ne m'as jamais rien acheté !!
Abasourdi, Moché s'exclame:<br>
- Mais Sarah, tu ne m'as jamais dit que tu avais quelque chose à vendre? ";
            echo "" . $text ;?>
        </div>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
                <?php

                $text = "Trois mamans juives discutent ensemble de leur sujet favori, leur fils. La première dit: \"Mon fils a très brillamment réussi ses études et sa carrière professionnelle, c'est le meilleur psychiatre de New York. La deuxième dit: \" Je suis une maman comblée. Mon fils est exceptionnel, il est devenu le plus brillant avocat de New York. La troisième déplore: \" Mon fils est un cancre, il n'a jamais pu terminer ses études et est homosexuel en ayant deux amants. L'un est le meilleur médecin de New York, l'autre le plus brillant avocat de New York\" ;-)";
                echo "" . $text . "<hr>";
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
                <?php

                $text = "3 frères juifs quittent leur maison de Casablanca pour aller s'installer en Amérique. Ils se retrouvent plus tard et discutent des cadeaux qu'ils ont pu envoyer à leur vieille maman, au Maroc.
Le premier dit: \"J'ai fait bâtir une grande maison pour maman\".<br>
Le deuxième dit: \"Je lui ai offert une Mercedes 500 avec un chauffeur.\"<br>
Le troisième sourit et dit: \"Je vous ai battus tous les deux. Vous savez à quel point maman aime la Bible et vous savez qu'elle ne voit plus très bien. Je lui ai envoyé un perroquet qui peut réciter toute la Thora. Ca a pris 12 ans à 20 jeunes rabbins dans une Yechivah de Brooklin pour lui enseigner ça. J'ai dû payer 500.000$!\"<br>
Un peu plus tard, la mère envoie des lettres de remerciements.<br>
\"David, écrit-elle au premier fils, la maison que tu m'as fait bâtir est trop grande. Je ne vis que dans une pièce et en plus, je dois entretenir toute la maison.\"<br>
\"Salomon, écrit-elle au deuxième fils, je suis trop vieille pour voyager. Je reste à la maison tout le temps, alors je n'utilise jamais la Mercedes. Et le chauffeur s'ennuie beaucoup!\"<br>
\"Moshe, écrit-elle au troisième fils, tu as été le seul de mes fils à vraiment comprendre ce que ta mère désirait. Ton poulet était délicieux!";
                echo "" . $text . "<hr>";
                ?>
            </div>


            <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
                <?php

                $text = "4 femmes se retrouvent à New York après s'être perdues de vue durant plusieurs années. Elles se montrent des photos de leurs enfants devenus adultes désormais (dans ce genre d'histoire ce sont toujours des fils, on se demande pourquoi ...)
La 1ere: \"mon fils il a très bien réussi. Il est si riche et si attentionné qu'il m'a acheté un grand appartement près du sien\"
La 2ème \"mon fils il me couvre tout le temps de beaux cadeaux une Rolls Royce, une croisière et une montre Cartier\"
La 3ème \" mon fils il n'est peut-être pas aussi riche que le vôtre mais il me comprend si bien qu'il a sû me combler avec le vison idéal dont je rêve depuis toujours !\"
La 4 ème \"Pfff tout ça ce n'est que du matériel ! Moi mon fils tellement il aime sa mère, il paye quelqu'un 3 fois par semaine rien que pour parler de moi! \"";
                echo "" . $text . "<hr>";
                ?>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1" style="background-color: #fffdcd;margin-top: 2em;padding: 2em">

                <?php
                $text="D ieu parle à Moïse sur le mont Sinaï...<br>

- Et souviens-toi Moïse, en ce qui concerne les lois kasher, ne cuisine jamais un veau dans le lait de sa mère. C'est cruel.
Moïse :<br>
- Ohhhhhh ! Alors on ne doit jamais manger de lait et de viande en même temps ?<br>
D ieu<br>
- Non, ce que je veux dire, c'est que tu ne dois jamais cuisiner le veau dans le lait de sa mère.<br>
Moïse :<br>
- Mon D ieu, pardonne mon ignorance mais, ce que tu veux dire, c'est que l'on doit attendre 6 heures après avoir mangé de la viande si l'on veut manger quelque chose fait avec du lait, de telle manière que les deux ne se retrouvent pas dans l'estomac en même temps ?<br>
D ieu :<br>
- Non Moïse, c'est tout simple ce que je veux dire: ne cuisine pas le veau dans le lait de sa mère, et c'est tout !!!
Moïse :<br>
- Oh, Mon D ieu ! Je t'en prie, ne me blâme pas pour ma stupidité ! Mais dis-moi plutôt: Tu veux dire que l'on doit avoir un jeu de couverts pour le lait, et un jeu de couverts pour la viande, et que si un jour on se trompe de couverts, on devra enterrer ces couverts à jamais et ne plus les utiliser ?<br>
D ieu :<br>
- Ahhhh Moïse... Fais comme tu veux.";
                echo "" . $text . "<hr>";

                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">
                <?php

                $text = "Chaïm Lévy veut entrer au Rotary club de Vitroles. Il demande un formulaire d'inscription. Il découvre les questions au fur et à mesure.<br>
Première question, le nom :<br>
\"Aïe ! Je ne vais pas mettre Lévy. Si je veux avoir une chance, rusons, je mets Dupont.\"<br>
Deuxième question, le prénom :<br>
\"Si je mets Chaïm ,ils vont se douter de quelque chose. Je vais mettre Jean.\"<br>
Troisième question, le lieu de naissance:<br>
\"Je ne vais pas mettre Varsovie, plutôt Paris.\"<br>
Quatrième question, la profession: <br>
\"Tailleur ? C'est risqué. Avocat, c'est une profession respectable.\"<br>
Dernière question, la religion:<br>
\"Soyons malins jusqu'au bout... mettons goy !!!\"";
                echo "" . $text . "<hr>";
                ?>
            </div>
        </div>

        <br><br>


        <div class="row">

            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><strong><u>cinema israelien</u></strong></li>
                    <li class="list-group-item"> Hatoufim Les prisonniers de guerre</li>
                    <li class="list-group-item"> Les citronniers</li>
                    <li class="list-group-item">Tu n'aimeras point</li>
                    <li class="list-group-item">Jaffa</li>
                    <li class="list-group-item">Valse avec Bachir</li>
                    <li class="list-group-item">La visite de la fanfare</li>
                    <li class="list-group-item">Zaytoune</li>
                    <li class="list-group-item">Une vie précieuse</li>
                    <li class="list-group-item">Va, vis et deviens !</li>
                    <li class="list-group-item">Le procès de Viviane Amsalem</li>
                    <li class="list-group-item">5 caméras brisées</li>

                </ul>

            </div>
        </div>


    </div>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>
