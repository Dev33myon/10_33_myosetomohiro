-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 30 日 16:47
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d06_33`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `myon_table`
--

CREATE TABLE `myon_table` (
  `id` int(12) NOT NULL,
  `posttime` datetime NOT NULL,
  `lat` longtext NOT NULL,
  `lng` longtext NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `myon_table`
--

INSERT INTO `myon_table` (`id`, `posttime`, `lat`, `lng`, `image`, `created_at`, `updated_at`) VALUES
(17, '2020-07-02 22:45:48', '33.5866643', '130.394469', NULL, '2020-07-02 22:45:48', '2020-07-02 22:45:48'),
(20, '2020-07-02 22:50:13', '33.59294384628146', '130.38844210852443', NULL, '2020-07-02 22:50:13', '2020-07-02 22:50:13'),
(21, '2020-07-02 22:53:42', '33.5948437', '130.3227554', NULL, '2020-07-02 22:53:42', '2020-07-02 22:53:42'),
(23, '2020-07-04 13:21:11', '33.5866643', '130.394469', NULL, '2020-07-04 13:21:11', '2020-07-04 13:21:11'),
(24, '2020-07-04 13:21:51', '33.600880009902276', '130.38348459573413', NULL, '2020-07-04 13:21:51', '2020-07-04 13:21:51'),
(25, '2020-07-04 17:44:37', '33.524165751504775', '130.2889801295655', NULL, '2020-07-04 17:44:37', '2020-07-04 17:44:37'),
(26, '2020-07-30 23:38:19', '33.5866643', '130.394469', 'upload/202007301638196801a814c25b8ca67ac14ed30c0a2ac4.jpg', '2020-07-30 23:38:19', '2020-07-30 23:38:19'),
(27, '2020-07-30 23:38:33', '33.5866643', '130.394469', 'upload/202007301638330345b848fd3998a73936d4ef651a9978.jpg', '2020-07-30 23:38:33', '2020-07-30 23:38:33'),
(29, '2020-07-30 23:43:47', '33.5866643', '130.394469', 'upload/2020073016434788ef585259920103acb9bf90d399ecbf.jpg', '2020-07-30 23:43:47', '2020-07-30 23:43:47');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `myon_table`
--
ALTER TABLE `myon_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `myon_table`
--
ALTER TABLE `myon_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
