-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel_qa
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_03_26_023257_create_questions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `views` bigint(20) unsigned NOT NULL DEFAULT 0,
  `answers` bigint(20) unsigned NOT NULL DEFAULT 0,
  `votes` bigint(20) NOT NULL DEFAULT 0,
  `best_answer_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `questions_slug_unique` (`slug`),
  KEY `questions_user_id_foreign` (`user_id`),
  CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Illo odio reiciendis sint voluptas neque.','illo-odio-reiciendis-sint-voluptas-neque','Rerum est amet omnis quas magnam atque accusantium. Consequatur accusantium et ea et ut ut repudiandae nesciunt. Ex dolores dolorum et voluptas consectetur id iusto. Quos qui quia corrupti id enim natus quia.\n\nUt nobis enim animi at modi. Voluptatum omnis nesciunt doloribus consequatur ut quod inventore. Qui accusamus eum explicabo odio ducimus magni sed.\n\nAspernatur sit ut qui nobis laboriosam fugit repellat voluptatem. Accusamus aut neque quidem voluptatem neque dolorem. Dolor deleniti temporibus natus officiis sed. Vel omnis dolor harum voluptatem provident omnis.\n\nConsectetur possimus ullam dolorem eos aspernatur illum. Mollitia temporibus voluptatum quos perspiciatis. Aut ut qui at molestiae vel non qui. Quia cupiditate alias sed mollitia ea.\n\nVoluptas eos nihil quis ad numquam ut debitis excepturi. Quia consequuntur ut reiciendis voluptates id aut enim. Et voluptates non omnis id inventore non.\n\nVoluptatum dignissimos fugit repellat accusantium. Itaque molestiae aut saepe porro. Ut dolores molestiae quo nobis.',5,4,5,NULL,1,'2020-03-26 01:29:25','2020-03-26 01:29:25'),(2,'Odit et nostrum incidunt beatae veritatis amet quaerat aperiam.','odit-et-nostrum-incidunt-beatae-veritatis-amet-quaerat-aperiam','Porro laudantium dignissimos eum aut. Autem accusamus iste officiis repudiandae. Temporibus fuga expedita ad. Vero sunt ducimus dolores nihil sit omnis cupiditate.\n\nDistinctio nostrum dolorem enim autem voluptatem. Eos id expedita autem dignissimos corporis perspiciatis est. Qui quos quasi dolore et inventore laboriosam. Iusto aperiam dolorem officiis occaecati omnis molestias voluptatum.\n\nLaboriosam dolores sunt nihil. Qui in dolorem voluptatem animi qui et facere. Eius incidunt dolor ducimus in dolorem.',5,5,-10,NULL,2,'2020-03-26 01:29:25','2020-03-26 01:29:25'),(3,'Provident perferendis rerum corrupti labore quae iure.','provident-perferendis-rerum-corrupti-labore-quae-iure','Adipisci iste culpa voluptatem qui magnam nisi architecto corrupti. Qui sit odio laborum assumenda nisi rerum et. Quo ab neque porro quod sed reiciendis.\n\nNecessitatibus quia excepturi voluptas consequatur. Dolores ut doloribus nobis incidunt. Voluptas dolorem deserunt assumenda voluptatibus quibusdam.\n\nLaudantium aut similique ut veritatis et. Aliquam et dolorum est reiciendis. Ad voluptatum provident eveniet eum ut. Facere ut in aut exercitationem nihil qui qui.\n\nEligendi rerum dolores eaque omnis omnis quo quia. Consequatur consequatur eius commodi placeat similique quam. Et facilis nulla maiores rerum.\n\nOdio illum repellat maiores nihil. Voluptatem fugit qui dolorem nisi quia sint voluptas assumenda. Modi quae repellendus vel itaque libero quod.\n\nUt omnis sint sed aut unde sapiente. Ex enim similique ratione tenetur. In dolorem quam aut dignissimos praesentium inventore. Est nihil iusto eveniet et quisquam consequatur. Et sunt numquam expedita quasi.\n\nDolores optio illum eius qui. Non consequuntur ad sapiente est. Non nobis veniam soluta consequatur. Dolorem quia ut atque cum eum magni asperiores.\n\nSint enim illo mollitia voluptates deserunt ex eum. Aliquid distinctio quos sit cumque. Velit minima qui aliquam. Dolores repellat et quibusdam ut voluptatem.\n\nAt dolorem deleniti eius in omnis nam temporibus. Quia et dicta voluptatibus ut id quia. Amet et unde non id. Vitae reiciendis autem quae quo soluta tenetur consequatur.\n\nImpedit laboriosam accusantium tempora ut. Voluptatem repellendus non quasi vel vel corrupti dicta. Optio distinctio architecto harum accusantium eos.',10,10,10,NULL,2,'2020-03-26 01:29:25','2020-03-26 01:29:25'),(4,'Ut perferendis impedit ex placeat labore voluptates dolor.','ut-perferendis-impedit-ex-placeat-labore-voluptates-dolor','Vero provident consequuntur tempora perspiciatis minima error. Dolorum atque id possimus dolorem qui quia ut. Velit officiis consequatur ipsam eum ad.\n\nAd dolor porro delectus assumenda ut. Consectetur repudiandae non quas explicabo nam. Magni enim ab ea fuga rem vel autem. Veniam necessitatibus qui et occaecati repellat.\n\nDoloribus molestiae velit ad facere architecto. Rerum ut recusandae non. Non dolores qui illo non. Voluptates voluptatibus facilis voluptas neque quia quae molestiae.\n\nEt placeat delectus voluptatem repellendus fugiat quo nam. Consectetur quidem eligendi atque debitis quia illo minus.\n\nAd qui perspiciatis ab libero deleniti. Cumque odit et eos voluptatem. Sit sit quas velit et eos quae quibusdam. Praesentium perspiciatis atque nisi labore in temporibus vel voluptatem. Dolorem delectus nisi hic corrupti quia ratione provident.\n\nOptio et dolore id numquam. Accusamus placeat qui ut vero necessitatibus ut consectetur. Mollitia consectetur et eum. Nemo aut et voluptatem est omnis ab.\n\nVoluptatibus modi iure doloribus et necessitatibus ut sed. Ad asperiores et aspernatur recusandae non fuga. Est dolores minus dolorem molestiae asperiores. Ratione error animi aut. Esse deleniti quidem nostrum earum ut sunt minus.\n\nDolorem eos voluptate animi possimus cupiditate. Praesentium dolor cumque facilis.',6,0,6,NULL,2,'2020-03-26 01:29:26','2020-03-26 01:29:26'),(5,'Quod beatae earum dignissimos.','quod-beatae-earum-dignissimos','Sed consequatur vero esse nobis et cupiditate. Corrupti assumenda et vel voluptatem debitis praesentium magnam. Aliquid maxime omnis aut saepe earum aut temporibus. Cumque sunt voluptatum minima qui dicta.\n\nNon eligendi est aut omnis optio qui. Dolor in recusandae ut reiciendis reiciendis repudiandae nemo. Quia eos nam saepe sed. Fugit nostrum quia et necessitatibus suscipit necessitatibus odio.\n\nDolore velit et maxime adipisci aut tempore. Cupiditate dolorem et suscipit delectus cumque laudantium. Quia qui et qui voluptatem.\n\nNulla nisi eaque aut et animi consequatur. Reprehenderit magnam rerum aut labore autem libero. Fugiat quam impedit asperiores in ullam ea nihil. Molestias quod voluptatem consequatur quibusdam.\n\nAssumenda molestiae quod commodi voluptas possimus. Officiis inventore et quia quod aut ad rerum. Ducimus similique voluptatem et.\n\nVoluptatem necessitatibus id provident eum pariatur ut mollitia quisquam. Magni eum recusandae impedit quae nam soluta. Vel id et voluptatum et sed et.\n\nError pariatur aut dolor voluptatum sed. Quo vel tenetur laboriosam rem. Eaque quibusdam dolorem autem sed recusandae qui blanditiis. Repudiandae ut eos et nobis natus. Nemo quo necessitatibus rerum.\n\nQuasi tenetur autem dolore doloribus. Similique quis odio quis blanditiis a sed qui.\n\nEt omnis aliquam qui voluptates perferendis aut. Quaerat non est voluptatem molestiae dignissimos cum et repellendus. Nulla qui autem inventore recusandae eligendi cupiditate repudiandae.\n\nVel et magni optio delectus totam tenetur. Eos dolore non itaque quibusdam. Aspernatur qui dolorem quod et vel illo. Et maxime sint nulla et.',3,1,0,NULL,3,'2020-03-26 01:29:26','2020-03-26 01:29:26'),(6,'Tenetur qui blanditiis culpa eaque illum a.','tenetur-qui-blanditiis-culpa-eaque-illum-a','Blanditiis beatae quos et dolore fugiat et fuga in. Error necessitatibus aut maxime quibusdam quibusdam. Architecto vero optio et quia.\n\nMinus deleniti accusantium earum eos corporis excepturi aspernatur dolorem. Tempora laborum vel aut sunt saepe ex. Dolores quam recusandae ex aperiam non dolorum asperiores.\n\nCum quidem sequi sapiente sint. Ut eveniet dolores dicta velit est accusamus. Exercitationem recusandae voluptas quisquam blanditiis eius.\n\nPraesentium nulla in ipsam fugiat iure. Iste repellendus necessitatibus qui sit. Sapiente est a in id. Omnis et aut eos veniam qui ut ut.\n\nMolestiae est nemo dicta autem odio et. Dolorum illum minima et ex similique in. Dolorem delectus nemo hic odit explicabo. Qui iusto blanditiis accusamus est et.',2,3,2,NULL,3,'2020-03-26 01:29:26','2020-03-26 01:29:26'),(7,'Sit magni assumenda illum qui reprehenderit vero.','sit-magni-assumenda-illum-qui-reprehenderit-vero','Eius possimus aut rerum. Quos quisquam quas et enim adipisci. Accusamus illo fugit sequi eum maxime eos. Aut sunt similique ratione molestiae.\n\nDolores nostrum hic neque. Rerum similique ipsam nesciunt ab et. Fugiat quaerat reprehenderit in magnam pariatur et repudiandae.\n\nQuia numquam repudiandae error explicabo. Sed natus veniam consequatur cumque deserunt rem libero ut. Ut ut temporibus cumque quo aut reiciendis. Commodi eos illum voluptatem autem molestiae autem.\n\nFugiat quia voluptates quam accusamus minima aut. Sed enim ullam modi. Perspiciatis et inventore impedit totam quia aliquid assumenda odit. Ut ab blanditiis placeat nostrum doloribus et laboriosam.\n\nConsequatur consequatur eos sint esse blanditiis voluptatibus. Voluptate quam ea voluptatem veniam sint debitis. Aut velit aut eaque asperiores rerum. Molestiae dolor praesentium earum ut.\n\nRem voluptatem dolores sit. Tempora voluptatem voluptas cum sed enim qui. Aliquam voluptatem asperiores soluta iure. Voluptatem omnis a voluptatem veniam.\n\nIncidunt deleniti corrupti illum saepe inventore sed laudantium. Eius expedita dolorum quaerat expedita non veniam. Reprehenderit aut et voluptatem.\n\nRerum molestias odio provident. Quos ut aspernatur sit impedit fugiat deleniti animi. Qui quasi tempora quia voluptatem aut. Et voluptates ut dolor labore voluptas ut veritatis. Placeat sit ipsam nihil velit ut.',1,4,-2,NULL,3,'2020-03-26 01:29:26','2020-03-26 01:29:26'),(8,'Itaque vel est voluptatem voluptates illo nulla ut.','itaque-vel-est-voluptatem-voluptates-illo-nulla-ut','Rerum molestias cumque hic ut. Fugit non officia eveniet doloribus aut. Culpa voluptates ex tempore voluptate voluptatem asperiores.\n\nMollitia voluptas id voluptas et. Animi vitae quo eum quia necessitatibus sed labore. Nam eum veritatis culpa nihil repudiandae dolorum. Aut odit amet omnis omnis et.\n\nEt ea deleniti dolorem consequatur in omnis. Accusantium distinctio ex est omnis. Sunt amet dolorem aliquid aut dolorem totam. Ipsa vel omnis blanditiis in.\n\nMagni enim vel voluptatem ut aut nihil. Similique non odit quia. Eaque possimus non dignissimos qui inventore nam quaerat. Rem saepe odio qui error nemo. Eaque modi voluptatem dolor et et.\n\nTenetur occaecati in reprehenderit qui quia. Porro est expedita natus. Ut praesentium et omnis repellendus iste quod perferendis voluptates.\n\nQuod molestiae possimus hic corrupti voluptatum. Reprehenderit rem pariatur enim minima eligendi quas repellat. Vel ut qui voluptates sed qui aperiam sapiente. Eos quibusdam aut ut cumque eveniet.\n\nMolestiae nulla enim qui id. Non ullam debitis expedita excepturi enim occaecati eligendi. Non voluptate sequi sapiente ipsam.',1,3,-3,NULL,3,'2020-03-26 01:29:26','2020-03-26 01:29:26'),(9,'Molestiae ut aperiam dolor qui rerum.','molestiae-ut-aperiam-dolor-qui-rerum','Accusantium asperiores amet distinctio animi corporis. Consequatur consequatur quia et dolorum. Qui vel debitis qui suscipit error. Optio aperiam rerum qui esse odit nihil.\n\nAlias consequuntur earum sapiente ullam fugiat. Voluptas qui nostrum ut deleniti occaecati omnis. Magni corporis molestias incidunt et officia. Labore aut et sint quia perferendis eaque voluptates.\n\nLabore eos voluptatem est deserunt. Delectus blanditiis qui dolorum optio. Cupiditate numquam molestiae non beatae provident corrupti. Dolorem numquam delectus voluptate neque et aperiam maxime. Vel ab beatae temporibus facilis.\n\nEx fuga et aut saepe quo numquam. Blanditiis perferendis ut qui veniam animi. Vel omnis fugit voluptatem doloribus eum. Quia voluptatem magnam laudantium aliquam nobis.\n\nFacere voluptatibus similique quae magni quia. Fuga iure velit culpa vel quam unde illo. Vel inventore minima occaecati est. Cumque in magni laboriosam dolorum voluptatibus laborum ipsum. Placeat alias autem ipsum non sed cumque.\n\nMollitia et impedit dolorum voluptas dolorem aperiam. Dolores ut rem est quas vel inventore vel nesciunt. Amet nostrum optio consectetur illo repellat ullam qui. Commodi quam architecto ex quasi.\n\nQui ut id eveniet aliquam et eum totam. Tenetur architecto quis corporis dolorem.\n\nIure quia doloribus ea non maxime veniam id. Qui illum libero enim dolor et perferendis temporibus. Et omnis illum et labore laborum cupiditate laborum. Tenetur nesciunt suscipit provident illo.\n\nUt minus similique aut corrupti id eos. Esse rem eligendi exercitationem repudiandae eos aliquid. Quaerat ab porro iusto consequuntur quo expedita ratione.\n\nModi ut omnis aut eligendi soluta. Voluptatem qui minima voluptatem necessitatibus porro soluta. Esse sit non omnis ut vel quo est.',6,9,4,NULL,3,'2020-03-26 01:29:26','2020-03-26 01:29:26'),(10,'this is a test 1','this-is-a-test-1','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,0,0,NULL,4,'2020-03-30 01:44:05','2020-03-30 01:44:05'),(11,'Dismissing','dismissing','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,0,0,NULL,4,'2020-03-30 01:53:34','2020-03-30 01:53:34'),(12,'this is a test 2','this-is-a-test-2','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,0,0,NULL,4,'2020-03-30 01:54:41','2020-03-30 01:54:41'),(13,'this is a test 3','this-is-a-test-3','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,0,0,NULL,4,'2020-03-30 01:56:00','2020-03-30 01:56:00'),(14,'this is a test 4','this-is-a-test-4','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,0,0,NULL,4,'2020-03-30 01:56:57','2020-03-30 01:56:57'),(16,'this is a test 6','this-is-a-test-6','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,0,0,NULL,4,'2020-03-30 01:58:51','2020-03-30 01:58:51'),(18,'this is a test 7','this-is-a-test-7','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,0,0,NULL,4,'2020-03-30 01:59:32','2020-03-30 01:59:32'),(19,'this is a test 5','this-is-a-test-5','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',0,0,0,NULL,4,'2020-03-30 02:03:37','2020-03-30 02:03:37');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Roselyn Jenkins DDS','neil.kemmer@example.net','2020-03-26 01:29:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','OpRTwebOzn','2020-03-26 01:29:25','2020-03-26 01:29:25'),(2,'Hollis Keebler','rose.swift@example.com','2020-03-26 01:29:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','G5VZHdw2SY','2020-03-26 01:29:25','2020-03-26 01:29:25'),(3,'Noe Kuhic','ublanda@example.com','2020-03-26 01:29:25','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','MLk8Dwu7pq','2020-03-26 01:29:25','2020-03-26 01:29:25'),(4,'test','test@test.com',NULL,'$2y$10$VZt7eySdCU9SQmmsu9tBuesejCUCyRZ95jn61RClsg4EbB/kpxlPK',NULL,'2020-03-30 01:14:08','2020-03-30 01:14:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-30 16:14:08
