CREATE DATABASE IF NOT EXISTS scorpio;

USE scorpio;


CREATE TABLE IF NOT EXISTS movies ( 
  id SERIAL PRIMARY KEY,   
  title VARCHAR(50),
  description TEXT
);


INSERT INTO `movies` (`id`, `title`, `description`) VALUES
(1, 'The Pale Blue Eye', 'A world-weary detective is hired to investigate the murder of a West Point cadet.'),
(2, 'white noise', 'Dramatizes a contemporary American family\'s attempts to deal with the mundane conflicts of everyday life while grappling with the universal mysteries of love, death, and the possibility of happiness in an uncertain world.');