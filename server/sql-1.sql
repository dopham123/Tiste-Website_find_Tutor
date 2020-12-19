CREATE DATABASE `web-ass-2`;
-- // Tạo bảng user login info

CREATE TABLE `users` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT, 
    `username` varchar(100) NOT NULL, 
    `email` varchar(100) NOT NULL, 
    `password` varchar(100) NOT NULL, 
    `user_type` varchar(100) NOT NULL , 
    PRIMARY KEY (id) );

-- // Tạo bảo user info

CREATE TABLE `users_info` ( 
    `user_info_id` int(10) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(100) NOT NULL, 
    `last_name` varchar(100) NOT NULL, 
    `gender` varchar(100) NOT NULL, 
    `phone_number` varchar(100) NOT NULL, 
    `address_1` varchar(100) NOT NULL, 
    `address_2` varchar(100),
    `district`varchar(100) NOT NULL,
    `city`  varchar(100) NOT NULL,
    `post_code` varchar(100) NOT NULL,
    `user_id` int(10), 
    FOREIGN KEY(user_id) REFERENCES users(id),
    PRIMARY KEY (user_info_id) );

CREATE TABLE `tutor_profile` ( 
    `tutor_profile_id` int(10) NOT NULL AUTO_INCREMENT,
    `experience` varchar(100) NOT NULL, 
    `info` varchar(100) NOT NULL, 
    `avatar_image` varchar(100) , 
    `profile_image` varchar(100) , 
    `user_id` int(10), 
    FOREIGN KEY(user_id) REFERENCES users(id),
    PRIMARY KEY (tutor_profile_id) );

INSERT INTO users (`id`, `username`, `email`, `password`, `user_type`) VALUES (11, "admin", "admin@gmail.com", "21232f297a57a5a743894a0e4a801fc3", "admin");

CREATE TABLE `contact_info` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(100) NOT NULL, 
    `last_name` varchar(100) NOT NULL, 
    `email` varchar(100) , 
    `phone_number` varchar(100) , 
    `message` varchar(200),
    PRIMARY KEY (id) );

CREATE TABLE `class_type` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL, 
    PRIMARY KEY (id) );
CREATE TABLE `grade` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL, 
    PRIMARY KEY (id) );
CREATE TABLE `tutor_type` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL, 
    PRIMARY KEY (id) );
CREATE TABLE `prices` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `min_price` int NOT NULL,
    `max_price` int NOT NULL,
    `class_typeID` int(10) NOT NULL, 
    `gradeID` int(10) NOT NULL,
    `tutor_typeID` int(10) NOT NULL,
    CONSTRAINT FK_ClassType FOREIGN KEY (class_typeID) REFERENCES class_type(id),
    CONSTRAINT FK_Grade FOREIGN KEY (gradeID) REFERENCES grade(id),
    CONSTRAINT FK_TutorType FOREIGN KEY (tutor_typeID) REFERENCES tutor_type(id),
    PRIMARY KEY (id) );
INSERT INTO `class_type`(`name`) VALUES ('Lớp 2 buổi/tuần');
INSERT INTO `grade`(`name`) VALUES ('Lớp 1-5');
INSERT INTO `tutor_type`(`name`) VALUES ('Toán');
INSERT INTO `prices`(`min_price`, `max_price`, `class_typeID`, `gradeID`, `tutor_typeID`) VALUES (500000, 1500000,1,1,1);

CREATE TABLE `comment` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `comment` varchar(100) NOT NULL,
    `commentatorID` int(10) NOT NULL, 
    `tutorID` int(10) NOT NULL,
    CONSTRAINT FK_Commentator FOREIGN KEY (commentatorID) REFERENCES users(id),
    CONSTRAINT FK_Tutor FOREIGN KEY (tutorID) REFERENCES users(id),
    PRIMARY KEY (id) );
