CREATE TABLE quiz_questions
                   (
                    question_id int(15) NOT NULL auto_increment,
                    quiz_id int(15) not null,
                    question_number int(15)not null,
                    question VARCHAR(800) NOT NULL,
                    answer1  VARCHAR(800) NULL,
                    answer2  VARCHAR(800) NULL,
                    answer3  VARCHAR(800) NULL,
                    answer4  VARCHAR(800) NULL,
                    correct varchar(800) NULL,
                    
                    FOREIGN KEY (quiz_id)
				  REFERENCES quiz(quizid) ON DELETE CASCADE ON UPDATE CASCADE,
				 
                    
                    PRIMARY KEY (question_id)
                    );
