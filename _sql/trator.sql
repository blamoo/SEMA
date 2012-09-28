-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `trator`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicao`
--

CREATE TABLE IF NOT EXISTS `medicao` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_trator` int(9) DEFAULT NULL,
  `rpm_motor` int(4) DEFAULT NULL,
  `rpm_tdp` float(10,3) DEFAULT NULL,
  `rpm_ventilador` int(4) DEFAULT NULL,
  `fm_clp_1` int(4) DEFAULT NULL,
  `fm_clp_2` int(4) DEFAULT NULL,
  `chv_clp_1` float(10,3) DEFAULT NULL,
  `chv_clp_2` float(10,3) DEFAULT NULL,
  `dados_forca` float(10,3) DEFAULT NULL,
  `dados_braco` float(10,4) DEFAULT NULL,
  `pi_kw_tdp` float(10,3) DEFAULT NULL,
  `pi_cv_tdp` float(10,3) DEFAULT NULL,
  `pi_kw_motor` float(10,3) DEFAULT NULL,
  `pi_cv_motor` float(10,3) DEFAULT NULL,
  `ti_kgfm_tdp` float(10,3) DEFAULT NULL,
  `ti_nm_tdp` float(10,3) DEFAULT NULL,
  `ti_kgfm_motor` float(10,3) DEFAULT NULL,
  `ti_nm_motor` float(10,3) DEFAULT NULL,
  `ti_reserva_torque` float(10,3) DEFAULT NULL,
  `cc_chv` float(10,3) DEFAULT NULL,
  `cc_chm` float(10,3) DEFAULT NULL,
  `cc_cs` float(10,3) DEFAULT NULL,
  `consumo_energetico` float(10,3) DEFAULT NULL,
  `eficiencia_termica` float(10,3) DEFAULT NULL,
  `energia_especifica` float(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `medicao`
--

INSERT INTO `medicao` (`id`, `id_trator`, `rpm_motor`, `rpm_tdp`, `rpm_ventilador`, `fm_clp_1`, `fm_clp_2`, `chv_clp_1`, `chv_clp_2`, `dados_forca`, `dados_braco`, `pi_kw_tdp`, `pi_cv_tdp`, `pi_kw_motor`, `pi_cv_motor`, `ti_kgfm_tdp`, `ti_nm_tdp`, `ti_kgfm_motor`, `ti_nm_motor`, `ti_reserva_torque`, `cc_chv`, `cc_chm`, `cc_cs`, `consumo_energetico`, `eficiencia_termica`, `energia_especifica`) VALUES
(1, 1, 1400, 406.977, 1778, 2121, 2121, 16.890, 16.720, 424.200, 0.3048, 54.025, 73.472, 60.028, 81.635, 129.296, 1268.395, 41.762, 409.688, NULL, 16.805, 14.116, 261.289, 621.113, 31.313, 3.215),
(2, 1, 1500, 436.047, 1905, 2131, 2131, 18.630, 18.250, 426.200, 0.3048, 58.157, 79.091, 64.619, 87.879, 129.906, 1274.376, 41.959, 411.620, NULL, 18.440, 15.490, 266.341, 681.542, 30.719, 3.154),
(3, 1, 1600, 465.116, 2032, 2140, 2140, 18.970, 19.250, 428.000, 0.3048, 62.296, 84.720, 69.218, 94.133, 130.454, 1279.758, 42.136, 413.358, NULL, 19.110, 16.052, 257.679, 706.306, 31.752, 3.260),
(4, 1, 1700, 494.186, 2159, 2155, 2155, 19.860, 19.960, 431.000, 0.3048, 66.654, 90.646, 74.060, 100.718, 131.369, 1288.728, 42.432, 416.256, NULL, 19.910, 16.724, 250.915, 735.874, 32.608, 3.348),
(5, 1, 1800, 523.256, 2286, 2147, 2147, 21.340, 20.950, 429.400, 0.3048, 70.312, 95.622, 78.125, 106.246, 130.881, 1283.944, 42.274, 414.711, NULL, 21.145, 17.762, 252.613, 781.519, 32.389, 3.325),
(6, 1, 1900, 552.326, 2413, 2108, 2108, 21.800, 22.500, 421.600, 0.3048, 72.871, 99.101, 80.967, 110.112, 128.504, 1260.621, 41.506, 407.177, NULL, 22.150, 18.606, 255.330, 818.664, 32.044, 3.290),
(7, 1, 2000, 581.395, 2540, 2089, 2089, 23.220, 23.000, 417.800, 0.3048, 76.014, 103.376, 84.460, 114.862, 127.345, 1249.259, 41.132, 403.507, NULL, 23.110, 19.412, 255.378, 854.146, 32.038, 3.289),
(8, 1, 2100, 610.465, 2667, 2042, 2042, 24.220, 24.580, 408.400, 0.3048, 78.019, 106.103, 86.688, 117.892, 124.480, 1221.152, 40.207, 394.429, NULL, 24.400, 20.496, 262.704, 901.824, 31.145, 3.198),
(9, 1, 2200, 639.535, 2794, 1990, 1990, 25.200, 26.280, 398.000, 0.3048, 79.653, 108.325, 88.504, 120.361, 121.310, 1190.055, 39.183, 384.385, NULL, 25.740, 21.622, 271.447, 951.350, 30.142, 3.095),
(10, 1, 2300, 668.605, 2921, 1886, 1886, 25.670, 25.630, 377.200, 0.3048, 78.922, 107.330, 87.691, 119.256, 114.971, 1127.861, 37.135, 364.296, NULL, 25.650, 21.546, 273.004, 948.024, 29.970, 3.077),
(11, 1, 2400, 697.674, 3048, 1225, 1225, 19.710, 19.890, 245.000, 0.3048, 53.490, 72.744, 59.434, 80.827, 74.676, 732.572, 24.120, 236.619, NULL, 19.800, 16.632, 310.935, 731.808, 26.314, 2.702),
(12, 1, 2500, 726.744, 3175, 135, 135, 10.630, 10.860, 27.000, 0.3048, 6.140, 8.351, 6.823, 9.279, 8.230, 80.732, 2.658, 26.076, NULL, 10.745, 9.026, 1469.888, 397.135, 5.566, 0.571);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trator`
--

CREATE TABLE IF NOT EXISTS `trator` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `rotacao_nominal_motor` int(10) unsigned NOT NULL,
  `rotacao_maxima_livre` int(10) unsigned NOT NULL,
  `relacao_transmissao_motor` float(10,3) NOT NULL,
  `relacao_transmissao_ventilador` float(10,3) NOT NULL,
  `horas_trator` int(10) unsigned NOT NULL,
  `aspiracao` varchar(100) NOT NULL,
  `densidade_combustivel` float(10,3) NOT NULL,
  `poder_calorifico` float(10,3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `trator`
--

INSERT INTO `trator` (`id`, `nome`, `rotacao_nominal_motor`, `rotacao_maxima_livre`, `relacao_transmissao_motor`, `relacao_transmissao_ventilador`, `horas_trator`, `aspiracao`, `densidade_combustivel`, `poder_calorifico`) VALUES
(1, 'Valtra BM 125i', 2300, 2522, 3.440, 1.270, 180, 'Turbo - Intercooler', 0.840, 44.000),
(3, 'asdfasf', 12, 12, 12.000, 12.000, 12, '1asdfa', 12.000, 12.000),
(4, 'asdfasf', 12, 12, 12.000, 12.000, 12, '1asdfa', 12.000, 12.000),
(7, 'redasdas', 1, 1, 1.000, 1.000, 1, '1', 1.000, 1.000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
