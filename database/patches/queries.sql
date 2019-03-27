UPDATE posts SET posts.status = DRAFT;

SELECT * FROM posts

ALTER TABLE posts SET posts.status ENUM ('DRAFT')


UPDATE `posts` SET `status` = 'DRAFT';