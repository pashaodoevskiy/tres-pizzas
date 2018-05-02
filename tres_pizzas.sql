-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2018 г., 20:46
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tres_pizzas`
--

-- --------------------------------------------------------

--
-- Структура таблицы `5ab7e161aebee`
--

CREATE TABLE `5ab7e161aebee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `5ab7e161aebee`
--

INSERT INTO `5ab7e161aebee` (`id`, `name`, `price`) VALUES
(1, 'Четыре сыра', 250),
(2, 'Серебро', 390);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu_food`
--

CREATE TABLE `menu_food` (
  `id` int(11) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `price` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_food`
--

INSERT INTO `menu_food` (`id`, `category`, `name`, `price`, `description`) VALUES
(1, 'pizza', 'Четыре сыра', '250', 'Тесто для пиццы, сыр Масдамер, сыр Чеддер, сы'),
(2, 'pizza', 'Барбекю', '300', 'Тесто для пиццы, бекон, свиная вырезка BBQ, к'),
(3, 'pizza', 'Маргарита', '350', 'Тесто для пиццы, сыр моцарелла, орегано, бази'),
(4, 'pizza', 'Мексиканская', '400', 'Тесто для пиццы, кура BBQ, свиная вырезка BBQ'),
(5, 'pizza', 'Кальцоне Карбонара', '240', 'Кальцоне Карбонара'),
(6, 'pizza', 'Кальцоне с копченым куриным филе и ветчиной', '310', 'Кальцоне с копченым куриным филе и ветчиной'),
(7, 'pizza', 'Пицца Маргарита с сыром моцарелла буффало', '400', 'Тесто для пиццы, сыр моцарелла, базиликовое м'),
(8, 'pizza', 'Пицца Пепперони', '470', 'Тесто для пиццы, колбаска Пепперони, сыр моца'),
(9, 'pizza', 'Пицца с ветчиной и беконом', '290', 'Тесто для пиццы, ветчина, бекон, сыр моцарелл'),
(10, 'pizza', 'Пицца с ветчиной и грибами', '350', 'Тесто для пиццы, ветчина, шампиньоны, сыр моц'),
(11, 'pizza', 'Пицца с грибами и сыром фета', '320', 'Тесто для пиццы, крем суп из белых грибов, мо'),
(12, 'pizza', 'Пицца с томатами и рикоттой', '230', 'Тесто для пиццы, рикота, сыр моцарелла, помид'),
(13, 'pizza', 'Фокачча с песто', '90', 'Фокачча с песто'),
(14, 'pizza', 'Фокачча с розмарином', '90', 'Фокачча с розмарином'),
(15, 'promo', '5 золотых', '1290', '5 пицц на тонком тесте: Маргарита, Пепперони,'),
(16, 'promo', 'Серебро', '390', '2 пиццы на тонком тесте: Пепперони, пицца с в'),
(17, 'promo', 'Триатлон', '650', '3 пиццы на тонком тесте: Маргарита, пицца с в'),
(18, 'drink', 'Морс из клюквы', '50', '0,4л'),
(19, 'drink', 'Морс из черной смородины', '50', '0,4л'),
(20, 'drink', 'Морс из облепихи', '50', '0,4л'),
(21, 'drink', 'Сок апельсиновый', '60', '1л'),
(22, 'drink', 'Сок яблочный', '60', '1л'),
(23, 'drink', 'Сок вишнёвый', '60', '1л'),
(24, 'drink', 'Кока-кола', '70', '1л'),
(25, 'drink', 'Спрайт', '70', '1л'),
(26, 'drink', 'Фанта', '70', '1л');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_main`
--

CREATE TABLE `menu_main` (
  `id_menu_main` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_main`
--

INSERT INTO `menu_main` (`id_menu_main`, `name`, `link`, `img`) VALUES
(1, 'Пицца', 'pizza', '../../img/menu_pizza.jpg'),
(2, 'Наборы', 'promo', '../../img/menu_promo.jpg'),
(3, 'Напитки', 'drink', '../../img/menu_drink.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `order` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_orders`, `order`, `price`, `name`, `phone`, `adress`, `note`) VALUES
(25, 'Четыре сыра:250; 5 золотых:1290; Морс из клюк', '1590', 'Павел', '+7(950)112-31-23', NULL, 'ТЕСТ'),
(26, 'Четыре сыра:250; Триатлон:650; Морс из черной', '950', 'Аркаша', '+7(929)911-91-01', NULL, 'Плачу натурой');

-- --------------------------------------------------------

--
-- Структура таблицы `userOrder_2`
--

CREATE TABLE `userOrder_2` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userOrder_2`
--

INSERT INTO `userOrder_2` (`id`, `name`, `price`) VALUES
(1, 'Четыре сыра', 250);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `login`, `password`, `name`, `email`, `phone`) VALUES
(1, 'admin', '$2y$10$1joKTorY8NbhUQoeqHYkUuUaIcmPMtqjVGviaI', NULL, 'admin@mail.ru', NULL),
(2, 'pasha', '$2y$10$DDwxferY.o0.WA66HEJIweOJYLZyEvibvST3e5', NULL, 'pasha@mail.ru', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `5ab7e161aebee`
--
ALTER TABLE `5ab7e161aebee`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Индексы таблицы `menu_food`
--
ALTER TABLE `menu_food`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_main`
--
ALTER TABLE `menu_main`
  ADD PRIMARY KEY (`id_menu_main`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Индексы таблицы `userOrder_2`
--
ALTER TABLE `userOrder_2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `5ab7e161aebee`
--
ALTER TABLE `5ab7e161aebee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `menu_food`
--
ALTER TABLE `menu_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `menu_main`
--
ALTER TABLE `menu_main`
  MODIFY `id_menu_main` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `userOrder_2`
--
ALTER TABLE `userOrder_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
