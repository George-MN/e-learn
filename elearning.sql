
CREATE TABLE course
                   (
                    coursename VARCHAR(50) NOT NULL,
                    coursecode VARCHAR(20) NOT NULL,
                    duration VARCHAR(20) NOT NULL,
                    testNo int(10),
                    coursetype VARCHAR(50) ,
                    PRIMARY KEY (coursecode)
                    );
CREATE TABLE users
                    (
                     user_id VARCHAR(20) NOT NULL,
                     email VARCHAR(500) NOT NULL,
                     username VARCHAR(30),
                     usertype int(10) NOT NULL,
                     password VARCHAR(25) NOT NULL,
                     photopath varchar(100),
                     PRIMARY KEY (user_id)
                    );
CREATE TABLE courseregister
                    (
                     registration_id int(15) not null auto_increment,
                     coursecode1 varchar(20),
                     coursecode2 varchar(20),
                     coursecode3 varchar(20),
                     coursecode4 varchar(20),
                     coursecode5 varchar(20), 
                     user_id VARCHAR(20) NOT NULL,
                     
                     FOREIGN KEY (user_id)
                     REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
                     
                     PRIMARY KEY (registration_id)
                    );

CREATE TABLE topic
                   (
                    topicid int(15) NOT NULL auto_increment,
                    topicname VARCHAR(20) NOT NULL,
                    topicauthor VARCHAR(50) NOT NULL,
                    coursecode VARCHAR(20) NOT NULL,
                    topicnumber int(20) NOT NULL,
                    
                    FOREIGN KEY (coursecode)
                    REFERENCES course(coursecode) ON DELETE CASCADE ON UPDATE CASCADE,
                    PRIMARY KEY (topicid)
                    );

CREATE TABLE video
                    (
                     topicid int(15) NOT NULL,
                     videoid int(10) NOT NULL auto_increment,
                     videopath VARCHAR(100) NOT NULL,
                     size VARCHAR(50) NOT NULL,
                     
                     FOREIGN KEY (topicid)
                     REFERENCES topic(topicid) ON DELETE CASCADE ON UPDATE CASCADE,
                     PRIMARY KEY(videoid)
                    );
CREATE TABLE audio
                    (
                     topicid int(15) NOT NULL,
                     audioid int(10) NOT NULL auto_increment,
                     audiopath VARCHAR(100) NOT NULL,
                     size VARCHAR(50) NOT NULL,
                     
                     FOREIGN KEY (topicid)
                     REFERENCES topic(topicid) ON DELETE CASCADE ON UPDATE CASCADE,
                     PRIMARY KEY(audioid)
                    );
CREATE TABLE pdf
                    (
                     topicid int(15) NOT NULL,
                     pdfid int(10) NOT NULL auto_increment,
                     pdfpath VARCHAR(100) NOT NULL,
                     size VARCHAR(50) NOT NULL,
                     
                     FOREIGN KEY (topicid)
                     REFERENCES topic(topicid) ON DELETE CASCADE ON UPDATE CASCADE,
                     PRIMARY KEY(pdfid)
                    );
CREATE TABLE text
                    (
                     topicid int(15) NOT NULL,
                     textid int(10) NOT NULL auto_increment,
                     textpath VARCHAR(100) NOT NULL,
                     size VARCHAR(50) NOT NULL,
                     
                     FOREIGN KEY (topicid)
                     REFERENCES topic(topicid) ON DELETE CASCADE ON UPDATE CASCADE,
                     PRIMARY KEY(textid)
                    );
CREATE TABLE session
                    (
                     sessionid int(20) NOT NULL auto_increment,
                     topicid VARCHAR(50) NOT NULL,
                     coursecode VARCHAR(5000) NOT NULL,
                     topicnumber int(20) NOT NULL,
                     user_id varchar(20) not null,
                     
                    
                     PRIMARY KEY(sessionid)
                    );



CREATE TABLE quiz
                    (
                    quizid int(20) NOT NULL auto_increment,
                    quizname VARCHAR(10) NOT NULL,
                    num_questions int(10) NOT NULL,
                    timeallowed VARCHAR(10) NOT NULL,
                    topicid int(15) NOT NULL,
                    maxscore VARCHAR(20) NOT NULL,
                   
                    FOREIGN KEY (topicid)
                    REFERENCES topic(topicid) ON DELETE CASCADE ON UPDATE CASCADE,
                    
                    PRIMARY KEY (quizid)

                    );

CREATE TABLE quizscore
                    (
                     quizscoretid int(20) NOT NULL auto_increment,
                     user_id VARCHAR(50) NOT NULL,
                     quizid int(20) NOT NULL,
                     score VARCHAR(10) NOT NULL,
                     FOREIGN KEY (quizid)
                     REFERENCES quiz(quizid) ON DELETE CASCADE ON UPDATE CASCADE,
                     FOREIGN KEY (user_id)
                     REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
                     PRIMARY KEY (quizscoretid)
                    );
CREATE TABLE test
                    (
                    testid int(20) NOT NULL auto_increment,
                    testname VARCHAR(10) NOT NULL,
                    num_questions int(10) NOT NULL,
                    timeallowed VARCHAR(10) NOT NULL,
                    coursecode VARCHAR(20) NOT NULL,
                    maxscore VARCHAR(20) NOT NULL,
                   
                    FOREIGN KEY (coursecode)
                    REFERENCES course(coursecode) ON DELETE CASCADE ON UPDATE CASCADE,
                    
                    PRIMARY KEY (testid)

                    );

CREATE TABLE testscore
                    (
                     testscoretid int(20) NOT NULL auto_increment,
                     user_id VARCHAR(50) NOT NULL,
                     testid int(20) NOT NULL,
                     score VARCHAR(10) NOT NULL,
                     FOREIGN KEY (testid)
                     REFERENCES test(testid) ON DELETE CASCADE ON UPDATE CASCADE,
                     FOREIGN KEY (user_id)
                     REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
                     PRIMARY KEY (testscoretid)
                    );




CREATE TABLE progress
                    (
                     progressid int(15) not null auto_increment,
                     user_id VARCHAR(20) NOT NULL,
                     coursesdone VARCHAR(50) NOT NULL,
                     testsdone VARCHAR(10) NOT NULL,
                     calprogress VARCHAR(10) NOT NULL,
                     FOREIGN KEY (user_id)
                     REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
                     
                     PRIMARY KEY (progressid)
                    );

-- CREATE TABLE chat
--                     (
                    
--                     );
