-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2020 at 03:06 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snow_optics`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `count` smallint(5) UNSIGNED NOT NULL,
  `price` mediumint(8) UNSIGNED NOT NULL,
  `added` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cart_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` mediumint(8) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `price`, `description`, `image`) VALUES
(1, 'Airbrake XL Snow Goggles', 'Oakley', 24000, 'Airbrake XL was created for the consumer looking for a larger size and periphery goggle with the ease of Switchlock lens change technology, as 2 lenses are always included.', './images/products/oakley-airbrake.jpg'),
(2, 'Canopy Snow Goggles', 'Oakley', 18000, 'Canopy allows you to oversize your field of view, without compromising fit. The expanded periphery helps all consumers see more regardless of riding style, from racing to cruising groomers. The large-sized fit has been engineered to work flawlessly with most helmet types and sizes.', './images/products/oakley-canopy.jpg'),
(3, 'Flight Deck Snow Goggles', 'Oakley', 20000, 'Inspired by the helmet visors of fighter pilots, the large-sized fit of Flight Deck maximizes your field of view so you won\'t miss a single target of opportunity. It was engineered for seamless compatibility, giving you the flexibility to choose the helmet that fits your style. Designed with Oakley\'s Ridgelock Technology, changing lenses is quick and easy while still allowing for a complete lens seal to prevent harsh conditions from penetrating into your goggle.', './images/products/oakley-flight-deck.jpg'),
(4, 'Line Miner XM Snow Goggles', 'Oakley', 15000, 'The original Line Miner goggle was created with the purpose of providing the ultimate in peripheral vision, with a cylindrical-style design. We were able to pull the goggle in closer to your face than ever before, allowing for incredible downward and side-to-side periphery. With a mid-sized ﬁt, Line Miner XM is optimized for a wide variety of faces and is engineered to ﬁt perfectly with most helmets.', './images/products/oakley-line-miner.jpg'),
(5, 'Skyline Snow Goggles', 'Smith', 17000, 'The Skyline\'s rimless design maximizes your field of view while providing superior helmet integration. The spherical lens has substantial peripheral vision and is enhanced with Fog-X anti-fog coating for fog-free vision.', './images/products/smith-skyline.jpg'),
(6, 'Virtue Snow Goggles', 'Smith', 14000, 'The Virtue is designed specifically for women to have a great, smaller fit without sacrificing peripheral vision. Outriggers articulate for superior helmet integration, while the spherical lens and Fog-X anti-fog coating for fog-free vision. Fit and technology seamlessly combine so you can focus on the fun in front of you.', './images/products/smith-virtue.jpg'),
(7, 'Squad Snow Goggles', 'Smith', 11000, 'The cylindrical lens of the Squad is made from molded carbonic-x material so it\'s tough, and still has Fog-X technology and TLT optics for crystal clear vision. The minimal, semi-rimless frame technology and fully integrated strap connection point deliver the function you need without extra moving parts. Fun on the hill with your friends is amplified when you don\'t have to worry about whether or not your gear is dialed.', './images/products/smith-squad.jpg'),
(8, 'Riot Snow Goggles', 'Smith', 10000, 'The Riot is tailor-designed for the new generation of young women who want a refined frame design with an oversized cylindrical lens. The lens is made of molded carbonic-x material so it\'s strong, and still has Fog-X technology and TLT optics for crystal clear vision. The minimal frame is designed with fully integrated strap connection points that deliver the function you need without extra moving parts. From fun-filled park laps to spring slush runs, the Riot is built to keep up with you.', './images/products/smith-riot.jpg'),
(9, 'Bravo Snow Goggles', 'Spy', 22000, 'With performance worthy of a standing ovation, the Bravo\'s a midsized snow goggle with game-changing features like SPY Lock Steady technology -- the quickest, fingerprint-free lens change system on the market. The included premium bonus lens means you\'re always ready for Mother Nature\'s ever-changing elements. Be prepared for all riding sessions and browse our Bravo goggle lenses for light conditions.', './images/products/spy-bravo.jpg'),
(10, 'Marshall Snow Goggles', 'Spy', 14000, 'With a design inspired by fighter pilot blast shields, the Marshall features a spherical lens that mimics the geometry of your eyes to reduce fatigue and distortion. Add in its ultra-wide field of view and optically superior HD+ lens tech, and the Marshall brings premium performance to a sleek, understated, take-no-prisoner goggle that\'s not too big, small, or loud.', './images/products/spy-marshall.jpg'),
(11, 'Ace Snow Goggles', 'Spy', 13000, 'The free bonus lens and Quick Draw lens change system put the midsized Ace at the top of the deck. In volatile conditions, you can easily slide the bonus high-visibility lens into place and quickly return to the action -- without losing time to Mother Nature\'s wicked ways.', './images/products/spy-ace.jpg'),
(12, 'Raider Snow Goggles', 'Spy', 10000, 'Like a powder hound to the first chair, the Raider keeps you set to score. It\'s a snow goggle that combines huge Scoop vents and a free bonus lens to keep the fog-fighting air flowing while making sure you have the right lens to find the real treasures hidden in those mountains.', './images/products/spy-raider.jpg'),
(13, 'Sync Snow Goggles', 'Anon', 19000, 'Ride more. Fuss less. Hassle-free lens changes and an integrated facemask option make for distraction-free days in the women\'s Anon Sync Goggle. Full perimeter venting helps keep your vision sharp and terrain features in focus.', './images/products/anon-sync.jpg'),
(14, 'Tempest Snow Goggles', 'Anon', 15000, 'Sleek and stylish, the women\'s Anon Tempest Goggle features women\'s-specific design for the best possible fit and comfort. Magnetic Facemask Integration (MFI) seals Anon\'s MFI facemask accessories (sold separately) to the goggle in one quick snap. SONAR lens technology by ZEISS enhances contrast for the best possible definition and terrain recognition. Spherical Lens Technology mimics the curvature of the human eye for superior optics, and the pivoting flush mount outrigger provides the best possible goggle to helmet alignment. Full perimeter channel venting ensures maximum airflow for clear, fog-free vision in all conditions. Includes a microfiber goggle bag for storage and wiping the lens clean.', './images/products/anon-tempest.jpg'),
(15, 'Deringer Snow Goggles', 'Anon', 12000, 'Bright light, flat light, or storm day, take it all in stride with the women\'s Anon Deringer Snapback Goggle. A SONAR lens sharpens your focus. A snapback strap allows for a snug, hassle-free fit. What\'s more, it\'s equipped with magnetic facemask tech that makes keeping your face covered a breeze.', './images/products/anon-deringer.jpg'),
(16, 'Insight Snow Goggles', 'Anon', 10000, 'Featuring a low-profile design that\'s packed with performance, the women\'s Anon Insight Goggle offers a women\'s-specific design for the best possible fit and comfort. Cylindrical Lens Technology provides maximum field of vision and comes with a SONAR lens by ZEISS installed in the frame to enhance contrast for the best possible definition and terrain recognition. Full perimeter channel venting ensures maximum airflow for clear, fog-free vision in all conditions. The Insight goggle is Over the Glasses (OTG) compatible for wearing with eyeglasses. Includes a spare amber-tinted lens for adjusting to a wide range of weather conditions and a microfiber goggle bag for storage and wiping the lenses clean.', './images/products/anon-insight.jpg'),
(17, 'Diva Drama Snow Goggles', 'Blenders', 9500, 'Now, this is style that slaps. Our \'Diva Drama\' snow goggles are statement-making hardware. The gorgeous, complementary matte blush body and rose gold lens are one hell of a sight, and when paired as it is with the color-matched marble strap, you\'re getting something that\'s as much a piece of art as it is anything else. But that\'s just the thing -- \'Diva Drama\' also incorporates the latest slope-shredding technologies from Blendz, including upgraded silicone for greater grip and our new mag-tech functionality. The result is a pair of goggles perfect for any goddess.', './images/products/blenders-diva-drama.jpg'),
(18, 'Dream Maker Snow Goggles', 'Blenders', 9500, 'Be a wonder on that white pow with the \'Dream Maker\' goggles. They feature the Aura Collection\'s new rimmed shape and upgraded anti-fog coating, while also sporting an aesthetic pulled from a dazzling dreamscape. A vibrant teal body is punctuated by a hot pink lens, while the madcap marble-patterned adjustable strap makes for a look that\'s ripped straight from a sweet, sweet fantasy.', './images/products/blenders-dream-maker.jpg'),
(19, 'Majestic Bloom Snow Goggles', 'Blenders', 9500, 'Get ready to crush the competition with our high-tech, high-fashion \'Majestic Bloom\' goggles. We\'ve upgraded our anti-fog, anti-scratch coating for the 2019/2020 snow season while also introducing a new rimmed shape and souped-up silicone for greater grip. But \'Majestic Bloom\' extends beyond these innovations with an exotic colorway that radiantly contrasts with the snowpack. The matte purple lens and frame are eye-catching enough, but there\'s also a gorgeous butterfly pattern on the strap that blossoms with a tonally perfect scheme. Really, these up your game in more ways than one...', './images/products/blenders-majestic-bloom.jpg'),
(20, 'Smooth Arrival Snow Goggles', 'Blenders', 9500, 'Meet one of the coldest, cleanest designs for the 2019/2020 snow season -- \'Smooth Arrival.\' This look\'s right on time, what with the matte white body, seemingly boundless blue lens, and the dual-colored, alternating blue-and-white adjustable strap. The whole aesthetic seems evocative of the snow below and the sky above, and it\'s all capped off by forward-thinking tech like an anti-fog lens coating and a grippy silicone surface. Hint: You\'d be crazy not to cop these.', './images/products/blenders-smooth-arrival.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
