CREATE TABLE assignment
                   (
                    assignmentid int(15) NOT NULL auto_increment,
                    topicid int(15) NOT NULL,
                    Assignmentname VARCHAR(50) NOT NULL,
                    assignment  VARCHAR(60000) NULL,
                    assignmentpath varchar(200) NULL,
                    
                    FOREIGN KEY (topicid)
                    REFERENCES topic(topicid) ON DELETE CASCADE ON UPDATE CASCADE,
                    PRIMARY KEY (assignmentid)
                    );
CREATE TABLE assignmentsub
                   (
                    assignmentsubid int(15) NOT NULL auto_increment,
                    assignmentid int(15) NOT NULL,
                    userid varchar(20) NOT NULL,
                    Assignmentsubname VARCHAR(50) NOT NULL,
                    assignmentsub  VARCHAR(60000) NULL,
                    assignmentsubpath varchar(200) NULL,
                    
                    FOREIGN KEY (assignmentid)
                    REFERENCES assignment(assignmentid) ON DELETE CASCADE ON UPDATE CASCADE,
                    FOREIGN KEY (userid)
                    REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
                    PRIMARY KEY (assignmentsubid)
                    );