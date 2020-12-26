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
    `first_name` varchar(100), 
    `last_name` varchar(100), 
    `gender` varchar(100), 
    `phone_number` varchar(100), 
    `address_1` varchar(100), 
    `address_2` varchar(100),
    `district`varchar(100),
    `city`  varchar(100),
    `post_code` varchar(100),
    `user_id` int(10), 
    FOREIGN KEY(user_id) REFERENCES users(id)
    ON DELETE CASCADE,
    PRIMARY KEY (user_info_id) );

CREATE TABLE `tutor_profile` ( 
    `tutor_profile_id` int(10) NOT NULL AUTO_INCREMENT,
    `experience` varchar(100), 
    `info` varchar(100), 
    `avatar_image` varchar(100) , 
    `profile_image` varchar(100) , 
    `user_id` int(10), 
    FOREIGN KEY(user_id) REFERENCES users(id)         
    ON DELETE CASCADE,
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

-- --------------------------------------------------------------------------------------------------------------------
-- ----------Fix service + Insert tutor_profile, users------------------------------------------------------------------------
-- --------------------------------------------------------------------------------------------------------------------

-- bảng service xóa bớt cột: img, exp, intro. Thêm vào cột check_accept.
CREATE TABLE `service` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `subject` varchar(100) NOT NULL, 
    `class` varchar(100) NOT NULL, 
    `salary` varchar(100) NOT NULL, 
    `num_of_std` int(10) NOT NULL,
    `star` float(10)  DEFAULT 0,
    `eval` int(10)  DEFAULT 0,
    `user_if_id` int(10), 
    `check_accept` int(10) DEFAULT 2,
    FOREIGN KEY(user_if_id) REFERENCES users(id),
    PRIMARY KEY (id) );

-- Password: 12345
INSERT INTO `users` (`username`, `email`, `password`, `user_type`) VALUES
    ('dopham', 'phamvandob14@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tutor'),
    ('lautruong', 'lau@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tutor'),
    ('lucle', 'luc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tutor'),
    ('khoipham', 'khoi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tutor'),
    ('admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

-- Khúc này lúc insert vô để ý cái user_if_id là khóa ngoại, coi thử cái user_if_id thêm vào đã có trong bảng user chưa 
INSERT INTO `service` (`id`, `subject`, `class`, `salary`, `num_of_std`, `star`, `eval`, `user_if_id`, `check_accept`) VALUES 
    ('1', 'Toán - Lý - Hóa', '1 - 3', '2', '9', '5', '7', '2', '1'),
    ('2', 'Toán - Tiếng Anh', '6 - 9', '2.5', '12', '4.5', '14', '3', '1'),
    ('3', 'Giáo Dục Công Dân', '10 - 12', '2', '50', '5', '44', '1', '1'),
    ('4', 'Toán-Văn', '4 - 5', '2.5', '10', '4.5', '20', '4', '1');
--  Đại học Bách Khoa TP.HCM - Vui vẻ, hoạt bát, năng động, cách giảng dạy sáng tạo.

INSERT INTO `tutor_profile` (`experience`, `info`, `avatar_image`, `profile_image`, `user_id`) VALUES 
    ('1', 'Đại học Bách Khoa TP.HCM - Vui vẻ, hoạt bát, năng động, cách giảng dạy sáng tạo.', '../../resource/img_avatar/lau.JPG', '../../resource/img_avatar/lau.JPG', '2'),
    ('2', 'Đại học Bách Khoa TP.HCM - Vui vẻ, hoạt bát, năng động, cách giảng dạy sáng tạo.', '../../resource/img_avatar/luc.JPG', '../../resource/img_avatar/luc.JPG', '3'),
    ('3', 'Đại học Bách Khoa TP.HCM - Vui vẻ, hoạt bát, năng động, cách giảng dạy sáng tạo.', '../../resource/img_avatar/do.jpg', '../../resource/img_avatar/do.jpg', '1'),
    ('4', 'Đại học Bách Khoa TP.HCM - Vui vẻ, hoạt bát, năng động, cách giảng dạy sáng tạo.', '../../resource/img_avatar/khoi.jpg', '../../resource/img_avatar/khoi.jpg', '4');

--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------

-- Khúc này thêm user đồ vào thôi, không cần cũng được
INSERT INTO `users_info` (`user_info_id`, `first_name`, `last_name`, `gender`, `phone_number`, `address_1`, `address_2`, `district`, `city`, `post_code`, `user_id`) VALUES ('2', 'Lâu', 'Trương', 'Nam', '12345', 'ádfg', 'ád', 'Thủ ĐỨc', 'HCM', '111', '2');
INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES ('3', 'lucle', 'luc@gmail.com', '12345', 'tutor');
INSERT INTO `users_info` (`user_info_id`, `first_name`, `last_name`, `gender`, `phone_number`, `address_1`, `address_2`, `district`, `city`, `post_code`, `user_id`) VALUES ('3', 'Lực', 'Lê', 'Nam', '1234567', 'qưert', 'tyui', 'Gò Vấp', 'HCM', '222', '3');
INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES ('4', 'khoipham', 'khoi@gmail.com', '12345', 'tutor');
INSERT INTO `users_info` (`user_info_id`, `first_name`, `last_name`, `gender`, `phone_number`, `address_1`, `address_2`, `district`, `city`, `post_code`, `user_id`) VALUES ('4', 'Khôi', 'Phạm', 'Nam', '1234567', 'jhvv', 'jgf', 'Bình Thạnh', 'HCM', '333', '4');
