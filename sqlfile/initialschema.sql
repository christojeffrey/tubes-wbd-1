CREATE TABLE IF NOT EXISTS `User` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(256) NOT NULL,
    `password` varchar(256) NOT NULL,
    `username` varchar(265) NOT NULL,
    `is_admin` boolean NOT NULL DEFAULT false,
    PRIMARY KEY (`user_id`)
    );

CREATE TABLE IF NOT EXISTS `Album` (
    `album_id` int(11) NOT NULL AUTO_INCREMENT,
    `album_title` varchar(256) NOT NULL,
    `singer` varchar(128) NOT NULL,
    `total_duration` int(11) NOT NULL DEFAULT 0,
    `image_path` varchar(256) NOT NULL,
    `publish_date` date NOT NULL,
    `genre` varchar(256) NOT NULL,
    PRIMARY KEY (`album_id`)
    );

ALTER TABLE `Album` ADD UNIQUE `unique_index`(`album_title`, `singer`);

CREATE TABLE IF NOT EXISTS `Song` (
    `song_id` int(11) NOT NULL AUTO_INCREMENT,
    `song_title` varchar(256) NOT NULL,
    `singer` varchar(128) NOT NULL,
    `publish_date` date NOT NULL,
    `genre` varchar(64),
    `duration` int(11) NOT NULL,
    `audio_path` varchar(256) NOT NULL,
    `image_path` varchar(256),
    `album_id` int(11),
    PRIMARY KEY (`song_id`),
    FOREIGN KEY (`album_id`) REFERENCES `Album`(`album_id`) ON DELETE SET NULL
    );



-- create trigger
CREATE TRIGGER update_album_total_duration_on_insert
AFTER INSERT ON Song
FOR EACH ROW 
UPDATE Album 
SET total_duration = total_duration + NEW.duration
WHERE Album.album_id = NEW.album_id;

CREATE TRIGGER update_album_total_duration_on_delete
BEFORE DELETE ON Song
FOR EACH ROW 
UPDATE Album 
SET total_duration = total_duration - OLD.duration
WHERE Album.album_id = OLD.album_id;


    


-- insert intial data
-- insert admin
INSERT INTO `User` (`email`, `password`, `username`, `is_admin`) VALUES
('email@example.com', 'admin', 'admin', true);
-- insert user
INSERT INTO `User` (`email`, `password`, `username`, `is_admin`) VALUES
('email@user.com', 'user', 'user', false);