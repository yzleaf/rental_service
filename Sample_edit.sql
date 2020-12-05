-- INDI_COUPON 10
insert into indi_coupon values (1000, 0.05, date '2019-10-2', date '2020-3-2');
insert into indi_coupon values (1001, 0.10, date '2019-10-12', date '2020-3-12');
insert into indi_coupon values (1002, 0.15, date '2019-10-22', date '2020-3-27');
insert into indi_coupon values (1003, 0.15, date '2019-11-3', date '2020-5-2');
insert into indi_coupon values (1004, 0.18, date '2019-11-16', date '2020-5-9');
insert into indi_coupon values (1005, 0.18, date '2019-11-27', date '2020-5-12');
insert into indi_coupon values (1006, 0.20, date '2020-1-5', date '2020-12-2');
insert into indi_coupon values (1007, 0.20, date '2020-2-16', date '2020-12-12');
insert into indi_coupon values (1008, 0.25, date '2020-3-27', date '2020-12-22');
insert into indi_coupon values (1009, 0.25, date '2020-4-29', date '2020-12-31');

-- CORP_DISCOUNT 10
insert into corp_discount values ('ACORP000000', 'APPLE', 0.08);
insert into corp_discount values ('ACORP000001', 'MICROSOFT', 0.10);
insert into corp_discount values ('ACORP000002', 'GOOGLE', 0.12);
insert into corp_discount values ('ACORP000003', 'FACEBOOK', 0.15);
insert into corp_discount values ('ACORP000004', 'ORACLE', 0.18);
insert into corp_discount values ('ACORP000005', 'AMAZON', 0.19);
insert into corp_discount values ('ACORP000006', 'UBER', 0.20);
insert into corp_discount values ('ACORP000007', 'AUDI', 0.20);
insert into corp_discount values ('ACORP000008', 'ALIBABA', 0.25);
insert into corp_discount values ('ACORP000009', 'TECENT', 0.25);

-- CUSTOMER 20
insert into customer values (100000, 'LING', 'ZHANG', 'STREET_10', 'CITY_10', 'STATE_10','00010', 'ind_0@gmail.com', '1111111110', 'I');
insert into customer values (100001, 'YI', 'LI', 'STREET_11', 'CITY_11', 'STATE_11','00011', 'ind_1@gmail.com', '1111111111', 'I');
insert into customer values (100002, 'ER', 'WANG', 'STREET_12', 'CITY_12', 'STATE_12','00012', 'ind_2@gmail.com', '1111111112', 'I');
insert into customer values (100003, 'SAN', 'ZHU', 'STREET_13', 'CITY_13', 'STATE_13','00013', 'ind_3@gmail.com', '1111111113', 'I');
insert into customer values (100004, 'SI', 'ZHAO', 'STREET_14', 'CITY_14', 'STATE_14','00014', 'ind_4@gmail.com', '1111111114', 'I');
insert into customer values (100005, 'WU', 'QIAN', 'STREET_15', 'CITY_15', 'STATE_15','00015', 'ind_5@gmail.com', '1111111115', 'I');
insert into customer values (100006, 'LIU', 'SUN', 'STREET_16', 'CITY_16', 'STATE_16','00016', 'ind_6@gmail.com', '1111111116', 'I');
insert into customer values (100007, 'QI', 'ZHANG', 'STREET_17', 'CITY_17', 'STATE_17','00017', 'ind_7@gmail.com', '1111111117', 'I');
insert into customer values (100008, 'BA', 'ZHOU', 'STREET_18', 'CITY_18', 'STATE_18','00018', 'ind_8@gmail.com', '1111111118', 'I');
insert into customer values (100009, 'JIU', 'WU', 'STREET_19', 'CITY_19', 'STATE_19','00019', 'ind_9@gmail.com', '1111111119', 'I');

insert into customer values (200000, 'JIM', 'GREEN', 'STREET_20', 'CITY_20', 'STATE_20','00020', 'cop_0@gmail.com', '1111111120', 'C');
insert into customer values (200001, 'SAM', 'GATES', 'STREET_21', 'CITY_21', 'STATE_21','00021', 'cop_1@gmail.com', '1111111121', 'C');
insert into customer values (200002, 'LADY', 'GAGA', 'STREET_22', 'CITY_22', 'STATE_22','00022', 'cop_2@gmail.com', '1111111122', 'C');
insert into customer values (200003, 'TAYLOER', 'WATONS', 'STREET_23', 'CITY_23', 'STATE_23','00023', 'cop_3@gmail.com', '1111111123', 'C');
insert into customer values (200004, 'BILL', 'NAM', 'STREET_24', 'CITY_24', 'STATE_24','00024', 'cop_4@gmail.com', '1111111124', 'C');
insert into customer values (200005, 'BUFE', 'ANCE', 'STREET_25', 'CITY_25', 'STATE_25','00025', 'cop_5@gmail.com', '1111111125', 'C');
insert into customer values (200006, 'EMMA', 'SALLY', 'STREET_26', 'CITY_26', 'STATE_26','00026', 'cop_6@gmail.com', '1111111126', 'C');
insert into customer values (200007, 'TRACY','EMA', 'STREET_27', 'CITY_27', 'STATE_27','00027', 'cop_7@gmail.com', '1111111127', 'C');
insert into customer values (200008, 'YILI', 'TANY', 'STREET_28', 'CITY_28', 'STATE_28','00028', 'cop_8@gmail.com', '1111111128', 'C');
insert into customer values (200009, 'WANY', 'TERRY', 'STREET_29', 'CITY_29', 'STATE_29','00029', 'cop_9@gmail.com', '1111111129', 'C');

-- INDIVIDUAL 10
insert into individual values (100000, 'ABC0000000', 'INSUR COMP', 'INS0000000', 1000);
insert into individual values (100001, 'ABC0000001', 'INSUR COMP', 'INS0000001', NULL);
insert into individual values (100002, 'ABC0000002', 'INSUR COMP', 'INS0000002', 1002);
insert into individual values (100003, 'ABC0000003', 'INSUR COMP', 'INS0000003', NULL);
insert into individual values (100004, 'ABC0000004', 'INSUR COMP', 'INS0000004', 1005);
insert into individual values (100005, 'ABC0000005', 'INSUR COMP', 'INS0000005', 1005);
insert into individual values (100006, 'ABC0000006', 'INSUR COMP', 'INS0000006', 1006);
insert into individual values (100007, 'ABC0000007', 'INSUR COMP', 'INS0000007', 1008);
insert into individual values (100008, 'ABC0000008', 'INSUR COMP', 'INS0000008', 1009);
insert into individual values (100009, 'ABC0000009', 'INSUR COMP', 'INS0000009', 1009);

-- CORPORATE 10
insert into corporate values (200000, 'EP0000', 'ACORP000000');
insert into corporate values (200001, 'EP0001', 'ACORP000000');
insert into corporate values (200002, 'EP0002', 'ACORP000002');
insert into corporate values (200003, 'EP0003', 'ACORP000003');
insert into corporate values (200004, 'EP0004', 'ACORP000006');
insert into corporate values (200005, 'EP0005', 'ACORP000006');
insert into corporate values (200006, 'EP0006', 'ACORP000006');
insert into corporate values (200007, 'EP0007', 'ACORP000007');
insert into corporate values (200008, 'EP0008', 'ACORP000008');
insert into corporate values (200009, 'EP0009', 'ACORP000009');


-- CLASS 10
insert into class values (1, 'small car', 10, 1);
insert into class values (2, 'mid-size car', 20, 2);
insert into class values (3, 'luxury car', 30, 3);
insert into class values (4, 'SUV', 40, 4);
insert into class values (5, 'Premium SUV', 50, 5);
insert into class values (6, 'Mini Van', 60, 6);
insert into class values (7, 'mid-size Van', 70, 7);
insert into class values (8, 'luxury Van', 80, 8);
insert into class values (9, 'Station Wagon', 90, 9);
insert into class values (10, 'luxary Wagon', 100, 10);

-- LOCATION 10
insert into location values (1, 'Street 1', 'New York', 'NY', '11111', '12345678');
insert into location values (2, 'Street 2', 'New York', 'NY', '22222', '23456789');
insert into location values (3, 'Street 3', 'Buffalo', 'NY', '33333', '34567890');
insert into location values (4, 'Street 4', 'Buffalo', 'NY', '44444', '45678901');
insert into location values (5, 'Street 5', 'Pittsburgh', 'PA', '55555', '56789012');
insert into location values (6, 'Street 6', 'Pittsburgh', 'PA', '66666', '67890123');
insert into location values (7, 'Street 7', 'Philadelphia', 'PA', '77777', '78901234');
insert into location values (8, 'Street 8', 'Philadelphia', 'PA', '88888', '89012345');
insert into location values (9, 'Street 9', 'Boston', 'MA', '99999', '90123456');
insert into location values (10, 'Street 10', 'Boston', 'MA', '00000', '01234567');

-- VEHICLE 10
insert into vehicle values ('111111111AAAAAAAA', 'Benz', 'BenzSC', date'2000-1-1', '11111', 1, 1);
insert into vehicle values ('222222222AAAAAAAA', 'Benz', 'BenzMC', date'2000-1-1', '22222', 2, 1);
insert into vehicle values ('333333333AAAAAAAA', 'Benz', 'BenzSUV', date'2000-1-1', '33333', 4, 2);
insert into vehicle values ('444444444AAAAAAAA', 'BMW', 'BMWSC', date'2000-1-1', '44444', 1, 2);
insert into vehicle values ('555555555AAAAAAAA', 'BMW', 'BMWLC', date'2000-1-1', '55555', 3, 3);
insert into vehicle values ('111111111BBBBBBBB', 'BMW', 'BMWSUV', date'2005-1-1', '66666', 4, 3);
insert into vehicle values ('222222222BBBBBBBB', 'Audi', 'AudiSC', date'2005-1-1', '77777', 1, 4);
insert into vehicle values ('333333333BBBBBBBB', 'Audi', 'AudiPSUV', date'2005-1-1', '88888', 5, 4);
insert into vehicle values ('444444444BBBBBBBB', 'Audi', 'AudiSV', date'2005-1-1', '99999', 6, 5);
insert into vehicle values ('555555555BBBBBBBB', 'Audi', 'AudiSW', date'2005-1-1', '00000', 9, 5);

-- SERVICE 10
insert into services 
	values (1, date'2020-1-1', date'2020-1-3', 20, 90, 80, '111111111AAAAAAAA', 1, 2);
insert into services 
	values (2, date'2020-2-1', date'2020-2-3', 20, 90, 80, '111111111AAAAAAAA', 1, 3);
insert into services 
	values (3, date'2020-3-1', date'2020-3-3', 20, 100, 80, '222222222AAAAAAAA', 2, 3);
insert into services 
	values (4, date'2020-4-1', date'2020-4-3', 20, 100, 80, '222222222AAAAAAAA', 2, 4);
insert into services 
	values (5, date'2020-5-1', date'2020-5-3', 20, 100, 80, '333333333AAAAAAAA', 3, 4);
insert into services 
	values (6, date'2020-6-1', date'2020-6-3', 10, 90, 40, '333333333AAAAAAAA', 3, 5);
insert into services 
	values (7, date'2020-7-1', date'2020-7-3', 10, 90, 40, '111111111BBBBBBBB', 4, 5);
insert into services 
	values (8, date'2020-8-1', date'2020-8-3', 10, 100, 40, '111111111BBBBBBBB', 4, 6);
insert into services 
	values (9, date'2020-9-1', date'2020-9-3', 10, 100, 40, '222222222BBBBBBBB', 5, 6);
insert into services 
	values (10, date'2020-10-1', date'2020-10-3', 20, 80, NULL, '222222222BBBBBBBB', 5, 7);
    
-- INVOICE 10
insert into invoice values (100000, date'2018-1-7', 1253.5, 100001, 1);
insert into invoice values (100001, date'2018-8-16', 1953.15, 100002, 2);
insert into invoice values (100002, date'2019-2-6', 853.27, 100002, 3);
insert into invoice values (100003, date'2019-3-1', 1253.5, 100003, 4);
insert into invoice values (100004, date'2019-5-18', 1253.5, 100005, 5);
insert into invoice values (100005, date'2019-8-1', 953.75, 200003, 6);
insert into invoice values (100006, date'2020-1-31', 716.18, 200006, 7);
insert into invoice values (100007, date'2020-5-6', 125.5, 200007, 8);
insert into invoice values (100008, date'2020-6-21', 16253.73, 200008, 9);
insert into invoice values (100009, date'2020-7-17', 253.5, 200009, 10);

-- PAYMENT 10
insert into payment values (1, date'2020-1-15', 'D', '654321', 100000);
insert into payment values (2, date'2020-2-15', 'D', '654321', 100001);
insert into payment values (3, date'2020-3-15', 'D', '765432', 100002);
insert into payment values (4, date'2020-4-15', 'D', '765432', 100003);
insert into payment values (5, date'2020-5-15', 'C', '876543', 100004);
insert into payment values (6, date'2020-6-15', 'C', '876543', 100005);
insert into payment values (7, date'2020-7-15', 'C', '987654', 100006);
insert into payment values (8, date'2020-8-15', 'C', '987654', 100007);
insert into payment values (9, date'2020-9-15', 'G', '098765', 100008);
insert into payment values (10, date'2020-10-15', 'G', '098765', 100008);
