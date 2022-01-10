CREATE TABLE `demo`.`mapservice` (
 `globalid` INT(10) NOT NULL , `id` INT(11) NOT NULL , `employeename` VARCHAR(255) NOT NULL ,
 `location` VARCHAR(255) NOT NULL , `skilllevel` INT(3) NOT NULL , `skillset` VARCHAR(1000) NOT NULL ,
 `submission_status` INT(3) NOT NULL , `bid_status` INT(3) NOT NULL , `agreed_status` INT(3) NOT NULL , `durationavailablefor` VARCHAR(255) NOT NULL ,
 `currentcompany` VARCHAR(255) NOT NULL , `language` VARCHAR(255) NOT NULL , `comments` VARCHAR(2000) NOT NULL ,
 `servicerequestcreatedon` TIMESTAMP(6) NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `mapservice` ADD PRIMARY KEY(`globalid`);

ALTER TABLE `mapservice` ADD `Created_by_userid` INT(11) NOT NULL AFTER `servicerequestcreatedon`;

