/*---------------------------------------*/
/* 演習1                                 */
/*---------------------------------------*/

/*-- データベースを作成,選択  --*/
CREATE DATABASE IF NOT EXISTS gachadb;
USE gachadb;


/**
 * 武将テーブル
 */
CREATE TABLE Busho(
  id      int,         /* 武将ID */
  name    varchar(64), /* 武将名 */
  rarity  varchar(2),  /* レアリティ */
  image   varchar(32), /* 武将画像 */

  PRIMARY KEY (id)
);


/**
 * ガチャ履歴
 */
CREATE TABLE GachaHistory(
  id          int AUTO_INCREMENT,  /* 連番 */
  busho_id    int,      /* 武将ID */
  regist_date datetime, /* 排出日時(YYYY-MM-DD hh:mm:ss) */

  PRIMARY KEY (id)
);
