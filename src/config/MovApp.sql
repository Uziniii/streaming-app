/*==============================================================*/
/* Nom de SGBD : MySQL 5.0                                      */
/* Date de création : 12/12/2023 14:35:49                         */
/*==============================================================*/

DROP TABLE IF EXISTS movies;

DROP TABLE IF EXISTS profiles;

DROP TABLE IF EXISTS watch_details;

/*==============================================================*/
/* Table : movies                                                */
/*==============================================================*/
CREATE TABLE movies
(
   movie_id             INT NOT NULL AUTO_INCREMENT,
   movie_file           VARCHAR(255),
   movie_title          VARCHAR(100),
   movie_poster         VARCHAR(255),
   movie_backdrop       VARCHAR(255),
   movie_length         INT,
   PRIMARY KEY (movie_id)
);

/*==============================================================*/
/* Table : profiles                                              */
/*==============================================================*/
CREATE TABLE profiles
(
   profile_id            INT NOT NULL AUTO_INCREMENT,
   profile_name          VARCHAR(50),
   PRIMARY KEY (profile_id)
);

/*==============================================================*/
/* Table : watch_details                                         */
/*==============================================================*/
CREATE TABLE watch_details
(
   watch_details_id     INT NOT NULL AUTO_INCREMENT,
   movie_id             INT NOT NULL,
   profile_id            INT NOT NULL,
   watch_details_time   INT,
   watch_details_liked  BOOLEAN,
   watch_details_watched BOOLEAN,
   PRIMARY KEY (watch_details_id),
   CONSTRAINT fk_concern FOREIGN KEY (movie_id) REFERENCES movies (movie_id) ON DELETE RESTRICT ON UPDATE RESTRICT,
   CONSTRAINT fk_relating FOREIGN KEY (profile_id) REFERENCES profiles (profile_id) ON DELETE RESTRICT ON UPDATE RESTRICT
);
