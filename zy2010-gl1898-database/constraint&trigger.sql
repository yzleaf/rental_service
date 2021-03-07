CREATE TABLE user_password (
    u_id     BIGINT NOT NULL,
    username   VARCHAR(30) NOT NULL,    
    password    VARCHAR(50) NOT NULL, -- length 50
    u_type   VARCHAR(30) NOT NULL
);

ALTER TABLE user_password ADD CONSTRAINT class_pk PRIMARY KEY ( u_id );
ALTER TABLE user_password MODIFY u_id BIGINT AUTO_INCREMENT; -- Set u_id increase



ALTER TABLE invoice ADD column status VARCHAR(30) NOT NULL;

ALTER TABLE invoice ADD column real_amount decimal(10,2) NOT NULL;
ALTER TABLE invoice ADD column remain_amount decimal(10,2) NOT NULL;

ALTER TABLE payment ADD column pay_amount decimal(10,2) NOT NULL;

ALTER TABLE indi_coupon DROP CONSTRAINT check_INDI_DIS;
ALTER TABLE corp_discount DROP CONSTRAINT check_CORP_DIS;
ALTER TABLE indi_coupon ADD CONSTRAINT check_INDI_DIS CHECK ((indi_dis >= 0) AND (indi_dis <= 1));
ALTER TABLE corp_discount ADD CONSTRAINT check_CORP_DIS CHECK ((corp_dis >= 0) AND (corp_dis <= 1));



INSERT INTO payment VALUES(unix_timestamp(now()),now(),'G',111,1,100)

-- ALTER TABLE class DROP CONSTRAINT check_CLASS_ID
-- ALTER TABLE class MODIFY class_id BIGINT AUTO_INCREMENT; -- !!!!!!每个表都要!!!



--- sample
INSERT INTO user_password(username, password, u_type) VALUES('admin@wow.com','21232F297A57A5A743894A0E4A801FC3','ADMIN');

-- 21232F297A57A5A743894A0E4A801FC3 -- admin (MD5)
 


-- TRIGGER
DELIMITER $$
CREATE TRIGGER update_amount_b
AFTER UPDATE ON services FOR EACH ROW
BEGIN
	DECLARE rental_rate_ decimal(10,2);
    DECLARE over_fee_ decimal(10,2);
    DECLARE over_odometer_ decimal(10,2);
    
    SELECT c.rental_rate, c.over_fee, 
          (new.end_odometer-new.start_odometer)-new.d_limit*ROUND((UNIX_TIMESTAMP(new.drop_date)-UNIX_TIMESTAMP(new.pick_date))/(60*60*24)) into rental_rate_, over_fee_, over_odometer_
    FROM services a JOIN vehicle b ON new.vin=b.vin JOIN class c ON b.class_id=c.class_id
    WHERE a.service_id=new.service_id;
    
    IF over_odometer_ <= 0 THEN SET over_odometer_=0;
    END IF;
           
    IF old.drop_date<>new.drop_date OR old.end_odometer<>new.end_odometer THEN
        UPDATE invoice
        SET invoice_amount=rental_rate_*ROUND((UNIX_TIMESTAMP(new.drop_date)-UNIX_TIMESTAMP(new.pick_date))/(60*60*24)) + over_odometer_*over_fee_
        WHERE service_id=new.service_id;
    END IF;
    
END$$
DELIMITER ;
