CREATE SCHEMA tasks_app;

CREATE TABLE tasks_app.tasks (
	id				SERIAL,
	task_content	TEXT,
	tag_id			INTEGER,
	done			BOOLEAN,
	creation_date	timestamp
);

CREATE TABLE tasks_app.tags (
	id				SERIAL,
	tag				VARCHAR(1000),
	color			VARCHAR(1000),
	creation_date	timestamp
);

ALTER TABLE tasks_app.tasks ADD PRIMARY KEY (id);
ALTER TABLE tasks_app.tags ADD PRIMARY KEY (id);
ALTER TABLE tasks_app.tasks ADD CONSTRAINT tag_id_fk FOREIGN KEY (tag_id) REFERENCES tasks_app.tags(id);
ALTER TABLE tasks_app.tasks ALTER COLUMN creation_date SET DEFAULT NOW();
ALTER TABLE tasks_app.tags ALTER COLUMN creation_date SET DEFAULT NOW();

INSERT INTO tasks_app.tags ( tag, color ) VALUES (
	'#Pacient 0 tag',
	'#3e95cc'
);

INSERT INTO tasks_app.tasks ( task_content, tag_id, done ) VALUES (
	'Pacient 0 task.',
	1,
	FALSE
);
