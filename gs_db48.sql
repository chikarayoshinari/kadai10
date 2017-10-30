-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 10 朁E30 日 15:41
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db48`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `image`, `indate`) VALUES
(3, 'yamada', '1974', '希少なジーンズビートルです。', NULL, '2017-09-28 21:49:39'),
(5, 'KARMANN GHIA', '1955', '角テール最高！', NULL, '2017-09-28 21:53:11'),
(7, 'TYPE-1', '1978', 'ドイツ最終年式です。', NULL, '2017-09-28 22:24:07'),
(12, 'afeg', 'zegzeg', 'zgzsge', NULL, '2017-09-30 16:53:09'),
(13, '田中', 'tanaka@', 'test', NULL, '2017-10-14 15:55:19'),
(14, 'a', 'a', 'a', '20171014085712d41d8cd98f00b204e9800998ecf8427e.jpg', '2017-10-14 15:57:12'),
(15, 'c', 'c', 'd', '20171014090100d41d8cd98f00b204e9800998ecf8427e.jpg', '2017-10-14 16:01:00'),
(16, 'w', 'w', 'w', '20171014090308d41d8cd98f00b204e9800998ecf8427e.jpg', '2017-10-14 16:03:08'),
(17, 'c', 'c', 'c', '20171014090453d41d8cd98f00b204e9800998ecf8427e.jpg', '2017-10-14 16:04:53'),
(18, 'da', 'da', 'da', '20171014090604d41d8cd98f00b204e9800998ecf8427e.jpg', '2017-10-14 16:06:04'),
(19, 'e', 'e', 'e', '20171014091013d41d8cd98f00b204e9800998ecf8427e.jpg', '2017-10-14 16:10:13'),
(20, 'a', 'a', 'a', '20171020063118d41d8cd98f00b204e9800998ecf8427e.jpg', '2017-10-20 13:31:18'),
(21, 'd', 'd', 'd', NULL, '2017-10-26 10:33:06'),
(22, 'sa', 'sa', 'sa', '20171026042824d41d8cd98f00b204e9800998ecf8427e.png', '2017-10-26 11:28:24'),
(23, 'e', 'e', 'e', '20171027034355d41d8cd98f00b204e9800998ecf8427e.png', '2017-10-27 10:43:55'),
(24, 'd', 'd', 'd', NULL, '2017-10-27 11:05:27'),
(25, '5', '5', '5', NULL, '2017-10-27 11:06:25');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `price` int(20) DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kanri_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `user_id`, `price`, `name`, `url`, `naiyou`, `image`, `kanri_flg`, `indate`) VALUES
(3, 5, 10000000, 'モバイルハウス', 'Alberto Rosselli', '9平米のトレイラーが展開時には54平米と広々とした家になります。', '20171030153147328230662b9efadfc4da48dac8194ed3.jpg', 1, '2017-09-30 20:25:46'),
(4, 0, 0, 'ふしぎの図鑑', 'http://www.ei', '次だよ。どーだね。', NULL, 0, '2017-10-01 00:31:13'),
(5, 5, 2000000, 'エコカプセル', 'nice architects', '太陽光と風力を利用した発電や雨水も貯めることも可能でインフラが整っていない場所でもしばらく生活ができそうだ！！', '201710301245000744ec05502e464a52d2ac57c29ef0c7.jpg', 1, '2017-10-05 19:24:42'),
(6, 0, 0, '梅ロック', 'https://ume.jp', '梅酒もいいのあるよ', NULL, 0, '2017-10-05 19:25:52'),
(7, 0, 0, '隠居宗五郎', 'http://ddd.co.jp', '佐伯さん最高ですね。どうかな？\r\n', NULL, 0, '2017-10-05 19:26:40'),
(13, 0, 0, 'グレープフルーツ', 'https://www', '黄色', NULL, 0, '2017-10-13 00:24:29'),
(14, 0, 0, 'クルーズ', 'https://www.co.jp', 'クルーズ最高です。', NULL, 0, '2017-10-13 00:33:57'),
(15, 0, 0, '都市の輪廻', 'httl...', 'いいよ', NULL, 0, '2017-10-20 13:29:08'),
(16, 0, 0, 'セビリア', 'hht', 'ddde', NULL, 0, '2017-10-27 10:08:23'),
(18, 0, 0, '23', '23', '23', NULL, 0, '2017-10-27 10:24:13'),
(20, 0, 0, '55', '55', '55', NULL, 0, '2017-10-27 10:38:11'),
(21, 0, 0, '22', '22', '22', NULL, 0, '2017-10-27 10:46:06'),
(22, 0, 0, 'oo', 'oo', 'oo', '20171027035601d41d8cd98f00b204e9800998ecf8427e.png', 0, '2017-10-27 10:56:01'),
(23, 0, 0, '88', '88', '88', NULL, 0, '2017-10-27 10:57:07'),
(24, 0, 0, '44', '44', '44', '20171027035821d41d8cd98f00b204e9800998ecf8427e.png', 0, '2017-10-27 10:58:21'),
(25, 0, 0, '66', '66', '66', NULL, 0, '2017-10-27 10:59:01'),
(26, 0, 0, '33', '33', '33', NULL, 0, '2017-10-27 10:59:55'),
(27, 0, 0, '77', '77', '77', '20171027040034d41d8cd98f00b204e9800998ecf8427e.png', 0, '2017-10-27 11:00:34'),
(28, 0, 0, '111', '111', '111', NULL, 0, '2017-10-27 11:25:29'),
(29, 0, 0, 'レストラン', 'http', 'ddd', '20171027044317d41d8cd98f00b204e9800998ecf8427e.png', 0, '2017-10-27 11:43:17'),
(30, 0, NULL, 'dou', 'dou', 'dou', '20171027232117d41d8cd98f00b204e9800998ecf8427e.jpg', 0, '2017-10-28 06:21:17'),
(36, 5, 200000, 'マイクロトレーラー', '不明', '電動カート用トレーラー、おじいちゃんおぱあちゃんの買い物に便利', '201710301130031babd3896d46990025558256f0df6d4d.jpg', 1, '2017-10-30 18:53:46'),
(47, 20, 300000000, 'モナリザ', 'レオナルドダヴィンチ', '最高傑作', '201710301212401c0a1e95cd2c792ba8c05b0f9cb7fb88.jpg', 1, '2017-10-30 19:58:08'),
(48, 21, 247288800, '曜変天目茶碗', '伝来：水戸徳川家−藤田家-藤田美術館', '稲葉天目よりも少し抑えめで落ち着いた印象。\r\n全体のバランスとしてはこちらのほうが整っているかもしれない。\r\nとても美しいです。\r\n\r\n口縁には金覆輪をほどこしてあります。\r\n上記写真ではわかりませんが、外側にも曜変があります。\r\n外側に曜変がある曜変天目はこの茶碗だけ。', '2017103012221402607cbc78b8d4d234ff3ae057bdb4fa.jpg', 1, '2017-10-30 20:22:14'),
(49, 21, 200000000, '油滴天目茶碗', '伝来：豊臣秀次−西本願寺−三井家（京都六角）−酒井家（若狭）−大阪市', 'これまた美しい天目。\r\n曜変天目よりも好きかもしれない。\r\n金覆輪がこれほど似合う茶碗はほかにない。', '2017103012232610f89a930ebfd7e36fcbee22f7dbe951.jpg', 1, '2017-10-30 20:23:26'),
(50, 21, 2147483647, '玳玻天目茶碗', '伝来：上田三郎右衛門（大阪）-松平不昧-雲州松平家', 'べっこうのような模様の天目茶碗。\r\n小さくて美しい。\r\n曜変天目と数ミリしか変わらないのですが、実際にみるとかなり小ぶりに見えます。\r\n曜変天目とは違って、作為的に模様をつけた茶碗ですが、見事に仕上がっています。', '20171030122421b358b9a66b3a391759ff1f9bf93f0eda.jpg', 1, '2017-10-30 20:24:21'),
(51, 20, 128000000, '泣く女', 'パブロ・ピカソ', '抽象の超越', '201710301231038e355ec559d1b02a9981aea5a880bd5b.jpg', 1, '2017-10-30 20:31:03'),
(52, 5, 930000, 'トレーラー', '不明', 'いつでもどこでも仕事できます', '20171030153134de50f74e2bb7f292feed2653e2bf9adc.jpg', 1, '2017-10-30 23:31:34'),
(53, 24, 1000000, 'gs', 'gs', 'gs', '201710301536073b3e8dffc26323f93433b13f5ebe21f5.jpg', 1, '2017-10-30 23:36:07'),
(54, 24, 20000, 'se', 'se', 'se', '2017103015365092d6f11762370aaa53596abd01ea46e6.png', 1, '2017-10-30 23:36:50'),
(55, 24, 200000, 'b', 'b', 'b', '20171030153909fdd16bee22e4117c744dee555a75bfaa.png', 1, '2017-10-30 23:39:09');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_like_table`
--

CREATE TABLE IF NOT EXISTS `gs_like_table` (
`id` int(12) NOT NULL,
  `indate` datetime NOT NULL,
  `bm_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(12) NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `year`, `naiyou`, `lid`, `lpw`, `kanri_flg`) VALUES
(5, '吉成', 39, 'モービル好きです', 'yoshinari', '$2y$10$wO45sZJ6q8OruWaDPuffTOiAS9R2AsZBDqtBiWHgpOwYZaX7sA5xK', 0),
(19, 'admin', 0, '', 'admin', '$2y$10$bU6lopx7ecaDWe/scTezs.mDjzeGkWT1Sfg3WtlBOQ9CK35A8rlzK', 1),
(20, '村井', 72, 'コンクール主催しています', 'murai', '$2y$10$RIZvTBsptTa3xz0uez0KCOFdMotsDmWzeMDAI6er9xyh6gkeN2ObC', 0),
(21, '大橋', 30, '茶器大好き', 'oohashi', '$2y$10$OxuGYdefCiSTUyPhLNACDO.dS7RA0WX4xWO4w3R25SKymbfhK3a4.', 0),
(22, '矢作', 42, '焼肉好きです', 'yahagi', '$2y$10$Bf71v5ZUHJhgfmd4W8RDP.jiMrwwk.eV9jjlVys.TTUnvieAERXC6', 0),
(23, '矢野', 33, '大阪好きです', 'yano', '$2y$10$a1BwcmMH/VfgxQrjFgIhbePdFqAJyuTq68Lt16aOfqrRgSsgn0P0u', 0),
(24, 'gs', 10, 'test用です', 'gs', '$2y$10$yueyv1YECPcxFpW.sXf7zu0qVLONBToqRl7K/BUsNTHppKUUvxqPC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_like_table`
--
ALTER TABLE `gs_like_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `gs_like_table`
--
ALTER TABLE `gs_like_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
