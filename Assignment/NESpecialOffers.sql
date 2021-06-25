--
-- Creating the table structure for the table `NE_category`
--

DROP TABLE IF EXISTS `NE_category`;
CREATE TABLE IF NOT EXISTS `NE_category` (
  `catID` varchar(6) NOT NULL default '',
  `catDesc` varchar(30) default NULL,
  PRIMARY KEY  (`catID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Insert record data for the table NE_category`
--

INSERT INTO `NE_category` (`catID`, `catDesc`) VALUES
('c1', 'Carnival'),
('c2', 'Theatre'),
('c3', 'Comedy'),
('c4', 'Exhibition'),
('c5', 'Festival'),
('c6', 'Family'),
('c7', 'Music'),
('c8', 'Sport'),
('c9', 'Dance');

--
-- Creating the table structure for the table `NE_special_offers`
--

DROP TABLE IF EXISTS `NE_special_offers`;
CREATE TABLE IF NOT EXISTS `NE_special_offers` (
  `eventID` int(10) NOT NULL auto_increment,
  `eventTitle` varchar(256) NOT NULL,
  `eventDescription` varchar(256) default NULL,
  `venueID` varchar(6) default NULL,
  `catID` varchar(6) default NULL,
  `eventStartDate` date default NULL,
  `eventEndDate` date default NULL,
  `eventPrice` decimal(4,2) default NULL,
  PRIMARY KEY  (`eventID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Insert record data for the table `NE_special_offers`
--

INSERT INTO `NE_special_offers` (`eventID`, `eventTitle`, `eventDescription`, `venueID`, `catID`, `eventStartDate`, `eventEndDate`, `eventPrice`) VALUES
(1, 'JLS Evolution Tour', 'JLS have announced a reunion UK arena tour returning to the Utilita Arena Newcastle. Since JLS came second on X Factor in 2008, they have been one of the most successful acts in the history of the show.', 'v7', 'c7', '2020-12-12', '2020-12-12', '20.00'),
(2, 'A Christmas Carol', 'Visit the three ghosts of Christmas this November as the PLAYHOUSE Whitley Bay kicks off the festive season with a fantastic Disney-esque musical production of A Christmas Carol.', 'v9', 'c6', '2020-11-25', '2020-11-26', '11.50'),
(3, 'Carmen presented by Russian State Ballet and Opera House', 'Performed to a Large Live Orchestra. Carmen is an Opera in four acts by a French composer Georges Bizet, which has become one of the best-known plots with the most memorable music.', 'v8', 'c2', '2020-03-03', '2020-03-03', '20.00'),
(4, 'Harlem Globetrotters', 'The world famous Harlem Globetrotters will take fan interaction to a new level when the "Fans Rule" World Tour comes to UK.\r\nOnline voting is now open at harlemglobetrotters.com/rule where all fans can choose which new game-changing rules they want to see.', 'v7', 'c8', '2020-04-09', '2020-04-09', '10.00'),
(5, 'Mamma Mia!','Set on a Greek island paradise, a story of love, friendship and identity is cleverly told through the timeless songs of Abba.', 'v1', 'c7','2020-03-28','2020-04-05','14.00'),
(6, 'Elmer and Friends: The Colourful World of David McKee Exhibition at Seven Stories', 'ELMER and Friends: The Colourful World of David McKee to celebrate 30 years of Elmer the Patchwork Elephant.', 'v11', 'c4', '2020-02-09', '2021-02-08', '3.50'),
(7, 'Les Misérables at Theatre Royal Newcastle', 'Cameron Mackintosh''s acclaimed Broadway production of Boublil and Schönberg''s musical Les Misérables will play Newcastle Theatre Royal.', 'v1', 'c2', '2020-08-16', '2020-10-06', '15.50'),
(8, 'The 1985 World Snooker Final', 'The 1985 World Snooker Final', 'v9', 'c8', '2020-09-19', '2020-09-19', '12.10');








