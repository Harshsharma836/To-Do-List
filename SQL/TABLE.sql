-- Create Database 
CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `task` (`task_id`, `task`, `status`) VALUES
(1, 'This is my new task', 'Completed'),
(2, 'This is my second task', 'Pending'),
(3, 'This is my third task', 'Pending');


ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);


ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;