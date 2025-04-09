-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para livros_crud
CREATE DATABASE IF NOT EXISTS `livros_crud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `livros_crud`;

-- Copiando estrutura para tabela livros_crud.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `capa` varchar(255) DEFAULT '../assets/img/default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela livros_crud.livros: ~52 rows (aproximadamente)
INSERT INTO `livros` (`id`, `titulo`, `autor`, `genero`, `ano`, `capa`) VALUES
	(1, 'O Senhor dos Anéis', 'J.R.R. Tolkien', 'Fantasia', 1954, '../assets/img/default.jpg'),
	(2, '1984', 'George Orwell', 'Distopia', 1949, '../assets/img/default.jpg'),
	(3, 'Dom Casmurro', 'Machado de Assis', 'Ficção', 1899, '../assets/img/default.jpg'),
	(4, 'A Revolução dos Bichos', 'George Orwell', 'Fábula', 1945, '../assets/img/default.jpg'),
	(5, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Infantil', 1943, '../assets/img/default.jpg'),
	(6, 'Moby Dick', 'Herman Melville', 'Aventura', 1851, '../assets/img/default.jpg'),
	(7, 'A Montanha Mágica', 'Thomas Mann', 'Drama', 1924, '../assets/img/default.jpg'),
	(8, 'Crime e Castigo', 'Fiódor Dostoiévski', 'Filosofia', 1866, '../assets/img/default.jpg'),
	(9, 'O Grande Gatsby', 'F. Scott Fitzgerald', 'Romance', 1925, '../assets/img/default.jpg'),
	(10, 'Cem Anos de Solidão', 'Gabriel García Márquez', 'Realismo Mágico', 1967, '../assets/img/default.jpg'),
	(11, 'O Código Da Vinci', 'Dan Brown', 'Mistério', 2003, '../assets/img/default.jpg'),
	(12, 'O Hobbit', 'J.R.R. Tolkien', 'Fantasia', 1937, '../assets/img/default.jpg'),
	(13, 'O Cortiço', 'Aluísio Azevedo', 'Realismo', 1890, '../assets/img/default.jpg'),
	(14, 'O Morro dos Ventos Uivantes', 'Emily Brontë', 'Romance', 1847, '../assets/img/default.jpg'),
	(15, 'O Primo Basílio', 'José de Alencar', 'Realismo', 1878, '../assets/img/default.jpg'),
	(16, 'Os Miseráveis', 'Victor Hugo', 'Drama', 1862, '../assets/img/default.jpg'),
	(17, 'A Casa dos Espíritos', 'Isabel Allende', 'Realismo Mágico', 1982, '../assets/img/default.jpg'),
	(18, 'A Guerra dos Tronos', 'George R.R. Martin', 'Fantasia', 1996, '../assets/img/default.jpg'),
	(19, 'O Diário de Anne Frank', 'Anne Frank', 'Memórias', 1947, '../assets/img/default.jpg'),
	(20, 'O Silmarillion', 'J.R.R. Tolkien', 'Fantasia', 1977, '../assets/img/default.jpg'),
	(21, 'Ulisses', 'James Joyce', 'Modernismo', 1922, '../assets/img/default.jpg'),
	(22, 'Ensaio sobre a Cegueira', 'José Saramago', 'Ficção', 1995, '../assets/img/default.jpg'),
	(23, 'O Alquimista', 'Paulo Coelho', 'Ficção', 1988, '../assets/img/default.jpg'),
	(24, 'O Lobo da Estepe', 'Hermann Hesse', 'Filosofia', 1927, '../assets/img/default.jpg'),
	(25, 'O Nome da Rosa', 'Umberto Eco', 'Mistério', 1980, '../assets/img/default.jpg'),
	(26, 'A Menina que Roubava Livros', 'Markus Zusak', 'Drama', 2005, '../assets/img/default.jpg'),
	(27, 'Fahrenheit 451', 'Ray Bradbury', 'Distopia', 1953, '../assets/img/default.jpg'),
	(28, 'As Aventuras de Sherlock Holmes', 'Arthur Conan Doyle', 'Mistério', 1892, '../assets/img/default.jpg'),
	(29, 'A Divina Comédia', 'Dante Alighieri', 'Poesia', 1320, '../assets/img/default.jpg'),
	(30, 'O Filho Eterno', 'Cristovão Tezza', 'Drama', 1999, '../assets/img/default.jpg'),
	(31, 'A Ilha do Tesouro', 'Robert Louis Stevenson', 'Aventura', 1883, '../assets/img/default.jpg'),
	(32, 'O Rei Leão', 'Disney', 'Infantil', 1994, '../assets/img/default.jpg'),
	(33, 'O Apanhador no Campo de Centeio', 'J.D. Salinger', 'Ficção', 1951, '../assets/img/default.jpg'),
	(34, 'O Velho e o Mar', 'Ernest Hemingway', 'Aventura', 1952, '../assets/img/default.jpg'),
	(35, 'Drácula', 'Bram Stoker', 'Terror', 1897, '../assets/img/default.jpg'),
	(36, 'A Peste', 'Albert Camus', 'Filosofia', 1947, '../assets/img/default.jpg'),
	(37, 'O Falcão Maltês', 'Dashiell Hammett', 'Mistério', 1931, '../assets/img/default.jpg'),
	(38, 'O Sol é Para Todos', 'Harper Lee', 'Drama', 1960, '../assets/img/default.jpg'),
	(39, 'O Rei Artur', 'Vários autores', 'Lenda', 1150, '../assets/img/default.jpg'),
	(40, 'Laranja Mecânica', 'Anthony Burgess', 'Distopia', 1962, '../assets/img/default.jpg'),
	(41, 'A Trilogia Millennium', 'Stieg Larsson', 'Mistério', 2005, '../assets/img/default.jpg'),
	(42, 'Memórias Póstumas de Brás Cubas', 'Machado de Assis', 'Realismo', 1881, '../assets/img/default.jpg'),
	(43, 'O Retrato de Dorian Gray', 'Oscar Wilde', 'Romance', 1890, '../assets/img/default.jpg'),
	(44, 'A Verdade sobre o Caso Harry Quebert', 'Joël Dicker', 'Mistério', 2008, '../assets/img/default.jpg'),
	(45, 'O Tempo e o Vento', 'Erico Verissimo', 'Romance', 1949, '../assets/img/default.jpg'),
	(46, 'Vingança', 'Christina Dodd', 'Romance', 2001, '../assets/img/default.jpg'),
	(47, 'O Vendedor de Sonhos', 'Augusto Cury', 'Filosofia', 2008, '../assets/img/default.jpg'),
	(48, 'O Senhor das Moscas', 'William Golding', 'Drama', 1954, '../assets/img/default.jpg'),
	(49, 'A Busca de uma Nova Terra', 'Barbara Marx Hubbard', 'Futuro', 1996, '../assets/img/default.jpg'),
	(50, 'O Vingador', 'John Grisham', 'Crime', 1995, '../assets/img/default.jpg'),
	(51, 'A Ronda do Medo', 'Stephen King', 'Terror', 1997, '../assets/img/default.jpg'),
	(52, 'A Mente Organizada', 'Daniel Levitin', 'Psicologia', 2014, '../assets/img/default.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
