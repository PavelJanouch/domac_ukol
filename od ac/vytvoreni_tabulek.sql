CREATE TABLE Nodes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name CHAR(1) NOT NULL
);

CREATE TABLE Edges (
    id INT PRIMARY KEY AUTO_INCREMENT,
    from_node_id INT NOT NULL,
    to_node_id INT NOT NULL,
    distance INT NOT NULL,
    bidirectional BOOLEAN NOT NULL,
    FOREIGN KEY (from_node_id) REFERENCES Nodes(id),
    FOREIGN KEY (to_node_id) REFERENCES Nodes(id)
);
