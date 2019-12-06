/*---------------------------------------*/
/* 演習2用サンプルデータ                 */
/*---------------------------------------*/

/*-- データベースを選択  --*/
USE gachadb;

/*--  テーブルの中身を空にする --*/
TRUNCATE Busho;
TRUNCATE GachaHistory;
TRUNCATE GameUser;


/*--  武将 (演習1と同じデータ) --*/
INSERT INTO Busho
VALUES
  (1, '清少納言', 'UR', 'nagon.jpg'),
  (2, '織田信長', 'SR', 'nobunaga.jpg'),
  (3, '斎藤道三', 'SR', 'douzan.jpg'),
  (4, '静御前',   'SR', 'sizuka.jpg'),
  (5, 'ペリー',   'R',  'perry.jpg')
  ;

/*--  ユーザー情報 --*/
INSERT INTO GameUser(name)
VALUES
  ('Aにゃん'),
  ('Bにゃん')
  ;

/*--  ガチャ履歴 --*/
INSERT INTO GachaHistory(user_id, busho_id, regist_date)
VALUES
  (1, 1, now()),
  (2, 2, now()),
  (1, 3, now()),
  (2, 3, now()),
  (1, 4, now()),
  (2, 5, now()),
  (1, 5, now()),
  (2, 5, now()),
  (1, 2, now()),
  (2, 1, now())
  ;
