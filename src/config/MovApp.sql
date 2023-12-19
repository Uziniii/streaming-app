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
   profil_id            INT NOT NULL AUTO_INCREMENT,
   profil_name          VARCHAR(50),
   PRIMARY KEY (profil_id)
);

/*==============================================================*/
/* Table : watch_details                                         */
/*==============================================================*/
CREATE TABLE watch_details
(
   watch_details_id     INT NOT NULL AUTO_INCREMENT,
   movie_id             INT NOT NULL,
   profil_id            INT NOT NULL,
   watch_details_time   INT,
   watch_details_liked  BOOLEAN,
   watch_details_watched BOOLEAN,
   PRIMARY KEY (watch_details_id),
   CONSTRAINT fk_concern FOREIGN KEY (movie_id) REFERENCES movies (movie_id) ON DELETE RESTRICT ON UPDATE RESTRICT,
   CONSTRAINT fk_relating FOREIGN KEY (profil_id) REFERENCES profiles (profil_id) ON DELETE RESTRICT ON UPDATE RESTRICT
);
