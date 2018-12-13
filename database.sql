-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2018 at 06:58 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-php-p5`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `content` longtext,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `date_add` date NOT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `content`, `image`, `active`, `date_add`, `date_update`) VALUES
(30, 'Google Pixel 3 XL', 'Une nouvelle façon de capturer vos temps forts grâce à l\'appareil photo du Pixel 3.', '&lt;h2&gt;Un design sobre, mais efficace&lt;/h2&gt;\r\n&lt;p&gt;Google ne r&amp;eacute;volutionne pas le design du smartphone, mais ce n&amp;rsquo;est pas ce que l&amp;rsquo;on attendait. Il reprend, en revanche, tous les &amp;eacute;l&amp;eacute;ments qui font un bon mobile : des bords arrondies qui offrent une bonne tenue en main, un &amp;eacute;cran occupant un maximum de surface sur la face avant pour ne pas cr&amp;eacute;er un smartphone trop encombrant et un capteur d&amp;rsquo;empreintes digitales plac&amp;eacute; sur la face arri&amp;egrave;re, &amp;agrave; l&amp;rsquo;endroit id&amp;eacute;al pour l&amp;rsquo;atteindre du doigt. En plus de ces points qui peuvent sembler tr&amp;egrave;s classique, la face arri&amp;egrave;re, &amp;agrave; moiti&amp;eacute; en verre mat, &amp;agrave; moiti&amp;eacute; en verre brillant, est une r&amp;eacute;ussite.&lt;/p&gt;\r\n&lt;p&gt;Comme sur la plupart des mobiles r&amp;eacute;cents, la prise jack a disparu au profit d&amp;rsquo;un unique port USB de type-C utilis&amp;eacute; pour la connexion des &amp;eacute;couteurs et la recharge. Un adaptateur est pr&amp;eacute;sent dans la boite pour ceux qui disposent d\'un casque &amp;eacute;quip&amp;eacute; d&amp;rsquo;une prise mini-jack. Seul b&amp;eacute;mol, le bouton de verrouillage, plac&amp;eacute; un peu haut sur la tranche, est difficilement accessible. Le d&amp;eacute;verrouillage par empreintes digitales permet cependant de moins le sollicite&lt;/p&gt;\r\n&lt;h2&gt;Un bel &amp;eacute;cran, un smartphone puissant&lt;/h2&gt;\r\n&lt;p&gt;Sur le mod&amp;egrave;le XL que nous avons test&amp;eacute;, Google a opt&amp;eacute; pour un &amp;eacute;cran OLED de 6,3 pouces d&amp;rsquo;une d&amp;eacute;finition de 2.960 x 1.440 pixels. L&amp;rsquo;usage de cette technologie - &amp;eacute;galement pr&amp;eacute;sente sur le Galaxy S9 ou sur les iPhone XS er XS Max - permet de proposer un &amp;eacute;cran aux couleurs plus vives, au meilleur taux de contraste et avec des noirs plus profonds. Lorsqu&amp;rsquo;un &amp;eacute;cran OLED affiche du noir, ses pixels sont en effet &amp;eacute;teints. A l&amp;rsquo;usage, l&amp;rsquo;&amp;eacute;cran du Pixel 3 XL est tr&amp;egrave;s r&amp;eacute;ussi : les couleurs sont justes et le niveau de contraste excellent. Seule la luminosit&amp;eacute; est un peu en de&amp;ccedil;&amp;agrave;, et peut s&amp;rsquo;av&amp;eacute;rer insuffisante en plein soleil.&lt;/p&gt;\r\n&lt;h2&gt;La photo, le point fort&lt;/h2&gt;\r\n&lt;p&gt;Alors que certains constructeurs multiplient les capteurs photo, Google persiste et signe : les Pixel 3 ne sont &amp;eacute;quip&amp;eacute;s que d&amp;rsquo;un seul appareil. Mais cela ne pose pas vraiment de probl&amp;egrave;mes. Une fois la photo prise par le capteur de 12MPixels, l&amp;rsquo;intelligence artificielle du smartphone travaille pour am&amp;eacute;liorer la prise de vue. R&amp;eacute;sultat : les clich&amp;eacute;s r&amp;eacute;alis&amp;eacute;s par le Google Pixel 3 XL sont au niveau de ceux de l&amp;rsquo;iPhone XS Max, lui &amp;eacute;quip&amp;eacute; d&amp;rsquo;un double capteur photo. Les couleurs sont m&amp;ecirc;me plus justes que sur le Huawei P20 Pro, &amp;eacute;quip&amp;eacute; de trois appareils.&lt;/p&gt;\r\n&lt;p&gt;La gestion de la luminosit&amp;eacute; du Pixel 3 XL est assez diff&amp;eacute;rente de celle des autres smartphones du march&amp;eacute;, avec des images parfois un peu plus sombres, mais plus d&amp;eacute;taill&amp;eacute;es. R&amp;eacute;sultat : de nuit, bien que le r&amp;eacute;sultat reste imparfait, il s&amp;rsquo;impose au-dessus des autres appareils haut de gamme avec des couleurs plus vives et des &amp;eacute;l&amp;eacute;ments plus d&amp;eacute;taill&amp;eacute;s.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'google-pixel-3-3-xl-evleaks-rose.jpg', 1, '2018-12-07', '2018-12-08'),
(31, 'Acer Chromebook R11 ', 'Le R11 d\'Acer est l\'un des rares Chromebook tactiles. Profitant d\'une charnière qui pivote à 270°, il peut être utilisé aussi bien comme un PC portable que comme une tablette.', '&lt;h2&gt;Qu&amp;rsquo;est-ce que l&amp;rsquo;Acer Chromebook CB5-132T (R11) ?&lt;/h2&gt;\r\n&lt;p&gt;L&amp;rsquo;Acer Chromebook CB5-132T est un ordinateur portable tactile de 11 pouces avec une d&amp;eacute;finition d&amp;rsquo;&amp;eacute;cran de 1366 x 768.&lt;/p&gt;\r\n&lt;p&gt;Ce chromebook est une approche hybride de l&amp;rsquo;ordinateur portable par Acer, qui a voulu combiner les avantages de chrome OS et les facilit&amp;eacute;s d&amp;rsquo;un &amp;eacute;cran tactile.&lt;/p&gt;\r\n&lt;p&gt;L&amp;rsquo;Acer Chromebook CB5-132T r&amp;eacute;ussit &amp;agrave; &amp;ecirc;tre un ordinateur portable beau, pratique et rapide tout en gardant un prix tr&amp;egrave;s correct gr&amp;acirc;ce &amp;agrave; l&amp;rsquo;utilisation de chrome OS. Continuez la lecture de ce test pour savoir en quoi ce chromebook vaut vraiment le d&amp;eacute;tour.&lt;/p&gt;\r\n&lt;h2&gt;Design&lt;/h2&gt;\r\n&lt;p&gt;L&amp;rsquo;Acer Chromebook CB5-132T est un ordinateur portable de petite taille, 11 pouces, ce qui permet de le glisser facilement dans un sac pour le transporter. Il est &amp;eacute;galement relativement l&amp;eacute;ger avec 1,4 kilogrammes, et son &amp;eacute;cran repliable &amp;agrave; 360 degr&amp;eacute;s permet de l&amp;rsquo;utiliser comme tablette.&lt;/p&gt;\r\n&lt;p&gt;&amp;Agrave; cause de cette &amp;eacute;cran repliable, les courbes de l&amp;rsquo;Acer Chromebook CB5-132T ne sont pas aussi belles que celles d&amp;rsquo;un Toshiba Chromebook 2 ou d&amp;rsquo;un Macbook, mais &amp;ccedil;a ne le rend pas laid pour autant. Sa couleur blanche lui donne un air frais et innovant, et son plastique de bonne qualit&amp;eacute; le rend &amp;eacute;l&amp;eacute;gant et solide.&lt;/p&gt;\r\n&lt;p&gt;Les connexions sont basiques mais les &amp;eacute;l&amp;eacute;ments les plus importants sont pr&amp;eacute;sents. Le chromebook dispose d&amp;rsquo;un port HDMI, de deux ports USB donc un port 3.0 et d&amp;rsquo;une prise jack 3,5mm pour l&amp;rsquo;audio. Un port pour carte SD est &amp;eacute;galement accessible sur la gauche.&lt;/p&gt;\r\n&lt;h2&gt;&amp;Eacute;cran et son&lt;/h2&gt;\r\n&lt;p&gt;L&amp;rsquo;&amp;eacute;cran du R11 est petit mais beau gr&amp;acirc;ce &amp;agrave; sa techologie IPS. Les couleurs sont riches et brillantes, ce qui rend le visionnage de vid&amp;eacute;os tr&amp;egrave;s agr&amp;eacute;able et confortable gr&amp;acirc;ce au mode tablette. Les angles de vue sont &amp;eacute;galement plus grands que sur d&amp;rsquo;autres &amp;eacute;crans, et il n&amp;rsquo;est donc pas n&amp;eacute;cessaire de se trouver juste en face de l&amp;rsquo;&amp;eacute;cran pour voir tout ce qui est affich&amp;eacute;.&lt;/p&gt;\r\n&lt;p&gt;En ext&amp;eacute;rieur, la luminosit&amp;eacute; de l&amp;rsquo;&amp;eacute;cran est un peu limite et l&amp;rsquo;utilisation de cet ordinateur n&amp;rsquo;est vraiment pas optimale en plein soleil.&lt;/p&gt;\r\n&lt;p&gt;Au niveau du son, l&amp;rsquo;appareil dispose de trois haut-parleurs, situ&amp;eacute;s en bas et des deux c&amp;ocirc;t&amp;eacute;s du chromebook. Ceci lui permet de d&amp;eacute;livrer un son clair qui n&amp;rsquo;est pas obstru&amp;eacute; en &amp;eacute;tant d&amp;eacute;pos&amp;eacute; sur une surface. Gr&amp;acirc;ce &amp;agrave; ces haut-parleurs, la consommation de vid&amp;eacute;os et de musique est vraiment agr&amp;eacute;able.&lt;/p&gt;\r\n&lt;p&gt;L&amp;rsquo;&amp;eacute;cran tactile et r&amp;eacute;versible du chromebook offre d&amp;eacute;j&amp;agrave; pas mal d&amp;rsquo;avantages comme un meilleur confort et plus de possibilit&amp;eacute;s de navigation. Cependant, avec l&amp;rsquo;arriv&amp;eacute;e du Play Store sur chromebook imminente, ses possibilit&amp;eacute;s seront d&amp;eacute;multipli&amp;eacute;es et il offrira une excellente solution pour utiliser les fonctionnalit&amp;eacute;s tactiles de certaines applications Android.&lt;/p&gt;\r\n&lt;h2&gt;Clavier et pav&amp;eacute; tactile&lt;/h2&gt;\r\n&lt;p&gt;Malgr&amp;eacute; la petite taille du chromebook, les touches de son clavier sont de taille correcte et bien espac&amp;eacute;es. Elles sont r&amp;eacute;actives et la frappe y est confortable, en particulier gr&amp;acirc;ce &amp;agrave; l&amp;rsquo;espace disponible pour reposer ses poignets autour du pav&amp;eacute; tactile.&lt;/p&gt;\r\n&lt;p&gt;Ce pav&amp;eacute; tactile est d&amp;rsquo;ailleurs lui aussi de bonne qualit&amp;eacute;. La glisse est fluide, la pr&amp;eacute;cision est correcte, et sa taille n&amp;rsquo;est pas trop r&amp;eacute;duite malgr&amp;eacute; la petite taille de l&amp;rsquo;appareil.&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Note&lt;/em&gt; : il est important de savoir que le clavier et le pav&amp;eacute; tactile des chromebook sont diff&amp;eacute;rents de ceux des pc Windows ou des Mac. Pour en savoir plus sur ces diff&amp;eacute;rences, vous pouvez lire cet article.&lt;/p&gt;\r\n&lt;h2&gt;Performances et connectivit&amp;eacute;&lt;/h2&gt;\r\n&lt;p&gt;L&amp;rsquo;Acer R11 est &amp;eacute;quip&amp;eacute; d&amp;rsquo;un processeur Intel Celeron et de 4Go de RAM, dont il tire le maximum gr&amp;acirc;ce aux optimisations de chrome OS. Les pages web chargent rapidement et la lecture de vid&amp;eacute;o Youtube fonctionne sans soucis&lt;/p&gt;\r\n&lt;p&gt;L&amp;rsquo;&amp;eacute;cran tactile et r&amp;eacute;versible du chromebook fonctionne &amp;eacute;galement tr&amp;egrave;s bien et aide &amp;agrave; naviguer encore plus rapidement et confortablement que sur les chromebook non tactiles. Passer en mode tablette et naviguer totalement en mode tactile est donc non seulement pratique mais &amp;eacute;galement rapide.&lt;/p&gt;\r\n&lt;p&gt;Ce chromebook dispose d&amp;rsquo;une double bande Wi-Fi qui lui assure une connectivit&amp;eacute; rapide ainsi que le Bluetooth 4.0, pratique pour le connecter &amp;agrave; d&amp;rsquo;autres appareils. Globalement, le R11 dispose d&amp;rsquo;une tr&amp;egrave;s bonne connectivit&amp;eacute;, autant au niveau de son WiFi que de son Bluetooth.&lt;/p&gt;\r\n&lt;h2&gt;Dur&amp;eacute;e de batterie&lt;/h2&gt;\r\n&lt;p&gt;La dur&amp;eacute;e de batterie de l&amp;rsquo;Acer Chromebook CB5-132T est largement suffisante pour tenir une journ&amp;eacute;e enti&amp;egrave;re sans besoin de charger son chromebook. En moyenne, la batterie tient de 8 &amp;agrave; 10 heures sans devoir &amp;ecirc;tre charg&amp;eacute;e.&lt;/p&gt;\r\n&lt;p&gt;Le chargement du chromebook est &amp;eacute;galement rapide, ce qui permet de lui redonner quelques heures de charge en seulement quelques dizaines de minutes.&lt;/p&gt;\r\n&lt;p&gt;Sa longue dur&amp;eacute;e de batterie rend l&amp;rsquo;Acer Chromebook CB5-132T un tr&amp;egrave;s bon outil pour les longues journ&amp;eacute;es de cours, les longs trajets en train ou les longues soir&amp;eacute;es &amp;agrave; consommer des vid&amp;eacute;os ou lire des articles.&lt;/p&gt;\r\n&lt;h2&gt;Devriez-vous acheter l&amp;rsquo;Acer Chromebook CB5-132T (R11) ?&lt;/h2&gt;\r\n&lt;p&gt;De petite taille, l&amp;rsquo;Acer Chromebook CB5-132T est parfait pour se glisser dans un sac et &amp;ecirc;tre emmen&amp;eacute; partout. Gr&amp;acirc;ce &amp;agrave; sa longue batterie et sa tr&amp;egrave;s bonne connectivit&amp;eacute;, il est l&amp;rsquo;ordinateur portable mobile parfait.&lt;/p&gt;\r\n&lt;p&gt;Son bel &amp;eacute;cran IPS tactile r&amp;eacute;versible et ses bonnes performances le rendent un tr&amp;egrave;s bon outil de navigation sur le web, et gr&amp;acirc;ce &amp;agrave; ses fonctionnalit&amp;eacute;s tactiles, il peut prendre pleinement parti des applications Android.&lt;/p&gt;\r\n&lt;h2&gt;Verdict&lt;/h2&gt;\r\n&lt;p&gt;Si vous voulez un ordinateur portable mobile, rapide, et que les fonctionnalit&amp;eacute;s tactiles vous int&amp;eacute;ressent, l&amp;rsquo;Acer Chromebook CB5-132T est un choix tr&amp;egrave;s solide.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'acer_chromebook-r11_white_360-100612188-orig.jpg', 1, '2018-12-08', '2018-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'Romain Ollier', 'romain@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
