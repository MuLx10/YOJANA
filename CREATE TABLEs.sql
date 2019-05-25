create table location
(
  location_id int not null,
  state varchar(50) not null,
  city varchar(50) not null,
  primary key (location_id)
);

create table schemes
(
  scheme_name varchar(50) not null,
  isactive int not null,
  beneficiary_gender varchar(50),
  beneficiary_age_lower int not null,
  beneficiary_age_higher int not null,
  beneficiary_income_lower int not null,
  beneficiary_income_higher int not null,
  sponsoredby varchar(50) not null,
  primary key (scheme_name)
);

create table resources
(
  resource_name varchar(50) not null,
  scheme_name varchar(50) not null,
  state varchar(50) not null,
  city varchar(50) not null,
  used_quantity int not null,
  total_quantity int not null,
  primary key (resource_name, scheme_name, state, city)
);

create table scheme_manager
(
  manager_aadhar int not null,
  scheme_name varchar(50),
  state varchar(50) not null,
  city varchar(50) not null,
  primary key (manager_aadhar)
);

create table scheme_initiator
(
  initiator_aadhar int not null,
  scheme_name varchar(50) not null,
  primary key (initiator_aadhar)
);

create table analysis
(
  scheme_name varchar(50) not null,
  percent_reach int not null,
  expected_percent_reach int not null,
  resources_consumed int not null,
  description varchar(250) not null,
  primary key (scheme_name),
);

create table resident
(
aadhar int not null,
name varchar(50) not null,
gender varchar(50) not null,
dob date,
family_income int not null,
state varchar(50) not null,
city varchar(50) not null,
phone_number int,
password varchar(50) not null,
primary key (aadhar)
);

-- create table children
-- (
--   child_aadhar int not null,
--   name varchar(50) not null,
--   date_of_birth date not null,
--   parent1_aadhar int not null,
--   parent2_aadhar int not null,
--   primary key (child_aadhar),
--   foreign key (parent1_aadhar) references resident(resident_aadhar),
--   foreign key (parent2_aadhar) references resident(resident_aadhar)
-- );

create table handles
(
  quantity_provided int not null,
  resident_aadhar int not null,
  resource_name varchar(50) not null,
  scheme_name varchar(50) not null,
  primary key (resource_name, scheme_name, resident_aadhar)
);

create table phone_number
(
  phone_number int not null,
  resident_aadhar int not null,
);
