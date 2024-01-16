-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 16 jan. 2024 à 10:43
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `note` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `utilisateur_id`, `vehicule_id`, `marque_id`, `commentaire`, `note`, `statut`) VALUES
(3, 1, NULL, 1, 'Le confort de ma Volkswagen est de première classe avec des matériaux haut de gamme et une isolation phonique efficace. La puissance du moteur offre une conduite réactive et plaisante. Bien que le prix puisse être légèrement plus élevé, la qualité de construction justifie l\'investissement. Note globale', 9, 'approved'),
(4, 2, NULL, 1, 'La Volkswagen que j\'ai offre un confort adéquat, mais certaines caractéristiques intérieures peuvent sembler basiques. La puissance est suffisante pour une conduite quotidienne, mais manque d\'enthousiasme. Le prix est compétitif, mais les options peuvent augmenter rapidement le coût total', 7, 'approved'),
(5, 3, NULL, 1, 'Le confort de ma Volkswagen est en deçà des attentes, surtout compte tenu du prix. La puissance du moteur est décevante, en particulier lors des accélérations. Les coûts d\'entretien sont élevés sans justification apparente', 4, 'pending'),
(6, 4, NULL, 2, 'Le confort de ma Renault est un point fort avec des sièges ergonomiques et un intérieur spacieux. La puissance est suffisante pour une conduite quotidienne agréable. Bien que le prix initial soit compétitif, certains équipements optionnels peuvent rapidement augmenter la facture', 8, 'approved'),
(7, 5, NULL, 2, 'La Renault que j\'ai offre un confort décent, bien que les suspensions pourraient être améliorées. La puissance est acceptable, mais elle pourrait avoir du mal lors de charges lourdes. Le prix est raisonnable, mais certaines caractéristiques manquent à la version de base', 6, 'approved'),
(8, 1, NULL, 2, 'Le confort de ma Renault est décevant, surtout sur des routes cahoteuses. La puissance est insuffisante pour des performances dynamiques. Les coûts d\'entretien et de réparation sont élevés par rapport à la valeur globale', 3, 'approved'),
(9, 2, NULL, 3, 'Ma Fiat offre un confort supérieur avec des sièges bien ajustés et une suspension sportive. La puissance du moteur ajoute une touche d\'excitation à la conduite quotidienne. Le prix compétitif en fait un excellent choix pour les amateurs de petites voitures', 8, 'pending'),
(10, 3, NULL, 3, 'La Fiat que j\'ai est confortable pour sa taille, bien que la qualité de construction puisse être améliorée. La puissance du moteur est acceptable, mais elle manque de punch. Le prix est abordable, mais les options peuvent rapidement augmenter le coût total', 5, 'approved'),
(11, 4, NULL, 3, 'Le confort de ma Fiat est décevant, surtout sur de longs trajets. La puissance du moteur est insuffisante, en particulier lors de dépassements. Les problèmes mécaniques constants ont été une source de frustration', 3, 'approved'),
(12, 5, NULL, 4, 'Ma Hyundai offre un confort exceptionnel avec des sièges bien rembourrés et une suspension réglée pour une conduite douce. La puissance est plus que suffisante pour une conduite quotidienne. Le rapport qualité-prix est excellent, offrant de nombreuses fonctionnalités à un prix abordable', 8, 'pending'),
(13, 1, NULL, 4, 'La Hyundai que j\'ai est confortable, mais la qualité des matériaux intérieurs pourrait être améliorée. La puissance du moteur est adéquate, mais pourrait être améliorée pour une expérience de conduite plus dynamique. Le prix est raisonnable pour ce que vous obtenez', 6, 'pending'),
(14, 2, NULL, 4, 'Le confort de ma Hyundai est médiocre, en particulier sur des routes accidentées. La puissance du moteur est décevante, surtout lors de charges lourdes. Les problèmes électroniques fréquents ont entraîné des coûts de réparation élevés', 1, 'pending'),
(15, 3, NULL, 5, 'Ma Toyota offre un confort exceptionnel avec des sièges spacieux et un intérieur bien conçu. Sur le plan de la puissance, elle propose des performances solides tout en maintenant une consommation de carburant raisonnable. Bien que le prix initial puisse sembler un peu élevé, la fiabilité de la Toyota en fait un excellent investissement à long terme', 9, 'pending'),
(16, 4, NULL, 5, 'La conduite de ma Toyota est assez confortable, bien que les sièges pourraient offrir un peu plus de soutien lombaire. En termes de puissance, elle fait le travail pour la conduite quotidienne, mais ne s\'adresse pas aux amateurs de vitesse. Le prix est raisonnable compte tenu de la fiabilité, bien que certaines options puissent être coûteuses', 7, 'pending'),
(17, 5, NULL, 5, 'Le confort de ma Toyota laisse à désirer, surtout sur de longs trajets. La puissance de la voiture est décevante, en particulier lors des dépassements sur l\'autoroute. Le prix initial était attractif, mais les coûts de réparation ont été élevés', 4, 'pending'),
(18, 1, 2, NULL, 'La Fiat 500 Club offre une expérience de conduite plaisante avec son design emblématique et sa maniabilité exceptionnelle. La consommation de carburant est économique, et l\'intérieur est bien conçu.', 8, 'approved'),
(19, 2, 2, NULL, 'Malheureusement, la Fiat 500 Club a un espace intérieur limité, surtout à l\'arrière. De plus, les coûts de maintenance peuvent être plus élevés que prévu.', 3, 'pending'),
(20, 3, 3, NULL, 'La Fiat Tipo Sedan City offre un excellent rapport qualité-prix avec son espace intérieur généreux, sa conduite confortable et son prix abordable. La consommation de carburant est raisonnable.', 9, 'pending'),
(21, 4, 3, NULL, 'Cependant, la qualité des matériaux intérieurs pourrait être améliorée, et le design extérieur est assez basique.', 4, 'pending'),
(22, 5, 4, NULL, 'Le Fiat Doblo est un véhicule polyvalent avec un espace de chargement impressionnant. La conduite est stable, et les sièges sont confortables. Idéal pour les familles nombreuses.', 8, 'pending'),
(23, 1, 4, NULL, 'Cependant, le design extérieur est peu attrayant, et la consommation de carburant peut être un inconvénient pour certains.', 4, 'approved'),
(24, 2, 5, NULL, 'La Volkswagen Golf 7 offre une conduite sportive, une qualité de construction exceptionnelle et des fonctionnalités modernes. Elle est spacieuse pour sa catégorie.', 9, 'approved'),
(25, 3, 5, NULL, 'Le prix peut être plus élevé que celui de certains concurrents, et les coûts d\'entretien peuvent être un peu élevés.', 3, 'approved'),
(26, 4, 6, NULL, 'La Volkswagen Passat Comfortline est une berline élégante avec un intérieur luxueux et des options de confort avancées. La puissance du moteur et la conduite sont impressionnantes.', 8, 'pending'),
(27, 5, 6, NULL, 'Cependant, le prix peut être prohibitif pour certains acheteurs, et la consommation de carburant pourrait être meilleure.', 3, 'pending'),
(28, 1, 7, NULL, 'Le Volkswagen New Tiguan offre une conduite souple, un intérieur bien conçu et des fonctionnalités de sécurité avancées. Le design extérieur est également attrayant.', 9, 'pending'),
(29, 2, 7, NULL, 'le prix peut être élevé selon les options choisies, et l\'espace à l\'arrière peut être un peu limité.', 6, 'pending'),
(30, 3, 8, NULL, 'La Renault Clio 4 est une citadine élégante avec une excellente maniabilité, une consommation de carburant économique et des fonctionnalités modernes.', 0, 'pending'),
(31, 4, 8, NULL, 'Cependant, l\'espace intérieur peut être un peu restreint, et la qualité des matériaux intérieurs pourrait être améliorée.', 4, 'pending'),
(32, 3, 8, NULL, 'La Renault Clio 4 est une citadine élégante avec une excellente maniabilité, une consommation de carburant économique et des fonctionnalités modernes.', 8, 'pending'),
(33, 4, 8, NULL, 'Cependant, l\'espace intérieur peut être un peu restreint, et la qualité des matériaux intérieurs pourrait être améliorée.', 4, 'pending'),
(34, 1, 10, NULL, 'La Renault New Mégane offre un design distinctif, une conduite confortable et une variété d\'options de moteur. L\'intérieur est moderne et bien agencé\r\n', 8, 'pending'),
(35, 2, 10, NULL, 'le prix peut être élevé pour certaines versions, et la visibilité arrière peut être limitée.', 4, 'pending'),
(36, 3, 9, NULL, 'La Renault Symbol est une berline compacte économique avec une consommation de carburant exceptionnelle. Elle offre un bon rapport qualité-prix.', 7, 'pending'),
(37, 5, 9, NULL, 'la puissance du moteur peut être un peu faible, et la qualité de construction peut sembler basique.', 3, 'pending'),
(38, 1, 11, NULL, 'L\'Hyundai Accent offre un excellent rapport qualité-prix avec un intérieur bien conçu, une conduite confortable et une consommation de carburant économique. ', 8, 'pending'),
(39, 2, 11, NULL, 'la puissance du moteur peut être limitée, surtout lors de charges lourdes, et le design extérieur peut manquer d\'originalité.', 4, 'pending'),
(40, 4, 12, NULL, 'L\'Hyundai H100 est un utilitaire fiable avec une capacité de chargement impressionnante. La conduite est robuste, et le coût total de possession est raisonnable. ', 8, 'pending'),
(41, 3, 12, NULL, 'le confort de conduite peut être un peu rudimentaire, et la consommation de carburant peut être élevée.', 3, 'pending'),
(42, 5, 13, NULL, 'Le Hyundai Tucson offre un design élégant, une conduite confortable et une variété de fonctionnalités de sécurité. La polyvalence de l\'espace intérieur est un plus.', 7, 'pending'),
(43, 1, 13, NULL, 'le prix peut être élevé pour certaines versions, et la consommation de carburant pourrait être améliorée.', 3, 'pending'),
(44, 2, 14, NULL, 'La Toyota Yaris est une citadine fiable avec une consommation de carburant exceptionnelle. La conduite est agréable, et l\'intérieur est bien agencé.', 8, 'pending'),
(45, 3, 14, NULL, 'la puissance du moteur peut être un peu faible, surtout lors de dépassements sur l\'autoroute, et la qualité des matériaux intérieurs peut sembler basique.', 4, 'pending'),
(46, 4, 15, NULL, 'Le Toyota Hilux est un pick-up robuste avec une capacité de charge impressionnante. La conduite hors route est excellente, et la fiabilité est inégalée.', 8, 'pending'),
(47, 5, 15, NULL, 'Cependant, le confort de conduite sur route peut être un peu ferme, et la consommation de carburant peut être élevée.', 2, 'pending'),
(48, 2, 16, NULL, 'Le Toyota Hiace est un fourgon fiable avec un espace de chargement généreux. La conduite est stable, et la durabilité est un point fort.', 7, 'pending'),
(49, 1, 16, NULL, 'le design intérieur peut sembler dépassé, et la consommation de carburant peut être un inconvénient pour une utilisation quotidienne.', 1, 'pending'),
(50, 1, NULL, 5, 'ibda3', 8, 'approved'),
(51, 1, 5, NULL, 'ibdaaaaaaa3', 9, 'pending'),
(52, 1, NULL, 1, 'Good Car', 9, 'pending'),
(53, 1, NULL, 1, 'Good Car', 9, 'pending'),
(54, 1, NULL, 1, 'Good Car', 9, 'pending'),
(55, 1, NULL, 1, 'Good Car', 9, 'pending'),
(56, 1, NULL, 1, 'Good Car', 9, 'pending'),
(57, 1, NULL, 1, 'Good Car', 9, 'pending'),
(58, 1, NULL, 1, 'Bad Car', 2, 'pending'),
(59, 1, NULL, 1, 'Bad Car', 2, 'pending'),
(60, 1, NULL, 1, 'Mediocre Car', 6, 'pending'),
(61, 1, 5, NULL, 'Golf is the best!!!', 8, 'pending'),
(63, 1, 12, NULL, 'Bad design', 2, 'pending'),
(64, 4, 5, NULL, 'mli7a mlor', 7, 'pending'),
(65, 4, 2, NULL, 'Chikouraaaaa!!!!!', 6, 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `caracteristique`
--

CREATE TABLE `caracteristique` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `caracteristique`
--

INSERT INTO `caracteristique` (`id`, `name`) VALUES
(1, 'Moteur'),
(2, 'Energie'),
(3, 'Consommation');

-- --------------------------------------------------------

--
-- Structure de la table `comparaison`
--

CREATE TABLE `comparaison` (
  `id` int(11) NOT NULL,
  `vehicule1_id` int(11) NOT NULL,
  `vehicule2_id` int(11) NOT NULL,
  `frequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comparaison`
--

INSERT INTO `comparaison` (`id`, `vehicule1_id`, `vehicule2_id`, `frequence`) VALUES
(1, 8, 5, 4),
(4, 6, 2, 3),
(6, 5, 13, 1),
(9, 2, 3, 1),
(10, 14, 15, 1),
(11, 6, 7, 1),
(12, 6, 8, 1),
(13, 7, 2, 1),
(14, 7, 8, 1),
(15, 2, 8, 1),
(16, 6, 11, 1),
(17, 2, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `value`) VALUES
(1, 'Nom du site', 'CompCar'),
(2, 'Email', 'ybenali884@gmail.com'),
(3, 'Numéro de téléphone', '0666077262'),
(4, 'lien Github repo', 'https://github.com/yuufumi/comparateur_vehicules'),
(5, 'linkedin', 'https://www.linkedin.com/in/youcef-benali-baa6b7253/');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `vehicule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `vehicule_id`, `user_id`) VALUES
(1, 2, 1),
(2, 11, 1),
(3, 5, 1),
(4, 10, 1),
(10, 2, 4),
(13, 15, 4),
(15, 4, 4),
(17, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `lien`, `vehicule_id`, `news_id`, `marque_id`) VALUES
(1, 'marque/volkswagen', NULL, NULL, 1),
(2, 'marque/renault', NULL, NULL, 2),
(3, 'marque/toyota', NULL, NULL, 5),
(4, 'marque/fiat', NULL, NULL, 3),
(5, 'marque/hyundai', NULL, NULL, 4),
(8, 'news/news1', NULL, 1, NULL),
(10, 'news/news3', NULL, 3, NULL),
(11, 'vehicule/fiat_500_club', 2, NULL, NULL),
(12, 'vehicule/fiat_doblo', 4, NULL, NULL),
(13, 'vehicule/fiat_tipo', 3, NULL, NULL),
(14, 'vehicule/hyundai_accent', 11, NULL, NULL),
(15, 'vehicule/hyundai_h100', 12, NULL, NULL),
(16, 'vehicule/hyundai_tucson', 13, NULL, NULL),
(17, 'vehicule/renault_clio', 8, NULL, NULL),
(18, 'vehicule/renault_megane', 10, NULL, NULL),
(19, 'vehicule/renault_symbol', 9, NULL, NULL),
(20, 'vehicule/toyota_hiace', 16, NULL, NULL),
(21, 'vehicule/toyota_hilux', 15, NULL, NULL),
(22, 'vehicule/toyota_yaris', 14, NULL, NULL),
(23, 'vehicule/volkswagen_golf', 5, NULL, NULL),
(24, 'vehicule/volkswagen_new_tiguan', 7, NULL, NULL),
(25, 'vehicule/volkswagen_passat', 6, NULL, NULL),
(26, 'news/news2', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `siege_social` varchar(255) NOT NULL,
  `annee_creation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`, `pays`, `siege_social`, `annee_creation`) VALUES
(1, 'volkswagen', 'Allemagne', 'Wolfsburg, Allemagne', 1937),
(2, 'Renault', 'France', 'Boulogne-Billancourt, France', 1898),
(3, 'Fiat', 'Italie', 'Turin, Italie', 1899),
(4, 'Hyundai', 'Corée du sud', 'Séoul, Corée du sud', 1967),
(5, 'Toyota', 'Japon', 'Préfecture d\'Aichi, Japon', 1937);

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `id` int(11) NOT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `modele_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`id`, `marque_id`, `modele_nom`) VALUES
(1, 3, '500'),
(2, 3, 'tipo'),
(3, 3, 'doblo'),
(4, 1, 'Golf'),
(5, 1, 'Passat'),
(6, 1, 'New Tiguan'),
(7, 2, 'Clio 4'),
(8, 2, 'Symbol restylée'),
(9, 2, 'Nouvelle Megane'),
(10, 4, 'Accent'),
(11, 4, 'H100'),
(12, 4, 'New Tucson'),
(13, 5, 'Yaris'),
(14, 5, 'Hilux'),
(15, 5, 'Hiace');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`) VALUES
(1, 'Chery Tiggo 2 Pro séduit les foules', 'Le second lancement de l’année a été celui de Chery. La marque chinoise débarque avec une gamme de 7 modèles dont 4 SUV et adopte, d’entrée, une agressivité commerciale inattendue. Un design qui n’a plus rien à envier à celui des autres marques mondiales.\r\nEt c’est surtout le prix qui a surpris et enthousiasmé et qui a rapidement fait le buzz sur les réseaux sociaux. Une citadine à l’allure de crossover, affichée à\r\n1 990 000 DA, suscite la curiosité et semble, d’ores et déjà, promise à un large succès commercial. Il s’agit du Tiggo 2 Pro équipé d’un bloc essence de 1.5 L 107 ch.\r\nIl en est de même dans le segment supérieur, en l’occurrence celui des berlines moyennes avec Arrizo 5 en deux niveaux de finition et dont les prix varient entre 2 400 000 et 2 600 000 DA.\r\nComme prévisible et aussitôt les lampions de la cérémonie de lancement éteints, les showrooms du concessionnaire et de ses agents agréés ont rapidement été pris d’assaut par les nombreux clients en quête de véhicules aux prix accessibles.\r\nLes premières disponibilités sont prévues pour le premier trimestre de l’année prochaine.\r\nIl reste à espérer que le représentant de la marque sera à la hauteur de la qualité des produits qu’il propose et des attentes des nombreux clients impatients d’acquérir enfin un véhicule neuf.'),
(2, 'Reprise progressive en 2024: \r\nL’automobile en voie de réhabilitation', 'À quelques encablures de la fin de l’année en cours, la scène automobile nationale continue de vibrer au rythme des annonces de débarquement dans les ports du pays de véhicules de différents modèles et de différentes marques.\r\nLes premières marques qui ont investi le terrain ont tenté de répondre, tant bien que mal, à une partie de la demande nationale. Les 90 000 véhicules pour l’exercice 2023 n’ont été, en définitive, qu’une goutte dans un océan de frustration longtemps cumulée.\r\nLe groupe Stellantis, avec ses deux marques, Fiat et Opel, a rouvert la voie de la relance de l’activité automobile en Algérie, après 5 années de blocage. Tout en s’emparant de la part du lion du volume global consacré à l’importation pour l’année en cours, il a aussi permis la redynamisation des différents mécanismes liés aux processus d’importation et de distribution de véhicules.\r\nEn engageant un important programme de formation et de perfectionnement sur les métiers de l’automobile, commercialisation, accueil des clients et service après-vente, le groupe international a offert l’opportunité à certains de s’initier aux rudiments de la profession et à d’autres, de renouer avec leur ancienne spécialisation et retrouver progressivement les réflexes d’une professionnalisation tant espérée.\r\nAu fil des mois, Fiat a réussi à structurer un réseau de plus de 35 agents agréés répartis à travers l’ensemble du territoire national avec obligation d’assumer selon les normes du constructeur et les standards internationaux, toutes les missions inhérentes à l’activité de concessionnaires automobiles. Il en est surtout celle se rapportant à la prise en charge des besoins et des doléances des clients au-delà de la vente du véhicule.\r\nL’autre marque du groupe, Opel, avec son représentant officiel, Halil Commerce et Industrie, a retrouvé le marché algérien après plusieurs années d’absence. Un label, certes connu et apprécié dans notre pays pour sa fiabilité et sa robustesse, mais il gagnerait à voir son image plus renforcée et améliorée auprès de la clientèle locale.\r\nLes expériences avec les anciens représentants n’ont pas été du tout concluantes, et il est, désormais, espéré que l’expertise et le savoir-faire de Stellantis lui permettront, sans nul doute, de franchir ce pas. D’autant que la marque bénéficie d’un réseau déjà installé et étendu à tout le pays.\r\nDe leur côté, les marques chinoises n’ont pas réussi à tirer profit de l’avance qu’ils ont eue en 2023, pour se positionner dans un marché encore vierge. Leurs représentants, qui ont pourtant décroché l’agrément et les autorisations nécessaires pour l’importation de véhicules, ont fait preuve d’un manque flagrant de préparation et d’organisation.\r\nEn reportant à 2024 la consommation de leur quota 2023, ils ratent, non seulement des ventes assurées, mais ils devront faire face à une rude concurrence à venir avec l’arrivée, dès le début de l’année prochaine, de nouvelles marques y compris de Chine avec des modèles au rapport qualité/prix tout aussi compétitif.\r\nAinsi, le client algérien aura en 2024 le choix des marques, des modèles et des prix. L’entrée en production de l’usine Fiat de Tafraoui le 11 décembre dernier devra insuffler une nouvelle dynamique grâce à une tarification exonérée de la TVA et de la taxe sur le véhicule neuf, et aussi à la possibilité pour le citoyen de recourir au crédit bancaire.'),
(3, 'Utilitaires légers:\r\nLe moteur thermique désormais banni', 'Il est aujourd’hui notoirement établi que le parc de véhicules de tourisme d’une grande partie des régions de la planète, dont l’Europe, passeront obligatoirement au tout électrique dès l’échéance 2035. Il est désormais ajouté que cette exigence écologique concernera désormais les utilitaires légers à partir de la même date.\r\nUn objectif plus difficile à atteindre encore plus que pour les voitures.\r\nEn effet, la loi européenne sur le climat exige que l\'UE soit neutre en carbone d\'ici 2050. Pour les constructeurs automobiles et de fourgonnettes, cela signifie qu\'à partir de 2035, ils ne pourront plus proposer que des véhicules sans émissions. Les nouvelles voitures à essence ou Diesel seront donc bannies des ventes, de même que les fourgonnettes à moteur à combustion.\r\nAvant même 2035, il est demandé aux constructeurs de véhicules utilitaires légers la réduction de moitié des émissions de CO2 d\'ici 2030 par rapport à l\'année de référence 2021. Il n\'y a donc pas de temps à perdre pour les marques afin d\'équiper leurs fourgonnettes de batteries et de moteurs électriques ou de piles à hydrogène.\r\nAlors que les fourgonnettes électriques étaient jusqu\'à récemment des produits de niche achetés uniquement par quelques pionniers enthousiastes, la situation a changé aujourd\'hui. En raison d\'une offre de plus en plus grande de fourgonnettes électriques, d’avantages fiscaux (certes encore limités) et d\'économies de carburant, de plus en plus d\'entreprises et d\'indépendants passent à l\'achat d\'une «fourgonnette légère» électrique.\r\nRemplacer une fourgonnette Diesel par une électrique est évidemment plus facile dans certains types d\'utilisations que dans d\'autres. Par exemple, la transition vers la propulsion électrique est facile pour les missions de livraison dites du «dernier kilomètre», les services de messagerie locaux et pour ceux qui conduisent principalement ou exclusivement en ville, avec des coûts de consommation plus bas.\r\nPour les utilisateurs qui doivent transporter des charges lourdes, tracter une remorque, parcourir de longues distances sur l\'autoroute et/ou qui n\'ont pas leurs propres moyens de recharge, un tel changement est évidemment actuellement beaucoup moins simple.\r\nCar la capacité de charge utile d\'une fourgonnette électrique est réduite en raison de la lourde batterie par rapport à un modèle Diesel comparable, et l\'autonomie d\'une fourgonnette électrique diminue considérablement lorsqu\'une remorque doit être tirée.\r\nEn raison du timing serré lié à une utilisation professionnelle, il est potentiellement problématique pour les entrepreneurs de devoir planifier des arrêts de charge plus longs qu\'un simple plein de carburant classique. C\'est pourquoi l\'autonomie d\'une fourgonnette électrique et sa vitesse de charge sont des critères prépondérants, et la demande de batteries plus grandes pour les véhicules utilitaires est réelle et nécessaire.'),
(4, 'Test', 'Test'),
(5, 'Test', 'Test'),
(6, 'Test', 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexe` varchar(8) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `sexe`, `date_de_naissance`, `statut`) VALUES
(1, 'Benali', 'Youcef', 'ybenali884@gmail.com', 'youcef', 'masculin', '2002-03-12', 'blocked'),
(2, 'Oubahi', 'Abderrahmane', 'ky_benali@esi.dz', 'abdou', 'masculin', '2002-12-12', 'blocked'),
(3, 'Arab', 'Lina', 'jl_arab@esi.dz', 'lina', 'feminin', '2002-03-12', 'blocked'),
(4, 'abdellatif', 'benjeddou', 'ka_benjeddou@esi.dz', 'lotfi', 'masculin', '2002-06-19', 'approved'),
(5, 'Rezzazi', 'Abdessamed', 'km_rezzazi@esi.dz', 'samada', 'masculin', '2002-09-23', 'approved'),
(7, 'test3', 'test', 'test@gmail.fr', 'test', 'masculin', '2002-11-11', 'approved'),
(8, 'test2', 'test2', 'test2', '123', 'masculin', '2004-11-11', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `modele_id` int(11) DEFAULT NULL,
  `version_id` int(11) DEFAULT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `nom`, `marque_id`, `modele_id`, `version_id`, `prix`) VALUES
(2, 'Fiat 500 Club 1.0 Hybrid 70ch', 3, 1, 1, 2635000),
(3, 'Fiat Tipo Sedan City 1.6 eTorq 110 BVA', 3, 2, 2, 3145000),
(4, 'Fiat Doblo Fourgon Tôlé 1.6 HDI 92 CH', 3, 3, 3, 3178000),
(5, 'Volkswagen Golf 7 R Line 2.0 TDI 143ch DSG\r\n', 1, 4, 4, 4799000),
(6, 'Volkswagen Passat Comfortline 2.0 TDI 177ch DSG6', 1, 5, 5, 4649000),
(7, 'Volkswagen New Tiguan R Line 4x4 2.0 TDI 177ch DSG7', 1, 6, 6, 6499000),
(8, 'Renault Clio 4 Facelift GT Line 1.5 DCi 110ch\r\n', 2, 7, 7, 3841000),
(9, 'Renault Symbol restylée Extrême 1.6 ess MPi 80 ch', 2, 8, 8, 2760000),
(10, 'Renault Nouvelle Megane Intense 1.5 dci 105 Ch', 2, 9, 9, 2487000),
(11, 'Hyundai Accent GL+ 1.6 CRDI 128ch', 4, 10, 10, 1984900),
(12, 'Hyundai H100 2.5l CRDI 130ch', 4, 11, 11, 3624000),
(13, 'Hyundai New Tucson GL DZ 2.0 CRDI 4x2 177ch BVA', 4, 12, 12, 4425000),
(14, 'Toyota Yaris Red Edition Nouvelle 1.3 VVTI 99ch', 5, 13, 13, 2800000),
(15, 'Toyota Hilux Legend 7 Simple Cabine 4x2 IMVS2-KD-N2-PA Sans clim + PARCHOC Ar', 5, 14, 14, 2800000),
(16, 'Toyota Hiace KD 15 PL A/C', 5, 15, 15, 4500000);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_caracteristique`
--

CREATE TABLE `vehicule_caracteristique` (
  `id` int(11) NOT NULL,
  `Value` varchar(255) NOT NULL,
  `vehicule_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule_caracteristique`
--

INSERT INTO `vehicule_caracteristique` (`id`, `Value`, `vehicule_id`, `feature_id`) VALUES
(1, '1.0 Hybrid 70ch', 2, 1),
(2, 'Hybride Essence', 2, 2),
(3, '5.0-5.3l/100km', 2, 3),
(4, '1.6 eTorq 110 BVA', 3, 1),
(5, 'Essence', 3, 2),
(6, '9.2/4.6/6.3l/100km', 3, 3),
(7, '1.6 HDI 92 CH', 4, 1),
(8, 'Diesel', 4, 2),
(9, '5.3l/100km', 4, 3),
(10, '2.0 TDI 143ch DSG', 5, 1),
(11, 'Diesel', 5, 2),
(12, '5.1l/100km', 5, 3),
(13, '2.0 TDI 177ch DSG6', 6, 1),
(14, 'Diesel', 6, 2),
(15, 'mixte 4.5l/100kml/100km', 6, 3),
(16, '2.0 TDI 177ch DSG7', 7, 1),
(17, 'Diesel', 7, 2),
(18, '7.9/5.4/6.4l/100km', 7, 3),
(19, '1.5 DCi 110ch', 8, 1),
(20, 'Diesel', 8, 2),
(21, '5,4/4,2/4,7l/100km', 8, 3),
(22, '1.6 Ess 80 Ch', 9, 1),
(23, 'Essence/Sans plomb', 9, 2),
(24, '5.9/7.2/9.5/100km', 9, 3),
(25, '1.5 dci 105 Ch', 10, 1),
(26, 'Diesel/Gazole', 10, 2),
(27, '4.1/4.5/5.3l/100km', 10, 3),
(28, '1.6 CRDI 128ch', 11, 1),
(29, 'Diesel', 11, 2),
(30, '6.5/ 4.4/ 5.2l/100km', 11, 3),
(31, '2.5l CRDI 130ch', 12, 1),
(32, 'Diesel', 12, 2),
(33, '8.5l/100km', 12, 3),
(34, '2.0 CRDI 4x2 177ch BVA', 13, 1),
(35, 'Diesel', 13, 2),
(36, '9.1/6/7.1l/100km', 13, 3),
(37, '1.3 VVTI 99ch', 14, 1),
(38, 'Essence', 14, 2),
(39, '6.4/4.5/5.2 l/100km', 14, 3),
(40, '2.5 Diesel 102 Ch', 15, 1),
(41, 'Diesel', 15, 2),
(42, '7.3 l/100km', 15, 3),
(43, '3.0 75 ch', 16, 1),
(44, 'Diesel', 16, 2),
(45, '6.2/11.9 l/100km', 16, 3);

-- --------------------------------------------------------

--
-- Structure de la table `version`
--

CREATE TABLE `version` (
  `id` int(11) NOT NULL,
  `modele_id` int(11) DEFAULT NULL,
  `version` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `version`
--

INSERT INTO `version` (`id`, `modele_id`, `version`, `annee`) VALUES
(1, 1, 'club', 2022),
(2, 2, 'sedan city', 2016),
(3, 3, 'Fourgon tolé', 2023),
(4, 4, '7 R-line', 2019),
(5, 5, 'Comfortline', 2019),
(6, 6, 'R-line 4x4', 2019),
(7, 7, 'Facelift GT Line', 2015),
(8, 8, 'Extrême', 2020),
(9, 9, 'Intense', 2021),
(10, 10, 'GL+', 2018),
(11, 11, '2020', 2020),
(12, 12, 'GL DZ', 2019),
(13, 13, 'Red Edition Nouvelle', 2019),
(14, 14, 'Legend 7', 2014),
(15, 15, 'KD 15', 2013);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel1` (`utilisateur_id`),
  ADD KEY `rel2` (`vehicule_id`),
  ADD KEY `rel3` (`marque_id`);

--
-- Index pour la table `caracteristique`
--
ALTER TABLE `caracteristique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comparaison`
--
ALTER TABLE `comparaison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicule1_id` (`vehicule1_id`),
  ADD KEY `vehicule2_id` (`vehicule2_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicule_id` (`vehicule_id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marque_id` (`marque_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `vehicule_id` (`vehicule_id`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marque_id` (`marque_id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marque_id` (`marque_id`),
  ADD KEY `modele_id` (`modele_id`),
  ADD KEY `version_id` (`version_id`);

--
-- Index pour la table `vehicule_caracteristique`
--
ALTER TABLE `vehicule_caracteristique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_id` (`feature_id`),
  ADD KEY `vehicule_id` (`vehicule_id`);

--
-- Index pour la table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modele_id` (`modele_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `caracteristique`
--
ALTER TABLE `caracteristique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comparaison`
--
ALTER TABLE `comparaison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `vehicule_caracteristique`
--
ALTER TABLE `vehicule_caracteristique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `version`
--
ALTER TABLE `version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `rel1` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rel2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`),
  ADD CONSTRAINT `rel3` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`);

--
-- Contraintes pour la table `comparaison`
--
ALTER TABLE `comparaison`
  ADD CONSTRAINT `comparaison_ibfk_1` FOREIGN KEY (`vehicule1_id`) REFERENCES `vehicule` (`id`),
  ADD CONSTRAINT `comparaison_ibfk_2` FOREIGN KEY (`vehicule2_id`) REFERENCES `vehicule` (`id`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `image_ibfk_3` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`);

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `vehicule_ibfk_2` FOREIGN KEY (`modele_id`) REFERENCES `modele` (`id`),
  ADD CONSTRAINT `vehicule_ibfk_3` FOREIGN KEY (`version_id`) REFERENCES `version` (`id`);

--
-- Contraintes pour la table `vehicule_caracteristique`
--
ALTER TABLE `vehicule_caracteristique`
  ADD CONSTRAINT `vehicule_caracteristique_ibfk_1` FOREIGN KEY (`feature_id`) REFERENCES `caracteristique` (`id`),
  ADD CONSTRAINT `vehicule_caracteristique_ibfk_2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`);

--
-- Contraintes pour la table `version`
--
ALTER TABLE `version`
  ADD CONSTRAINT `version_ibfk_1` FOREIGN KEY (`modele_id`) REFERENCES `modele` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
