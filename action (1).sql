-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Бер 05 2016 р., 13:14
-- Версія сервера: 5.6.28-0ubuntu0.15.04.1
-- Версія PHP: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `action`
--

-- --------------------------------------------------------

--
-- Структура таблиці `advertisements`
--

CREATE TABLE IF NOT EXISTS `advertisements` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `sel_comment` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `category_id`, `user_id`, `read`, `status`, `sel_comment`, `published`, `url`, `created_at`, `updated_at`) VALUES
(2, 'Ворота гаражные секцыонные', '<p>Нужны&nbsp;Секционные гаражные ворота от европейского производителя &quot;KRISPOL&quot;.</p>\r\n\r\n<p>Когда смотришь на дом, сложно не согласиться, что гаражные ворота являются его визитной карточкой &mdash; их колористика, форма и исполнение подчеркивают характер дома и являются неотъемлемым элементом его целесности.</p>\r\n\r\n<p>Поэтому необходимо учесть каждую деталь. KRISPOL дает Вам возможность идеально подобрать вид гаражных ворот. 4 вида рельефа ворот, все цвета RAL, 28 видов ламинатов.</p>\r\n', 2, 1, 90, 'default', 0, 1, '2-vorota-garazhnye-sekcyonnye', '2016-01-31 18:21:08', '2016-02-28 15:53:53'),
(3, 'Куплю Мережевий, інтернет кабель ', '<p><img alt="" src="http://img33.olx.ua/images_slandocomua/293998654_1_1000x700_merezheviy-nternet-kabel-internet-rovno.jpg" style="height:361px; width:644px" /></p>\r\n', 1, 3, 8, 'blocked', 4, 1, '3-kuplyu-merezhevii-internet-kabel', '2016-01-31 18:14:02', '2016-03-05 09:12:00'),
(7, 'Потрібні б/у двері', '<p>Двері б/у.</p>\r\n\r\n<p>Розмір 0,87х2,0</p>\r\n\r\n<p>Для пуску газу в будинок.</p>\r\n\r\n<p>Самовивоз.</p>\r\n', 2, 1, 60, 'default', 0, 1, '7-potribni-bu-dveri', '2016-02-02 19:14:30', '2016-02-28 15:57:29'),
(8, 'Потрібно 3 пластикових вікна', '<p>З провідних віконних профілів Rehau,Veka,WDS.</p>\r\n\r\n<p><strong>Пропонуйте ціни!</strong></p>\r\n', 2, 2, 49, 'top', 0, 1, '8-potribno-3-plastikovih-vikna', '2016-02-13 13:16:06', '2016-02-28 16:02:02'),
(9, 'Hammerite-фарба для металу з молотковим ефектом.', '<p>Hammerite фарба для металу прямо по іржі.Використовується для фарбування кованих виробів ,огорожі та ін</p>\r\n\r\n<p>Потрібно 10 банок</p>\r\n\r\n<p>&nbsp;</p>\r\n', 5, 1, 1, 'default', 0, 1, '9-hammerite-farba-dlya-metalu-z-molotkovim-efektom', '2016-03-05 08:43:21', '2016-03-05 08:43:22'),
(10, 'Куплю будівельну хімію', '<p>Куплю :&nbsp;паркетні клеї, самовирівнюючі суміші, грунтовки, шпаклівки,струмопровідні клеї.</p>\r\n', 3, 1, 1, 'top', 0, 1, '10-kuplyu-budivelnu-himiyu', '2016-03-05 08:45:15', '2016-03-05 08:45:15'),
(11, 'Шукаю набор инструментов ключей ключі інструменти ONEX GERMAN STYLE 108 ел', '<p>Ключі виконані з дуже хорошої хром-ванадієвої сталі !<br />\r\nМодель: TA200 108 елементов<br />\r\nМатеріали: алюміній, пластик , нержавіюча сталь, хром- ванадій<br />\r\nГоловки1/2&quot;:10,11,12,13,14,15,16,17,18,19,20,21,22,24,27,30,32mm<br />\r\nГоловки длинные 1/2&quot;:14,15,17,19,22mm<br />\r\nГоловки для свеч 1/2&quot;:16,21mm<br />\r\nГоловки 1/4&quot;:4,4.5,5,5.5,6,7,8,9,10,11,12,13,14mm<br />\r\nГоловки длинные 1/4&quot;:6,7,8,9,10,11,12,13mm<br />\r\nГоловки 1/4&quot; с битами: Torx(T8,10,15,20,25,27,30),<br />\r\nГоловки 1/4&quot; с битами: Imbus(3,4,5,6mm),<br />\r\nГоловки 1/4&quot; с битами: PZ(1,2),PH(1,2),<br />\r\nГоловки 1/4&quot; с битами: Плоские(4,5.5,6.5mm)<br />\r\nБиты: Imbus(7,8,10,12,14mm),<br />\r\nБиты: PH(3,4), PZ(3,4),<br />\r\nБиты: Плоские (8,10,12mm),<br />\r\nБиты: Torx(T40,45,50,55,60<br />\r\nОтвертка 1/4&quot; к головкам и битам<br />\r\nПереходник к битам 1/2&quot;<br />\r\nТрещотки 1/2&quot; i 1/4&quot;<br />\r\nУдлинители 1/2&quot;(120,235mm) и 1/4&quot;(50,70mm)<br />\r\nТ образный вороток на квадрат 1/4&quot;<br />\r\nКарданный шарнир 1/2&quot; i 1/4&quot;<br />\r\nКлючи imbus L-образные (1.5,2,3mm)<br />\r\nВнутренняя головка TORX 1/2&quot;: (E10,11,12,14,16,18,20,24)<br />\r\nВнутренняя головка TORX 1/4&quot;: (E4,5,6,7,8)</p>\r\n\r\n<p><img alt="" src="http://img12.olx.ua/images_slandocomua/267344252_5_1000x700_nabor-instrumentov-klyuchey-klyuch-nstrumenti-onex-german-style-108-el-lvovskaya-oblast_rev011.jpg" style="height:375px; width:500px" /></p>\r\n', 4, 1, 1, 'top', 0, 1, '11-shukayu-nabor-instrumentov-klyuchei-klyuchi-instrumenti-onex-german-style-108-el', '2016-03-05 08:47:48', '2016-03-05 08:47:48'),
(12, 'Куплю Холодильник Liebherr cun 3923', '<p>Морозильная камера снизу<br />\r\n<br />\r\nХарактеристики<br />\r\nКоличество камер 2<br />\r\nОбъем холодильной камеры 232 л<br />\r\nОбъем морозильной камеры 123 л<br />\r\nОбщий объем 355 л<br />\r\nУправление кнопочные переключатели<br />\r\nКол-во компрессоров 1<br />\r\nКол-во контуров охлаждения 1<br />\r\nТемпература морозильной камеры до -24&deg;C<br />\r\nВремя сохранения холода 25 ч<br />\r\nМощность замораживания 16 кг/сутки<br />\r\nФункции/возможности<br />\r\nФункции Автоматическая разморозка<br />\r\nИндикатор закрытия дверцы<br />\r\nПеревешивание дверей<br />\r\nБыстрая заморозка<br />\r\nАнтибактериальная защита<br />\r\nNo Frost морозильная камера<br />\r\n<br />\r\nОбщие характеристики<br />\r\nДисплей<br />\r\nКласс энергопотребления A+ / 341 кВт/год /<br />\r\nУровень шума 41 дБ<br />\r\nГабариты (ВхШхГ) 201х60х63 см</p>\r\n', 6, 1, 1, 'default', 0, 1, '12-kuplyu-holodilnik-liebherr-cun-3923', '2016-03-05 08:50:38', '2016-03-05 08:50:38'),
(13, 'Потрібен Набір для фугования плитки', '<p>Комплект для фугования KUBALA: ведро на 20 л с роликами для отжима губки и решеткой, колеса к ведру, резиновый шпатель для затирания и терка с губкой для вымывания фуги. Производство ПОЛЬША.</p>\r\n\r\n<p><img alt="" src="http://img08.olx.ua/images_slandocomua/270831818_4_644x461_nabor-dlya-fugovaniya-plitki-dom-i-sad_rev003.jpg" /></p>\r\n', 4, 1, 2, 'default', 0, 1, '13-potriben-nabir-dlya-fugovaniya-plitki', '2016-03-05 08:51:59', '2016-03-05 08:54:24'),
(14, 'Фрезировані стамески! Різні профіля!', '<p>Фрезировані різці, різних профелів, зроблені на основі прямих стамесок радянських часів, ширина 32мм, якісь сталі висока,марка 9хф,заточку тримає довго</p>\r\n', 8, 3, 1, 'default', 0, 1, '14-frezirovani-stameski-rizni-profilya', '2016-03-05 08:57:29', '2016-03-05 08:57:29'),
(15, 'Потрібна Коломийська цегла', '<p>10 піддонів</p>\r\n', 9, 2, 3, 'default', 0, 1, '15-potribna-kolomiiska-cegla', '2016-03-05 08:58:45', '2016-03-05 09:11:44'),
(16, 'Цегла подвійна 2,12.Цегла потовщена.Блоки Leier.', '<p>-Цегла подвійна 250-120-138мм<br />\r\n<br />\r\n-Цегла потовщена 250-120-88мм<br />\r\n<br />\r\n-Керамічний блок Leier(45)(38)(25)(11,5)</p>\r\n\r\n<p>&nbsp;</p>\r\n', 9, 1, 1, 'default', 0, 1, '16-cegla-podviina-212cegla-potovshchenabloki-leier', '2016-03-05 08:59:54', '2016-03-05 08:59:54'),
(17, 'Куплю Цеглу австрійська', '<p>з різними написами в кількох кольорових відтінках</p>\r\n\r\n<p><img alt="" src="http://img18.olx.ua/images_slandocomua/189299099_3_644x461_tsegla-avstryska-kirpich-beton-penobloki.jpg" style="height:461px; width:617px" /></p>\r\n', 9, 3, 1, 'default', 0, 1, '17-kuplyu-ceglu-avstriiska', '2016-03-05 09:01:58', '2016-03-05 09:01:58'),
(18, 'Потрібні Доски Ясень 50 мм, 8-10%, 1 сорт.', '<p>оска не обрезная 50 мм. 1 сорт влажность 8-10 %, длина 3 м. находитс в сухом отапливаемом помещении. Наличие м3 -уточняйте дополнительно.</p>\r\n', 10, 1, 1, 'default', 0, 1, '18-potribni-doski-yasen-50-mm-8-10-1-sort', '2016-03-05 09:04:28', '2016-03-05 09:04:28'),
(19, 'Паркет.Паркетная Доска Дуб.', '<p>Шукаю:</p>\r\n\r\n<p><img alt="" src="http://img17.olx.ua/images_slandocomua/296477058_1_644x461_parketparketnaya-doska-dubparket-dubparketna-doshka-dubparket-masiv-kiev_rev004.jpg" style="height:461px; width:614px" /></p>\r\n', 10, 2, 1, 'default', 0, 1, '19-parketparketnaya-doska-dub', '2016-03-05 09:06:47', '2016-03-05 09:06:48');

-- --------------------------------------------------------

--
-- Структура таблиці `baners`
--

CREATE TABLE IF NOT EXISTS `baners` (
`id` int(10) unsigned NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `baners`
--

INSERT INTO `baners` (`id`, `note`, `image`, `type`, `url`) VALUES
(1, 'baner1', '1.gif', 'a1', 'https://www.google.com.ua/'),
(2, 'baner2', '2.jpg', 'a1', 'https://www.google.com.ua/'),
(3, 'baner 3', '3.gif', 'b1', 'https://www.google.com.ua/'),
(4, 'baner4', '4.gif', 'b2', 'https://www.google.com.ua/'),
(5, 'baner5', '5.gif', 'b1', 'https://www.google.com.ua/');

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `uk_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ru_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `uk_title`, `ru_title`, `icon`, `url`, `deleted_at`) VALUES
(1, 'Електрика', 'Электрика', 'fa-plug', 'electronics', NULL),
(2, 'Двері, вікна', 'Двери, окна', 'fa-hospital-o ', 'vikna-dveri', NULL),
(3, 'БУДІВЕЛЬНА ХІМІЯ', 'СТРОИТЕЛЬНАЯ ХИМИЯ', 'fa-flask', 'budivelna-chimia', NULL),
(4, 'Інструмент', 'Инструмент', 'fa-cog', 'instrument', NULL),
(5, 'ФАРБИ , ГРУНТОВКИ , ЕМАЛІ', 'КРАСКИ, грунтовки, эмали', 'fa-cubes', 'kraski-emali', NULL),
(6, 'САНТЕХНІКА', 'САНТЕХНИКА', 'fa-archive ', 'santechnika', NULL),
(7, 'ГОСПОДАРЧІ ТОВАРИ', 'ХОЗЯЙСТВЕННЫЕ ТОВАРЫ', 'fa-leaf ', 'hozaistvivni-tovari', NULL),
(8, 'ОЗДОБЛЮВАЛЬНІ МАТЕРІАЛИ', 'ОТДЕЛОЧНЫЕ МАТЕРИАЛЫ', 'fa-paw', 'ozdoblenya-materal', NULL),
(9, 'Цегла', 'Кирпич', 'fa-sitemap', 'kirpich', NULL),
(10, 'Лісо - пиломатеріали', 'Лесо - пиломатериалы', 'fa-tree', 'leso-pilo-aterialu', NULL),
(11, 'first', 'first', 'first', 'first', '2016-02-28 10:46:14'),
(12, 'second1', 'second2', 'second3', 'second1', '2016-02-28 10:47:26');

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(10) unsigned NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advertisement_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `text`, `price`, `advertisement_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'тестова пропозиція', '500 грн', 2, 2, '2016-02-13 12:52:53', '2016-02-13 12:52:53'),
(3, 'Є саме те що вам потрібно!', '500 грн', 8, 1, '2016-02-13 13:49:17', '2016-02-13 13:49:17'),
(4, 'Можу продати! 100 м є', '5грн/1м', 3, 1, '2016-03-05 09:09:53', '2016-03-05 09:09:53');

-- --------------------------------------------------------

--
-- Структура таблиці `help_page`
--

CREATE TABLE IF NOT EXISTS `help_page` (
`id` int(11) NOT NULL,
  `text_uk` text NOT NULL,
  `text_ru` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `help_page`
--

INSERT INTO `help_page` (`id`, `text_uk`, `text_ru`) VALUES
(1, '<ol>\r\n	<li><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec purus sem, lacinia ac nisi tempus, euismod feugiat metus.</em></li>\r\n	<li>Suspendisse rhoncus tincidunt interdum. Nam imperdiet sapien eleifend est vestibulum varius. Mauris ultricies tempor tellus at facilisis. Fusce vitae leo tincidunt, vulputate nunc in, suscipit mi. Proin ligula neque, porttitor et quam quis, porta eleifend quam. Phasellus sit amet sapien in ipsum tincidunt tincidunt sit amet ac lectus. Sed a dapibus urna. Vestibulum dapibus enim et accumsan ultrices.</li>\r\n	<li>Sed facilisis urna sollicitudin, vestibulum est sed, tempor enim. Vestibulum ut metus eros. Suspendisse auctor odio neque, eu pellentesque erat commodo eget. Phasellus <strong>sit amet quam sit amet odio fringilla accumsan et suscipit velit. </strong></li>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum interdum lorem id porttitor. Aenean id venenatis eros, ut posuere enim. Vivamus vel gravida magna. Vestibulum aliquet tempor ex quis dignissim. Pellentesque ut nunc quis dolor finibus lacinia sed vel odio. Nam efficitur quam at condimentum luctus. Aenean quis magna ac quam efficitur sollicitudin nec et ex.</li>\r\n	<li>Vestibulum ultrices viverra purus vitae scelerisque. Aliquam feugiat sollicitudin arcu, et aliquet lacus posuere vel. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque dignissim aliquam diam, id consectetur sapien auctor ac. Maecenas mattis augue scelerisque elit consectetur ultricies. Mauris vehicula justo quis rhoncus semper.</li>\r\n	<li>Duis ultrices, orci posuere porta molestie, purus ex malesuada est, id varius sem ipsum eu dui. Nullam nibh enim, dignissim eget risus non, varius tristique turpis. Proin consequat vulputate augue sit amet porta. Integer id mauris quam. Donec pharetra ante nec maximus sodales. In faucibus tincidunt ligula sed suscipit. Praesent id sem orci.</li>\r\n	<li>Cras eu scelerisque arcu, eget finibus dui. <strong>Nunc nec lacus tincidunt nisi ullamcorper efficitur.</strong></li>\r\n</ol>\r\n', '<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec purus sem, lacinia ac nisi tempus, euismod feugiat metus. Suspendisse rhoncus tincidunt interdum. Nam imperdiet sapien eleifend est vestibulum varius. Mauris ultricies tempor tellus at facilisis. Fusce vitae leo tincidunt, vulputate nunc in, suscipit mi. Proin ligula neque, porttitor et quam quis, porta eleifend quam. Phasellus sit amet sapien in ipsum tincidunt tincidunt sit amet ac lectus. Sed a dapibus urna. Vestibulum dapibus enim et accumsan ultrices.</li>\r\n	<li>Sed facilisis urna sollicitudin, vestibulum est sed, tempor enim. Vestibulum ut metus eros. Suspendisse auctor odio neque, eu pellentesque erat commodo eget. Phasellus sit amet quam sit amet odio fringilla accumsan et suscipit velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum interdum lorem id porttitor.</li>\r\n	<li>Aenean id venenatis eros, ut posuere enim. Vivamus vel gravida magna. Vestibulum aliquet tempor ex quis dignissim. Pellentesque ut nunc quis dolor finibus lacinia sed vel odio. <u>Nam efficitur quam at condimentum luctus</u>. Aenean quis magna ac quam efficitur sollicitudin nec et ex. Vestibulum ultrices viverra purus vitae scelerisque.</li>\r\n	<li>Aliquam feugiat sollicitudin arcu, et aliquet lacus posuere vel. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque dignissim aliquam diam, id consectetur sapien auctor ac. Maecenas mattis augue scelerisque elit consectetur ultricies. Mauris vehicula justo quis rhoncus semper.</li>\r\n	<li>Duis ultrices, orci posuere porta molestie, purus ex malesuada est, id varius sem ipsum eu dui. Nullam nibh enim, dignissim eget risus non, varius tristique turpis. Proin consequat vulputate augue sit amet porta. Integer id mauris quam. Donec pharetra ante nec maximus sodales. In faucibus tincidunt ligula sed suscipit. Praesent id sem orci.</li>\r\n	<li>Cras eu scelerisque arcu, eget finibus dui. <em><strong>Nunc nec lacus tincidunt nisi ullamcorper efficitur.</strong></em></li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Структура таблиці `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(10) unsigned NOT NULL,
  `from_id` int(10) unsigned NOT NULL,
  `to_id` int(10) unsigned NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'тестове повідомлення до Рамона', '2016-02-13 16:37:37', '2016-02-13 16:37:37'),
(2, 2, 1, 'for admin', '2016-02-19 22:00:00', '2016-02-19 22:00:00'),
(3, 1, 2, 'new message', '2016-02-20 16:28:32', '2016-02-20 16:28:32'),
(4, 3, 1, 'хай, як справи?', '2016-02-20 16:34:19', '2016-02-20 16:34:19'),
(5, 1, 3, 'хай, норм', '2016-02-20 16:35:03', '2016-02-20 16:35:03'),
(6, 1, 2, 'Є проста цегла. Цікавить?', '2016-03-05 09:11:44', '2016-03-05 09:11:44');

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_25_211123_create_roles_table', 1),
('2016_01_25_211332_create_users_roles_table', 1),
('2016_01_30_204011_create_categories_table', 1),
('2016_01_30_204031_create_advertisements_table', 1),
('2016_01_31_182415_create_comments_table', 2),
('2016_02_13_181759_create_messages_table', 3),
('2016_02_13_181812_create_baners_table', 3),
('2016_02_21_184448_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `aid`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Andriy', '098-021-78-78', 'ID1', 'top', '2016-02-21 17:39:16', '2016-02-21 17:39:16');

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ban` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `photo`, `phone`, `email`, `password`, `ban`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andriy', 'Smolyar', 'ZSbctqgDlrASvp4ZBgSE.png', '098-021-78-78', 'andriy_smolyar_0@mail.ru', '$2y$10$ftPcDCiMeQp3/JqxmSWu3./maBl9hT1RaLbsT1VyW6GZi4D5ExnbG', 0, 'EctDPdPCXwa6lHIlW22yNuPOfJZ7E6Q8ATsuIzsjNff7Xo3rrf6jf6cDYTOh', '2016-02-28 16:51:41', '2016-02-28 14:51:41'),
(2, 'Ramon', '', 'ZIJZXw7GBTBZARynjWhC.jpg', '068-258-11-44', 'user@mail.ru', '$2y$10$E3ZsYew9gltaby5eNK22qOwA3g0VTOqdFmLNJkow5Ikiq5LCn2Ffy', 0, 'P1BydDh0NoA3fgHGzzZX7OzHUaaaukePT9c96ykfaR9KxjtB06NrwOBJH702', '2016-02-28 16:26:11', '2016-02-28 14:26:11'),
(3, 'Golden', '', 'default.png', '', 'golden@mail.com', '$2y$10$2mBBF1L9PTxw/aYYjomqKu8cJU1iFRG3zwO6aDkI29.fzJqSmCly2', 0, 'Z630qWBtyGwBOFkNCEf0Gtfv2oQmWaHkVyqfkB65vWpCby37rFVzofVnR8Iz', '2016-02-20 18:34:40', '2016-02-20 16:34:40');

-- --------------------------------------------------------

--
-- Структура таблиці `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(1, 1);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `advertisements`
--
ALTER TABLE `advertisements`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `advertisements_url_unique` (`url`), ADD KEY `advertisements_category_id_index` (`category_id`), ADD KEY `advertisements_user_id_index` (`user_id`);

--
-- Індекси таблиці `baners`
--
ALTER TABLE `baners`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `categories_url_unique` (`url`);

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `comments_advertisement_id_index` (`advertisement_id`), ADD KEY `comments_user_id_index` (`user_id`);

--
-- Індекси таблиці `help_page`
--
ALTER TABLE `help_page`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`), ADD KEY `messages_from_id_index` (`from_id`), ADD KEY `messages_to_id_index` (`to_id`);

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Індекси таблиці `users_roles`
--
ALTER TABLE `users_roles`
 ADD KEY `users_roles_user_id_index` (`user_id`), ADD KEY `users_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `advertisements`
--
ALTER TABLE `advertisements`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблиці `baners`
--
ALTER TABLE `baners`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `help_page`
--
ALTER TABLE `help_page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `advertisements`
--
ALTER TABLE `advertisements`
ADD CONSTRAINT `advertisements_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
ADD CONSTRAINT `advertisements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `messages_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `messages_to_id_foreign` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `users_roles`
--
ALTER TABLE `users_roles`
ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
