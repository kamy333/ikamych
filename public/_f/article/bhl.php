<?php require_once('../../../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "links"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h1 class="text-center">BHL</h1>

<div class="row">
    <?php echo $session->message(); ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">

    <div class="row">
        <div class="col-lg-7 col-lg-offset-1" style="background-color: #f1ffff;margin-top: 2em;padding: 2em">


            <?php
            $text = "<a href='http://www.lepoint.fr/chroniques/bhl-l-honneur-d-israel-21-06-2018-2229307_2.php#xtor=CS3-194'>BHL - L'honneur d'Israël Le Point</a>";
            $text .= "<p><b>
Allocution prononcée par le philosophe devant le Collège académique de Netanya, le 18 juin 2018, en réponse à la remise d'un doctorat honoris causa. Par Bernard-Henri Lévy</b></p>
<br>
<b>Modifié le 21/06/2018 à 22:09 - Publié le 21/06/2018 à 15:01 | Le Point.fr</b><br>";
            $text .= "

<br><br>

Honoris causa…
<br><br>
Ces mots latins me rappellent immanquablement mes années d'hypokhâgne et de khâgne, au Lycée Louis le Grand, à Paris, alors que je préparais l'École Normale Supérieure et que je mangeais du latin comme les Juifs de Netanya et de Jérusalem, fidèles à la leçon d'Ezéchiel, mangent des lettres carrées.
<br><br>
Mais, puisque je suis ici, au pays des Juifs, on me permettra d'oublier un instant ce latin compassé des académies et des clercs.
<br><br>
On me permettra d'oublier l'Universitas Studiorum avec ses toges impériales et ses souvenirs magnifiques, mais qui empruntent à une autre noblesse, à d'autres accents, et à d'autres mystères de pensée et de savoir.
<br><br>
Et vous m'autoriserez à recourir au mot qui, dans l'autre langue, la vôtre, la nôtre, celle que, peut-être parce que j'ai été trop longtemps et trop puissamment jeté dans le chaudron du latin, je ne maîtrise hélas pas encore, fait office de cet honor latin – et ce mot, ce synonyme, ou ce quasi synonyme, c'est, vous le savez mieux que moi, le mot hébreu kavod.
<br><br>
Sauf qu'il y a une nuance, et même une différence, entre « honor » et « kavod ».
<br><br>
Et cette différence c'est que recevoir un « kavod » vous procure, comme recevoir un « honor », gaieté et fierté – mais qu'il y a, dans le kavod, une dimension de poids, de charge, de gravité et, pour tout dire, de responsabilité que seul le génie de la langue hébreu associe, je crois, aux honneurs.
<br><br>
C'est dire qu'accepter ce doctorat, ce soir, c'est recevoir de mes amis de Netanya une place parmi eux.
<br><br>
C'est recevoir, comme à Bar Ilan, à Tel Aviv, ou comme à l'Université Hébraïque de Jérusalem, une chaise parmi vous en vue d'un travail à mener en commun.
<br><br>
Mais c'est aussi être chargé d'une vraie et grande responsabilité : celle-là même dont s'honore tout juif dès lors qu'il s'attache à cette dimension d'« exultation », de « difficile liberté » ou encore d'exigeante « élection » qui est le fin mot du judaïsme ; celle-là même dont les juifs ont inventé l'idée alors qu'ils n'étaient pas encore arrivés chez eux, sur les pentes du mont Sinaï, mais qu'ils se savaient déjà ce peuple-trésor, ce Am segula, ce peuple unique et singulier dont j'ai montré, dans L'Esprit du judaïsme, qu'il travaille secrètement, du fond des « greniers du Roi », et depuis des millénaires, à une œuvre qui est la plus difficile de toutes les œuvres et dont il est le seul à avoir entendu tous les réquisits.
<br><br>
Cette œuvre dont chaque juif a la responsabilité, le kavod, et dont j'ai, ce soir, à cause du doctorat dont vous me chargez, une responsabilité un peu plus grande encore, quelle est-elle ?
<br><br>
C'est une œuvre d'attention et d'intelligence étendue jusqu'aux étoiles mais concentrée, tout autant, sur un millimètre de tissu où il est requis de désenchevêtrer, comme dans un raisonnement talmudique, la laine et le lin, le végétatif et l'animal.
<br><br>
C'est une œuvre de gravité et de rire mêlés – car, sans rire, on n'est pas grave ; car sans désespoir, on ne rit pas ; car Kafka riait en lisant les actes de son procès ; car Philip Roth riait en déployant le ruban fou de nos étranges et folles vies modernes ; car Dieu, dit le traité Avoda Zara, rit trois heures par jour avec Léviathan.
<br><br>
C'est une œuvre d'humanité, pitié et force mêlées, tristesse infinie et fierté non moins infinie - tant il est vrai qu'il n'y a, comme le disait si bien Nietzsche qui était, quoi qu'on en dise, bien plus un ami des Juifs qu'un adorateur de la germanité, pas de fierté véritable sans douceur et mansuétude, ni de commisération véritable sans force et puissance.
<br><br>
Et c'est l'œuvre enfin de ce pays où je suis aujourd'hui, qui m'honore, et où j'ai, depuis ce soir, un peu plus de responsabilité encore – c'est le miracle de cette âme juive devenue lieu, cadre, scène enfin offerte et rendue à l'œuvre juive.
<br><br>
Nos ancêtres y avaient aspiré avec une ferveur sublime, siècle après siècle, persécution après persécution.
<br><br>
Ils se le soufflaient à l'oreille, le soir de Pessah, après la lecture de la Haggadah – puis échauffés par le vin et le sommeil des cosaques, ils finissaient par se le chanter et se le danser.
<br><br>
L'an prochain à Jérusalem, chantaient-ils en une psalmodie apprise tant par les efforts de la pensée et de l'étude que dans le creuset des expériences et des épreuves.
<br><br>
Eh bien nous y voilà.
<br><br>
Et m'y trouver aujourd'hui honoré, kavodisé, me donne une responsabilité encore nouvelle qui a, selon qu'elle s'adresse aux nations ou aux juifs, deux formes distinctes et, je crois, complémentaires.
<br>
°°°°°°°°
<br>
La première responsabilité à quoi m'oblige la cérémonie d'aujourd'hui est de me faire, plus que jamais, l'avocat d'Israël auprès des nations.
<br><br>
Car vous connaissez la situation, n'est-ce pas ?
<br><br>
Cet Israël qui a été conçu comme un pays refuge pour tous les juifs du monde, ce sionisme qui a été pensé comme un mouvement de libération nationale à la fois noble et couronné de succès, ils sont devenus, sur les trois quarts de la planète, le nom de l'infamie.
<br><br>
Pourquoi ?
<br><br>
Par quelle obscure perversion de l'esprit et du cœur les ennemis du peuple juif ont-ils pu entendre, dans ce mot de Tsion, ou de « Sion », qui est l'un des mots glorieux de l'hébreu, le nom d'un vice, d'un malheur, d'une catastrophe, d'une naqba ?
<br><br>
Par quelle sinistre ironie de l'histoire la flamme de leur haine a-t-elle pu se ranimer au contact de cette terre jeune-vieille, de cette alt-neu Land de Moses Mendelssohn, qui est celle des Juifs depuis trois mille et 70 ans et dont nos prophètes, nos sages, nos décisionnaires et, aussi, nos rois n'ont cessé de dire, tout au long de l'Histoire, qu'elle est une terre de rédemption pour toute l'humanité ?
<br><br>
Comment la scène mondiale du commentaire et de la prédication vertueuse, comment ces nouveaux lieux où sonne le tocsin et qui sont, non plus les églises de jadis, mais les universités d'Angleterre, d'Amérique, de France ou d'Égypte, comment les réseaux dits sociaux d'Europe autant que ceux de Turquie ou de Russie, comment tout ce monde en est-il venu à réorchestrer, sur les harmoniques de l'antisionisme, la vieille litanie de l'imprécation antisémite ?
<br><br>
C'est une affaire connue dont j'ai, ici et ailleurs, souvent parlé.
<br><br>
Je n'y ajouterai, en cette circonstance, qu'un point d'histoire dont je ne m'étais jamais si précisément avisé qu'aujourd'hui.
<br><br>
Je pense que ce pays que les Juifs ont gagné de haute lutte, ce pays qu'ils ont reçu au lendemain du crime le plus inouï jamais perpétré dans l'histoire de l'humanité, il leur a été donné, au fond, à contrecœur.
<br><br>
Je pense que, dans la foire aux vanités de l'Histoire, dans sa folie grimaçante et hurlante, la terre d'Israël était, dans les yeux de beaucoup d'hommes qui restaient nos ennemis même s'ils feignaient de ne plus l'être, un lot de consolation, aussi carton-pâte ou mauvais plastique que les pistolets à eau qu'on gagne au tir aux canards.
<br><br>
Et je pense que ce bout de terre aride, découpé dans l'ancien empire ottoman, et dont nul n'imaginait que vous feriez le plus fécond des jardins, la plupart savaient, dès le premier instant, que c'était un lieu tragique où vivait un autre peuple alors que, dans la logique courante des nations, chaque peuple a une terre comme chaque terre n'a qu'un peuple - je pense que le monde savait qu'il ne s'en faudrait pas de beaucoup pour que le cadeau devienne un piège et le jardin des délices celui, comme chez Hiéronymus Bosch, d'un enfer où l'on nous regarderait, avec une curiosité d'entomologistes gourmands et sadiques, aller de cercle en cercle.
<br><br>
Mais la question, aujourd'hui, n'est pas là.
<br><br>
La question est de répondre à cette démonisation, cette stigmatisation, cette désinformation.
<br><br>
La question est de rappeler que, de cette terre sèche et bonne, comme disait un grand poète français, à tous les incendies, le sionisme a fait une vallée de miel.
<br><br>
La question est de s'emparer de cette circonstance et du kavod qui s'y voit lié, pour rappeler, encore et encore, qu'a pris forme sur cette terre ce miracle, sans précédent dans l'histoire de l'humanité récente, qu'est une volonté générale, donc un contrat social, sortis, en une nuit, tout armés, de l'imagination poétique et politique d'une poignée de législateurs.
<br><br>
La question, la seule question, est de dire et répéter aux sourds qui ne veulent pas entendre, et aux aveugles qui ne veulent pas voir, que s'y est édifiée, pour reprendre un mot d'aujourd'hui, l'une des très rares vraies sociétés multi ethniques qu'ait connues la modernité et, donc, l'un des très très rares pays où a fonctionné d'emblée, sans trop de ratés ni de tâtonnements, cette multi culture, cette tolérance à l'autre, ce respect de l'altérité ainsi de cette forme particulière d'altérité que l'on appelle les minorités, qui est le graal après lequel courent toutes les démocraties et qui a été, ici, trouvé : connaissez-vous tant d'autres pays où des hommes et des femmes venus d'Europe de l'est et de l'ouest, des deux Amériques, de pays arabes ou asiatiques, d'Éthiopie, de Russie, j'en passe, se sont rassemblés pour dire « nous sommes une société » et où cela a marché ? et a-t-on assez pris la mesure du fait que la minorité arabe de cette société se voit représentée, au Parlement, par un nombre de députés inimaginable, hélas, dans un pays comme la France et que sa langue, la langue arabe, continue d'être, 70 ans après, l'autre langue officielle d'Israël ?
<br><br>
Ma responsabilité, la contrepartie de mon kavod, est de continuer à rappeler au monde qu'il suffit en général de quelques mois, comme dans l'Amérique de l'après 11 septembre, ou de quelques années, comme dans la France de la guerre d'Algérie, pour que l'on voie un état de guerre engendrer un état d'exception et cet état d'exception générer un état d'urgence autorisant lui-même que soient suspendues quelques- unes des libertés qui sont l'honneur et le kavod des démocraties : or Israël, lui, est en état de guerre depuis, non pas quelques mois, non pas quelques années, mais quelques dizaines d'années voire même, en réalité, et pour être précisément précis, depuis le premier jour de son existence, et les règles et piliers de la démocratie y sont restés, pour l'essentiel, inentamés : liberté de la presse et des opinions ; vitalité des contre-pouvoirs ; une justice dure avec les forts et implacable avec les puissants ; des villes à majorité arabe qui, quand la guerre s'intensifie, peuvent entrer en état de quasi sécession sans que l'on ait jamais sérieusement songé, hors quelques sectes extrémistes, à y entamer si peu que ce soit les droits dont jouit chaque citoyen ; et puis une armée qui, jusques et y compris pendant les derniers et désastreux événements de Gaza, est restée fidèle, quoi qu'on en ait dit, aux règles d'engagement dont la complexité, l'exigence et la prudence font l'admiration des observateurs de bonne foi.
<br><br>
Ma responsabilité, mes amis, est de dire tout cela à ceux qui ne se lassent pas de démoniser Israël.
<br><br>
Et ma responsabilité sera de rappeler que, nous, juifs, qui sommes rassemblés ici, ce soir, sommes les dépositaires, ou les témoins, ou les amis, d'un régime de société qui, contre vents, marées et guerres le plus souvent imposées, demeure démocratiquement exemplaire.
<br><br>
Revient l'âge des monstres.
<br><br>
Nous en voyons, partout, pointer les museaux, luire les crocs, s'affûter les griffes.
<br><br>
Partout, oui, la scène du monde voit la dictature revenir, les yeux recommencer de rouler dans les orbites des démocrateurs et ce ne sont, partout, que crises, dérapages de moins en moins contrôlés, massacres aveugles.
<br><br>
Eh bien nous n'en sommes pas.
<br><br>
Israël ne joue pas sur cette scène-là.
<br><br>
Et jusque dans cet événement extrême, inédit dans l'histoire moderne, qui voit des foules désespérées, chauffées à blanc par des tyrans sans scrupule et barbares, marcher sur la frontière du pays avec la ferme intention de la franchir et d'y semer la mort, c'est l'honneur de Tsahal d'avoir réagi – mais oui ! - avec mesure et scrupule.
<br>
°°°°°
<br>
Mais avec le Kavod dont vous n'honorez, j'ai, mes amis, une seconde responsabilité.
<br><br>
Et, cette seconde responsabilité, elle est de m'adresser, cette fois, à Israël pour lui dire, à travers vous et au-delà de vous, l'inquiétude qui, parfois, m'étreint tout de même quant à notre destinée.
<br><br>
Je suis inquiet quand je vois, par exemple, les nationalismes se remettre, partout dans le monde, à grogner, s'ébrouer et cogner et que je vois des Juifs qui, en Israël, semblent prêts à tomber dans le piège qui nous ferait devenir, dans le sens réducteur que notre longue existence a contribué à détruire, une nation nationaliste.
<br><br>
Je suis inquiet quand je vois la technique dessiner, en Occident, mais aussi en Russie, en Chine, ailleurs, la forme d'une nouvelle inhumanité et que j'entends des Israéliens s'enorgueillir, à juste titre, d'être à la pointe de cette technique mais ne pas toujours savoir que faire de cette chance : continuer d'en faire, comme c'est, pour le moment, le cas, un outil pour sauver l'humain, pour réparer les corps et les cerveaux, pour aviver encore mieux les déserts - ou bien y voir, eux aussi, un laboratoire de la transhumanisation généralisée dont la planète est devenue le laboratoire terrifiant.
<br><br>
Je suis inquiet quand je vois la vraie pensée et la vraie parole reculer tragiquement sur toutes les scènes du monde et que je vois Israël hésiter, là aussi, entre les deux voies : demeurer le peuple et le pays d'un Livre d'écriture et d'oralité, de logique et d'inspiration, de prophétie et de paradoxe sans fin, un Livre immensément simple et prodigieusement complexe, un Livre clair comme une phrase d'Appelfed et opaque comme la boule de fils de Kafka – ou accepter (je sais de quoi je parle) que ferment les librairies, que disparaissent les maisons d'édition et que croisse, comme ailleurs, le désert de la sous-culture et de ses novlangues.
<br><br>
Je suis anxieux quand je me souviens de ces pionniers qui étaient aussi des poètes et qui voulaient qu'Israël demeure le nom de l'homme qui a dû combattre les hommes et les dieux, comme le lui avait dit l'ange qui lui donnera son nom – je suis anxieux, oui, quand je me souviens de ceux des textes fondateurs du sionisme qui voyaient en Israël, sinon la patrie, du moins l'alliée de tous les hommes qui sont étrangers sur leur terre comme nos premiers ancêtres purent l'être sur la leur et quand j'entrevois qu'ici aussi la loi sacrée de l'égoïsme pourrait un jour l'emporter sur la sainteté de l'après vous lévinassien : Israël reste, à l'instant où je vous parle, l'un des principaux soutiens des Kurdes niés dans leur existence même de peuple et de sujets ; il reste ce pays généreux dont le plus prestigieux des Prix, le Prix Genesis, est allé, cette année, à la cause des réfugiés et, en particulier, des réfugiés syriens ; il reste l'étoile, proche et lointaine, qui guide, dans leur nuit, la marche de tant de peuples victimes, au cœur de l'Afrique par exemple, de guerres oubliées mais atroces où l'on compte en méga-morts ; il est, on ne le sait pas assez, l'un des pays au monde les plus empressés à se porter, à travers ses dispensaires, ses ONG ou ses soldats, au secours des blessés de la guerre contre les civils de Syrie, des assoiffés de Porto Rico ou du Sierra Leone, des victimes d'un tremblement de terre au Mexique, au Népal, en Haïti, en Turquie ou encore, dans tel hôpital de Safed ou de Tibériade, des malades ou des blessés palestiniens de Gaza. Mais ne peut-on faire plus encore ? Mieux ? Pourquoi tant tarder, par exemple, à reconnaître le génocide dont furent victimes nos frères arméniens ? Et ne sent-on pas, ici ou là, des vents et des voix contraires qui commencent de se demander s'il n'est pas temps se désencombrer de ce bel mais inutile humanisme juif ?
<br><br>
Bref, je suis inquiet quand j'ai le sentiment que ce pays que j'aime et admire pourrait être tenté d'oublier qu'il a été donné à ses habitants pour abriter, non pas une nation comme les autres, aussi faillible que les autres, aussi fautive, mais une nation singulière, exceptionnelle et, encore une fois, exemplaire.
<br><br>
Et puis je suis frappé d'épouvante, évidemment, par ce qui se passe, depuis quelques semaines, à Gaza.
<br><br>
Ma pensée va, chaque vendredi, aux familles juives, voisines de la frontière, qui voient leurs champs brûlés par les bombes incendiaires du Hamas, leurs écoles visées par ses roquettes et qui vivent dans la hantise de ces imprécations dont elles sont bien placées pour savoir que ce ne sont pas de simples paroles verbales mais qu'elles appellent bel et bien à tuer.
<br><br>
Mais elle va aussi, naturellement, aux Palestiniens eux-mêmes : ces Palestiniens à bout de souffle et d'espoir, écrasés de misère, ces Palestiniens si habilement manipulés par leurs maîtres locaux et par leurs suzerains extérieurs qu'ils en viennent – et cela brise le cœur - à se servir de leurs propres enfants comme d'autant de bombes ou de boucliers humains.
<br><br>
Cette angoisse, c'est l'angoisse de l'âme juive qui a été si exposée à la douleur qu'elle ne se résout pas à l'infliger.
<br><br>
C'est l'angoisse de ces soldats juifs, souvent presque des enfants, dont je sais qu'ils sont trop humains pour être cruels, pour se griser de leur propre force et pour ignorer que tirer sur des gens, et tuer, est ce qui fait horreur à tous les commandements qu'ils ont reçus.
<br><br>
C'est l'angoisse du peuple juif qui, alors que, partout alentour, la mort parle de sa voix bruyante et sinistre, se rappelle à son histoire et s'interroge sur la limite qu'on ne peut pas franchir quand on est le peuple dont la ligne de vie, sombre et lumineuse, a été si souvent attaquée et brisée par la mort.
<br><br>
C'est, dans un Orient envahi par l'ubris de la mort donnée et reçue, dans cette région où les massacrés se comptent, chaque jour, en centaines, parfois en milliers, parfois davantage encore, l'angoisse de ce peuple, le mien, le vôtre, qui a sué le sang pour demeurer fidèle, à travers les siècles, à la parole d'intelligence et de justice énoncée dans la Torah et le Talmud et qui, aujourd'hui, à Gaza donc, doit se rappeler le Lévitique : « Ne déteste pas ton frère dans ton cœur – morigène-le, admoneste-le, mais ne le déteste pas » ; ou le verset de Zacharie qui me hante ces jours-ci et me retourne les entrailles : « Pas par la puissance, pas par la force, par mon esprit » ; ou ce sublime Psaume d'un roi David qui, ayant conduit la puissance d'Israël à un faîte qu'elle ne retrouvera plus jamais, lui rappelle que c'est dans le Nom, et pas seulement dans ses armées, qu'elle doit puiser sa force et trouver son appui.
<br><br>
Et puis – pardon si je suis peu « diplomatique » – ce fut aussi l'angoisse face à ce concours de circonstance si funeste : d'un côté, de jeunes soldats contraints de tirer sur une foule qui, droguée à une haine qui va, plus encore que la noirceur de leur souffrance, nourrir une rancune qu'il va pourtant bien falloir dépasser pour vivre un jour ensemble, avançait vers eux telle une armée-suicide ; et, de l'autre, au même instant, le spectacle d'un nouvel Assuerus donnant au monde le spectacle d'une fête qui n'était pas celle du début du livre d'Esther mais qui ressemblait par bien des aspects, hélas, à celle où l'on mangea dans les couverts et avec les objets intouchables du Temple.
<br><br>
Cette angoisse, mes amis, ne me quitte jamais.
<br><br>
Pas plus que ne me quitte ma joie et ma fierté d'être juif.
<br><br>
Ni ma conscience d'appartenir au peuple singulier, au am segula, au peuple singularisant et paradoxal – celui de Rabbi Akiva qu'on ratissa de fer alors qu'il disait le Chema ; et de Joseph Roth qui se fit chrétien tout en chantant le nom d'Israël ; et de Herzl qui pleurait comme Moïse jeune sur la souffrance juive tout en ignorant jusqu'à la forme des lettres carrées ; et de Bernard Lazare qui mourait dans la misère d'avoir sauvé le capitaine Dreyfus après avoir été antisémite et florissant ; et de mon ami Benny Lévy qui, après avoir été, comme il disait, l'un des inventeurs, dans la conscience occidentale, du peuple palestinien, vint à Jérusalem étudier tout le jour et tout son soûl, sans fin, infiniment, au point qu'il étudie peut-être encore, aujourd'hui, là où il est.
<br><br>
Ni mon amour inconditionné d'Israël, cette aventure humaine faite d'audace, de bravoure, de romantisme, de communisme, de rationalisme, de folie, mais aussi de pieux souvenirs incessamment ravivés, entre Jérusalem la pieuse, Tel Aviv la moderne et Netanya la française.
<br><br>
Parce que l'amour du Juif et l'amour d'Israël sont vivaces dans mon cœur comme au premier jour, j'ai confiance dans ce miracle perpétué qui fait, jusque dans l'épreuve, la force de la démocratie israélienne.
<br><br>
Ces trésors de gravité et de contradictions qu'au temps de leur splendeur, la littérature savait dire, la musique savait chanter, la peinture savait peindre, je les vois partout vaciller – mais en Israël, envers et contre tout, ils tiennent bon.
<br>
°°°°°
<br>
Aux temps messianiques, dit-on, toute la terre d'Israël sera Jérusalem, et le monde tout entier sera la terre d'Israël.
<br><br>
Ce que cet apologue dit, mes amis, c'est ce que l'œuvre juive recèle de vérité et d'humanité, d'intelligence et d'inspiration, pour nous, juifs – mais, aussi, ce qu'elle recèle et implique pour tous les autres.
<br><br>
Ce qu'il dit c'est que les juifs qui sont rassemblés ici, ce soir, et ceux qui n'y sont pas, sont les dépositaires, pour eux-mêmes, de cette petite flamme que l'on appelle l'espoir - mais que cette petite flamme brûle, et doit brûler, bien au-delà d'eux.
<br><br>
C'était la thèse du vieux Sartre dans son entretien ultime (L'Espoir maintenant) avec le jeune Benny Lévy.
<br><br>
C'est la qualité que Massignon nous accordait lorsque, dans un de ses derniers textes, il jugeait que la charité était l'apanage des Chrétiens ; la foi, celui des Musulmans ; et l'espoir celui d'Israël.
<br><br>
Et cela, ce fait que « sioniste » fut, demeure et doit demeurer l'un des noms de l'espoir, ce fait qu'être juif, être l'habitant de ce pays qui n'est pas seulement une terre mais une région de l'Esprit et presque de l'Etre, c'est être appelé à porter, aussi haut qu'il est possible, le nom de l'Homme, c'est ce que nous ne devons, en aucune circonstance, même dans la tragédie ou l'impasse, absolument jamais oublier.
<br><br>
Un tout dernier mot, mes amis et, désormais, grâce à ce doctorat, mes compagnons de savoir et d'étude.
<br><br>
Le Hatam Sofer, l'un des maîtres juifs de l'âge moderne, a fait un relevé des initiales de la grande lignée qui, dans notre peuple, a conduit jusqu'à nous la réception et la garde de la Torah.
<br><br>
C'est celle qui, partant du fils de Jacob, Lévi, lui a donné pour fils Qéat, lequel a eu pour fils Amram, lequel a eu pour fils Moïse.
<br><br>
Eh bien savez-vous quel nom composent les premières lettres de cette admirable descendance ?
<br><br>
C'est le nom Amaleq qu'elles composent.
<br><br>
C'est, infus, comme un filigrane dans notre lignée de vie à la fois grandiose et fragile, le nom de notre pire ennemi.
<br><br>
Vous savez cela.
<br><br>
Nous savons, tous, cela.
<br><br>
Nous le savons et nous ne tremblons pas.
<br><br>
Au contraire, cette certitude d'une épreuve toujours à reprendre excite notre courage et notre vaillance.
<br><br>
Ces combats pour l'humain que vous et moi, chacun de nous, devons mener aussi parce que nous sommes juifs, c'est toujours sous l'œil de fer de notre accusateur que nous avons à les livrer.
<br><br>
Nous pouvons même lui sourire comme, sur cette admirable photo que Benny Lévy avait choisie pour la publication de la traduction, par sa femme Léo, de la Célébration dans la tourmente et où l'on voit un petit juif sourire au nazi qui lui coupe la barbe.
<br><br>
S'il lui sourit c'est parce qu'il sait qu'il ne lui cédera pas.
<br><br>
Et, non content de ne pas lui céder, il sait qu'il en triomphera – ainsi qu'il est dit dans le Midrash où la lignée de Jacob est comparée à une flamme haute, ardente et qui brûlera longtemps alors que celle d'Amalek est semblable à une procession de chameaux entrant dans le village chargée de bottes de paille qui, au contact de la première étincelle, flamberont en un instant et ne laisseront que du néant.
<br><br>
Merci, encore, pour ce kavod.
<br><br>
Cet honneur, donc ce poids, ont cet effet paradoxal, vous le voyez, de me rendre léger en même temps qu'ils m'obligent.
<br><br>
Merci, oui.
";
            echo "" . $text . "<hr>";
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12" style="padding: 2em">

            <p class="text-center">Pourquoi une page dédié à BHL? car les attaques contre lui sont d'une haine
                antisémite. Et puis je suis généralement en accord avec ses idées, sur ses combats dont je sais combien
                elle est contesté aussi parmi les juifs. </p>
        </div>
    </div>

    <div class="col-lg-2  col-lg-offset-2 col-md-2  col-md-offset-2" style="background-color: #d9eeff;margin: 2em;;padding: 2em;height: 15em">
        <h4> le Monde Diplomatique</h4>
        <p>L’imposture<strong>Bernard Henri-Lévy</strong><br>
            On voit bien dans ce numéro la haine et l'acharnement envers BHL

            <a href="http://www.monde-diplomatique.fr/dossier/BHL"
               class="h"> Read more at monde-diplomatique.fr ... </a></p>
    </div>


    <div class="col-lg-2  col-lg-offset-2 col-md-2  col-md-offset-2" style="background-color: #d9eeff;margin: 2em;;padding: 2em;height: 15em">
        <h4> La Règle Du Jeu</h4>
        <p>Misère et déshonneur du Monde diplomatique de <strong>Bernard Henri-Lévy</strong><br>
            Réponse de BHL suite au numéro du <a href="http://www.monde-diplomatique.fr/dossier/BHL"
                                                 class="h"> monde-diplomatique.fr</a><br><br>
            <a href="http://laregledujeu.org/2017/07/24/32008/misere-et-deshonneur-du-monde-diplomatique/"
               class="h"> Read more response at laregledujeu.org ... </a></p>
    </div>


    <div class="col-lg-2  col-lg-offset-2 col-md-2  col-md-offset-2" style="background-color: #d9eeff;margin: 2em;;padding: 2em;height: 15em">
        <h4>Atlantico</h4>
        <p>Quand le Monde Diplomatique allume un bûcher pour brûler <strong>Bernard Henri-Lévy</strong><br>

            <a href="http://www.atlantico.fr/decryptage/quand-monde-diplomatique-allume-bucher-pour-bruler-bernard-henri-levy-3116439.html#YOyvAE6orMzwbY12.01"
               class="h"> Read more at atlantico.fr ... </a></p>
    </div>



    <div class="col-lg-2 col-md-2" style="background-color: #d9eeff;margin: 2em;padding: 2em;height: 15em">
        <h4>L'Express</h4>
        <p>De quoi la haine de <strong>Bernard-Henri Lévy</strong> est-elle le nom?<br>
            <a href="http://www.lexpress.fr/actualite/societe/de-quoi-la-haine-de-bernard-henry-levy-est-elle-le-nom_1929884.html#DOwv3FUJKYRqSD21.01"
               class="h"> Read more at lexpress.fr ... </a></p>

    </div>

</div>


<div class="row">


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


