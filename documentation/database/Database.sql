--
-- Tabelstructuur voor tabel `cronjob`
--

CREATE TABLE IF NOT EXISTS `cronjob` (
  `id` int(11) NOT NULL,
  `last_time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last updated time stamp',
  `five` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'time stamp each five minutes',
  `hour` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'time stamp hours',
  `daily` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'time stamp daily',
  `newsletter` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'time stamp for newsletter sending'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='cronjob details';

--
-- Gegevens worden geëxporteerd voor tabel `cronjob`
--

INSERT INTO `cronjob` (`id`, `last_time_stamp`, `five`, `hour`, `daily`, `newsletter`) VALUES
(1, '2016-11-16 06:41:10', '2016-11-16 13:41:10', '2016-11-16 13:41:10', '2016-11-16 05:52:53', '2016-11-16 13:41:10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL,
  `from_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to the users id who send',
  `to_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to the users id who received',
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email subject',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'body content',
  `repeat` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'repeat the email message',
  `send_date` date NOT NULL COMMENT 'send date',
  `receive_date` date NOT NULL COMMENT 'receive date'
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='inbox email details';

--
-- Gegevens worden geëxporteerd voor tabel `inbox`
--

INSERT INTO `inbox` (`id`, `from_id`, `to_id`, `subject`, `description`, `repeat`, `send_date`, `receive_date`) VALUES
(0, 'admin', 'admin', 'Welcome administrator', 'Hi there,<br><br>Welcome aboard! We are pleased to have you working with us. You were selected for employment due to the attributes that you have displayed that appear to match the qualities we are looking for in a good administrator.', 'never', '2016-09-30', '0000-00-00'),
(70, 'admin', 'superman', 'Welcome administrator', 'Hi there,<br><br>Welcome aboard! We are pleased to have you working with us. You were selected for employment due to the attributes that you have displayed that appear to match the qualities we are looking for in a good administrator.', 'never', '2016-11-12', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'title name, unique',
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'description of the news',
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'image of the news',
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id of the news category',
  `views` varchar(10000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'number of views for the news',
  `date` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'creation date of the news',
  `active` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'define if the news is visible or not',
  `post_url` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'to create search friendly urls'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='news files with path';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(11) NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'category name, unique',
  `active` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'define if the category is used'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='news category';

--
-- Gegevens worden geëxporteerd voor tabel `news_category`
--

INSERT INTO `news_category` (`id`, `category`, `active`) VALUES
(2, 'General', 'yes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'title name, unique',
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'description of the pages',
  `active` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'define if the pages is visible or not',
  `post_url` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'to create search friendly urls',
  `row_order` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'order of the pages'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='pages files with path';

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `active`, `post_url`, `row_order`) VALUES
(11, 'Help', '&lt;p&gt;Let''s generate some example text. Just to give you a look of a filled page.&lt;/p&gt;&lt;p&gt;One alas much much roadrunner seal across squinted stopped one dissolutely by breathless and gosh bandicoot accommodating but that made iguanodon far some flustered that hello elephant grew artful fixed limpet qualitatively knew well following lost yet rugged one sporadically gecko foully far gosh so crazy more more lame earthworm gerbil a a before the hardheaded cozy.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Inflexibly tacit with jubilantly far as consistently jeepers owl but jeez far spoon-fed far darn wrote across caustically far less less yikes or kneeled luxuriant that learned hey yikes heated infuriating shamefully vengefully slavish yet alas eternal seagull rakish so considering fretful hey said soothing much astride oh towards but and tearful favorably forsook goodness lucid hey irrational much.&lt;br&gt;Less trout outside hello paid tamarin owl far guinea ignorantly snug dolphin ouch reined overabundant this vivaciously said notwithstanding resentfully opposite ravenously more cow much brusquely so the ouch talkative in however symbolically rapidly with goldfinch alas ape and cooperative.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Some far intrepid and wayward malicious on leaned ouch definite elephant mild then wow and more and that compulsive the happy numb sensational jeepers newt then tardily tarantula ladybug more raucously impulsive extrinsic unique limpet hence more rhythmic invidiously dear far via that burned far dug remade far met scorpion far ponderous and destructively fretful inside some crept far more grizzly far sheared goodness continually hippopotamus and mysterious porpoise more that llama one alas.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Gnu blinked wisely nonsensically dear plentiful some porcupine koala thankfully dear carnal well kookaburra faultily as queerly basic some got hence far discarded weasel less that specially far much and after this more reran a yikes virtuous the for chameleon much belched upset falcon some auspiciously somber hummingbird for hugged monogamous goodness goodness yet abnormal far threw delinquently snapped much hello towards noticeably jay celestial far one when wow goose yet more inaudible from yikes one a heedless some.&lt;br&gt;As thus selfless due clung arose slickly as far sarcastic stank much jeepers husky tarantula up cried but away crane much fantastic that together about brokenly longing unsafe by measurably the gosh more while near over dug far raccoon a thorough far therefore fussily or well goodness above a far awkwardly rat and tacitly koala rode naughty a played.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Yet meadowlark and this the less hey bawdily goodness some but by therefore wishfully darn dealt amidst however while erroneously the trite crab jeez some eel hawk yikes supply proper ostrich squirrel far awakened manifestly less.&lt;br&gt;Some alarmingly jeepers humble tartly like the thus dear but a far this decorously one and according rhinoceros prior kiwi jaunty bandicoot noticeable upheld and more then tarantula one copious because over wherever that more via jeepers anathematically in hey jeez laboriously congratulated that rhinoceros quit oh hilariously when moaned ouch slowly meadowlark since gosh and while bald but komodo much alongside and that along in one grasshopper disagreeably when familiarly laughed weasel whooped that.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Mundane raptly crab giggled gosh porcupine since adeptly vehement jeez cumulative unicorn misunderstood behind overate and that that opposite wholeheartedly until resigned ouch well other deft gawked fled rang that unequivocally wherever some or ouch swung scratched stubborn some unicorn hello.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Telepathic tepid fit pungent broadcast dizzily among far much flagrantly wherever much shrugged more a fit this foresaw more unerring with devilishly that doused via and porcupine or royally hence thus mocking far since well gosh far egotistically slept darn beyond dreadful past squarely a house however crab guarded that undid drank cried more amongst tentative from from much some jeez one less that ethereal saddled a overhung quiet a ouch on unwound whale this.										&lt;/p&gt;', 'yes', 'help-58294c25baba9', '0'),
(12, 'Terms of use', '&lt;p&gt;Let''s generate some example text. Just to give you a look of a filled page.&lt;/p&gt;&lt;p&gt;One alas much much roadrunner seal across squinted stopped one dissolutely by breathless and gosh bandicoot accommodating but that made iguanodon far some flustered that hello elephant grew artful fixed limpet qualitatively knew well following lost yet rugged one sporadically gecko foully far gosh so crazy more more lame earthworm gerbil a a before the hardheaded cozy.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Inflexibly tacit with jubilantly far as consistently jeepers owl but jeez far spoon-fed far darn wrote across caustically far less less yikes or kneeled luxuriant that learned hey yikes heated infuriating shamefully vengefully slavish yet alas eternal seagull rakish so considering fretful hey said soothing much astride oh towards but and tearful favorably forsook goodness lucid hey irrational much.&lt;br&gt;Less trout outside hello paid tamarin owl far guinea ignorantly snug dolphin ouch reined overabundant this vivaciously said notwithstanding resentfully opposite ravenously more cow much brusquely so the ouch talkative in however symbolically rapidly with goldfinch alas ape and cooperative.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Some far intrepid and wayward malicious on leaned ouch definite elephant mild then wow and more and that compulsive the happy numb sensational jeepers newt then tardily tarantula ladybug more raucously impulsive extrinsic unique limpet hence more rhythmic invidiously dear far via that burned far dug remade far met scorpion far ponderous and destructively fretful inside some crept far more grizzly far sheared goodness continually hippopotamus and mysterious porpoise more that llama one alas.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Gnu blinked wisely nonsensically dear plentiful some porcupine koala thankfully dear carnal well kookaburra faultily as queerly basic some got hence far discarded weasel less that specially far much and after this more reran a yikes virtuous the for chameleon much belched upset falcon some auspiciously somber hummingbird for hugged monogamous goodness goodness yet abnormal far threw delinquently snapped much hello towards noticeably jay celestial far one when wow goose yet more inaudible from yikes one a heedless some.&lt;br&gt;As thus selfless due clung arose slickly as far sarcastic stank much jeepers husky tarantula up cried but away crane much fantastic that together about brokenly longing unsafe by measurably the gosh more while near over dug far raccoon a thorough far therefore fussily or well goodness above a far awkwardly rat and tacitly koala rode naughty a played.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Yet meadowlark and this the less hey bawdily goodness some but by therefore wishfully darn dealt amidst however while erroneously the trite crab jeez some eel hawk yikes supply proper ostrich squirrel far awakened manifestly less.&lt;br&gt;Some alarmingly jeepers humble tartly like the thus dear but a far this decorously one and according rhinoceros prior kiwi jaunty bandicoot noticeable upheld and more then tarantula one copious because over wherever that more via jeepers anathematically in hey jeez laboriously congratulated that rhinoceros quit oh hilariously when moaned ouch slowly meadowlark since gosh and while bald but komodo much alongside and that along in one grasshopper disagreeably when familiarly laughed weasel whooped that.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Mundane raptly crab giggled gosh porcupine since adeptly vehement jeez cumulative unicorn misunderstood behind overate and that that opposite wholeheartedly until resigned ouch well other deft gawked fled rang that unequivocally wherever some or ouch swung scratched stubborn some unicorn hello.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Telepathic tepid fit pungent broadcast dizzily among far much flagrantly wherever much shrugged more a fit this foresaw more unerring with devilishly that doused via and porcupine or royally hence thus mocking far since well gosh far egotistically slept darn beyond dreadful past squarely a house however crab guarded that undid drank cried more amongst tentative from from much some jeez one less that ethereal saddled a overhung quiet a ouch on unwound whale this.&lt;/p&gt;					', 'yes', 'terms-of-use', '1'),
(13, 'Contact', '&lt;p&gt;Let''s generate some example text. Just to give you a look of a filled page.&lt;/p&gt;&lt;p&gt;One alas much much roadrunner seal across squinted stopped one dissolutely by breathless and gosh bandicoot accommodating but that made iguanodon far some flustered that hello elephant grew artful fixed limpet qualitatively knew well following lost yet rugged one sporadically gecko foully far gosh so crazy more more lame earthworm gerbil a a before the hardheaded cozy.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Inflexibly tacit with jubilantly far as consistently jeepers owl but jeez far spoon-fed far darn wrote across caustically far less less yikes or kneeled luxuriant that learned hey yikes heated infuriating shamefully vengefully slavish yet alas eternal seagull rakish so considering fretful hey said soothing much astride oh towards but and tearful favorably forsook goodness lucid hey irrational much.&lt;br&gt;Less trout outside hello paid tamarin owl far guinea ignorantly snug dolphin ouch reined overabundant this vivaciously said notwithstanding resentfully opposite ravenously more cow much brusquely so the ouch talkative in however symbolically rapidly with goldfinch alas ape and cooperative.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Some far intrepid and wayward malicious on leaned ouch definite elephant mild then wow and more and that compulsive the happy numb sensational jeepers newt then tardily tarantula ladybug more raucously impulsive extrinsic unique limpet hence more rhythmic invidiously dear far via that burned far dug remade far met scorpion far ponderous and destructively fretful inside some crept far more grizzly far sheared goodness continually hippopotamus and mysterious porpoise more that llama one alas.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Gnu blinked wisely nonsensically dear plentiful some porcupine koala thankfully dear carnal well kookaburra faultily as queerly basic some got hence far discarded weasel less that specially far much and after this more reran a yikes virtuous the for chameleon much belched upset falcon some auspiciously somber hummingbird for hugged monogamous goodness goodness yet abnormal far threw delinquently snapped much hello towards noticeably jay celestial far one when wow goose yet more inaudible from yikes one a heedless some.&lt;br&gt;As thus selfless due clung arose slickly as far sarcastic stank much jeepers husky tarantula up cried but away crane much fantastic that together about brokenly longing unsafe by measurably the gosh more while near over dug far raccoon a thorough far therefore fussily or well goodness above a far awkwardly rat and tacitly koala rode naughty a played.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Yet meadowlark and this the less hey bawdily goodness some but by therefore wishfully darn dealt amidst however while erroneously the trite crab jeez some eel hawk yikes supply proper ostrich squirrel far awakened manifestly less.&lt;br&gt;Some alarmingly jeepers humble tartly like the thus dear but a far this decorously one and according rhinoceros prior kiwi jaunty bandicoot noticeable upheld and more then tarantula one copious because over wherever that more via jeepers anathematically in hey jeez laboriously congratulated that rhinoceros quit oh hilariously when moaned ouch slowly meadowlark since gosh and while bald but komodo much alongside and that along in one grasshopper disagreeably when familiarly laughed weasel whooped that.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Mundane raptly crab giggled gosh porcupine since adeptly vehement jeez cumulative unicorn misunderstood behind overate and that that opposite wholeheartedly until resigned ouch well other deft gawked fled rang that unequivocally wherever some or ouch swung scratched stubborn some unicorn hello.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Telepathic tepid fit pungent broadcast dizzily among far much flagrantly wherever much shrugged more a fit this foresaw more unerring with devilishly that doused via and porcupine or royally hence thus mocking far since well gosh far egotistically slept darn beyond dreadful past squarely a house however crab guarded that undid drank cried more amongst tentative from from much some jeez one less that ethereal saddled a overhung quiet a ouch on unwound whale this.&lt;/p&gt;					', 'yes', 'contact', '3'),
(14, 'Privacy policies', '&lt;p&gt;Let''s generate some example text. Just to give you a look of a filled page.&lt;/p&gt;&lt;p&gt;One alas much much roadrunner seal across squinted stopped one dissolutely by breathless and gosh bandicoot accommodating but that made iguanodon far some flustered that hello elephant grew artful fixed limpet qualitatively knew well following lost yet rugged one sporadically gecko foully far gosh so crazy more more lame earthworm gerbil a a before the hardheaded cozy.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Inflexibly tacit with jubilantly far as consistently jeepers owl but jeez far spoon-fed far darn wrote across caustically far less less yikes or kneeled luxuriant that learned hey yikes heated infuriating shamefully vengefully slavish yet alas eternal seagull rakish so considering fretful hey said soothing much astride oh towards but and tearful favorably forsook goodness lucid hey irrational much.&lt;br&gt;Less trout outside hello paid tamarin owl far guinea ignorantly snug dolphin ouch reined overabundant this vivaciously said notwithstanding resentfully opposite ravenously more cow much brusquely so the ouch talkative in however symbolically rapidly with goldfinch alas ape and cooperative.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Some far intrepid and wayward malicious on leaned ouch definite elephant mild then wow and more and that compulsive the happy numb sensational jeepers newt then tardily tarantula ladybug more raucously impulsive extrinsic unique limpet hence more rhythmic invidiously dear far via that burned far dug remade far met scorpion far ponderous and destructively fretful inside some crept far more grizzly far sheared goodness continually hippopotamus and mysterious porpoise more that llama one alas.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Gnu blinked wisely nonsensically dear plentiful some porcupine koala thankfully dear carnal well kookaburra faultily as queerly basic some got hence far discarded weasel less that specially far much and after this more reran a yikes virtuous the for chameleon much belched upset falcon some auspiciously somber hummingbird for hugged monogamous goodness goodness yet abnormal far threw delinquently snapped much hello towards noticeably jay celestial far one when wow goose yet more inaudible from yikes one a heedless some.&lt;br&gt;As thus selfless due clung arose slickly as far sarcastic stank much jeepers husky tarantula up cried but away crane much fantastic that together about brokenly longing unsafe by measurably the gosh more while near over dug far raccoon a thorough far therefore fussily or well goodness above a far awkwardly rat and tacitly koala rode naughty a played.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Yet meadowlark and this the less hey bawdily goodness some but by therefore wishfully darn dealt amidst however while erroneously the trite crab jeez some eel hawk yikes supply proper ostrich squirrel far awakened manifestly less.&lt;br&gt;Some alarmingly jeepers humble tartly like the thus dear but a far this decorously one and according rhinoceros prior kiwi jaunty bandicoot noticeable upheld and more then tarantula one copious because over wherever that more via jeepers anathematically in hey jeez laboriously congratulated that rhinoceros quit oh hilariously when moaned ouch slowly meadowlark since gosh and while bald but komodo much alongside and that along in one grasshopper disagreeably when familiarly laughed weasel whooped that.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Mundane raptly crab giggled gosh porcupine since adeptly vehement jeez cumulative unicorn misunderstood behind overate and that that opposite wholeheartedly until resigned ouch well other deft gawked fled rang that unequivocally wherever some or ouch swung scratched stubborn some unicorn hello.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Telepathic tepid fit pungent broadcast dizzily among far much flagrantly wherever much shrugged more a fit this foresaw more unerring with devilishly that doused via and porcupine or royally hence thus mocking far since well gosh far egotistically slept darn beyond dreadful past squarely a house however crab guarded that undid drank cried more amongst tentative from from much some jeez one less that ethereal saddled a overhung quiet a ouch on unwound whale this.&lt;/p&gt;					', 'yes', 'privacy-policies', '2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'title name, unique',
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'author of the product',
  `short_description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'short product description',
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'description of the product',
  `funding_goal` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'goal of the funding',
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id of the product category',
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'image of the product',
  `video` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'video link to youtube, vimeo or upload',
  `path` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'path to the product file',
  `views` varchar(10000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'number of views for the product',
  `likes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'number of likes for the product',
  `start_date` date NOT NULL COMMENT 'start date of the product',
  `end_date` date NOT NULL COMMENT 'end date of the product',
  `complete_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'not_started' COMMENT 'not_started, started, complete, closed',
  `active` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'define if the product is visible or not',
  `post_url` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'to create search friendly urls'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='product files with path';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'category name, unique',
  `active` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'define if the category is used'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='product category';

--
-- Gegevens worden geëxporteerd voor tabel `product_category`
--

INSERT INTO `product_category` (`id`, `category`, `active`) VALUES
(1, 'Art', 'yes'),
(2, 'Crafts', 'yes'),
(3, 'Dance', 'yes'),
(4, 'Design', 'yes'),
(5, 'Fashion', 'yes'),
(6, 'Film & video', 'yes'),
(7, 'Food', 'yes'),
(8, 'Games', 'yes'),
(9, 'Journalism', 'yes'),
(10, 'Music', 'yes'),
(11, 'Photography', 'yes'),
(12, 'Publishing', 'yes'),
(13, 'Technology', 'yes'),
(14, 'Theater', 'yes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_funders`
--

CREATE TABLE IF NOT EXISTS `product_funders` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to product id',
  `user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to user id',
  `pledge_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to pledge reward',
  `total` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'funding total',
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'not_delivered' COMMENT 'not_delivered, delivered'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='who funded the project';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_funding`
--

CREATE TABLE IF NOT EXISTS `product_funding` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to product id',
  `backers` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'number of backers',
  `funded` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'total funded amount',
  `payout_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'waiting' COMMENT 'waiting, progress, cancelled, done',
  `paid` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid amount to product owner without the fee',
  `paid_date` date NOT NULL COMMENT 'paid date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='what is funded to the project';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_pledge`
--

CREATE TABLE IF NOT EXISTS `product_pledge` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to product id',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'title of the pledge',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description of the pledge',
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'price to donate',
  `delivery_date` date NOT NULL COMMENT 'expected delivery date',
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pledge creator',
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pledge image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='pledge related to the product';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `settings_general`
--

CREATE TABLE IF NOT EXISTS `settings_general` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'website title, unique',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description of the website',
  `contact_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'support or contact email',
  `secret_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'secure key for extra protection',
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'your site logo',
  `subdomain` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'enter your subdomain (optional)',
  `hide_copyright` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'hide copyright on the site',
  `sharethis` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'd6f0b30a-141f-4304-8c99-a4b1e381fefc' COMMENT 'your sharethis.com account',
  `disqus` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'appstorm' COMMENT 'your disqus.com account',
  `seo` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'enable seo link with htaccess'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='general settings for the website';

--
-- Gegevens worden geëxporteerd voor tabel `settings_general`
--

INSERT INTO `settings_general` (`id`, `title`, `description`, `contact_email`, `secret_key`, `logo`, `subdomain`, `hide_copyright`, `sharethis`, `disqus`, `seo`) VALUES
(1, 'Your title', 'Your description', 'your@email.com', 'yoursecurekey', '', '', 'no', 'd6f0b30a-141f-4304-8c99-a4b1e381fefc', 'demo', 'no');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `settings_payment`
--

CREATE TABLE IF NOT EXISTS `settings_payment` (
  `id` int(11) NOT NULL,
  `price_membership` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'define the price for a membership account',
  `price_membership_b` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'define the price for a membership',
  `price_membership_c` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'define the price for a membership',
  `number_of_coins` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'define the number of coins as reward',
  `number_of_coins_b` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'define the number of coins as reward',
  `number_of_coins_c` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'define the number of coins as reward',
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'default payment currency',
  `paypal_active` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'active or not, unique',
  `paypal_account` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'define paypal account',
  `paypal_sandbox` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'enable sandbox mode',
  `stripe_active` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'active or not, unique',
  `stripe_account` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pk_test_g5rNCSWKUv0plMxfVytIihi1' COMMENT 'define stripe account',
  `fee` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'percentage fee for payouts'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='general payment settings for the website';

--
-- Gegevens worden geëxporteerd voor tabel `settings_payment`
--

INSERT INTO `settings_payment` (`id`, `price_membership`, `price_membership_b`, `price_membership_c`, `number_of_coins`, `number_of_coins_b`, `number_of_coins_c`, `currency`, `paypal_active`, `paypal_account`, `paypal_sandbox`, `stripe_active`, `stripe_account`, `fee`) VALUES
(1, '10', '50', '100', '10', '50', '100', 'USD', 'yes', 'demo@demo.com', 'yes', 'yes', 'pk_test_g5rNCSWKUv0plMxfVytIihi1', '5');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `statistics_payments`
--

CREATE TABLE IF NOT EXISTS `statistics_payments` (
  `id` int(10) unsigned NOT NULL,
  `amount` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'total amount of income',
  `date` date NOT NULL COMMENT 'payment date'
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`) VALUES
(1, 'admin', '$2y$10$XgKFU9KWTEd40D3APc82V.GIkB7Ie8Y860CaM8NKdAfN8clH1XKU.', 'your@email.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users_analytics`
--

CREATE TABLE IF NOT EXISTS `users_analytics` (
  `id` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL COMMENT 'user id reference',
  `ip` varchar(25) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `vdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users_analytics`
--

INSERT INTO `users_analytics` (`id`, `user_id`, `ip`, `browser`, `country`, `vdate`) VALUES
(1, 'user1', '120.1.2.01', 'Chrome', 'Russia', '2015-09-01'),
(2, 'user2', '120.1.0.53', 'Firefox', 'Russia', '2015-09-01'),
(3, 'user3', '83.162.219.113', 'Google Chrome', 'Russia', '2016-10-04'),
(4, 'user4', '198.0.0.5', 'Safari', 'India', '2015-09-03'),
(50, 'admin', '185.27.41.205', 'Google Chrome', 'Netherlands', '2016-11-16'),
(70, 'user5', '90.145.228.242', 'Google Chrome', 'Netherlands', '2016-09-30'),
(71, 'demo2', '83.162.219.113', 'Google Chrome', 'India', '2016-10-05'),
(72, 'demo', '185.27.41.205', 'Google Chrome', 'Netherlands', '2016-11-13'),
(73, 'superman', '217.121.137.235', 'Google Chrome', 'Netherlands', '2016-11-12');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users_details`
--

CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to the users id',
  `admin` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'define is the user has admin permissions',
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'users first name',
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'users last name',
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'male' COMMENT 'define gender (male or female)',
  `date_of_birth` date NOT NULL COMMENT 'define birthday',
  `profile_image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-' COMMENT 'city where living',
  `country` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `website` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `facebook` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `twitter` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `last_login` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'last login date of user',
  `paypal` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'users paypal address'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='users details';

--
-- Gegevens worden geëxporteerd voor tabel `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `admin`, `first_name`, `last_name`, `gender`, `date_of_birth`, `profile_image`, `description`, `location`, `country`, `website`, `facebook`, `twitter`, `last_login`, `paypal`) VALUES
(16, 'admin', 'yes', 'Super', 'Admin', '', '1969-12-31', '1/images/582688081582b54a8f38372.70774564.png', '', '', '', '', '', '', '', 'demo@demo.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users_membership`
--

CREATE TABLE IF NOT EXISTS `users_membership` (
  `id` int(11) NOT NULL COMMENT 'auto incrementing id, unique index',
  `user_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to the users id',
  `membership` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'current user membership',
  `days` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'the number of days active membership'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='membership details';

--
-- Gegevens worden geëxporteerd voor tabel `users_membership`
--

INSERT INTO `users_membership` (`id`, `user_id`, `membership`, `days`) VALUES
(9, 'admin', 'paid', '10000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users_payments`
--

CREATE TABLE IF NOT EXISTS `users_payments` (
  `id` int(10) unsigned NOT NULL,
  `user_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reference to the users id',
  `amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'amount of the payment',
  `payment_type` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'payment details',
  `date` date NOT NULL COMMENT 'payment date'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='payment details';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users_reset`
--

CREATE TABLE IF NOT EXISTS `users_reset` (
  `id` int(11) NOT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'reset password'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user reset data';

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cronjob`
--
ALTER TABLE `cronjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_funders`
--
ALTER TABLE `product_funders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_funding`
--
ALTER TABLE `product_funding`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_pledge`
--
ALTER TABLE `product_pledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `settings_general`
--
ALTER TABLE `settings_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `settings_payment`
--
ALTER TABLE `settings_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `statistics_payments`
--
ALTER TABLE `statistics_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`), ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexen voor tabel `users_analytics`
--
ALTER TABLE `users_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users_membership`
--
ALTER TABLE `users_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users_payments`
--
ALTER TABLE `users_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users_reset`
--
ALTER TABLE `users_reset`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cronjob`
--
ALTER TABLE `cronjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT voor een tabel `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT voor een tabel `product_funders`
--
ALTER TABLE `product_funders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT voor een tabel `product_funding`
--
ALTER TABLE `product_funding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `product_pledge`
--
ALTER TABLE `product_pledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `settings_general`
--
ALTER TABLE `settings_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `settings_payment`
--
ALTER TABLE `settings_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `statistics_payments`
--
ALTER TABLE `statistics_payments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT voor een tabel `users_analytics`
--
ALTER TABLE `users_analytics`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT voor een tabel `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT voor een tabel `users_membership`
--
ALTER TABLE `users_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing id, unique index',AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT voor een tabel `users_payments`
--
ALTER TABLE `users_payments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT voor een tabel `users_reset`
--

