CREATE TABLE `demo`.`mapservice` (
 `globalid` INT(10) NOT NULL , `id` INT(11) NOT NULL , `employeename` VARCHAR(255) NOT NULL ,
 `location` VARCHAR(255) NOT NULL , `skilllevel` INT(3) NOT NULL , `skillset` VARCHAR(1000) NOT NULL ,
 `submission_status` INT(3) NOT NULL , `bid_status` INT(3) NOT NULL , `agreed_status` INT(3) NOT NULL , `durationavailablefor` VARCHAR(255) NOT NULL ,
 `currentcompany` VARCHAR(255) NOT NULL , `language` VARCHAR(255) NOT NULL , `comments` VARCHAR(2000) NOT NULL ,
 `servicerequestcreatedon` TIMESTAMP(6) NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `mapservice` ADD PRIMARY KEY(`globalid`);

ALTER TABLE `mapservice` ADD `Created_by_userid` INT(11) NOT NULL AFTER `servicerequestcreatedon`;

ALTER TABLE `mapservice` CHANGE `id` `mapid` INT(11) NOT NULL;

ALTER TABLE `mapservice` DROP `servicerequestcreatedon`;

ALTER TABLE `mapservice` ADD `profileuploadedon` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) AFTER `comments`, ADD `price` INT(10) NOT NULL AFTER `profileuploadedon`;

ALTER TABLE `mapservice` CHANGE `Created_by_userid` `created_by` VARCHAR(255) NOT NULL;

ALTER TABLE `mapservice` ADD `question` VARCHAR(2000) NOT NULL AFTER `created_by`, ADD `response` VARCHAR(2000) NOT NULL AFTER `question`;

UPDATE `mapservice` SET `created_by` = 'Testy Test' WHERE `mapservice`.`globalid` = 4789;

UPDATE `mapservice` SET `created_by` = 'Testy Test' WHERE `mapservice`.`globalid` = 4847;

UPDATE `mapservice` SET `mapid` = '114' WHERE `mapservice`.`globalid` = 4789;

ALTER TABLE `mapservice` DROP PRIMARY KEY;

ALTER TABLE `mapservice` ADD PRIMARY KEY(`mapid`);

ALTER TABLE `mapservice` MODIFY `mapid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `mapservice` CHANGE `mapid` `profileid` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mapservice` ADD `negotiateprice` INT(10) NOT NULL AFTER `price`;

ALTER TABLE `mapservice` ADD `employeeid` INT(10) NOT NULL AFTER `profileid`;



