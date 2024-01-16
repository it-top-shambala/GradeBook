-- Database: gradebook_db
DROP DATABASE IF EXISTS gradebook_db;
CREATE DATABASE gradebook_db
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LOCALE_PROVIDER = 'libc'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

-- SCHEMA: public
DROP SCHEMA IF EXISTS public;
CREATE SCHEMA IF NOT EXISTS public
    AUTHORIZATION pg_database_owner;
COMMENT ON SCHEMA public
    IS 'standard public schema';
GRANT USAGE ON SCHEMA public TO PUBLIC;
GRANT ALL ON SCHEMA public TO pg_database_owner;

-- TABLES
CREATE TABLE table_groups
(
    id   SERIAL NOT NULL PRIMARY KEY,
    name TEXT   NOT NULL
);
COMMENT ON TABLE table_groups IS 'Таблица учебных групп';

CREATE TABLE table_subjects
(
    id   SERIAL NOT NULL PRIMARY KEY,
    name TEXT   NOT NULL
);

CREATE TABLE table_marks
(
    id   SERIAL NOT NULL PRIMARY KEY,
    mark TEXT   NOT NULL
);

CREATE TABLE table_persons
(
    id            BIGSERIAL NOT NULL PRIMARY KEY,
    last_name     TEXT      NOT NULL,
    first_name    TEXT      NOT NULL,
    date_of_birth DATE      NOT NULL
);

CREATE TABLE table_students
(
    id        SERIAL  NOT NULL PRIMARY KEY,
    person_id INTEGER NOT NULL,
    group_id  INTEGER NOT NULL,
    FOREIGN KEY (person_id) REFERENCES table_persons (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    FOREIGN KEY (group_id) REFERENCES table_groups (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

CREATE TABLE table_teachers
(
    id        SERIAL  NOT NULL PRIMARY KEY,
    person_id INTEGER NOT NULL,
    FOREIGN KEY (person_id) REFERENCES table_persons (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

CREATE TABLE table_teacher_subjects
(
    id         SERIAL  NOT NULL PRIMARY KEY,
    teacher_id INTEGER NOT NULL,
    subject_id INTEGER NOT NULL,
    FOREIGN KEY (teacher_id) REFERENCES table_teachers (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    FOREIGN KEY (subject_id) REFERENCES table_subjects (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

CREATE TABLE table_lessons
(
    id         SERIAL  NOT NULL PRIMARY KEY,
    subject_id INTEGER NOT NULL,
    number     INTEGER NOT NULL,
    title      TEXT    NOT NULL,
    FOREIGN KEY (subject_id) REFERENCES table_subjects (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

CREATE TABLE table_student_marks
(
    id         SERIAL  NOT NULL PRIMARY KEY,
    date       DATE    NOT NULL DEFAULT CURRENT_DATE,
    student_id INTEGER NOT NULL,
    teacher_id INTEGER NOT NULL,
    lesson_id  INTEGER NOT NULL,
    mark_id    INTEGER NOT NULL,
    FOREIGN KEY (student_id) REFERENCES table_students (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    FOREIGN KEY (teacher_id) REFERENCES table_teachers (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    FOREIGN KEY (lesson_id) REFERENCES table_lessons (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    FOREIGN KEY (mark_id) REFERENCES table_marks (id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- VIEWS
CREATE VIEW view_students AS
SELECT table_students.id AS id,
       last_name,
       first_name,
       table_groups.name AS group_name,
       date_of_birth
FROM table_students
         JOIN table_persons
              ON table_students.person_id = table_persons.id
         JOIN table_groups
              ON table_students.group_id = table_groups.id;

CREATE VIEW view_teachers AS
SELECT table_teachers.id AS id,
       last_name,
       first_name,
       date_of_birth
FROM table_teachers
         JOIN table_persons
              ON table_teachers.person_id = table_persons.id;

CREATE VIEW view_teacher_subjects AS
SELECT table_teacher_subjects.id             AS id,
       concat_ws(' ', last_name, first_name) AS teacher_name,
       table_subjects.name                   AS subject
FROM table_teacher_subjects
         JOIN view_teachers
              ON table_teacher_subjects.teacher_id = view_teachers.id
         JOIN table_subjects
              ON table_teacher_subjects.subject_id = table_subjects.id;

CREATE VIEW view_lessons AS
SELECT table_lessons.id    AS id,
       table_subjects.name AS subject,
       number,
       title
FROM table_lessons
         JOIN table_subjects ON table_lessons.subject_id = table_subjects.id;

CREATE VIEW view_student_marks AS
SELECT table_student_marks.id                                            AS id,
       date,
       concat_ws(' ', view_students.last_name, view_students.first_name) AS student_name,
       concat_ws(' ', view_teachers.last_name, view_teachers.first_name) AS teacher_name,
       subject,
       number                                                            AS lesson_number,
       title                                                             AS lesson_title,
       mark
FROM table_student_marks
         JOIN view_students
              ON table_student_marks.student_id = view_students.id
         JOIN view_teachers
              ON table_student_marks.teacher_id = view_teachers.id
         JOIN view_lessons
              ON table_student_marks.lesson_id = view_lessons.id
         JOIN table_marks
              ON table_student_marks.mark_id = table_marks.id;

-- FUNCTIONS & PROCEDURES
CREATE FUNCTION function_is_not_exist_person(
    IN last_name TEXT,
    IN first_name TEXT,
    IN date_of_birth DATE)
RETURNS BOOLEAN
LANGUAGE plpgsql
AS $$
    DECLARE
        count INTEGER;

    BEGIN
        SELECT COUNT(*)
        INTO count
        FROM table_persons
        WHERE table_persons.last_name = function_is_not_exist_person.last_name
          AND table_persons.first_name = function_is_not_exist_person.first_name
          AND table_persons.date_of_birth = function_is_not_exist_person.date_of_birth;

        IF (count = 0) THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$$;

CREATE FUNCTION function_insert_person(
    IN last_name TEXT,
    IN first_name TEXT,
    IN date_of_birth DATE)
RETURNS INTEGER
LANGUAGE plpgsql
AS $$
    DECLARE
        isNot BOOLEAN;
        outId INTEGER;

    BEGIN
        isNot := function_is_not_exist_person(function_insert_person.last_name, function_insert_person.first_name,
                                              function_insert_person.date_of_birth);

        IF (isNot) THEN
            INSERT INTO table_persons(last_name, first_name, date_of_birth)
            VALUES (function_insert_person.last_name,
                    function_insert_person.first_name,
                    function_insert_person.date_of_birth);
        END IF;

        SELECT table_persons.id
        INTO outId
        FROM table_persons
        WHERE table_persons.last_name = function_insert_person.last_name
          AND table_persons.first_name = function_insert_person.first_name
          AND table_persons.date_of_birth = function_insert_person.date_of_birth;

        RETURN outId;
    END;
$$;

CREATE FUNCTION function_is_not_exist_group(IN group_name TEXT)
RETURNS BOOLEAN
LANGUAGE plpgsql
AS $$
    DECLARE
        count INTEGER;

    BEGIN
        SELECT COUNT(*)
        INTO count
        FROM table_groups
        WHERE table_groups.name = function_is_not_exist_group.group_name;

        IF (count = 0) THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$$;

CREATE FUNCTION function_insert_group(IN group_name TEXT)
RETURNS INTEGER
LANGUAGE plpgsql
AS $$
    DECLARE
        isNot BOOLEAN;
        outId INTEGER;

    BEGIN
        isNot := function_is_not_exist_group(function_insert_group.group_name);

        IF (isNot) THEN
            INSERT INTO table_groups(name) VALUES (function_insert_group.group_name);
        END IF;

        SELECT table_groups.id
        INTO outId
        FROM table_groups
        WHERE table_groups.name = function_insert_group.group_name;

        RETURN outId;
    END;
$$;

CREATE FUNCTION function_is_not_exist_student(
    IN person_id INTEGER,
    IN group_id INTEGER)
RETURNS BOOLEAN
LANGUAGE plpgsql
AS $$
    DECLARE
        count INTEGER;

    BEGIN
        SELECT COUNT(*)
        INTO count
        FROM table_students
        WHERE table_students.person_id = function_is_not_exist_student.person_id AND
              table_students.group_id = function_is_not_exist_student.group_id;

        IF (count = 0) THEN
            RETURN TRUE;
        ELSE
            RETURN FALSE;
        END IF;
    END;
$$;

CREATE PROCEDURE procedure_insert_student(
    IN last_name TEXT,
    IN first_name TEXT,
    IN date_of_birth DATE,
    IN group_name TEXT)
LANGUAGE plpgsql
AS $$
    DECLARE
        person_id INTEGER;
        group_id INTEGER;
        isNot BOOLEAN;

    BEGIN
        person_id := function_insert_person(
                procedure_insert_student.last_name,
                procedure_insert_student.first_name,
                procedure_insert_student.date_of_birth);

        group_id := function_insert_group(procedure_insert_student.group_name);

        isNot := function_is_not_exist_student(person_id, group_id);
        IF (isNot) THEN
            INSERT INTO table_students(person_id, group_id) VALUES (person_id, group_id);
        END IF;
    END;
$$;


-- TEST DATA
INSERT INTO table_groups(name)
VALUES ('G-01'),
       ('G-02');

INSERT INTO table_subjects(name)
VALUES ('DB'),
       ('Programming');

INSERT INTO table_marks(mark)
VALUES ('1'),
       ('2'),
       ('3'),
       ('4'),
       ('5');

INSERT INTO table_persons(last_name, first_name, date_of_birth)
VALUES ('Ivanov', 'Ivan', '1990-01-01'),
       ('Petrov', 'Petr', '1995-05-01'),
       ('Sidorov', 'Sidr', '1980-10-10'),
       ('Popov', 'Alex', '2000-03-08');

INSERT INTO table_students(person_id, group_id)
VALUES ((SELECT id FROM table_persons WHERE last_name = 'Ivanov'),
        (SELECT id FROM table_groups WHERE name = 'G-01')),
       ((SELECT id FROM table_persons WHERE last_name = 'Petrov'),
        (SELECT id FROM table_groups WHERE name = 'G-02'));

INSERT INTO table_teachers(person_id)
VALUES ((SELECT id FROM table_persons WHERE last_name = 'Sidorov')),
       ((SELECT id FROM table_persons WHERE last_name = 'Popov'));

INSERT INTO table_teacher_subjects(teacher_id, subject_id)
VALUES ((SELECT id FROM view_teachers WHERE last_name = 'Sidorov'),
        (SELECT id FROM table_subjects WHERE name = 'DB')),
       ((SELECT id FROM view_teachers WHERE last_name = 'Popov'),
        (SELECT id FROM table_subjects WHERE name = 'Programming'));

INSERT INTO table_lessons(subject_id, number, title)
VALUES ((SELECT id FROM table_subjects WHERE name = 'DB'), 1, 'CREATE DATABASE'),
       ((SELECT id FROM table_subjects WHERE name = 'DB'), 2, 'SELECT'),
       ((SELECT id FROM table_subjects WHERE name = 'Programming'), 1, 'Algorithm'),
       ((SELECT id FROM table_subjects WHERE name = 'Programming'), 2, 'OOP');

INSERT INTO table_student_marks(date, student_id, teacher_id, lesson_id, mark_id)
VALUES ('2024-01-10',
        (SELECT id FROM table_persons WHERE last_name = 'Ivanov'),
        (SELECT id FROM view_teachers WHERE last_name = 'Sidorov'),
        (SELECT id FROM view_lessons WHERE subject = 'DB' AND number = 1),
        (SELECT id FROM table_marks WHERE mark = '4')),
       ('2024-01-10',
        (SELECT id FROM table_persons WHERE last_name = 'Petrov'),
        (SELECT id FROM view_teachers WHERE last_name = 'Sidorov'),
        (SELECT id FROM view_lessons WHERE subject = 'DB' AND number = 1),
        (SELECT id FROM table_marks WHERE mark = '3'));
INSERT INTO table_student_marks(student_id, teacher_id, lesson_id, mark_id)
VALUES ((SELECT id FROM table_persons WHERE last_name = 'Ivanov'),
        (SELECT id FROM view_teachers WHERE last_name = 'Sidorov'),
        (SELECT id FROM view_lessons WHERE subject = 'DB' AND number = 2),
        (SELECT id FROM table_marks WHERE mark = '5')),
       ((SELECT id FROM table_persons WHERE last_name = 'Petrov'),
        (SELECT id FROM view_teachers WHERE last_name = 'Sidorov'),
        (SELECT id FROM view_lessons WHERE subject = 'DB' AND number = 2),
        (SELECT id FROM table_marks WHERE mark = '5'));