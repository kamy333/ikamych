--
-- Structure for view `mycigarette_view_by_day`
--


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
    `p`.`id`                                            AS `modele_id`,
    `p`.`inverse_address`                               AS `inverse_address`,
    `p`.`depart`                                        AS `depart`,
    `p`.`arrivee`                                       AS `arrivee`,
    `p`.`prix_course`                                   AS `prix_course`,
    `c`.`default_depart`                                AS `default_depart`,
    `c`.`default_arrivee`                               AS `default_arrivee`,
    `c`.`default_price`                                 AS `default_price`,
    `p`.`remarque`                                      AS `remarque`,
    `p`.`chauffeur_id`                                  AS `chauffeur_id`,
    `p`.`client_habituel`                               AS `client_habituel`,
    (CASE WHEN (`p`.`week_day_rank_id` = 0)
      THEN `p`.`id` END)                                AS `Dimanche`,
    (CASE WHEN (`p`.`week_day_rank_id` = 1)
      THEN `p`.`id` END)                                AS `Lundi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 2)
      THEN `p`.`id` END)                                AS `Mardi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 3)
      THEN `p`.`id` END)                                AS `Mercredi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 4)
      THEN `p`.`id` END)                                AS `Jeudi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 5)
      THEN `p`.`id` END)                                AS `Vendredi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 6)
      THEN `p`.`id` END)                                AS `Samedi`
  FROM (`transport_clients` `c`
    JOIN `transport_programming_model` `p`
      ON ((`c`.`id` = `p`.`client_id`)))
  WHERE (`p`.`visible` = 0)
  ORDER BY `p`.`heure`, `p`.`week_day_rank_id`, `c`.`liste_rank`;

-- --------------------------------------------------------

--
-- Structure for view `transport_model_visible_yes`
--


CREATE VIEW `transport_model_visible_yes` AS
  SELECT
    concat_ws('-', `p`.`heure`, `c`.`pseudo`, `c`.`id`) AS `PrimaryKey`,
    `p`.`heure`                                         AS `heure`,
    `p`.`week_day_rank_id`                              AS `jour`,
    `p`.`client_id`                                     AS `client_id`,
    `c`.`pseudo`                                        AS `pseudo`,
    `c`.`liste_restrictive`                             AS `liste_restrictive`,
    `c`.`liste_rank`                                    AS `client_sort`,
    `c`.`web_view`                                      AS `web_view`,
    `p`.`id`                                            AS `modele_id`,
    `p`.`inverse_address`                               AS `inverse_address`,
    `p`.`depart`                                        AS `depart`,
    `p`.`arrivee`                                       AS `arrivee`,
    `p`.`prix_course`                                   AS `prix_course`,
    `c`.`default_depart`                                AS `default_depart`,
    `c`.`default_arrivee`                               AS `default_arrivee`,
    `c`.`default_price`                                 AS `default_price`,
    `p`.`remarque`                                      AS `remarque`,
    `p`.`chauffeur_id`                                  AS `chauffeur_id`,
    `p`.`client_habituel`                               AS `client_habituel`,

    (CASE WHEN (`p`.`week_day_rank_id` = 0)
      THEN `p`.`id` END)                                AS `Dimanche`,
    (CASE WHEN (`p`.`week_day_rank_id` = 1)
      THEN `p`.`id` END)                                AS `Lundi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 2)
      THEN `p`.`id` END)                                AS `Mardi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 3)
      THEN `p`.`id` END)                                AS `Mercredi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 4)
      THEN `p`.`id` END)                                AS `Jeudi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 5)
      THEN `p`.`id` END)                                AS `Vendredi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 6)
      THEN `p`.`id` END)                                AS `Samedi`
  FROM (`transport_clients` `c`
    JOIN `transport_programming_model` `p`
      ON ((`c`.`id` = `p`.`client_id`)))
  WHERE (`p`.`visible` = 1)
  ORDER BY `p`.`heure`, `p`.`week_day_rank_id`, `c`.`liste_rank`;

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
    `p`.`arrivee`                                       AS `arrivee`,
    `p`.`prix_course`                                   AS `prix_course`,
    `c`.`default_depart`                                AS `default_depart`,
    `c`.`default_arrivee`                               AS `default_arrivee`,
    `c`.`default_price`                                 AS `default_price`,
    `p`.`remarque`                                      AS `remarque`,
    `p`.`chauffeur_id`                                  AS `chauffeur_id`,
    `p`.`client_habituel`                               AS `client_habituel`,
    (CASE WHEN (`p`.`week_day_rank_id` = 0)
      THEN `p`.`id` END)                                AS `Dimanche`,
    (CASE WHEN (`p`.`week_day_rank_id` = 1)
      THEN `p`.`id` END)                                AS `Lundi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 2)
      THEN `p`.`id` END)                                AS `Mardi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 3)
      THEN `p`.`id` END)                                AS `Mercredi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 4)
      THEN `p`.`id` END)                                AS `Jeudi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 5)
      THEN `p`.`id` END)                                AS `Vendredi`,
    (CASE WHEN (`p`.`week_day_rank_id` = 6)
      THEN `p`.`id` END)                                AS `Samedi`

  FROM (`transport_clients` `c`
    JOIN `transport_programming_model` `p`
      ON ((`c`.`id` = `p`.`client_id`)))
  ORDER BY `p`.`heure`, `p`.`week_day_rank_id`, `c`.`liste_rank`;

-- --------------------------------------------------------

--
-- Structure for view `transport_model_pivot`
--


CREATE VIEW `transport_model_pivot` AS (
  SELECT
    `transport_model`.`heure`         AS `heure`,
    `transport_model`.`pseudo`        AS `pseudo`,
    `transport_model`.`web_view`      AS `web_view`,
    `transport_model`.`client_id`     AS `client_id`,
    max(`transport_model`.`Lundi`)    AS `Lundi`,
    max(`transport_model`.`Mardi`)    AS `Mardi`,
    max(`transport_model`.`Mercredi`) AS `Mercredi`,
    max(`transport_model`.`Jeudi`)    AS `Jeudi`,
    max(`transport_model`.`Vendredi`) AS `Vendredi`,
    max(`transport_model`.`Samedi`)   AS `Samedi`,
    max(`transport_model`.`Dimanche`) AS `Dimanche`
  FROM `transport_model`
  GROUP BY `transport_model`.`heure`, `transport_model`.`pseudo`, `transport_model`.`web_view`,
    `transport_model`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `transport_model_pivot_visible_no`
--


CREATE VIEW `transport_model_pivot_visible_no` AS (
  SELECT
    `transport_model_visible_no`.`heure`         AS `heure`,
    `transport_model_visible_no`.`pseudo`        AS `pseudo`,
    `transport_model_visible_no`.`web_view`      AS `web_view`,
    `transport_model_visible_no`.`client_id`     AS `client_id`,
    max(`transport_model_visible_no`.`Lundi`)    AS `Lundi`,
    max(`transport_model_visible_no`.`Mardi`)    AS `Mardi`,
    max(`transport_model_visible_no`.`Mercredi`) AS `Mercredi`,
    max(`transport_model_visible_no`.`Jeudi`)    AS `Jeudi`,
    max(`transport_model_visible_no`.`Vendredi`) AS `Vendredi`,
    max(`transport_model_visible_no`.`Samedi`)   AS `Samedi`,
    max(`transport_model_visible_no`.`Dimanche`) AS `Dimanche`
  FROM `transport_model_visible_no`
  GROUP BY `transport_model_visible_no`.`heure`, `transport_model_visible_no`.`pseudo`,
    `transport_model_visible_no`.`web_view`, `transport_model_visible_no`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `transport_model_pivot_visible_yes`
--


CREATE VIEW `transport_model_pivot_visible_yes` AS (
  SELECT
    `transport_model_visible_yes`.`heure`         AS `heure`,
    `transport_model_visible_yes`.`pseudo`        AS `pseudo`,
    `transport_model_visible_yes`.`web_view`      AS `web_view`,
    `transport_model_visible_yes`.`client_id`     AS `client_id`,
    max(`transport_model_visible_yes`.`Lundi`)    AS `Lundi`,
    max(`transport_model_visible_yes`.`Mardi`)    AS `Mardi`,
    max(`transport_model_visible_yes`.`Mercredi`) AS `Mercredi`,
    max(`transport_model_visible_yes`.`Jeudi`)    AS `Jeudi`,
    max(`transport_model_visible_yes`.`Vendredi`) AS `Vendredi`,
    max(`transport_model_visible_yes`.`Samedi`)   AS `Samedi`,
    max(`transport_model_visible_yes`.`Dimanche`) AS `Dimanche`
  FROM `transport_model_visible_yes`
  GROUP BY `transport_model_visible_yes`.`heure`, `transport_model_visible_yes`.`pseudo`,
    `transport_model_visible_yes`.`web_view`, `transport_model_visible_yes`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `transport_model_visible_no`
--


--
-- Structure for view `transport_summary_by_course_date_program`
--


CREATE VIEW `transport_summary_by_course_date_program` AS
  SELECT DISTINCT
    `transport_programming`.
    `course_date`                                                                                               AS `course_date`,
    (`transport_programming`.`course_date` -
     INTERVAL 1 DAY)                                                                                            AS `day_before`,
    (`transport_programming`.`course_date` +
     INTERVAL 1 DAY)                                                                                            AS `day_after`,
    unix_timestamp(
        `transport_programming`.`course_date`)                                                                  AS `date_unix`,
    cast(now() AS
         DATE)                                                                                                  AS `today`,
    (to_days(`transport_programming`.`course_date`) - to_days(
        now()))                                                                                                 AS `diff`,
    (CASE
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) = -(1))
       THEN 'yesterday'
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) = 1)
       THEN 'tomorrow'
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) < 0)
       THEN concat((to_days(`transport_programming`.`course_date`) - to_days(now())), ' day')
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) > 0)
       THEN concat('+', (to_days(`transport_programming`.`course_date`) - to_days(now())), ' day')
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) = 0)
       THEN 'now'
     ELSE 'now' END)                                                                                            AS `str_time`,
    (CASE WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) = -(1))
      THEN 'hier'
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) = 1)
       THEN 'demain'
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) < 0)
       THEN concat('il y a ', -((to_days(`transport_programming`.`course_date`) - to_days(now()))), ' jours')
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) > 0)
       THEN concat('dans ', (to_days(`transport_programming`.`course_date`) - to_days(now())), ' jours')
     WHEN ((to_days(`transport_programming`.`course_date`) - to_days(now())) = 0)
       THEN 'aujourd\'hui'
     ELSE 'now' END)                                                                                            AS `str_time_fr`,
    date_format(`transport_programming`.`course_date`, get_format(DATE,
                                                                  'EUR'))                                       AS `date_format`,
    sec_to_time(((time_to_sec(now()) DIV 900) *
                 900))                                                                                          AS `now_round_time`,
    replace(substr(sec_to_time(((time_to_sec(now()) DIV 900) * 900)), 1, 5), ':',
            'h')                                                                                                AS `now_time_transmed`,
    monthname(
        `transport_programming`.`course_date`)                                                                  AS `monthname`,
    year(
        `transport_programming`.`course_date`)                                                                  AS `year`,
    week(`transport_programming`.`course_date`,
         0)                                                                                                     AS `week`,
    count(
        `transport_programming`.`course_date`)                                                                  AS `total_course`,
    sum(if((`transport_programming`.`validated_chauffeur` = 0), 1,
           0))                                                                                                  AS `valid_chauf_0`,
    sum(if((`transport_programming`.`validated_chauffeur` = 1), 1,
           0))                                                                                                  AS `valid_chauf_1`,
    sum(if((`transport_programming`.`validated_chauffeur` = 2), 1,
           0))                                                                                                  AS `valid_chauf_2`,
    sum(if((`transport_programming`.`validated_mgr` = 0), 1,
           0))                                                                                                  AS `valid_mgr_0`,
    sum(if((`transport_programming`.`validated_mgr` = 1), 1,
           0))                                                                                                  AS `valid_mgr_1`,
    sum(if((`transport_programming`.`validated_final` = 0), 1,
           0))                                                                                                  AS `valid_fina1_0`,
    sum(if((`transport_programming`.`validated_final` = 1), 1,
           0))                                                                                                  AS `valid_fina1_1`,
    sum(if((`transport_programming`.`prix_course` = 0), 1,
           0))                                                                                                  AS `prix_course_0`,
    sum(((`transport_programming`.`chauffeur_id` = '') OR isnull(
        `transport_programming`.`chauffeur_id`)))                                                               AS `erreur_chauffeur`,
    sum(((`transport_programming`.`depart` = '') OR isnull(`transport_programming`.`depart`) OR
         (`transport_programming`.`arrivee` = '') OR isnull(
             `transport_programming`.`arrivee`)))                                                               AS `erreur_address`,
    sum(((`transport_programming`.`pseudo` = 'autres') OR ((`transport_programming`.`pseudo` = 'colline') AND
                                                           ((`transport_programming`.`pseudo_autres` = '') OR isnull(
                                                               `transport_programming`.`pseudo_autres`)))))     AS `erreur_autres`,
    sum((((`transport_programming`.`pseudo` = 'tour_patient')
          OR (`transport_programming`.`pseudo` = 'tag')
          OR (`transport_programming`.`pseudo` = 'partners')
          OR (`transport_programming`.`pseudo` = 'mines_icbl')
          OR (`transport_programming`.`pseudo` = 'cash')
          OR (`transport_programming`.`pseudo` = 'aude')
          OR (`transport_programming`.`pseudo` = 'aloha'))
         AND ((`transport_programming`.`nom_patient` = '')
              OR isnull(
                  `transport_programming`.`nom_patient`))))                                                     AS `erreur_patients`,
    sum(((`transport_programming`.`pseudo` = 'tour_sang')
         OR ((`transport_programming`.`pseudo` = 'carouge_sang')
             AND ((`transport_programming`.`bon_no` = '')
                  OR isnull(
                      `transport_programming`.`bon_no`)))))                                                     AS `erreur_sang`,
    sum(((`transport_programming`.`depart` = '')
         OR isnull(`transport_programming`.`depart`)
         OR (`transport_programming`.`arrivee` = '')
         OR isnull(`transport_programming`.`arrivee`)
         OR (((`transport_programming`.`pseudo` = 'tour_patient')
              OR (`transport_programming`.`pseudo` = 'tag')
              OR (`transport_programming`.`pseudo` = 'partners')
              OR (`transport_programming`.`pseudo` = 'mines_icbl')
              OR (`transport_programming`.`pseudo` = 'cash')
              OR (`transport_programming`.`pseudo` = 'aude')
              OR (`transport_programming`.`pseudo` = 'aloha'))
             AND ((`transport_programming`.`nom_patient` = '')
                  OR isnull(`transport_programming`.`nom_patient`)))
         OR (`transport_programming`.`pseudo` = 'autres')
         OR ((`transport_programming`.`pseudo` = 'colline')
             AND ((`transport_programming`.`pseudo_autres` = '')
                  OR isnull(`transport_programming`.`pseudo_autres`)))
         OR (`transport_programming`.`pseudo` = 'tour_sang')
         OR ((`transport_programming`.`pseudo` = 'carouge_sang')
             AND ((`transport_programming`.`bon_no` = '')
                  OR isnull(
                      `transport_programming`.`bon_no`)))))                                                     AS `erreur_general`
  FROM `transport_programming`
  GROUP BY `transport_programming`.`course_date`
  ORDER BY `transport_programming`.`course_date` DESC;

