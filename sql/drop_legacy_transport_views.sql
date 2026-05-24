-- Drop legacy transport/course views.
-- Run this against the target ikamy database (local or production).
-- The DROP statements are safe to re-run because they use IF EXISTS.

USE `hhbz_ikamych2`;

-- Check current views before deleting.
SELECT TABLE_SCHEMA, TABLE_NAME
FROM information_schema.VIEWS
WHERE TABLE_SCHEMA = 'hhbz_ikamych2'
ORDER BY TABLE_NAME;

DROP VIEW IF EXISTS `hhbz_ikamych2`.`transport_model_pivot_visible_yes`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`transport_model_pivot_visible_no`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`transport_model_pivot`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`transport_summary_by_course_date_program`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`transport_model_visible_yes`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`transport_model_visible_no`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`transport_model`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`transport_view_adresse`;

-- Older names from previous dumps, in case production still has them.
DROP VIEW IF EXISTS `hhbz_ikamych2`.`modele_pivot_visible_yes`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`modele_pivot_visible_no`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`modele_pivot`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`summary_by_course_date_program`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`modele_visible_yes`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`modele_visible_no`;
DROP VIEW IF EXISTS `hhbz_ikamych2`.`modele`;

-- Check remaining views after deleting.
SELECT TABLE_SCHEMA, TABLE_NAME
FROM information_schema.VIEWS
WHERE TABLE_SCHEMA = 'hhbz_ikamych2'
ORDER BY TABLE_NAME;
