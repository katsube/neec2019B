/**
 * ニコニコ動画DB
 */

/*----------------------------*/
/* DB作成                      */
/*----------------------------*/
CREATE DATABASE IF NOT EXISTS nico2db;
USE nico2db;

/*----------------------------*/
/* テーブルを作成               */
/*----------------------------*/
/*-- video --*/
CREATE TABLE IF NOT EXISTS video(
	`video_id`    varchar(32),     /* 動画ID */
	`title`       varchar(255),    /* 動画タイトル */
	`description` varchar(255),    /* 動画説明文 */
	`watch_num`   integer,         /* 再生数 */
	`comment_num` integer,         /* コメント数 */
	`mylist_num`  integer,         /* マイリスト登録数 */
	`category`    varchar(255),    /* 動画カテゴリ */
	`tags`        varchar(255),    /* タグ */
	`upload_time` integer,         /* 投稿時間 (UNIX時間・秒) */
	`file_type`   varchar(32),     /* 動画フォーマット */
	`length`      integer,         /* 動画再生長 (秒数) */
	`size_high`   integer,         /* 高画質動画のファイルサイズ (byte) */
	`size_low`    integer          /* 低画質動画のファイルサイズ (byte) */
)
ENGINE=InnoDB   /* MySQLのエンジンを指定 */
CHARSET=utf8;   /* 文字コード */

/*-- 念の為テーブルの中身をすべて削除する --*/
TRUNCATE TABLE video;
