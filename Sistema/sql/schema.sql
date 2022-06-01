-- 
-- Database: `import_csv`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE users (id int(80), userName varchar(550) NOT NULL, password datetime NOT NULL, firstName datetime NOT NULL, lastName int(40) NOT NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;