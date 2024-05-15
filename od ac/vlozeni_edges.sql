INSERT INTO Edges (from_node_id, to_node_id, distance, bidirectional) VALUES
((SELECT id FROM Nodes WHERE name = 'A'), (SELECT id FROM Nodes WHERE name = 'B'), 5, TRUE),
((SELECT id FROM Nodes WHERE name = 'B'), (SELECT id FROM Nodes WHERE name = 'D'), 3, FALSE),
((SELECT id FROM Nodes WHERE name = 'D'), (SELECT id FROM Nodes WHERE name = 'E'), 2, TRUE),
((SELECT id FROM Nodes WHERE name = 'E'), (SELECT id FROM Nodes WHERE name = 'C'), 4, FALSE),
((SELECT id FROM Nodes WHERE name = 'C'), (SELECT id FROM Nodes WHERE name = 'A'), 1, TRUE),
((SELECT id FROM Nodes WHERE name = 'E'), (SELECT id FROM Nodes WHERE name = 'F'), 6, TRUE),
((SELECT id FROM Nodes WHERE name = 'F'), (SELECT id FROM Nodes WHERE name = 'G'), 2, TRUE),
((SELECT id FROM Nodes WHERE name = 'G'), (SELECT id FROM Nodes WHERE name = 'H'), 7, TRUE),
((SELECT id FROM Nodes WHERE name = 'H'), (SELECT id FROM Nodes WHERE name = 'I'), 3, TRUE),
((SELECT id FROM Nodes WHERE name = 'I'), (SELECT id FROM Nodes WHERE name = 'D'), 1, FALSE);
