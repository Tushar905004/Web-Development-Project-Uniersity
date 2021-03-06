

CREATE TABLE `tbl_admin` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_admin VALUES("1","admin","admin");





CREATE TABLE `tbl_bonus` (
  `bonus_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `paid_bonus` varchar(10) NOT NULL,
  `pay_month` varchar(50) NOT NULL,
  `pay_year` int(4) NOT NULL,
  `paid_date` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`bonus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_customer_info` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `cus_name` text NOT NULL,
  `address` text NOT NULL,
  `mob_no` varchar(15) NOT NULL,
  `status` varchar(5) NOT NULL,
  `reg_date` int(20) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_expend` (
  `expend_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `amount` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`expend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_godown` (
  `godown_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_sl` varchar(100) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `buy_price` double NOT NULL,
  `cover_price` double NOT NULL,
  `warrenty` varchar(50) NOT NULL,
  `entry_by` varchar(50) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `sub_id` int(12) NOT NULL COMMENT 'sub_id means sub cateogory id',
  `shop_id` int(5) NOT NULL,
  PRIMARY KEY (`godown_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_income` (
  `income_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `amount` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`income_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_memo` (
  `memo_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `memo_date` varchar(20) NOT NULL,
  PRIMARY KEY (`memo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_personal_account` (
  `account_id` int(8) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `amount` varchar(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL COMMENT 'this means entry''s month',
  `year` int(4) NOT NULL COMMENT 'this means entry''s year',
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO tbl_personal_account VALUES("1","lone","300000","05-09-2013","04/09/2013","","0");
INSERT INTO tbl_personal_account VALUES("2","dhaka","8900","01/01/2011","04/09/2013","September","2013");
INSERT INTO tbl_personal_account VALUES("3","---","300000","01/01/2011","04-09-2013","September","2013");
INSERT INTO tbl_personal_account VALUES("4","hihi","8989","98989","89898","989","89");





CREATE TABLE `tbl_product_buying` (
  `buying_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(5) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `note` varchar(10) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `due` varchar(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL COMMENT 'month means entry month',
  `year` int(4) NOT NULL,
  PRIMARY KEY (`buying_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_product_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(40) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO tbl_product_category VALUES("1","Motor Cycle");
INSERT INTO tbl_product_category VALUES("2","Motor Cycle BD");





CREATE TABLE `tbl_product_sub_category` (
  `sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(50) NOT NULL,
  `category_id` int(10) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tbl_product_sub_category VALUES("1","Fusion","1");
INSERT INTO tbl_product_sub_category VALUES("2","Discovery","1");
INSERT INTO tbl_product_sub_category VALUES("3","Fusions","2");
INSERT INTO tbl_product_sub_category VALUES("4","Discovery","2");





CREATE TABLE `tbl_sallery` (
  `sallery_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `total_sallery` varchar(10) NOT NULL,
  `paid_sallery` varchar(10) NOT NULL,
  `pay_month` varchar(10) NOT NULL,
  `pay_year` int(4) NOT NULL,
  `month` varchar(50) NOT NULL COMMENT 'this means entry''s month',
  `year` int(4) NOT NULL COMMENT 'this means entry''s year',
  `paid_date` varchar(30) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`sallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO tbl_sallery VALUES("1","1","1200","1000","January","2012","September","2013","03-09-2013","");
INSERT INTO tbl_sallery VALUES("2","1","1200","200","January","2012","September","2013","03-09-2013","");
INSERT INTO tbl_sallery VALUES("3","3","4000","3000","January","2013","September","2013","03-09-2013","");
INSERT INTO tbl_sallery VALUES("4","3","4000","1000","January","2013","September","2013","03-09-2013","");





CREATE TABLE `tbl_sell` (
  `sell_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_sl` int(20) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `warrenty` varchar(20) NOT NULL,
  `buy_price` int(10) NOT NULL,
  `cover_price` int(10) NOT NULL,
  `sell_by` varchar(20) NOT NULL,
  `sell_date` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `sub_id` int(5) NOT NULL,
  `shop_id` int(5) NOT NULL,
  `cust_id` int(5) NOT NULL,
  `memo_id` int(10) NOT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO tbl_sell VALUES("1","123","walton motor cycle","---","1 year","500","600","murad","31-08-2013","","0","1","1","1","1");
INSERT INTO tbl_sell VALUES("2","58","hangury","----","---","333","455","murad","01-09-2013","","0","1","1","2","2");
INSERT INTO tbl_sell VALUES("3","1234","Nokia BB","----","---","350","5656","murad","01-09-2013","September","2013","1","1","1","3");
INSERT INTO tbl_sell VALUES("4","589","Nokia BB","-----------
\n-----------
\n-----------","10 years","900","298678","murad1","03-09-2013","September","2013","1","1","1","4");
INSERT INTO tbl_sell VALUES("5","89699882","Nokia BB","----","---","577","500","murad1","03-09-2013","September","2013","1","1","1","4");
INSERT INTO tbl_sell VALUES("6","99898","walton motor cycle","150 cc","1 year","170000","18000","murad1","04-09-2013","September","2013","2","1","3","5");
INSERT INTO tbl_sell VALUES("7","12","walton motor cycle","---","---","278","500","murad1","04-09-2013","September","2013","1","1","6","6");
INSERT INTO tbl_sell VALUES("8","23","samsung","-----","---","350","7000","murad1","04-09-2013","September","2013","1","1","6","6");
INSERT INTO tbl_sell VALUES("9","58","Nokia BB","-----","7777","278","500","murad1","04-09-2013","September","2013","1","1","1","7");
INSERT INTO tbl_sell VALUES("10","589","hangury","-----","---","278","500","murad1","04-09-2013","September","2013","1","1","1","7");





CREATE TABLE `tbl_sell_history` (
  `history_id` int(10) NOT NULL AUTO_INCREMENT,
  `memo_id` int(10) NOT NULL,
  `discount` int(3) NOT NULL,
  `total_price` int(11) NOT NULL,
  `paid` int(10) NOT NULL,
  `instalment` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `sell_by` varchar(20) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_shop` (
  `shop_id` int(5) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(50) NOT NULL,
  `shop_address` varchar(30) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tbl_shop VALUES("1","WALTON EXCLUSIVE","Uttar Bazer");
INSERT INTO tbl_shop VALUES("2","Sangeeta Electronics","Hazi Karim Ullah Plaza");





CREATE TABLE `tbl_stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_sl` varchar(100) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `buy_price` double NOT NULL,
  `cover_price` double NOT NULL,
  `warrenty` varchar(50) NOT NULL,
  `entry_by` varchar(50) NOT NULL,
  `entry_date` varchar(30) NOT NULL,
  `sub_id` int(12) NOT NULL COMMENT 'sub_id means sub cateogory id',
  `shop_id` int(5) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO tbl_stock VALUES("4","58","Nokia BB","-----","500","234","---","murad1","03/09/2013","2","1");
INSERT INTO tbl_stock VALUES("8","896","hangury","----","400","300","--","murad1","04/09/2013","2","1");





CREATE TABLE `tbl_tmp_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `entry_time` varchar(40) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(30) NOT NULL,
  `f_name` text NOT NULL,
  `age` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `join_date` varchar(30) NOT NULL,
  `d` int(2) NOT NULL COMMENT 'day',
  `m` int(2) NOT NULL COMMENT 'month',
  `y` int(4) NOT NULL COMMENT 'year',
  `sallery` varchar(10) NOT NULL,
  `shop_id` int(5) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO tbl_user VALUES("3","Hasan Murad","Md Ismail","22","Parshuram, Feni","018187989981","muradfcsi@gmail.com","Hasan Muradseven.jpg","1-1-2011","1","1","2011","4000","1","murad1","murad");





CREATE TABLE `tbl_vendor` (
  `vendor_id` int(3) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(200) NOT NULL,
  `vendor_address` text NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO tbl_vendor VALUES("1","Walton Bd","Parshuram");



