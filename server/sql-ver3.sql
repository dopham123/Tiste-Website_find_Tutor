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
    `tutor_profile_id` int(255) NOT NULL AUTO_INCREMENT,
    `experience` varchar(255), 
    `info` varchar(100), 
    `avatar_image` varchar(100) , 
    `profile_image` varchar(100) , 
    `user_id` int(10), 
    FOREIGN KEY(user_id) REFERENCES users(id)         
    ON DELETE CASCADE,
    PRIMARY KEY (tutor_profile_id) );


-- Tạo bảng comment
CREATE TABLE `comment` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `comment` varchar(255) NOT NULL,
    `commentatorID` int(10) NOT NULL, 
    `tutorID` int(10) NOT NULL,
    `date` datetime NOT NULL DEFAULT NOW(),
    CONSTRAINT FK_Commentator FOREIGN KEY (commentatorID) REFERENCES users(id),
    CONSTRAINT FK_Tutor FOREIGN KEY (tutorID) REFERENCES users(id),
    PRIMARY KEY (id) );

-- Tạo bảng contact-info
CREATE TABLE `contact_info` ( 
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(100) NOT NULL, 
    `last_name` varchar(100) NOT NULL, 
    `email` varchar(100) , 
    `phone_number` varchar(100) , 
    `message` varchar(200),
    PRIMARY KEY (id) );