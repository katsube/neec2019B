/*---------------------------------------*/
/* 演習1用サンプルデータ                 */
/*---------------------------------------*/

/*--  データベースを選択 --*/
USE gachadb;

/*--  テーブルの中身を空にする --*/
TRUNCATE Busho;
TRUNCATE GachaHistory;

/*--  武将 --*/
INSERT INTO Busho
VALUES
  (1, '清少納言', 'UR', 'nagon.jpg'),
  (2, '織田信長', 'SR', 'nobunaga.jpg'),
  (3, '斎藤道三', 'SR', 'douzan.jpg'),
  (4, '静御前',   'SR', 'sizuka.jpg'),
  (5, 'ペリー',   'R',  'perry.jpg')
  ;

/*--  ガチャ履歴 --*/
INSERT INTO GachaHistory(busho_id, regist_date)
VALUES
  (1, now()),
  (2, now()),
  (3, now()),
  (3, now()),
  (4, now()),
  (5, now()),
  (5, now()),
  (5, now()),
  (2, now()),
  (1, now())
  ;
