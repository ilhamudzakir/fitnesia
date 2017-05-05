-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 09:41 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitnesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `px_access_log`
--

CREATE TABLE `px_access_log` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `last_access` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `px_adm_config`
--

CREATE TABLE `px_adm_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `login_logo` varchar(255) NOT NULL,
  `mini_logo` varchar(255) NOT NULL,
  `single_logo` text NOT NULL,
  `favicon_logo` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `px_adm_config`
--

INSERT INTO `px_adm_config` (`id`, `login_logo`, `mini_logo`, `single_logo`, `favicon_logo`, `title`, `desc`) VALUES
(1, '589acfe7dac68-original.png', '589acfeaeed0c-original.png', '589acfde6f070-original.png', '589acfe2ca996-original.png', 'Fitnesia Indo Teknologi', 'Fitnesia Indo Teknologi Administrator Page');

-- --------------------------------------------------------

--
-- Table structure for table `px_album`
--

CREATE TABLE `px_album` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `px_album_files`
--

CREATE TABLE `px_album_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_album` int(11) NOT NULL,
  `file` text NOT NULL,
  `caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `px_banner`
--

CREATE TABLE `px_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner` text NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_modifier` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `px_master_data`
--

CREATE TABLE `px_master_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `px_master_data`
--

INSERT INTO `px_master_data` (`id`, `content`, `id_parent`) VALUES
(1, 'Icons', 0),
(2, 'fa-adjust', 1),
(3, 'fa-adn', 1),
(4, 'fa-align-center', 1),
(5, 'fa-align-justify', 1),
(6, 'fa-align-left', 1),
(7, 'fa-align-right', 1),
(8, 'fa-ambulance', 1),
(9, 'fa-anchor', 1),
(10, 'fa-android', 1),
(11, 'fa-angellist', 1),
(12, 'fa-angle-double-down', 1),
(13, 'fa-angle-double-left', 1),
(14, 'fa-angle-double-right', 1),
(15, 'fa-angle-double-up', 1),
(16, 'fa-angle-down', 1),
(17, 'fa-angle-left', 1),
(18, 'fa-angle-right', 1),
(19, 'fa-angle-up', 1),
(20, 'fa-apple', 1),
(21, 'fa-archive', 1),
(22, 'fa-area-chart', 1),
(23, 'fa-arrow-circle-down', 1),
(24, 'fa-arrow-circle-left', 1),
(25, 'fa-arrow-circle-o-down', 1),
(26, 'fa-arrow-circle-o-left', 1),
(27, 'fa-arrow-circle-o-right', 1),
(28, 'fa-arrow-circle-o-up', 1),
(29, 'fa-arrow-circle-right', 1),
(30, 'fa-arrow-circle-up', 1),
(31, 'fa-arrow-down', 1),
(32, 'fa-arrow-left', 1),
(33, 'fa-arrow-right', 1),
(34, 'fa-arrow-up', 1),
(35, 'fa-arrows', 1),
(36, 'fa-arrows-alt', 1),
(37, 'fa-arrows-h', 1),
(38, 'fa-arrows-v', 1),
(39, 'fa-asterisk', 1),
(40, 'fa-at', 1),
(41, 'fa-automobile', 1),
(42, 'fa-backward', 1),
(43, 'fa-ban', 1),
(44, 'fa-bank', 1),
(45, 'fa-bar-chart', 1),
(46, 'fa-bar-chart-o', 1),
(47, 'fa-barcode', 1),
(48, 'fa-bars', 1),
(49, 'fa-beer', 1),
(50, 'fa-behance', 1),
(51, 'fa-behance-square', 1),
(52, 'fa-bell', 1),
(53, 'fa-bell-o', 1),
(54, 'fa-bell-slash', 1),
(55, 'fa-bell-slash-o', 1),
(56, 'fa-bicycle', 1),
(57, 'fa-binoculars', 1),
(58, 'fa-birthday-cake', 1),
(59, 'fa-bitbucket', 1),
(60, 'fa-bitbucket-square', 1),
(61, 'fa-bitcoin', 1),
(62, 'fa-bold', 1),
(63, 'fa-bolt', 1),
(64, 'fa-bomb', 1),
(65, 'fa-book', 1),
(66, 'fa-bookmark', 1),
(67, 'fa-bookmark-o', 1),
(68, 'fa-briefcase', 1),
(69, 'fa-btc', 1),
(70, 'fa-bug', 1),
(71, 'fa-building', 1),
(72, 'fa-building-o', 1),
(73, 'fa-bullhorn', 1),
(74, 'fa-bullseye', 1),
(75, 'fa-bus', 1),
(76, 'fa-cab', 1),
(77, 'fa-calculator', 1),
(78, 'fa-calendar', 1),
(79, 'fa-calendar-o', 1),
(80, 'fa-camera', 1),
(81, 'fa-camera-retro', 1),
(82, 'fa-car', 1),
(83, 'fa-caret-down', 1),
(84, 'fa-caret-left', 1),
(85, 'fa-caret-right', 1),
(86, 'fa-caret-square-o-down', 1),
(87, 'fa-caret-square-o-left', 1),
(88, 'fa-caret-square-o-right', 1),
(89, 'fa-caret-square-o-up', 1),
(90, 'fa-caret-up', 1),
(91, 'fa-cc', 1),
(92, 'fa-cc-amex', 1),
(93, 'fa-cc-discover', 1),
(94, 'fa-cc-mastercard', 1),
(95, 'fa-cc-paypal', 1),
(96, 'fa-cc-stripe', 1),
(97, 'fa-cc-visa', 1),
(98, 'fa-certificate', 1),
(99, 'fa-chain', 1),
(100, 'fa-chain-broken', 1),
(101, 'fa-check', 1),
(102, 'fa-check-circle', 1),
(103, 'fa-check-circle-o', 1),
(104, 'fa-check-square', 1),
(105, 'fa-check-square-o', 1),
(106, 'fa-chevron-circle-down', 1),
(107, 'fa-chevron-circle-left', 1),
(108, 'fa-chevron-circle-right', 1),
(109, 'fa-chevron-circle-up', 1),
(110, 'fa-chevron-down', 1),
(111, 'fa-chevron-left', 1),
(112, 'fa-chevron-right', 1),
(113, 'fa-chevron-up', 1),
(114, 'fa-child', 1),
(115, 'fa-circle', 1),
(116, 'fa-circle-o', 1),
(117, 'fa-circle-o-notch', 1),
(118, 'fa-circle-thin', 1),
(119, 'fa-clipboard', 1),
(120, 'fa-clock-o', 1),
(121, 'fa-close', 1),
(122, 'fa-cloud', 1),
(123, 'fa-cloud-download', 1),
(124, 'fa-cloud-upload', 1),
(125, 'fa-cny', 1),
(126, 'fa-code', 1),
(127, 'fa-code-fork', 1),
(128, 'fa-codepen', 1),
(129, 'fa-coffee', 1),
(130, 'fa-cog', 1),
(131, 'fa-cogs', 1),
(132, 'fa-columns', 1),
(133, 'fa-comment', 1),
(134, 'fa-comment-o', 1),
(135, 'fa-comments', 1),
(136, 'fa-comments-o', 1),
(137, 'fa-compass', 1),
(138, 'fa-compress', 1),
(139, 'fa-copy', 1),
(140, 'fa-copyright', 1),
(141, 'fa-credit-card', 1),
(142, 'fa-crop', 1),
(143, 'fa-crosshairs', 1),
(144, 'fa-css3', 1),
(145, 'fa-cube', 1),
(146, 'fa-cubes', 1),
(147, 'fa-cut', 1),
(148, 'fa-cutlery', 1),
(149, 'fa-dashboard', 1),
(150, 'fa-database', 1),
(151, 'fa-dedent', 1),
(152, 'fa-delicious', 1),
(153, 'fa-desktop', 1),
(154, 'fa-deviantart', 1),
(155, 'fa-digg', 1),
(156, 'fa-dollar', 1),
(157, 'fa-dot-circle-o', 1),
(158, 'fa-download', 1),
(159, 'fa-dribbble', 1),
(160, 'fa-dropbox', 1),
(161, 'fa-drupal', 1),
(162, 'fa-edit', 1),
(163, 'fa-eject', 1),
(164, 'fa-ellipsis-h', 1),
(165, 'fa-ellipsis-v', 1),
(166, 'fa-empire', 1),
(167, 'fa-envelope', 1),
(168, 'fa-envelope-o', 1),
(169, 'fa-envelope-square', 1),
(170, 'fa-eraser', 1),
(171, 'fa-eur', 1),
(172, 'fa-euro', 1),
(173, 'fa-exchange', 1),
(174, 'fa-exclamation', 1),
(175, 'fa-exclamation-circle', 1),
(176, 'fa-exclamation-triangle', 1),
(177, 'fa-expand', 1),
(178, 'fa-external-link', 1),
(179, 'fa-external-link-square', 1),
(180, 'fa-eye', 1),
(181, 'fa-eye-slash', 1),
(182, 'fa-eyedropper', 1),
(183, 'fa-facebook', 1),
(184, 'fa-facebook-square', 1),
(185, 'fa-fast-backward', 1),
(186, 'fa-fast-forward', 1),
(187, 'fa-fax', 1),
(188, 'fa-female', 1),
(189, 'fa-fighter-jet', 1),
(190, 'fa-file', 1),
(191, 'fa-file-archive-o', 1),
(192, 'fa-file-audio-o', 1),
(193, 'fa-file-code-o', 1),
(194, 'fa-file-excel-o', 1),
(195, 'fa-file-image-o', 1),
(196, 'fa-file-movie-o', 1),
(197, 'fa-file-o', 1),
(198, 'fa-file-pdf-o', 1),
(199, 'fa-file-photo-o', 1),
(200, 'fa-file-picture-o', 1),
(201, 'fa-file-powerpoint-o', 1),
(202, 'fa-file-sound-o', 1),
(203, 'fa-file-text', 1),
(204, 'fa-file-text-o', 1),
(205, 'fa-file-video-o', 1),
(206, 'fa-file-word-o', 1),
(207, 'fa-file-zip-o', 1),
(208, 'fa-files-o', 1),
(209, 'fa-film', 1),
(210, 'fa-filter', 1),
(211, 'fa-fire', 1),
(212, 'fa-fire-extinguisher', 1),
(213, 'fa-flag', 1),
(214, 'fa-flag-checkered', 1),
(215, 'fa-flag-o', 1),
(216, 'fa-flash', 1),
(217, 'fa-flask', 1),
(218, 'fa-flickr', 1),
(219, 'fa-floppy-o', 1),
(220, 'fa-folder', 1),
(221, 'fa-folder-o', 1),
(222, 'fa-folder-open', 1),
(223, 'fa-folder-open-o', 1),
(224, 'fa-font', 1),
(225, 'fa-forward', 1),
(226, 'fa-foursquare', 1),
(227, 'fa-frown-o', 1),
(228, 'fa-futbol-o', 1),
(229, 'fa-gamepad', 1),
(230, 'fa-gavel', 1),
(231, 'fa-gbp', 1),
(232, 'fa-ge', 1),
(233, 'fa-gear', 1),
(234, 'fa-gears', 1),
(235, 'fa-gift', 1),
(236, 'fa-git', 1),
(237, 'fa-git-square', 1),
(238, 'fa-github', 1),
(239, 'fa-github-alt', 1),
(240, 'fa-github-square', 1),
(241, 'fa-gittip', 1),
(242, 'fa-glass', 1),
(243, 'fa-globe', 1),
(244, 'fa-google', 1),
(245, 'fa-google-plus', 1),
(246, 'fa-google-plus-square', 1),
(247, 'fa-google-wallet', 1),
(248, 'fa-graduation-cap', 1),
(249, 'fa-group', 1),
(250, 'fa-h-square', 1),
(251, 'fa-hacker-news', 1),
(252, 'fa-hand-o-down', 1),
(253, 'fa-hand-o-left', 1),
(254, 'fa-hand-o-right', 1),
(255, 'fa-hand-o-up', 1),
(256, 'fa-hdd-o', 1),
(257, 'fa-header', 1),
(258, 'fa-headphones', 1),
(259, 'fa-heart', 1),
(260, 'fa-heart-o', 1),
(261, 'fa-history', 1),
(262, 'fa-home', 1),
(263, 'fa-hospital-o', 1),
(264, 'fa-html5', 1),
(265, 'fa-ils', 1),
(266, 'fa-image', 1),
(267, 'fa-inbox', 1),
(268, 'fa-indent', 1),
(269, 'fa-info', 1),
(270, 'fa-info-circle', 1),
(271, 'fa-inr', 1),
(272, 'fa-instagram', 1),
(273, 'fa-institution', 1),
(274, 'fa-ioxhost', 1),
(275, 'fa-italic', 1),
(276, 'fa-joomla', 1),
(277, 'fa-jpy', 1),
(278, 'fa-jsfiddle', 1),
(279, 'fa-key', 1),
(280, 'fa-keyboard-o', 1),
(281, 'fa-krw', 1),
(282, 'fa-language', 1),
(283, 'fa-laptop', 1),
(284, 'fa-lastfm', 1),
(285, 'fa-lastfm-square', 1),
(286, 'fa-leaf', 1),
(287, 'fa-legal', 1),
(288, 'fa-lemon-o', 1),
(289, 'fa-level-down', 1),
(290, 'fa-level-up', 1),
(291, 'fa-life-bouy', 1),
(292, 'fa-life-buoy', 1),
(293, 'fa-life-ring', 1),
(294, 'fa-life-saver', 1),
(295, 'fa-lightbulb-o', 1),
(296, 'fa-line-chart', 1),
(297, 'fa-link', 1),
(298, 'fa-linkedin', 1),
(299, 'fa-linkedin-square', 1),
(300, 'fa-linux', 1),
(301, 'fa-list', 1),
(302, 'fa-list-alt', 1),
(303, 'fa-list-ol', 1),
(304, 'fa-list-ul', 1),
(305, 'fa-location-arrow', 1),
(306, 'fa-lock', 1),
(307, 'fa-long-arrow-down', 1),
(308, 'fa-long-arrow-left', 1),
(309, 'fa-long-arrow-right', 1),
(310, 'fa-long-arrow-up', 1),
(311, 'fa-magic', 1),
(312, 'fa-magnet', 1),
(313, 'fa-mail-forward', 1),
(314, 'fa-mail-reply', 1),
(315, 'fa-mail-reply-all', 1),
(316, 'fa-male', 1),
(317, 'fa-map-marker', 1),
(318, 'fa-maxcdn', 1),
(319, 'fa-meanpath', 1),
(320, 'fa-medkit', 1),
(321, 'fa-meh-o', 1),
(322, 'fa-microphone', 1),
(323, 'fa-microphone-slash', 1),
(324, 'fa-minus', 1),
(325, 'fa-minus-circle', 1),
(326, 'fa-minus-square', 1),
(327, 'fa-minus-square-o', 1),
(328, 'fa-mobile', 1),
(329, 'fa-mobile-phone', 1),
(330, 'fa-money', 1),
(331, 'fa-moon-o', 1),
(332, 'fa-mortar-board', 1),
(333, 'fa-music', 1),
(334, 'fa-navicon', 1),
(335, 'fa-newspaper-o', 1),
(336, 'fa-openid', 1),
(337, 'fa-outdent', 1),
(338, 'fa-pagelines', 1),
(339, 'fa-paint-brush', 1),
(340, 'fa-paper-plane', 1),
(341, 'fa-paper-plane-o', 1),
(342, 'fa-paperclip', 1),
(343, 'fa-paragraph', 1),
(344, 'fa-paste', 1),
(345, 'fa-pause', 1),
(346, 'fa-paw', 1),
(347, 'fa-paypal', 1),
(348, 'fa-pencil', 1),
(349, 'fa-pencil-square', 1),
(350, 'fa-pencil-square-o', 1),
(351, 'fa-phone', 1),
(352, 'fa-phone-square', 1),
(353, 'fa-photo', 1),
(354, 'fa-picture-o', 1),
(355, 'fa-pie-chart', 1),
(356, 'fa-pied-piper', 1),
(357, 'fa-pied-piper-alt', 1),
(358, 'fa-pinterest', 1),
(359, 'fa-pinterest-square', 1),
(360, 'fa-plane', 1),
(361, 'fa-play', 1),
(362, 'fa-play-circle', 1),
(363, 'fa-play-circle-o', 1),
(364, 'fa-plug', 1),
(365, 'fa-plus', 1),
(366, 'fa-plus-circle', 1),
(367, 'fa-plus-square', 1),
(368, 'fa-plus-square-o', 1),
(369, 'fa-power-off', 1),
(370, 'fa-print', 1),
(371, 'fa-puzzle-piece', 1),
(372, 'fa-qq', 1),
(373, 'fa-qrcode', 1),
(374, 'fa-question', 1),
(375, 'fa-question-circle', 1),
(376, 'fa-quote-left', 1),
(377, 'fa-quote-right', 1),
(378, 'fa-ra', 1),
(379, 'fa-random', 1),
(380, 'fa-rebel', 1),
(381, 'fa-recycle', 1),
(382, 'fa-reddit', 1),
(383, 'fa-reddit-square', 1),
(384, 'fa-refresh', 1),
(385, 'fa-remove', 1),
(386, 'fa-renren', 1),
(387, 'fa-reorder', 1),
(388, 'fa-repeat', 1),
(389, 'fa-reply', 1),
(390, 'fa-reply-all', 1),
(391, 'fa-retweet', 1),
(392, 'fa-rmb', 1),
(393, 'fa-road', 1),
(394, 'fa-rocket', 1),
(395, 'fa-rotate-left', 1),
(396, 'fa-rotate-right', 1),
(397, 'fa-rouble', 1),
(398, 'fa-rss', 1),
(399, 'fa-rss-square', 1),
(400, 'fa-rub', 1),
(401, 'fa-ruble', 1),
(402, 'fa-rupee', 1),
(403, 'fa-save', 1),
(404, 'fa-scissors', 1),
(405, 'fa-search', 1),
(406, 'fa-search-minus', 1),
(407, 'fa-search-plus', 1),
(408, 'fa-send', 1),
(409, 'fa-send-o', 1),
(410, 'fa-share', 1),
(411, 'fa-share-alt', 1),
(412, 'fa-share-alt-square', 1),
(413, 'fa-share-square', 1),
(414, 'fa-share-square-o', 1),
(415, 'fa-shekel', 1),
(416, 'fa-sheqel', 1),
(417, 'fa-shield', 1),
(418, 'fa-shopping-cart', 1),
(419, 'fa-sign-in', 1),
(420, 'fa-sign-out', 1),
(421, 'fa-signal', 1),
(422, 'fa-sitemap', 1),
(423, 'fa-skype', 1),
(424, 'fa-slack', 1),
(425, 'fa-sliders', 1),
(426, 'fa-slideshare', 1),
(427, 'fa-smile-o', 1),
(428, 'fa-soccer-ball-o', 1),
(429, 'fa-sort', 1),
(430, 'fa-sort-alpha-asc', 1),
(431, 'fa-sort-alpha-desc', 1),
(432, 'fa-sort-amount-asc', 1),
(433, 'fa-sort-amount-desc', 1),
(434, 'fa-sort-asc', 1),
(435, 'fa-sort-desc', 1),
(436, 'fa-sort-down', 1),
(437, 'fa-sort-numeric-asc', 1),
(438, 'fa-sort-numeric-desc', 1),
(439, 'fa-sort-up', 1),
(440, 'fa-soundcloud', 1),
(441, 'fa-space-shuttle', 1),
(442, 'fa-spinner', 1),
(443, 'fa-spoon', 1),
(444, 'fa-spotify', 1),
(445, 'fa-square', 1),
(446, 'fa-square-o', 1),
(447, 'fa-stack-exchange', 1),
(448, 'fa-stack-overflow', 1),
(449, 'fa-star', 1),
(450, 'fa-star-half', 1),
(451, 'fa-star-half-empty', 1),
(452, 'fa-star-half-full', 1),
(453, 'fa-star-half-o', 1),
(454, 'fa-star-o', 1),
(455, 'fa-steam', 1),
(456, 'fa-steam-square', 1),
(457, 'fa-step-backward', 1),
(458, 'fa-step-forward', 1),
(459, 'fa-stethoscope', 1),
(460, 'fa-stop', 1),
(461, 'fa-strikethrough', 1),
(462, 'fa-stumbleupon', 1),
(463, 'fa-stumbleupon-circle', 1),
(464, 'fa-subscript', 1),
(465, 'fa-suitcase', 1),
(466, 'fa-sun-o', 1),
(467, 'fa-superscript', 1),
(468, 'fa-support', 1),
(469, 'fa-table', 1),
(470, 'fa-tablet', 1),
(471, 'fa-tachometer', 1),
(472, 'fa-tag', 1),
(473, 'fa-tags', 1),
(474, 'fa-tasks', 1),
(475, 'fa-taxi', 1),
(476, 'fa-tencent-weibo', 1),
(477, 'fa-terminal', 1),
(478, 'fa-text-height', 1),
(479, 'fa-text-width', 1),
(480, 'fa-th', 1),
(481, 'fa-th-large', 1),
(482, 'fa-th-list', 1),
(483, 'fa-thumb-tack', 1),
(484, 'fa-thumbs-down', 1),
(485, 'fa-thumbs-o-down', 1),
(486, 'fa-thumbs-o-up', 1),
(487, 'fa-thumbs-up', 1),
(488, 'fa-ticket', 1),
(489, 'fa-times', 1),
(490, 'fa-times-circle', 1),
(491, 'fa-times-circle-o', 1),
(492, 'fa-tint', 1),
(493, 'fa-toggle-down', 1),
(494, 'fa-toggle-left', 1),
(495, 'fa-toggle-off', 1),
(496, 'fa-toggle-on', 1),
(497, 'fa-toggle-right', 1),
(498, 'fa-toggle-up', 1),
(499, 'fa-trash', 1),
(500, 'fa-trash-o', 1),
(501, 'fa-tree', 1),
(502, 'fa-trello', 1),
(503, 'fa-trophy', 1),
(504, 'fa-truck', 1),
(505, 'fa-try', 1),
(506, 'fa-tty', 1),
(507, 'fa-tumblr', 1),
(508, 'fa-tumblr-square', 1),
(509, 'fa-turkish-lira', 1),
(510, 'fa-twitch', 1),
(511, 'fa-twitter', 1),
(512, 'fa-twitter-square', 1),
(513, 'fa-umbrella', 1),
(514, 'fa-underline', 1),
(515, 'fa-undo', 1),
(516, 'fa-university', 1),
(517, 'fa-unlink', 1),
(518, 'fa-unlock', 1),
(519, 'fa-unlock-alt', 1),
(520, 'fa-unsorted', 1),
(521, 'fa-upload', 1),
(522, 'fa-usd', 1),
(523, 'fa-user', 1),
(524, 'fa-user-md', 1),
(525, 'fa-users', 1),
(526, 'fa-video-camera', 1),
(527, 'fa-vimeo-square', 1),
(528, 'fa-vine', 1),
(529, 'fa-vk', 1),
(530, 'fa-volume-down', 1),
(531, 'fa-volume-off', 1),
(532, 'fa-volume-up', 1),
(533, 'fa-warning', 1),
(534, 'fa-wechat', 1),
(535, 'fa-weibo', 1),
(536, 'fa-weixin', 1),
(537, 'fa-wheelchair', 1),
(538, 'fa-wifi', 1),
(539, 'fa-windows', 1),
(540, 'fa-won', 1),
(541, 'fa-wordpress', 1),
(542, 'fa-wrench', 1),
(543, 'fa-xing', 1),
(544, 'fa-xing-square', 1),
(545, 'fa-yahoo', 1),
(546, 'fa-yelp', 1),
(547, 'fa-yen', 1),
(548, 'fa-youtube', 1),
(549, 'fa-youtube-play', 1),
(584, 'Log Type', 0),
(585, 'Create', 584),
(586, 'Master', 0),
(587, 'Tags', 0),
(588, 'Social Media', 0),
(589, 'facebook', 588),
(590, 'twitter', 588),
(591, 'instagram', 588),
(592, 'pinterest', 588),
(593, 'tumblr', 588),
(594, 'youtube', 588),
(595, 'google-plus', 588),
(596, 'linkedin', 588),
(597, 'Contact Type', 0),
(598, 'Address', 597),
(599, 'Telp', 597),
(600, 'Fax', 597),
(601, 'Social Media', 597),
(602, 'Email', 597);

-- --------------------------------------------------------

--
-- Table structure for table `px_menu`
--

CREATE TABLE `px_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(225) NOT NULL,
  `target` varchar(225) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `px_menu`
--

INSERT INTO `px_menu` (`id`, `name`, `target`, `id_parent`, `icon`, `orders`) VALUES
(1, 'Dashboard', 'admin', 0, 'fa-dashboard', 1),
(2, 'System', 'admin_system', 0, 'fa-cog', 5),
(3, 'User', 'user', 2, 'fa-user', 3),
(4, 'User Group', 'usergroup', 2, 'fa-users', 5),
(5, 'Master Data', 'master_data', 2, 'fa-database', 8),
(6, 'Menu', 'menu', 2, 'fa-link', 6),
(7, 'Pengaturan', 'settings', 2, 'fa-cogs', 9),
(8, 'Urutan Menu', 'menu_orders', 2, 'fa-list', 7),
(9, 'User Akses', 'useraccess', 2, 'fa-check-circle', 4),
(11, 'Site Content', 'admin_site_content', 0, 'fa-globe', 2),
(12, 'Static Content', 'static_content', 11, 'fa-book', 13),
(13, 'Banner', 'banner', 11, 'fa-image', 1),
(17, 'News', 'news', 11, 'fa-globe', 11),
(21, 'My Profile', 'my_profile', 2, 'fa-user', 2),
(35, 'Albums', 'album', 11, 'fa-image', 3);

-- --------------------------------------------------------

--
-- Table structure for table `px_news`
--

CREATE TABLE `px_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `photo_landscape` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_modifier` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `px_static_content`
--

CREATE TABLE `px_static_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_modifier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `px_user`
--

CREATE TABLE `px_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `realname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `photo` text NOT NULL,
  `id_usergroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `px_user`
--

INSERT INTO `px_user` (`id`, `username`, `password`, `realname`, `email`, `photo`, `id_usergroup`) VALUES
(7, 'superadmin', 'jRjnSpl7ijshqE5nBTsF/x/TToYv4Wmk070XwZnd3CSEXfllG76OW9SeKtysiCMkpIiOCWFC3QPrUCUpJHTs9Q==', 'Super Admin', 'edoapriyadi@gmail.com', '56edc2c076ca0-original.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `px_useraccess`
--

CREATE TABLE `px_useraccess` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usergroup` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `act_create` int(11) NOT NULL,
  `act_read` int(11) NOT NULL,
  `act_update` int(11) NOT NULL,
  `act_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `px_useraccess`
--

INSERT INTO `px_useraccess` (`id`, `id_usergroup`, `id_menu`, `act_create`, `act_read`, `act_update`, `act_delete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(6, 1, 6, 1, 1, 1, 1),
(7, 1, 7, 1, 1, 1, 1),
(8, 1, 8, 1, 1, 1, 1),
(9, 1, 9, 1, 1, 1, 1),
(19, 1, 10, 1, 1, 1, 1),
(80, 1, 11, 1, 1, 1, 1),
(81, 1, 12, 1, 1, 1, 1),
(82, 1, 13, 1, 1, 1, 1),
(86, 1, 21, 1, 1, 1, 1),
(87, 1, 17, 1, 1, 1, 1),
(92, 1, 23, 1, 1, 1, 1),
(126, 1, 35, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `px_usergroup`
--

CREATE TABLE `px_usergroup` (
  `id` int(10) UNSIGNED NOT NULL,
  `usergroup_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `px_usergroup`
--

INSERT INTO `px_usergroup` (`id`, `usergroup_name`) VALUES
(1, 'Super Admin'),
(4, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `px_access_log`
--
ALTER TABLE `px_access_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_adm_config`
--
ALTER TABLE `px_adm_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_album`
--
ALTER TABLE `px_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_album_files`
--
ALTER TABLE `px_album_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_banner`
--
ALTER TABLE `px_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_master_data`
--
ALTER TABLE `px_master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_menu`
--
ALTER TABLE `px_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_news`
--
ALTER TABLE `px_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_static_content`
--
ALTER TABLE `px_static_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_user`
--
ALTER TABLE `px_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_useraccess`
--
ALTER TABLE `px_useraccess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `px_usergroup`
--
ALTER TABLE `px_usergroup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `px_access_log`
--
ALTER TABLE `px_access_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `px_adm_config`
--
ALTER TABLE `px_adm_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `px_album`
--
ALTER TABLE `px_album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `px_album_files`
--
ALTER TABLE `px_album_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `px_banner`
--
ALTER TABLE `px_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `px_master_data`
--
ALTER TABLE `px_master_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;
--
-- AUTO_INCREMENT for table `px_menu`
--
ALTER TABLE `px_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `px_news`
--
ALTER TABLE `px_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `px_static_content`
--
ALTER TABLE `px_static_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `px_user`
--
ALTER TABLE `px_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `px_useraccess`
--
ALTER TABLE `px_useraccess`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `px_usergroup`
--
ALTER TABLE `px_usergroup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
