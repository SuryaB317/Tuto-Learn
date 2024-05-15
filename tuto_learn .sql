-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230623.826b1c7aaf
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 01:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuto_learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('spvn', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` varchar(10) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `tid` varchar(10) NOT NULL,
  `rating` varchar(3) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `tutor_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `course_title`, `discription`, `tid`, `rating`, `tag`, `link`, `thumbnail`, `tutor_name`) VALUES
('CA101', 'Computer Science Basics', 'cs basic', 'TA003', '2', 'Programming', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/youtube_(WOLF)_krita.jpg', 'Senthil Kumar'),
('CA102', 'pthon', 'fhhb', 'TA01', '2', 'Web Development', 'knkn', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/img7.jpg', NULL),
('CA103', 'C Programming', 'C program is the high level programming langugage', '', '2', 'Programming', 'mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/daan-stevens-0kjNpxQ6dPQ-unsplash.jpg', ''),
('CA104', 'C Programming', 'C program is the high level programming langugage', '', '2', 'Programming', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/daan-stevens-0kjNpxQ6dPQ-unsplash.jpg', ''),
('CA105', 'Java Developments', 'Java And OOP', '', '2', 'Programming', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/wallpaperflare.com_wallpaper (1).jpg', ''),
('CA106', 'Maths Problem Solving', 'The Basic concpts on the maths and the realted problems', '', '2', 'Data Science', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/14868.jpg', ''),
('CA107', 'Divinging into Machine Learning Algorithms', 'ML is the advanced technology which replace humans', '', '2', 'Data Science', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/Little_Krishnan_krita.jpg', ''),
('CA108', 'Machine Learning', 'ML Videos', 'TA208', '2', 'Data Science', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/Annotation 2023-06-24 120430.png', 'Innocent'),
('CA109', 'Java Developments', 'java By innovent', 'TA208', '2', 'Programming', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/Pop-stick.png', 'Innocent'),
('CA110', 'Pyhton For Beginner', 'py begineers', '', '2', 'Programming', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/1699282312099.jpg', ''),
('CA202', 'C++ Programming', 'cpp is the high level programming language', 'TA637', '2', 'Programming', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/Profile_pic_Coat.png', ''),
('CA203', 'Flask course', 'Flask is the python framework which us used to for web devlepment. Create simple API.', 'TA417', '2', 'Web Development', 'https://youtu.be/mAtkPQO1FcA?si=mRKRoN-Iowk0zO2c', 'C:/xampp/htdocs/Webpage_Surya_0/img/thumbnail/youtube_(WOLF)_krita.jpg', 'Naveen Raja');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `enrollment_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled_courses`
--

INSERT INTO `enrolled_courses` (`enrollment_id`, `uid`, `cid`) VALUES
(8, 0, 0),
(9, 0, 0),
(10, 0, 0),
(11, 0, 0),
(12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_details`
--

CREATE TABLE `quiz_details` (
  `qid` int(11) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `question_number` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(55) NOT NULL,
  `option2` varchar(55) NOT NULL,
  `option3` varchar(55) NOT NULL,
  `option4` varchar(55) NOT NULL,
  `correct_option` int(11) NOT NULL,
  `code_snippet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_details`
--

INSERT INTO `quiz_details` (`qid`, `cid`, `question_number`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `code_snippet`) VALUES
(1, 'CA109', 1, 'What is the size of boolean variable?', '8', '16', '32', '64', 2, 'uploads/'),
(2, 'CA109', 2, 'What is the default value of byte variable?', '0.0', '0', 'null', 'not defined', 2, 'uploads/'),
(3, 'CA109', 3, 'Method Overriding is an example of...?', 'Dynaminc Binding', 'static binding', 'Both of them', 'None of them', 1, 'uploads/'),
(4, 'CA109', 4, 'What invokes a thread\'s run() method?', 'JVM involkes the thread\'s run() when the thread is init', 'Main application running in the thread', 'Start() method of the thread class.', 'None of the above', 1, 'uploads/'),
(5, 'CA109', 5, 'Java is desinged by', 'Dennis Ritchie', 'James Gosling', 'Charles Babbage', 'Guido van Rossum', 2, 'uploads/'),
(6, 'CA109', 6, 'Java influenced by', 'cpp', 'objective-c', 'ada', 'All the above', 1, 'uploads/'),
(7, 'CA109', 7, 'Which primitive type is for floating point decimals?', 'boolean', 'char', 'double', 'long', 3, 'uploads/'),
(8, 'CA109', 8, 'Which environment variable is used to set the java path?', 'MAVEN_Path', ' JavaPATH', 'JAVA', 'JAVA_HOME', 4, 'uploads/'),
(9, 'CA109', 9, 'Which of the following is not an OOPS concept in Java?', 'Polymorphism', 'Inheritance', 'Compilation', 'Encapsulation', 3, 'uploads/'),
(10, 'CA109', 10, 'What is not the use of “this” keyword in Java?', ' Referring to the instance variable when a local variab', ' Passing itself to the method of the same class', ' Passing itself to another method', 'Calling another constructor in constructor chaining', 2, 'uploads/'),
(11, 'CA203', 1, 'What is Flask?', '  A micro web framework for Python ', 'A database management system ', ' A front-end JavaScript framework ', 'A server-side scripting language', 1, 'uploads/'),
(12, 'CA203', 2, 'Which of the following is true about Flask?', ' It is a full-stack web framework', ' It is based on the MVC (Model-View-Controller) archite', ' It is not suitable for developing RESTful APIs', ' It is lightweight and easy to learn', 4, 'uploads/'),
(13, 'CA203', 3, 'What command is used to install Flask?', 'pip install django', ' pip install flask', 'npm install flask', 'pip install python-flask', 2, 'uploads/'),
(14, 'CA203', 4, 'Which of the following is the correct way to create a Flask application instance?', ' app = Flask.create_app(name)', 'app = create_app(name)', ' app = Flask(name)', 'app = flask(name)', 3, 'uploads/'),
(15, 'CA203', 5, 'What is the purpose of the Flask route decorator?', 'To define the endpoint URL and the HTTP methods for a v', ' To define the structure of the database', 'To handle user authentication', 'To define CSS styles for web pages', 1, 'uploads/'),
(16, 'CA203', 6, 'How do you define a route that accepts URL parameters in Flask?', '@app.route(\'/route/<parameter>\')', '@app.route(\'/route\', methods=[\'GET\'], params=[\'paramete', ' @app.route(\'/route\', params=[\'parameter\'])', '@app.route(\'/route\', params=[\'GET\', \'parameter\'])', 1, 'uploads/'),
(17, 'CA203', 7, 'Which of the following is used to render HTML templates in Flask?', 'render_template(\'template.html\')', ' return render(\'template.html\')', 'template(\'template.html\')', 'render(\'template.html\')', 1, 'uploads/'),
(18, 'CA203', 8, 'What is the purpose of Flask\'s request object?', 'To handle database queries', ' To store session data', ' To access incoming request data, such as form data or ', ' To handle file uploads', 3, 'uploads/'),
(19, 'CA203', 9, 'Which of the following is a Flask extension used for handling forms?', ' flask-wtf', 'flask-forms', ' flask-form', 'flask-request', 1, 'uploads/'),
(20, 'CA203', 10, 'How do you run a Flask application in debug mode?\r\n', 'app.run()', 'app.run(debug=True)', 'app.debug = True', 'app.run(debug=1)', 2, 'uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `edu` varchar(100) NOT NULL,
  `phno` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tid`, `name`, `edu`, `phno`, `email`, `password`) VALUES
('TA003', 'Senthil Kumar', 'Msc ComScience, M.ed', '989890768', 'senthil@gmail.com', 'sen123'),
('TA005', 'Xacier', 'Msc Maths', '978765644', 'xacier@gmail.com', '12345'),
('TA01', 'SURYA', 'MCA', '123467890', 'surya@gmail.com', '123'),
('TA208', 'Innocent', 'Mphil', '9876543210', 'inno@gmail.com', '1234'),
('TA417', 'Naveen Raja', 'MCA', '9080706050', 'raja@gmail.com', 'raja123'),
('TA729', 'Balaji', 'BCA', '78685868', 'balaji@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phno` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `phno`, `email`, `password`) VALUES
('UA002', 'f', '1', 'm@gmail.com', '202001'),
('UA003', 'Bala', '9942321102', 'bala@gmail.com', '123456'),
('UA004', 'Kumaran', '798865432', 'kumaran@gmail.com', 'kumaran123'),
('UA005', 'Raj kumar', '909908776', 'rajku@gamil.com', 'raj79'),
('UA006', 'Kalyani', '234322103', 'kal@gmial.com', '123jfa'),
('UA007', 'Sopy', '897655421', 'spoy23Beauty@gmail.com', 'spoy098%'),
('UA008', 'Maha Lakshmi', '768573210', 'maha@gmail.com', 'maha123'),
('UA009', 'Dahrshini', '676787983', 'dhar@gmail.com', '123456'),
('UA010', 'venkat', '7010256243', 'venkat@gmail.com', 'venkat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `quiz_details`
--
ALTER TABLE `quiz_details`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quiz_details`
--
ALTER TABLE `quiz_details`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
