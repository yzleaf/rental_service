-- SQLINES DEMO *** QL Developer Data Modeler 20.2.0.167.1538
-- SQLINES DEMO *** 2020-12-02 18:17:49 EST
-- SQLINES DEMO *** acle Database 12cR2
-- SQLINES DEMO *** acle Database 12cR2



-- SQLINES DEMO *** no DDL - MDSYS.SDO_GEOMETRY

-- SQLINES DEMO *** no DDL - XMLTYPE

CREATE TABLE class (
    class_id     BIGINT NOT NULL COMMENT 'the ID of a vehicle class',
    class_name   VARCHAR(30) NOT NULL COMMENT 'the name of a vehicle class',
    rental_rate  DECIMAL(10, 2) NOT NULL COMMENT 'the rantal rate of a vehicle class',
    over_fee     DECIMAL(10, 2) NOT NULL COMMENT 'the over mailage fee of a vehicle class'
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN class.class_id IS
    'the ID of a vehicle class'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN class.class_name IS
    'the name of a vehicle class'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN class.rental_rate IS
    'the rantal rate of a vehicle class'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN class.over_fee IS
    'the over mailage fee of a vehicle class'; */

ALTER TABLE class ADD CONSTRAINT class_pk PRIMARY KEY ( class_id );

CREATE TABLE corp_discount (
    corp_reg_no  VARCHAR(30) NOT NULL COMMENT 'the register no of a corporation',
    corp_name    VARCHAR(30) NOT NULL COMMENT 'the name of a corporation',
    corp_dis     DECIMAL(3, 2) NOT NULL COMMENT 'the corporation coupon discount'
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN corp_discount.corp_reg_no IS
    'the register no of a corporation'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN corp_discount.corp_name IS
    'the name of a corporation'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN corp_discount.corp_dis IS
    'the corporation coupon discount'; */

ALTER TABLE corp_discount ADD CONSTRAINT corp_discount_pk PRIMARY KEY ( corp_reg_no );

CREATE TABLE corporate (
    cust_id      BIGINT NOT NULL COMMENT 'the unique ID of a customer',
    emp_id       VARCHAR(30) NOT NULL COMMENT 'the Employee ID of the customer who rents the car on a corporate account',
    corp_reg_no  VARCHAR(30) NOT NULL
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN corporate.cust_id IS
    'the unique ID of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN corporate.emp_id IS
    'the Employee ID of the customer who rents the car on a corporate account'; */

ALTER TABLE corporate ADD CONSTRAINT corporate_pk PRIMARY KEY ( cust_id );

CREATE TABLE customer (
    cust_id        BIGINT NOT NULL COMMENT 'the unique ID of a customer',
    fname          VARCHAR(30) NOT NULL COMMENT 'first name of customer',
    lname          VARCHAR(30) NOT NULL COMMENT 'last name of customer',
    cust_street    VARCHAR(30) NOT NULL COMMENT 'the street of a customer',
    cust_city      VARCHAR(30) NOT NULL COMMENT 'the city of a customer',
    cust_state     VARCHAR(30) NOT NULL COMMENT 'the state of a customer',
    cust_zipcode   VARCHAR(5) NOT NULL COMMENT 'the zipcode of a customer',
    email          VARCHAR(30) NOT NULL COMMENT 'the email of a customer',
    cust_phone_no  VARCHAR(30) NOT NULL COMMENT 'the phone number of a customer',
    cust_type      CHAR(1) NOT NULL COMMENT 'the customer type'
);

ALTER TABLE customer
    ADD CONSTRAINT ch_inh_customer CHECK ( cust_type IN ( 'C', 'I' ) );

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.cust_id IS
    'the unique ID of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.fname IS
    'first name of customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.lname IS
    'last name of customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.cust_street IS
    'the street of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.cust_city IS
    'the city of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.cust_state IS
    'the state of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.cust_zipcode IS
    'the zipcode of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.email IS
    'the email of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.cust_phone_no IS
    'the phone number of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN customer.cust_type IS
    'the customer type'; */

ALTER TABLE customer ADD CONSTRAINT customer_pk PRIMARY KEY ( cust_id );

CREATE TABLE indi_coupon (
    coupon_id   BIGINT NOT NULL COMMENT 'the unique ID of a kind of coupons',
    indi_dis    DECIMAL(3, 2) NOT NULL COMMENT 'the discount of an individual',
    start_date  DATETIME NOT NULL COMMENT 'the start date of a individual coupon',
    end_date    DATETIME NOT NULL COMMENT 'the end date of a individual coupon'
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN indi_coupon.coupon_id IS
    'the unique ID of a kind of coupons'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN indi_coupon.indi_dis IS
    'the discount of an individual'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN indi_coupon.start_date IS
    'the start date of a individual coupon'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN indi_coupon.end_date IS
    'the end date of a individual coupon'; */

ALTER TABLE indi_coupon ADD CONSTRAINT indi_coupon_pk PRIMARY KEY ( coupon_id );

CREATE TABLE individual (
    cust_id         BIGINT NOT NULL COMMENT 'the unique ID of a customer',
    driver_lno      VARCHAR(30) NOT NULL COMMENT 'the driver license number of an individual',
    insur_cop_name  VARCHAR(30) NOT NULL COMMENT 'the insurance company  name of an individual',
    insur_pol_no    VARCHAR(30) NOT NULL COMMENT 'the insurance policy number of an individual',
    coupon_id       BIGINT
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN individual.cust_id IS
    'the unique ID of a customer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN individual.driver_lno IS
    'the driver license number of an individual'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN individual.insur_cop_name IS
    'the insurance company  name of an individual'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN individual.insur_pol_no IS
    'the insurance policy number of an individual'; */

ALTER TABLE individual ADD CONSTRAINT individual_pk PRIMARY KEY ( cust_id );

CREATE TABLE invoice (
    invoice_id      BIGINT NOT NULL COMMENT 'the invoice ID',
    invoice_date    DATETIME NOT NULL COMMENT 'the invoice date',
    invoice_amount  DECIMAL(10, 2) NOT NULL COMMENT 'the invoice amount',
    cust_id         BIGINT NOT NULL,
    service_id      BIGINT NOT NULL
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN invoice.invoice_id IS
    'the invoice ID'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN invoice.invoice_date IS
    'the invoice date'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN invoice.invoice_amount IS
    'the invoice amount'; */

CREATE UNIQUE INDEX invoice__idx ON
    invoice (
        service_id
    ASC );

ALTER TABLE invoice ADD CONSTRAINT invoice_pk PRIMARY KEY ( invoice_id );

CREATE TABLE location (
    location_id   BIGINT NOT NULL COMMENT 'the unique ID of a location',
    loc_street    VARCHAR(30) NOT NULL COMMENT 'the street of a location',
    loc_city      VARCHAR(30) NOT NULL COMMENT 'the city of a location',
    loc_state     VARCHAR(30) NOT NULL COMMENT 'the state of a location',
    loc_zipcode   VARCHAR(5) NOT NULL COMMENT 'the zipcode of a location',
    loc_phone_no  VARCHAR(30) NOT NULL COMMENT 'the phone number of a location'
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN location.location_id IS
    'the unique ID of a location'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN location.loc_street IS
    'the street of a location'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN location.loc_city IS
    'the city of a location'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN location.loc_state IS
    'the state of a location'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN location.loc_zipcode IS
    'the zipcode of a location'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN location.loc_phone_no IS
    'the phone number of a location'; */

ALTER TABLE location ADD CONSTRAINT location_pk PRIMARY KEY ( location_id );

CREATE TABLE payment (
    pay_id       BIGINT NOT NULL COMMENT 'the payment ID',
    pay_date     DATETIME NOT NULL COMMENT 'the payment date',
    pay_method   CHAR(1) NOT NULL COMMENT 'the payment method',
    pay_card_no  VARCHAR(30) NOT NULL COMMENT 'the card number for a payment',
    invoice_id   BIGINT NOT NULL
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN payment.pay_id IS
    'the payment ID'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN payment.pay_date IS
    'the payment date'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN payment.pay_method IS
    'the payment method'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN payment.pay_card_no IS
    'the card number for a payment'; */

ALTER TABLE payment ADD CONSTRAINT payment_pk PRIMARY KEY ( pay_id );

CREATE TABLE services (
    service_id        BIGINT NOT NULL COMMENT 'the service ID',
    pick_date         DATETIME NOT NULL COMMENT 'the pick up date',
    drop_date         DATETIME NOT NULL COMMENT 'the drop off date',
    start_odometer    DECIMAL(10, 2) NOT NULL COMMENT 'the start odometer',
    end_odometer      DECIMAL(10, 2) NOT NULL COMMENT 'the end odometer',
    d_limit           DECIMAL(10, 2) COMMENT 'the Daily Odometer Limit for the rental service (optional)',
    vin               VARCHAR(17) NOT NULL,
    pick_location_id  BIGINT NOT NULL,
    drop_location_id  BIGINT NOT NULL
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN services.service_id IS
    'the service ID'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN services.pick_date IS
    'the pick up date'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN services.drop_date IS
    'the drop off date'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN services.start_odometer IS
    'the start odometer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN services.end_odometer IS
    'the end odometer'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN services.d_limit IS
    'the Daily Odometer Limit for the rental service (optional)'; */

ALTER TABLE services ADD CONSTRAINT services_pk PRIMARY KEY ( service_id );

CREATE TABLE vehicle (
    vin          VARCHAR(17) NOT NULL COMMENT 'the VIN of a vehicle',
    make         VARCHAR(30) NOT NULL COMMENT 'he make of a vehicle',
    model        VARCHAR(30) NOT NULL COMMENT 'the model of a vehicle',
    year         DATETIME NOT NULL COMMENT 'the produce date of a vehicle',
    lpn          VARCHAR(10) NOT NULL COMMENT 'the License Plate number of a vehicle',
    class_id     BIGINT NOT NULL,
    location_id  BIGINT NOT NULL
);

/* Moved to CREATE TABLE
COMMENT ON COLUMN vehicle.vin IS
    'the VIN of a vehicle'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN vehicle.make IS
    'he make of a vehicle'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN vehicle.model IS
    'the model of a vehicle'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN vehicle.year IS
    'the produce date of a vehicle'; */

/* Moved to CREATE TABLE
COMMENT ON COLUMN vehicle.lpn IS
    'the License Plate number of a vehicle'; */

ALTER TABLE vehicle ADD CONSTRAINT vehicle_pk PRIMARY KEY ( vin );

ALTER TABLE corporate
    ADD CONSTRAINT corporate_corp_discount_fk FOREIGN KEY ( corp_reg_no )
        REFERENCES corp_discount ( corp_reg_no );

ALTER TABLE corporate
    ADD CONSTRAINT corporate_customer_fk FOREIGN KEY ( cust_id )
        REFERENCES customer ( cust_id );

ALTER TABLE individual
    ADD CONSTRAINT individual_customer_fk FOREIGN KEY ( cust_id )
        REFERENCES customer ( cust_id );

ALTER TABLE individual
    ADD CONSTRAINT individual_indi_coupon_fk FOREIGN KEY ( coupon_id )
        REFERENCES indi_coupon ( coupon_id );

ALTER TABLE invoice
    ADD CONSTRAINT invoice_customer_fk FOREIGN KEY ( cust_id )
        REFERENCES customer ( cust_id );

ALTER TABLE invoice
    ADD CONSTRAINT invoice_services_fk FOREIGN KEY ( service_id )
        REFERENCES services ( service_id );

ALTER TABLE payment
    ADD CONSTRAINT payment_invoice_fk FOREIGN KEY ( invoice_id )
        REFERENCES invoice ( invoice_id );

ALTER TABLE services
    ADD CONSTRAINT services_location_fk FOREIGN KEY ( pick_location_id )
        REFERENCES location ( location_id );

ALTER TABLE services
    ADD CONSTRAINT services_location_fkv2 FOREIGN KEY ( drop_location_id )
        REFERENCES location ( location_id );

ALTER TABLE services
    ADD CONSTRAINT services_vehicle_fk FOREIGN KEY ( vin )
        REFERENCES vehicle ( vin );

ALTER TABLE vehicle
    ADD CONSTRAINT vehicle_class_fk FOREIGN KEY ( class_id )
        REFERENCES class ( class_id );

ALTER TABLE vehicle
    ADD CONSTRAINT vehicle_location_fk FOREIGN KEY ( location_id )
        REFERENCES location ( location_id );

ALTER TABLE customer ADD CONSTRAINT check_CUSTOMER_ID CHECK (cust_id > 0);
ALTER TABLE invoice ADD CONSTRAINT check_INVOICE_ID CHECK (invoice_id > 0);
ALTER TABLE payment ADD CONSTRAINT check_PAY_ID CHECK (pay_id > 0);
ALTER TABLE location ADD CONSTRAINT check_LOCATION_ID CHECK (location_id > 0);
ALTER TABLE services ADD CONSTRAINT check_SERVICE_ID CHECK (service_id > 0);
ALTER TABLE class ADD CONSTRAINT check_CLASS_ID CHECK (class_id > 0);
ALTER TABLE indi_coupon ADD CONSTRAINT check_COUPON_ID CHECK (coupon_id > 0);
ALTER TABLE services ADD CONSTRAINT check_START_ODO CHECK (start_odometer > 0);
ALTER TABLE services ADD CONSTRAINT check_END_ODO CHECK (end_odometer > 0);
ALTER TABLE services ADD CONSTRAINT check_START_END CHECK (end_odometer > start_odometer);
ALTER TABLE services ADD CONSTRAINT check_LIMIT CHECK ((d_limit > 0) OR (d_limit IS NULL));
ALTER TABLE class ADD CONSTRAINT check_RATE CHECK (rental_rate > 0);
ALTER TABLE class ADD CONSTRAINT check_FEE CHECK (over_fee > 0);
ALTER TABLE indi_coupon ADD CONSTRAINT check_INDI_DIS CHECK ((indi_dis > 0) AND (indi_dis < 1));
ALTER TABLE corp_discount ADD CONSTRAINT check_CORP_DIS CHECK ((corp_dis >= 0) AND (corp_dis < 1));
ALTER TABLE customer ADD CONSTRAINT C_CUST_TYPE CHECK((cust_type = 'I') or (cust_type = 'C'));
ALTER TABLE payment ADD CONSTRAINT C_PAY_METHOD CHECK((pay_method = 'D') or (pay_method = 'C') or (pay_method = 'G'));



-- SQLINES DEMO *** per Data Modeler 概要报告: 
-- 
-- SQLINES DEMO ***                        11
-- SQLINES DEMO ***                         1
-- SQLINES DEMO ***                        24
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO *** DY                      0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         2
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***  TYPE                   0
-- SQLINES DEMO ***  TYPE                   0
-- SQLINES DEMO ***  TYPE BODY              0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO *** EGMENT                  0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO *** ED VIEW                 0
-- SQLINES DEMO *** ED VIEW LOG             0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- 
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
-- 
-- SQLINES DEMO ***                         0
-- 
-- SQLINES DEMO ***                         0
-- SQLINES DEMO *** A                       0
-- SQLINES DEMO *** T                       0
-- 
-- SQLINES DEMO ***                         0
-- SQLINES DEMO ***                         0
