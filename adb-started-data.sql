
--
-- Database: `adb`
--

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(4, 'Amiens'),
(3, 'Beauvais'),
(1, 'Compiègne'),
(5, 'Friville'),
(6, 'Saint-Quentin'),
(7, 'Senlis'),
(2, 'Soissons');

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `location_id`, `name`, `mail`, `first_name`) VALUES
(1, 1, 'CASSAN', 'mf.cassan@promeo-formation.fr', 'Marie-Françoise'),
(2, 1, 'MAXIMY', 'i.maximy@promeo-formation.fr', 'Isabelle'),
(3, 2, 'QUEMART', 'l.quemart@promeo-formation.fr', 'Laetitia'),
(4, 3, 'BLIN', 'z.blin@promeo-formation.fr', 'Zorah'),
(5, 4, 'SYMIEN', 'c.symien@promeo-formation.fr', 'Catherine'),
(6, 4, 'CAILLY', 'a.cailly@promeo-formation.fr', 'Alexandra'),
(7, 5, 'POIRET', 'f.poiret@promeo-formation.fr', 'Fanny'),
(8, 6, 'HEYDT-BLANQUART', 'l.heydtblanquart@promeo-formation.fr', 'Laurence'),
(9, 6, 'CERISIER', 'l.cerisier@promeo-formation.fr', 'L'),
(10, 6, 'GUEDES', 'a.guedes@promeo-formation.fr', 'A'),
(11, 7, 'PAIN', 's.pain@promeo-formation.fr', 'Susan'),
(12, 7, 'DUMALANEDE', 'c.dumalanede@promeo-formation.fr', 'Cécile'),
(13, 7, 'QUEMART', 'l.quemart@promeo-formation.fr', 'Laetitia');

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `ckeditor`) VALUES
(1, '<hr />\r\n<p style=\"text-align:center\">&lt;a href=&quot;https://www.promeo-formation.fr&quot;&gt;<span style=\"font-size:14px\"><strong>PROMEO Formation</strong></span>&lt;/a&gt;</p>\r\n\r\n<p style=\"text-align:center\">1, avenue Eug&egrave;ne Gazaux 60300 Senlis</p>\r\n\r\n<p style=\"text-align:center\">03 44 63 81 63</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n');

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Anglais'),
(2, 'Allemand');

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`, `min_reponse`, `nb_question`) VALUES
(1, 'A1', 6, 10),
(2, 'A2', 8, 12),
(3, 'B1', 10, 14),
(4, 'B2', 12, 18),
(5, 'C1', 14, 20);



--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `token`, `is_active`, `roles`) VALUES
(1, 'demo', '$argon2id$v=19$m=65536,t=4,p=1$Sh1o1wQE3a43L3pO3IfbNg$UojHbEseSlq7YFN45N4u2wylA8pRIy75BW4tPszd1b4', 'demo@demo.fr', 1617096384, 1, '[\"ROLE_SUPER_ADMIN\"]');

