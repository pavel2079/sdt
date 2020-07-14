#
# Table structure for table 'tx_transfermietwagen_domain_model_buchung'
#
CREATE TABLE tx_transfermietwagen_domain_model_buchung (

	id_user int(11) DEFAULT '0' NOT NULL,
	id_fahrer int(11) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	name_kunde varchar(255) DEFAULT '' NOT NULL,
	telefon varchar(255) DEFAULT '' NOT NULL,
	tel_kunde varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	email_kunde varchar(255) DEFAULT '' NOT NULL,
	adresse varchar(255) DEFAULT '' NOT NULL,
	staat varchar(255) DEFAULT '' NOT NULL,
	stadt varchar(255) DEFAULT '' NOT NULL,
	plz varchar(255) DEFAULT '' NOT NULL,
	zeit_control int(11) DEFAULT '0' NOT NULL,
	start varchar(255) DEFAULT '' NOT NULL,
	end varchar(255) DEFAULT '' NOT NULL,
	start_mkt int(11) DEFAULT '0' NOT NULL,
	start_zuruck varchar(255) DEFAULT '' NOT NULL,
	end_zuruck varchar(255) DEFAULT '' NOT NULL,
	start_zuruck_mkt int(11) DEFAULT '0' NOT NULL,
	ab int(11) DEFAULT '0' NOT NULL,
	abzuruck int(11) DEFAULT '0' NOT NULL,
	bis int(11) DEFAULT '0' NOT NULL,
	biszuruck int(11) DEFAULT '0' NOT NULL,
	von varchar(255) DEFAULT '' NOT NULL,
	von_adress varchar(255) DEFAULT '' NOT NULL,
	von_adress_zuruck varchar(255) DEFAULT '' NOT NULL,
	nach varchar(255) DEFAULT '' NOT NULL,
	nach_adress varchar(255) DEFAULT '' NOT NULL,
	nach_adress_zuruck varchar(255) DEFAULT '' NOT NULL,
	aid int(11) DEFAULT '0' NOT NULL,
	distance int(11) DEFAULT '0' NOT NULL,
	distance_erw int(11) DEFAULT '0' NOT NULL,
	art int(11) DEFAULT '0' NOT NULL,
	z_art varchar(255) DEFAULT '' NOT NULL,
	back int(11) DEFAULT '0' NOT NULL,
	person int(11) DEFAULT '0' NOT NULL,
	koffer int(11) DEFAULT '0' NOT NULL,
	rent_time int(11) DEFAULT '0' NOT NULL,
	kindersitz int(11) DEFAULT '0' NOT NULL,
	von_flug int(11) DEFAULT '0' NOT NULL,
	zur_flug int(11) DEFAULT '0' NOT NULL,
	flug_nr varchar(255) DEFAULT '' NOT NULL,
	flug_zeit int(11) DEFAULT '0' NOT NULL,
	flug_nr_zuruck varchar(255) DEFAULT '' NOT NULL,
	flug_zeit_zuruck int(11) DEFAULT '0' NOT NULL,
	grundpreis double(11,2) DEFAULT '0.00' NOT NULL,
	summa double(11,2) DEFAULT '0.00' NOT NULL,
	provision double(11,2) DEFAULT '0.00' NOT NULL,
	mwst int(11) DEFAULT '0' NOT NULL,
	bezahlt double(11,2) DEFAULT '0.00' NOT NULL,
	vorkasse int(11) DEFAULT '0' NOT NULL,
	schild varchar(255) DEFAULT '' NOT NULL,
	status int(11) DEFAULT '0' NOT NULL,
	kommentar text,
	agent int(11) DEFAULT '0' NOT NULL,
	auto int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tx_transfermietwagen_domain_model_stadt'
#
CREATE TABLE tx_transfermietwagen_domain_model_stadt (

	plz varchar(255) DEFAULT '' NOT NULL,
	name_stadt varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'tx_transfermietwagen_domain_model_auto'
#
CREATE TABLE tx_transfermietwagen_domain_model_auto (

	adm_name varchar(255) DEFAULT '' NOT NULL,
	kurz_name varchar(255) DEFAULT '' NOT NULL,
	klass varchar(255) DEFAULT '' NOT NULL,
	tab varchar(255) DEFAULT '' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	max_person int(11) DEFAULT '0' NOT NULL,
	max_koffer int(11) DEFAULT '0' NOT NULL,
	preis int(11) DEFAULT '0' NOT NULL,
	koef20b40 double(11,2) DEFAULT '0.00' NOT NULL,
	koef40b50 double(11,2) DEFAULT '0.00' NOT NULL,
	koef50b70 double(11,2) DEFAULT '0.00' NOT NULL,
	koef70b100 double(11,2) DEFAULT '0.00' NOT NULL,
	koef100 double(11,2) DEFAULT '0.00' NOT NULL,
	beschreibung text,
	beschreibung_ru text,
	beschreibung_en text,
	prov_pausch int(11) DEFAULT '0' NOT NULL,
	prov_proz int(11) DEFAULT '0' NOT NULL,
	img varchar(255) DEFAULT '' NOT NULL,
	img_big varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_transfermietwagen_domain_model_flughafen'
#
CREATE TABLE tx_transfermietwagen_domain_model_flughafen (

	name_aus varchar(255) DEFAULT '' NOT NULL,
	name_aus_ru varchar(255) DEFAULT '' NOT NULL,
	nm varchar(255) DEFAULT '' NOT NULL,
	airport int(11) DEFAULT '0' NOT NULL,

);
