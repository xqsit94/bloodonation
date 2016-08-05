
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2015 at 05:32 AM
-- Server version: 5.1.67
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u560488414_bon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'f37cf4d3e61e4a3282053513ca35b85c', 'bloodnation108@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bloodrqst`
--

CREATE TABLE IF NOT EXISTS `bloodrqst` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient` varchar(25) NOT NULL DEFAULT '',
  `hospital` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(10) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL DEFAULT '',
  `quantity` varchar(10) NOT NULL,
  `person` varchar(25) NOT NULL DEFAULT '',
  `msg` varchar(250) NOT NULL,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT '',
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `weight` int(3) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(113) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(25) NOT NULL,
  `bio` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `date`, `username`, `password`, `fullname`, `gender`, `day`, `month`, `year`, `weight`, `bloodgroup`, `email`, `mobile`, `address`, `city`, `bio`) VALUES
(1, '2015-07-18 09:00:13', 'sanu', '25d55ad283aa400af464c76d713c07ad', 'DineshKumar.V.A', 'Male', 0, 0, 0, 67, 'O+', 'shedin08@gmail.com', '9710542508', 'Plot no:2,Door no:6,sathyavathy nagar,3rd st,padi,ch-50', 'Padi', ''),
(2, '2015-07-18 09:00:13', 'edkr', '25d55ad283aa400af464c76d713c07ad', 'DineshKumar.E', 'Male', 0, 0, 0, 60, 'O+', 'dineshkumar.e.1995@gmail.', '7418245568', 'No:20/16,New boag road,Kannamapet,T.nagar.', 'T.nagar', ''),
(3, '2015-07-18 09:00:13', 'mani', '25d55ad283aa400af464c76d713c07ad', 'Manikandan.B', 'Male', 0, 0, 0, 55, 'A1+', 'mani@tadka.com', '8148958860', 'No:12,1st cross st,annai sathya nagar,poothapedu,Ramapuram,ch-89', 'Ramapuram', ''),
(4, '2015-07-18 09:00:13', 'arun', '25d55ad283aa400af464c76d713c07ad', 'Arun Kumar.R', 'Male', 0, 0, 0, 55, 'O+', 'arunkumar_ravichandran@ya', '9003982429', 'NO:30,3/142,2nd st,annai karumari nagar,mathananthapuram,porur,ch-116', 'Porur', ''),
(5, '2015-07-18 09:00:13', 'sundar', '25d55ad283aa400af464c76d713c07ad', 'Sundaram .A', 'Male', 0, 0, 0, 45, 'A2+', 'sundaramarunachalam95@gma', '7418987345', 'No:882,61st st,10th sector,west K.K.nagar,ch', 'K.K Nagar', ''),
(6, '2015-07-18 09:00:13', 'priya', '25d55ad283aa400af464c76d713c07ad', 'Priya .B', 'Female', 0, 0, 0, 46, 'A+', 'priyabalai0110@gmail.com', '9042959690', 'No:2D/74,samiyar thottam,1st st,vyasarpadi,ch-39', 'Vyasarpadi', ''),
(7, '2015-07-18 09:00:13', 'prasanth', '25d55ad283aa400af464c76d713c07ad', 'Prasanth.M.A', 'Male', 0, 0, 0, 50, 'A+', '', '8608622951', 'No:17/6, Dr.Ambethkar st,Moorthy nagar,Gerugambakkam,ch-122', 'Porur', ''),
(8, '2015-07-18 09:00:13', 'divyasai', '25d55ad283aa400af464c76d713c07ad', 'Divya Sai Sucharitha.B', 'Female', 0, 0, 0, 0, 'O+', '', '8098091033', 'N0:RE 2/B Railway qtrs,Ennore,ch-57', 'Ennore', ''),
(9, '2015-07-18 09:00:13', 'dominic', '25d55ad283aa400af464c76d713c07ad', 'Dominic Clemment.E', 'Male', 0, 0, 0, 62, 'B+', 'dominicclemment@gmail.com', '8695798302', 'Plot No:37,Sheshathripuram,Velacherry,ch-42', 'Velacherry', ''),
(10, '2015-07-18 09:00:13', 'karthick', '25d55ad283aa400af464c76d713c07ad', 'Karthick Raja .T', 'Male', 0, 0, 0, 0, 'B+', '', '9790810947', 'No:35A/5A,Sivalingapuram,1st cross st,Korattur,ch-76', 'Korattur', ''),
(11, '2015-07-18 09:00:13', 'divyar', '25d55ad283aa400af464c76d713c07ad', 'Divya.R', 'Female', 0, 0, 0, 0, 'O+', '', '9176964707', 'No:1,1st cross st,rajiv gandthi nagar,Nagalkeni,chrompet,ch-44', 'Chrompet', ''),
(12, '2015-07-18 09:00:13', 'ksdeepa', '25d55ad283aa400af464c76d713c07ad', 'Deepa.k.s', 'Female', 0, 0, 0, 43, 'B+', '', '8807748024', 'NO:151/01,JCO Army quaters,Nr cantonment school,Nandhambakkam', 'Nandhambakkam', ''),
(13, '2015-07-18 09:00:13', 'Bala.s', '25d55ad283aa400af464c76d713c07ad', 'S.Balaji', 'Male', 0, 0, 0, 0, 'O-', '', '8489079730', 'NO:15,15th Nehru colony st.,Palavanthangal,chennai.', 'Palavanthangal', ''),
(14, '2015-07-18 09:00:13', 'Jeeva', '25d55ad283aa400af464c76d713c07ad', 'P.Jeevanandhan', 'Male', 0, 0, 0, 0, 'O+', '', '9840483663', 'NO:4/50L,92nd ST.,Muthamizh nagar,kodungaiur,ch-118', 'kodungaiur', ''),
(15, '2015-07-18 09:00:13', 'RAJI', '25d55ad283aa400af464c76d713c07ad', 'C.Rajakumari', 'Female', 0, 0, 0, 0, 'O+', '', '9043783105', 'NO:7/4,1ST.,Kannigapuram,velacheri road,guindy,ch-32.', 'guindy', ''),
(16, '2015-07-18 09:00:13', 'mouriya', '25d55ad283aa400af464c76d713c07ad', 'M.Mouriya', 'Female', 0, 0, 0, 49, 'O+', '', '8098091033', 'Mdha Engg College,ArulmaryLadiesHostel,kundrathur,chennai-69 ', 'Kundrathur', ''),
(17, '2015-07-18 09:00:13', 'Kanaga', '25d55ad283aa400af464c76d713c07ad', 'Kangadurga.K', 'Female', 0, 0, 0, 45, 'O+', '', '9841541637', 'd/o N.Krishna,no.3,bajanai koli st,sankar nagar,nenilicherry,chrompet,ch-44', 'Chrompet', ''),
(18, '2015-07-18 09:00:13', 'annapriya', '25d55ad283aa400af464c76d713c07ad', 'Annapriya.R', 'Female', 0, 0, 0, 48, 'B+', '', '9442157139', 'Mdha Engg College ,Arulmary LadiesHostel,kundrathur,chennai-69 ', 'Kundrathur', ''),
(19, '2015-07-18 09:00:13', 'Priyadharshni', '25d55ad283aa400af464c76d713c07ad', 'Priyadharshni.S', 'Female', 0, 0, 0, 0, 'A2B+', '', '', 'G4,B-Block,sakthi sabari flats,40/68sowri St,Alandur.Ch-16', 'Alandur', ''),
(20, '2015-07-18 09:00:13', 'Navin', '25d55ad283aa400af464c76d713c07ad', 'Navinkumar.K', 'Male', 0, 0, 0, 0, 'B+', '', '', '15th St,Nehrucolony,Nanganallur,Ch-61', 'Nanganallur', ''),
(21, '2015-07-18 09:00:13', 'ramya', '25d55ad283aa400af464c76d713c07ad', 'Muthuramya.N', 'Female', 0, 0, 0, 0, 'O+', '', '9551200395', 'Mdha Engg College ,Arulmary LadiesHostel,kundrathur,chennai-69 ', 'Kundrathur', ''),
(22, '2015-07-18 09:00:13', 'deva', '25d55ad283aa400af464c76d713c07ad', 'Devaraj.M', 'Male', 0, 0, 0, 0, 'O+', '', '9940229896', 'NO:9,4th cross street ,Samayapuram,karambakkam,porur,Ch-116', 'Porur', ''),
(23, '2015-07-18 09:00:13', 'barath', '25d55ad283aa400af464c76d713c07ad', 'Barathkumaran.K', 'Male', 0, 0, 0, 0, 'B+', '', '9791154195', 'NO:43,Dr.Ambethkar Street,Meenabakkam,Ch-27', 'Meenabakkam', ''),
(24, '2015-07-18 09:00:13', 'Kamaraj', '25d55ad283aa400af464c76d713c07ad', 'Kamarajan.M', 'Male', 0, 0, 0, 0, 'A1B+', '', '9790878077', 'No/46,Salavai thurai,saidapet,Chennai-15', 'Saidapet', ''),
(25, '2015-07-18 09:00:13', 'siva', '25d55ad283aa400af464c76d713c07ad', 'Siva.T', 'Male', 0, 0, 0, 0, 'B+', '', '9092127695', 'S/o G.thirunavukarasu,125/3 Kalathumettu Street,Narasingarayan pettai,Thachambadi(p.o)Polure(T.k),T.V.Mallai (D.t)-606902', 'T.V.Malli', ''),
(26, '2015-07-18 09:00:13', 'aravinth', '25d55ad283aa400af464c76d713c07ad', 'R.Aravinth', 'Male', 0, 0, 0, 0, 'O+', '', '8190814593', 'Madha Engg College ,Soosiyapillai Boys Hostel', 'Kundrathur', ''),
(27, '2015-07-18 09:00:13', 'manimaran', '25d55ad283aa400af464c76d713c07ad', 'Manimaran', 'Male', 0, 0, 0, 0, 'O+', '', '9401307130', 'no.50,Mettu St,karaimanagar,kundrathur,Ch-69', 'Kundrathur', ''),
(28, '2015-07-18 09:00:13', 'sudha', '25d55ad283aa400af464c76d713c07ad', 'Sudha.R', 'Female', 0, 0, 0, 0, 'B+', '', '9486455112', '61-A,3rd  Street,Sakthi Avenu,Gerukambakkam,Chennai', 'Gerukambakkam', ''),
(29, '2015-07-18 09:00:13', 'anand', '25d55ad283aa400af464c76d713c07ad', 'Anand.M', 'Male', 0, 0, 0, 0, 'B+', '', '8489670594', 'Madha Engg College ,Soosiyapillai Boys Hostel', 'Kundrathur', ''),
(30, '2015-07-18 09:00:13', 'Lokeshraj', '25d55ad283aa400af464c76d713c07ad', 'LokeshRaj.M', 'Male', 0, 0, 0, 0, 'B+', '', '8807716212', 'no.3,4th Street,Annai Sathya Nagar,puthupedu,Ramapuram', 'Ramapuram', ''),
(31, '2015-07-18 09:00:13', 'RASHMI', '25d55ad283aa400af464c76d713c07ad', 'R.Rashmi', 'Female', 0, 0, 0, 0, 'A1+', '', '9176109167', 'NO:20/14,2nd st., Kumaran nagar,kalladipet,chennai-19', 'kaladipet', ''),
(32, '2015-07-18 09:00:13', 'vimal', '25d55ad283aa400af464c76d713c07ad', 'Benedict vimal .K', 'Male', 0, 0, 0, 0, 'O-', '', '9500181590', 'Rajarajan Nagar,Moulivakkam,CH-125', 'Moulivakkam', ''),
(33, '2015-07-18 09:00:13', 'vishnu', '25d55ad283aa400af464c76d713c07ad', 'Vishnuram.M', 'Male', 0, 0, 0, 0, 'A1+', '', '9095176514', 'Madha Engg College ,Soosiyapillai Boys Hostel', 'Kundrathur', ''),
(34, '2015-07-18 09:00:13', 'v.priya', '25d55ad283aa400af464c76d713c07ad', 'PRIYA.V', 'Female', 0, 0, 0, 0, 'O+', '', '7200305546', 'NO.11,Thiruveethi Amman kovil Street,Kalidundram,Tharamani. Chennai-113', 'Tharamani', ''),
(35, '2015-07-18 09:00:13', 'usha', '25d55ad283aa400af464c76d713c07ad', 'S.Usharani', 'Female', 0, 0, 0, 0, 'B+', '', '9600181829', 'HOSTELER', 'Kundrathur', ''),
(36, '2015-07-18 09:00:13', 'NIVETHA', '25d55ad283aa400af464c76d713c07ad', 'P.Nevetha', 'Female', 0, 0, 0, 0, 'O+', 'nivetha957@gmail.com', '9791005625', 'NO:6/42,THANGAL ST.,4TH Cross st.,virugambakkam,ch-92', 'virugambakkam', ''),
(37, '2015-07-18 09:00:13', 'PRIYADARSHINI', '25d55ad283aa400af464c76d713c07ad', 'S.Priyadarshini', 'Female', 0, 0, 0, 0, 'A1+', 'Priyasam1111@gmail.com', '9940105037', 'NO:7/5 Balasubramanium st.,villivakkam,ch-49', 'villivakkam', ''),
(38, '2015-07-18 09:00:13', 'PAVITHRA', '25d55ad283aa400af464c76d713c07ad', 'E.Pavithra', 'Female', 0, 0, 0, 0, 'O+', 'pavithraelango17@gmail.co', '9962791701', 'NO:27/36 West madha st.,mangadu,ch-122', 'mangadu', ''),
(39, '2015-07-18 09:00:13', 'MYTHREYI', '25d55ad283aa400af464c76d713c07ad', 'K.S.Mythreyi', 'Female', 0, 0, 0, 0, 'B+', 'ks.mythreyi15@gmail.com', '9789042896', 'NO:7,KAKKAN ST.,Paduvancherry,ch-126', 'Paduvancherry', ''),
(40, '2015-07-18 09:00:13', 'NISHANTHI', '25d55ad283aa400af464c76d713c07ad', 'B.Nishanthi', 'Female', 0, 0, 0, 0, 'B+', 'nishadiya456@gmail.com', '8015511109', 'NO:8,THIRUNALUHARALU ST.,ZOMBAZAR,TRIPLICANE,CH-5', 'TRIPLICANE', ''),
(41, '2015-07-18 09:00:13', 'sakthivel', '25d55ad283aa400af464c76d713c07ad', 'Sakthivel.M', 'Male', 0, 0, 0, 0, 'A1+', '', '8939119494', 'No:6/2,Brindnavan st,west mambalam,ch-33', 'T.Nagar', ''),
(42, '2015-07-18 09:00:13', 'maniarasan', '25d55ad283aa400af464c76d713c07ad', 'Maniarasan.A', 'Male', 0, 0, 0, 0, 'O+', '', '9003296333', 'NO:248/6B,vallalar st.,parinagar,anagaputhur,ch-70.', 'Anagaputhur', ''),
(43, '2015-07-18 09:00:13', 'shobana', '25d55ad283aa400af464c76d713c07ad', 'Shobana Sri A.G', 'Female', 0, 0, 0, 55, 'B-', 'shobanaesak09@gmail.com', '9003047269', '', 'Chennai', ''),
(44, '2015-07-18 09:00:13', 'lakshmi', '25d55ad283aa400af464c76d713c07ad', 'Sri Lakshmi R.', 'female', 0, 0, 0, 0, 'O+', 'srilakshmisori055@gmail.c', '9176380487', '19/57 Srividhya apts, 3rd main road venkatesh nagar, Virgurambakkam ', 'chennai', ''),
(45, '2015-07-18 09:00:13', 'Ajitha', '25d55ad283aa400af464c76d713c07ad', 'Ajitha Priya J.M.', 'Female', 0, 0, 0, 60, 'O+', '', '9842602954', '184, keezha Maravan Kudieruppu,kottar port,', 'Nagarcoil', ''),
(46, '2015-07-18 09:00:13', 'Keerthika', '25d55ad283aa400af464c76d713c07ad', 'Keerthika E.', 'female', 0, 0, 0, 55, 'B+', '', '9842602954', '4/28, South Street, Alathur,pattukkotai -614901', 'Tanjore', ''),
(47, '2015-07-18 09:00:13', 'Prasanna', '25d55ad283aa400af464c76d713c07ad', 'Prasanna K.', 'Male', 0, 0, 0, 60, 'A1+', '', '8939503717', 'No.7,Anjaneyar st,Karthikeyan Nagar,chennai-95', 'Maduravoyal', ''),
(48, '2015-07-18 09:00:13', 'Dinesh', '25d55ad283aa400af464c76d713c07ad', 'Dinesh Kumar D.', 'Male', 0, 0, 0, 0, 'A1+', '', '9600196807', '52/56, Tulasingah street, pudupet,chennai-02', 'Pudupet', ''),
(49, '2015-07-18 09:00:13', 'Vijay', '25d55ad283aa400af464c76d713c07ad', 'Vijay A.', 'Male', 0, 0, 0, 60, 'A+', '', '9629669358', 'Indira Nagar, Elavanasur Kottai dst, Ulundurpet ', 'Villupuram', ''),
(50, '2015-07-18 09:00:13', 'Subash', '25d55ad283aa400af464c76d713c07ad', 'Subash P.', 'Male', 0, 0, 0, 65, 'A1+', '', '9094061690', 'No.42,P.E.Koil North mada St, chennai-23', 'Ayanavaram', ''),
(51, '2015-07-18 09:00:13', 'Vignesvar', '25d55ad283aa400af464c76d713c07ad', 'Vignesvar G.', 'Male', 0, 0, 0, 60, 'A1B+', '', '9176955436', 'No.1/16,3/51, Anna Street,Periya Panicheery,chennai', 'Periyapanicheery', ''),
(52, '2015-07-18 09:00:13', 'Swetha', '25d55ad283aa400af464c76d713c07ad', 'Swetha S.', 'Female', 0, 0, 0, 57, 'A2B+', '', '9381259099', 'No.7/5,Umaphathy Garden, Guindy-32', 'Guindy', ''),
(53, '2015-07-18 09:00:13', 'Antony', '25d55ad283aa400af464c76d713c07ad', 'Antony Richard Raj S.', 'Male', 0, 0, 0, 60, 'O+', '', '9941992240', 'No.70/9A, Periyar 3rd Cross St., Srinivasa Nagar,padi-50', 'padi', ''),
(54, '2015-07-18 09:00:13', 'Ganesan', '25d55ad283aa400af464c76d713c07ad', 'Ganesan B.', 'Male', 0, 0, 0, 65, 'B-', '', '9094967079', 'No.11/3, Thoupathi Amman Kovil,5th st., Velacheery chennai-600042', 'Velacherry', ''),
(55, '2015-07-18 09:00:13', 'Auxilia', '25d55ad283aa400af464c76d713c07ad', 'Auxilia Philomin', 'Female', 0, 0, 0, 42, 'A1B+', '', '9710005676', 'No.31,First new St., Lakshmipuram,Chrompet,Chennai-600044', 'Chrompet', ''),
(56, '2015-07-18 09:00:13', 'Mohamed', '25d55ad283aa400af464c76d713c07ad', 'Mohamed Yaseen Ahamed M.', 'Male', 0, 0, 0, 60, 'A1+', '', '9944521216', 'No.13/6,Raja Street Devaraj Nagar,Saligramam,Chennai-600093', 'Saligramam', ''),
(57, '2015-07-18 09:00:13', 'Vidhya', '25d55ad283aa400af464c76d713c07ad', 'Vidhya M.', 'Female', 0, 0, 0, 55, 'A+', '', '9600164229', 'No.19,Dst main road, Annanagar,pammal', 'Pammal', ''),
(58, '2015-07-18 09:00:13', 'Gayathri', '25d55ad283aa400af464c76d713c07ad', 'Gayathri S.M.', 'Female', 0, 0, 0, 45, 'AB+', '', '9941935743', 'No.46,Balaji Nagar 1st cross Street,Thiruninravur Chennai-600024', 'Thiruninravur', ''),
(59, '2015-07-18 09:00:13', 'Jenifer', '25d55ad283aa400af464c76d713c07ad', 'Jenifer Rosy G.', 'Female', 0, 0, 0, 47, 'A+', '', '9840289527', 'No.28/15,Gulam Abbas AliKhan 10thSt., thousand Lights Chennai-600006', 'Thousand Lights', ''),
(62, '2015-07-18 09:00:13', 'kowsalya', '25d55ad283aa400af464c76d713c07ad', 'Kowsalya K.', 'Female', 0, 0, 0, 45, 'AB+', '', '9841596867', '', 'Ayyapanthangal', ''),
(63, '2015-07-18 09:00:13', 'Sneha', '25d55ad283aa400af464c76d713c07ad', 'Sneha R.', 'Female', 0, 0, 0, 46, 'A1+', '', '9677492587', 'No.7/c,Maryam Madina Pallivard st., Ponneri-601204', 'Ponneri', ''),
(65, '2015-07-18 09:00:13', 'Sushmitha', '25d55ad283aa400af464c76d713c07ad', 'Sushmitha Graceline S.', 'Female', 0, 0, 0, 45, 'A2B+', '', '8903321834', 'No.7/214,Old Church st., Senthiyambalam sawyerpuram,Thoothukudi-628251', 'Thoothukudi', ''),
(67, '2015-07-18 09:00:13', 'Vanmathi', '25d55ad283aa400af464c76d713c07ad', 'Vanmathi P.', 'Female', 0, 0, 0, 50, 'A1+', '', '9003546241', 'No.10/1,New St.,Sirukarumbur vil and post Arakkonam tk. vellore dt-632531', 'Vellore', ''),
(68, '2015-07-18 09:00:13', 'vinoth', '25d55ad283aa400af464c76d713c07ad', 'Vinoth R.', 'Male', 0, 0, 0, 56, 'A2B+', '', '9176651373', 'No.6,Vigneshwara Nagar,Gurugambakkam,Porur', 'Porur', ''),
(69, '2015-07-18 09:00:13', 'Aravind', '25d55ad283aa400af464c76d713c07ad', 'Aravinth T.', 'Male', 0, 0, 0, 60, 'A+', '', '9940160911', 'No.3/31,S.R.windsor  park,sathya Nagar,Ramapuram,Ch-89', 'Ramapuram', ''),
(70, '2015-07-18 09:00:13', 'Vijay Kumar', '25d55ad283aa400af464c76d713c07ad', 'Vijay Kumar S.', 'Male', 0, 0, 0, 66, 'A1+', '', '9003268660', 'No.5/7 Annai Kamachi Amman Koil st., Nea Bajanai Koil st.,Ramapuram chennai-89', 'Ramapuram', ''),
(71, '2015-07-18 09:00:13', 'Sathish', '25d55ad283aa400af464c76d713c07ad', 'Sathish Kumar K.', 'Male', 0, 0, 0, 60, 'AB+', '', '9500172073', 'No.18/16 Avariyar Street M.G.R.Nagar Chennai-78', 'M.G.R.Nagar', ''),
(72, '2015-07-18 09:00:13', 'Ajith', '25d55ad283aa400af464c76d713c07ad', 'Ajith Kumar K.', 'Male', 0, 0, 0, 55, 'A1+', '', '9962230111', 'No.2/103,Varasakthi Vinayagar Kovil,2nd st., odamanaga,Vanagaram chennai-95', 'vanagaram', ''),
(73, '2015-07-18 09:00:13', 'Santhosh', '25d55ad283aa400af464c76d713c07ad', 'Santhosh Thomas A.', 'Male', 0, 0, 0, 53, 'A+', '', '8680041432', 'No.2 Kanaraj st.,  nagalkeri,Chrompet ch-44', 'Chrompet', ''),
(74, '2015-07-18 09:00:13', 'hemamalini', '25d55ad283aa400af464c76d713c07ad', 'H.Hema Malini', 'Female', 0, 0, 0, 50, 'B+', 'hemamalinihk@gmail.com', '9094296406', '', '', ''),
(89, '2015-09-20 05:37:32', 'venkat', '42414c02583006fe418be4b110284ae7', 'Venkat Billa', 'Male', 1, 2, 1994, 0, 'A2B+', 'asb@gmail.com', '7657676767', 'asasaf', 'asfsadfas', 'asdfsaf');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`setting`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting`, `value`) VALUES
('admin_email', 'contactus@bloodonation.in'),
('site_copyright', 'Tigers Club'),
('site_domain', 'www.bloodonation.in'),
('site_email', 'contactus@bloodonation.in'),
('site_metadesc', 'No 1 Students blood database in India'),
('site_metakey', 'online blood,free blood,free blood online,online blood donatioon,online blood donation india,blood dononation india,blood donor,free blood donor'),
('site_name', 'Bloodonation');

-- --------------------------------------------------------

--
-- Table structure for table `venkat`
--

CREATE TABLE IF NOT EXISTS `venkat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
