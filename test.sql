-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-12-05 19:45
-- 서버 버전: 10.4.24-MariaDB
-- PHP 버전: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `교통`
--

CREATE TABLE `교통` (
  `교통아이디` varchar(10) NOT NULL,
  `출발시간` time NOT NULL,
  `도착시간` time NOT NULL,
  `출발장소` varchar(10) NOT NULL,
  `도착장소` varchar(10) DEFAULT NULL,
  `교통수단` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

--
-- 테이블의 덤프 데이터 `교통`
--

INSERT INTO `교통` (`교통아이디`, `출발시간`, `도착시간`, `출발장소`, `도착장소`, `교통수단`) VALUES
('B-SEL001', '06:40:00', '08:10:00', '조치원', '서울', '버스'),
('B-SEL002', '07:35:00', '09:05:00', '조치원', '서울', '버스'),
('B-SEL003', '08:00:00', '09:30:00', '조치원', '서울', '버스'),
('B-SEL004', '09:10:00', '10:40:00', '조치원', '서울', '버스'),
('B-SEL005', '10:10:00', '11:40:00', '조치원', '서울', '버스'),
('B-SEL006', '12:10:00', '13:40:00', '조치원', '서울', '버스'),
('B-SEL007', '13:10:00', '14:40:00', '조치원', '서울', '버스'),
('B-SEL008', '15:10:00', '16:40:00', '조치원', '서울', '버스'),
('B-SEL009', '16:10:00', '17:40:00', '조치원', '서울', '버스'),
('B-SEL010', '18:20:00', '19:50:00', '조치원', '서울', '버스'),
('B-SEL011', '19:30:00', '21:00:00', '조치원', '서울', '버스'),
('T-SEL001', '06:39:00', '08:11:00', '조치원', '서울', '기차'),
('T-SEL002', '09:46:00', '11:05:00', '조치원', '서울', '기차'),
('T-SEL003', '11:02:00', '12:34:00', '조치원', '서울', '기차'),
('T-SEL004', '12:38:00', '14:00:00', '조치원', '서울', '기차'),
('T-SEL005', '13:07:00', '14:29:00', '조치원', '서울', '기차'),
('T-SEL006', '13:59:00', '15:30:00', '조치원', '서울', '기차'),
('T-SEL007', '14:31:00', '15:59:00', '조치원', '서울', '기차'),
('T-SEL008', '19:39:00', '20:58:00', '조치원', '서울', '기차');

-- --------------------------------------------------------

--
-- 테이블 구조 `리뷰`
--

CREATE TABLE `리뷰` (
  `리뷰번호` int(11) NOT NULL,
  `리뷰아이디` varchar(10) DEFAULT NULL,
  `리뷰여행지명` varchar(20) DEFAULT NULL,
  `평점` int(11) NOT NULL,
  `작성일자` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

--
-- 테이블의 덤프 데이터 `리뷰`
--

INSERT INTO `리뷰` (`리뷰번호`, `리뷰아이디`, `리뷰여행지명`, `평점`, `작성일자`) VALUES
(2, 'wwd0203', '경주월드', 5, '2022-12-06 03:15:54');

-- --------------------------------------------------------

--
-- 테이블 구조 `여행지`
--

CREATE TABLE `여행지` (
  `여행지명` varchar(20) NOT NULL,
  `도` varchar(20) NOT NULL,
  `시` varchar(20) DEFAULT NULL,
  `실내외` varchar(4) DEFAULT NULL,
  `계절` varchar(3) DEFAULT NULL,
  `이미지` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

--
-- 테이블의 덤프 데이터 `여행지`
--

INSERT INTO `여행지` (`여행지명`, `도`, `시`, `실내외`, `계절`, `이미지`) VALUES
('경주월드', '경상북도', '경주시 보문로 544', '실외', '봄', 'https://ldb-phinf.pstatic.net/20200626_265/15931351019270CAcs_JPEG/%BD%E6%B3%D7%C0%CF3.jpg'),
('광안대교', '부산', '수영구 민락동', '실외', '여름', 'https://ldb-phinf.pstatic.net/20150831_174/1441014269847w0LzK_PNG/116369544272348_0.png'),
('남이섬', '강원도', '춘천시 남산면 남이섬길 1', '실외', '가을', 'https://ldb-phinf.pstatic.net/20220827_254/1661566257224AXpIz_JPEG/2.jpg'),
('롯데월드', '서울', '송파구 올림픽로 240', '실내/외', 'ALL', 'https://ldb-phinf.pstatic.net/20210609_292/1623216519739APfji_JPEG/Magiccastle.jpg'),
('비발디파크', '강원도', '홍천군 서면 한치골길 262', '실외', '겨울', 'https://ldb-phinf.pstatic.net/20221110_59/1668036434001z936x_JPEG/%BA%F1%B9%DF%B5%F0%B5%BF%B0%E8%C0%FC%B0%E6.jpg'),
('우도', '제주', '제주시 우도면', '실외', 'ALL', 'https://ldb-phinf.pstatic.net/20150901_251/1441045702813UEBGn_JPEG/13491925_0.jpg'),
('한옥마을', '전라북도', '전주시 완산구 기린대로 99', '실외', '가을', 'https://ldb-phinf.pstatic.net/20200311_83/1583890204743KWn73_JPEG/TjSQ__2dxibJ9HfDdUbx-ash.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `회원`
--

CREATE TABLE `회원` (
  `아이디` varchar(11) NOT NULL,
  `비밀번호` varchar(20) NOT NULL,
  `나이` int(11) DEFAULT NULL,
  `mbti` varchar(4) DEFAULT NULL,
  `성별` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

--
-- 테이블의 덤프 데이터 `회원`
--

INSERT INTO `회원` (`아이디`, `비밀번호`, `나이`, `mbti`, `성별`) VALUES
('wwd0203', '0403', 23, 'Entp', 'F');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `교통`
--
ALTER TABLE `교통`
  ADD PRIMARY KEY (`교통아이디`);

--
-- 테이블의 인덱스 `리뷰`
--
ALTER TABLE `리뷰`
  ADD PRIMARY KEY (`리뷰번호`),
  ADD KEY `리뷰아이디` (`리뷰아이디`),
  ADD KEY `리뷰여행지명` (`리뷰여행지명`);

--
-- 테이블의 인덱스 `여행지`
--
ALTER TABLE `여행지`
  ADD PRIMARY KEY (`여행지명`);

--
-- 테이블의 인덱스 `회원`
--
ALTER TABLE `회원`
  ADD PRIMARY KEY (`아이디`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `리뷰`
--
ALTER TABLE `리뷰`
  MODIFY `리뷰번호` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `리뷰`
--
ALTER TABLE `리뷰`
  ADD CONSTRAINT `리뷰_ibfk_1` FOREIGN KEY (`리뷰아이디`) REFERENCES `회원` (`아이디`),
  ADD CONSTRAINT `리뷰_ibfk_2` FOREIGN KEY (`리뷰여행지명`) REFERENCES `여행지` (`여행지명`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
