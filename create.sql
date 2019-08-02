SET names 'utf8';
create database becoming default character set utf8 COLLATE utf8_general_ci;
use becoming;

 				CREATE TABLE `alert_poll` (
                  `alert_num` int(11) NOT NULL AUTO_INCREMENT,
                  `click_id` varchar(255) NOT NULL,
                  `alarm_cate` varchar(255) NOT NULL,
                  `cate_key` int(11) NOT NULL,
                  PRIMARY KEY (`alert_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
                 CREATE TABLE `board` (
                  `board_num` int(11) NOT NULL AUTO_INCREMENT,
                  `boardtitle` varchar(255) DEFAULT NULL,
                  `bodytext` longtext,
                  `boardhash` varchar(255) DEFAULT NULL,
                  `user_id` varchar(255) DEFAULT NULL,
                  `boardpw` varchar(255) DEFAULT NULL,
                  `boardcate` varchar(255) DEFAULT NULL,
                  `first_written` datetime DEFAULT NULL,
                  `like_num` int(11) DEFAULT '0',
                  `view_num` int(11) DEFAULT '0',
                  `comment_num` int(11) DEFAULT '0',
                  `profile_img` varchar(255) NOT NULL,
                  `thumbnail` varchar(255) DEFAULT 'http://192.168.20.78/becoming0508/libs/ckeditor/images/basic.png',
                  `board_open` int(11) NOT NULL DEFAULT '1',
                  PRIMARY KEY (`board_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
                 CREATE TABLE `chat_login_details` (
                  `chat_login_num` int(11) NOT NULL AUTO_INCREMENT,
                  `user_id` varchar(255) NOT NULL,
                  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `is_typing` enum('no','yes') NOT NULL,
                  PRIMARY KEY (`chat_login_num`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                  CREATE TABLE `comment` (
                  `comment_num` int(11) NOT NULL AUTO_INCREMENT,
                  `board_num` int(11) DEFAULT NULL,
                  `id` varchar(255) DEFAULT NULL,
                  `comment_bodytext` varchar(255) DEFAULT NULL,
                  `comment_time` datetime DEFAULT NULL,
                  `comment_like` int(11) DEFAULT '0',
                  `comment_siren` int(11) DEFAULT '0',
                  `comment_open` int(11) NOT NULL DEFAULT '1',
                  PRIMARY KEY (`comment_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
                  CREATE TABLE `curation` (
                  `num` int(11) NOT NULL AUTO_INCREMENT,
                  `gender` int(11) NOT NULL,
                  `age` varchar(255) NOT NULL,
                  `case1` varchar(50) NOT NULL,
                  `rel` varchar(255) NOT NULL,
                  `hobby` varchar(255) NOT NULL,
                  `gift` varchar(255) NOT NULL,
                  PRIMARY KEY (`num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=33001 DEFAULT CHARSET=utf8;
                 CREATE TABLE `curator` (
                  `curator_num` int(11) NOT NULL AUTO_INCREMENT,
                  `user_id` varchar(255) NOT NULL,
                  `page_title` varchar(255) NOT NULL DEFAULT '&quot;안녕하세요&quot;',
                  `service_count` int(11) NOT NULL DEFAULT '0',
                  `service_pointavg` float DEFAULT '0',
                  `service_success` int(11) DEFAULT '0',
                  `service_num` int(11) NOT NULL,
                  `cupage_img` varchar(255) DEFAULT 'localhost/becoming0508/cupage_img/cu_basic.png',
                  `expert_hash` varchar(255) NOT NULL,
                  `count_pub` int(11) NOT NULL DEFAULT '1',
                  `success_pub` int(11) NOT NULL DEFAULT '1',
                  `point_pub` int(11) NOT NULL DEFAULT '1',
                  PRIMARY KEY (`curator_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
                 CREATE TABLE `cu_chat` (
                  `chat_num` int(11) NOT NULL AUTO_INCREMENT,
                  `chat_sender_id` varchar(255) NOT NULL,
                  `chat_receiver_id` varchar(255) NOT NULL,
                  `chat_body` longtext NOT NULL,
                  `chat_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `login_status` int(11) NOT NULL,
                  `chat_id` int(11) NOT NULL,
                  `msg_checkflag` int(11) NOT NULL DEFAULT '0',
                  PRIMARY KEY (`chat_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=680 DEFAULT CHARSET=utf8;
                 CREATE TABLE `cu_service` (
                  `service_num` int(11) NOT NULL AUTO_INCREMENT,
                  `service_cu` varchar(255) DEFAULT NULL,
                  `service_get` varchar(255) DEFAULT NULL,
                  `cu_profile` varchar(255) DEFAULT NULL,
                  `cu_gift` varchar(255) DEFAULT NULL,
                  `service_success` int(11) DEFAULT '0',
                  `service_point` int(11) DEFAULT '0',
                  `cu_review` varchar(255) DEFAULT NULL,
                  `service_start` date DEFAULT NULL,
                  `service_end` date DEFAULT NULL,
                  `service_switch` int(11) DEFAULT '1',
                  `service_public` int(11) DEFAULT '0',
                  `service_img` varchar(255) DEFAULT 'localhost/becoming0508/service_img/basic.png',
                  PRIMARY KEY (`service_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
                 CREATE TABLE `like_poll` (
                  `num` int(11) NOT NULL AUTO_INCREMENT,
                  `click_id` varchar(255) DEFAULT NULL,
                  `like_cate` varchar(255) DEFAULT NULL,
                  `cate_key` int(11) DEFAULT NULL,
                  `product_num` int(11) DEFAULT NULL,
                  PRIMARY KEY (`num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
                  CREATE TABLE `log_table` (
                  `log_num` int(11) NOT NULL AUTO_INCREMENT,
                  `log_date` datetime DEFAULT NULL,
                  `os` varchar(255) DEFAULT NULL,
                  `ip` varchar(255) DEFAULT NULL,
                  `view_page` varchar(255) DEFAULT NULL,
                  `log_userid` varchar(255) DEFAULT NULL,
                  PRIMARY KEY (`log_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
                  CREATE TABLE `member` (
                  `mem_num` int(11) NOT NULL AUTO_INCREMENT,
                  `id` varchar(255) NOT NULL,
                  `pw` varchar(255) DEFAULT NULL,
                  `nickname` varchar(255) DEFAULT NULL,
                  `email` varchar(255) DEFAULT NULL,
                  `name` varchar(255) DEFAULT NULL,
                  `profile_img` varchar(255) NOT NULL DEFAULT 'localhost/becoming0508/profile_img/basic.png',
                  `mypage_img` varchar(255) NOT NULL DEFAULT 'localhost/becoming0508/mypage_img/basic.png',
                  `hobby` varchar(255) DEFAULT NULL,
                  `curator` int(11) DEFAULT NULL,
                  `cash_point` float NOT NULL DEFAULT '0',
                  `current_session` int(11) NOT NULL,
                  `online` int(11) NOT NULL,
                  `seller` int(11) NOT NULL DEFAULT '0',
                  PRIMARY KEY (`id`),
                  KEY `mem_num` (`mem_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8;
                 CREATE TABLE `message` (
                  `message_num` int(11) NOT NULL AUTO_INCREMENT,
                  `sender_id` varchar(255) DEFAULT NULL,
                  `receiver_id` varchar(255) DEFAULT NULL,
                  `message_title` varchar(255) DEFAULT NULL,
                  `message_body` varchar(255) DEFAULT NULL,
                  `send_date` datetime DEFAULT CURRENT_TIMESTAMP,
                  `get_date` datetime DEFAULT NULL,
                  `confirm_flag` int(11) DEFAULT '0',
                  PRIMARY KEY (`message_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
                  CREATE TABLE `private` (
                  `num` int(11) NOT NULL AUTO_INCREMENT,
                  `user_id` varchar(255) DEFAULT NULL,
                  `phone` int(11) NOT NULL,
                  `birthday` int(11) DEFAULT NULL,
                  `address` varchar(255) DEFAULT NULL,
                  PRIMARY KEY (`num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
                  CREATE TABLE `product_manage` (
                  `pm_num` int(11) NOT NULL AUTO_INCREMENT,
                  `product_num` int(11) DEFAULT NULL,
                  `product_category` varchar(255) DEFAULT NULL,
                  `product_name` varchar(255) DEFAULT NULL,
                  `product_brand` varchar(255) DEFAULT NULL,
                  `product_option` varchar(255) DEFAULT NULL,
                  `p_opt_detail1` varchar(255) NOT NULL,
                  `p_opt_detail2` varchar(255) NOT NULL,
                  `product_quantity` int(11) DEFAULT NULL,
                  `product_flag` int(11) DEFAULT '1',
                  PRIMARY KEY (`pm_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=362 DEFAULT CHARSET=utf8;
                 CREATE TABLE `product_qna` (
                  `product_qna_num` int(11) NOT NULL AUTO_INCREMENT,
                  `product_num` int(11) DEFAULT NULL,
                  `answer_com` int(11) DEFAULT '0',
                  `question_cate` varchar(255) NOT NULL,
                  `question_title` varchar(255) NOT NULL,
                  `question_body` varchar(255) DEFAULT NULL,
                  `question_date` datetime DEFAULT CURRENT_TIMESTAMP,
                  `answer_date` datetime DEFAULT NULL,
                  `answer_title` varchar(255) NOT NULL,
                  `answer_body` varchar(500) DEFAULT NULL,
                  `QnA_available` int(11) DEFAULT '1',
                  `QnA_open` int(11) DEFAULT '1',
                  `questioner_id` varchar(255) DEFAULT NULL,
                  `answerer_id` varchar(255) DEFAULT NULL,
                  PRIMARY KEY (`product_qna_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
                  CREATE TABLE `product_review` (
                  `review_num` int(11) NOT NULL AUTO_INCREMENT,
                  `product_num` int(11) DEFAULT NULL,
                  `buyer_id` varchar(255) DEFAULT NULL,
                  `review_title` varchar(255) NOT NULL,
                  `review_body` varchar(255) DEFAULT NULL,
                  `review_open` int(11) DEFAULT '1',
                  `review_date` datetime DEFAULT CURRENT_TIMESTAMP,
                  `review_available` int(11) DEFAULT '1',
                  PRIMARY KEY (`review_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
                      CREATE TABLE `purchase_exchange` (
                  `ex_num` int(11) NOT NULL AUTO_INCREMENT,
                  `product_num` int(11) NOT NULL,
                  `pm_num` int(11) NOT NULL,
                  `purchase_num` int(11) NOT NULL,
                  `ex_title` varchar(255) NOT NULL,
                  `ex_body` varchar(255) NOT NULL,
                  `ex_state` int(11) NOT NULL,
                  `ex_flag` int(11) NOT NULL,
                  `ex_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `seller_id` varchar(255) NOT NULL,
                  PRIMARY KEY (`ex_num`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                 CREATE TABLE `purchase_record` (
                  `purchase_num` int(11) NOT NULL AUTO_INCREMENT,
                  `user_id` varchar(255) DEFAULT NULL,
                  `stack_point` int(11) DEFAULT '0',
                  `stack_money` int(11) DEFAULT '0',
                  `purchase_quantity` int(11) NOT NULL,
                  `product_num` int(11) DEFAULT NULL,
                  `purchase_date` datetime DEFAULT CURRENT_TIMESTAMP,
                  `purchase_stat` int(11) NOT NULL DEFAULT '0',
                  `purchase_msg` varchar(25) NOT NULL DEFAULT '빠른 배송 부탁드립니다',
                  `seller_id` varchar(255) NOT NULL,
                  `pm_num` int(11) NOT NULL,
                  PRIMARY KEY (`purchase_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;
                CREATE TABLE `purchase_refund` (
                  `refund_num` int(11) NOT NULL AUTO_INCREMENT,
                  `product_num` int(11) NOT NULL,
                  `pm_num` int(11) NOT NULL,
                  `purchase_num` int(11) NOT NULL,
                  `refund_title` varchar(255) NOT NULL,
                  `refund_body` varchar(255) NOT NULL,
                  `refund_stat` int(11) NOT NULL,
                  `refund_flag` int(11) NOT NULL DEFAULT '0',
                  `refund_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `seller_id` varchar(255) NOT NULL,
                  PRIMARY KEY (`refund_num`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                  CREATE TABLE `shop_cart` (
                  `cart_p_num` int(11) NOT NULL AUTO_INCREMENT,
                  `user_id` varchar(255) DEFAULT NULL,
                  `product_num` int(11) DEFAULT NULL,
                  `cart_sum` int(11) DEFAULT '1',
                  `delivery_cal` varchar(255) DEFAULT '2,500원',
                  `pm_num` int(11) NOT NULL,
                  PRIMARY KEY (`cart_p_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
                CREATE TABLE `shop_product` (
                  `product_num` int(11) NOT NULL AUTO_INCREMENT,
                  `category` varchar(255) DEFAULT NULL,
                  `sub_category` varchar(255) DEFAULT NULL,
                  `product_name` varchar(255) DEFAULT NULL,
                  `product_seller_id` varchar(255) DEFAULT NULL,
                  `product_brand` varchar(255) DEFAULT NULL,
                  `product_price` varchar(255) DEFAULT NULL,
                  `sale_percent` varchar(255) DEFAULT '1',
                  `product_drice` varchar(255) DEFAULT NULL,
                  `product_app_date` datetime DEFAULT CURRENT_TIMESTAMP,
                  `product_event` varchar(255) DEFAULT '0',
                  `product_open` int(11) DEFAULT '1',
                  `product_desc` varchar(255) NOT NULL,
                  `product_thumb` varchar(255) DEFAULT NULL,
                  `product_detail_img` varchar(255) DEFAULT NULL,
                  `product_delivery` varchar(255) DEFAULT NULL,
                  `product_refund` varchar(255) DEFAULT NULL,
                  `product_exchange` varchar(255) DEFAULT NULL,
                  `product_question` varchar(255) DEFAULT NULL,
                  `product_sel_num` int(11) DEFAULT '0',
                  `product_review_num` int(11) DEFAULT '0',
                  `product_view_num` int(11) DEFAULT '0',
                  PRIMARY KEY (`product_num`)
                ) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=utf8;