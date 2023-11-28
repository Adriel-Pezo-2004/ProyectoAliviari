-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 17:02:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aliviari2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `con_colesterol` ()   SELECT * FROM RegistroLaboratorioSangre WHERE PerfilLipidicoColesterol > 220$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_covid` ()   SELECT * FROM RegistroTriaje   WHERE SatO < 90 AND Temperatura > 37.5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_donadores` ()   SELECT * FROM pacientes WHERE DNI IN (SELECT DNI FROM registrolaboratoriosangre WHERE GrupoSanguineo = 'O+')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_hemoglobina` ()   SELECT * FROM RegistroLaboratorioSangre WHERE Hemoglobina > 15$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_hemoglobina2` ()   SELECT * FROM RegistroLaboratorioSangre WHERE Hemoglobina < 11.5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_ICC` ()   SELECT * FROM registrotriaje WHERE ICC > .86$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_jovenes` ()   SELECT * FROM Pacientes WHERE Edad BETWEEN 20 AND 30$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_sabana` ()   SELECT P.*, RT.CodigoAtencion, RT.PerimetroAbdominal, RT.PerimetroCadera, RT.ICC, RT.FrecuenciaRespiratoria, RT.FrecuenciaCardiaca, RT.Peso, RT.Talla, RT.IMC, RT.Temperatura, RT.SatO, RT.PresionArterial, RLS.id_registro, RLS.FechaExamen, RLS.GrupoSanguineo, RLS.Hemoglobina, RLS.PerfilLipidicoColesterol, RLS.PerfilLipidicoHDL, RLS.PerfilLipidicoHDL, RLS.PerfilLipidicoLDL, RLS.Trigliceridos FROM Pacientes P LEFT JOIN RegistroTriaje RT ON P.DNI = RT.DNI LEFT JOIN RegistroLaboratorioSangre RLS ON P.DNI = RLS.DNI$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_sobre` ()   SELECT * FROM registrotriaje WHERE IMC > 24.99$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_universitario` ()   SELECT * FROM Pacientes WHERE gradoInstruccion='Universitario'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_pacientes` (IN `DNI_paciente` CHAR(8))   DELETE FROM pacientes WHERE DNI = DNI_paciente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_sangre` (IN `p_id_registro` INT)   DELETE FROM registrolaboratoriosangre WHERE id_registro = p_id_registro$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_triaje` (IN `p_CodigoAtencion` INT(11))   DELETE FROM registrotriaje WHERE CodigoAtencion = p_CodigoAtencion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ingresar_paciente` (IN `DNI` CHAR(8), IN `NombreApellido` VARCHAR(100), IN `Edad` INT, IN `Sexo` CHAR(1), IN `EstadoCivil` CHAR(1), IN `FechaNacimiento` DATE, IN `FechaRegistro` DATE, IN `Direccion` VARCHAR(100), IN `Ubigeo` INT, IN `GradoInstruccion` VARCHAR(100), IN `Ocupacion` VARCHAR(50), IN `Telefono` CHAR(9), IN `Apoderado` VARCHAR(100))   INSERT INTO Pacientes (
    DNI,
    NombreApellido,
    Edad,
    Sexo,
    EstadoCivil,
    FechaNacimiento,
    FechaRegistro,
    Direccion,
    Ubigeo,
    GradoInstruccion,
    Ocupacion,
    Telefono,
    Apoderado
  )
  VALUES (
    DNI,
    NombreApellido,
    Edad,
    Sexo,
    EstadoCivil,
    FechaNacimiento,
    FechaRegistro,
    Direccion,
    Ubigeo,
    GradoInstruccion,
    Ocupacion,
    Telefono,
    Apoderado
  )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ingresar_triaje` (INOUT `DNI ` CHAR(8) CHARSET utf8, IN `PerimetroAbdominal` DECIMAL(5,2), IN `PerimetroCadera` DECIMAL(5,2), IN `ICC` DECIMAL(5,2), IN `FrecuenciaRespiratoria` INT(11), IN `FrecuenciaCardiaca` INT(11), IN `Peso` DECIMAL(5,2), IN `Talla` DECIMAL(5,2), IN `IMC` DECIMAL(5,2), IN `Temperatura` DECIMAL(5,2), IN `SatO` INT(11), IN `PresionArterial` VARCHAR(11))   INSERT INTO RegistroTriaje (
    DNI,
    PerimetroAbdominal,
    PerimetroCadera,
    ICC,
    FrecuenciaRespiratoria,
    FrecuenciaCardiaca,
    Peso,
    Talla,
    IMC,
    Temperatura,
    SatO,
    PresionArterial
  )
  VALUES (
    DNI,
    PerimetroAbdominal,
    PerimetroCadera,
    ICC,
    FrecuenciaRespiratoria,
    FrecuenciaCardiaca,
    Peso,
    Talla,
    IMC,
    Temperatura,
    SatO,
    PresionArterial
  )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_pacientes` ()   SELECT * FROM pacientes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_sangre` ()   SELECT * FROM registrolaboratoriosangre$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_triaje` ()   SELECT * FROM registrotriaje$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtener_paciente` (IN `p_DNI` INT(8))   SELECT * FROM Pacientes WHERE DNI = p_DNI$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtener_sangre` (IN `p_id_registro` INT(11))   SELECT * FROM registrolaboratoriosangre WHERE id_registro = p_id_registro$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtener_triaje` (IN `p_CodigoAtencion` INT(11))   SELECT * FROM registrotriaje WHERE CodigoAtencion = p_CodigoAtencion$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `DNI` char(8) NOT NULL,
  `nombreApellido` varchar(100) NOT NULL,
  `edad` int(3) NOT NULL,
  `sexo` char(1) NOT NULL,
  `estadoCivil` char(1) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ubigeo` int(11) NOT NULL,
  `gradoInstruccion` varchar(100) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `telefono` char(9) NOT NULL,
  `Apoderado` varchar(100) NOT NULL,
  `fechaRegistro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`DNI`, `nombreApellido`, `edad`, `sexo`, `estadoCivil`, `fechaNacimiento`, `direccion`, `ubigeo`, `gradoInstruccion`, `ocupacion`, `telefono`, `Apoderado`, `fechaRegistro`) VALUES
('12121212', 'Ana Herrera', 28, 'F', 'S', '1995-05-30', 'Calle 18, Arequipa', 40118, 'Técnico', 'Enfermera', '121212121', 'Pedro Herrera', '2023-11-08'),
('12345678', 'Juan Pérez', 32, 'M', 'S', '1990-05-15', 'Calle 1, Arequipa', 40101, 'Universitario', 'Ingeniero', '123456789', 'María Pérez', '2023-11-07'),
('13131313', 'Pedro Castro', 34, 'M', 'S', '1989-10-18', 'Calle 19, Arequipa', 40119, 'Maestría', 'Ingeniero', '131313131', 'María Castro', '2023-11-08'),
('15151515', 'Jorge Ramírez', 26, 'M', 'S', '1997-09-15', 'Calle 21, Arequipa', 40121, 'Universitario', 'Estudiante', '151515151', '', '2023-11-08'),
('16161616', 'Carla Flores', 39, 'F', 'C', '1984-04-09', 'Calle 22, Arequipa', 40122, 'Maestría', 'Profesora', '161616161', 'Juan Flores', '2023-11-08'),
('17171717', 'Diego Gonzales', 33, 'M', 'S', '1990-01-12', 'Calle 23, Arequipa', 40123, 'Universitario', 'Ingeniero', '171717171', 'Luisa Gonzales', '2023-11-08'),
('18181818', 'Luis Martínez', 48, 'M', 'C', '1975-06-22', 'Calle 24, Arequipa', 40124, 'Doctorado', 'Investigador', '181818181', 'Rosa Martínez', '2023-11-08'),
('19191919', 'Isabel Vargas', 29, 'F', 'S', '1994-11-05', 'Calle 25, Arequipa', 40125, 'Técnico', 'Enfermera', '191919191', 'Miguel Vargas', '2023-11-08'),
('20202020', 'Marta Sánchez', 44, 'F', 'C', '1979-08-28', 'Calle 26, Arequipa', 40126, 'Maestría', 'Médico', '202020202', 'Carlos Sánchez', '2023-11-08'),
('21212121', 'Raúl López', 31, 'M', 'S', '1992-03-17', 'Calle 27, Arequipa', 40127, 'Universitario', 'Estudiante', '212121212', '', '2023-11-08'),
('22222222', 'Laura Pérez', 35, 'F', 'S', '1987-04-05', 'Calle 10, Arequipa', 40110, 'Maestría', 'Médico', '222222222', 'Juan Pérez', '2023-11-08'),
('23232323', 'Elena Castro', 37, 'F', 'C', '1986-12-01', 'Calle 28, Arequipa', 40128, 'Doctorado', 'Abogada', '232323232', 'Pedro Castro', '2023-11-08'),
('23456789', 'María Gómez', 45, 'F', 'C', '1978-02-28', 'Calle 2, Arequipa', 40102, 'Técnico', 'Enfermera', '234567890', '', '2023-11-07'),
('29209146', 'Carlos Alberto Callo Mamani', 66, 'M', 'C', '1956-05-26', 'Pasaje Aleatorio 321', 40101, '', '', '987012345', '', '2023-11-07'),
('29236905', 'Yuri Alcides Romero Ortiz', 62, 'M', 'S', '1961-07-23', 'Jirón de la Historia 333', 40101, '', '', '987012345', '', '2023-11-07'),
('29242263', 'Rita Yovana Barrios Paredes', 64, 'F', 'C', '1958-05-21', 'Avenida Aleatoria 456', 40101, '', '', '987123456', '', '2023-11-07'),
('29242295', 'Delby Luz Aguilar Valverde', 66, 'F', 'C', '1956-12-30', 'Calle de los Secretos 999', 40101, '', '', '987789012', '', '2023-11-07'),
('29242296', 'Nelly Yubaani Rojas Fuentes', 66, 'F', 'C', '1955-04-12', 'Calle del Recuerdo 222', 40101, '', '', '987789012', '', '2023-11-07'),
('29251122', 'Luis Mariano Galarreta Alpaca', 59, 'M', 'C', '1963-04-03', 'Jirón Secundario 222', 40101, '', '', '987567890', '', '2023-11-07'),
('29278301', 'Marinela Eguiluz Mancilla', 60, 'F', 'S', '1963-12-05', 'Calle de la Poesía 666', 40101, '', '', '987890123', '', '2023-11-07'),
('29279229', 'Danny Behtzabe Salas Ramirez', 65, 'F', 'C', '1958-03-15', 'Pasaje del Pasado 444', 40101, '', '', '987345678', '', '2023-11-07'),
('29302972', 'Liliana del Socorro Fortunata Macedo Luza', 66, 'F', 'S', '1957-02-26', 'Avenida Oculta 555', 40101, '', '', '987345678', '', '2023-11-07'),
('29402446', 'Ivan Eduardo Gamarra Flores', 64, 'M', 'C', '1959-01-27', 'Calle de la Fotografia 111', 40101, '', '', '987789012', '', '2023-11-07'),
('29403524', 'Marcia Juana Quequezana Bedregal', 57, 'F', 'C', '1966-06-23', 'Avenida de los Sueños 111', 40101, '', '', '987123456', '', '2023-11-07'),
('29421408', 'Joselvy Mirta Melgarejo Alvarez', 52, 'F', 'S', '1970-04-14', 'Calle del Centro 666', 40101, '', '', '987654321', '', '2023-11-07'),
('29451001', 'Maria Lourdes Ponce Carbajal', 63, 'F', 'S', '1960-04-07', 'Calle de las Estrellas 999', 40101, '', '', '987654321', '', '2023-11-07'),
('29473369', 'Ingrid Nicole Gonzalez Montes', 39, 'F', 'S', '1984-12-19', 'Jirón del Cine 222', 40101, '', '', '745698523', '', '2023-11-07'),
('29517611', 'Carlos Enrique Alayza Guillen', 50, 'M', 'C', '1972-02-04', 'Avenida de la Aventura 111', 40101, '', '', '987654321', '', '2023-11-07'),
('29563441', 'Richard Ernesto Fuentes Portugal', 52, 'M', 'S', '1971-07-27', 'Avenida Principal 111', 40101, '', '', '987987654', '', '2023-11-07'),
('29570751', 'Denisse Amparo Urdai Rondon', 54, 'F', 'C', '1968-05-05', 'Calle de la Imaginación 666', 40101, '', '', '987234567', '', '2023-11-07'),
('29581399', 'Rocio Lourdes Gutierrez Villanueva', 53, 'F', 'C', '1970-12-04', 'Pasaje Escondido 444', 40101, '', '', '987890123', '', '2023-11-07'),
('29605012', 'Marcos Vargas Ballon', 52, 'M', 'S', '1971-09-23', 'Jirón del Sueño 777', 40101, '', '', '987567890', '', '2023-11-07'),
('29608522', 'Lizeth Zuniga Acevedo', 46, 'F', 'S', '1977-09-11', 'Avenida de la Escultura 999', 40101, '', '', '987012345', '', '2023-11-07'),
('29608695', 'Cesar Alberto Arredondo Gallegos', 49, 'M', 'S', '1973-06-14', 'Calle Aleatoria 123', 40101, '', '', '987654321', '', '2023-11-07'),
('29608800', 'Luis Miguel Espinoza Zegarra', 42, 'M', 'S', '1980-06-15', 'Pasaje de la Pintura 888', 40101, '', '', '987567890', '', '2023-11-07'),
('29626152', 'Maria Elena Callata Bejar', 48, 'F', 'S', '1974-06-21', 'Jirón Aleatorio 789', 40101, '', '', '987789012', '', '2023-11-07'),
('29631080', 'Jose Luis Yanez Luque', 48, 'M', 'C', '1973-05-10', 'Pasaje de los Deseos 888', 40101, '', '', '987012345', '', '2023-11-07'),
('29633621', 'Glenda Magaly Peralta Durand', 50, 'F', 'S', '1973-11-29', 'Pasaje de la Luna 888', 40101, '', '', '987789012', '', '2023-11-07'),
('29667273', 'Marita Sandra Barrientos', 47, 'F', 'S', '1976-06-26', 'Calle de la Maravilla 333', 40101, '', '', '987789012', '', '2023-11-07'),
('29687068', 'Javier John Alosilla Ochoa', 57, 'M', 'S', '1966-08-18', 'Jirón de la Travesía 222', 40101, '', '', '987123456', '', '2023-11-07'),
('29690622', 'Juan Carlos Erazo Velasquez', 58, 'M', 'C', '1965-03-28', 'Jirón de la Musica 777', 40101, '', '', '987234567', '', '2023-11-07'),
('29698432', 'Carlos Arturo Pacheco Condori', 52, 'M', 'C', '1971-02-11', 'Avenida Comercial 777', 40101, '', '', '987123456', '', '2023-11-07'),
('33333333', 'Carlos Ramírez', 28, 'M', 'S', '1995-11-20', 'Calle 11, Arequipa', 40111, 'Universitario', 'Programador', '333333333', '', '2023-11-08'),
('34567890', 'Pedro Torres', 27, 'M', 'S', '1996-09-12', 'Calle 3, Arequipa', 40103, 'Universitario', 'Abogado', '345678901', 'Juan Torres', '2023-11-07'),
('42040982', 'Tatiana Haydee Chirinos Figueroa', 40, 'F', 'C', '1983-10-19', 'Avenida de las Mariposas 555', 40101, '', '', '987345678', '', '2023-11-07'),
('43640850', 'Erick Gonzalo Galdos Torres', 37, 'M', 'S', '1986-04-17', 'Calle Mayor 333', 40101, '', '', '987234567', '', '2023-11-07'),
('44444444', 'Fernanda Torres', 32, 'F', 'C', '1990-02-15', 'Calle 12, Arequipa', 40112, 'Técnico', 'Enfermera', '444444444', 'Pedro Torres', '2023-11-08'),
('44664585', 'Ingrid Lucia Ferro Diaz', 36, 'F', 'S', '1987-09-24', 'Callejón Aleatorio 654', 40101, '', '', '987345678', '', '2023-11-07'),
('45678901', 'Ana Flores', 38, 'F', 'C', '1985-12-24', 'Calle 4, Arequipa', 40104, 'Maestría', 'Profesora', '456789012', '', '2023-11-07'),
('504349', 'Judith Dariela Tapia Mamani', 46, 'F', 'S', '1975-10-10', 'Avenida del Futuro 555', 40101, '', '', '987890123', '', '2023-11-07'),
('55555555', 'Alejandro Gómez', 45, 'M', 'V', '1978-09-28', 'Calle 13, Arequipa', 40113, 'Doctorado', 'Abogado', '555555555', 'María Gómez', '2023-11-08'),
('56789012', 'Luisa Gonzales', 50, 'F', 'C', '1973-07-18', 'Calle 5, Arequipa', 40105, 'Doctorado', 'Médico', '567890123', 'Jorge Gonzales', '2023-11-07'),
('59102970', 'Grecia Carpio Figueroa', 19, 'F', 'S', '2004-04-05', 'Zamacola 0-66', 40101, 'Universitario', 'Programador', '998555616', '', '2023-11-28'),
('66666666', 'Rosa Martínez', 30, 'F', 'S', '1992-06-03', 'Calle 14, Arequipa', 40114, 'Universitario', 'Ingeniera', '666666666', 'Juan Martínez', '2023-11-08'),
('67890123', 'Carlos Sánchez', 22, 'M', 'S', '2001-11-30', 'Calle 6, Arequipa', 40106, 'Universitario', 'Estudiante', '678901234', '', '2023-11-07'),
('71418150', 'Maricelly Evelin Bolaños Barreda', 29, 'F', 'S', '1994-08-02', 'Pasaje del Encanto 444', 40101, '', '', '987012345', '', '2023-11-07'),
('71468982', 'sofia figueroa del carpio', 19, 'F', 'S', '2004-04-05', 'sna lazaro 45 calle principal', 40010, 'universitario', 'Ingeniera', '948576527', '', '2023-11-28'),
('72440510', 'Adriel Pezo Vizcarra', 19, 'M', 'S', '2004-07-15', 'Zamacola 0-14', 40134, 'Secundaria', 'Programador', '998555234', 'Karen', '2023-04-10'),
('74556785', 'Rafael Marquez', 10, 'M', 'S', '2013-08-20', 'Ciudad Nueva K-14', 3456, 'Primaria', 'Estudiante', '998555345', 'Karen', '2022-12-12'),
('77663311', 'Thomas Jefferson', 50, 'M', 'S', '1983-03-14', 'La Ceiba K-16', 41456, 'Secundario', 'Ferretero', '913475683', 'Damian', '2018-04-06'),
('77777777', 'Miguel Sánchez', 55, 'M', 'C', '1968-12-12', 'Calle 15, Arequipa', 40115, 'Maestría', 'Profesor', '777777777', 'Sofía Sánchez', '2023-11-08'),
('77889956', 'Benito Martinez Ocasio', 28, 'M', 'S', '1994-03-14', 'La Romana', 67456, 'Universitario', 'Artista', '999666544', 'Lujan', '2018-04-06'),
('78901234', 'Sofía Rodríguez', 60, 'F', 'V', '1963-04-01', 'Calle 7, Arequipa', 40107, 'Maestría', 'Profesora', '789012345', 'Jorge Rodríguez', '2023-11-07'),
('89012345', 'Jorge Pérez', 29, 'M', 'S', '1994-01-01', 'Calle 8, Arequipa', 40108, 'Universitario', 'Ingeniero', '890123456', 'María', '2023-11-07'),
('99999999', 'Juan López', 42, 'M', 'C', '1981-07-25', 'Calle 17, Arequipa', 40117, 'Doctorado', 'Investigador', '999999999', 'Ana López', '2023-11-08');

--
-- Disparadores `pacientes`
--
DELIMITER $$
CREATE TRIGGER `tr_DeletePacientes` AFTER DELETE ON `pacientes` FOR EACH ROW BEGIN
    SIGNAL SQLSTATE '44000'
    SET MESSAGE_TEXT = 'Se elimino el paciente correctamente';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_InsertPacientes` AFTER INSERT ON `pacientes` FOR EACH ROW BEGIN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Se ha realizado un INSERT en la tabla pacientes';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrolaboratoriosangre`
--

CREATE TABLE `registrolaboratoriosangre` (
  `id_registro` int(11) NOT NULL,
  `DNI` char(8) NOT NULL,
  `FechaExamen` date DEFAULT NULL,
  `GrupoSanguineo` varchar(3) NOT NULL,
  `Hemoglobina` decimal(5,2) DEFAULT NULL,
  `PerfilLipidicoColesterol` decimal(5,2) DEFAULT NULL,
  `PerfilLipidicoHDL` decimal(5,2) DEFAULT NULL,
  `PerfilLipidicoLDL` decimal(5,2) DEFAULT NULL,
  `Trigliceridos` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registrolaboratoriosangre`
--

INSERT INTO `registrolaboratoriosangre` (`id_registro`, `DNI`, `FechaExamen`, `GrupoSanguineo`, `Hemoglobina`, `PerfilLipidicoColesterol`, `PerfilLipidicoHDL`, `PerfilLipidicoLDL`, `Trigliceridos`) VALUES
(5, '23232323', '2023-11-07', 'A+', 14.50, 200.00, 50.00, 100.00, 150.00),
(6, '29633621', '2023-11-07', 'B+', 11.30, 180.00, 60.00, 120.00, 130.00),
(7, '29698432', '2023-11-07', 'O+', 15.20, 190.00, 70.00, 130.00, 140.00),
(8, '29626152', '2023-11-07', 'A+', 13.40, 210.00, 80.00, 140.00, 120.00),
(9, '29698432', '2023-11-07', 'A-', 14.60, 220.00, 90.00, 150.00, 110.00),
(10, '29242263', '2023-11-07', 'B-', 12.70, 230.00, 100.00, 160.00, 100.00),
(11, '29242263', '2023-11-07', 'O-', 15.80, 240.00, 110.00, 170.00, 90.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrotriaje`
--

CREATE TABLE `registrotriaje` (
  `CodigoAtencion` int(11) NOT NULL,
  `DNI` char(8) NOT NULL,
  `PerimetroAbdominal` decimal(5,2) DEFAULT NULL,
  `PerimetroCadera` decimal(5,2) DEFAULT NULL,
  `ICC` decimal(5,2) DEFAULT NULL,
  `FrecuenciaRespiratoria` int(11) DEFAULT NULL,
  `FrecuenciaCardiaca` int(11) DEFAULT NULL,
  `Peso` decimal(5,2) DEFAULT NULL,
  `Talla` decimal(5,2) DEFAULT NULL,
  `IMC` decimal(5,2) DEFAULT NULL,
  `Temperatura` decimal(5,2) DEFAULT NULL,
  `SatO` int(11) DEFAULT NULL CHECK (`SatO` >= 0 and `SatO` <= 100),
  `PresionArterial` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registrotriaje`
--

INSERT INTO `registrotriaje` (`CodigoAtencion`, `DNI`, `PerimetroAbdominal`, `PerimetroCadera`, `ICC`, `FrecuenciaRespiratoria`, `FrecuenciaCardiaca`, `Peso`, `Talla`, `IMC`, `Temperatura`, `SatO`, `PresionArterial`) VALUES
(1, '29608695', 80.50, 95.20, 0.85, 18, 75, 70.50, 1.75, 23.00, 36.70, 98, '98/70'),
(2, '29242263', 78.00, 92.80, 0.84, 20, 80, 65.00, 1.68, 22.90, 36.50, 99, '120/80'),
(3, '29626152', 85.20, 98.50, 0.87, 16, 70, 75.20, 1.80, 23.20, 37.00, 98, '110/75'),
(4, '29209146', 82.40, 94.00, 0.88, 22, 78, 72.40, 1.73, 24.20, 36.80, 98, '115/70'),
(5, '44664585', 79.80, 91.30, 0.87, 19, 76, 69.80, 1.68, 24.70, 37.20, 99, '122/82'),
(6, '29563441', 76.50, 88.70, 0.86, 21, 82, 67.50, 1.65, 24.60, 36.90, 99, '118/78'),
(7, '29251122', 88.00, 100.20, 0.88, 17, 72, 80.00, 1.85, 23.50, 37.10, 98, '112/76'),
(8, '43640850', 84.30, 96.50, 0.89, 18, 74, 77.30, 1.78, 23.80, 36.60, 99, '120/75'),
(9, '29581399', 75.50, 90.20, 0.80, 16, 72, 68.50, 1.70, 23.70, 36.50, 98, '110/70'),
(10, '29302972', 82.00, 96.80, 0.85, 18, 76, 74.00, 1.75, 24.20, 38.60, 88, '118/78'),
(11, '29421408', 79.20, 92.50, 0.83, 20, 80, 70.20, 1.68, 22.90, 36.70, 98, '115/75'),
(12, '29698432', 86.40, 98.00, 0.88, 22, 78, 78.40, 1.73, 26.10, 36.50, 98, '120/80'),
(13, '29633621', 83.80, 94.30, 0.87, 19, 76, 75.80, 1.68, 26.80, 37.20, 99, '122/82'),
(14, '29451001', 80.50, 88.70, 0.86, 21, 82, 72.50, 1.65, 26.70, 36.90, 99, '118/76'),
(15, '29403524', 92.00, 105.20, 0.90, 17, 72, 90.00, 1.85, 26.50, 37.10, 98, '112/74'),
(16, '29242296', 88.30, 96.50, 0.89, 18, 74, 87.30, 1.78, 26.80, 36.80, 99, '120/75'),
(17, '23232323', 78.50, 91.20, 0.82, 16, 72, 73.50, 1.70, 25.80, 36.50, 98, '110/70'),
(18, '45678901', 84.00, 97.80, 0.85, 18, 76, 80.00, 1.75, 25.70, 37.00, 98, '118/78'),
(19, '12345678', 79.70, 93.50, 0.84, 20, 80, 76.70, 1.68, 24.90, 38.00, 86, '115/75'),
(20, '45678901', 86.20, 99.00, 0.87, 22, 78, 84.20, 1.73, 26.60, 36.50, 98, '120/80'),
(21, '29608695', 80.50, 95.20, 0.85, 18, 75, 70.50, 1.75, 23.00, 36.70, 98, '98/70'),
(22, '29242263', 78.00, 92.80, 0.84, 20, 80, 65.00, 1.68, 22.90, 36.50, 99, '120/80'),
(23, '29626152', 85.20, 98.50, 0.87, 16, 70, 75.20, 1.80, 23.20, 37.00, 98, '110/75'),
(24, '29209146', 82.40, 94.00, 0.88, 22, 78, 72.40, 1.73, 24.20, 36.80, 98, '115/70'),
(25, '44664585', 79.80, 91.30, 0.87, 19, 76, 69.80, 1.68, 24.70, 37.20, 99, '122/82'),
(26, '29563441', 76.50, 88.70, 0.86, 21, 82, 67.50, 1.65, 24.60, 36.90, 99, '118/78'),
(27, '29251122', 88.00, 100.20, 0.88, 17, 72, 80.00, 1.85, 23.50, 37.10, 98, '112/76'),
(28, '43640850', 84.30, 96.50, 0.89, 18, 74, 77.30, 1.78, 23.80, 36.60, 99, '120/75'),
(29, '29581399', 75.50, 90.20, 0.80, 16, 72, 68.50, 1.70, 23.70, 36.50, 98, '110/70'),
(30, '29302972', 82.00, 96.80, 0.85, 18, 76, 74.00, 1.75, 24.20, 37.00, 98, '118/78'),
(31, '29421408', 79.20, 92.50, 0.83, 20, 80, 70.20, 1.68, 22.90, 36.70, 98, '115/75'),
(32, '29698432', 86.40, 98.00, 0.88, 22, 78, 78.40, 1.73, 26.10, 36.50, 98, '120/80'),
(33, '29633621', 83.80, 94.30, 0.87, 19, 76, 75.80, 1.68, 26.80, 37.20, 99, '122/82'),
(34, '29451001', 80.50, 88.70, 0.86, 21, 82, 72.50, 1.65, 26.70, 36.90, 99, '118/76'),
(35, '29403524', 92.00, 105.20, 0.90, 17, 72, 90.00, 1.85, 26.50, 37.10, 98, '112/74'),
(36, '29570751', 88.30, 96.50, 0.89, 18, 74, 87.30, 1.78, 26.80, 36.80, 99, '120/75'),
(37, '29626152', 78.50, 91.20, 0.82, 16, 72, 73.50, 1.70, 25.80, 36.50, 98, '110/70'),
(38, '89012345', 84.00, 97.80, 0.85, 18, 76, 80.00, 1.75, 25.70, 37.00, 98, '118/78'),
(39, '66666666', 79.70, 93.50, 0.84, 20, 80, 76.70, 1.68, 24.90, 36.70, 98, '115/75');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('1234', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `registrolaboratoriosangre`
--
ALTER TABLE `registrolaboratoriosangre`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `DNI` (`DNI`);

--
-- Indices de la tabla `registrotriaje`
--
ALTER TABLE `registrotriaje`
  ADD PRIMARY KEY (`CodigoAtencion`),
  ADD KEY `DNI` (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registrolaboratoriosangre`
--
ALTER TABLE `registrolaboratoriosangre`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `registrotriaje`
--
ALTER TABLE `registrotriaje`
  MODIFY `CodigoAtencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registrolaboratoriosangre`
--
ALTER TABLE `registrolaboratoriosangre`
  ADD CONSTRAINT `registrolaboratoriosangre_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `pacientes` (`DNI`);

--
-- Filtros para la tabla `registrotriaje`
--
ALTER TABLE `registrotriaje`
  ADD CONSTRAINT `registrotriaje_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `pacientes` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
