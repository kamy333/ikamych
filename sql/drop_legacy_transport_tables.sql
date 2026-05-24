-- Drop legacy transport/course tables.
-- Run drop_legacy_transport_views.sql first if the target database still has legacy transport views.
-- This file deletes data. Confirm you have a backup before running it in production.

USE `hhbz_ikamych2`;

-- Check which legacy tables exist before deleting.
SELECT TABLE_SCHEMA, TABLE_NAME, TABLE_ROWS
FROM information_schema.TABLES
WHERE TABLE_SCHEMA = 'hhbz_ikamych2'
  AND TABLE_NAME IN (
    'course',
    'transport_chauffeurs',
    'transport_clients',
    'transport_programming',
    'transport_programming_model',
    'transport_type',
    'programmed_courses',
    'programmed_courses_modele'
  )
ORDER BY TABLE_NAME;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `hhbz_ikamych2`.`course`;
DROP TABLE IF EXISTS `hhbz_ikamych2`.`transport_programming`;
DROP TABLE IF EXISTS `hhbz_ikamych2`.`transport_programming_model`;
DROP TABLE IF EXISTS `hhbz_ikamych2`.`transport_type`;
DROP TABLE IF EXISTS `hhbz_ikamych2`.`transport_chauffeurs`;
DROP TABLE IF EXISTS `hhbz_ikamych2`.`transport_clients`;

-- Older table names from previous dumps, in case production still has them.
DROP TABLE IF EXISTS `hhbz_ikamych2`.`programmed_courses`;
DROP TABLE IF EXISTS `hhbz_ikamych2`.`programmed_courses_modele`;

SET FOREIGN_KEY_CHECKS = 1;

-- Check that the legacy tables are gone.
SELECT TABLE_SCHEMA, TABLE_NAME, TABLE_ROWS
FROM information_schema.TABLES
WHERE TABLE_SCHEMA = 'hhbz_ikamych2'
  AND TABLE_NAME IN (
    'course',
    'transport_chauffeurs',
    'transport_clients',
    'transport_programming',
    'transport_programming_model',
    'transport_type',
    'programmed_courses',
    'programmed_courses_modele'
  )
ORDER BY TABLE_NAME;
