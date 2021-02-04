-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 fév. 2021 à 20:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `article` text COLLATE latin1_general_ci NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(17, 'CS', '(même si valorant c mieux vu que jsuis immortal dessus :)) )Counter-Strike (CS) est une série de jeux vidéo de tir à la première personne dans lesquels deux équipes s\'affrontent pour perpétrer ou empêcher un acte terroriste (attentat à la bombe, prise d\'otage, etc.).\r\n\r\nLa série est nommée d\'après le premier jeu de la série, Counter-Strike (2000), qui est initialement publié comme mod pour le jeu vidéo Half-Life (1998)Il s\'agit du mode original de Counter-Strike. Dans Global Offensive, il est composé lui-même de deux modes, qui sont l\'Occasionnel et le Compétitif.\r\n\r\nLe fonctionnement de base est identique aux autres versions de Counter-Strike : les joueurs sont divisés en deux équipes, les terroristes et les antiterroristes.\r\n\r\nLes conditions de victoire et objectifs dépendent du type de carte jouée. En mode Scénario Bombe, les terroristes doivent poser une bombe et la faire exploser ou bien éliminer la totalité des antiterroristes. Les antiterroristes doivent, eux, empêcher les terroristes de poser la bombe durant le temps de la manche, la désamorcer si elle parvient à être posée ou éliminer tous les terroristes. À noter que si les antiterroristes ont éliminé tous les terroristes, mais que la bombe, si elle a été posée, n\'est pas désamorcée et explose, la victoire revient aux terroristes. Dans le mode Scénario Prise d\'Otages, les terroristes doivent retenir les antiterroristes pendant le temps de la manche ou bien éliminer tous leurs adversaires. Les antiterroristes doivent eux, secourir au moins un otage pendant le temps de la manche ou bien éliminer l\'équipe des terroristes.\r\n\r\nChaque partie est jouée en plusieurs manches. Le nombre de manche est variable selon le mode joué. En Occasionnel, il s\'agit de 15 manches maximum, la première équipe à gagner 8 manches l\'emporte. En Compétitif, il s\'agit de 30 manches, l\'équipe gagnant 16 manches l\'emporte, mais le match se termine par une égalité (15-15) si aucune des deux équipes n\'a atteint 16 à la fin de la 30e manche.', 7, 4, '2021-02-04 15:57:18'),
(16, 'Planetary Annihilation', 'Planetary Annihilation est un jeu vidéo de stratégie en temps réel développé et édité par Uber Entertainment, sorti en 2014 sur Windows, Mac et Linux.', 7, 6, '2021-02-03 08:32:39'),
(15, 'KENSHI', 'Kenshi est un jeu vidéo de rôle développé et édité par Lo-Fi Games pour Windows. Le jeu se concentre sur la fourniture de fonctionnalités de jeu sandbox qui donnent au joueur la liberté de faire ce qu\'il veut dans son monde au lieu de se concentrer sur une histoire linéaire.', 6, 6, '2021-02-03 08:32:41'),
(14, 'Resistance', 'Resistance 2 est la suite du jeu de tir à la première personne Resistance: Fall of Man. Le jeu est développé par Insomniac Games et édité par Sony Computer Entertainment. Il est disponible depuis le 4 novembre 2008 aux États-Unis et le 26 novembre en Europe sur PlayStation 3.', 5, 4, '2021-02-04 20:37:53'),
(13, 'Age of empire', 'Age of Empires est une série de jeux de stratégie en temps réel développés par Ensemble Studios et publiés par Microsoft Studios. Le premier titre de la série — Age of Empires — est un jeu de stratégie en temps réel publié en 1997.Age of Empires est une série de jeux de stratégie en temps réel développés par Ensemble Studios et publiés par Microsoft Studios. Le premier titre de la série — Age of Empires — est un jeu de stratégie en temps réel publié en 1997. S\'inspirant de Civilization et de Warcraft II, le jeu se déroule dans un contexte historique sur une période comprise entre 5000 av. J.-C. et 800 ap. J.-C. au cours de laquelle le joueur doit faire évoluer une civilisation antique de l’âge de la pierre à l’âge du fer pour débloquer de nouvelles technologies et unités lui permettant de bâtir un empire. Ensemble Studios développe ensuite une extension baptisée The Rise of Rome puis une suite pour laquelle ils choisissent la période du Moyen Âge afin de facilement différencier les deux jeux tout en gardant les aspects du système de jeu qui avaient fait le succès du premier titre de la série. Afin de titrer profit du moteur 3D qu\'ils développent à l\'époque, Ensemble Studios décide ensuite de s’éloigner de la trame historique des Age of Empires et d’incorporer des éléments de la mythologie pour rendre le jeu différent des précédents opus de la série tout en gardant une trame familière. Ils publient alors Age of Mythology puis son extension The Titans qui connaissent un succès similaire aux titres de la série principales. Ils utilisent ensuite le moteur de jeu de ces derniers pour réaliser Age of Empires III dont l\'action se déroule pendant la colonisation européenne des Amériques. Le dernier jeu sorti, Age of Empires Online, se focalise sur le jeu multijoueur sur Internet.', 5, 6, '2021-02-04 15:56:56'),
(18, 'DOTA 2', 'Dota 2 est un jeu vidéo de type arène de bataille en ligne multijoueur développé et édité par Valve Corporation avec l\'aide de certains des créateurs du jeu d\'origine : Defense of the Ancients, un mod de carte personnalisée pour le jeu de stratégie en temps réel Warcraft III: Reign of Chaos et son extension Warcraft III: The Frozen Throne.Dota 2 est un jeu vidéo de type arène de bataille en ligne multijoueur développé et édité par Valve Corporation avec l\'aide de certains des créateurs du jeu d\'origine : Defense of the Ancients, un mod de carte personnalisée pour le jeu de stratégie en temps réel Warcraft III: Reign of Chaos et son extension Warcraft III: The Frozen Throne. Le jeu est sorti en juillet 2013 sur Microsoft Windows, OS X et Linux mettant fin à une phase bêta commencée en 2011. Il est disponible exclusivement sur la plateforme de jeu en ligne Steam.\r\n\r\nDota 2 se joue en matches indépendants opposant deux équipes de cinq joueurs, chacune possédant une base située en coin de carte contenant un bâtiment appelé l\'« Ancient », dont la destruction mène à la victoire de l\'équipe ennemie. Chaque joueur contrôle un « Héros » et est amené à accumuler de l’expérience, gagner de l\'or, s\'équiper d\'objets et combattre l\'équipe ennemie pour parvenir à la victoire.\r\n\r\nLe développement de Dota 2 commence en 2009, lorsque Valve embauche IceFrog, programmeur principal de Defense of the Ancients. Le jeu reçoit de très bonnes critiques à sa sortie dues à son système de jeu gratifiant, sa production de qualité et sa fidélité au mod originel.', 6, 5, '2021-02-04 15:57:51'),
(23, 'Portal Bridge Constructor', 'Les fondamentaux de ce Bridge Constructor ne changent clairement pas. Il s\'agit toujours d\'acheminer des convois d\'un point A à un point B en construisant des ponts suffisamment solides pour que les chargements arrivent à destination. Cependant, à l\'inverse de nombreux jeux de type, Bridge Constructor Portal ne propose que 3 éléments de construction différents : les structures de soutien du pont, le tablier solide permettant le passage des convois et les cordes de renfort, extensibles quasiment à volonté.\r\n\r\nLa construction elle-même réagit bien, témoigne d\'une physique crédible et l\'interface est claire et intuitive. Ainsi, le plus gros morceau du jeu se manipule d\'une manière fluide et cohérente, laissant tout loisir à l\'architecte qui sommeille en vous de bâtir les ponts les plus ingénieux. Ainsi, vous le comprenez, Bridge Constructor vous placera en terrain connu si vous avez déjà posé les mains sur Polly Bridge et consorts.', 9, 7, '2021-02-04 19:27:12'),
(24, 'Portal 2', 'Portal 2 est un jeu vidéo de plates-formes et de réflexion en vue subjective développé et édité par Valve. Le jeu paraît sur Windows, OS X, PlayStation 3 et Xbox 360 le 19 avril 2011 en Amérique du Nord, et le surlendemain pour le reste du monde. La version pour Linux a été mise en bêta-test le 25 février 20143. La version du jeu sur disque optique est distribuée par Electronic Arts, tandis que la distribution en ligne pour Windows et OS X est gérée par le service de diffusion de contenu de Valve, Steam. Portal 2 est annoncé le 5 mars 2010 à la suite d\'un jeu en réalité alternée d\'une semaine basé sur les nouveaux correctifs apportés au jeu original. Avant la sortie du jeu sur Steam, l\'entreprise met en vente un deuxième jeu en réalité alternée, Potato Sack, portant sur treize titres développés indépendamment, qui aboutit à une parodie de calcul distribué permettant de télécharger Portal 2 dix heures avant sa sortie.\r\n\r\nIl est la suite de Portal sorti en 2007. Portal 2 conserve le même système de jeu que Portal, et ajoute de nouvelles fonctionnalités comme les rayons tracteurs, la réflexion de laser, les ponts en lumière, et les gels permettant d\'accélérer la vitesse du joueur, de faire rebondir tout élément le percutant ou de placer des portails sur des surfaces sur lesquelles il n\'était pas possible d\'en créer. Ces gels ont été créés par l\'équipe du projet Tag: The Power of Paint du DigiPen Institute of Technology, gagnante de la compétition étudiante au Independent Games Festival de 2009.', 9, 8, '2021-02-04 19:28:06'),
(25, 'Super Mario', 'Super Mario est une série de jeux vidéo de plates-formes créée par Nintendo et mettant en scène sa mascotte Mario ainsi que, dans beaucoup de jeux, son frère Luigi. Il s\'agit de la première série de la franchise Mario. Au moins un jeu Super Mario est sorti sur chaque console majeure de Nintendo depuis le premier épisode, Super Mario Bros., sorti en 1985 sur Nintendo Entertainment System.\r\n\r\nLes jeux Super Mario mettent en scène les aventures de Mario dans le Royaume Champignon. Mario progresse dans des niveaux variés dans lesquels il saute pour battre des ennemis. Le jeu met généralement en scène des intrigues simples ; la plus commune étant que Bowser, le principal ennemi, kidnappe la Princesse Peach, que Mario doit ensuite sauver. Super Mario Bros. a établi beaucoup de concepts et d\'éléments de gameplay qui apparaissent dans presque chaque jeu de la série, incluant une multitude de power-ups qui donnent à Mario des capacités spéciales, par exemple celle de lancer des boules de feu, ou d\'autres choses.\r\n\r\nLes jeux Super Mario ont été vendus à plus de 310 millions d\'exemplaires dans le monde jusqu\'en septembre 2015, ce qui en fait la série de jeux vidéo la plus vendue de tous les temps.', 9, 8, '2021-02-04 19:29:14'),
(26, 'Alien Isolation', 'Alien: Isolation est un jeu vidéo d’action-aventure en vue à la première personne, développé par The Creative Assembly et édité par Sega, publié le 7 octobre 2014 à l’international sur ordinateur et consoles PlayStation 3, PlayStation 4, Xbox 360 et Xbox One. Feral Interactive travaille actuellement sur un portage pour Nintendo Switch, prévu pour 20191. Le jeu se déroule quinze ans après les évènements du film Alien, réalisé par Ridley Scott et sorti en 1979, et suit Amanda Ripley, fille de la protagoniste de la série Ellen Ripley, dans le but de retrouver des traces de sa mère disparue.\r\n\r\nDifférent des précédentes adaptations vidéoludiques de la franchise Alien, Alien: Isolation met en avant des éléments d’infiltration et de survival horror ; le joueur se doit d’éviter ou de repousser des créatures aliens, des androïdes ou même des hors-la-loi tout au long du jeu. Le scénario du jeu se situe entre Alien, le huitième passager et Aliens, le retour. L\'univers graphique se rapproche davantage du film de Scott. Après publication, Alien: Isolation est généralement bien accueilli par la presse spécialisée, et compte, en mai 2015, un total de deux millions d’exemplaires écoulés en Europe et aux États-Unis. La presse spécialisée salue la réalisation rétro-futuriste et les effets sonores du jeu, mais trouve à redire concernant le scénario, les personnages et les voix. Le jeu remporte quelques prix, notamment dans la catégorie « meilleur son » aux Game Developers Choice Awards et aux British Academy of Film and Television Arts Awards en 2015.', 9, 9, '2021-02-04 19:29:58'),
(27, 'Siren Blood Curse ', 'Siren: Blood Curse (littéralement « Sirène : Malédiction du sang »), appelé Siren: New Translation au Japon, est un jeu vidéo d\'action-aventure développé par SCE Japan Studio, sorti en 2008 sur PlayStation 3.\r\n\r\nLe jeu fait partie de la série Forbidden Siren.\r\n\r\nSiren: Blood Curse est un survival horror. Le joueur incarne tour à tour les membres d\'une équipe de reportage télévisée américaine pris au piège d\'un cauchemar dans un village reculé japonais. L\'histoire débute quatre années après les évènements de premier opus et offre un regard complémentaire sur l\'histoire du village d\'Hanuda en mettant en avant des individus non-japonais. Le jeu est découpé en 12 chapitres et est proposé à la fois en téléchargement sur le PlayStation Network et sur support Blu-ray.\r\n\r\n\r\nSynopsis\r\n2 août 2007. Une équipe de télévision américaine est en reportage dans une région reculée japonaise. Elle réalise un documentaire sur le village d\'Hanuda, disparu en août 1976 après un glissement de terrain. La nuit tombée, elle assiste à une cérémonie sacrificielle qui est brusquement interrompue par un jeune homme. Minuit. Une sirène hurle par delà la vallée : le village maudit réapparaît au milieu d\'un océan rouge sang, hanté par des morts-vivants…', 9, 9, '2021-02-04 19:30:59'),
(28, 'Wolrd Of Warcraft', 'World of Warcraft (abrégé WoW) est un jeu vidéo de type MMORPG (jeu de rôle en ligne massivement multijoueur) développé par la société Blizzard Entertainment. C\'est le 4e jeu de l\'univers médiéval-fantastique Warcraft, introduit par Warcraft: Orcs and Humans en 1994. World of Warcraft prend place en Azeroth, près de quatre ans après les événements de la fin du jeu précédent, Warcraft III: The Frozen Throne (2003)1. Blizzard Entertainment annonce World of Warcraft le 2 septembre 20012. Le jeu est sorti en Amérique du Nord le 23 novembre 2004, pour les 10 ans de la franchise Warcraft.\r\n\r\nLa première extension du jeu, The Burning Crusade, est sortie le 16 janvier 20073. Depuis, sept extensions de plus ont été développées : Wrath of the Lich King, Cataclysm, Mists of Pandaria, Warlords of Draenor, Legion, Battle for Azeroth et Shadowlands.\r\n\r\nDepuis sa sortie, World of Warcraft est le plus populaire des MMORPG. Le jeu tient le Guinness World Record pour la plus grande popularité pour un MMORPG4,5,6,7. En avril 2008, World of Warcraft a été estimé comme rassemblant 62 % des joueurs de MMORPG 8. Le 7 octobre 2010, Blizzard annonce que plus de 12 millions de joueurs ont un compte World of Warcraft actif9. C\'est à partir de fin 2012 que World of Warcraft a commencé à perdre continuellement un nombre croissant de joueurs. Au dernier trimestre 2012, Blizzard annonce le nombre de 9,6 millions d’abonnés à travers le monde, puis 7,7 millions pour le 2e trimestre 2013.', 9, 10, '2021-02-04 20:37:37'),
(29, 'Guild Wars', 'Guild Wars est une série de jeux de rôle en ligne compétitifs (CORPG) sans abonnement développée par ArenaNet et éditée par NCsoft, dont le premier chapitre, Guild Wars Prophecies, est sorti en France le 28 avril 2005. Un second épisode, Guild Wars Factions, est sorti mondialement le 28 avril 2006. Le troisième épisode, Guild Wars Nightfall, est sorti le 27 octobre 2006. Chacun des trois premiers chapitres est un stand-alone, qui peut être joué seul ou en combinaison des autres produits Guild Wars. Le quatrième chapitre de la série, Guild Wars: Eye of the North, est un addon demandant de posséder l\'un des trois premiers chapitres ; sa sortie a eu lieu le 31 août 2007.\r\n\r\nLe jeu se déroule dans un cadre médiéval fantastique.\r\n\r\nL\'abréviation GW est communément admise pour désigner la série dans son intégralité tandis que PROPH désigne le premier chapitre, FACT désigne le second épisode. L\'abréviation NF est la plus utilisée pour désigner le troisième chapitre. GWEN et EotN sont utilisés pour le quatrième.', 9, 10, '2021-02-04 19:32:46'),
(30, 'Arma III', 'Univers\r\nLe jeu se déroule sur deux îles, la principale étant Altis1, la seconde Stratis2. Les îles sont fortement inspirées de deux îles grecques du nom de Lemnos1 et Ágios2 Efstrátios, bien que leurs superficies soient légèrement plus faibles que les îles originales : 400km2 annoncés pour Altis (au lieu de 478 km2, soit 85 % de l\'échelle), 30 km2 pour Stratis (au lieu de 43 km2, soit 70 % de l\'échelle). Cela représente pour Altis une surface de jeu équivalente au cumul des cartes du Takistan et de Chernarus. De plus, les développeurs ont annoncé la possibilité d\'explorer les fonds marins sur l\'équivalent de 100 à 150 km2.\r\n\r\nSur l\'île principale, la majeure partie des villes et villages sont reproduits, soit une cinquantaine environ. L\'île a été légèrement modifiée pour les besoins du développement. Ainsi, certains lacs à l\'est de l\'île sont absents. Une possible explication viendrait du fait que le jeu se déroule en 2035.\r\n\r\n Lemnos, île ayant inspiré Altis, a été très fidèlement reproduite.\r\nLemnos, l\'île ayant inspiré Altis, elle a été très fidèlement reproduite.\r\nContexte\r\nL\'introduction de la campagne est une diffusion de AAN World News, une chaîne d\'information fictive, qui raconte que l\'OTAN arrive à la fin de son mandat à Stratis, et qu\'il est en pleine crise économique due à la progression fulgurante du CSAT (Canton-Protocol Strategic Alliance Treaty, une alliance militaire) en Europe et en Méditerranée. Il est aussi dit que la FIA (Freedom and Independence Army, un groupe rebelle local) est presque à bout, et que l\'AAF (Altian Armed Forces, les forces armées d\'Altis) compte demander l\'aide du CSAT.', 9, 11, '2021-02-04 19:33:23'),
(31, 'Gran Turismo', 'Les mécanismes communs\r\nDeux vues au minimum sont sélectionnables par le joueur, la première est la vision subjective, qui ne montre que le minimum du tableau de bord (compteur de vitesse, nombre de tours restants...), la deuxième est une vision objective où la voiture est vue de derrière. Il existe dans certains épisodes, des vues intermédiaires, et depuis Gran Turismo 5 Prologue, une vue \"cockpit\" est également disponible. Lorsqu\'un joueur recommence un circuit seul (sans opposants), il peut voir sa voiture fantôme.\r\n\r\nEn début de partie, le joueur doit traditionnellement passer un permis de conduire pour débloquer des compétitions. Il dirige des voitures prêtées pour l\'occasion et doit parcourir des portions de circuits ou des circuits complets dans un temps limité. Le premier permis et une somme modique en poche, il peut acheter une voiture « bas de gamme » et participer à des championnats où il gagne de l\'argent s\'il parvient dans les premières places. Cet argent permet d\'améliorer la voiture et d\'en acheter de nouvelles. Par la suite, il peut passer d\'autres permis plus difficiles et accéder à des niveaux de compétition plus relevés.\r\n\r\nDans certains épisodes dérivés, comme les Concept et Prologue, les championnats ne sont pas présents et l\'on ne peut pas acheter de véhicules, il faut simplement les gagner en remportant des permis.\r\n\r\nCes jeux de course proposent des circuits fidèles à la réalité. La jouabilité et les modèles physiques des voitures sont eux aussi très réalistes[réf. nécessaire]. Un point sur lequel les Gran Turismo ne sont pas cohérents, est l\'invulnérabilité des voitures. Certains constructeurs qui prêtent leur image, comme Mitsubishi ou Audi, sont opposés ou réticents à voir leurs véhicules détruits dans le jeu. Heureusement, le 5e épisode réparera ce défaut. La société Seiko apporte son expertise pour le chronométrage des compétitions.', 9, 11, '2021-02-04 19:34:07'),
(32, 'Uncharted', 'Présentation\r\nLa série comporte huit jeux plus une version remastérisée des trois premiers volets en 1080p, une adaptation animée, un roman ainsi qu\'une série de comics. Une adaptation en film est prévu également pour le 14 juillet 2021 avec à l\'affiche Tom Holland, Mark Wahlberg et Antonio Banderas1.\r\n\r\nEn 2017, Sony Computer Entertainment annonce que la franchise cumulent 41,7 millions d\'exemplaires de jeu vendus à travers le monde2.\r\n\r\nSynopsis\r\nNathan Drake, accompagné de son compère, Victor Sullivan, parcourt le monde entier — Amazonie, Pacifique, Himalaya, Népal, Bornéo, le Rub al-Khali, Londres, Syrie, Yémen, Colombie, France, Italie, Turquie , Écosse ou encore Madagascar — à la recherche de trésors. Certains des objets de valeur qu\'il recherche ont appartenu à son « ancêtre » Francis Drake. Ses pérégrinations le mèneront à la découverte de trésors et cités mythiques : l\'Eldorado, Shambala, Ubar, Libertalia...', 9, 12, '2021-02-04 19:34:35'),
(33, 'Metro Exodus', 'Metro Exodus est un jeu vidéo de tir à la première personne post-apocalyptique développé par le studio ukrainien 4A Games et édité par Deep Silver. Il fut premièrement annoncé sur PC, PlayStation 4 et Xbox One pour l\'automne 20182, puis il a été repoussé au premier trimestre 20193. La date de sortie du jeu a ensuite été annoncée pour le 22 février 2019 avant d\'être finalement fixée au 15 février 20194.\r\n\r\nMetro Exodus est le troisième jeu de la série Metro dont l\'histoire fait suite au roman de Dmitri Gloukhovski, Métro 2035. Il gagne le prix du meilleur jeu étranger lors de la cérémonie des Pégases le 9 mars 2020.\r\n\r\nUnivers\r\nComme dans les autres jeux de la série, l\'univers se passe dans un monde ravagé par une guerre nucléaire ayant eu lieu vingt-trois années auparavant et où les seuls survivants connus se sont réfugiés dans le métro moscovite. Les radiations sont toujours mortelles à certains endroits et des créatures mutantes hostiles sont présentes dû à ces radiations. En plus de l\'hostilité de ces dernières, les habitants du métro mènent une guerre de ressource ou idéologique. Cependant, dans cet opus, le héros accompagné de compagnons quittera le métro pour se rendre à l’extérieur. Il rencontrera alors différents types d\'endroits telle que des lieux enneigés, un désert aride et une forêt où la nature a repris ses droits.', 9, 12, '2021-02-04 19:36:02');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `couleur` varchar(150) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `couleur`) VALUES
(5, 'Moba', 'linear-gradient(to bottom left, #990099 57%, #ffff99 100%)'),
(4, 'fps', 'linear-gradient(to bottom left, #cc0000 57%, #ffff99 100%)'),
(6, 'Jeux de Gestion', 'linear-gradient(to bottom left, #000099 57%, #ffff99 100%)'),
(7, 'Puzzle', 'linear-gradient(to bottom left, #33cccc 57%, #ffff99 100%)'),
(8, 'Plateforme', 'linear-gradient(to bottom left, #00ff00 57%, #ffff99 100%)'),
(9, 'Horreur', 'linear-gradient(to bottom left, #006600 57%, #ffff99 100%)'),
(10, 'MMORPG', 'linear-gradient(to bottom left, #003366 0%, #ffff00 100%)'),
(11, 'Simulation', 'linear-gradient(to bottom left, #ff9900 57%, #ffff99 100%)'),
(12, 'Aventure', 'linear-gradient(to bottom left, #663300 74%, #ffffcc 100%)');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) COLLATE latin1_general_ci NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'nique tes morts', 2, 2, '2021-01-30 16:06:41'),
(2, 'Franchement le sang tyabuse', 13, 5, '2021-02-01 13:44:00'),
(3, 'Y\'a une couille dans le potagé c\'est moi qui te ldit', 13, 5, '2021-02-01 14:35:00'),
(4, 'io', 14, 8, '2021-02-03 10:34:00'),
(5, 'io', 14, 8, '2021-02-03 10:35:00'),
(6, 'nhvhgvgbvnvb', 14, 8, '2021-02-03 11:43:00'),
(7, 'nhvhgvgbvnvb', 14, 8, '2021-02-03 11:43:00'),
(8, 'nhvhgvgbvnvb', 14, 8, '2021-02-03 11:43:00'),
(11, 'fksjhshdkfjh', 13, 8, '2021-02-04 09:27:00');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(7, 'Kiri-Kiri', '$2y$10$J8bfS0NaSSW8Lu7C9z.KcOAYIY8pJ1yrnLC3HCYixNtP0tr2mxHgO', 'Kiri-Kiri', 1337),
(6, 'Golum', '$2y$10$8RPQiaArI1vZmC/JkHqDfO8EEM/Uggdz5zu9pHyb/PyhJdrsIZfZq', 'Golum@lanneau.fr', 1337),
(5, 'HARDJOJO', '$2y$10$cVL8dIbmihx9P/fO8dGvme.AlMOh8Hx6h8Gj595zNcK3/.QKYJR3S', 'HARDJOJO@ok.fr', 1337),
(8, 'ok', '$2y$10$L6EXqD4femG.zhNXlMUYHue2uxLQZkUd0tXi7mwPerKt5irGIIh/O', 'okokokok', 42),
(9, 'TERMINATOR', '$2y$10$.CN4FLQ.tZX8ym/5CAkpnudgrzGQoTcYNcgbUfLwxSlSUYyARvEJq', 'TERMINATOR@JEVEUXSARAAAAH.com', 42);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
