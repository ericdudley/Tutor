<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 9/11/17
 * Time: 6:31 PM
 */

class Config {
    const PATH_TO_SQLITE_FILE = 'main.sqlite3';
    const CREATE_TABLE_STRINGS = [
        "DROP TABLE IF EXISTS Question;",
        "DROP TABLE IF EXISTS User;",
        "CREATE TABLE IF NOT EXISTS User(
          username VARCHAR(20) PRIMARY KEY,
          name VARCHAR(40),
          isTutor INTEGER
        );",
        "CREATE TABLE IF NOT EXISTS Question(
          id INTEGER PRIMARY KEY,
          user VARCHAR(20),
          clss VARCHAR(50),
          assn VARCHAR(50),
          text VARCHAR(256),
          FOREIGN KEY (user) REFERENCES User(username)
          );"
    ];

}