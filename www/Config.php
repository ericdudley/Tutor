<?php
/**
 * Created by PhpStorm.
 * Tutor: eric
 * Date: 9/11/17
 * Time: 6:31 PM
 */

class Config {
    const PATH_TO_SQLITE_FILE = '../main.sqlite3';
    const CREATE_TABLE_STRINGS = [
//        "DROP TABLE IF EXISTS Question;",
//        "DROP TABLE IF EXISTS Tutor;",
        "CREATE TABLE IF NOT EXISTS Tutor(
          username VARCHAR(20) PRIMARY KEY,
          name VARCHAR(40),
          last_active INTEGER
        );",
        "CREATE TABLE IF NOT EXISTS Question(
          id INTEGER PRIMARY KEY,
          username VARCHAR(20),
          name VARCHAR(40),
          clss VARCHAR(50),
          assn VARCHAR(50),
          qtext VARCHAR(256),
          FOREIGN KEY (username) REFERENCES Tutor(username)
          );"
    ];

}