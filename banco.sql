--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Id da tabela',
  `name` varchar(60) COLLATE utf8_bin NOT NULL COMMENT 'Nome',
  `sobrenome` varchar(60) COLLATE utf8_bin NOT NULL COMMENT 'Sobrenome',
  `email` varchar(60) COLLATE utf8_bin NOT NULL COMMENT 'Email',
  `password` varchar(17) COLLATE utf8_bin NOT NULL COMMENT 'Password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
