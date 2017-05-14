
--
-- Structure for view `mycigarette_view_by_day`
--
#
DROP VIEW IF EXISTS mycigarette_view_by_day;
DROP VIEW IF EXISTS mycigarette_view_by_month;
DROP VIEW IF EXISTS mycigarette_view_by_year;
DROP VIEW IF EXISTS transport_model;
DROP VIEW IF EXISTS transport_model_visible_no;
DROP VIEW IF EXISTS transport_model_visible_yes;
DROP VIEW IF EXISTS transport_model_pivot;
DROP VIEW IF EXISTS transport_model_pivot_visible_yes;
DROP VIEW IF EXISTS transport_model_pivot_visible_no;
DROP VIEW IF EXISTS transport_summary_by_course_date_program;

DROP VIEW IF EXISTS transport_view_adresse;


CREATE VIEW transport_view_adresse AS
  (SELECT DISTINCT
     c.Pseudo AS pseudo,
     c.Depart AS adresse
   FROM DatabaseCourse AS c)
  UNION
  (SELECT DISTINCT
     c.Pseudo  AS pseudo,
     c.Arrivee AS adresse
   FROM DatabaseCourse AS c)
  UNION
  (SELECT DISTINCT
     t.pseudo AS pseudo,
     t.depart AS adresse
   FROM transport_programming AS t)
  UNION
  (SELECT DISTINCT
     t.pseudo  AS pseudo,
     t.arrivee AS adresse
   FROM transport_programming AS t)

  ORDER BY pseudo;


CREATE VIEW  `mycigarette_view_by_day` AS (select year(`mycigarette`.`cig_date`) AS `year`,monthname(`mycigarette`.`cig_date`) AS `month`,`mycigarette`.`cig_date` AS `date`,sum(`mycigarette`.`number_cig`) AS `total` from `mycigarette` group by `mycigarette`.`cig_date` desc);

-- --------------------------------------------------------

--
-- Structure for view `mycigarette_view_by_month`
--


CREATE VIEW `mycigarette_view_by_month` AS (select year(`c`.`cig_date`) AS `year`,month(`c`.`cig_date`) AS `monthno`,concat_ws(' ',monthname(`c`.`cig_date`),year(`c`.`cig_date`)) AS `month`,sum(`c`.`number_cig`) AS `total` from `mycigarette` `c` group by year(`c`.`cig_date`) desc,concat_ws(' ',monthname(`c`.`cig_date`),year(`c`.`cig_date`)) desc);

-- --------------------------------------------------------

--
-- Structure for view `mycigarette_view_by_year`
--


CREATE VIEW `mycigarette_view_by_year` AS (select year(`mycigarette`.`cig_date`) AS `year`,sum(`mycigarette`.`number_cig`) AS `total` from `mycigarette` group by year(`mycigarette`.`cig_date`));

-- --------------------------------------------------------

--
-- Structure for view `transport_model`
--



CREATE VIEW `transport_model_visible_no` AS
  SELECT
    concat_ws('-', `p`.`heure`, `c`.`pseudo`, `c`.`id`) AS `PrimaryKey`,
    `p`.`heure`                                         AS `heure`,
    `p`.`week_day_rank_id`                              AS `jour`,
    `p`.`client_id`                                     AS `client_id`,
    `c`.`pseudo`                                        AS `pseudo`,
    `c`.`liste_restrictive`                             AS `liste_restrictive`,
    `c`.`liste_rank`                                    AS `client_sort`,
    `c`.`web_view`                                      AS `web_view`,
      `p`.`id`                                         AS `modele_id`,
      `p`.`inverse_address`                            AS `inverse_address`,
      `p`.`depart`                                     AS `depart`,
      `p`.`arrivee`                                    AS `arrivee`,
    `p`.`prix_course`                                          AS `prix_course`,
    `c`.`default_depart`                                       AS `default_depart`,
    `c`.`default_arrivee`                                      AS `default_arrivee`,
    `c`.`default_price`                                        AS `default_price`,
    `p`.`remarque`                                             AS `remarque`,
    `p`.`chauffeur_id`                                         AS `chauffeur_id`,
    `p`.`client_habituel`                                      AS `client_habituel`,
    (CASE WHEN (`p`.`week_day_rank_id` = 0)
      THEN `p`.`id` END)                                       AS `Dimanche`,
    (case when (`p`.`week_day_rank_id` = 1) then `p`.`id` end) AS `Lundi`,
    (case when (`p`.`week_day_rank_id` = 2) then `p`.`id` end) AS `Mardi`,
    (case when (`p`.`week_day_rank_id` = 3) then `p`.`id` end) AS `Mercredi`,
    (case when (`p`.`week_day_rank_id` = 4) then `p`.`id` end) AS `Jeudi`,
    (case when (`p`.`week_day_rank_id` = 5) then `p`.`id` end) AS `Vendredi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 6)
    THEN `p`.`id` END)                                         AS `Samedi`
  from (`transport_clients` `c`
join `transport_programming_model` `p` 
on((`c`.`id` = `p`.`client_id`))) 
where (`p`.`visible` = 0)
  order by `p`.`heure`,`p`.`week_day_rank_id`,`c`.`liste_rank`;

-- --------------------------------------------------------

--
-- Structure for view `transport_model_visible_yes`
--


CREATE  VIEW `transport_model_visible_yes` AS 
select
  concat_ws('-',`p`.`heure`,`c`.`pseudo`,`c`.`id`)           AS `PrimaryKey`,
  `p`.`heure`                                                AS `heure`,
  `p`.`week_day_rank_id`                                     AS `jour`,
  `p`.`client_id`                                            AS `client_id`,
  `c`.`pseudo`                                               AS `pseudo`,
  `c`.`liste_restrictive`                                    AS `liste_restrictive`,
  `c`.`liste_rank`                                           AS `client_sort`,
  `c`.`web_view`                                             AS `web_view`,
  `p`.`id`                                                   AS `modele_id`,
  `p`.`inverse_address`                                      AS `inverse_address`,
  `p`.`depart`                                               AS `depart`,
  `p`.`arrivee`                                              AS `arrivee`,
  `p`.`prix_course`                                          AS `prix_course`,
  `c`.`default_depart`                                       AS `default_depart`,
  `c`.`default_arrivee`                                      AS `default_arrivee`,
  `c`.`default_price`                                        AS `default_price`,
  `p`.`remarque`                                             AS `remarque`,
  `p`.`chauffeur_id`                                         AS `chauffeur_id`,
  `p`.`client_habituel`                                      AS `client_habituel`,

  (CASE WHEN (`p`.`week_day_rank_id` = 0)
    THEN `p`.`id` END)                                       AS `Dimanche`,
  (case when (`p`.`week_day_rank_id` = 1) then `p`.`id` end) AS `Lundi`,
  (case when (`p`.`week_day_rank_id` = 2) then `p`.`id` end) AS `Mardi`,
  (case when (`p`.`week_day_rank_id` = 3) then `p`.`id` end) AS `Mercredi`,
  (case when (`p`.`week_day_rank_id` = 4) then `p`.`id` end) AS `Jeudi`,
  (case when (`p`.`week_day_rank_id` = 5) then `p`.`id` end) AS `Vendredi`,
  (CASE WHEN (`p`.`week_day_rank_id` = 6)
    THEN `p`.`id` END)                                       AS `Samedi`
from (`transport_clients` `c` 
join `transport_programming_model` `p` 
on((`c`.`id` = `p`.`client_id`))) 
where (`p`.`visible` = 1) 
order by `p`.`heure`,`p`.`week_day_rank_id`,`c`.`liste_rank`;

-- --------------------------------------------------------



CREATE VIEW `transport_model` AS
  SELECT
    concat_ws('-', `p`.`heure`, `c`.`pseudo`, `c`.`id`) AS `PrimaryKey`,
    `p`.`heure`                                         AS `heure`,
    `p`.`week_day_rank_id`                              AS `jour`,
    `p`.`client_id`                                     AS `client_id`,
    `c`.`pseudo`                                        AS `pseudo`,
    `p`.`visible`                                       AS `visible`,
    `c`.`liste_restrictive`                             AS `liste_restrictive`,
    `c`.`liste_rank`                                    AS `client_sort`,
    `c`.`web_view`                                      AS `web_view`,
    `p`.`id`                                            AS `modele_id`,
    `p`.`inverse_address`                               AS `inverse_address`,
    `p`.`depart`                                        AS `depart`,
      `p`.`arrivee`                                              AS `arrivee`,
      `p`.`prix_course`                                          AS `prix_course`,
      `c`.`default_depart`                                       AS `default_depart`,
      `c`.`default_arrivee`                                      AS `default_arrivee`,
      `c`.`default_price`                                        AS `default_price`,
      `p`.`remarque`                                             AS `remarque`,
      `p`.`chauffeur_id`                                         AS `chauffeur_id`,
      `p`.`client_habituel`                                      AS `client_habituel`,
      (CASE WHEN (`p`.`week_day_rank_id` = 0)
        THEN `p`.`id` END)                                       AS `Dimanche`,
      (case when (`p`.`week_day_rank_id` = 1) then `p`.`id` end) AS `Lundi`,
      (case when (`p`.`week_day_rank_id` = 2) then `p`.`id` end) AS `Mardi`,
      (case when (`p`.`week_day_rank_id` = 3) then `p`.`id` end) AS `Mercredi`,
      (case when (`p`.`week_day_rank_id` = 4) then `p`.`id` end) AS `Jeudi`,
      (case when (`p`.`week_day_rank_id` = 5) then `p`.`id` end) AS `Vendredi`,
      (CASE WHEN (`p`.`week_day_rank_id` = 6)
        THEN `p`.`id` END)                                       AS `Samedi`

  from (`transport_clients` `c` join `transport_programming_model` `p`
on((`c`.`id` = `p`.`client_id`)))
  order by `p`.`heure`,`p`.`week_day_rank_id`,`c`.`liste_rank`;

-- --------------------------------------------------------

--
-- Structure for view `transport_model_pivot`
--


CREATE VIEW `transport_model_pivot` AS (
    select 
    `transport_model`.`heure` AS `heure`,
    `transport_model`.`pseudo` AS `pseudo`,
    `transport_model`.`web_view` AS `web_view`,
    `transport_model`.`client_id` AS `client_id`,
    max(`transport_model`.`Lundi`) AS `Lundi`,
    max(`transport_model`.`Mardi`) AS `Mardi`,
    max(`transport_model`.`Mercredi`) AS `Mercredi`,
    max(`transport_model`.`Jeudi`) AS `Jeudi`,
    max(`transport_model`.`Vendredi`) AS `Vendredi`,
    max(`transport_model`.`Samedi`) AS `Samedi`,
    max(`transport_model`.`Dimanche`) AS `Dimanche` 
    from `transport_model` 
    group by `transport_model`.`heure`,`transport_model`.`pseudo`,`transport_model`.`web_view`,`transport_model`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `transport_model_pivot_visible_no`
--


CREATE VIEW `transport_model_pivot_visible_no` AS (
    select 
    `transport_model_visible_no`.`heure` AS `heure`,
    `transport_model_visible_no`.`pseudo` AS `pseudo`,
    `transport_model_visible_no`.`web_view` AS `web_view`,
    `transport_model_visible_no`.`client_id` AS `client_id`,
    max(`transport_model_visible_no`.`Lundi`) AS `Lundi`,
    max(`transport_model_visible_no`.`Mardi`) AS `Mardi`,
    max(`transport_model_visible_no`.`Mercredi`) AS `Mercredi`,
    max(`transport_model_visible_no`.`Jeudi`) AS `Jeudi`,
    max(`transport_model_visible_no`.`Vendredi`) AS `Vendredi`,
    max(`transport_model_visible_no`.`Samedi`) AS `Samedi`,
    max(`transport_model_visible_no`.`Dimanche`) AS `Dimanche` 
    from `transport_model_visible_no` 
    group by `transport_model_visible_no`.`heure`,`transport_model_visible_no`.`pseudo`,`transport_model_visible_no`.`web_view`,`transport_model_visible_no`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `transport_model_pivot_visible_yes`
--


CREATE  VIEW `transport_model_pivot_visible_yes` AS (
    select 
    `transport_model_visible_yes`.`heure` AS `heure`,
    `transport_model_visible_yes`.`pseudo` AS `pseudo`,
    `transport_model_visible_yes`.`web_view` AS `web_view`,
    `transport_model_visible_yes`.`client_id` AS `client_id`,
    max(`transport_model_visible_yes`.`Lundi`) AS `Lundi`,
    max(`transport_model_visible_yes`.`Mardi`) AS `Mardi`,
    max(`transport_model_visible_yes`.`Mercredi`) AS `Mercredi`,
    max(`transport_model_visible_yes`.`Jeudi`) AS `Jeudi`,
    max(`transport_model_visible_yes`.`Vendredi`) AS `Vendredi`,
    max(`transport_model_visible_yes`.`Samedi`) AS `Samedi`,
    max(`transport_model_visible_yes`.`Dimanche`) AS `Dimanche` 
    from `transport_model_visible_yes` 
    group by `transport_model_visible_yes`.`heure`,`transport_model_visible_yes`.`pseudo`,`transport_model_visible_yes`.`web_view`,`transport_model_visible_yes`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `transport_model_visible_no`
--


--
-- Structure for view `transport_summary_by_course_date_program`
--


CREATE  VIEW `transport_summary_by_course_date_program` AS select distinct `transport_programming`.
`course_date` AS `course_date`,
(`transport_programming`.`course_date` - interval 1 day) AS `day_before`,
(`transport_programming`.`course_date` + interval 1 day) AS `day_after`,
unix_timestamp(`transport_programming`.`course_date`) AS `date_unix`
,cast(now() as date) AS `today`,
(to_days(`transport_programming`.`course_date`) - to_days(now())) AS `diff`
,(case 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) = -(1)) then 'yesterday' 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) = 1) then 'tomorrow' 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) < 0) 
then concat((to_days(`transport_programming`.`course_date`) - to_days(now())),' day') 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) > 0) 
then concat('+',(to_days(`transport_programming`.`course_date`) - to_days(now())),' day') 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) = 0) 
then 'now' else 'now' end) AS `str_time`,
(case when ((to_days(`transport_programming`.`course_date`) - to_days(now())) = -(1)) 
then 'hier' 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) = 1) 
then 'demain' 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) < 0) 
then concat('il y a ',-((to_days(`transport_programming`.`course_date`) - to_days(now()))),' jours') 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) > 0) 
then concat('dans ',(to_days(`transport_programming`.`course_date`) - to_days(now())),' jours') 
when ((to_days(`transport_programming`.`course_date`) - to_days(now())) = 0) 
then 'aujourd\'hui' else 'now' end) AS `str_time_fr`
,date_format(`transport_programming`.`course_date`,get_format(DATE, 'EUR')) AS `date_format`,
sec_to_time(((time_to_sec(now()) DIV 900) * 900)) AS `now_round_time`,
replace(substr(sec_to_time(((time_to_sec(now()) DIV 900) * 900)),1,5),':','h') AS `now_time_transmed`,
monthname(`transport_programming`.`course_date`) AS `monthname`,year(`transport_programming`.`course_date`) AS `year`,
week(`transport_programming`.`course_date`,0) AS `week`,count(`transport_programming`.`course_date`) AS `total_course`,
sum(if((`transport_programming`.`validated_chauffeur` = 0),1,0)) AS `valid_chauf_0`,
sum(if((`transport_programming`.`validated_chauffeur` = 1),1,0)) AS `valid_chauf_1`,
sum(if((`transport_programming`.`validated_chauffeur` = 2),1,0)) AS `valid_chauf_2`,
sum(if((`transport_programming`.`validated_mgr` = 0),1,0)) AS `valid_mgr_0`,
sum(if((`transport_programming`.`validated_mgr` = 1),1,0)) AS `valid_mgr_1`,
sum(if((`transport_programming`.`validated_final` = 0),1,0)) AS `valid_fina1_0`,
sum(if((`transport_programming`.`validated_final` = 1),1,0)) AS `valid_fina1_1`,
sum(if((`transport_programming`.`prix_course` = 0),1,0)) AS `prix_course_0`,
sum(((`transport_programming`.`chauffeur_id` = '') or isnull(`transport_programming`.`chauffeur_id`))) AS `erreur_chauffeur`,
sum(((`transport_programming`.`depart` = '') or isnull(`transport_programming`.`depart`) or (`transport_programming`.`arrivee` = '') or isnull(`transport_programming`.`arrivee`))) AS `erreur_address`,
sum(((`transport_programming`.`pseudo` = 'autres') or ((`transport_programming`.`pseudo` = 'colline') and ((`transport_programming`.`pseudo_autres` = '') or isnull(`transport_programming`.`pseudo_autres`))))) AS `erreur_autres`,
sum((((`transport_programming`.`pseudo` = 'tour_patient') 
or (`transport_programming`.`pseudo` = 'tag') 
or (`transport_programming`.`pseudo` = 'partners') 
or (`transport_programming`.`pseudo` = 'mines_icbl') 
or (`transport_programming`.`pseudo` = 'cash') 
or (`transport_programming`.`pseudo` = 'aude') 
or (`transport_programming`.`pseudo` = 'aloha')) 
and ((`transport_programming`.`nom_patient` = '') 
or isnull(`transport_programming`.`nom_patient`)))) AS `erreur_patients`,
sum(((`transport_programming`.`pseudo` = 'tour_sang') 
or ((`transport_programming`.`pseudo` = 'carouge_sang') 
and ((`transport_programming`.`bon_no` = '') 
or isnull(`transport_programming`.`bon_no`))))) AS `erreur_sang`,
sum(((`transport_programming`.`depart` = '') 
or isnull(`transport_programming`.`depart`) 
or (`transport_programming`.`arrivee` = '') 
or isnull(`transport_programming`.`arrivee`) 
or (((`transport_programming`.`pseudo` = 'tour_patient') 
or (`transport_programming`.`pseudo` = 'tag') 
or (`transport_programming`.`pseudo` = 'partners') 
or (`transport_programming`.`pseudo` = 'mines_icbl') 
or (`transport_programming`.`pseudo` = 'cash') 
or (`transport_programming`.`pseudo` = 'aude') 
or (`transport_programming`.`pseudo` = 'aloha')) 
and ((`transport_programming`.`nom_patient` = '') 
or isnull(`transport_programming`.`nom_patient`))) 
or (`transport_programming`.`pseudo` = 'autres') 
or ((`transport_programming`.`pseudo` = 'colline') 
and ((`transport_programming`.`pseudo_autres` = '') 
or isnull(`transport_programming`.`pseudo_autres`))) 
or (`transport_programming`.`pseudo` = 'tour_sang') 
or ((`transport_programming`.`pseudo` = 'carouge_sang') 
and ((`transport_programming`.`bon_no` = '') 
or isnull(`transport_programming`.`bon_no`))))) AS `erreur_general` 
from `transport_programming` 
group by `transport_programming`.`course_date` 
order by `transport_programming`.`course_date` desc;

