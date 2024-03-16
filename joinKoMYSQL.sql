

--department table create gareko
--department_id will be foreign key
CREATE TABLE department (
    department_id INT PRIMARY KEY,
    designation VARCHAR(50)
);

--data insetions
INSERT INTO department (department_id, designation) VALUES
(1, 'HR'),
(2, 'Finance'),
(3, 'IT');

--employee table ko employee department id le represent garne
--table reference ni use garne
CREATE TABLE employee (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES department(department_id)
);

--reference anusar value halne natra bigrinxa
INSERT INTO employee (id, name, department_id) VALUES
(1, 'John', 1),
(2, 'Alice', 2),
(3, 'Bob', 1),
(4, 'Sara', 3);
