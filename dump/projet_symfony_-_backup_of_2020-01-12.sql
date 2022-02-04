-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2020 at 12:09 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2018_symfony_projet_examen`
--
CREATE DATABASE IF NOT EXISTS `2018_symfony_projet_examen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `2018_symfony_projet_examen`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Frameworks PHP'),
(2, 'Frameworks CSS'),
(3, 'Templating'),
(4, 'Bootstrap'),
(5, 'HTML'),
(6, 'JavaScript'),
(7, 'SASS'),
(8, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categories`) VALUES
(1, 'Carte-mère'),
(2, 'Processeur'),
(3, 'Mémoire'),
(4, 'Carte‑graphique'),
(5, 'Alimentation'),
(6, 'Tour'),
(7, 'Ventilateur'),
(8, 'S.S.D., H.D., M.2'),
(9, 'Programme'),
(10, 'Carte‑son'),
(11, 'WebCam'),
(14, 'Micro‑phône'),
(15, 'Scanner'),
(16, 'Imprimante'),
(17, 'Joystick'),
(18, 'Joypad');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `product_id`, `comment`, `date_added`) VALUES
(1, 5, 1, 'Super tour très solide et très bien compartimênté… Super.', '2018-12-10 13:33:16'),
(3, 4, 1, 'J\'aime pas cette tour, elle est naze !!!', '2018-12-11 21:12:42'),
(4, 3, 2, 'Alimentation fonctionnel. J\'adore.', '2018-12-11 21:25:28'),
(5, 1, 2, 'Corsair c\'est de la cacaille…', '2018-12-11 21:32:04'),
(6, 2, 3, 'Asus c\'est du bon matos.', '2018-12-11 21:32:06'),
(7, 6, 5, 'Cette mémoire c\'est de l\'arnaque, elle fonctionne en 3200, si on l\'overclock avec les profils Intel XMP, sinon sa vitesse réel est de 2400MHz en DDR4 !!!', '2018-12-11 21:58:18'),
(8, 2, 1, 'Une tour Corsair, bien pênsé, tout à fait bien compartimenté et très pratique…', '2018-12-12 00:52:48'),
(9, 3, 1, 'J\'adore cette tour, la meilleur que j\'ai jamais eu !', '2018-12-12 00:54:19'),
(10, 1, 1, 'Je l\'ai acheté et je ne regrette pas !!!', '2018-12-12 00:54:45'),
(11, 2, 2, 'Je trouve que cette alimentation et juste parfaite.', '2018-12-12 00:58:21'),
(12, 2, 4, 'Excellente performance et très bon rapport qualité prix.', '2018-12-12 00:59:29'),
(13, 1, 4, 'Le processeur i7 7800x 6 cores 3.5Ghz de mes rêves !!!\r\n4× plus rapide que mon ancien Intel Quad Core Q9650 3GHz.', '2018-12-12 00:59:30'),
(14, 4, 6, 'C\'est un super ventilateur le meilleur du monde même, mais il est trop volumineux et peux empêcher la fermeture la plaque de droite de la tour.', '2018-12-12 01:03:54'),
(15, 2, 10, 'Y a de l\'espace sur ce disque. Pas de soucis.', '2018-12-12 01:14:40'),
(16, 5, 9, 'Windows 10, mon O.S. préféré.', '2018-12-12 08:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20181128192056'),
('20181128194650'),
('20181128194812'),
('20181128195633'),
('20181128211301'),
('20181202083637'),
('20181202085258'),
('20181202125913'),
('20181203082639'),
('20181204121629'),
('20181204122534'),
('20181204142216'),
('20181206094715'),
('20181206095116'),
('20181206095643'),
('20181206095756'),
('20181206095903'),
('20181206095912'),
('20181206123142'),
('20181208135113'),
('20181208145549'),
('20181208150056'),
('20181208150247'),
('20181208152219'),
('20181208152647'),
('20181208154044'),
('20181208154807'),
('20181208154814'),
('20181208154848'),
('20181208155914'),
('20181208172758'),
('20181208185138'),
('20181208185616'),
('20181208213842'),
('20181208220925'),
('20181210130734'),
('20181210133200');

-- --------------------------------------------------------

--
-- Table structure for table `notation`
--

CREATE TABLE `notation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `notation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notation`
--

INSERT INTO `notation` (`id`, `user_id`, `product_id`, `notation`) VALUES
(1, 1, 1, 5),
(2, 2, 3, 4),
(3, 2, 6, 3),
(4, 3, 9, 4),
(5, 4, 8, 1),
(6, 1, 2, 4),
(7, 4, 4, 0),
(8, 1, 3, 3),
(9, 2, 4, 5),
(10, 2, 5, 4),
(11, 3, 6, 4),
(12, 3, 7, 5),
(13, 3, 8, 3),
(14, 4, 9, 4),
(15, 4, 10, 5),
(16, 4, 11, 4),
(19, 2, 1, 4),
(20, 3, 1, 5),
(21, 4, 1, 4),
(23, 1, 7, 4),
(24, 5, 2, 4),
(25, 5, 3, 4),
(26, 5, 4, 3),
(27, 5, 5, 2),
(28, 5, 6, 5),
(29, 5, 7, 5),
(30, 5, 8, 3),
(31, 5, 9, 2),
(32, 5, 10, 1),
(33, 5, 11, 0),
(34, 5, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL,
  `content` text NOT NULL,
  `created` date NOT NULL,
  `image` varchar(60) NOT NULL,
  `idCategory` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `visibility` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created`, `image`, `idCategory`, `idUser`, `visibility`) VALUES
(1, 'Language HTML', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam cum, dicta, dolor ducimus explicabo molestiae, natus necessitatibus nemo nulla odit officia perferendis porro quae quas reiciendis rem rerum vel voluptas?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dolorem odio omnis. Et laudantium libero perspiciatis praesentium, repudiandae sint sunt?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti harum mollitia similique. Ad corporis ipsum necessitatibus nobis placeat recusandae sapiente sint? Aperiam atque autem dolore dolores, enim harum incidunt ipsam laudantium molestiae nam non officia praesentium, provident quo, tempore velit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ea, exercitationem expedita id inventore iste iure laudantium magni modi necessitatibus quibusdam quidem rerum vero voluptates voluptatibus. Accusamus debitis deserunt dolore eius expedita fugiat, inventore ipsam laboriosam minima nobis reiciendis sit voluptatum. Aperiam, libero, quam? Accusamus corporis doloribus molestiae ratione veniam?', '2018-03-29', 'html-language.png', 5, 1, 1),
(2, 'Language PHP', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid dolore earum error in iure laudantium mollitia nemo nostrum numquam obcaecati omnis placeat repellat sapiente, tempore ullam veniam voluptates voluptatibus? Ducimus ipsum nemo obcaecati perferendis quas rerum sapiente vel velit. Ipsam!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi architecto assumenda corporis culpa dolorem dolores eveniet facere illo illum laboriosam laborum modi, neque omnis praesentium provident qui repellendus, soluta temporibus ullam ut, veritatis voluptas? At consequatur deleniti dolorum eum exercitationem expedita fugiat fugit illum itaque, laborum maiores nemo nulla quam quasi quis quisquam quos sed sequi tempore veritatis voluptates.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis deleniti ducimus earum eius eum fuga, fugiat incidunt necessitatibus quod.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. A at est modi nobis. Accusantium architecto eligendi iusto placeat possimus! Ab autem, blanditiis debitis earum eum excepturi iste mollitia, nemo, quidem reiciendis soluta voluptatibus! Accusantium expedita laudantium nesciunt optio repellat vitae?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid culpa, deserunt illum itaque magnam perspiciatis quae quam rem sint tenetur! Ad dolorem dolores doloribus dolorum est ex, explicabo facilis fuga harum laboriosam maiores modi molestiae mollitia neque nisi obcaecati odit quae quidem ratione reiciendis repellendus reprehenderit tenetur ut velit voluptates!', '2018-03-30', 'php-language.png', 8, 1, 1),
(3, 'Templating', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, tempora.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolores pariatur quos sequi vero! Autem eos minus mollitia natus vitae.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur earum eos, error modi officia placeat quasi velit. Dolores earum et explicabo, magnam numquam optio quod ratione totam voluptas voluptatem!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium at corporis, cumque dicta ex explicabo inventore ipsa iusto nam necessitatibus nulla odio quaerat qui quibusdam quis quos similique, suscipit tenetur vero? Aliquid deleniti minus omnis reiciendis. Consequuntur quo, voluptas.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque commodi distinctio dolorem eius esse est illum inventore, ipsa, ipsam iusto labore laudantium modi necessitatibus nemo praesentium quam quasi qui, quia quos tempora velit voluptatem? Aliquam autem consequuntur, cumque cupiditate fuga illo iste labore quas repellat sequi similique tempore unde?', '2018-03-31', 'template.jpg', 3, 2, 1),
(4, 'Bootstrap', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cum, delectus dicta doloremque eaque est impedit incidunt itaque optio pariatur perferendis quibusdam quisquam quo quod rem tempora veritatis! A accusamus dolor error et eveniet ex, facere facilis incidunt itaque iure labore minus molestiae nam nihil nulla numquam obcaecati odit officiis repudiandae saepe sapiente tempora tempore, tenetur ut vitae. Asperiores beatae culpa dolore est ex harum labore, possimus veniam. Dicta dignissimos esse molestiae, necessitatibus nulla quibusdam recusandae tenetur voluptas voluptate voluptatum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem incidunt ipsam laudantium magni maxime nulla. Eos eveniet mollitia nam nobis sed. Accusamus impedit odio omnis optio vel. Eos iure magnam reiciendis rem voluptas! Accusamus adipisci amet consequatur cupiditate doloremque dolores fugit, harum, hic illum impedit magni maiores nostrum officia optio possimus provident quas quia quibusdam quo reprehenderit sed temporibus veritatis voluptates? Dolor eum laboriosam laborum laudantium numquam praesentium repudiandae. Autem blanditiis ipsam nihil. Animi corporis debitis dicta dolores dolorum ducimus earum esse ipsum, iusto maxime molestiae natus neque nesciunt obcaecati, pariatur vel velit. Ad animi, aperiam deleniti esse eveniet fugiat illum labore, magni minima mollitia perspiciatis repellendus. Aperiam consequatur culpa dolorem iste nesciunt odio placeat porro provident voluptatibus! Laborum, mollitia!', '2018-04-01', 'bootstrap-stack.png', 4, 2, 1),
(5, 'Le JavaScript', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam at blanditiis consectetur corporis doloribus, ducimus eum exercitationem expedita, fuga maxime officia possimus quae quibusdam repellendus saepe sequi veritatis voluptates!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consequatur distinctio ipsum maxime mollitia natus nesciunt officia quaerat ratione unde? Ab aperiam at atque consequuntur eaque ex explicabo iusto labore, odio quae recusandae reiciendis soluta tempore ut, vitae? Consequuntur earum maxime voluptate. Ad animi consectetur enim labore laudantium nemo repudiandae!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deleniti dolor dolorum ea laborum maxime natus officiis praesentium quae suscipit!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque error ipsa omnis quos veritatis. A accusantium adipisci amet at atque dignissimos enim eum excepturi fuga, harum impedit iure libero magnam minus modi molestiae mollitia neque obcaecati omnis optio quae quaerat quibusdam sunt tempora ut vero, vitae voluptas. Architecto hic inventore similique sunt? Deleniti distinctio doloremque ea magni numquam! Doloribus, quibusdam!', '2018-04-02', 'javascript_logo.png', 6, 3, 1),
(6, 'Le SASS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus natus, saepe! Eius sunt tempore voluptatem voluptates? Ab dolores fugit iusto, odio odit quidem quos suscipit. Adipisci amet aperiam assumenda beatae consectetur dicta dolore et ex fugiat illum ipsum laboriosam molestiae nemo nisi perferendis porro quam quas quibusdam quo repellat reprehenderit, saepe sequi sit tenetur ut veritatis voluptatem. Autem, eos excepturi explicabo fugiat inventore molestias mollitia, placeat porro quasi repellat, sed.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur at cupiditate debitis, error eum exercitationem magnam minima nihil placeat quidem quis sapiente similique sit suscipit ut vitae. Beatae explicabo id laudantium molestiae non quae quidem suscipit totam. Alias consequuntur cupiditate deserunt eveniet fuga molestias pariatur porro quidem quisquam quos! Autem, consequuntur ex fugiat in ipsum laudantium mollitia quas? Architecto at dicta dolorem dolores excepturi illo, iusto magni modi molestias, nemo qui temporibus ut voluptatum. Atque error esse, et hic illo iure iusto modi neque ratione suscipit vel, voluptatibus. Et.', '2018-04-03', '2000px-Sass_Logo_Color.svg.png', 7, 3, 1),
(7, 'Le framework PHP', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium aliquid assumenda atque autem consectetur consequuntur corporis cupiditate deleniti, dicta dignissimos dolor dolore, doloribus eligendi exercitationem expedita in molestiae mollitia nam necessitatibus numquam omnis optio perferendis placeat possimus qui quisquam quo ratione sed similique soluta unde vero voluptate. Asperiores, eum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. At, beatae blanditiis doloremque earum error nam! Dolor error et ipsa veniam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus autem dolorum esse, fugiat incidunt libero magnam molestiae nesciunt non quisquam sed, ullam unde! Atque cumque exercitationem fuga mollitia nisi omnis sed similique totam voluptates. Ab ad, consectetur, ducimus ea esse eveniet ipsa mollitia porro quam quibusdam sint, soluta tenetur vero. Dolor eligendi mollitia nisi rem. Delectus omnis possimus provident voluptas.', '2018-04-04', 'frameworks-php.jpg', 1, 4, 1),
(8, 'Le framework CSS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi deserunt doloribus excepturi fuga, in itaque libero minus molestias nostrum numquam, provident quae qui reiciendis vero voluptates? Ad iusto quisquam tempora? Autem culpa debitis dicta dolore doloremque eveniet fugit laudantium, magnam nobis, nulla numquam odit reiciendis sint voluptate voluptates. Amet molestias quibusdam ullam. Animi assumenda itaque, iure molestiae neque sunt voluptates. Aliquam cum distinctio itaque repellat totam, velit? Aliquam aperiam autem corporis cupiditate delectus dicta distinctio ea eos, fugiat laudantium magni modi nobis nulla odit, omnis porro quidem tempora tenetur, voluptatem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Alias ea ex, molestias nostrum possimus quam quas quisquam similique sit suscipit? Architecto blanditiis delectus eum hic ipsa labore ratione repellat sit unde voluptate. Deserunt illum possimus praesentium qui reprehenderit ullam. Ad amet dolores ducimus facilis iure minus molestias officia pariatur, quasi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at autem consequatur debitis doloremque eligendi est, in, minima molestias nihil nobis nostrum nulla quidem sequi tempora ullam voluptas? Est eum labore quidem tempora. Molestiae omnis recusandae temporibus vitae. Animi at commodi culpa cupiditate deserunt distinctio dolore doloribus esse excepturi exercitationem fuga, fugiat impedit incidunt itaque laudantium libero minus molestiae neque officiis omnis perspiciatis quam recusandae reiciendis rem similique tempora temporibus unde vero voluptate voluptatum. Eum in iusto praesentium quasi vel.', '2018-04-05', 'Frameworks-css.jpg', 2, 4, 1),
(9, 'Wireframe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at dignissimos fugit illum iste iusto, nesciunt odio quidem quisquam rem rerum, saepe, sit tenetur! Ad assumenda atque est nulla porro.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Amet autem cumque, eius necessitatibus obcaecati officia optio, perferendis, possimus quae quaerat quidem voluptate. A amet dolorem doloremque non odio quos repudiandae, ullam voluptas! Ad asperiores atque, culpa doloremque doloribus, earum illo, labore nesciunt officia officiis quidem quisquam sit soluta velit voluptatem!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur debitis et eum exercitationem expedita necessitatibus possimus repellat, sint temporibus tenetur?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi necessitatibus reprehenderit voluptatum! Ad aperiam deserunt dignissimos, dolores eligendi eum expedita iste neque obcaecati, odit provident quam, quis repellat repudiandae sequi suscipit voluptas? Adipisci consectetur consequatur esse inventore, labore laboriosam maxime perferendis reiciendis vitae. Aliquam doloremque eveniet laboriosam molestiae nihil officiis sunt veritatis! Aliquid asperiores aspernatur at atque consectetur consequuntur cumque delectus deleniti dolorum eius eum, nihil obcaecati porro possimus totam.', '2018-04-06', 'wireframe.jpg', 3, 1, 1),
(10, 'Structuration', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aliquid aperiam asperiores aspernatur assumenda at atque culpa cum deleniti dolorem doloribus, ducimus eos error, in incidunt inventore itaque libero necessitatibus, quod recusandae reiciendis rem rerum sed sunt veritatis voluptate?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid assumenda consequatur dolore doloribus laborum minus nesciunt placeat rerum unde voluptate! Animi atque autem, deserunt dicta dolores eius esse explicabo facere inventore laboriosam molestiae neque odio, officiis pariatur provident quaerat veniam?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam animi aspernatur at deleniti eos eum eveniet facilis fuga harum in inventore iste laboriosam nesciunt nobis odit pariatur praesentium provident quasi quibusdam reiciendis, reprehenderit ullam vel, veritatis vitae, voluptas voluptatem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloribus ipsam minima nemo porro. Aliquam officiis quas qui velit voluptas? Ad alias architecto blanditiis deleniti dolores, eligendi hic inventore iusto libero magni nobis officia quod rem soluta ut? Laudantium, quisquam?', '2018-04-07', 'structuration.png', 5, 2, 1),
(11, 'Layout', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam eius fugit iure nisi nulla odio recusandae sapiente. Aperiam consequuntur cum eaque, libero minima minus mollitia natus officia pariatur recusandae similique suscipit, vel velit? Architecto, dolores harum laboriosam placeat quos reprehenderit. A accusantium eligendi enim eos molestiae placeat rem ullam, vel.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis itaque maxime natus nostrum odio rem reprehenderit? Beatae blanditiis corporis, dolorem, ducimus enim fugiat maiores minus nostrum quisquam recusandae sit ullam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eius enim excepturi illum in itaque molestiae odit, officia perspiciatis placeat, quasi recusandae reprehenderit tempore vitae voluptatum! Aliquid amet, assumenda, debitis excepturi in inventore nam nesciunt, nostrum nulla optio quis voluptates.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt doloribus et excepturi nulla praesentium quidem, rem sapiente sequi unde voluptatem!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur consequuntur cumque doloribus ducimus eius est facere itaque minima officiis, placeat possimus provident quam recusandae saepe, sed tenetur veniam!', '2018-04-08', 'layout.gif', 4, 3, 1),
(12, 'Variables JS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad adipisci aliquam aperiam architecto atque aut autem consectetur consequatur consequuntur cupiditate delectus, deserunt dicta doloremque dolores dolorum ea earum eligendi enim id incidunt ipsam iure maiores natus nemo neque non optio praesentium provident rem repellat sint, sunt tempore totam ullam voluptatem voluptatum. Dolorem et explicabo fugit, nisi odio officia quisquam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus eius in, inventore natus nesciunt odit quod! Cumque praesentium sunt vitae voluptatem? Aperiam, architecto eveniet in natus odit omnis perferendis quas sed ut vel. Impedit libero perferendis quae? Laboriosam placeat porro sequi. Aspernatur dolor eos illo labore laudantium molestias similique tempora ut? Aut corporis culpa deleniti dignissimos, earum explicabo facilis ipsum laboriosam nam, officiis omnis rerum temporibus velit? Ad commodi delectus doloribus ea, illo iure magnam neque sed suscipit ut velit?', '2018-04-09', 'variable-js.jpg', 6, 4, 1),
(17, 'La programmation, quel joie !!!', 'J\'ai appris,\r\nJ\'applique,\r\nJ’améliore.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolor eaque expedita, officiis pariatur placeat qui repellendus vel! Accusamus dicta eius esse id illum laborum officiis quam reiciendis tempora. Molestias?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur culpa dolorem ducimus ea est facilis illo ipsa labore laudantium magni, molestias nam nemo neque nesciunt obcaecati porro possimus quis quisquam quod quos, repellat rerum sunt tenetur totam ullam velit, voluptatum. Accusamus necessitatibus perspiciatis rem? Iste laudantium minima repellendus tenetur voluptates.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda consectetur cumque cupiditate dolore doloribus ea labore, laudantium magni maxime, nemo odit pariatur quibusdam velit voluptatibus. Nulla quisquam reprehenderit voluptatum?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Est labore neque quae sed sunt, temporibus tenetur. Alias at, consectetur dignissimos ducimus est et fugit, incidunt minima natus odit perferendis ut velit voluptatibus? Ab accusantium consequuntur, dolores eligendi esse excepturi facere minus nihil perferendis quia reprehenderit, sequi soluta totam unde vero!', '2018-05-29', 'james-1998.jpg', 8, 1, 1),
(20, 'Professeur Jean-Christophe Chantraine', 'Grand philosophe, connue...\r\n\r\nTrès sage, très sympa.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi aperiam atque culpa debitis dolor dolore dolores doloribus earum ex facilis illo ipsa ipsam labore magni modi mollitia neque nobis nulla obcaecati officia omnis perspiciatis quam quidem quis, quo quos recusandae repellat repudiandae saepe sed similique sint sit tenetur vel.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae cumque dolor dolorem dolorum eligendi enim et eum id incidunt maiores nobis pariatur provident quam quidem similique sunt, veniam voluptatem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid amet architecto assumenda blanditiis consectetur consequatur culpa cumque dicta dolores ea ex excepturi expedita explicabo laboriosam magnam minus molestiae mollitia nostrum numquam odio, officia officiis quasi qui repellat repellendus saepe sed sint sunt temporibus vel velit voluptate voluptates? Aspernatur cumque debitis dignissimos eius ex incidunt perspiciatis reiciendis veniam. Ducimus, inventore?', '2018-05-27', '05090905511412001-10-a-full.jpg', 5, 1, 1),
(21, 'PHP rapide comme l\'éclair', 'Si c\'est vrai...\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam, animi blanditiis commodi dolores eligendi est et fugit ipsa, necessitatibus obcaecati odio pariatur quasi qui totam. Praesentium quo reprehenderit velit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, officiis saepe? Aliquam culpa iste libero minus perspiciatis. Atque blanditiis dolor eligendi impedit possimus quos voluptates? Amet aspernatur consectetur consequatur debitis distinctio dolorem error magni praesentium provident quo recusandae reprehenderit, ullam?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, accusantium.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus est eum repellendus sapiente tempora, vel! Animi corporis eaque error et exercitationem harum id illum, in iste modi necessitatibus nemo nostrum odio perspiciatis porro provident quaerat quos ratione tempore temporibus voluptate.', '2018-05-30', 'YGGDRAZIL oluf-olufsen-bagge.jpg', 8, 1, 1),
(25, 'Initiation à Bootstrap', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque distinctio enim vel veniam? Eius ex id libero natus perspiciatis placeat quidem ut velit. Aliquam asperiores aut culpa doloremque facere impedit in nobis officiis, perferendis praesentium saepe sint, tenetur veniam. Adipisci alias cumque deleniti. Asperiores aut commodi dolorem expedita, ipsa maiores ratione vel veniam. A aliquam culpa expedita fugiat, ipsum nesciunt quaerat ratione voluptates? Aliquid aspernatur, doloremque exercitationem minus soluta vero.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Animi assumenda corporis culpa cum dignissimos dolor dolores doloribus ea eius est fuga illo impedit ipsam, iste maiores maxime molestias necessitatibus nesciunt odio officia omnis praesentium quam qui quia quis repellat repellendus rerum, sapiente sed similique sunt vero voluptates voluptatum. Ab atque commodi culpa debitis dicta distinctio eaque eos esse eveniet fuga hic ipsam, iusto labore laboriosam nesciunt non officia perferendis quaerat quam quidem reprehenderit, sit temporibus velit. Itaque modi non quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis doloremque ducimus, eligendi fugiat in incidunt laborum maiores minima minus nemo placeat quasi quidem quod reiciendis repellendus sed similique sunt velit. Aliquid assumenda beatae commodi dolore, dolorum, eius eligendi esse facilis id inventore natus nihil nobis quae quas qui, quia similique sunt tempore vero voluptatibus? Aliquam et ipsam omnis reprehenderit vero?', '2018-05-31', 'attention_manipulation.jpg', 4, 1, 0),
(28, 'FrameWork Sun', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, blanditiis delectus deserunt et ex harum magni minus nobis officia pariatur provident repudiandae rerum vero. A accusantium, alias aliquid assumenda at beatae commodi cupiditate, debitis dicta dolor doloribus earum esse est eveniet facere fuga iure iusto laboriosam laudantium minima necessitatibus neque nostrum odio officiis porro quam quas quasi qui quis reiciendis, rerum sit sunt totam unde veritatis vero vitae? Ab, minima!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. A alias asperiores autem consequuntur corporis eius exercitationem fuga, itaque iure labore minima nisi non possimus quaerat quia quos repudiandae sed sunt unde velit voluptas voluptate voluptatem! Aliquam autem beatae cumque debitis delectus dolorem, ducimus eaque eum excepturi iste laudantium maxime, nesciunt nostrum, odit officia reprehenderit saepe tempore unde voluptatem voluptates? Amet beatae corporis dolor eum neque velit, voluptas! Adipisci atque cumque impedit laboriosam, mollitia obcaecati quam quas, quia rem, sit voluptate?', '2018-06-02', 'sun5.jpg', 2, 5, 0),
(29, 'PHP : $_SESSION...', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam autem beatae commodi consectetur corporis cumque distinctio doloremque eius eum ex id minima molestias mollitia necessitatibus numquam odit, quae quia quidem rem repellendus repudiandae similique sint, sunt temporibus ut voluptas?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. At minus quaerat quam quod voluptas. Beatae blanditiis corporis doloremque itaque, iusto quas rem sed velit. A corporis dolores, eius hic illo magni minima minus, nihil odit officiis quas quos rem vel?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa molestiae quaerat similique ut veniam! Alias aliquam expedita hic illo iste, necessitatibus nobis perspiciatis provident, quae repellendus sunt ullam! Accusamus architecto aspernatur consectetur consequuntur cumque officia officiis quae recusandae, saepe veritatis?', '2018-05-31', 'troudever.jpg', 8, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion` smallint(6) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `promotion`, `image`, `date_added`, `category_id`, `user_id`, `url`) VALUES
(1, 'Corsair Graphite™ 230T', 84.9, 'Boîtier Moyen Tour\r\nVentilateur aspirants avant à LED de 120 mm, et ventilateur d\'évacuation arrière de 120 mm\r\nPanneau avant avec connecteurs USB 3.0\r\nInstallation des disques durs, disques SSD et disques optiques sans outil\r\nDécoupes pour routage des câbles et pour carte-mère de fond de panier à refroidisseur liquide de processeur\r\nSept connecteurs PCIe avec vis à main et espace suffisant pour cartes graphiques de 320 mm\r\nInstallez simultanément jusqu\'à quatre lecteur 3,5\" et quatre lecteurs 2,5\", et ce sans outil !\r\nFixations autorisant jusqu\'à six ventilateurs pour un potentiel de refroidissement optimal\r\nFiltres à poussière sur les prise d\'air avant et celles du bloc d\'alimentation\r\nEspace suffisant pour accueillir des blocs d\'alimentation ATX allant jusqu\'à 200 mm (non inclus)', 11, 'Corsair_graphite_230t.jpg', '2018-12-02 13:40:24', 6, 3, 'https://www.corsair.com/fr/fr/Cat%C3%A9gories/Produits/Bo%C3%AEtiers/Gamme-Graphite%E2%84%A2---Bo%C3%AEtier-mi-tour-compact-230T/p/CC-9011036-WW'),
(2, 'Corsair TX850M', 129.99, 'Alimentation semi-modulaire 850 Watts\r\nCertifié 80PLUS Gold\r\nPrend en charge les normes ATX12V 2.4/2.31/2.2/2.01 et EPS12V 2.92\r\nEntrée CA universelle de 100 à 240 V\r\nUn rail unique dédié +12V offre une compatibilité maximale avec les composants les plus récents\r\nProtections contre les surtensions, surintensités, sous-tensions et courts-circuits\r\nTaille ventilateur : 120 mm', 0, 'corsair_tx850m.png', '2018-12-02 13:36:38', 5, 3, 'https://www.corsair.com/fr/fr/Power/txm-series-2017-config/p/CP-9020130-EU'),
(3, 'Asus Prime X299-A', 344.95, 'Chipset Intel LGA 2066 ATX avec ventirad M.2,\r\nR.A.M. DDR4 à 4133 MHz,\r\ndeux slots M.2,\r\nsupport de Intel VROC,\r\nSATA 6 Gb/s,\r\nconnecteur USB 3.1 Gen 2 sur le panneau avant.', 10, 'asus_prime_x299-a.jpg', '2018-11-20 20:10:01', 1, 3, 'https://www.asus.com/be-fr/Motherboards/PRIME-X299-A/'),
(4, 'Intel i7 7800x 6 cœurs à 3.5GHz', 459.95, '6-Core 3,5GHz & 4GHz (Turbo)\r\n12-threads\r\nSocket 2066\r\nCache L3 8.25 Mo\r\n0.014 micron\r\nTDP 140W\r\n(version boîte sans ventilateur - garantie Intel 3 ans)\r\nBX80673I77800X', 0, 'intel_i7_7800x.jpg', '2018-12-02 12:44:09', 2, 3, 'https://ark.intel.com/fr/products/123589/Intel-Core-i7-7800X-X-series-Processor-8-25M-Cache-up-to-4-00-GHz-'),
(5, 'Kingston HyperX Predator D.D.R.4 3200MHz (XMP2) 32GO ', 320.64, '32 Go (4x 8 Go) DDR4 PC4-25600\r\nCompatible XMP 2.0\r\n3200 MHz\r\nCL16\r\n1.35V\r\nHautes performances, haute compatibilité', 0, 'kingston_hyperx_predator_32Go_DDR4_XMP2.jpg', '2018-12-02 13:07:47', 3, 3, 'https://www.hyperxgaming.com/us/memory/predator-ddr4'),
(6, 'Noctua NH-D15', 98.95, 'Compatibilité du socle - Intel LGA2011 (Square ILM), 2011-v3, LGA115x (LGA1156, LGA1155, LGA1150) & AMD (AM2, AM2+, AM3, AM3+, FM1, FM2, FM2+, backplate requis)\r\nDimensions - 165x150x135 mm\r\nDimensions avec NF-A15 PWM - 165x150x161 mm\r\nPoids / Poids avec NF-A15 PWM - 1000g / 1320g\r\nMatériaux - Cuivre (fond et caloducs), aluminium (plaques de refroidissement), soudé & nickelé', 0, 'noctua_nh-d15.jpg', '2018-12-02 13:45:06', 7, 3, 'https://noctua.at/fr/nh-d15?___from_store=fr'),
(7, 'Samsung M.2 MZ-V7E1T0BW 970 EVO 1 To ', 319.63, 'Interface avec l\'ordinateur	M.2 - PCI-E 3.0 4x\r\nFormat de Disque : M.2\r\nCapacité : 1 To\r\nTaille du cache : 1 Go', 0, 'samsung_970_evo_1To.jpg', '2018-10-04 13:47:51', 8, 3, 'https://www.samsung.com/fr/memory-storage/970-evo-nvme-m2-ssd/MZ-V7E1T0BW/'),
(8, 'Asus GTX970 DCMOC', 392.23, '1088 MHz\r\n4096 Mo (V.R.A.M.5)\r\nDual DVI/HDMI/DisplayPort\r\nPCI Express\r\n(NVIDIA GeForce avec CUDA GTX 970)\r\n\r\n', 0, 'asus_nvidia_gtx_970_dcmoc.jpg', '2015-03-23 13:27:10', 4, 3, 'https://www.asus.com/fr/Graphics-Cards/GTX970DCMOC4GD5/'),
(9, 'Microsoft Windows 10 Professionel 64 bits', 259, 'Microsoft Windows 10 Professionnel 64 bits\r\nVersion OEM\r\nNombre de licence : 1\r\nLa licence doit être utilisée par une personne à la fois.\r\nLe produit est fourni soit en 32 bits soit en 64 bits.\r\nVersion OEM : Ce logiciel doit être préinstallé sur le disque dur du système informatique entièrement assemblé, à l’aide d’outils de pré installation OEM. Chaque licence logicielle contenue dans ce coffret peut être distribuée UNIQUEMENT avec un système informatique assemblé complet. La licence OEM doit être installée par un fabricant de systèmes dans les 90 jours suivant l\'achat du système client. Vous devrez assurer le support de ce produit.\r\nEn aucun cas ce produit ne doit être utilisé comme licence de mise à jour vers un système d’exploitation Windows sous-jacent existant ni pour légaliser un système d’exploitation Windows non authentique.', 90, 'microsoft_windows_10_pro_64.jpg', '2018-12-02 13:58:11', 9, 3, 'https://www.microsoft.com/fr-be/p/windows-10-pro/df77x4d43rkt/48DN'),
(10, 'Seagate Barracuda 3.5 4To', 100.73, 'ST4000DM004\r\nDisque dur interne 4 To\r\nCache : 256 Mo\r\nTechnologie AcuTrac\r\nDébit de transfert interne : 180 Mo/s\r\nConsommation : 5.0 W\r\nDimensions : 146.99 x 101.6 x 20.17 mm\r\nPoids : 490g', 0, 'seagate_barracuda_3.5_4To.jpg', '2018-11-02 14:01:53', 8, 3, 'https://www.seagate.com/fr/fr/internal-hard-drives/hdd/barracuda/'),
(11, 'Creative Labs ZxR', 249.95, 'Chip / DSP Creative Sound Core3D\r\nBus	PCI Express 1x\r\nCompatibilité Slots	PCI Express 1x\r\nPCI Express 2.0 1x\r\nPCI Express 3.0 1x\r\nLow profile	Non\r\nNombre de canaux audio	5.1\r\nEntrées externes	Micro (Jack 6.35mm)\r\nLine OUT (2x RCA Femelle)\r\nToslink Femelle\r\nSorties externes	Stéréo arrière (Jack 3.5mm)\r\nSubwoofer (Jack 3.5mm)\r\nCasque (Jack 6.35mm)\r\nLine OUT (2x RCA Femelle)\r\nToslink Femelle', 12, 'creative_labs_zxr.jpg', '2018-12-02 14:04:04', 10, 3, 'https://fr.creative.com/p/sound-cards/sound-blaster-zxr'),
(14, 'Microsoft LifeChat LX-3000', 39.95, 'Microphone de qualité.', 10, 'microsoft_lifechat_lx-3000.jpg', '2018-12-11 12:05:00', 14, 2, 'https://www.microsoft.com/accessories/en-us/products/headsets/lifechat-lx-3000/jug-00013'),
(15, 'Microsoft LifeCam Studio', 99.99, 'Caméra HD pour ordinateur.', 0, 'microsoft_lifecam_studio.jpg', '2018-12-11 18:32:00', 11, 2, 'https://www.microsoft.com/accessories/fr-fr/products/webcams/lifecam-studio/q2f-00009'),
(16, 'Toshiba P300 2To', 69.95, 'Disque dur japonais pour stockage de donnée.\r\n<h6 class=\"h6\">Caractéristiques :</h6>Stockage puissant\r\nFiabilité et performances\r\nProtection et données\r\n\r\n<h6 class=\"h6\">Spécifications Techniques :</h6>Capacité : 2 To\r\nVitesse : 7200 Tr/min\r\nFormat : 3.5\"\r\nMémoire Cache : 64 Mo\r\nInterface : SATA', 20, 'toshiba_p300_2to.jpg', '2018-12-11 18:36:00', 8, 2, 'https://www.toshiba.eu/Contents/Toshiba_teg/EU/Others/HDD_datasheets/P300_High-Performance_Hard_Drive_Datasheet.pdf'),
(17, 'Nvidia RTX Titan', 800.1, 'La meilleur carte du monde.', 0, 'default.png', '2019-01-17 12:28:00', 4, 2, 'https://nvidia.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_day` datetime NOT NULL,
  `presentation` longtext COLLATE utf8mb4_unicode_ci,
  `inscription_date` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `birth_day`, `presentation`, `inscription_date`, `image`, `role`) VALUES
(1, 'Gazmen', 'gazmen@domain.ext', '$2y$10$DJ6mU0kHdHLO7h7cLEKI9eXWyL.jql0eFXN/XFPLg34trqIM8hXq6', 'Gazmen', 'Arifi', '1979-09-30 13:01:05', 'Etudiant motivé en web‑développement à l\'I.E.P.S.C.F.', '2018-12-02 09:25:03', '1999-Gazmen-Arifi-(I.A.T.A.).png', '[\"ROLE_SUPER_ADMIN\"]'),
(2, 'Patrick', 'patrick.marthus@iepscf-namur.be', '$2y$10$9ErHw9jjheeQbkmMlhE9T.yJNRxiNovg/PW.9DOkWlxhDX1iVuRpW', 'Patrick', 'Marthus', '1968-08-05 00:00:00', 'Enseignant à l\'I.E.P.S.C.F. de Namur.', '2018-12-03 00:00:00', 'patrick-marthus.png', '[\"ROLE_ADMIN\"]'),
(3, 'Contributor', 'contributor@domain.ext', '$2y$10$huvgjb7eWlVnSTEjLQNGxex9qmVnWVWaEJcUOVkHsTihm.h0EhAR6', 'Contributeur', 'Parfait', '2018-12-02 09:26:27', 'Contributeur et correcteur de la liste des articles et du contenues.', '2018-12-02 09:27:20', 'contributor.png', '[\"ROLE_CONTRIBUTOR\"]'),
(4, 'Moderator', 'moderator@domain.ext', '$2y$10$g5U2t4heM1dimU7rVLkq9.yI93jEysrzmm16ZpbnTGMe/w3ZDFKaW', 'Moderateur', 'Exigeant', '2018-12-02 09:27:47', 'Modérateur & vérificateur des commentaires en ligne.\r\n', '2018-12-02 09:28:06', 'moderator.png', '[\"ROLE_MODERATOR\"]'),
(5, 'User', 'user@domain.ext', '$2y$10$TFqshdsE27oIkZ5JEiZTLOUGQrsCKflJoMKez0YUd3zXvfIOACB..', 'Utilisateur', 'Patient', '2018-12-02 09:25:29', 'Utilisateur simple.', '2018-12-02 09:25:42', 'user.jpg', '[\"ROLE_USER\"]'),
(6, 'Shyperman', 'shyperman@domain.ext', '$2y$10$OA41.rgZ/x5ktVwm68CAW.4Jl2RYeZMB7vRrLc4BUzPnBwS5g090K', 'Shyperman', 'Crypton', '1985-03-16 00:00:00', 'Le super‑heros au super‑pouvoir…', '2018-12-03 00:00:00', 'Shyperman.jpg', '[\"ROLE_SUPER_ADMIN\"]'),
(7, 'Testons2', 'testons2@domain.ext2', '$2y$13$G2QNbnCWkZdu5IvC.H59ueNznJcGY6aGvFNt7lntboe6rQ7wAUqwy', 'Testons2', 'Testons2', '1968-03-16 00:00:00', 'Testons2', '2018-12-03 00:00:00', 'test.png', '[\"ROLE_MODERATOR\"]'),
(18, 'Shalavana', 'shalavana@domain.ext', '$2y$13$TJohZOMQSOmZfAMhCzx8K.XoUoH49ULenZ9hp0gAB/TWo2Tjw/Edm', 'Shalavana', 'Talamaga', '2009-01-01 00:00:00', 'Taprafasa !', '2018-12-12 00:00:00', '3e82ab34e43a8bd56ae6958421417031.jpeg', '[\"ROLE_USER\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `mail` varchar(120) NOT NULL,
  `login` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `mail`, `login`, `password`, `level`) VALUES
(1, 'Michael', 'Coll', 'michael@gmail.com', 'Michael', '$2y$10$UEVwexOHkn7EQ4WvG/xVmeV2oLnYleJDEQhEJu9.a6xCvdIiUfAYm', 'user'),
(2, 'Sophie', 'Gentle', 'sophie@gmail.com', 'Sophie', '$2y$10$4XuY/sZX9dLU342PFcZUFu9v5DxcA.yW55SU6Q.ig.LUNtA92oBdG', 'user'),
(3, 'Theresa', 'Happy', 'theresa@gmail.com', 'Theresa', '$2y$10$2JgtD1rhhlD2EIs28cEHCOD6VmTm590WWXGQdlgulSWeD3XxJJBIO', 'user'),
(4, 'David', 'Nice', 'david@gmail.com', 'David', '$2y$10$Y/5VOOARZKINoOoMVlw4w.863YVvR.F0zE4ZxOqve25c/4X0puoUq', 'user'),
(5, 'Patrick', 'Marthus', 'patrick@iepscf.be', 'Pat', '$2y$10$mMMcsIC9bdIOL7PvT8Gpm.9pRHBPh/AQR.2MCz5UhWDCM9DEEJL.2', 'administrator'),
(7, 'Utilisateur', 'Utilisateur', 'email@domain.org', 'Utilisateur', '$2y$10$KXw6z1JQccFPpIcri8yE4ejzilQwOWI2Ge/hSYA1v.HGcAxFmxJ1K', 'user'),
(34, 'Gazmen', 'Arifi', 'ngaz@tbse.org', 'gazmen', '$2y$10$TU6EEQcKou2y61b0ohVlW.sV1aBt7xwjuDQAE1wdSmXRr5Srox.f2', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment_constraint` (`user_id`,`product_id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`),
  ADD KEY `IDX_9474526C4584665A` (`product_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `notation`
--
ALTER TABLE `notation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notation_constraint` (`user_id`,`product_id`),
  ADD KEY `IDX_268BC95A76ED395` (`user_id`),
  ADD KEY `IDX_268BC954584665A` (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`),
  ADD KEY `IDX_D34A04ADA76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notation`
--
ALTER TABLE `notation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `notation`
--
ALTER TABLE `notation`
  ADD CONSTRAINT `FK_268BC954584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_268BC95A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_D34A04ADA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
