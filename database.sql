-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2019 at 06:22 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_comment` (`id_post`),
  KEY `user_comment` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppp` int(11) NOT NULL DEFAULT '2',
  `characters` int(11) NOT NULL DEFAULT '500',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `ppp`, `characters`) VALUES
(1, 2, 500);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `content` longtext,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `id_user` int(11) DEFAULT NULL,
  `date_add` date NOT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `content`, `image`, `active`, `id_user`, `date_add`, `date_update`) VALUES
(1, 'Google Pixel 3 XL', '\"Made by Google\", c’est le slogan de Google pour ses smartphones Pixel qui sont pour la première fois commercialisés en France. De fait, tout dans ces smartphones est pensé par Google : du design au logiciel en passant par le capteur photo.', '&lt;h2&gt;Un design sobre, mais efficace&lt;/h2&gt;\r\n&lt;p&gt;Google ne r&amp;eacute;volutionne pas le design du smartphone, mais ce n&amp;rsquo;est pas ce que l&amp;rsquo;on attendait. Il reprend, en revanche, tous les &amp;eacute;l&amp;eacute;ments qui font un bon mobile : des bords arrondies qui offrent une bonne tenue en main, un &amp;eacute;cran occupant un maximum de surface sur la face avant pour ne pas cr&amp;eacute;er un smartphone trop encombrant et un capteur d&amp;rsquo;empreintes digitales plac&amp;eacute; sur la face arri&amp;egrave;re, &amp;agrave; l&amp;rsquo;endroit id&amp;eacute;al pour l&amp;rsquo;atteindre du doigt. En plus de ces points qui peuvent sembler tr&amp;egrave;s classique, la face arri&amp;egrave;re, &amp;agrave; moiti&amp;eacute; en verre mat, &amp;agrave; moiti&amp;eacute; en verre brillant, est une r&amp;eacute;ussite.&lt;/p&gt;\r\n&lt;p&gt;Comme sur la plupart des mobiles r&amp;eacute;cents, la prise jack a disparu au profit d&amp;rsquo;un unique port USB de type-C utilis&amp;eacute; pour la connexion des &amp;eacute;couteurs et la recharge. Un adaptateur est pr&amp;eacute;sent dans la boite pour ceux qui disposent d\'un casque &amp;eacute;quip&amp;eacute; d&amp;rsquo;une prise mini-jack. Seul b&amp;eacute;mol, le bouton de verrouillage, plac&amp;eacute; un peu haut sur la tranche, est difficilement accessible. Le d&amp;eacute;verrouillage par empreintes digitales permet cependant de moins le solliciter.&lt;/p&gt;\r\n&lt;h2&gt;Un bel &amp;eacute;cran, un smartphone puissant&lt;/h2&gt;\r\n&lt;p&gt;Sur le mod&amp;egrave;le XL que nous avons test&amp;eacute;, Google a opt&amp;eacute; pour un &amp;eacute;cran OLED de 6,3 pouces d&amp;rsquo;une d&amp;eacute;finition de 2.960 x 1.440 pixels. L&amp;rsquo;usage de cette technologie - &amp;eacute;galement pr&amp;eacute;sente sur le Galaxy S9 ou sur les iPhone XS er XS Max - permet de proposer un &amp;eacute;cran aux couleurs plus vives, au meilleur taux de contraste et avec des noirs plus profonds. Lorsqu&amp;rsquo;un &amp;eacute;cran OLED affiche du noir, ses pixels sont en effet &amp;eacute;teints. A l&amp;rsquo;usage, l&amp;rsquo;&amp;eacute;cran du Pixel 3 XL est tr&amp;egrave;s r&amp;eacute;ussi : les couleurs sont justes et le niveau de contraste excellent. Seule la luminosit&amp;eacute; est un peu en de&amp;ccedil;&amp;agrave;, et peut s&amp;rsquo;av&amp;eacute;rer insuffisante en plein soleil.&lt;/p&gt;\r\n&lt;p&gt;Pour faire rentrer les capteurs avant et le haut-parleur, Google a ajout&amp;eacute; une encoche en haut de l&amp;rsquo;&amp;eacute;cran. Depuis l&amp;rsquo;annonce du Pixel 3 XL, elle a beaucoup fait parler. Assez imposante, certains la trouve g&amp;ecirc;nante &amp;agrave; l&amp;rsquo;usage. Mais apr&amp;egrave;s plus d&amp;rsquo;une semaine, nous ne l\'avons pas trouv&amp;eacute; probl&amp;eacute;matique. Et elle est plut&amp;ocirc;t bien g&amp;eacute;r&amp;eacute;e par les applications qui la font dispara&amp;icirc;tre gr&amp;acirc;ce &amp;agrave; une barre noire.&lt;/p&gt;\r\n&lt;p&gt;Pour ce qui est des performances, le Pixel 3 XL est &amp;agrave; la hauteur de tous ses concurrents gr&amp;acirc;ce &amp;agrave; son processeur Snapdragon 845 et ses 4Go de m&amp;eacute;moire vive. Il est largement capable de faire tourner toutes les applications, y compris les plus gourmandes en &amp;eacute;nergie. Et sa gestion de la batterie s&amp;rsquo;av&amp;egrave;re tr&amp;egrave;s bonne. On peut en effet tenir une journ&amp;eacute;e et demie sans recharger son smartphone.&lt;/p&gt;\r\n&lt;h2&gt;Android, comme on voudrait le trouver partout&lt;/h2&gt;\r\n&lt;p&gt;Plus que cela, la force de Google avec ses appareils est de ma&amp;icirc;triser le produit, mais aussi son logiciel. A l&amp;rsquo;usage, on d&amp;eacute;couvre donc la toute derni&amp;egrave;re version d&amp;rsquo;Android, 9.0 Pie, telle que l&amp;rsquo;a pens&amp;eacute;e le constructeur. Pour qui a l&amp;rsquo;habitude d&amp;rsquo;utiliser un smartphone Samsung, Huawei ou LG, l&amp;rsquo;exp&amp;eacute;rience peut sembler totalement nouvelle. Ces constructeurs, bien qu&amp;rsquo;utilisant Android, font g&amp;eacute;n&amp;eacute;ralement de nombreux ajouts. Dans cette version \"pure\" d&amp;rsquo;Android, les menus sont simples, la navigation est ergonomique et les applications de base (appareil photo, calculatrice&amp;hellip;) sont compl&amp;egrave;tes.&lt;/p&gt;\r\n&lt;p&gt;Sur l&amp;rsquo;&amp;eacute;cran de verrouillage, Google propose d&amp;rsquo;afficher l&amp;rsquo;heure, la date et la m&amp;eacute;t&amp;eacute;o en permanence. Il est &amp;eacute;galement possible d&amp;rsquo;afficher les ic&amp;ocirc;nes des applications sur lesquelles des notifications sont visibles. Pour ceux qui disposent du Pixel Stand (le chargeur sans fil de Google vendu en option), d&amp;rsquo;autres fonctions permettent d&amp;rsquo;utiliser son smartphone comme station d&amp;rsquo;accueil ou comme r&amp;eacute;veil en mimant la lumi&amp;egrave;re du jour sur l&amp;rsquo;&amp;eacute;cran.&lt;/p&gt;\r\n&lt;h2&gt;La photo, le point fort&lt;/h2&gt;\r\n&lt;p&gt;Alors que certains constructeurs multiplient les capteurs photo, Google persiste et signe : les Pixel 3 ne sont &amp;eacute;quip&amp;eacute;s que d&amp;rsquo;un seul appareil. Mais cela ne pose pas vraiment de probl&amp;egrave;mes. Une fois la photo prise par le capteur de 12MPixels, l&amp;rsquo;intelligence artificielle du smartphone travaille pour am&amp;eacute;liorer la prise de vue. R&amp;eacute;sultat : les clich&amp;eacute;s r&amp;eacute;alis&amp;eacute;s par le Google Pixel 3 XL sont au niveau de ceux de l&amp;rsquo;iPhone XS Max, lui &amp;eacute;quip&amp;eacute; d&amp;rsquo;un double capteur photo. Les couleurs sont m&amp;ecirc;me plus justes que sur le Huawei P20 Pro, &amp;eacute;quip&amp;eacute; de trois appareils.&lt;/p&gt;\r\n&lt;p&gt;La gestion de la luminosit&amp;eacute; du Pixel 3 XL est assez diff&amp;eacute;rente de celle des autres smartphones du march&amp;eacute;, avec des images parfois un peu plus sombres, mais plus d&amp;eacute;taill&amp;eacute;es. R&amp;eacute;sultat : de nuit, bien que le r&amp;eacute;sultat reste imparfait, il s&amp;rsquo;impose au-dessus des autres appareils haut de gamme avec des couleurs plus vives et des &amp;eacute;l&amp;eacute;ments plus d&amp;eacute;taill&amp;eacute;s.&lt;/p&gt;\r\n&lt;h2&gt;Notre avis&lt;/h2&gt;\r\n&lt;p&gt;Apr&amp;egrave;s trois g&amp;eacute;n&amp;eacute;rations, Google commercialise pour la premi&amp;egrave;re fois ses Pixel en France. Il a donc eu le temps d&amp;rsquo;am&amp;eacute;liorer ses smartphones. R&amp;eacute;sultat : le Pixel 3 XL est &amp;agrave; la hauteur des attentes. Il offre un design r&amp;eacute;ussi, un &amp;eacute;cran bien calibr&amp;eacute;, un processeur puissant, une bonne autonomie et surtout une version \"pure\" d&amp;rsquo;Android particuli&amp;egrave;rement agr&amp;eacute;able &amp;agrave; utiliser. Quand &amp;agrave; la photo, le Pixel 3 XL se place comme une r&amp;eacute;f&amp;eacute;rence en la mati&amp;egrave;re. Il aurait &amp;eacute;t&amp;eacute; parfait... pour cent euros de moins.&lt;/p&gt;', 'pixel3xl.jpg', 1, 3, '2019-01-02', NULL),
(2, 'Acer Chromebook R11', 'L’Acer Chromebook CB5-132T est un ordinateur portable tactile de 11 pouces avec une définition d’écran de 1366 x 768.', '&lt;p&gt;Ce chromebook est une approche hybride de l&amp;rsquo;ordinateur portable par Acer, qui a voulu combiner les avantages de chrome OS et les facilit&amp;eacute;s d&amp;rsquo;un &amp;eacute;cran tactile.&lt;/p&gt;\r\n&lt;p&gt;L&amp;rsquo;Acer Chromebook CB5-132T r&amp;eacute;ussit &amp;agrave; &amp;ecirc;tre un ordinateur portable beau, pratique et rapide tout en gardant un prix tr&amp;egrave;s correct gr&amp;acirc;ce &amp;agrave; l&amp;rsquo;utilisation de chrome OS.&amp;nbsp;Continuez la lecture de ce test pour savoir en quoi ce chromebook vaut vraiment le d&amp;eacute;tour.&lt;/p&gt;\r\n&lt;h2&gt;&lt;span id=\"Design\"&gt;Design&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p&gt;L&amp;rsquo;Acer Chromebook CB5-132T est un ordinateur portable de petite taille, 11 pouces, ce qui permet de le glisser facilement dans un sac pour le transporter. Il est &amp;eacute;galement relativement l&amp;eacute;ger avec 1,4 kilogrammes, et son &amp;eacute;cran repliable &amp;agrave; 360 degr&amp;eacute;s permet de l&amp;rsquo;utiliser comme tablette.&lt;/p&gt;\r\n&lt;p&gt;&amp;Agrave; cause de cette &amp;eacute;cran repliable, les courbes de l&amp;rsquo;Acer Chromebook CB5-132T ne sont pas aussi belles que celles d&amp;rsquo;un Toshiba Chromebook 2 ou d&amp;rsquo;un Macbook, mais &amp;ccedil;a ne le rend pas laid pour autant. Sa couleur blanche lui donne un air frais et innovant, et son plastique de bonne qualit&amp;eacute; le rend &amp;eacute;l&amp;eacute;gant et solide.&lt;/p&gt;\r\n&lt;p&gt;Les connexions sont basiques mais les &amp;eacute;l&amp;eacute;ments les plus importants sont pr&amp;eacute;sents. Le chromebook dispose d&amp;rsquo;un port HDMI, de deux ports USB donc un port 3.0 et d&amp;rsquo;une prise jack 3,5mm pour l&amp;rsquo;audio. Un port pour carte SD est &amp;eacute;galement accessible sur la gauche.&lt;/p&gt;\r\n&lt;h2&gt;&lt;span id=\"Ecran_et_son\"&gt;&amp;Eacute;cran et son&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p&gt;L&amp;rsquo;&amp;eacute;cran du R11&amp;nbsp;est petit mais beau gr&amp;acirc;ce &amp;agrave; sa&amp;nbsp;techologie IPS. Les couleurs sont riches et brillantes, ce qui rend le visionnage de vid&amp;eacute;os tr&amp;egrave;s agr&amp;eacute;able et confortable gr&amp;acirc;ce au mode tablette. Les angles de vue sont&amp;nbsp;&amp;eacute;galement plus grands que sur d&amp;rsquo;autres &amp;eacute;crans, et il n&amp;rsquo;est donc pas n&amp;eacute;cessaire de se trouver juste en face de l&amp;rsquo;&amp;eacute;cran pour voir tout ce qui est affich&amp;eacute;.&lt;/p&gt;\r\n&lt;p&gt;En ext&amp;eacute;rieur, la luminosit&amp;eacute; de l&amp;rsquo;&amp;eacute;cran est un peu limite et l&amp;rsquo;utilisation de cet ordinateur n&amp;rsquo;est vraiment pas optimale en plein soleil.&lt;/p&gt;\r\n&lt;p&gt;Au niveau du son, l&amp;rsquo;appareil&amp;nbsp;dispose de trois haut-parleurs, situ&amp;eacute;s en bas et des deux c&amp;ocirc;t&amp;eacute;s du chromebook. Ceci lui permet de d&amp;eacute;livrer un son clair qui n&amp;rsquo;est pas obstru&amp;eacute; en &amp;eacute;tant d&amp;eacute;pos&amp;eacute; sur une surface. Gr&amp;acirc;ce &amp;agrave; ces haut-parleurs, la consommation de vid&amp;eacute;os et de musique est vraiment agr&amp;eacute;able.&lt;/p&gt;\r\n&lt;p&gt;L&amp;rsquo;&amp;eacute;cran tactile et r&amp;eacute;versible du chromebook offre d&amp;eacute;j&amp;agrave; pas mal d&amp;rsquo;avantages comme un meilleur confort et plus de possibilit&amp;eacute;s de navigation. Cependant, avec&amp;nbsp;&lt;a href=\"https://chromebookeur.com/4-consequences-enormes-play-store-chromebook/\" target=\"_blank\" rel=\"noopener noreferrer\"&gt;l&amp;rsquo;arriv&amp;eacute;e du Play Store sur chromebook imminente&lt;/a&gt;, ses possibilit&amp;eacute;s seront d&amp;eacute;multipli&amp;eacute;es et il offrira une excellente solution pour utiliser les fonctionnalit&amp;eacute;s tactiles de certaines applications Android.&lt;/p&gt;\r\n&lt;h2&gt;&lt;span id=\"Clavier_et_pave_tactile\"&gt;Clavier et pav&amp;eacute; tactile&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p&gt;Malgr&amp;eacute; la petite taille du chromebook, les touches de son clavier sont de taille correcte et bien espac&amp;eacute;es. Elles&amp;nbsp;sont r&amp;eacute;actives et la frappe y est confortable, en particulier gr&amp;acirc;ce &amp;agrave; l&amp;rsquo;espace disponible pour reposer ses poignets&amp;nbsp;autour du pav&amp;eacute; tactile.&lt;/p&gt;\r\n&lt;p&gt;Ce pav&amp;eacute; tactile est d&amp;rsquo;ailleurs lui aussi de bonne qualit&amp;eacute;. La glisse est fluide, la pr&amp;eacute;cision est correcte, et sa taille n&amp;rsquo;est pas trop r&amp;eacute;duite malgr&amp;eacute; la petite taille de l&amp;rsquo;appareil.&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Note : il est important de savoir que le clavier et le pav&amp;eacute; tactile des chromebook sont diff&amp;eacute;rents de ceux des pc Windows ou des Mac. Pour en savoir plus sur ces diff&amp;eacute;rences, vous pouvez lire&amp;nbsp;&lt;a href=\"https://chromebookeur.com/5-raccourcis-clavier-chromebook-devriez-savoir/\" target=\"_blank\" rel=\"noopener noreferrer\"&gt;cet article&lt;/a&gt;.&lt;/em&gt;&lt;/p&gt;\r\n&lt;h2&gt;&lt;span id=\"Performances_et_connectivite\"&gt;Performances et connectivit&amp;eacute;&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p&gt;L&amp;rsquo;Acer R11&amp;nbsp;est &amp;eacute;quip&amp;eacute; d&amp;rsquo;un processeur Intel Celeron et de 4Go de RAM, dont il tire le maximum gr&amp;acirc;ce aux optimisations de chrome OS. Les pages web chargent rapidement et la lecture de vid&amp;eacute;o Youtube fonctionne sans soucis.&lt;/p&gt;\r\n&lt;p&gt;L&amp;rsquo;&amp;eacute;cran tactile et r&amp;eacute;versible du chromebook fonctionne &amp;eacute;galement tr&amp;egrave;s bien et aide &amp;agrave; naviguer encore plus rapidement et confortablement que sur les chromebook non tactiles. Passer en mode tablette et naviguer totalement en mode tactile est donc non seulement pratique mais &amp;eacute;galement rapide.&lt;/p&gt;\r\n&lt;p&gt;Ce chromebook dispose d&amp;rsquo;une double bande Wi-Fi qui lui assure une connectivit&amp;eacute; rapide ainsi que le Bluetooth 4.0, pratique pour le connecter &amp;agrave; d&amp;rsquo;autres appareils. Globalement, le R11 dispose d&amp;rsquo;une tr&amp;egrave;s bonne connectivit&amp;eacute;, autant&amp;nbsp;au niveau de son WiFi que de son Bluetooth.&lt;/p&gt;\r\n&lt;h2&gt;&lt;span id=\"Duree_de_batterie\"&gt;Dur&amp;eacute;e de batterie&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p&gt;La dur&amp;eacute;e de batterie de&amp;nbsp;l&amp;rsquo;Acer&amp;nbsp;Chromebook CB5-132T est largement suffisante pour tenir une journ&amp;eacute;e enti&amp;egrave;re sans besoin de charger son chromebook. En moyenne, la batterie tient de 8 &amp;agrave; 10 heures sans devoir &amp;ecirc;tre charg&amp;eacute;e.&lt;/p&gt;\r\n&lt;p&gt;Le chargement du chromebook est &amp;eacute;galement rapide, ce qui permet de lui redonner quelques heures de charge en seulement quelques dizaines de minutes.&lt;/p&gt;\r\n&lt;p&gt;Sa longue dur&amp;eacute;e de batterie rend l&amp;rsquo;Acer&amp;nbsp;Chromebook CB5-132T un tr&amp;egrave;s bon outil pour les longues journ&amp;eacute;es de cours, les longs trajets en train ou les longues soir&amp;eacute;es &amp;agrave; consommer des vid&amp;eacute;os ou lire des articles.&lt;/p&gt;\r\n&lt;h2&gt;&lt;span id=\"Devriez-vous_acheterlAcer_Chromebook_CB5-132T_R11\"&gt;Devriez-vous acheter&amp;nbsp;l&amp;rsquo;Acer Chromebook CB5-132T (R11)&amp;nbsp;?&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p&gt;De petite taille, l&amp;rsquo;Acer Chromebook CB5-132T est parfait pour se glisser dans un sac et &amp;ecirc;tre emmen&amp;eacute; partout. Gr&amp;acirc;ce &amp;agrave; sa longue batterie et sa tr&amp;egrave;s bonne connectivit&amp;eacute;, il est l&amp;rsquo;ordinateur portable mobile parfait.&lt;/p&gt;\r\n&lt;p&gt;Son bel &amp;eacute;cran IPS tactile r&amp;eacute;versible et ses bonnes performances le rendent un tr&amp;egrave;s bon outil de navigation sur le web, et gr&amp;acirc;ce &amp;agrave; ses fonctionnalit&amp;eacute;s tactiles, il peut prendre pleinement parti des applications Android.&lt;/p&gt;\r\n&lt;h2&gt;&lt;span id=\"Verdict\"&gt;Verdict&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p&gt;Si vous voulez un ordinateur portable mobile, rapide, et que les fonctionnalit&amp;eacute;s tactiles vous int&amp;eacute;ressent, l&amp;rsquo;Acer Chromebook CB5-132T est un choix tr&amp;egrave;s solide.&lt;/p&gt;', 'AcerChromebookR11.jpg', 1, 3, '2019-01-02', '2019-01-02'),
(3, 'Google duplex', 'Google Duplex, l‘intelligence artificielle capable de passer des appels à la place des utilisateurs tout en imitant le langage naturel, commence à se déployer sur certains smartphones Pixel.', '&lt;p&gt;&amp;Ccedil;a y est le futur frappe &amp;agrave; nos portes ! Enfin, disons plut&amp;ocirc;t qu&amp;rsquo;il s&amp;rsquo;agit d&amp;rsquo;une certaine vision du futur qui terrifie certains tout en enthousiasmant d&amp;rsquo;autres. Google Duplex commence &amp;agrave; se d&amp;eacute;ployer sur certains smartphones Pixel. Mais peut-&amp;ecirc;tre faut-il un petit rappel de ce dont il s&amp;rsquo;agit.&lt;/p&gt;\r\n&lt;h2&gt;Une IA qui passe des appels &amp;agrave; votre place&lt;/h2&gt;\r\n&lt;p&gt;Il y a plusieurs mois,&amp;nbsp;&lt;a href=\"https://www.frandroid.com/android/applications/google-apps/503011_google-duplex-plus-besoin-dappeler-votre-coiffeur-assistant-le-fait-pour-vous-i-o-2018\"&gt;Google pr&amp;eacute;sentait Duplex : une intelligence artificielle capable de passer des appels &amp;agrave; la place de l&amp;rsquo;utilisateur&lt;/a&gt;. La d&amp;eacute;monstration sur sc&amp;egrave;ne de la firme de Mountain View avait fait sensation. L&amp;rsquo;IA en question se montrait en effet capable de tr&amp;egrave;s bien imiter le langage naturel en marquant des pauses ou des h&amp;eacute;sitations.&lt;/p&gt;\r\n&lt;p&gt;Pour Google, cet outil sophistiqu&amp;eacute; sera ainsi en mesure de r&amp;eacute;server des tables dans des restaurants ou de prendre rendez-vous chez le coiffeur de mani&amp;egrave;re autonome. L&amp;rsquo;utilisateur n&amp;rsquo;aura qu&amp;rsquo;&amp;agrave; lancer la requ&amp;ecirc;te sur&amp;nbsp;&lt;a href=\"https://www.frandroid.com/telecharger/apps/google-assistant\"&gt;Google Assistant&lt;/a&gt;&amp;nbsp;et l&amp;rsquo;IA se chargera de tout le reste.&lt;/p&gt;\r\n&lt;h2&gt;D&amp;eacute;but du d&amp;eacute;ploiement&lt;/h2&gt;\r\n&lt;p&gt;Apr&amp;egrave;s&amp;nbsp;&lt;a href=\"https://www.frandroid.com/marques/google/513620_google-duplex-lincroyable-ia-commencera-a-passer-des-appels-des-cet-ete\"&gt;une premi&amp;egrave;re phase de test men&amp;eacute;e cet &amp;eacute;t&amp;eacute;&lt;/a&gt;, Google Duplex d&amp;eacute;barque maintenant sur certains Google Pixel. La fonctionnalit&amp;eacute; n&amp;rsquo;est cependant disponible que pour un petit groupe d&amp;rsquo;utilisateurs et uniquement dans des villes s&amp;eacute;lectionn&amp;eacute;es. C&amp;rsquo;est ce qu&amp;rsquo;a affirm&amp;eacute; Google &amp;agrave;&amp;nbsp;&lt;a href=\"https://venturebeat.com/2018/11/21/googles-duplex-is-rolling-out-to-pixel-owners-heres-how-it-works/\" target=\"_blank\" rel=\"noopener\"&gt;VentureBeat&lt;/a&gt;.&lt;/p&gt;\r\n&lt;p&gt;Le m&amp;eacute;dia am&amp;eacute;ricain a cependant eu la chance de voir ses&amp;nbsp;&lt;a href=\"https://www.frandroid.com/test/540596_test-du-google-pixel-3\"&gt;Google Pixel 3&lt;/a&gt;&amp;nbsp;et&amp;nbsp;&lt;a href=\"https://www.frandroid.com/marques/google/539725_test-google-pixel-3-xl\"&gt;Pixel 3 XL&lt;/a&gt;faire partie du lot de smartphones concern&amp;eacute;s par ce d&amp;eacute;ploiement. Dans la vid&amp;eacute;o ci-dessous, on peut par exemple voir Google Assistant affirmer qu&amp;rsquo;il va passer un appel pour r&amp;eacute;server un restaurant.&lt;/p&gt;\r\n&lt;p&gt;Mais VentureBeat a &amp;eacute;galement pu filmer une conversation du point de vue de la responsable d&amp;rsquo;un restaurant &amp;agrave; San Francisco. Dans la vid&amp;eacute;o qui suit, on peut donc voir cette derni&amp;egrave;re discuter assez naturellement avec l&amp;rsquo;intelligence artificielle qui passe l&amp;rsquo;appel. M&amp;ecirc;me si on pourrait pinailler en pointant du doigt la voix un peu m&amp;eacute;tallique de Google Duplex, il faut bien admettre que la technologie impressionne.&lt;/p&gt;\r\n&lt;h2&gt;&amp;Eacute;thique&lt;/h2&gt;\r\n&lt;p&gt;Dans la foul&amp;eacute;e de sa pr&amp;eacute;sentation, Google Duplex avait suscit&amp;eacute; plusieurs inqui&amp;eacute;tudes concernant l&amp;rsquo;aspect &amp;eacute;thique de cette technologie. Le g&amp;eacute;ant aux quatre couleurs avait tent&amp;eacute; de rassurer les gens&amp;nbsp;&lt;a href=\"https://www.frandroid.com/marques/google/503628_google-duplex-restera-ethique-et-transparent-cest-promis\"&gt;en promettant que son outil allait rester transparent&lt;/a&gt;&amp;nbsp;et que l&amp;rsquo;IA allait toujours pr&amp;eacute;ciser &amp;agrave; ses interlocuteurs qu&amp;rsquo;elle n&amp;rsquo;&amp;eacute;tait pas un &amp;ecirc;tre humain afin d&amp;rsquo;&amp;eacute;viter de les duper.&lt;/p&gt;', 'google-duplex-demo.jpg', 1, 3, '2019-01-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'John Doe', 'admin@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1),
(4, 'Camille Onette ', 'user@email.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_comment` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
