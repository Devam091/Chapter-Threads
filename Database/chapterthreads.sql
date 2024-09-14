-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chapterthreads`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `author` varchar(1000) NOT NULL,
  `isbn_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `name`, `author`, `isbn_no`) VALUES
(1, 'Harry Potter 1', 'J.K Rowling', '978-0-7475-3269-9'),
(2, 'Harry Potter 2', 'J.K Rowling', '123243534'),
(3, 'Harry Potter 3', 'J.K Rowling', '1221143534'),
(4, 'Harry Potter 4', 'J.K Rowing', '51654646'),
(5, 'Harry Potter 5', 'J.K Rowing', '548757647'),
(6, 'Harry Potter 6', 'J.K Rowing', '548717647'),
(7, 'Harry Potter 7', 'J.K Rowing', '548710647');

-- --------------------------------------------------------

--
-- Table structure for table `book1`
--

CREATE TABLE `book1` (
  `book_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `isbn_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book1`
--

INSERT INTO `book1` (`book_id`, `name`, `author`, `isbn_no`) VALUES
(1, 'Harry Potter and the Philosopher\'s Stone', 'J.K Rowling', '978-1-78110-647-1'),
(2, 'Harry Potter and the Chamber of Secrets', 'J.K Rowling', '978-1-78110-647-2'),
(3, 'Harry Potter and the Prisoner of Azkaban', 'J.K Rowling', '978-1-78110-647-3'),
(4, 'Harry Potter and the Goblet of Fire', 'J.K Rowling', '978-1-78110-647-4'),
(5, 'Harry Potter and the Order of the Phoenix', 'J.K Rowling', '978-1-78110-647-5'),
(6, 'Harry Potter and the Half-Blood Prince', 'J.K Rowling', '978-1-78110-647-6'),
(7, 'Harry Potter and the Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(8, 'American Prometheus', 'Kai Bird and Martin J. Sherwin', '88888'),
(9, 'Dreams From My Father', 'Barack Obama', '99999'),
(10, 'I Am Malala', 'Malala Yousafzai and Christina Lamb', '101010'),
(11, 'My Brief History', 'Stephen Hawking', '111111'),
(12, 'Playing It My Way', 'Sachin Tendulkar and Boria Majumdar', '121212'),
(13, 'Steve Jobs', 'Walter Isaacson', '131313'),
(14, 'The Diary Of A Young Girl', 'Anne Frank', '141414'),
(15, 'The Race Of My Life', 'Milkha Singh', '151515'),
(16, 'The Story of My Experiments With Truth', 'M.K. Gandhi', '161616'),
(17, 'WINGS OF FIRE\r\n', 'A.P.J Abdul Kalam and Arun Tiwari', '171717'),
(18, 'The Arabian Nights', 'Andrew Lang', '181818'),
(19, 'The Time Machine', 'H.G. Wells', '191919'),
(20, 'Book Of Shadows', 'Scott Cunningham', '202020'),
(21, 'At the Mountains of Madness', 'H.P. Lovecraft', '212121'),
(22, 'Clarimonde', 'Theophile Gautier', '222222'),
(23, 'The Works Of Edgar Allan Poe - Volume 1', 'Edgar Allan Poe', '232323'),
(24, 'Color Out of Space', 'H.P. Lovecraft', '242424'),
(25, 'Dracula', 'Bram Stoker', '252525'),
(26, 'The Best Ghost Stories', 'Joseph Lewis French', '262626'),
(27, 'The Dunwich Horror', 'H.P. Lovecraft', '272727'),
(28, 'The Phantom of the Opera', 'Gaston Leroux', '282828'),
(29, 'The Shadow Over Innsmouth', 'H.P. Lovecraft', '292929'),
(30, 'The Yellow Wallpaper', 'Charlotte Perkins Gilman', '303030'),
(31, 'Emma', 'Jane Austen', '313131'),
(32, 'Healing Her Heart', 'Laura Scott', '323232'),
(33, 'Little Women', 'Lousia May Alcott', '333333'),
(34, 'MADEMOISELLE AT ARMS', 'Elizabeth Bailey', '343434'),
(35, 'Persuasion', 'Jane Austen', '353535'),
(36, 'Tragedy of Romeo and Juliet', 'William Shakespeare\'s', '363636'),
(37, 'Sense and Sensibility', 'Jane Austen', '373737'),
(38, 'The Upas Tree', 'Florence L. Barclay', '383838'),
(39, 'The Demon Girl', 'Penelope Fletcher', '393939'),
(40, 'Dune: The Butlerian Jihad', 'Brian Herbert', '404040'),
(41, 'Paul Of Dune', 'Brian Herbert and Kevin J. Anderson', '414141'),
(42, 'Dune: House Harkonnen', 'Brian Herbert and Kevin J. Anderson', '424242'),
(43, 'Dune: House Corrino', 'Brian Herbert and Kevin J. Anderson', '434343'),
(44, 'Dune: House Atreides', 'Brian Herbert and Kevin J. Anderson', '444444'),
(45, 'Heretics of Dune', 'Frank Herbert', '454545'),
(46, 'God Emperor of Dune', 'Frank Herbert', '464646'),
(47, 'Dune Messiah', 'Frank Herbert', '474747'),
(48, 'Dune', 'Frank Herbert', '484848'),
(49, 'Children of Dune', 'Frank Herbert', '494949'),
(50, 'The Phantom Of The Opera', 'Gaston Leroux', '505050');

-- --------------------------------------------------------

--
-- Table structure for table `claimed`
--

CREATE TABLE `claimed` (
  `Email` varchar(220) NOT NULL,
  `Coupon` varchar(220) NOT NULL,
  `Code` varchar(220) NOT NULL,
  `Validity` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `Serial` int(100) NOT NULL,
  `First` varchar(220) NOT NULL,
  `Last` varchar(220) NOT NULL,
  `Email` varchar(220) NOT NULL,
  `Street` text DEFAULT NULL,
  `City` varchar(220) NOT NULL,
  `State` varchar(220) NOT NULL,
  `ZipCode` varchar(220) NOT NULL,
  `Paymentmode` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quesans`
--

CREATE TABLE `quesans` (
  `ques_id` int(100) NOT NULL,
  `quesseq` int(11) NOT NULL,
  `question` text NOT NULL,
  `op1` text NOT NULL,
  `op2` text NOT NULL,
  `op3` text NOT NULL,
  `op4` text NOT NULL,
  `ans` text NOT NULL,
  `book_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quesans`
--

INSERT INTO `quesans` (`ques_id`, `quesseq`, `question`, `op1`, `op2`, `op3`, `op4`, `ans`, `book_id`) VALUES
(1, 1, 'Who actually puts the curse on Harry during the Quidditch match?', 'Snape', 'Malfoy', 'Quirrell', 'Nicolas Flamel', 'Quirrell', 1),
(2, 2, 'In what house is Malfoy?', 'Hufflepuff', 'Slytherin', 'Gryffindor', 'Ravenclaw', 'Slytherin', 1),
(3, 3, 'To whom does the invisibility cloak belong originally?', 'Harry’s father', 'Voldemort', 'Dumbledore', 'Hagrid', 'Harry’s father', 1),
(4, 4, 'What does Harry see when he looks in the Mirror of Erised for the first time?', 'Himself as an old, wise wizard', 'A Quidditch trophy', 'The Sorcerer’s Stone', 'His parents', 'His parents', 1),
(5, 5, 'What position does Harry play in Quidditch?', 'Quaffle', 'Sweeper', 'Seeker', 'Chaser', 'Seeker', 1),
(6, 6, 'To whom does the Sorcerer’s Stone belong?', 'Harry', 'Hagrid', 'Voldemort', 'Nicolas Flamel', 'Nicolas Flamel', 1),
(7, 7, 'Who is Fluffy?', 'Hagrid’s dragon', 'Harry’s owl', 'Hagrid’s three-headed dog', 'Dumbledore’s pet snake', 'Hagrid’s three-headed dog', 1),
(8, 8, 'How do the children get rid of Hagrid’s dragon?', 'They poison it', 'They bring it up to the top of the tallest tower and push it off', 'They bring it up to the top of the tallest tower and give it to Ron’s older brother’s friends', 'They bring it up to the top of the tallest tower and give it to Voldemort', 'They bring it up to the top of the tallest tower and give it to Ron’s older brother’s friends', 1),
(9, 9, 'How does Harry first learn that he is a wizard?', 'The Dursleys tell him when he is eight', 'Dudley accidentally lets it slip', 'Hagrid has to track him down to tell him', 'He reads about it in the Daily Prophet', 'Hagrid has to track him down to tell him', 1),
(10, 10, 'Where does Harry live in the Dursley’s home?', 'With Dudley', 'In the guest house', 'In Mr. and Mrs. Dursley’s room', 'In a cupboard under the stairs', 'In a cupboard under the stairs', 1),
(11, 1, 'What is Harry instructed to do for his detention?', 'Answer Gilderoy Lockhart\'s fan mail', 'Polish trophies', 'Mop up the first floor girls\' bathroom', 'Tend to Professor Sprout\'s Mandrakes', 'Answer Gilderoy Lockhart\'s fan mail', 2),
(12, 2, 'Why do Harry and Ron fly a Ford Anglia to Hogwarts?', 'Because they want to beat the train, thus getting first choice of dorm rooms', 'Because they want to impress Gilderoy Lockhart', 'Because George dared them to try it', 'Because Gate Nine-and-three-quarters closed up before they could enter', 'Because Gate Nine-and-three-quarters closed up before they could enter', 2),
(13, 3, 'What does Lucius Malfoy donate to Slytherin House?', 'Expensive new sofas', 'A winged monster to guard its entrance', 'A speedy set of broomsticks for its Quidditch team', 'A library of dark magic books', 'A speedy set of broomsticks for its Quidditch team', 2),
(14, 4, 'Who of the following is NOT petrified?', 'Percy Weasley', 'Colin Creevey', 'Penelope Clearwater', 'Hermione Granger', 'Percy Weasley', 2),
(15, 5, 'Besides Harry Potter, who was Hogwarts\' most famous Parselmouth?', 'Voldemort', 'Gilderoy Lockhart', 'Dumbledore', 'Lucius Malfoy', 'Voldemort', 2),
(16, 6, 'Whose Deathday party do Harry, Ron, and Hermione attend?', 'The Bloody Baron', 'Nearly Headless Nick', 'Peeves the Poltergeist', 'Moaning Myrtle', 'Nearly Headless Nick', 2),
(17, 7, 'How does Tom Riddle manipulate Ginny Weasley?', 'Through his famous animal magnetism', 'Through a diary', 'Through hypnosis', 'Through her dreams', 'Through a diary', 2),
(18, 8, 'Who or what eventually saves Ron and Harry from being eaten by giant spiders in the Forbidden Forest?', 'Hagrid\'s dog Fang', 'The Whomping Willow', 'The Weasleys\' Ford Anglia', 'Hagrid', 'The Weasleys\' Ford Anglia', 2),
(19, 9, 'Into what does the transformation potion turn Hermione?', 'A rectangle', 'A cat', 'A textbook', 'A fern', 'A cat', 2),
(20, 10, 'Who, ultimately, is the Heir of Slytherin?', 'Tom Riddle', 'Harry Potter', 'Ginny Weasley', 'Draco Malfoy', 'Tom Riddle', 2),
(21, 1, 'What must Harry do in secret while at four Privet Drive?', 'His Quidditch exercises', 'His homework', 'Watch television', 'Talk on the telephone', 'His homework', 3),
(22, 2, 'Does Uncle Vernon ultimately sign the Hogsmeade release form?', 'No', 'Yes', '?', '?', 'No', 3),
(23, 3, 'What false name does Harry give the staff of the Knight Bus?', 'Seamus Finnegin', 'Dudley Dursley', 'Neville Longbottom', 'Dean Thomas', 'Neville Longbottom', 3),
(24, 4, 'In what psychic medium does Professor Trelawney foresee Harry\'s death?', 'Phrenology', 'Interpreting Tealeaves', 'Palm-reading', 'Crystal-ball gazing', 'Interpreting Tealeaves', 3),
(25, 5, 'What subject does Snape teach when he substitutes for Lupin\'s Defense Against the Dark Arts class?', 'Werewolves', 'Boggarts', 'Manticores', 'Redcaps', 'Werewolves', 3),
(26, 6, 'Who ultimately DID send Harry the Firebolt?', 'Sirius Black', 'Albus Dumbledore', 'Minerva McGonagall', 'Peter Pettigrew', 'Sirius Black', 3),
(27, 7, 'What words prompt the Marauder\'s Map to show itself?', 'I solemnly swear that I am up to no good.', 'Alohamora.', 'Teach me trouble.', 'Open sesame.', 'I solemnly swear that I am up to no good.', 3),
(28, 8, 'What shape does Harry\'s Patronus take?', 'A stag', 'A hippogriff', 'A unicorn', 'A boar', 'A stag', 3),
(29, 9, 'Why is Scabbers missing a toe?', 'Because, while in his human form, he cut it off in order to frame Sirius Black', 'Because he got in a fight with Crookshanks', 'Because he was old and his body parts were crumbling', 'Because Fred Weasley accidentally charmed it away', 'Because, while in his human form, he cut it off in order to frame Sirius Black', 3),
(30, 10, 'Into whose bed does Black slash his way?', 'Ron\'s', 'Harry\'s', 'Hermione\'s', 'Neville\'s', 'Ron\'s', 3),
(31, 1, 'Which curse upsets Neville Longbottom the most?', 'Crucio', 'Avada Kedavra', 'Imperio', 'Accio', 'Crucio', 4),
(32, 2, 'Into what does Mad-Eye Moody turn Malfoy?', 'A writhing, furry spider', 'A bouncing white ferret', 'A wobbly wooden table', 'A green octopus', 'A bouncing white ferret', 4),
(33, 3, 'Why are Ron and Hermione on such uneasy terms during the Yule Ball?', 'Because made fun of her house-elf crusade', 'Because her cat Crookshanks attacked his owl Pig', 'Because she informed him that he danced badly', 'Because he has a crush on her, and she is at the ball with someone else', 'Because he has a crush on her, and she is at the ball with someone else', 4),
(34, 4, 'Who ultimately suggests that Harry eat gillyweed to breathe underwater?', 'Neville', 'Hermione', 'Dobby', 'Hagrid', 'Dobby', 4),
(35, 5, 'How does Voldemort summon Harry to the graveyard?', 'By tricking him into following a path on the Marauder\'s Map', 'By luring him into a fire with Floo powder', 'By turning the Triwizard Cup into a portkey', 'By using Ron as bait', 'By turning the Triwizard Cup into a portkey', 4),
(36, 6, 'Does Uncle Vernon ultimately give Harry permission to attend the Quidditch World Cup?', '?', 'Yes', '?', 'No', 'Yes', 4),
(37, 7, 'How do the wizards sleep during the Quidditch World Cup?', 'In trees', 'Underground', 'Invisibly', 'In tents', 'In tents', 4),
(38, 8, 'Why is Hermione so upset when she sees that Winky appears to have conjured the Dark Mark?', 'Because she knows that Mr. Crouch will fire her from being his house-elf', 'Because she fears that house-elves are sources of Dark magic', 'Because she knows that Harry really conjured it', 'Because she senses that Voldemort is nearby', 'Because she knows that Mr. Crouch will fire her from being his house-elf', 4),
(39, 9, 'Why can\'t Harry enter the Triwizard Tournament?', 'Because he gets stomachaches whenever he is stressed', 'Because he must not pose a competitor for Fred and George Weasley', 'Because he is under the age of seventeen', 'Because he is suspected to have fired the Dark Mark', 'Because he is under the age of seventeen', 4),
(40, 10, 'How does Harry get past the Hungarian Horntail?', 'On a hippogriff', 'Under his Invisibility cloak', 'By cursing the dragon\'s eyes', 'On his broomstick', 'On his broomstick', 4),
(41, 1, 'Who or what attacks Harry in the alleyway in Little Whinging?', 'Hoodlums', 'Death Eaters', 'Draco Malfoy', 'Dementors', 'Dementors', 5),
(42, 2, 'Who else could the prophecy have referred to?', 'Ron', 'Neville', 'Hermione', 'Luna Lovegood', 'Neville', 5),
(43, 3, 'What kills Mr. Bode?', 'Torture', 'Death Eaters', 'Devil’s Snare', 'The Crucio curse', 'Devil’s Snare', 5),
(44, 4, 'Who can see thestrals?', 'Members of Gryffindor', 'Centaurs', 'People who have witnessed death', 'Aurors', 'People who have witnessed death', 5),
(45, 5, 'Who is selected to replace Harry as Quidditch Seeker?', 'Seamus', 'Ginny', 'Neville', 'Ron', 'Ginny', 5),
(46, 6, 'What gift does Sirius give Harry, instructing him to use it if he needs Sirius?', 'A ticket home', 'A mirror', 'A crystal ball', 'His journal', 'A mirror', 5),
(47, 7, 'What happens to Marietta when she tells Umbridge about the D.A.?', 'She loses her ability to speak', 'Her hair falls out', 'She dies', 'The word SNEAK appears on her face', 'The word SNEAK appears on her face', 5),
(48, 8, 'What skill does Voldemort have that makes learning Occlumency so important for Harry?', 'Potions', 'Animagus', 'Legilimency', 'Dark Arts', 'Legilimency', 5),
(49, 9, 'Who suggests that Ron should sever all ties with Harry?', 'Percy', 'Mr. Weasley', 'Mrs. Weasley', 'Hermione', 'Percy', 5),
(50, 10, 'Who is Kreacher’s true master?', 'Dumbledore', 'Bellatrix Lestrange', 'Harry', 'Sirius', 'Sirius', 5),
(51, 1, 'What does Horace Slughorn teach?', 'Defense Against the Dark Arts', 'Divination', 'Potions', 'Transfiguration', 'Potions', 6),
(52, 2, 'Who does Hagrid bury in his backyard?', 'Witherwings', 'Gwarp', 'Lucius Malfoy', 'Aragog', 'Aragog', 6),
(53, 3, 'What potion brings its user unusually good luck?', 'Felix Felicis', 'Polyjuice Potion', 'Veritaserum', 'Amortentia', 'Felix Felicis', 6),
(54, 4, 'Whom does Ron date briefly?', 'Hermione Granger', 'Luna Lovegood', 'Lavender Brown', 'Romilda Vane', 'Lavender Brown', 6),
(55, 5, 'How many times has Dumbledore been offered the position of Minister of Magic?', 'Once', 'Twice', 'Three times', 'Never', 'Three times', 6),
(56, 6, 'What does Harry slip into Ron’s drink the morning of his first Quidditch match?', 'Mead', 'Polyjuice Potion', 'Felix Felicis', 'Nothing', 'Nothing', 6),
(57, 7, 'Who is the Half-Blood Prince?', 'Remus Lupin', 'Snape', 'Dumbledore', 'James Potter', 'Snape', 6),
(58, 8, 'Who is the captain of the Gryffindor Quidditch team?', 'Dean Thomas', 'Harry Potter', 'Katie Bell', 'Ron Weasley', 'Harry Potter', 6),
(59, 9, 'What does Romilda Vane spike with a love potion?', 'Pumpkin juice', 'Pudding', 'Butterbeer', 'Chocolate Cauldrons', 'Chocolate Cauldrons', 6),
(60, 10, 'Which House Elf does Harry inherent from his godfather, Sirius Black?', 'Kreacher', 'Hokey', 'Dobby', 'Teddy', 'Kreacher', 6),
(61, 1, 'Why does Harry accuse Remus Lupin of being a coward?', 'Because Remus wants the Deathly Hallows', 'Because Remus wants to abandon his child', 'Because Remus publicly denies that he’s a werewolf', 'Because Remus refuses to marry Tonks', 'Because Remus wants to abandon his child', 7),
(62, 2, 'Who is R.A.B.?', 'Dumbledore’s brother', 'Sirius Black’s brother', 'Snape', 'Voldemort’s younger self', 'Sirius Black’s brother', 7),
(63, 3, 'According to legend, what would a person become if he could assemble the Deathly Hallows?', 'Invincible', 'Ruler of the world', 'Infinitely wise', 'Master of death', 'Master of death', 7),
(64, 4, 'What is written on Harry’s parents’ gravestone?', 'In loving memory', 'The last enemy that shall be destroyed is death.', 'I open at the close', 'Where your treasure is, there shall your heart be also.', 'The last enemy that shall be destroyed is death.', 7),
(65, 5, 'Why does Voldemort seek the Elder Wand?', 'To complete the Deathly Hallows', 'To resurrect his parents', 'To make the final Horcrux', 'To defeat Harry in a duel', 'To defeat Harry in a duel', 7),
(66, 6, 'Where did Dumbledore’s family live?', 'Grimmauld Place', 'Godric’s Hollow', 'Hogsmeade Village', 'The Forest of Dean', 'Godric’s Hollow', 7),
(67, 7, 'Who of the following is not a member of Dumbledore’s Army?', 'Remus Lupin', 'Luna Lovegood', 'Ginny Weasley', 'Neville Longbottom', 'Remus Lupin', 7),
(68, 8, 'What is inside the Snitch that Dumbledore leaves Harry?', 'Nothing', 'Snape’s final memories', 'The Resurrection Stone', 'The locket Horcrux', 'The Resurrection Stone', 7),
(69, 9, 'Which is Dumbledore’s greatest regret?', 'Helping his mother imprison his sister', 'Not telling Harry that Harry had to die', 'Trusting Snape', 'Helping Gellert Grindelwald', 'Helping Gellert Grindelwald', 7),
(70, 10, 'Whose mail did Snape open?', 'Harry’s Aunt Petunia’s', 'Harry’s', 'Harry’s mother Lily’s', 'Dumbledore’s', 'Harry’s Aunt Petunia’s', 7);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `Serial` int(11) NOT NULL,
  `Username` varchar(220) NOT NULL,
  `Email` varchar(220) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Password` varchar(220) NOT NULL,
  `cfm_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`Serial`, `Username`, `Email`, `Phone`, `Password`, `cfm_user`) VALUES
(80, 'Asit', 'asittrivedi.aa@gmail.com', '9099585759', '$2y$10$If5ICcK3HdO8g48e97lxCOPcxuL6f5Lzgo7dWy74atn6JWLGsnNvG', 822126),
(71, 'Devam Trivedi', 'devamtrivedi.112@gmail.com', '9099585759', '$2y$10$rIThiTVuJgajO955SlrxRe8k7x9oE9nooG0NGFoUQDp0r2TCQMaKm', 467132),
(77, 'Jon Snow', 'jsgot.1098@gmail.com', '9099585759', '$2y$10$kpenQpTCpTorQn96U4/OKOY1pkPEpSRh.X1.F0yuHV29myYjDr/.K', 614748);

-- --------------------------------------------------------

--
-- Table structure for table `sellerlog`
--

CREATE TABLE `sellerlog` (
  `Serial` int(11) NOT NULL,
  `Username` varchar(220) NOT NULL,
  `Email` varchar(220) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Password` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellerlog`
--

INSERT INTO `sellerlog` (`Serial`, `Username`, `Email`, `Phone`, `Password`) VALUES
(9, 'Devam Trivedi', 'devamtrivedi.112@gmail.com', '9099585759', '$2y$10$0UPLcE9F0pPeYX8C2BMXseuaV6jYX4h/jOs0d/BA6aTDmat3sptHS'),
(10, 'Dhrumil Kadchha', 'punisherfrank1990@gmail.com', '8758372245', '$2y$10$B5qj/VqRasNUprbQisnHBOXXYSSCGdPDfKuECq6qnrQQZMYFC3nTC'),
(11, 'Het Shah', 'hetanshshah2111@gmail.com', '', '$2y$10$pYUfzXjpMiri.Ch6twYYkOvW7NHWrKrvuxR79CFIU.BrkSWi8u9Gq');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `Email` varchar(220) NOT NULL,
  `Code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`Email`, `Code`) VALUES
('jsgot.1098@gmail.com', 2371);

-- --------------------------------------------------------

--
-- Table structure for table `user_res`
--

CREATE TABLE `user_res` (
  `Email` varchar(220) NOT NULL,
  `Score` int(2) NOT NULL,
  `Attempts` int(2) NOT NULL,
  `Status` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_res`
--

INSERT INTO `user_res` (`Email`, `Score`, `Attempts`, `Status`) VALUES
('', 3, 1, 'Fail'),
('', 3, 1, 'Fail'),
('', 0, 2, 'Fail'),
('', 0, 2, 'Fail'),
('', 0, 3, 'Fail'),
('', 0, 1, 'Fail'),
('', 0, 1, 'Fail'),
('', 0, 2, 'Fail'),
('', 0, 2, 'Fail'),
('', 0, 3, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 1, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 1, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 2, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 2, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 3, 'Fail'),
('', 0, 1, 'Fail'),
('', 0, 1, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 1, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 1, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 2, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 2, 'Fail'),
('devamtrivedi.112@gmail.com', 0, 3, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `id` int(3) NOT NULL,
  `Email` varchar(220) NOT NULL,
  `Book_Name` varchar(220) NOT NULL,
  `Author` varchar(220) NOT NULL,
  `ISBN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`id`, `Email`, `Book_Name`, `Author`, `ISBN`) VALUES
(293, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(294, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(295, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(296, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(297, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(298, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(299, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(300, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(301, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(302, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(303, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(304, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(305, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(306, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(307, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(308, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(309, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(310, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(311, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(312, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(313, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(314, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(315, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(316, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(317, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(318, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(319, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(320, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(321, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(322, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(323, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(324, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(325, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(326, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(327, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(328, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(329, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(330, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(331, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(332, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(333, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(334, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(335, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(336, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(337, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(338, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(339, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(340, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(341, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(342, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(343, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(344, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(345, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(346, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(347, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(348, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(349, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(350, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(351, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(352, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(353, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(354, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(355, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(356, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(357, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(358, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(359, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(360, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(361, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(362, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(363, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(364, 'devamtrivedi.112@gmail.com', '', 'J.K Rowling', '978-1-78110-647-7'),
(365, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(366, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(367, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(368, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(369, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(370, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(371, 'devamtrivedi.112@gmail.com', '', 'J.K Rowling', '978-1-78110-647-7'),
(372, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(373, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(374, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(375, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(376, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(377, 'devamtrivedi.112@gmail.com', '', 'J.K Rowling', '978-1-78110-647-7'),
(378, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(379, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(380, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(381, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(382, 'devamtrivedi.112@gmail.com', '', 'J.K Rowling', '978-1-78110-647-7'),
(383, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(384, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(385, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(386, 'devamtrivedi.112@gmail.com', '', 'J.K Rowling', '978-1-78110-647-7'),
(387, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(388, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(389, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(390, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(391, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(392, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(393, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(394, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(395, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', 'J.K Rowling', '978-1-78110-647-7'),
(396, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', '', ''),
(397, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', '', ''),
(398, 'devamtrivedi.112@gmail.com', 'Harry Potter and The Deathly Hallows', '', ''),
(399, 'asittrivedi.aa@gmail.com', 'Harry Potter and The Deathly Hallows', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book1`
--
ALTER TABLE `book1`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `claimed`
--
ALTER TABLE `claimed`
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`Serial`);

--
-- Indexes for table `quesans`
--
ALTER TABLE `quesans`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `bid` (`book_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Serial` (`Serial`);

--
-- Indexes for table `sellerlog`
--
ALTER TABLE `sellerlog`
  ADD PRIMARY KEY (`Serial`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `Serial` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quesans`
--
ALTER TABLE `quesans`
  MODIFY `ques_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sellerlog`
--
ALTER TABLE `sellerlog`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claimed`
--
ALTER TABLE `claimed`
  ADD CONSTRAINT `Email` FOREIGN KEY (`Email`) REFERENCES `records` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
