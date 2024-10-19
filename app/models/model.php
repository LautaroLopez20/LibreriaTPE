<?php
    require_once 'config.php';
    
    class Model {
        public  $db;

        public function __construct() {
            $this->db = new PDO("mysql:host=" . MYSQL_HOST .";dbname=" . MYSQL_DB . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
            $this->_deploy();
        }


        private function _deploy() {
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();
        
       
           if (count($tables) == 0) {
                $sql =<<<END
                 CREATE TABLE `autores` (
                    `id` int(11) NOT NULL,
                    `Nombre` varchar(150) NOT NULL,
                    `Premiaciones` int(11) NOT NULL,
                    `GeneroDestacado` varchar(150) NOT NULL,
                    `FechaNacimiento` date NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                INSERT INTO `autores` (`id`, `Nombre`, `Premiaciones`, `GeneroDestacado`, `FechaNacimiento`) VALUES
                    (1, 'George Orwell', 3, 'Terror', '1965-05-12'),
                    (2, 'Richard Blair', 1, 'Romance', '1998-09-11'),
                    (3, 'Aldous Huxley', 6, 'Ciencia Ficcion', '1925-08-22'),
                    (4, 'J. K. Rowling', 2, 'Comedia', '1967-10-21');
            
                CREATE TABLE `libros` (
                    `id` int(11) NOT NULL,
                    `Titulo` varchar(150) NOT NULL,
                    `Autor` int(11) NOT NULL,
                    `CantidadPaginas` int(11) NOT NULL,
                    `Genero` varchar(150) NOT NULL,
                    `Editorial` varchar(150) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                INSERT INTO `libros` (`id`, `Titulo`, `Autor`, `CantidadPaginas`, `Genero`, `Editorial`) VALUES
                    (1, 'Harry Potter y la piedra filosofal', 4, 450, 'Comedia', 'San Pedro S.A'),
                    (2, 'Harry Potter y las reliquias de la muerte', 4, 390, 'Comedia', 'San Pedro S.A'),
                    (3, 'rebelion en la granja', 1, 300, 'Terror', 'Madero Company'),
                    (4, 'El señor de las moscas', 2, 175, 'Romance', 'Aguas Tibias SS'),
                    (5, 'Un mundo feliz', 3, 233, 'Romance', 'Aguas Tibias SS'),
                    (6, 'Los dias de Birmania', 1, 912, 'Ciencia Ficcion', 'Madero Company');

                CREATE TABLE `usuarios` (
                    `id` int(11) NOT NULL,
                    `nombre` varchar(200) NOT NULL,
                    `contrasena` varchar(60) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                END;

                $this->db->query($sql);
            }
        }
    }
