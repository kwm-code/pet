#
# Table structure for table 'tx_pet_domain_model_pet'
#
CREATE TABLE tx_pet_domain_model_pet (

	name varchar(255) DEFAULT '' NOT NULL,
	teaser text,
	description text,
	media int(11) unsigned DEFAULT '0' NOT NULL,
	weight double(11,2) DEFAULT '0.00' NOT NULL,
	cuteness int(11) DEFAULT '0' NOT NULL,
	easy_to_handle smallint(5) unsigned DEFAULT '0' NOT NULL,
	pet_type int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tx_pet_domain_model_pettype'
#
CREATE TABLE tx_pet_domain_model_pettype (
	name varchar(255) DEFAULT '' NOT NULL,
	description text,
);
