// Actors
php bin/console doctrine:query:sql 'INSERT INTO `actor` (`name`) VALUES ("Andrew Lincoln");'
php bin/console doctrine:query:sql 'INSERT INTO `actor` (`name`) VALUES ("Norman Reedus") ;'
php bin/console doctrine:query:sql 'INSERT INTO `actor` (`name`) VALUES ("Lauren Cohan") ;'
php bin/console doctrine:query:sql 'INSERT INTO `actor` (`name`) VALUES ("Danai Gurira") ;'

// Relation between actors and programs
php bin/console doctrine:query:sql 'INSERT INTO `actor_program` (`actor_id`,`program_id`) VALUES (1,1), (2,1), (3,1),
(4,1), (1, 6);'

php bin/console doctrine:query:sql 'INSERT INTO `actor_program` (`actor_id`,`program_id`) VALUES (1, 6);'