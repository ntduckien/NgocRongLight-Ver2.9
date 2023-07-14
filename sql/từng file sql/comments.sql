CREATE TABLE comments (
  id INT NOT NULL AUTO_INCREMENT,
  post_id INT NOT NULL,
  nguoidung VARCHAR(255) NOT NULL,
  traloi TEXT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (post_id) REFERENCES posts(id)
);
