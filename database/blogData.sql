SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blogData`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `text`, `date_create`) VALUES
(1, 1, 'Post one', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet consectetur adipiscing elit ut aliquam purus sit amet luctus. Et ligula ullamcorper malesuada proin. Enim praesent elementum facilisis leo vel fringilla. Nulla pellentesque dignissim enim sit. Sed pulvinar proin gravida hendrerit lectus a. Sit amet volutpat consequat mauris nunc. Viverra ipsum nunc aliquet bibendum enim.', '2021-04-29 15:41:25'),
(47, 1, 'Lorem Ipsum начал как омлет, бессмысленные Латинской.', 'Классический «Lorem ipsum dolor sit amet…» проход отнести к ремиксов римского философа Цицерона 45 г. до н.э. текст De Finibus Bonorum et Malorum («О крайностями добра и зла»). Более конкретно, проход, как полагают, происходит из секций 1.10.32 - 33 из его текста, с наиболее заметным часть извлечена ниже:\n\n“Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.”\n1914 Английский перевод Harris Rackham гласит:\n\n“Nor is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstances occur in which toil and pain can procure him some great pleasure.”\nПо латыни профессор Richard McClintock - человек, которому приписывают открытие корни Lorem Ipsum - он, скорее всего, что когда-то в средние века наборщиком вскарабкался часть Цицерона De Finibus для того, чтобы предоставить текст-заполнитель для смоделируйте различных шрифтов для типа образца книги. Но это было только начало.', '2021-04-29 15:41:25'),
(48, 1, 'Vestibulum morbi blandit cursus risus at ultrices mi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis purus sit amet volutpat consequat mauris. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Velit scelerisque in dictum non consectetur a erat nam. Ornare quam viverra orci sagittis. Lacus vestibulum sed arcu non odio euismod. Pellentesque id nibh tortor id aliquet lectus proin. Ullamcorper sit amet risus nullam eget felis eget nunc lobortis. Sem et tortor consequat id. Volutpat lacus laoreet non curabitur gravida arcu ac tortor dignissim.\n\nVestibulum morbi blandit cursus risus at ultrices mi. Nec nam aliquam sem et tortor consequat. Mauris augue neque gravida in fermentum. Lectus magna fringilla urna porttitor rhoncus. Sed felis eget velit aliquet sagittis id consectetur. Sed arcu non odio euismod lacinia at. Consectetur libero id faucibus nisl tincidunt. Blandit turpis cursus in hac. Aenean et tortor at risus viverra adipiscing at in. Aenean pharetra magna ac placerat vestibulum lectus mauris. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum. Faucibus ornare suspendisse sed nisi lacus sed viverra. Lorem sed risus ultricies tristique nulla. Rutrum quisque non tellus orci ac auctor augue mauris. Accumsan tortor posuere ac ut.', '2021-04-29 15:45:12'),
(49, 1, 'Mi sit amet mauris commodo quis imperdiet massa tincidunt. Cursus mattis molestie a iaculis at erat pellentesque. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Convallis aenean et tortor at risus viverra adipiscing at in. Scelerisque purus semper eget duis. Eget magna fermentum iaculis eu non. Volutpat blandit aliquam etiam erat velit. Mi sit amet mauris commodo quis imperdiet massa tincidunt. Cursus mattis molestie a iaculis at erat pellentesque. Accumsan sit amet nulla facilisi. Elementum integer enim neque volutpat ac. Mauris augue neque gravida in. Molestie a iaculis at erat pellentesque adipiscing commodo elit. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum. Elementum nisi quis eleifend quam. Ipsum faucibus vitae aliquet nec.\n\nMalesuada nunc vel risus commodo viverra maecenas accumsan lacus vel. Et egestas quis ipsum suspendisse ultrices. Consequat nisl vel pretium lectus quam id leo. Aenean sed adipiscing diam donec adipiscing tristique risus nec feugiat. Urna nunc id cursus metus. Suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Lorem mollis aliquam ut porttitor leo a diam. Vel facilisis volutpat est velit egestas dui id ornare arcu. Blandit massa enim nec dui nunc. Elementum sagittis vitae et leo duis. Quis vel eros donec ac odio tempor orci dapibus ultrices. Velit egestas dui id ornare arcu odio ut sem. Velit sed ullamcorper morbi tincidunt ornare. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. In dictum non consectetur a erat.\n\nVarius duis at consectetur lorem. Placerat duis ultricies lacus sed turpis. Faucibus et molestie ac feugiat sed lectus vestibulum mattis. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut placerat. Mauris sit amet massa vitae tortor. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Sit amet luctus venenatis lectus magna fringilla urna porttitor. Lobortis feugiat vivamus at augue. Consequat ac felis donec et odio pellentesque. Praesent tristique magna sit amet purus. Nibh nisl condimentum id venenatis a condimentum vitae. Faucibus nisl tincidunt eget nullam non nisi est sit amet. Vulputate mi sit amet mauris. Mollis nunc sed id semper risus in hendrerit. Feugiat in fermentum posuere urna nec tincidunt. Amet consectetur adipiscing elit ut aliquam. Aliquam sem et tortor consequat id porta nibh. Duis convallis convallis tellus id interdum velit laoreet. Aliquam id diam maecenas ultricies mi eget mauris. Urna porttitor rhoncus dolor purus non enim praesent.', '2021-04-29 15:46:04'),
(50, 1, 'Ultrices sagittis orci a scelerisque. Vel pretium lectus quam id leo in. Pulvinar elementum integer enim neque volutpat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec adipiscing tristique risus nec feugiat in fermentum. Amet consectetur adipiscing elit ut. Viverra aliquet eget sit amet tellus cras adipiscing. Ultrices sagittis orci a scelerisque. Vel pretium lectus quam id leo in. Pulvinar elementum integer enim neque volutpat. Imperdiet proin fermentum leo vel orci. Urna porttitor rhoncus dolor purus non enim praesent. Maecenas sed enim ut sem viverra aliquet.\n\nLectus mauris ultrices eros in cursus turpis massa tincidunt. Phasellus egestas tellus rutrum tellus. At augue eget arcu dictum varius. Cursus in hac habitasse platea dictumst quisque sagittis. Mi quis hendrerit dolor magna eget. Gravida dictum fusce ut placerat orci. Quis auctor elit sed vulputate mi sit. Posuere lorem ipsum dolor sit amet. Magna ac placerat vestibulum lectus. Aliquam faucibus purus in massa tempor.\n\nNunc faucibus a pellentesque sit amet porttitor eget dolor. Libero enim sed faucibus turpis in eu mi bibendum neque. Ac turpis egestas sed tempus urna et pharetra pharetra. Adipiscing vitae proin sagittis nisl. Orci a scelerisque purus semper eget duis at tellus. Sed libero enim sed faucibus. Egestas egestas fringilla phasellus faucibus. Tincidunt vitae semper quis lectus. Arcu bibendum at varius vel pharetra vel. Nunc sed augue lacus viverra vitae congue eu consequat. Iaculis nunc sed augue lacus viverra vitae congue eu. Faucibus interdum posuere lorem ipsum. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Eget duis at tellus at urna condimentum. Id ornare arcu odio ut sem nulla pharetra diam. Maecenas sed enim ut sem viverra aliquet eget sit. Nibh venenatis cras sed felis eget velit.\n\nDui ut ornare lectus sit amet. Convallis convallis tellus id interdum velit laoreet id donec ultrices. Sodales ut eu sem integer vitae justo eget magna fermentum. Tellus molestie nunc non blandit massa enim nec dui. Purus viverra accumsan in nisl nisi scelerisque eu. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Dignissim diam quis enim lobortis scelerisque fermentum dui. Nulla facilisi morbi tempus iaculis urna. Non arcu risus quis varius quam quisque id. Neque ornare aenean euismod elementum nisi quis.', '2021-04-29 15:46:49');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment_text` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `article_id`, `comment_text`, `parent_id`, `time`) VALUES
(1, 1, 1, 'comment innit', 0, '2021-05-06 07:57:44'),
(2, 1, 1, 'comment ans', 0, '2021-05-06 07:58:38'),
(3, 2, 1, 'comment', 1, '2021-05-05 00:00:00'),
(9, 1, 1, 'f', 2, '2021-05-06 10:33:33');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(36) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `admin`, `active`, `hash`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$qNkXf5wNm8P7QVllHrwKjeilwZkYKXRZ4tuET7.tD9dOp5anXLuT6', 1, 1, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
