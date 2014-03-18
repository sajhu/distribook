-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-03-2014 a las 16:42:41
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `distribook`
--
USE `1643258_distri`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `clave`, `tipo`) VALUES
(1, 'Santiago Rojas', 'sajhu93@gmail.com', '$P$Bt88ZOYbQCAGB7L53V5WAvQgkER1W91', 'Profesional'),
(2, 'Raul Arturo Escobar', 'raularturoes@hotmail.com', '$P$B6yO1y.h8hEqzUYfdMra.yeh8.x3Tf.', 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pubs`
--

CREATE TABLE IF NOT EXISTS `pubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci  NOT NULL,
  `autor` varchar(50) COLLATE utf8_unicode_ci  NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci   NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci   NOT NULL,
  `votos` int(10) NOT NULL DEFAULT '0',
  `suma` bigint(20) NOT NULL DEFAULT '0',
  `categoria` varchar(100) COLLATE utf8_unicode_ci   NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci   AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `pubs`
--

INSERT INTO `pubs` (`id`, `nombre`, `autor`, `descripcion`, `url`, `votos`, `suma`, `categoria`) VALUES
(1, 'Moby Dick', 'Herman Melville', 'Moby-Dick es una novela del escritor estadounidense Herman Melville publicada en 1851. Narra la travesía del barco ballenero Pequod, comandado por el capitán Ahab en la obsesiva y autodestructiva persecución de una gran ballena blanca (cachalote).\nAl margen de la persecución y evolución de sus personajes, el tema de la novela es eminentemente enciclopédico al incluir detalladas y extensas descripciones de la caza de las ballenas en el siglo XIX y multitud de otros detalles sobre la vida marinera de la época. Quizá por ello la novela no tuvo ningún éxito comercial en su primera publicación, aunque con posterioridad haya servido para cimentar la reputación del autor y situarlo entre los mejores escritores estadounidenses.\nLa frase inicial del narrador —«Call me Ishmael» en inglés, traducido al español a veces como «Llamadme Ismael», otras veces como «Pueden ustedes llamarme Ismael»—,2 se ha convertido en una de las citas más conocidas de la literatura en lengua inglesa.', 'moby-dick', 22, 78, 'Otros'),
(2, 'Ventilación Mecánica No Invasiva', 'Fabio Andrés Varón', 'Este libro constituye una base fuerte del conocimiento que se tiene en Hispanoamérica en ventilación no invasiva. Al momento de proyectar su ejecución se buscaron las figuras más relevantes del conocimiento en el tema. El libro cuenta con autores desde el sur del continente americano hasta el oriente de Europa. Los países que han participado en su realización son Argentina, Chile, Uruguay, Venezuela, Colombia, México, Portugal, España, Francia e Italia.\n\nEn la parte inicial, los lectores podrán encontrar la realidad actual de la ventilación no invasiva y su impacto en el planeta en cuanto a uso e indicaciones. Adicionalmente se profundiza en las bases teóricas y fisiológicas que permiten su utilización, exponiendo previamente la fisiopatología de la falla respiratoria.', 'varon', 1, 5, 'UCI'),
(3, 'Emergencias en cardiología pediátrica', 'Antonio Augusto B. Lopes', 'La insuficiencia cardíaca es un síndrome clínico complejo con múltiples etiologías y diversas manifestaciones clínicas (1). Dentro de estas últimas, el desarrollo de bajo gasto cardíaco o choque cardiogénico está presente en los casos de disfunción miocárdica primaria, como en las miocardiopatías dilatadas y en las secundarias, a sobrecarga de volumen y presión, como en las cardiopatías congénitas o adquiridas.\r\n\r\nLa etiología de la insuficiencia cardíaca en el niño es bastante distinta de aquella evidenciada en los adultos. La asociación con síndromes genéticos está documentada hasta en un 27% de los casos, y entre 25 y 75% es secundaria a cardiopatía congénita (1). En cardiopatía congénita, en forma habitual se evidencian señales de insuficiencia cardíaca sin disfunción sistólica que cursan con hiperflujo pulmonar, el cual también hace parte de este contexto (1, 2).', 'lopes', 2, 3, 'Pediatría'),
(4, 'Perfusión Tisular. Evidencia médica y estrategia clínica', 'Alonso Gómez', 'Muchos años han pasado desde cuando surgieron las primeras células en las vertientes de las dorsales oceánicas. Estos primeros organismos unicelulares se encontraban inmersos en el mar el cual los protegía de la luz ultravioleta y les ofrecía un medio para el intercambio inmediato. Así, los primeros organismos tomaron del mar los nutrientes y a él enviaban sus desechos metabólicos, gracias a la difusión directa a través de sus membranas.\r\n\r\nCuando surge la pluricelularidad, aparecen células que se distancian cada vez más del mar que las rodeaba, creándose así una barrera para la difusión efectiva de nutrientes y desechos. Se planteaba entonces un reto evolutivo: ¿cómo proveer a las células de un mecanismo expedito de intercambio con el medio?\r\n\r\nPensemos en el ser humano como un organismo pluricelular ya formado. A la velocidad de la difusión simple, una molécula de agua gastaría 25 años para hacer el recorrido entre la cabeza y el dedo gordo del pié! En la práctica, no habría espacio para un intercambio oportuno entre la célula y el medio.', 'gomez', 0, 0, 'UCI'),
(5, 'Cardiología Pedriática Práctica', 'Miguel Ronderos Dumit', 'Sección I: Generalidades 1.	Anatomía 2.	Embriología 3. Determinación del situs visceroatrial 4. Adaptación post-natal 5. Historia clínica en el paciente cardiópata 6.	Soplos normales 7.	Dolor torácico 8. Aspectos de interpretación del electrocardiograma en pediatría 9.	Enfoque inicial del paciente pediátrico con taquicardia supraventricular Sección II: Cardiopatías congénitas más frecuentes en la práctica clínica 10. Comunicación Inter-Aurícular (CIA) 11. Comunicación Inter-Ventricular (CIV) 12. Persistencia del Ductus Arterioso (PDA) 13. Canal Atrio-Ventricular (Canal AV) 14. Estenosis Pulmonar (EP) 15. Estenosis valvular aórtica (EA) 16. Coartación de aorta 17. Tetralogía de Fallot (T De F) 18. Transposición de las grandes arterias (TGA) 19. Atresia Tricuspidea (AT) 20. Drenaje Venoso Anómalo Total (DVAT) 21. Truncus arterioso 22. Patología mitral Sección III: Tópicos de interés en cardiología pediátrica 23. Fiebre reumática 24. Endocarditis infecciosa 25. Enfermedad de Kawasaky 26. Miocarditis 27. Manejo del paciente con crisis de hipertensión pulmonar 28. Manejo del paciente con crisis de hipoxia 29. Hipoxemia crónica 30. Tratamiento quirúrgico de las cardiopatías congénitas 31. Glenn bidireccional 32. Operación de Fontan 33. Sindrome postpericardiotomía 34. Cuidados de enfermeria 35. Lecturas recomendadas', 'ronderos', 0, 0, 'Pediatría'),
(6, 'Monitorización y soporte hemodinámico pediátrico y neonatal', 'Arnaldo Prata Barbosa', 'CONTENIDO: 1.	Embriología y Anatomía del Sistema Cardiovascular 2.	Principios de Fisiología Cardiovascular 3.	Interacción Cardioventilatoria 4.	Monitorización Hemodinámica básica 5. Monitorización Hemodinámica avanzada 6.	Disfunción Miocárdica 7.	Reposición Volémica 8. Drogas Vasoactivas 9.	Choque Hipovolémico 10.	Choque Cardiogénico 11.	Choque Séptico 12. Otros tipos de Choque 13.	Soporte Hemodinámica Extracorpóreo 14.	Cuidados de Fisioterapia para el Paciente con Alteraciones hemodinámicas 15.	Cuidados de Enfermería para el Paciente con Alteraciones Hemodinámicas Índice temático', 'prata', 3, 12, 'Neurología');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
