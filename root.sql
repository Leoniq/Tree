SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `root` (
  `id` int(11) NOT NULL,
  `root_name` varchar(20) NOT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=898 DEFAULT CHARSET=utf8;

ALTER TABLE `root`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `root`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
