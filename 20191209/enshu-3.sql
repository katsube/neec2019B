/*---------------------------------------*/
/* 演習3                                 */
/*---------------------------------------*/

/*-- データベースを選択  --*/
USE gachadb;

/**
 * 設問1
 */
SELECT A.id, A.name, count(*)
FROM   Busho A, GachaHistory B
WHERE  A.id=B.busho_id
GROUP BY A.id, A.name;

/**
 * 設問2
 */
SELECT B.user_id, count(*)
FROM   Busho A, GachaHistory B, GameUser C
WHERE  A.id=B.busho_id
AND    B.user_id=C.id
AND    A.id=3           /* 斎藤道三のIDを指定 */
GROUP BY B.user_id;
