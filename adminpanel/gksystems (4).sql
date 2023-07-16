-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2023 at 12:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gksystems`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowed_branches`
--

CREATE TABLE `allowed_branches` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `branch_name` text NOT NULL,
  `open_date` date NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `country` int(11) NOT NULL,
  `phone_mobile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(5) NOT NULL,
  `country_name` varchar(20) NOT NULL,
  `code` varchar(2) NOT NULL,
  `dial_code` varchar(5) NOT NULL,
  `currency_name` varchar(20) NOT NULL,
  `currency_symbol` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `currency_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `code`, `dial_code`, `currency_name`, `currency_symbol`, `currency_code`) VALUES
(1, 'Afghanistan', 'AF', '+93', 'Afghan afghani', '؋', 'AFN'),
(3, 'Albania', 'AL', '+355', 'Albanian lek', 'L', 'ALL'),
(4, 'Algeria', 'DZ', '+213', 'Algerian dinar', 'د.ج', 'DZD'),
(5, 'AmericanSamoa', 'AS', '+1684', 'afghani', '؋.', 'AFN'),
(6, 'Andorra', 'AD', '+376', 'Euro', '€', 'EUR'),
(7, 'Angola', 'AO', '+244', 'Angolan kwanza', 'Kz', 'AOA'),
(8, 'Anguilla', 'AI', '+1264', 'East Caribbean dolla', '$', 'XCD'),
(9, 'Antarctica', 'AQ', '+672', '', '', ''),
(10, 'Antigua and Barbuda', 'AG', '+1268', 'East Caribbean dolla', '$', 'XCD'),
(11, 'Argentina', 'AR', '+54', 'Argentine peso', '$', 'ARS'),
(12, 'Armenia', 'AM', '+374', 'Armenian dram', 'դր', 'AMD'),
(13, 'Aruba', 'AW', '+297', 'Aruban florin', 'ƒ', 'AWG'),
(14, 'Australia', 'AU', '+61', 'Australian dollar', '$', 'AUD'),
(15, 'Austria', 'AT', '+43', 'Euro', '€', 'EUR'),
(16, 'Azerbaijan', 'AZ', '+994', 'Azerbaijani manat', '₼', 'AZN'),
(17, 'Bahamas', 'BS', '+1242', 'Bahamian dollar', 'B$', 'BSD'),
(18, 'Bahrain', 'BH', '+973', 'Bahraini dinar', '.د.ب', 'BHD'),
(19, 'Bangladesh', 'BD', '+880', 'Bangladeshi taka', '৳', 'BDT'),
(20, 'Barbados', 'BB', '+1246', 'Barbadian dollar', '$', 'BBD'),
(21, 'Belarus', 'BY', '+375', 'Belarusian ruble', 'Br', 'BYR'),
(22, 'Belgium', 'BE', '+32', 'Euro', '€', 'EUR'),
(23, 'Belize', 'BZ', '+501', 'Belize dollar', '$', 'BZD'),
(24, 'Benin', 'BJ', '+229', 'West African CFA fra', 'Fr', 'XOF'),
(25, 'Bermuda', 'BM', '+1441', 'Bermudian dollar', '$', 'BMD'),
(26, 'Bhutan', 'BT', '+975', 'Bhutanese ngultrum', 'Nu.', 'BTN'),
(27, 'Bolivia, Plurination', 'BO', '+591', '', '', ''),
(28, 'Bosnia and Herzegovi', 'BA', '+387', '', '', ''),
(29, 'Botswana', 'BW', '+267', 'Botswana pula', 'P', 'BWP'),
(30, 'Brazil', 'BR', '+55', 'Brazilian real', 'R$', 'BRL'),
(31, 'British Indian Ocean', 'IO', '+246', '', '', ''),
(32, 'Brunei Darussalam', 'BN', '+673', '', '', ''),
(33, 'Bulgaria', 'BG', '+359', 'Bulgarian lev', 'лв', 'BGN'),
(34, 'Burkina Faso', 'BF', '+226', 'West African CFA fra', 'Fr', 'XOF'),
(35, 'Burundi', 'BI', '+257', 'Burundian franc', 'Fr', 'BIF'),
(36, 'Cambodia', 'KH', '+855', 'Cambodian riel', '៛', 'KHR'),
(37, 'Cameroon', 'CM', '+237', 'Central African CFA ', 'Fr', 'XAF'),
(38, 'Canada', 'CA', '+1', 'Canadian dollar', '$', 'CAD'),
(39, 'Cape Verde', 'CV', '+238', 'Cape Verdean escudo', 'Esc or $', 'CVE'),
(40, 'Cayman Islands', 'KY', '+ 345', 'Cayman Islands dolla', '$', 'KYD'),
(41, 'Central African Repu', 'CF', '+236', '', '', ''),
(42, 'Chad', 'TD', '+235', 'Central African CFA ', 'Fr', 'XAF'),
(43, 'Chile', 'CL', '+56', 'Chilean peso', '$', 'CLP'),
(44, 'China', 'CN', '+86', 'Chinese yuan', '¥ or 元', 'CNY'),
(45, 'Christmas Island', 'CX', '+61', '', '', ''),
(46, 'Cocos (Keeling) Isla', 'CC', '+61', '', '', ''),
(47, 'Colombia', 'CO', '+57', 'Colombian peso', '$', 'COP'),
(48, 'Comoros', 'KM', '+269', 'Comorian franc', 'Fr', 'KMF'),
(49, 'Congo', 'CG', '+242', '', '', ''),
(50, 'Congo, The Democrati', 'CD', '+243', '', '', ''),
(51, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', '$', 'NZD'),
(52, 'Costa Rica', 'CR', '+506', 'Costa Rican colón', '₡', 'CRC'),
(53, 'Ivory Coast', 'CI', '+225', 'West African CFA fra', 'Fr', 'XOF'),
(54, 'Croatia', 'HR', '+385', 'Croatian kuna', 'kn', 'HRK'),
(55, 'Cuba', 'CU', '+53', 'Cuban convertible pe', '$', 'CUC'),
(56, 'Cyprus', 'CY', '+357', 'Euro', '€', 'EUR'),
(57, 'Czech Republic', 'CZ', '+420', 'Czech koruna', 'Kč', 'CZK'),
(58, 'Denmark', 'DK', '+45', 'Danish krone', 'kr', 'DKK'),
(59, 'Djibouti', 'DJ', '+253', 'Djiboutian franc', 'Fr', 'DJF'),
(60, 'Dominica', 'DM', '+1767', 'East Caribbean dolla', '$', 'XCD'),
(61, 'Dominican Republic', 'DO', '+1849', 'Dominican peso', '$', 'DOP'),
(62, 'Ecuador', 'EC', '+593', 'United States dollar', '$', 'USD'),
(63, 'Egypt', 'EG', '+20', 'Egyptian pound', '£ or ج.م', 'EGP'),
(64, 'El Salvador', 'SV', '+503', 'United States dollar', '$', 'USD'),
(65, 'Equatorial Guinea', 'GQ', '+240', 'Central African CFA ', 'Fr', 'XAF'),
(66, 'Eritrea', 'ER', '+291', 'Eritrean nakfa', 'Nfk', 'ERN'),
(67, 'Estonia', 'EE', '+372', 'Euro', '€', 'EUR'),
(68, 'Ethiopia', 'ET', '+251', 'Ethiopian birr', 'Br', 'ETB'),
(69, 'Falkland Islands (Ma', 'FK', '+500', '', '', ''),
(70, 'Faroe Islands', 'FO', '+298', 'Danish krone', 'kr', 'DKK'),
(71, 'Fiji', 'FJ', '+679', 'Fijian dollar', '$', 'FJD'),
(72, 'Finland', 'FI', '+358', 'Euro', '€', 'EUR'),
(73, 'France', 'FR', '+33', 'Euro', '€', 'EUR'),
(74, 'French Guiana', 'GF', '+594', '', '', ''),
(75, 'French Polynesia', 'PF', '+689', 'CFP franc', 'Fr', 'XPF'),
(76, 'Gabon', 'GA', '+241', 'Central African CFA ', 'Fr', 'XAF'),
(77, 'Gambia', 'GM', '+220', '', '', ''),
(78, 'Georgia', 'GE', '+995', 'Georgian lari', 'ლ', 'GEL'),
(79, 'Germany', 'DE', '+49', 'Euro', '€', 'EUR'),
(80, 'Ghana', 'GH', '+233', 'Ghana cedi', '₵', 'GHS'),
(81, 'Gibraltar', 'GI', '+350', 'Gibraltar pound', '£', 'GIP'),
(82, 'Greece', 'GR', '+30', 'Euro', '€', 'EUR'),
(83, 'Greenland', 'GL', '+299', '', '', ''),
(84, 'Grenada', 'GD', '+1473', 'East Caribbean dolla', '$', 'XCD'),
(85, 'Guadeloupe', 'GP', '+590', '', '', ''),
(86, 'Guam', 'GU', '+1671', '', '', ''),
(87, 'Guatemala', 'GT', '+502', 'Guatemalan quetzal', 'Q', 'GTQ'),
(88, 'Guernsey', 'GG', '+44', 'British pound', '£', 'GBP'),
(89, 'Guinea', 'GN', '+224', 'Guinean franc', 'Fr', 'GNF'),
(90, 'Guinea-Bissau', 'GW', '+245', 'West African CFA fra', 'Fr', 'XOF'),
(91, 'Guyana', 'GY', '+595', 'Guyanese dollar', '$', 'GYD'),
(92, 'Haiti', 'HT', '+509', 'Haitian gourde', 'G', 'HTG'),
(93, 'Holy See (Vatican Ci', 'VA', '+379', '', '', ''),
(94, 'Honduras', 'HN', '+504', 'Honduran lempira', 'L', 'HNL'),
(95, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', '$', 'HKD'),
(96, 'Hungary', 'HU', '+36', 'Hungarian forint', 'Ft', 'HUF'),
(97, 'Iceland', 'IS', '+354', 'Icelandic króna', 'kr', 'ISK'),
(98, 'India', 'IN', '+91', 'Indian rupee', '₹', 'INR'),
(99, 'Indonesia', 'ID', '+62', 'Indonesian rupiah', 'Rp', 'IDR'),
(100, 'Iran, Islamic Republ', 'IR', '+98', '', '', ''),
(101, 'Iraq', 'IQ', '+964', 'Iraqi dinar', 'ع.د', 'IQD'),
(102, 'Ireland', 'IE', '+353', 'Euro', '€', 'EUR'),
(103, 'Isle of Man', 'IM', '+44', 'British pound', '£', 'GBP'),
(104, 'Israel', 'IL', '+972', 'Israeli new shekel', '₪', 'ILS'),
(105, 'Italy', 'IT', '+39', 'Euro', '€', 'EUR'),
(106, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', '$', 'JMD'),
(107, 'Japan', 'JP', '+81', 'Japanese yen', '¥', 'JPY'),
(108, 'Jersey', 'JE', '+44', 'British pound', '£', 'GBP'),
(109, 'Jordan', 'JO', '+962', 'Jordanian dinar', 'د.ا', 'JOD'),
(110, 'Kazakhstan', 'KZ', '+7 7', 'Kazakhstani tenge', '', 'KZT'),
(111, 'Kenya', 'KE', '+254', 'Kenyan shilling', 'Sh', 'KES'),
(112, 'Kiribati', 'KI', '+686', 'Australian dollar', '$', 'AUD'),
(113, 'Korea, Democratic Pe', 'KP', '+850', '', '', ''),
(114, 'Korea, Republic of S', 'KR', '+82', '', '', ''),
(115, 'Kuwait', 'KW', '+965', 'Kuwaiti dinar', 'د.ك', 'KWD'),
(116, 'Kyrgyzstan', 'KG', '+996', 'Kyrgyzstani som', 'лв', 'KGS'),
(117, 'Laos', 'LA', '+856', 'Lao kip', '₭', 'LAK'),
(118, 'Latvia', 'LV', '+371', 'Euro', '€', 'EUR'),
(119, 'Lebanon', 'LB', '+961', 'Lebanese pound', 'ل.ل', 'LBP'),
(120, 'Lesotho', 'LS', '+266', 'Lesotho loti', 'L', 'LSL'),
(121, 'Liberia', 'LR', '+231', 'Liberian dollar', '$', 'LRD'),
(122, 'Libyan Arab Jamahiri', 'LY', '+218', '', '', ''),
(123, 'Liechtenstein', 'LI', '+423', 'Swiss franc', 'Fr', 'CHF'),
(124, 'Lithuania', 'LT', '+370', 'Euro', '€', 'EUR'),
(125, 'Luxembourg', 'LU', '+352', 'Euro', '€', 'EUR'),
(126, 'Macao', 'MO', '+853', '', '', ''),
(127, 'Macedonia', 'MK', '+389', '', '', ''),
(128, 'Madagascar', 'MG', '+261', 'Malagasy ariary', 'Ar', 'MGA'),
(129, 'Malawi', 'MW', '+265', 'Malawian kwacha', 'MK', 'MWK'),
(130, 'Malaysia', 'MY', '+60', 'Malaysian ringgit', 'RM', 'MYR'),
(131, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', '.ރ', 'MVR'),
(132, 'Mali', 'ML', '+223', 'West African CFA fra', 'Fr', 'XOF'),
(133, 'Malta', 'MT', '+356', 'Euro', '€', 'EUR'),
(134, 'Marshall Islands', 'MH', '+692', 'United States dollar', '$', 'USD'),
(135, 'Martinique', 'MQ', '+596', '', '', ''),
(136, 'Mauritania', 'MR', '+222', 'Mauritanian ouguiya', 'UM', 'MRO'),
(137, 'Mauritius', 'MU', '+230', 'Mauritian rupee', '₨', 'MUR'),
(138, 'Mayotte', 'YT', '+262', '', '', ''),
(139, 'Mexico', 'MX', '+52', 'Mexican peso', '$', 'MXN'),
(140, 'Micronesia, Federate', 'FM', '+691', '', '', ''),
(141, 'Moldova', 'MD', '+373', 'Moldovan leu', 'L', 'MDL'),
(142, 'Monaco', 'MC', '+377', 'Euro', '€', 'EUR'),
(143, 'Mongolia', 'MN', '+976', 'Mongolian tögrög', '₮', 'MNT'),
(144, 'Montenegro', 'ME', '+382', 'Euro', '€', 'EUR'),
(145, 'Montserrat', 'MS', '+1664', 'East Caribbean dolla', '$', 'XCD'),
(146, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'د.م.', 'MAD'),
(147, 'Mozambique', 'MZ', '+258', 'Mozambican metical', 'MT', 'MZN'),
(148, 'Myanmar', 'MM', '+95', 'Burmese kyat', 'Ks', 'MMK'),
(149, 'Namibia', 'NA', '+264', 'Namibian dollar', '$', 'NAD'),
(150, 'Nauru', 'NR', '+674', 'Australian dollar', '$', 'AUD'),
(151, 'Nepal', 'NP', '+977', 'Nepalese rupee', '₨', 'NPR'),
(152, 'Netherlands', 'NL', '+31', 'Euro', '€', 'EUR'),
(153, 'Netherlands Antilles', 'AN', '+599', '', '', ''),
(154, 'New Caledonia', 'NC', '+687', 'CFP franc', 'Fr', 'XPF'),
(155, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', '$', 'NZD'),
(156, 'Nicaragua', 'NI', '+505', 'Nicaraguan córdoba', 'C$', 'NIO'),
(157, 'Niger', 'NE', '+227', 'West African CFA fra', 'Fr', 'XOF'),
(158, 'Nigeria', 'NG', '+234', 'Nigerian naira', '₦', 'NGN'),
(159, 'Niue', 'NU', '+683', 'New Zealand dollar', '$', 'NZD'),
(160, 'Norfolk Island', 'NF', '+672', '', '', ''),
(161, 'Northern Mariana Isl', 'MP', '+1670', '', '', ''),
(162, 'Norway', 'NO', '+47', 'Norwegian krone', 'kr', 'NOK'),
(163, 'Oman', 'OM', '+968', 'Omani rial', 'ر.ع.', 'OMR'),
(164, 'Pakistan', 'PK', '+92', 'Pakistani rupee', '₨', 'PKR'),
(165, 'Palau', 'PW', '+680', 'Palauan dollar', '$', ''),
(166, 'Palestinian Territor', 'PS', '+970', '', '', ''),
(167, 'Panama', 'PA', '+507', 'Panamanian balboa', 'B/.', 'PAB'),
(168, 'Papua New Guinea', 'PG', '+675', 'Papua New Guinean ki', 'K', 'PGK'),
(169, 'Paraguay', 'PY', '+595', 'Paraguayan guaraní', '₲', 'PYG'),
(170, 'Peru', 'PE', '+51', 'Peruvian nuevo sol', 'S/.', 'PEN'),
(171, 'Philippines', 'PH', '+63', 'Philippine peso', '₱', 'PHP'),
(172, 'Pitcairn', 'PN', '+872', '', '', ''),
(173, 'Poland', 'PL', '+48', 'Polish z?oty', 'zł', 'PLN'),
(174, 'Portugal', 'PT', '+351', 'Euro', '€', 'EUR'),
(175, 'Puerto Rico', 'PR', '+1939', '', '', ''),
(176, 'Qatar', 'QA', '+974', 'Qatari riyal', 'ر.ق', 'QAR'),
(177, 'Romania', 'RO', '+40', 'Romanian leu', 'lei', 'RON'),
(178, 'Russia', 'RU', '+7', 'Russian ruble', '', 'RUB'),
(179, 'Rwanda', 'RW', '+250', 'Rwandan franc', 'Fr', 'RWF'),
(180, 'Reunion', 'RE', '+262', '', '', ''),
(181, 'Saint Barthelemy', 'BL', '+590', '', '', ''),
(182, 'Saint Helena, Ascens', 'SH', '+290', '', '', ''),
(183, 'Saint Kitts and Nevi', 'KN', '+1869', '', '', ''),
(184, 'Saint Lucia', 'LC', '+1758', 'East Caribbean dolla', '$', 'XCD'),
(185, 'Saint Martin', 'MF', '+590', '', '', ''),
(186, 'Saint Pierre and Miq', 'PM', '+508', '', '', ''),
(187, 'Saint Vincent and th', 'VC', '+1784', '', '', ''),
(188, 'Samoa', 'WS', '+685', 'Samoan t?l?', 'T', 'WST'),
(189, 'San Marino', 'SM', '+378', 'Euro', '€', 'EUR'),
(190, 'Sao Tome and Princip', 'ST', '+239', '', '', ''),
(191, 'Saudi Arabia', 'SA', '+966', 'Saudi riyal', 'ر.س', 'SAR'),
(192, 'Senegal', 'SN', '+221', 'West African CFA fra', 'Fr', 'XOF'),
(193, 'Serbia', 'RS', '+381', 'Serbian dinar', 'дин. or din.', 'RSD'),
(194, 'Seychelles', 'SC', '+248', 'Seychellois rupee', '₨', 'SCR'),
(195, 'Sierra Leone', 'SL', '+232', 'Sierra Leonean leone', 'Le', 'SLL'),
(196, 'Singapore', 'SG', '+65', 'Brunei dollar', '$', 'BND'),
(197, 'Slovakia', 'SK', '+421', 'Euro', '€', 'EUR'),
(198, 'Slovenia', 'SI', '+386', 'Euro', '€', 'EUR'),
(199, 'Solomon Islands', 'SB', '+677', 'Solomon Islands doll', '$', 'SBD'),
(200, 'Somalia', 'SO', '+252', 'Somali shilling', 'Sh', 'SOS'),
(201, 'South Africa', 'ZA', '+27', 'South African rand', 'R', 'ZAR'),
(202, 'South Georgia and th', 'GS', '+500', '', '', ''),
(203, 'Spain', 'ES', '+34', 'Euro', '€', 'EUR'),
(204, 'Sri Lanka', 'LK', '+94', 'Sri Lankan rupee', 'Rs or රු', 'LKR'),
(205, 'Sudan', 'SD', '+249', 'Sudanese pound', 'ج.س.', 'SDG'),
(206, 'Suriname', 'SR', '+597', 'Surinamese dollar', '$', 'SRD'),
(207, 'Svalbard and Jan May', 'SJ', '+47', '', '', ''),
(208, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'L', 'SZL'),
(209, 'Sweden', 'SE', '+46', 'Swedish krona', 'kr', 'SEK'),
(210, 'Switzerland', 'CH', '+41', 'Swiss franc', 'Fr', 'CHF'),
(211, 'Syrian Arab Republic', 'SY', '+963', '', '', ''),
(212, 'Taiwan', 'TW', '+886', 'New Taiwan dollar', '$', 'TWD'),
(213, 'Tajikistan', 'TJ', '+992', 'Tajikistani somoni', 'ЅМ', 'TJS'),
(214, 'Tanzania, United Rep', 'TZ', '+255', '', '', ''),
(215, 'Thailand', 'TH', '+66', 'Thai baht', '฿', 'THB'),
(216, 'Timor-Leste', 'TL', '+670', '', '', ''),
(217, 'Togo', 'TG', '+228', 'West African CFA fra', 'Fr', 'XOF'),
(218, 'Tokelau', 'TK', '+690', '', '', ''),
(219, 'Tonga', 'TO', '+676', 'Tongan pa?anga', 'T$', 'TOP'),
(220, 'Trinidad and Tobago', 'TT', '+1868', 'Trinidad and Tobago ', '$', 'TTD'),
(221, 'Tunisia', 'TN', '+216', 'Tunisian dinar', 'د.ت', 'TND'),
(222, 'Turkey', 'TR', '+90', 'Turkish lira', '', 'TRY'),
(223, 'Turkmenistan', 'TM', '+993', 'Turkmenistan manat', 'm', 'TMT'),
(224, 'Turks and Caicos Isl', 'TC', '+1649', '', '', ''),
(225, 'Tuvalu', 'TV', '+688', 'Australian dollar', '$', 'AUD'),
(226, 'Uganda', 'UG', '+256', 'Ugandan shilling', 'Sh', 'UGX'),
(227, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', '₴', 'UAH'),
(228, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates', 'د.إ', 'AED'),
(229, 'United Kingdom', 'GB', '+44', 'British pound', '£', 'GBP'),
(230, 'United States', 'US', '+1', 'United States dollar', '$', 'USD'),
(231, 'Uruguay', 'UY', '+598', 'Uruguayan peso', '$', 'UYU'),
(232, 'Uzbekistan', 'UZ', '+998', 'Uzbekistani som', '', 'UZS'),
(233, 'Vanuatu', 'VU', '+678', 'Vanuatu vatu', 'Vt', 'VUV'),
(234, 'Venezuela, Bolivaria', 'VE', '+58', '', '', ''),
(235, 'Vietnam', 'VN', '+84', 'Vietnamese ??ng', '₫', 'VND'),
(236, 'Virgin Islands, Brit', 'VG', '+1284', '', '', ''),
(237, 'Virgin Islands, U.S.', 'VI', '+1340', '', '', ''),
(238, 'Wallis and Futuna', 'WF', '+681', 'CFP franc', 'Fr', 'XPF'),
(239, 'Yemen', 'YE', '+967', 'Yemeni rial', '﷼', 'YER'),
(240, 'Zambia', 'ZM', '+260', 'Zambian kwacha', 'ZK', 'ZMW'),
(241, 'Zimbabwe', 'ZW', '+263', 'Botswana pula', 'P', 'BWP');

-- --------------------------------------------------------

--
-- Table structure for table `daily_income`
--

CREATE TABLE `daily_income` (
  `id` int(11) UNSIGNED NOT NULL,
  `vehicle_reg_number` text NOT NULL,
  `currency` varchar(20) NOT NULL,
  `income_amount` decimal(10,2) NOT NULL,
  `vehicle_status` varchar(20) NOT NULL,
  `confirmation_check` tinyint(1) NOT NULL,
  `driver` text NOT NULL,
  `total_income` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_income`
--

INSERT INTO `daily_income` (`id`, `vehicle_reg_number`, `currency`, `income_amount`, `vehicle_status`, `confirmation_check`, `driver`, `total_income`, `created_at`) VALUES
(1, 'BAF 5679', 'ZMW', '760.00', 'serviceable', 1, '+260965990056', '760.00', '2023-07-10 20:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `estate_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `currency` varchar(50) NOT NULL,
  `purchase_amount` decimal(10,2) DEFAULT NULL,
  `current_value` decimal(10,2) DEFAULT NULL,
  `purchase_date` varchar(255) DEFAULT NULL,
  `rental_amount` decimal(10,2) DEFAULT NULL,
  `current_state` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`estate_id`, `category`, `condition`, `location`, `address`, `currency`, `purchase_amount`, `current_value`, `purchase_date`, `rental_amount`, `current_state`) VALUES
(1, 'Flats', 'Great', 'Lusaka', 'Woodlands', 'ZMW', '390000.00', '470000.00', '2023-02-06', '6700.00', 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `estate_images`
--

CREATE TABLE `estate_images` (
  `image_id` int(11) NOT NULL,
  `estate_id` int(11) DEFAULT NULL,
  `image_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estate_images`
--

INSERT INTO `estate_images` (`image_id`, `estate_id`, `image_path`) VALUES
(1, 1, 'uploads/64af1fa7ac033.jpeg'),
(2, 1, 'uploads/64af1fa8cfc88.jpeg'),
(3, 1, 'uploads/64af1fa993b9b.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `farm_id` int(11) NOT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `currency` varchar(50) NOT NULL,
  `purchase_amount` decimal(10,2) NOT NULL,
  `current_value` decimal(10,2) NOT NULL,
  `purchase_date` date NOT NULL,
  `measurement` varchar(50) NOT NULL,
  `farm_size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`farm_id`, `activity`, `location`, `address`, `currency`, `purchase_amount`, `current_value`, `purchase_date`, `measurement`, `farm_size`) VALUES
(1, 'Not yet', 'Mungule', 'along Mumbwa road.', 'ZMW', '250000.00', '40000.00', '2023-04-01', 'Hectre', 25);

-- --------------------------------------------------------

--
-- Table structure for table `farm_images`
--

CREATE TABLE `farm_images` (
  `image_id` int(11) NOT NULL,
  `farm_id` int(11) DEFAULT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farm_images`
--

INSERT INTO `farm_images` (`image_id`, `farm_id`, `image_path`) VALUES
(1, 1, 'uploads/64ae7989947ea.png'),
(2, 1, 'uploads/64ae7989c1f1e.png'),
(3, 1, 'uploads/64ae7989d45fd.jpg'),
(4, 1, 'uploads/64ae7989e346d.jpg'),
(5, 1, 'uploads/64ae798a049e9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lease_agreements`
--

CREATE TABLE `lease_agreements` (
  `id` int(11) NOT NULL,
  `landlord_name` varchar(255) DEFAULT NULL,
  `tenant_name` varchar(255) DEFAULT NULL,
  `tenant_phone` varchar(255) DEFAULT NULL,
  `flat_number` varchar(255) DEFAULT NULL,
  `lease_term` int(11) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `rent_amount` decimal(10,2) DEFAULT NULL,
  `security_deposit` decimal(10,2) DEFAULT NULL,
  `agreement_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lease_agreements`
--

INSERT INTO `lease_agreements` (`id`, `landlord_name`, `tenant_name`, `tenant_phone`, `flat_number`, `lease_term`, `currency`, `rent_amount`, `security_deposit`, `agreement_date`) VALUES
(1, 'Gift Katebe', 'Gregory Matenga', '+260976339200', '2 nd Street, Chambioli', 12, 'ZMW', '3500.00', '2500.00', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `loan_type` varchar(100) NOT NULL,
  `creditor` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `due_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `loan_type`, `creditor`, `amount`, `currency`, `due_date`, `status`) VALUES
(1, 'Vehicle Loan', 'ABSA', '77100.00', 'ZMW', '2023-09-30', 'On Going'),
(2, 'Web Development', 'Mutale Mulenga', '11000.00', 'ZMW', '2023-07-31', 'On Going');

-- --------------------------------------------------------

--
-- Table structure for table `loan_payments`
--

CREATE TABLE `loan_payments` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` date NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_payments`
--

INSERT INTO `loan_payments` (`id`, `loan_id`, `currency`, `amount`, `date_paid`, `balance`) VALUES
(2, 1, 'ZMW', '12900.00', '2023-07-02', '77100.00');

-- --------------------------------------------------------

--
-- Table structure for table `orphans`
--

CREATE TABLE `orphans` (
  `id` int(11) NOT NULL,
  `photo_path` text DEFAULT NULL,
  `names` text NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `caretaker_id` text NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orphans`
--

INSERT INTO `orphans` (`id`, `photo_path`, `names`, `age`, `gender`, `caretaker_id`, `date_added`) VALUES
(1, 'photos/appsumo_chat_gpt_banner.png', 'john doe', 9, 'Male', '+260978335567', '2023-07-01'),
(2, 'photos/agrofuel.png', 'Jane Doe', 13, 'Female', '+260978335567', '2023-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash`
--

CREATE TABLE `petty_cash` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_cash` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petty_cash`
--

INSERT INTO `petty_cash` (`id`, `date`, `description`, `amount`, `total_cash`) VALUES
(1, '2023-07-02', 'Cash Collections', '10000.00', '57143.00'),
(2, '2023-07-02', 'Cash Collections', '47000.00', '57143.00');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_transactions`
--

CREATE TABLE `petty_cash_transactions` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_type` enum('Cash In','Cash Out') DEFAULT NULL,
  `debit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `balance` decimal(10,2) DEFAULT 0.00,
  `payment_mode` enum('Mobile Money','Bank Transfer','Cash') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petty_cash_transactions`
--

INSERT INTO `petty_cash_transactions` (`id`, `date`, `description`, `amount`, `transaction_type`, `debit`, `credit`, `balance`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, '2023-06-04', 'Cash Collections', '55700.00', 'Cash In', '0.00', '55700.00', '55700.00', 'Cash', '2023-07-15 15:55:52', '2023-07-15 15:55:52'),
(2, '2023-06-07', 'TV Payment', '1000.00', 'Cash Out', '1000.00', '0.00', '54700.00', 'Cash', '2023-07-15 16:02:07', '2023-07-15 16:02:07'),
(4, '2023-06-07', 'Electricity', '1000.00', 'Cash Out', '1000.00', '0.00', '53700.00', 'Cash', '2023-07-15 16:04:24', '2023-07-15 16:04:24'),
(5, '2023-06-07', 'Transport Fee', '457.00', 'Cash Out', '457.00', '0.00', '53243.00', 'Cash', '2023-07-15 16:05:00', '2023-07-15 16:05:00'),
(6, '2023-07-13', 'Cash Received', '3900.00', 'Cash In', '0.00', '3900.00', '57143.00', 'Mobile Money', '2023-07-15 20:52:22', '2023-07-15 20:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `petty_transactions`
--

CREATE TABLE `petty_transactions` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `particulars` varchar(255) DEFAULT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problem_reports`
--

CREATE TABLE `problem_reports` (
  `problem_id` int(11) NOT NULL,
  `reporter_id` varchar(255) NOT NULL,
  `names` text NOT NULL,
  `email` text NOT NULL,
  `problemType` text NOT NULL,
  `problemDescription` text NOT NULL,
  `location` text DEFAULT NULL,
  `problemDate` date NOT NULL,
  `severity` varchar(255) NOT NULL,
  `urgency` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `status` enum('open','closed') NOT NULL,
  `date_submitted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problem_reports`
--

INSERT INTO `problem_reports` (`problem_id`, `reporter_id`, `names`, `email`, `problemType`, `problemDescription`, `location`, `problemDate`, `severity`, `urgency`, `reference`, `status`, `date_submitted`) VALUES
(1, '+260977330092', 'Morin Simboni', 'mulscoding@gmail.com', 'Roof leaks or damage', 'Noticed the roof has been leaking when it rains', NULL, '2023-06-06', 'High', 'High', '6496e3131ca20', 'closed', '2023-07-01 23:30:20'),
(2, '+260965990056', 'Simon Sinkungu', 'isni@hotmail.com', 'Tire Blowout', 'The tire has blown out on my way to deliver the products', NULL, '2023-07-01', 'High', 'Medium', '64a052faafaa5', 'open', '2023-07-01 23:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `report_attachments`
--

CREATE TABLE `report_attachments` (
  `file_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `file_name` text NOT NULL,
  `file_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_attachments`
--

INSERT INTO `report_attachments` (`file_id`, `report_id`, `reference`, `file_name`, `file_path`) VALUES
(1, 1, '6496e3131ca20', '13 Ways to Managing a customers complaints.jpeg', 'uploads/6496e3133c045_13 Ways to Managing a customers complaints.jpeg'),
(2, 1, '6496e3131ca20', 'Addresising modes.png', 'uploads/6496e3136f4c9_Addresising modes.png'),
(3, 2, '64a052faafaa5', 'brewme3.jpeg', 'uploads/64a052fb43e28_brewme3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sms_counter`
--

CREATE TABLE `sms_counter` (
  `id` int(11) NOT NULL,
  `receiver` text NOT NULL,
  `message` text NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp(),
  `remaining_sms` int(11) DEFAULT 500
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sms_counter`
--

INSERT INTO `sms_counter` (`id`, `receiver`, `message`, `date_sent`, `remaining_sms`) VALUES
(1, '096330092', 'new', '2023-07-05 12:28:46', 465),
(2, '+260976330092', 'Testing SMS', '2023-07-05 12:28:57', 465),
(3, '+260976330092', 'Another', '2023-07-05 12:29:57', 465),
(4, '+260976330092', 'Hello, Testing SMS.', '2023-07-05 12:35:25', 465),
(5, '+260970448181', 'Hello, Testing SMS.', '2023-07-05 12:35:25', 465),
(6, '+260976330092', 'want to see the call.', '2023-07-05 12:37:52', 465),
(7, 'undefined', 'Testing SMS for Tenants', '2023-07-07 02:02:54', 465),
(8, '+260977330092', 'Hello tenant', '2023-07-07 02:04:21', 465),
(9, '+260970448181', 'Simon Sinkungu has posted ZMW 760', '2023-07-10 18:27:55', 465),
(10, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 760', '2023-07-10 18:27:56', 465),
(11, '+260970448181', 'Simon Sinkungu has posted ZMW 760', '2023-07-10 18:30:11', 465),
(12, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 760', '2023-07-10 18:30:11', 465),
(13, '+260970448181', 'Simon Sinkungu has posted ZMW 670', '2023-07-10 18:35:25', 465),
(14, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 670', '2023-07-10 18:35:25', 465),
(15, '+260970448181', 'Simon Sinkungu has posted ZMW 590', '2023-07-10 18:37:44', 465),
(16, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 590', '2023-07-10 18:37:44', 465),
(17, '+260970448181', 'Simon Sinkungu has posted ZMW 780', '2023-07-10 18:38:40', 465),
(18, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 780', '2023-07-10 18:38:41', 465),
(19, '+260970448181', 'Simon Sinkungu has posted ZMW 460', '2023-07-10 18:41:33', 465),
(20, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 460', '2023-07-10 18:41:33', 465),
(21, '+260970448181', 'Simon Sinkungu has posted ZMW 500', '2023-07-10 21:59:20', 465),
(22, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 500', '2023-07-10 21:59:20', 465),
(23, '+260970448181', 'Simon Sinkungu has posted ZMW 790', '2023-07-10 22:02:11', 465),
(24, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 790', '2023-07-10 22:02:11', 465),
(25, '+260970448181', 'Simon Sinkungu has posted ZMW 690', '2023-07-10 22:12:08', 465),
(26, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 690', '2023-07-10 22:12:08', 465),
(27, '+260970448181', 'Simon Sinkungu has posted ZMW 200', '2023-07-10 22:16:24', 465),
(28, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 200', '2023-07-10 22:16:24', 465),
(29, '+260970448181', 'Simon Sinkungu has posted ZMW 200', '2023-07-10 22:21:10', 465),
(30, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 200', '2023-07-10 22:21:10', 465),
(31, '+260970448181', 'Simon Sinkungu has posted ZMW 400', '2023-07-10 22:22:54', 465),
(32, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 400', '2023-07-10 22:22:54', 465),
(33, '+260970448181', 'Simon Sinkungu has posted ZMW 1060', '2023-07-10 22:30:02', 465),
(34, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 1060', '2023-07-10 22:30:02', 465),
(35, '+260970448181', 'Simon Sinkungu has posted ZMW 760', '2023-07-10 22:32:29', 465),
(36, '+260976330092', 'Hello Simon Sinkungu you have posted ZMW 760', '2023-07-10 22:32:29', 465);

-- --------------------------------------------------------

--
-- Table structure for table `task_assignments`
--

CREATE TABLE `task_assignments` (
  `task_id` int(11) NOT NULL,
  `employeeId` text NOT NULL,
  `reference` text NOT NULL,
  `special_instructions` text DEFAULT NULL,
  `status` enum('open','closed') NOT NULL,
  `work_status` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `date_worked` date DEFAULT NULL,
  `date_assigned` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_assignments`
--

INSERT INTO `task_assignments` (`task_id`, `employeeId`, `reference`, `special_instructions`, `status`, `work_status`, `remarks`, `date_worked`, `date_assigned`) VALUES
(1, '+260965990056', '6496e3131ca20', 'The job has been pending for three weeks, look at it and give me a report ASAP.', 'closed', 'Works completed', 'Works completed and  roof fixed.', '2023-06-28', '2023-06-25 04:25:14'),
(2, '+260976034511', '6496e3131ca20', 'The job has been pending for three weeks, look at it and give me a report ASAP.', 'closed', 'Works completed', 'Works completed and  roof fixed.', '2023-06-28', '2023-06-25 04:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(256) NOT NULL,
  `pass_w` text NOT NULL,
  `phonenumber` varchar(150) NOT NULL,
  `activate` enum('0','1') NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `user_role` enum('superAdmin','admin','employee') NOT NULL,
  `department` text NOT NULL,
  `job_title` text DEFAULT NULL,
  `employee_contract` varchar(50) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `pass_w`, `phonenumber`, `activate`, `parent_id`, `user_role`, `department`, `job_title`, `employee_contract`, `date_added`) VALUES
(13, 'Mutale', 'Mutale', 'Mulenga', 'mutamuls@gmail.com', '$2y$10$TGpbkD.EBAzRTsDkUJ/CH.JlH4eN.vrxjfl/kCXCkL5j9g3ZfVLpC', 'RW1tYW51ZWwyMDE1', '+260969434999', '1', 6, 'superAdmin', 'all', NULL, NULL, '2023-02-09 16:27:20'),
(15, 'Bwalya', 'Bwalya', 'Bwwalya', '', '$2y$10$75Tk7f.MWDHtfDNw74V65u97ovn3JNGSHsZydbJo8g2Sc0JA/BLhy', 'aEVRcVBZZlNS', '+260967957997', '1', 6, 'superAdmin', 'all', NULL, NULL, '2023-02-14 09:37:18'),
(16, 'Malambo', 'Malambo', 'Kabangwe', 'malama@gmail.com', '$2y$10$cK5.BVxEpMPZkfxLHcPsZuy5lUhHjjQxqVNG4dlNyGAOepoHsTykK', 'MTIzNDU2', '+260977229012', '1', 6, 'employee', 'academics', 'Head Teacher', NULL, '2023-06-17 16:27:00'),
(17, 'Harrison', 'Harrison', 'Banda', 'ht.b@gmail.com', '$2y$10$2VzACzsLi74oniZzk0dJauXYjJ6kdKGH4fHcVh1feoT.u0dUiDBMO', 'MTIzNDU2', '+260976330092', '1', 6, 'employee', 'accounts', 'Accounts Assistance', NULL, '2023-06-20 13:04:38'),
(18, 'Torah', 'Torah', 'Siandubu', 'tora@gmail.com', '$2y$10$b.N5ulf9n6PSIB.SeaYXWeO2q1IrbIYDog.HKlDnyY4UireIj5GBi', 'MTIzNDU2', '+260977332211', '1', 6, 'employee', 'farms', 'Farm Coordinator', NULL, '2023-06-20 13:05:52'),
(19, 'Mukuka', 'Mukuka', 'Mukuka', 'mukuka@gmail.com', '$2y$10$UV/x6xxxsnN.cLoiaM0Uy.pMarseGkCGObb7fRlhXqXsI/xHM5HOe', 'MTIzNDU2', '+260966332211', '1', 6, 'employee', 'hospital', 'Hospital Manager', NULL, '2023-06-20 13:06:20'),
(20, 'Benny', 'Benny', 'Mofya', 'mofya.b@gmail.com', '$2y$10$6nowPSBTkGNQjwrTuUKAUupIY2whKUHMG4Ca0KkMhiKUee3bMdt92', 'MTIzNDU2', '+260955002211', '1', 6, 'employee', 'media', 'Camera/Graphics', NULL, '2023-06-20 13:06:46'),
(21, 'John', 'John', 'Lungu', '', '$2y$10$1PvNLH7eLdyYoJCigI93X.8Wkcil/jrbNQ1wO8Z3.bo21OxS1vrB6', 'MTIzNDU2', '+260976034511', '1', 6, 'employee', 'real-estates', 'Plumber', NULL, '2023-06-20 13:07:19'),
(22, 'Simon', 'Simon', 'Sinkungu', 'isni@hotmail.com', '$2y$10$S1OCrfvVx1Ep7Mfyv2bfTOsaF5QynEE8luDa62TkN6f6zlpp3vKxC', 'MTIzNDU2', '+260965990056', '1', 6, 'employee', 'transport-logistics', 'Driver', NULL, '2023-06-20 13:07:51'),
(23, 'Gift ', 'Gift ', 'Katebe', 's.lungu@gmail.com', '$2y$10$jVIKUFAIQqHzw1230jCmNeh6s/RtRhNxgPeM/ztm5y5WrmTkkdIRy', 'MTIzNDU2', '+260970448181', '1', 6, 'employee', 'orphanage', 'Care Taker', NULL, '2023-07-01 07:46:39'),
(24, 'Victor', 'Victor', 'Kasanga', '', '$2y$10$Sy9OhfNBIcazWM0EUD6.BeetvOFwr1C4IkL4AGiANMQALgo5tokhy', 'MTIzNDU2', '+260977101099', '0', 6, 'employee', 'transport-logistics', 'driver', 'Permanent', '2023-07-10 17:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `tenant_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text DEFAULT NULL,
  `phonenumber` text NOT NULL,
  `house_number` text NOT NULL,
  `num_people` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `password` text DEFAULT NULL,
  `pw` text NOT NULL,
  `leaseStartDate` date DEFAULT NULL,
  `leaseEndDate` date DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `rentAmount` decimal(10,2) NOT NULL,
  `paymentFrequency` varchar(50) NOT NULL,
  `activate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`tenant_id`, `firstname`, `lastname`, `email`, `phonenumber`, `house_number`, `num_people`, `parent_id`, `password`, `pw`, `leaseStartDate`, `leaseEndDate`, `currency`, `rentAmount`, `paymentFrequency`, `activate`) VALUES
(1, 'Morin', 'Simboni', 'mulscoding@gmail.com', '+260977330092', '1st Park, Jumbo Street.', 6, 6, '$2y$10$DIaybOBbiLtdoSn7x74zRuIfpnu37EOcP.ByVz0iL3sxriso7Fiti', '123456', '2022-12-20', '2023-08-31', 'ZMW', '2500.00', 'monthly', 1),
(2, 'Evans', 'Kateja', 'evans@gmail.com', '+260978033021', 'House Number 67, Rhodes Park', 3, 6, '$2y$10$/MC.uuQE601Nj0UdVFrI1u3xEnnone7KSJeGd547sM2klrE0hESz2', '123456', '2023-06-01', '2023-08-31', 'ZWM', '3000.00', 'monthly', 1),
(3, 'Gregory', 'Matenga', 'matenga@gmail.com', '+260976339200', '2 nd Street, Chambioli', 5, 6, '$2y$10$awb8Zf6LlA..0KKYWFl80eDQpNJjjRnSB0k2I9cubidiPYQ1.VMxu', '123456', '2021-12-01', '2023-12-31', 'ZMW', '3500.00', 'monthly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `currency` text NOT NULL DEFAULT 'ZMW',
  `amount` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `type` enum('income','expense') NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `currency`, `amount`, `description`, `type`, `added_by`, `added_on`) VALUES
(1, 'ZMW', '200.00', 'Driver', 'income', '+260969434999', '2023-07-03 00:55:08'),
(2, 'ZMW', '1000.00', 'Transport Fee', 'income', '+260969434999', '2023-07-03 13:06:59'),
(3, 'ZMW', '450.00', 'Rental', 'income', '+260969434999', '2023-07-03 13:11:32'),
(5, 'ZMW', '256.00', 'Advance', 'expense', '+260969434999', '2023-07-03 13:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `year` varchar(4) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `license_plate` varchar(20) DEFAULT NULL,
  `vin` varchar(17) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `currency` text NOT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `purchase_mileage` int(11) DEFAULT NULL,
  `driver` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `year`, `make`, `model`, `color`, `license_plate`, `vin`, `purchase_date`, `currency`, `purchase_price`, `purchase_mileage`, `driver`) VALUES
(1, '2003', 'BMW', ' 318TI                    ', 'Gray', 'BAF 5679', 'LIT786453WT', '2022-09-04', 'ZMW', '105000.00', 120000, '+260965990056');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_expenses`
--

CREATE TABLE `vehicle_expenses` (
  `id` int(11) UNSIGNED NOT NULL,
  `vehicle_reg_number` text NOT NULL,
  `currency` varchar(20) NOT NULL,
  `income_amount` decimal(10,2) NOT NULL,
  `vehicle_status` varchar(20) NOT NULL,
  `confirmation_check` tinyint(1) NOT NULL,
  `driver` text NOT NULL,
  `total_income` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_images`
--

CREATE TABLE `vehicle_images` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `license_plate` varchar(50) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_images`
--

INSERT INTO `vehicle_images` (`id`, `vehicle_id`, `license_plate`, `image_path`) VALUES
(1, 1, 'BAF 5679', 'uploads/64a83b21936ed.jpeg'),
(2, 1, 'BAF 5679', 'uploads/64a83b21a1157.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowed_branches`
--
ALTER TABLE `allowed_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `daily_income`
--
ALTER TABLE `daily_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`estate_id`);

--
-- Indexes for table `estate_images`
--
ALTER TABLE `estate_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_estate_id` (`estate_id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`farm_id`);

--
-- Indexes for table `farm_images`
--
ALTER TABLE `farm_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_farm_id` (`farm_id`);

--
-- Indexes for table `lease_agreements`
--
ALTER TABLE `lease_agreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_payments`
--
ALTER TABLE `loan_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orphans`
--
ALTER TABLE `orphans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petty_cash`
--
ALTER TABLE `petty_cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petty_cash_transactions`
--
ALTER TABLE `petty_cash_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petty_transactions`
--
ALTER TABLE `petty_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_reports`
--
ALTER TABLE `problem_reports`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `report_attachments`
--
ALTER TABLE `report_attachments`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `sms_counter`
--
ALTER TABLE `sms_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_assignments`
--
ALTER TABLE `task_assignments`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`tenant_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_expenses`
--
ALTER TABLE `vehicle_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowed_branches`
--
ALTER TABLE `allowed_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `daily_income`
--
ALTER TABLE `daily_income`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `estate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estate_images`
--
ALTER TABLE `estate_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farm_images`
--
ALTER TABLE `farm_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lease_agreements`
--
ALTER TABLE `lease_agreements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_payments`
--
ALTER TABLE `loan_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orphans`
--
ALTER TABLE `orphans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petty_cash`
--
ALTER TABLE `petty_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petty_cash_transactions`
--
ALTER TABLE `petty_cash_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `petty_transactions`
--
ALTER TABLE `petty_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problem_reports`
--
ALTER TABLE `problem_reports`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report_attachments`
--
ALTER TABLE `report_attachments`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_counter`
--
ALTER TABLE `sms_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `task_assignments`
--
ALTER TABLE `task_assignments`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `tenant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_expenses`
--
ALTER TABLE `vehicle_expenses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estate_images`
--
ALTER TABLE `estate_images`
  ADD CONSTRAINT `fk_estate_id` FOREIGN KEY (`estate_id`) REFERENCES `estates` (`estate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farm_images`
--
ALTER TABLE `farm_images`
  ADD CONSTRAINT `fk_farm_id` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD CONSTRAINT `vehicle_images_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
