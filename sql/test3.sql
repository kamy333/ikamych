
SELECT year(e.expense_date) AS Yr, month (e.expense_date) AS Mth,monthname (e.expense_date) as MthName,
       e.expense_date, e.id,e.amount,c.currency,ROUND(e.amount * e.rate,2) AS amountCHF,e.ccy_id,c.rate,e.expense_type_id,t.expense_type,e.comment,p.person_name,e.person_id
 FROM myexpense as e
 INNER JOIN  myexpense_person as p ON e.person_id = p.id
 INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
 INNER JOIN  currency as c ON e.ccy_id = c.id
  WHERE person_id=2  and(e.expense_type_id in (1,3))
  ORDER BY e.id DESC;


SELECT year(e.expense_date) as Yr, monthname (e.expense_date) as MthName,
       month(e.expense_date) as Mth,COUNT(e.id) AS itemsCount,SUM(ROUND(e.amount * e.rate,2)) AS AmountCHF,
       SUM(e.amount)  as Amount
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2   and(e.expense_type_id in (1,3))
GROUP BY year(e.expense_date),month(e.expense_date)
ORDER BY year(e.expense_date) DESC,month(e.expense_date) DESC
;


SELECT year(e.expense_date) as Yr,COUNT(e.id) AS itemsCount, SUM(e.amount) as Amount,SUM(ROUND(e.amount * e.rate,2)) AS AmountCHF
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2   and(e.expense_type_id in (1,3))
GROUP BY year(e.expense_date)
ORDER BY year(e.expense_date) DESC
;

SELECT year(e.expense_date) as Yr,COUNT(e.id) AS itemsCount,
       SUM(ROUND(e.amount * e.rate,2)) AS amountCHF
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2 and e.amount >=0   and(e.expense_type_id in (1,3))
GROUP BY year(e.expense_date)
ORDER BY year(e.expense_date) DESC
;

SELECT year(e.expense_date) as Yr,COUNT(e.id) AS itemsCount,
         SUM(ROUND(e.amount * e.rate,2)) AS amountCHF
         FROM myexpense as e
         INNER JOIN  myexpense_person as p ON e.person_id = p.id
         INNER JOIN  myexpense_type as t ON e.expense_type_id = t.id
         INNER JOIN  currency as c ON e.ccy_id = c.id
WHERE person_id = 2 and e.amount <0   and(e.expense_type_id in (1,3))
GROUP BY year(e.expense_date)
ORDER BY year(e.expense_date) DESC
;