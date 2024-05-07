-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 09:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heavenly_treats`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2023_07_06_131646_create_recipes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'picture',
  `category` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `picture`, `category`, `content`, `description`, `created_at`, `updated_at`) VALUES
(1, 'gambas al ajilo recipes', 'recipe/OSUCgSVkJjxF8RZ1DzJopGMpNTGSjxpv5rgbOzcj.png', 'brunch', '<p><strong>Ingredients:</strong></p><ul><li>1 pound (450g) large shrimp, peeled and deveined</li><li>4 tablespoons olive oil</li><li>6-8 cloves garlic, thinly sliced</li><li>1/2 teaspoon red pepper flakes (adjust to taste)</li><li>1 tablespoon chopped fresh parsley</li><li>1 tablespoon lemon juice (optional)</li><li>Salt to taste</li></ul><p><strong>Instructions:</strong></p><ul><li>Heat the olive oil in a large skillet or frying pan over medium heat.</li><li>Add the sliced garlic and red pepper flakes to the pan. Sauté for about 1-2 minutes until the garlic becomes fragrant and just starts to turn golden. Be careful not to burn the garlic.</li><li>Add the shrimp to the pan and season with salt. Cook for about 2-3 minutes, stirring occasionally, until the shrimp turn pink and are cooked through. Avoid overcooking the shrimp to keep them tender.</li><li>Sprinkle the chopped parsley over the shrimp and give it a quick stir.</li><li>Optional: Squeeze fresh lemon juice over the cooked shrimp for a tangy flavor.</li><li>Remove the pan from heat and transfer the Gambas al Ajillo to a serving dish.</li><li>Serve the Gambas al Ajillo immediately as an appetizer or main dish. You can enjoy them with crusty bread for dipping into the flavorful oil and garlic.</li></ul>', '<p>Gambas al Ajillo is a traditional Spanish dish known for its simplicity and robust flavors. typically features large shrimp that are cooked with garlic, olive oil, and spices, resulting in a flavorful and aromatic dish. The dish originates from the coastal regions of Spain, where fresh seafood is abundant and garlic is a staple in the Mediterranean cuisine.</p>', '2023-07-08 07:09:05', '2023-07-09 18:07:08'),
(3, 'chicken wings recipe', 'recipe/M9luwTejHs5Q4ZKYr39S9BU8WdFArdO2oojz1rLb.jpg', 'brunch', '<p><strong>Ingredients:</strong></p><ul><li>2 pounds (900g) chicken wings</li><li>1/4 cup soy sauce</li><li>1/4 cup honey</li><li>2 tablespoons ketchup</li><li>2 tablespoons olive oil</li><li>2 cloves garlic, minced</li><li>1 teaspoon paprika</li><li>1/2 teaspoon cayenne pepper (adjust to taste)</li><li>Salt and black pepper to taste</li><li>Optional: Sesame seeds and chopped green onions for garnish</li></ul><p><strong>Instructions:</strong></p><ul><li>Preheat the oven to 400°F (200°C). Line a baking sheet with aluminum foil or parchment paper for easy cleanup.</li><li>In a mixing bowl, combine the soy sauce, honey, ketchup, olive oil, minced garlic, paprika, cayenne pepper, salt, and black pepper. Stir well to make the marinade.</li><li>Place the chicken wings in a large bowl and pour the marinade over them. Toss the wings to coat them evenly with the marinade. Let them marinate for at least 30 minutes, or for even better flavor, refrigerate them for a few hours or overnight.</li><li>Transfer the marinated chicken wings onto the prepared baking sheet, arranging them in a single layer.</li><li>Bake the chicken wings in the preheated oven for 40-45 minutes, or until they are cooked through and golden brown. Flip the wings halfway through the cooking time to ensure even browning.</li><li>Optional: If you prefer a crispier texture, you can broil the wings for an additional 2-3 minutes after baking, but keep a close eye on them to prevent burning.</li><li>Once cooked, remove the chicken wings from the oven and let them cool slightly.</li><li>Garnish the wings with sesame seeds and chopped green onions for added flavor and presentation.</li><li>Serve the chicken wings hot as an appetizer or main dish. They are delicious on their own or can be served with your favorite dipping sauce like barbecue sauce, ranch dressing, or blue cheese dressing.</li></ul>', '<p>Chicken wings are a popular and versatile part of the chicken known for their juicy and flavorful meat. They consist of the upper section of the wing, typically separated into two parts: the drumette and the wingette. They are a favorite appetizer or main dish in many cuisines and are often enjoyed at parties, sports events, or casual gatherings.</p>', '2023-07-09 07:18:24', '2023-07-09 10:40:52'),
(4, 'honey toast recipes', 'recipe/hKbUsqkB18tDeKvUh9WN3x75Y7nRPtJ8SAt7mVAF.jpg', 'breakfast', '<p><strong>Ingredients:</strong></p><ul><li>Sliced bread (your choice of bread)</li><li>Cream cheese or ricotta cheese</li><li>Assorted fresh fruits (such as berries, sliced peaches, sliced strawberries, or bananas)</li><li>Honey</li></ul><p><strong>Instructions:</strong></p><ul><li>Toast the bread slices until they are golden brown and crispy.</li><li>Spread a layer of cream cheese or ricotta cheese onto each toasted slice.</li><li>Arrange the fresh fruits on top of the cheese layer.</li><li>Drizzle honey generously over the fruit-topped toast.</li><li>You can adjust the amount of honey based on your preference for sweetness.</li><li>Serve the honey and fruit toast immediately and enjoy the combination of creamy cheese, fresh fruits, and sweet honey on crispy toast.</li></ul>', '<p>Honey toast, also known as honey toast bread or honey toast cubes, is a popular dessert originating from Japan. It is a deliciously sweet and indulgent treat that combines crispy toasted bread with a drizzle of honey and various toppings. Popular toppings include fresh fruits like strawberries, bananas, or blueberries, which add a burst of freshness and color.&nbsp;</p>', '2023-07-09 10:46:07', '2023-07-09 10:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$F.nMiKUM/fgLwzOoBweF1.CpRI6x13833yYkY5Yf2zd3GM1O079US', NULL, '2023-07-08 07:07:16', '2023-07-08 07:07:16'),
(2, 'Amel', 'Amel', '$2y$10$MYJOayzZfa1smtixUfvHZOlU396VT/EzkiEetfe/bbGX3eUqLHQIW', NULL, '2023-07-09 21:36:00', '2023-07-09 21:36:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
