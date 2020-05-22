-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 04:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artsband`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `student_id` char(10) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `year` char(1) DEFAULT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `tel_no` char(12) DEFAULT NULL,
  `line_id` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`student_id`, `first_name`, `surname`, `nickname`, `year`, `faculty`, `tel_no`, `line_id`, `email`) VALUES
('6435089123', 'pasakorn', 'silprasert', 'abel', '4', 'science', '069-518-6544', 'abelsungod', 'pasabel@gmail.com'),
('6436549821', 'yossawin', 'pakdeetaweesup', 'chon', '4', 'engineering', '096-934-9875', 'chonnnyp', 'chonnnyp@gmail.com'),
('6440254622', 'arinrada', 'wiriyakriangkrai', 'noo', '4', 'arts', '088-645-5153', 'nooarin', 'nooarin@gmail.com'),
('6441254735', 'bodin', 'chakraneth', 'king', '4', 'fine and applied arts', '093-787-6682', 'kingbodin', 'kingbodin@gmail.com'),
('6442126822', 'keerati', 'bunyachart', 'bear', '4', 'arts', '092-264-5532', 'bearkeer13', 'bearkeer@gmail.com'),
('6448654422', 'dithapong', 'prapuntakaneth', 'art', '4', 'arts', '084-132-6548', 'artdith', 'artdith@outlook.com'),
('6448978522', 'warakorn', 'pimbunpai', 'veron', '4', 'arts', '093-984-4651', 'vwvwww99', 'warakornve@gmail.com'),
('6540678922', 'narnfah', 'taweerak', 'fah', '3', 'arts', '086-661-5651', 'narn_fahh', 'narn_fahh@outlook.com'),
('6540987535', 'nontakorn', 'worawiseth', 'mai', '3', 'fine and applied arts', '091-913-5489', 'nonmai_mainon', 'nonmai_mn@outlook.com'),
('6542348922', 'pitsanu', 'jarernwatana', 'win', '3', 'arts', '097-645-9789', 'winwinwinwin4', 'winjarernwat@gmail.com'),
('6640687622', 'kritsana', 'amornratanarut', 'nuclear', '2', 'arts', '099-987-8866', 'nukrit12', 'kritsananu@gmail.com'),
('6640783422', 'chatrapon', 'kuruwanich', 'chart', '2', 'arts', '086-996-4512', 'charrtttie', 'charrtttie@hotmail.com'),
('6643351522', 'tinnakorn', 'prasertlerdlar', 'korn', '2', 'arts', '096-445-2315', 'kornnatin', 'kornnatin@outlook.com'),
('6740098722', 'zenitsu', 'agatsuma', 'zen', '1', 'arts', '098-888-6512', 'kowaizenkun', 'zenaga@gmail.com'),
('6741102622', 'inosuke', 'hashibira', 'bestboi', '1', 'arts', '099-876-5432', 'inosukedazo66', 'oreinosuke@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` char(10) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `color1` varchar(255) DEFAULT NULL,
  `color2` varchar(255) DEFAULT NULL,
  `size_indicator` varchar(255) DEFAULT NULL,
  `conditions` varchar(255) DEFAULT NULL,
  `borrow_status` varchar(255) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `owner_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `type`, `brand`, `model`, `color1`, `color2`, `size_indicator`, `conditions`, `borrow_status`, `remarks`, `owner_id`) VALUES
('0010011258', 'snare drum', 'ludwig', 'lb416bt', 'white', 'gray', '14 in', '', 'IN STOCK', '', '0000000011'),
('0010011259', 'snare drum', 'pearl', 'oh1350', 'white', 'maple', '13 in', '', 'BORROWED', '', '0000000011'),
('0010023214', 'rack tom', 'gretsch', 'black hawk', 'clear', 'black', '8 in', '', 'IN STOCK', '', '6440188422'),
('0010023215', 'rack tom', 'gretsch', 'black hawk', 'clear', 'black', '10 in', '', 'BORROWED', '', '6440188422'),
('0010023216', 'rack tom', 'gretsch', 'black hawk', 'clear', 'black', '12 in', '', 'BORROWED', '', '0000000011'),
('0010031298', 'floor tom', 'dw', 'pdp cm', 'clear', 'crimson', '16 in', '', 'BORROWED', '', '0000000011'),
('0010042347', 'hi-hat', 'meinl', 'hcs', '', '', '13 in', '', 'BORROWED', '', '6440188422'),
('0010051238', 'crash', 'zildjian', 'zxt', '', '', '14 in', '', 'BORROWED', '', '0000000011'),
('0010061287', 'crash', 'cmc', 'ad780', '', '', '16 in', '', 'IN STOCK', '', '6440188422'),
('0010074569', 'ride', 'zildjian', 'zxt', '', '', '20 in', '', 'BORROWED', '', '0000000011'),
('0010081253', 'splash', 'zildjian', 'zxt', '', '', '18 in', '', 'IN STOCK', '', '0000000011'),
('0010095698', 'china', 'whd', 'oriental china', '', '', '18 in', '', 'IN STOCK', '', '6440188422'),
('0010108436', 'bass drum', 'gretsch', 'black hawk', 'clear', 'black', '22 in', '', 'BORROWED', '', '6440188422'),
('0010112644', 'cajon', 'sawtooth', 'st-cj120b', 'birch', '', '', '', 'BORROWED', '', '0000000011'),
('0010123453', 'cowbell', 'stagg', 'cb305bk', 'black', '', '5.5 in', '', 'IN STOCK', '', '0000000011'),
('0010134785', 'egg shaker', '', '', 'blue', '', '', '', 'IN STOCK', '', '6440188422'),
('0010140568', 'maraca', '', '', 'red', 'black', '', '', 'IN STOCK', '', '6440188422'),
('0010153422', 'tambourine', 'rhythmtech', 'rt1010', 'black', 'nickel', '8 in', '', 'IN STOCK', '', '0000000011'),
('0020013450', 'electric bass', 'squier', 'jazz bass', 'black', 'oak', '4 str', '', 'IN STOCK', '', '6740010322'),
('0020013498', 'electric bass', 'g&l', 'l-2500', 'dark blue', 'cream', '5 str', 'scratch marks near both pickups', 'BORROWED', '', '0000000011'),
('0020013499', 'electric bass', 'squier', 'vintage modified', 'white', 'cream', '5 str', '', 'IN STOCK', 'pickup changed to p/j', '6740010322'),
('0020023587', 'electric double bass', 'cecilio', 'cedb-750', 'mahogany', 'black', '3/4', '', 'IN STOCK', '', '6646321522'),
('0020033587', 'electric guitar', 'g&l', 'ar-124', 'black', 'cream', '6 str', '', 'IN STOCK', '', '6740010322'),
('0020033588', 'electric guitar', 'schecter', 'c-7 deluxe', 'white', 'walnut', '6 str', 'volume knob missing', 'IN STOCK', '', '0000000011'),
('0020033589', 'electric guitar', 'peavey', 'raptor plus exp', 'ash', 'laurel', '6 str', '', 'IN STOCK', '', '0000000011'),
('0020042325', 'acoustic guitar', 'fender', 'fa-115', 'mahogany', 'dark brown', '6 str', '', 'BORROWED', '', '6740010322'),
('0020042326', 'acoustic guitar', 'martin smith', 'pt579', 'black', 'ebony', '6 str', '', 'IN STOCK', '', '0000000011'),
('0020054586', 'ukelele', 'hola!', 'hm-121mg+', 'mahogany', 'walnut', '4 str', '', 'IN STOCK', '', '6740235822'),
('0020062304', 'violin', 'mendini', 'mv500', 'flamed solidwood', 'black', '4/4', '', 'IN STOCK', '', '6740235822'),
('0020062305', 'violin', 'cecilio', 'cvn-300', 'solidwood', 'ebony', '4/4', '', 'IN STOCK', '', '0000000011'),
('0020062306', 'violin', 'cecilio', 'cvn-300', 'solidwood', 'ebony', '4/4', '', 'IN STOCK', '', '0000000011'),
('0020073411', 'cello', 'd\'luca', 'mc100', 'mahogany', 'black', '4/4', '', 'IN STOCK', '', '6646321522'),
('0020081652', 'shamisen', '', '', 'ivory', 'rosewood', '', '', 'IN STOCK', '', '6646321522'),
('0030013484', 'keyboard', 'roland', 'fa-06', 'black', '', '61 keys', '', 'IN STOCK', 'plastic seal intact', '0000000011'),
('0030013485', 'keyboard', 'roland', 'fc5', 'black', '', '61 keys', '', 'IN STOCK', '', '0000000011'),
('0030013486', 'keyboard', 'roland', 'xps-10', 'black', '', '61 keys', 'sensitive volume knobs', 'IN STOCK', 'careful with the knobs', '6648365422'),
('0030013487', 'keyboard', 'nord', 'lead 2x', 'dark red', '', '76 keys', '', 'IN STOCK', '', '6648365422'),
('0030013488', 'keyboard', 'korg', 'triton extreme', 'black', '', '76 keys', '', 'IN STOCK', '', '6648365422'),
('0040023242', 'alto saxophone', 'ammoon', 'as-400', 'gold', '', '', '', 'IN STOCK', '', '0000000011'),
('0040041985', 'baritone saxophone', 'ammoon', 'bs-530', 'black', 'gold', '', '', 'IN STOCK', '', '0000000011'),
('0040051853', 'trumpet', 'ammoon', 't-192', 'gold', '', '', '', 'IN STOCK', '', '0000000011'),
('0040072948', 'tenor trombone', 'p-bone', 'ax15', 'red', 'black', '', '', 'IN STOCK', '', '0000000011'),
('0050013911', 'microphone', 'nts', 'd-380', 'black', '', '', '', 'BORROWED', '', '0000000022'),
('0050013912', 'microphone', 'nts', 'd-380', 'black', '', '', '', 'IN STOCK', '', '0000000022'),
('0050013913', 'microphone', 'behringer', 'xm8500', 'black', '', '', '', 'IN STOCK', '', '0000000022'),
('0050013914', 'microphone', 'shure', 'sm48-lc', 'gray', '', '', '', 'IN STOCK', '', '0000000022'),
('0050013915', 'microphone', 'shure', 'pga48-xlr', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0060012988', 'audio jack', 'fender', 'pro series', 'black', 'white tips', '2 m', '', 'BORROWED', '', '0000000011'),
('0060012989', 'audio jack', 'fender', '', 'black', '', '3 m', '', 'IN STOCK', '', '0000000011'),
('0060012990', 'audio jack', 'fender', '', 'black', '', '1.5 m', '', 'IN STOCK', '', '0000000011'),
('0060012991', 'audio jack', 'd\'addario', '10 ft', 'black', '', '3 m', '', 'IN STOCK', '', '0000000011'),
('0060012992', 'audio jack', 'squier', '', 'black', '', '3 m', '', 'IN STOCK', '', '0000000011'),
('0060012993', 'audio jack', 'fender', 'fg186t', 'yellow', 'hazel tips', '4.5 m', '', 'IN STOCK', '', '0000000011'),
('0060012994', 'audio jack', 'carlsbro', 'bc356', 'black', '', '6 m', '', 'IN STOCK', '', '0000000011'),
('0060012995', 'audio jack', 'fender', '', '', '', '1.5 m', '', 'IN STOCK', '', '0000000011'),
('0060012996', 'audio jack', 'fender', 'deluxe series', 'black', '', '5.5 m', '', 'IN STOCK', '', '0000000011'),
('0060012997', 'audio jack', 'fender', 'pro series', '', '', '4.5 m', '', 'IN STOCK', '', '0000000011'),
('0060021970', 'ac power cord', 'hartke', 'hd-500', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0060021971', 'ac power cord', 'fender', 'frontman 10g', 'dark gray', '', '', '', 'IN STOCK', '', '0000000011'),
('0060021972', 'ac power cord', 'line 6', 'spider v', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0060021973', 'ac power cord', 'fender', 'champion 100xl', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0060021974', 'ac power cord', 'boss', 'ktn-50-2', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0060021975', 'ac power cord', 'maggie', 'mix 12fx', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0060021976', 'ac power cord', 'maggie', 'mix 12fx', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0060031874', 'xlr', 'gls', 'xlr-5', 'black', '', '6 ft', '', 'BORROWED', '', '0000000011'),
('0060031875', 'xlr', 'gls', 'xlr-5', 'black', '', '6 ft', '', 'IN STOCK', '', '0000000011'),
('0060031876', 'xlr', 'gls', 'xlr-5', 'black', '', '6 ft', '', 'IN STOCK', '', '0000000011'),
('0060031877', 'xlr', 'lyxpro', 'pv-207', 'black', '', '5 m', '', 'IN STOCK', '', '0000000011'),
('0060031878', 'xlr', 'lyxpro', 'pv-207', 'black', '', '5 m', '', 'IN STOCK', '', '0000000011'),
('0060041752', 'speakon connector', 'gls', '12awg', 'black', 'blue tips', '4.5 ft', '', 'IN STOCK', '', '0000000011'),
('0070058756', 'bass amplifier', 'hartke', 'hd-500', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0070058757', ' bass amplifier', 'fender', 'frontman 10g', 'dark gray', '', '', '', 'IN STOCK', '', '0000000011'),
('0070068709', 'guitar amplifier', 'line 6', 'spider v', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0070068710', 'guitar amplifier', 'fender', 'champion 100xl', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0070068711', 'guitar amplifier', 'boss', 'ktn-50-2', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0070075683', 'monitor speaker', 'maggie', 'mix 12fx', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0070075684', 'monitor speaker', 'maggie', 'mix 12fx', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0080012483', 'drum tuner', 'donner', '', 'metallic', '', '', '', 'IN STOCK', '', '6440188422'),
('0080012484', 'drum tuner', 'donner', '', 'metallic', '', '', '', 'IN STOCK', '', '6440188422'),
('0080029186', 'drumstick', 'vic firth', 'american classic', 'hickory', '', '5a', '', 'IN STOCK', 'in pairs', '6440188422'),
('0080029187', 'drumstick', 'vater', 'vh5aw', 'hickory', '', '5a', 'heavily worn', 'BORROWED', 'in pairs', '6440188422'),
('0080029188', 'drumstick', 'vic firth', 'freestyle', 'maple', '', '7a', '', 'IN STOCK', 'in pairs', '6440188422'),
('0080029189', 'drumstick', 'vic firth', 'american classic', 'birch', '', '5a', '', 'IN STOCK', 'in pairs', '6440188422'),
('0080031284', 'brush', 'vic firth', 'steve gadd', 'black', 'metal wire', '', '', 'IN STOCK', 'in pairs', '6440188422'),
('0080031285', 'brush', 'vic firth', 'vintage', 'black', 'nylon wire', '', '', 'IN STOCK', 'in pairs', '6440188422'),
('0080046549', 'mallet', 'promark', 'mt3', 'alder', 'white tips', '', '', 'IN STOCK', 'in pairs', '6440188422'),
('0080053876', 'rod', 'vic firth', 'adr-10', 'black', 'cream', '', '', 'IN STOCK', 'in pairs', '6440188422'),
('0080064568', 'bass pedal', 'gibraltar', 'gb500ad4', 'black', 'dark red', '', '', 'BORROWED', '', '6440188422'),
('0080071235', 'double bass pedal', 'paramount', 'p6a', 'black', 'silver', '', '', 'IN STOCK', '', '6440188422'),
('0080071282', 'hi-hat pedal', 'meinl', 'qw-109', 'metallic', '', '', '', 'BORROWED', '', '6440188422'),
('0080082354', 'gel dampener', 'moongel', '', 'blue', '', '', '', 'IN STOCK', '', '6440188422'),
('0080082355', 'gel dampener', 'moongel', '', 'blue', '', '', '', 'IN STOCK', '', '6440188422'),
('0080082356', 'gel dampener', 'moongel', '', 'blue', '', '', '', 'IN STOCK', '', '6440188422'),
('0080082357', 'gel dampener', 'moongel', '', 'blue', '', '', '', 'IN STOCK', '', '6440188422'),
('0080082358', 'gel dampener', 'moongel', '', 'blue', '', '', '', 'IN STOCK', '', '6440188422'),
('0080091611', 'drumstick bag', 'vic firth', '', 'black', '', '', '', 'IN STOCK', '', '6440188422'),
('0080105687', 'drum stool', 'pdp', 'dw 700', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0080105688', 'drum stool', 'gibraltar', '9608mb', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0090014569', 'bass guitar tuner', 'fender', 'ft-2', 'black', '', '', '', 'BORROWED', '', '6440453222'),
('0090014570', 'bass guitar tuner', 'kliq ubertuner', '', 'black', '', '', '', 'IN STOCK', '', '6440453222'),
('0090024569', 'guitar tuner', 'korg', 'ga-2', 'black', '', '', '', 'IN STOCK', '', '6540652122'),
('0090033875', 'bass guitar effect', 'mxr', 'm82', 'black', '', '', '', 'IN STOCK', 'bass envelope filter', '0000000011'),
('0090033876', 'bass guitar effect', 'aguilar', 'chorusaurus', 'white', 'black', '', '', 'IN STOCK', 'analog chorus', '6440453222'),
('0090033877', 'bass guitar effect', 'electro-harmonix', 'bass micro synth', 'black', 'white', '', '', 'IN STOCK', 'square-wave monosynths and sub-octave harmonics', '6440453222'),
('0090048732', 'guitar effect', 'xotic', 'ep booster', 'black', 'white', '', '', 'IN STOCK', 'clean boost', '6540652122'),
('0090048733', 'guitar effect', 'ibanez', 'tube screamer', 'green', 'cream', '', '', 'IN STOCK', 'overdrive', '0000000011'),
('0090048734', 'guitar effect', 'fulltone', 'ocd', 'off-white', 'black', '', '', 'IN STOCK', 'distortion', '0000000011'),
('0090048735', 'guitar effect', 'fulltone', 'octavia', 'aqua', 'black', '', '', 'IN STOCK', 'fuzz', '6540652122'),
('0090048736', 'guitar effect', 'tc electronic', 'hall of fame', 'red', 'black', '', '', 'IN STOCK', 'reverb', '6540652122'),
('0090050014', 'effect board', 'skb', 'ps8', 'black', 'gray rim', '', '', 'IN STOCK', '', '6540652122'),
('0090063475', 'guitar pick', 'fender', 'delrin', 'green', '', 'thin-medium', '', 'BORROWED', '', '6540652122'),
('0090063476', 'guitar pick', 'd\'addario', 'p-351', 'pearl', 'light gray', 'medium', '', 'IN STOCK', '', '6440453222'),
('0090075760', 'bass guitar strap', 'ernie ball', '', 'brown', '', '', '', 'IN STOCK', '', '0000000011'),
('0090075761', 'bass guitar strap', 'g&l', '', 'leather brown', '', '', 'loose outer strap', 'IN STOCK', '', '6440453222'),
('0090075762', 'bass guitar strap', '', '', 'cream', '', '', '', 'IN STOCK', '', '6440453222'),
('0090083456', 'guitar strap', 'g&l', '', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0090083457', 'guitar strap', 'ernie ball', 'royal orleans', 'black', 'white', '', '', 'IN STOCK', '', '6540652122'),
('0090083458', 'guitar strap', 'ernie ball', 'polypro', 'black', '', '', '', 'IN STOCK', '', '6540652122'),
('0090083459', 'guitar strap', 'm33', '', '', 'gray', '', '', 'IN STOCK', '', '0000000011'),
('0090096700', 'bass guitar bag', 'gator', '', 'black', '', '5 str', '', 'IN STOCK', '', '0000000011'),
('0090096701', 'bass guitar bag', 'gator', 'cc-145', 'black', '', '5 str', '', 'IN STOCK', '', '6440453222'),
('0090096702', 'bass guitar case', 'ibanez', 'ibb541', 'black', 'light brown', '4 str', '', 'IN STOCK', '', '6440453222'),
('0090107123', 'guitar bag', 'gator', '', 'black', '', '6 str', '', 'IN STOCK', '', '0000000011'),
('0090107124', 'guitar bag', 'gator', 'cg - 162', 'black', '', '6 str', '', 'IN STOCK', '', '6540652122'),
('0090107125', 'guitar bag', 'ymc', 'gba4450', 'black', '', '6 str', '', 'IN STOCK', '', '6540652122'),
('0090113745', 'guitar case', 'gator', '', 'black', '', '6 str', '', 'IN STOCK', '', '6540652122'),
('0090113746', 'guitar case', 'chromacast', '', 'black', '', '6 str', '', 'IN STOCK', '', '6540652122'),
('0090123845', 'double bass pickup', 'fishman', 'bp-100', 'black', 'alloy receiver tip', '', '', 'IN STOCK', '', '6440453222'),
('0090133485', 'violin pickup', 'fishman', 'v-200', 'black', '', '', '', 'IN STOCK', '', '6648365422'),
('0090133486', 'violin pickup', 'fishman', 'v-200', 'red', '', '', '', 'IN STOCK', '', '0000000011'),
('0090133487', 'violin pickup', 'kna', 'vv-2', 'oak', '', '', '', 'IN STOCK', '', '6648365422'),
('0100013450', 'keyboard pedal', 'yamaha', 'fc5', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0100013451', 'keyboard pedal', 'yamaha', 'fc5', 'black', '', '', '', 'IN STOCK', '', '0000000011'),
('0100013452', 'keyboard pedal', 'roland', 'fg-100', 'black', 'metallic', '', '', 'IN STOCK', '', '6648365422'),
('0100013453', 'keyboard pedal', 'moukey', 'msp-001', 'black', 'metallic', '', '', 'IN STOCK', '', '6648365422'),
('0100013454', 'keyboard pedal', 'yamaha', 'fc7', 'black', '', '', '', 'IN STOCK', '', '6648365422'),
('0100022983', 'keyboard stand', 'yamaha', 'pkbs1', 'black', '', '', 'loose screws on right-hand side', 'IN STOCK', '', '0000000011'),
('0100022984', 'keyboard stand', 'yamaha', 'pkbs1', 'black', '', '', '', 'IN STOCK', '', '6648365422'),
('0100022985', 'keyboard stand', 'stellar labs', '555-13830', 'black', '', '', '', 'IN STOCK', 'dual-keyboard support', '6648365422'),
('0100031542', 'keyboard bag', 'roland', '', 'black', '', '35 in', '', 'IN STOCK', '', '0000000011'),
('0100031543', 'keyboard bag', 'roland', '', 'black', '', '35 in', '', 'IN STOCK', '', '6648365422'),
('0100041767', 'keyboard case', 'nord', 'gkb88', 'black', '', '88 keys', '', 'IN STOCK', '', '0000000011'),
('0100041768', 'keyboard case', 'korg', 'kba4076', 'black', '', '76 keys', '', 'IN STOCK', '', '6648365422'),
('0100041769', 'keyboard case', 'gator', 'gkb88', 'black', '', '88 keys', '', 'IN STOCK', '', '6648365422'),
('0110019845', 'audio mixer', 'yamaha', 'mg12', 'black', 'blue tabs', '12 ch', '', 'IN STOCK', '', '0000000022'),
('0110019846', 'audio mixer', 'behringer', 'xenyx 802 premium', 'grey', 'black rim', '8 ch', '', 'IN STOCK', '', '0000000022'),
('0110028560', 'stage light', 'adj', 'par-38bl', 'black', '', '', '', 'IN STOCK', '', '0000000022'),
('0110028561', 'stage light', 'adj', 'par-38bl', 'black', '', '', '', 'IN STOCK', '', '0000000022'),
('0110028562', 'stage light', 'adj', 'par-38bl', 'black', '', '', '', 'IN STOCK', '', '0000000022'),
('0110032377', 'lighting stand', 'fovitec', 'dx-192', 'black', '', '2.5 m', '', 'IN STOCK', '', '0000000022'),
('0110032378', 'lighting stand', 'fovitec', 'dx-192', 'black', '', '2.5 m', '', 'IN STOCK', '', '0000000022'),
('0110047604', 'note stand', 'maestro', 'mms-1', 'black', '', '', '', 'IN STOCK', '', '0000000022'),
('0110047605', 'note stand', 'maestro', 'mms-1', 'black', '', '', '', 'IN STOCK', '', '0000000022'),
('0110047606', 'note stand', 'yamaha', 'cc-12', 'black', '', '', '', 'IN STOCK', '', '0000000022'),
('0110053759', 'saxophone case', 'ammoon', 'mx304', 'maroon', '', '', '', 'IN STOCK', 'alto saxophone', '6648365422'),
('0110053760', 'saxophone case', 'ammoon', 'mx501', 'black', '', '', '', 'IN STOCK', 'baritone saxophone', '6648365422'),
('0110062374', 'trumpet case', 'ammoon', 'cw-012', 'black', '', '', '', 'IN STOCK', '', '6540652122'),
('0110071259', 'trombone case', 'p-bone', 'alt-002', 'black', '', '', '', 'IN STOCK', 'tenor trombone', '6540652122'),
('0110086790', 'saxophone reed box', 'd\'addario', 'rva-cse04', 'black', '', '8 reeds', '', 'IN STOCK', '', '6648365422'),
('0120012374', 'armchair', '', '', 'cream', '', '1 person', '', 'IN STOCK', '', '0000000011'),
('0120012375', 'armchair', '', '', 'cream', '', '1 person', '', 'IN STOCK', '', '0000000011'),
('0120012376', 'armchair', '', '', 'cream', '', '1 person', '', 'IN STOCK', '', '0000000011'),
('0120023488', 'multipurpose cloth', '', '', 'white', '', '', '', 'IN STOCK', '', '0000000011'),
('0120023489', 'multipurpose cloth', '', '', 'canary', '', '', '', 'IN STOCK', '', '0000000011'),
('0120031293', 'screaming rubber chicken', '', '', '', '', '', '', 'IN STOCK', 'ผู้พิทักษ์แบนด์ #1', '0000000011'),
('0120031294', 'screaming rubber chicken', '', '', '', '', '', '', 'IN STOCK', 'ผู้พิทักษ์แบนด์ #2', '0000000011');

-- --------------------------------------------------------

--
-- Table structure for table `login_system`
--

CREATE TABLE `login_system` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_system`
--

INSERT INTO `login_system` (`id`, `username`, `password`) VALUES
(1, 'admin', 'artsbandzinwza5566');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` varchar(10) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `year` char(1) DEFAULT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `tel_no` char(12) DEFAULT NULL,
  `line_id` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `first_name`, `surname`, `nickname`, `year`, `faculty`, `tel_no`, `line_id`, `email`) VALUES
('0000000011', '', '', '', '', '', '091-556-8961', 'taigaput06', 'taiga_put@gmail.com'),
('0000000022', '', '', '', '', '', '087-889-6543', 'wuttowut', 'wutto_ws@gmail.com'),
('6440188422', 'sasitorn', 'tepla', 'test', '4', 'arts', '084-645-6639', 'testsasi', 'testsasi@gmail.com'),
('6440453222', 'pitaya', 'aruncherdchai', 'mint', '4', 'arts', '066-897-4452', 'mintpit91', 'mintpit91@outlook.com'),
('6540652122', 'kullawanich', 'prasertpakorn', 'yuki', '3', 'arts', '098-984-1126', 'yukull333', 'kullawanich333@gmail.com'),
('6646321522', 'anusorn', 'lerdklao', 'bom', '2', 'arts', '067-432-1987', 'bbbbbomm', 'anusornlb@gmail.com'),
('6648365422', 'niraprawin', 'taweepol', 'ice', '2', 'arts', '094-966-3321', 'iseethatimicee', 'iceiceice111@outlook.com'),
('6740010322', 'kamonlakorn', 'witapradith', 'bow', '1', 'arts', '095-254-9835', 'bowthanoo', 'kamonbow@outlook.com'),
('6740235822', 'assadong', 'satidtep', 'sun', '1', 'arts', '099-333-4513', 'akatsukisun', 'assadongzun@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `timestamp` char(12) NOT NULL,
  `id_increment` char(3) NOT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `student_id` char(10) NOT NULL,
  `item_id` char(15) NOT NULL,
  `staff_id` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`timestamp`, `id_increment`, `borrow_date`, `return_date`, `remarks`, `student_id`, `item_id`, `staff_id`) VALUES
('240915123453', '001', '2024-09-15', '2024-09-22', '', '6741102622', '0010112644', '01001'),
('240915123453', '002', '2024-09-15', '2024-09-22', '', '6740098722', '0020042325', '01001'),
('240915123453', '003', '2024-09-15', '2024-09-22', '', '6740098722', '0090063475', '01001'),
('240915123453', '004', '2024-09-15', '2024-09-22', '', '6440254622', '0050013911', '01001'),
('240915123453', '005', '2024-09-15', '2024-09-22', 'top priority', '6440254622', '0060031874', '01001'),
('240918132411', '001', '2024-09-18', '2024-10-02', '', '6640783422', '0010011259', '04002'),
('240918132411', '002', '2024-09-18', '2024-10-02', '', '6640783422', '0010023215', '04002'),
('240918132411', '003', '2024-09-18', '2024-10-02', '', '6640783422', '0010023216', '04002'),
('240918132411', '004', '2024-09-18', '2024-10-02', '', '6640783422', '0010031298', '04002'),
('240918132411', '005', '2024-09-18', '2024-10-02', '', '6640783422', '0010042347', '04002'),
('240918132411', '006', '2024-09-18', '2024-10-02', '', '6640783422', '0010051238', '04002'),
('240918132411', '007', '2024-09-18', '2024-10-02', '', '6640783422', '0010074569', '04002'),
('240918132411', '008', '2024-09-18', '2024-10-02', 'top priority', '6640783422', '0010108436', '04002'),
('240918132411', '009', '2024-09-18', '2024-10-02', '', '6640783422', '0080064568', '04002'),
('240918132411', '010', '2024-09-18', '2024-10-02', '', '6640783422', '0080071282', '04002'),
('240918132411', '011', '2024-09-18', '2024-10-02', '', '6640783422', '0080029187', '04002'),
('240918132411', '012', '2024-09-18', '2024-10-02', '', '6540678922', '0020013498', '04002'),
('240918132411', '013', '2024-09-18', '2024-10-02', '', '6540678922', '0090014569', '04002'),
('240918132411', '014', '2024-09-18', '2024-10-02', '', '6540678922', '0060012988', '04002');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` char(10) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `year` char(1) DEFAULT NULL,
  `tel_no` char(12) DEFAULT NULL,
  `line_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `surname`, `nickname`, `year`, `tel_no`, `line_id`) VALUES
('01001', 'umaru', 'doma', 'umaru', '1', '081-441-6680', 'umarudayo'),
('02001', 'witaya', 'sarthrianru', 'mangkorn', '2', '096-887-4135', 'dragon_wit'),
('03001', 'ratawin', 'wannajarern', 'copper', '3', '094-863-5297', 'helicopperww'),
('04001', 'arinrada', 'wiriyakriangkrai', 'noo', '4', '088-645-5153', 'nooarin'),
('04002', 'karnteera', 'arunpaisarn', 'summer', '4', '089-978-5331', 'summerai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `login_system`
--
ALTER TABLE `login_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`timestamp`,`id_increment`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_system`
--
ALTER TABLE `login_system`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `client` (`student_id`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `record_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
