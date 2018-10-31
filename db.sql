SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `epost` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL, 
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB;



INSERT INTO `users` (`userid`, `name`, `username`, `password`, `epost`, `phone`, `disc`) VALUES
(1, 'Namnet Efternament', 'Username', 'Password', 'epost@epost', '19711971', 'beskrivning');

