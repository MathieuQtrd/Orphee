CREATE DATABASE dashboard;

USE dashboard;

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `comment` (`id`, `task_id`, `user_id`, `message`, `created_at`) VALUES
(1, 2, 1, 'Nullam ornare leo nec odio malesuada tristique. Nulla accumsan placerat dui et dictum. Nullam congue sodales nisi. Nunc cursus dapibus sapien, ut mattis libero posuere et. Nulla facilisi. Donec ac augue fermentum, posuere felis eget, vestibulum odio. Nulla congue purus in diam porttitor cursus. Mauris vehicula tortor id dolor ornare commodo eget sagittis mauris.', '2026-01-14 15:56:49'),
(2, 2, 1, 'Proin pellentesque, lorem ac porta maximus, eros felis tristique nisi, sit amet tincidunt dolor nulla nec risus. Sed feugiat dapibus sodales. Mauris aliquet turpis mi, quis tincidunt metus rutrum at. Phasellus est turpis, pulvinar at lectus a, gravida volutpat odio. Nam vestibulum viverra nibh in volutpat. Donec finibus, felis at suscipit luctus, sem neque vulputate est, vitae ultricies ligula nisl eu ex.', '2026-01-14 16:25:37'),
(3, 2, 2, 'Nullam ornare leo nec odio malesuada tristique. Nulla accumsan placerat dui et dictum. Nullam congue sodales nisi. Nunc cursus dapibus sapien, ut mattis libero posuere et. Nulla facilisi. Donec ac augue fermentum, posuere felis eget, vestibulum odio.', '2026-01-14 16:26:46');


DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('pending','in progress','done','closed') NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `task` (`id`, `name`, `description`, `image`, `status`, `created_at`) VALUES
(2, 'Maquette 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis pellentesque augue a vulputate. Etiam maximus, ante eget tempor sagittis, elit enim eleifend ipsum, vel pharetra ligula lacus id justo. Pellentesque ultricies mattis iaculis. Phasellus quis justo ultrices, pharetra tortor eget, posuere sem. Nulla sagittis augue urna, ut elementum libero luctus eu. Suspendisse diam ipsum, blandit in ligula ac, suscipit volutpat augue. Integer condimentum laoreet elit vitae dapibus. Curabitur enim augue, bibendum eget metus vehicula, commodo facilisis leo. Duis eu sollicitudin augue, id porta erat. Donec sed imperdiet neque. Nulla nec pellentesque eros, nec imperdiet orci. Donec velit augue, venenatis eget sem vitae, cursus ultrices quam.<br><br>Proin pellentesque, lorem ac porta maximus, eros felis tristique nisi, sit amet tincidunt dolor nulla nec risus. Sed feugiat dapibus sodales. Mauris aliquet turpis mi, quis tincidunt metus rutrum at. Phasellus est turpis, pulvinar at lectus a, gravida volutpat odio. Nam vestibulum viverra nibh in volutpat. Donec finibus, felis at suscipit luctus, sem neque vulputate est, vitae ultricies ligula nisl eu ex. Ut nec orci vitae leo dignissim maximus quis sed sem. Aliquam a neque venenatis, porta diam non, pharetra mi. Phasellus ut consequat lectus. Nam rutrum efficitur egestas. Sed euismod fringilla ligula, vel commodo enim maximus placerat. Ut gravida eget velit vel consectetur.', '6967a607e22d5.jpg', 'done', '2026-01-14 15:19:51'),
(3, 'Maquette 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis pellentesque augue a vulputate. Etiam maximus, ante eget tempor sagittis, elit enim eleifend ipsum, vel pharetra ligula lacus id justo. Pellentesque ultricies mattis iaculis. Phasellus quis justo ultrices, pharetra tortor eget, posuere sem. Nulla sagittis augue urna, ut elementum libero luctus eu. Suspendisse diam ipsum, blandit in ligula ac, suscipit volutpat augue. Integer condimentum laoreet elit vitae dapibus. Curabitur enim augue, bibendum eget metus vehicula, commodo facilisis leo. Duis eu sollicitudin augue, id porta erat. Donec sed imperdiet neque. Nulla nec pellentesque eros, nec imperdiet orci. Donec velit augue, venenatis eget sem vitae, cursus ultrices quam.<br><br>Proin pellentesque, lorem ac porta maximus, eros felis tristique nisi, sit amet tincidunt dolor nulla nec risus. Sed feugiat dapibus sodales. Mauris aliquet turpis mi, quis tincidunt metus rutrum at. Phasellus est turpis, pulvinar at lectus a, gravida volutpat odio. Nam vestibulum viverra nibh in volutpat. Donec finibus, felis at suscipit luctus, sem neque vulputate est, vitae ultricies ligula nisl eu ex. Ut nec orci vitae leo dignissim maximus quis sed sem. Aliquam a neque venenatis, porta diam non, pharetra mi. Phasellus ut consequat lectus. Nam rutrum efficitur egestas. Sed euismod fringilla ligula, vel commodo enim maximus placerat. Ut gravida eget velit vel consectetur.', '6967a673ccfb6.png', 'in progress', '2026-01-14 15:21:39'),
(4, 'Maquette 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis pellentesque augue a vulputate. Etiam maximus, ante eget tempor sagittis, elit enim eleifend ipsum, vel pharetra ligula lacus id justo. Pellentesque ultricies mattis iaculis. Phasellus quis justo ultrices, pharetra tortor eget, posuere sem. Nulla sagittis augue urna, ut elementum libero luctus eu. Suspendisse diam ipsum, blandit in ligula ac, suscipit volutpat augue. Integer condimentum laoreet elit vitae dapibus. Curabitur enim augue, bibendum eget metus vehicula, commodo facilisis leo. Duis eu sollicitudin augue, id porta erat. Donec sed imperdiet neque. Nulla nec pellentesque eros, nec imperdiet orci. Donec velit augue, venenatis eget sem vitae, cursus ultrices quam.<br><br>Proin pellentesque, lorem ac porta maximus, eros felis tristique nisi, sit amet tincidunt dolor nulla nec risus. Sed feugiat dapibus sodales. Mauris aliquet turpis mi, quis tincidunt metus rutrum at. Phasellus est turpis, pulvinar at lectus a, gravida volutpat odio. Nam vestibulum viverra nibh in volutpat. Donec finibus, felis at suscipit luctus, sem neque vulputate est, vitae ultricies ligula nisl eu ex. Ut nec orci vitae leo dignissim maximus quis sed sem. Aliquam a neque venenatis, porta diam non, pharetra mi. Phasellus ut consequat lectus. Nam rutrum efficitur egestas. Sed euismod fringilla ligula, vel commodo enim maximus placerat. Ut gravida eget velit vel consectetur.', '6967a67eb3e3c.jpg', 'pending', '2026-01-14 15:21:50'),
(5, 'Maquette 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis pellentesque augue a vulputate. Etiam maximus, ante eget tempor sagittis, elit enim eleifend ipsum, vel pharetra ligula lacus id justo. Pellentesque ultricies mattis iaculis. Phasellus quis justo ultrices, pharetra tortor eget, posuere sem. Nulla sagittis augue urna, ut elementum libero luctus eu. Suspendisse diam ipsum, blandit in ligula ac, suscipit volutpat augue. Integer condimentum laoreet elit vitae dapibus. Curabitur enim augue, bibendum eget metus vehicula, commodo facilisis leo. Duis eu sollicitudin augue, id porta erat. Donec sed imperdiet neque. Nulla nec pellentesque eros, nec imperdiet orci. Donec velit augue, venenatis eget sem vitae, cursus ultrices quam.<br><br>Proin pellentesque, lorem ac porta maximus, eros felis tristique nisi, sit amet tincidunt dolor nulla nec risus. Sed feugiat dapibus sodales. Mauris aliquet turpis mi, quis tincidunt metus rutrum at. Phasellus est turpis, pulvinar at lectus a, gravida volutpat odio. Nam vestibulum viverra nibh in volutpat. Donec finibus, felis at suscipit luctus, sem neque vulputate est, vitae ultricies ligula nisl eu ex. Ut nec orci vitae leo dignissim maximus quis sed sem. Aliquam a neque venenatis, porta diam non, pharetra mi. Phasellus ut consequat lectus. Nam rutrum efficitur egestas. Sed euismod fringilla ligula, vel commodo enim maximus placerat. Ut gravida eget velit vel consectetur.<br><br>Vivamus turpis nulla, pulvinar eget libero ut, porta tristique ante. Sed tempor, risus in dictum suscipit, nunc enim pellentesque felis, ut malesuada enim leo eget enim. Vivamus placerat pharetra tortor. Sed rutrum accumsan mauris varius blandit. Curabitur sit amet volutpat odio, at consequat erat. In rhoncus quis tellus vel pharetra. Mauris pulvinar tincidunt eros ac sollicitudin. Cras in egestas nibh, eu euismod erat. Ut suscipit placerat magna vel molestie. Morbi finibus in eros sed auctor. Etiam vel nisi nibh. Nulla posuere pellentesque arcu. Donec et tortor eros.<br><br>Nullam ornare leo nec odio malesuada tristique. Nulla accumsan placerat dui et dictum. Nullam congue sodales nisi. Nunc cursus dapibus sapien, ut mattis libero posuere et. Nulla facilisi. Donec ac augue fermentum, posuere felis eget, vestibulum odio. Nulla congue purus in diam porttitor cursus. Mauris vehicula tortor id dolor ornare commodo eget sagittis mauris.', 'mockup-default.png', 'pending', '2026-01-14 15:43:18');



DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `user` (`id`, `login`, `password`, `email`) VALUES
(1, 'Mathieu', '$2y$10$o0w3btVluEAAkwXLQGxM3.1vUODqjsTEoZsX9iYGt8CWNeL3gFaQi', 'mathieu@mail.fr'),
(2, 'admin', '$2y$10$2g1E2M1ag3B8iTvQ4b1zWOOZ.7lFK3dyFsE0k2EeboqFDbSQO796a', 'admin@mail.fr'),
(3, 'test_injection', 'password', 'mail@mail.fr');
