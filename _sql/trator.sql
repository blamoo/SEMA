-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

create database `trator`;
use `trator`;

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

DROP TABLE IF EXISTS `medicao`;
CREATE TABLE IF NOT EXISTS `medicao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_trator` int(10) unsigned NOT NULL,
  `rpm_motor` int(4) DEFAULT NULL,
  `rpm_tdp` float(10,3) DEFAULT NULL,
  `rpm_ventilador` int(4) DEFAULT NULL,
  `fm_clp_1` int(4) DEFAULT NULL,
  `fm_clp_2` int(4) DEFAULT NULL,
  `chv_clp_1` float(10,3) DEFAULT NULL,
  `chv_clp_2` float(10,3) DEFAULT NULL,
  `dados_forca` float(10,3) DEFAULT NULL,
  `dados_braco` float(10,3) DEFAULT NULL,
  `dados_fator_correcao` float(10,3) DEFAULT NULL,
  `pi_kw_tdp` float(10,3) DEFAULT NULL,
  `pi_cv_tdp` float(10,3) DEFAULT NULL,
  `pi_kw_motor` float(10,3) DEFAULT NULL,
  `pi_cv_motor` float(10,3) DEFAULT NULL,
  `ti_kgfm_tdp` float(10,3) DEFAULT NULL,
  `ti_nm_tdp` float(10,3) DEFAULT NULL,
  `ti_kgfm_motor` float(10,3) DEFAULT NULL,
  `ti_nm_motor` float(10,3) DEFAULT NULL,
  `cc_chv` float(10,3) DEFAULT NULL,
  `cc_chm` float(10,3) DEFAULT NULL,
  `cc_cs` float(10,3) DEFAULT NULL,
  `consumo_energetico` float(10,3) DEFAULT NULL,
  `eficiencia_termica` float(10,3) DEFAULT NULL,
  `energia_especifica` float(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_medicao_1` (`id_trator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `medicao`
--

INSERT INTO `medicao` (`id`, `id_trator`, `rpm_motor`, `rpm_tdp`, `rpm_ventilador`, `fm_clp_1`, `fm_clp_2`, `chv_clp_1`, `chv_clp_2`, `dados_forca`, `dados_braco`, `dados_fator_correcao`, `pi_kw_tdp`, `pi_cv_tdp`, `pi_kw_motor`, `pi_cv_motor`, `ti_kgfm_tdp`, `ti_nm_tdp`, `ti_kgfm_motor`, `ti_nm_motor`, `cc_chv`, `cc_chm`, `cc_cs`, `consumo_energetico`, `eficiencia_termica`, `energia_especifica`) VALUES
(1, 1, 1400, 406.977, 1778, 2121, 2121, 16.890, 16.720, 424.200, 0.305, 0.000, 54.061, 73.520, 60.067, 81.689, 129.381, 1269.228, 41.790, 409.957, 16.805, 14.116, 261.118, 621.113, 31.334, 3.217),
(2, 1, 1500, 436.047, 1905, 2131, 2131, 18.630, 18.250, 426.200, 0.305, 0.000, 58.195, 79.143, 64.661, 87.937, 129.991, 1275.212, 41.987, 411.890, 18.440, 15.490, 266.166, 681.542, 30.739, 3.156),
(3, 1, 1600, 465.116, 2032, 2140, 2140, 18.970, 19.250, 428.000, 0.305, 0.000, 62.337, 84.776, 69.263, 94.195, 130.540, 1280.597, 42.164, 413.630, 19.110, 16.052, 257.510, 706.306, 31.773, 3.262),
(4, 1, 1700, 494.186, 2159, 2155, 2155, 19.860, 19.960, 431.000, 0.305, 0.000, 66.697, 90.705, 74.108, 100.784, 131.455, 1289.574, 42.460, 416.529, 19.910, 16.724, 250.751, 735.874, 32.629, 3.350),
(5, 1, 1800, 523.256, 2286, 2147, 2147, 21.340, 20.950, 429.400, 0.305, 0.000, 70.359, 95.685, 78.176, 106.316, 130.967, 1284.786, 42.302, 414.983, 21.145, 17.762, 252.447, 781.519, 32.410, 3.327),
(6, 1, 1900, 552.326, 2413, 2108, 2108, 21.800, 22.500, 421.600, 0.305, 0.000, 72.918, 99.166, 81.020, 110.184, 128.588, 1261.448, 41.534, 407.445, 22.150, 18.606, 255.162, 818.664, 32.065, 3.292),
(7, 1, 2000, 581.395, 2540, 2089, 2089, 23.220, 23.000, 417.800, 0.305, 0.000, 76.064, 103.444, 84.516, 114.938, 127.429, 1250.078, 41.159, 403.772, 23.110, 19.412, 255.210, 854.146, 32.059, 3.291),
(8, 1, 2100, 610.465, 2667, 2042, 2042, 24.220, 24.580, 408.400, 0.305, 0.000, 78.071, 106.173, 86.745, 117.969, 124.562, 1221.953, 40.233, 394.688, 24.400, 20.496, 262.532, 901.824, 31.165, 3.200),
(9, 1, 2200, 639.535, 2794, 1990, 1990, 25.200, 26.280, 398.000, 0.305, 0.000, 79.705, 108.396, 88.562, 120.440, 121.390, 1190.836, 39.209, 384.637, 25.740, 21.622, 271.269, 951.350, 30.161, 3.097),
(10, 1, 2300, 668.605, 2921, 1886, 1886, 25.670, 25.630, 377.200, 0.305, 0.000, 78.974, 107.401, 87.748, 119.334, 115.046, 1128.601, 37.160, 364.535, 25.650, 21.546, 272.825, 948.024, 29.989, 3.079),
(11, 1, 2400, 697.674, 3048, 1225, 1225, 19.710, 19.890, 245.000, 0.305, 0.000, 53.525, 72.792, 59.473, 80.880, 74.725, 733.052, 24.136, 236.774, 19.800, 16.632, 310.731, 731.808, 26.331, 2.703),
(12, 1, 2500, 726.744, 3175, 135, 135, 10.630, 10.860, 27.000, 0.305, 0.000, 6.144, 8.356, 6.827, 9.285, 8.235, 80.785, 2.660, 26.093, 10.745, 9.026, 1468.925, 397.135, 5.570, 0.572);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trator`
--

DROP TABLE IF EXISTS `trator`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `trator`
--

INSERT INTO `trator` (`id`, `nome`, `rotacao_nominal_motor`, `rotacao_maxima_livre`, `relacao_transmissao_motor`, `relacao_transmissao_ventilador`, `horas_trator`, `aspiracao`, `densidade_combustivel`, `poder_calorifico`) VALUES
(1, 'Valtra BM 125i', 2300, 2522, 3.440, 1.270, 180, 'Turbo - Intercooler', 0.840, 44.000),
(8, '(trator sem medições)', 1231, 123, 86.000, 76.000, 76, '(nada)', 76.000, 76.000);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `medicao`
--
ALTER TABLE `medicao`
  ADD CONSTRAINT `FK_medicao_1` FOREIGN KEY (`id_trator`) REFERENCES `trator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
