
CREATE TABLE courseregister (
  registration_id int(15) NOT NULL auto_increment,
  courseregister varchar(20) DEFAULT NULL,
  coursecode varchar(20) DEFAULT NULL,
  user_id varchar(20) NOT NULL,
  FOREIGN KEY (user_id)
  REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (coursecode)
  REFERENCES course(coursecode) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (registration_id)
                     

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `courseregister` (`registration_id`, `courseregister`, `coursecode`, `user_id`) VALUES
(1, NULL, 'd3456', '30582736'),
(2, NULL, 'gj456t', '30582736'),
(3, NULL, 'p32ty7', '30582736'),
(4, NULL, ' gj456t', 'thdt3'),
(5, NULL, 'd3456', 'thdt3'),
(6, NULL, ' p32ty7', 'thdt3'),
(7, NULL, 'th56f', 'thdt3');
