SELECT *
FROM transport_chauffeurs
ORDER BY chauffeur_name ASC;

SELECT
  *,
  (CASE WHEN (chauffeur_id = 1)
    THEN modele_id END) AS 'Pablo ARZA',
  (CASE WHEN (chauffeur_id = 3)
    THEN modele_id END) AS 'Djamila AMRANI',
  (CASE WHEN (chauffeur_id = 4)
    THEN modele_id END) AS 'Pierre-Alain BONFILS'
FROM transport_model
ORDER BY chauffeur_id ASC
