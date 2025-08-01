<?php

class mf_theme_child
{
	var $post_type = 'mf_campaign';
	var $meta_prefix;
	var $post_type_shop_order = 'shop_order';
	var $post_type_instructor = 'instructor';
	var $taxonomy_name = 'class';
	var $arr_classes;
	var $insert_count = 0;
	var $update_count = 0;
	var $delete_count = 0;
	var $ignore_count = 0;
	var $arr_terms_id = array();
	var $order_has_shipping;
	var $woocommerce_custom_orders_table_enabled = '';

	function __construct()
	{
		$this->meta_prefix = $this->post_type."_";

		$this->arr_classes = array(
			array(
				'area' => "Kvalitet och milj�", //"Kvalitet, milj� och �vrigt"
				'services' => array(
					array('id' => array(43801), 'name' => "Milj�anpassade fordon", 'description' => "Erbjuder utbildning i fordon med milj�anpassade drivmedel"),
					//array('id' => array(43701), 'name' => "Vi m�ter kundn�jdhet, NKI", 'description' => ""),
					array('id' => array(10901), 'name' => "FR2000", 'description' => "Trafikutbildare som genomg�tt kvalitets- och milj�ledningssystemet FR2000"),
					array('id' => array(44901), 'name' => "Erbjuder e-handel", 'description' => "Skolor som erbjuder e-handel"),
				),
			),
			array(
				'area' => "Personbil",
				'services' => array(
					array('id' => array(11701), 'name' => "B - personbil", 'description' => "F�rarutbildning f�r personbil"),
					array('id' => array(34401), 'name' => "B - personbil ut�kad", 'description' => "F�rarutbildning med ut�kad beh�righet f�r personbil och sl�p (max 4,25 ton)"),
					array('id' => array(11801), 'name' => "BE - tungt sl�p", 'description' => "F�rarutbildning f�r personbil med tungt sl�p"),
					array('id' => array(10001), 'name' => "Introduktionsutbildning", 'description' => "Utbildning f�r handledare och elever som ska �vningsk�ra privat med personbil (minst 3 tim)"),
					array('id' => array(14901), 'name' => "Riskutbildning del 1B", 'description' => "Riskutbildning 1B som handlar om alkohol, tr�tthet, riskfyllda beteenden mm (minst 3 tim)"),
					array('id' => array(30501), 'name' => "Riskutbildning del 2B", 'description' => "Riskutbildning 2B p� trafik�vningsplats (halkbana) som handlar om hastighet, s�kerhet och k�rning under s�rskilda f�rh�llanden (minst 3 tim)"),
					//array('id' => array(31501), 'name' => "Synpr�vning", 'description' => "Syntest (synscreening) som beh�vs f�r k�rkortstillst�nd"),
					//array('id' => array(33301), 'name' => "Videoutrustning", 'description' => "M�jlighet att videofilma k�rlektionen som en del av f�rarutbildningen"),
					array('id' => array(12601), 'name' => "K�rbed�mning", 'description' => "K�rbed�mning i samarbete med sjukhusen f�r personer med f�rs�mrad k�rf�rm�ga"),
					//array('id' => array(14601), 'name' => "Automatv�xlat fordon", 'description' => "F�rarutbildning f�r automatv�xlat fordon"),
					array('id' => array(30701), 'name' => "Fordonsanpassning", 'description' => "F�rarutbildning f�r personer med r�relsehinder som beh�ver anpassat fordon"),
					//array('id' => array(14701), 'name' => "Handreglage", 'description' => "F�rarutbildning f�r personer med r�relsehinder som beh�ver anpassat fordon"),
					//array('id' => array(42001), 'name' => "CSN K�rkortsl�n", 'description' => "F�rarutbildning med CSN-avtal"),
					array('id' => array(42101), 'name' => "Spr�k - Engelska", 'description' => "F�rarutbildning med engelsktalande utbildare"),
					array('id' => array(42201), 'name' => "Spr�k - Arabiska", 'description' => "F�rarutbildning med arabisktalande utbildare"),
					array('id' => array(42301), 'name' => "Spr�k - Persiska", 'description' => "F�rarutbildning med persisktalande utbildare"),
					array('id' => array(42701), 'name' => "Spr�k - Somaliska", 'description' => "F�rarutbildning med somalisktalande utbildare"),
					//array('id' => array(32601), 'name' => "Teorist�d - extra", 'description' => ""),
					//array('id' => array(31901), 'name' => "Teorist�d - l�s och skriv", 'description' => ""),
					//array('id' => array(45301), 'name' => "Extra st�d", 'description' => "F�r elever med t.ex. NPF och/eller l�s- och skrivsv�righeter"),
					//array('id' => array(46001), 'name' => "Ans�ker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare f�r att ans�ka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Motorcykel",
				'services' => array(
					array('id' => array(38801), 'name' => "A - l�g motorcykel", 'description' => "Motorcykel vars h�jd l�mpar sig f�r korta personer"),
					array('id' => array(35001), 'name' => "A - motorcykel klass A", 'description' => "MC-utbildning med tung motorcykel"),
					array('id' => array(38901), 'name' => "A1 - l�g motorcykel", 'description' => "Motorcykel vars h�jd l�mpar sig f�r korta personer"),
					array('id' => array(34801), 'name' => "A1 - motorcykel klass 1", 'description' => "MC-utbildning med l�tt motorcykel"),
					array('id' => array(39001), 'name' => "A2 - l�g motorcykel", 'description' => "Motorcykel vars h�jd l�mpar sig f�r korta personer"),
					array('id' => array(34901), 'name' => "A2 - motorcykel klass 2", 'description' => "MC-utbildning med mellantung motorcykel"),
					array('id' => array(15101), 'name' => "Riskutbildning del 1A", 'description' => "Riskutbildning 1A som handlar om alkohol, tr�tthet, riskfyllda faktorer och beteenden mm (minst 3 tim)"),
					array('id' => array(15201), 'name' => "Riskutbildning del 2A", 'description' => "Riskutbildning 2A som handlar om hastighet, s�kerhet och k�rning under s�rskilda f�rh�llanden (minst 4 tim)"),
					//array('id' => array(31601), 'name' => "Synpr�vning", 'description' => "Syntest (synscreening) som beh�vs f�r k�rkortstillst�nd"),
					//array('id' => array(33401), 'name' => "Videoutrustning", 'description' => "M�jlighet att videofilma k�rlektionen som en del av f�rarutbildningen"),
					//array('id' => array(32701), 'name' => "Teorist�d - extra", 'description' => ""),
					//array('id' => array(32001), 'name' => "Teorist�d - l�s och skriv", 'description' => ""),
					//array('id' => array(45401), 'name' => "Extra st�d", 'description' => "F�r elever med t.ex. NPF och/eller l�s- och skrivsv�righeter"),
					//array('id' => array(46101), 'name' => "Ans�ker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare f�r att ans�ka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Moped",
				'services' => array(
					array('id' => array(11301), 'name' => "AM - moped klass 1", 'description' => "Utbildning f�r AM - moped klass 1 (minst 12 timmar)"),
					array('id' => array(15001), 'name' => "Moped klass 2", 'description' => "Utbildning f�r f�rarbevis f�r moped klass 2 (minst 10 timmar)"),
					//array('id' => array(31701), 'name' => "Synpr�vning", 'description' => "Syntest (synscreening) som beh�vs f�r k�rkortstillst�nd"),
					//array('id' => array(32801), 'name' => "Teorist�d - extra", 'description' => ""),
					//array('id' => array(32101), 'name' => "Teorist�d - l�s och skriv", 'description' => ""),
					//array('id' => array(33501), 'name' => "Videoutrustning", 'description' => "M�jlighet att videofilma k�rlektionen som en del av f�rarutbildningen"),
					//array('id' => array(45501), 'name' => "Extra st�d", 'description' => "F�r elever med t.ex. NPF och/eller l�s- och skrivsv�righeter"),
					//array('id' => array(46201), 'name' => "Ans�ker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare f�r att ans�ka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Lastbil",
				'services' => array(
					array('id' => array(11901), 'name' => "C - tung lastbil", 'description' => "F�rarutbildning f�r tung lastbil �ver 3,5 ton"),
					array('id' => array(12001, 12101), 'name' => "CE - tung lastbil med sl�p", 'description' => "F�rarutbildning f�r tung lastbil med tungt sl�p"),
					//array('id' => array(12101), 'name' => "CE - tung lastbil p�h�ngsvagn", 'description' => "F�rarutbildning f�r tung lastbil med tungt sl�p (trailer)"),
					//array('id' => array(32901), 'name' => "Teorist�d - extra", 'description' => ""),
					//array('id' => array(32201), 'name' => "Teorist�d - l�s och skriv", 'description' => ""),
					array('id' => array(33601), 'name' => "Videoutrustning", 'description' => "M�jlighet att videofilma k�rlektionen som en del av f�rarutbildningen"),
					array('id' => array(34601), 'name' => "C1 - tung lastbil (7,5 ton)", 'description' => "7,5 ton"),
					array('id' => array(34701), 'name' => "C1E - tung lastbil med sl�p (12 ton)", 'description' => "12 ton"),
					//array('id' => array(45601), 'name' => "Extra st�d", 'description' => "F�r elever med t.ex. NPF och/eller l�s- och skrivsv�righeter"),
					//array('id' => array(46301), 'name' => "Ans�ker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare f�r att ans�ka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Buss",
				'services' => array(
					array('id' => array(12201), 'name' => "D - buss", 'description' => "F�rarutbildning f�r buss"),
					array('id' => array(12301), 'name' => "DE - buss med tungt sl�p", 'description' => "F�rarutbildning f�r buss med tungt sl�p"),
					array('id' => array(33701), 'name' => "Videoutrustning", 'description' => "M�jlighet att videofilma k�rlektionen som en del av f�rarutbildningen"),
					//array('id' => array(33001), 'name' => "Teorist�d - extra", 'description' => ""),
					//array('id' => array(32301), 'name' => "Teorist�d - l�s och skriv", 'description' => ""),
					array('id' => array(34501), 'name' => "D1 - buss (16 sittplatser)", 'description' => "16 sittplatser"),
					array('id' => array(35101), 'name' => "D1E - buss (16 pl) med tungt sl�p", 'description' => "16 sittplatser"),
					//array('id' => array(45701), 'name' => "Extra st�d", 'description' => "F�r elever med t.ex. NPF och/eller l�s- och skrivsv�righeter"),
					//array('id' => array(46401), 'name' => "Ans�ker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare f�r att ans�ka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "�vrigt",
				'services' => array(
					//array('id' => array(11201), 'name' => "Traktor", 'description' => "F�rarutbildning f�r traktor"),
					//array('id' => array(30801), 'name' => "Terr�nghjuling", 'description' => "F�rarutbildning f�r terr�nghjuling"),
					//array('id' => array(15401), 'name' => "Sn�skoter", 'description' => "F�rarutbildning f�r sn�skoter"),
					array('id' => array(31801), 'name' => "Synpr�vning", 'description' => "Syntest (synscreening) som beh�vs f�r k�rkortstillst�nd"),
					//array('id' => array(33801), 'name' => "Videoutrustning", 'description' => "M�jlighet att videofilma k�rlektionen som en del av f�rarutbildningen"),
					//array('id' => array(33101), 'name' => "Teorist�d - extra", 'description' => ""),
					//array('id' => array(32401), 'name' => "Teorist�d - l�s och skriv", 'description' => ""),
					array('id' => array(45801), 'name' => "Extra st�d", 'description' => "F�r elever med t.ex. NPF och/eller l�s- och skrivsv�righeter"),
					array('id' => array(10101, 10401, 11101, 31201), 'name' => "EcoDriving", 'description' => "EcoDriving f�r personbilf�rare"),
					//array('id' => array(10401), 'name' => "Heavy EcoDriving", 'description' => "EcoDriving f�r buss- och lastbilsf�rare"),
					//array('id' => array(11101), 'name' => "Working EcoDriving", 'description' => "EcoDriving f�r f�rare av arbetsfordon"),
					//array('id' => array(31201), 'name' => "EcoDriving Taxi", 'description' => "EcoDriving f�r taxif�rare"),
					array('id' => array(46501), 'name' => "Ans�ker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare f�r att ans�ka om anpassat prov hos Trafikverket"),
					array('id' => array(47901), 'name' => "Simulator", 'description' => "Anv�nder simulator i utbildningen"),
				),
			),
			array(
				'area' => "Yrkesf�rarutbildningar",
				'services' => array(
					array('id' => array(12801), 'name' => "YKB Grundutbildning lastbil", 'description' => "Grundutbildning i yrkeskompetens (YKB) f�r lastbilsf�rare"),
					array('id' => array(14101), 'name' => "YKB Fortbildning lastbil", 'description' => "Fortbildning i yrkeskompetens (YKB) f�r lastbilsf�rare"),
					array('id' => array(14301), 'name' => "YKB Grundutbildning buss", 'description' => "Grundutbildning i yrkeskompetens (YKB) f�r bussf�rare"),
					array('id' => array(14401), 'name' => "YKB Fortbildning buss", 'description' => "Fortbildning i yrkeskompetens (YKB) f�r bussf�rare"),
					//array('id' => array(33201), 'name' => "Teorist�d - extra", 'description' => ""),
					//array('id' => array(32501), 'name' => "Teorist�d - l�s och skriv", 'description' => ""),
					//array('id' => array(45901), 'name' => "Extra st�d", 'description' => "F�r elever med t.ex. NPF och/eller l�s- och skrivsv�righeter"),
					//array('id' => array(46601), 'name' => "Ans�ker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare f�r att ans�ka om anpassat prov hos Trafikverket"),
					array('id' => array(12901), 'name' => "Taxif�rarlegitimation", 'description' => "Utbildning f�r taxif�rare"),
				),
			),
			/*array(
				'area' => "Specialiserade yrkesutbildningar",
				'services' => array(
					array('id' => array(13201), 'name' => "Trafiktillst�nd", 'description' => "Utbildning f�r f�retagare med inriktning mot godstransporter f�r trafiktillst�nd (Eget p� v�g)"),
					array('id' => array(13601), 'name' => "Lasts�kring", 'description' => "Kurs f�r personer som jobbar med lasts�kring av gods p� v�g"),
					array('id' => array(13701), 'name' => "Godshantering", 'description' => "Kurs f�r personer som jobbar med godshantering i samband med transporter"),
					array('id' => array(13801), 'name' => "Farligt gods (ADR)", 'description' => "Kontakta utbildaren g�llande vilka delar de utbildar inom"),
					array('id' => array(14501), 'name' => "Fordonsmonterad kran", 'description' => "Kurs f�r personer som jobbar med lastning och lossning av virke eller gods med fordonsmonterad kran"),
					array('id' => array(14801), 'name' => "Bakgavellyft", 'description' => "Kurs i s�ker anv�ndning av bakgavellyft"),
					array('id' => array(13901), 'name' => "Truck", 'description' => "Utbildning f�r truckf�rare"),
					array('id' => array(14001), 'name' => "Hjullastare", 'description' => "Utbildning f�r f�rare av hjullastare"),
				),
			),*/
			/*array(
				'area' => "Utbildningar f�r arbete p� v�g",
				'services' => array(
					array('id' => array(13301), 'name' => "SPV (Niv� 1)", 'description' => "Grundutbildning f�r personer som utf�r v�garbeten"),
					array('id' => array(30901), 'name' => "SPV (Niv� 2)", 'description' => "Utbildning f�r f�rare av arbetsfordon mm. Krav: niv� 1-utbildning"),
					array('id' => array(31001), 'name' => "SPV (Niv� 3)", 'description' => "Utbildning f�r personer som utf�r utm�rkning av v�gm�rken. Krav: niv� 2-utbildning"),
					array('id' => array(31101), 'name' => "Vakt- eller lotsutbildning", 'description' => "Kontakta utbildaren g�llande vilka delar de utbildar inom"),
					array('id' => array(13401), 'name' => "Hj�lp p� v�g", 'description' => "Kurs i f�rsta hj�lpen, HLR, brandkunskap mm f�r personer som har v�gen som arbetsplats"),
					array('id' => array(13501), 'name' => "Milj�", 'description' => "Milj�kurs f�r personer som har v�gen som arbetsplats"),
				),
			),*/
			/*array(
				'area' => "EcoDriving",
				'services' => array(
					array('id' => array(10101), 'name' => "EcoDriving", 'description' => "EcoDriving f�r personbilf�rare"),
					array('id' => array(10401), 'name' => "Heavy EcoDriving", 'description' => "EcoDriving f�r buss- och lastbilsf�rare"),
					array('id' => array(11101), 'name' => "Working EcoDriving", 'description' => "EcoDriving f�r f�rare av arbetsfordon"),
					array('id' => array(31201), 'name' => "EcoDriving Taxi", 'description' => "EcoDriving f�r taxif�rare"),
				),
			),*/
		);

		$arr_exclude = $arr_include = array();
		$arr_exclude[] = "�";	$arr_include[] = "&aring;";
		$arr_exclude[] = "�";	$arr_include[] = "&auml;";
		$arr_exclude[] = "�";	$arr_include[] = "&ouml;";
		$arr_exclude[] = "�";	$arr_include[] = "&Aring;";
		$arr_exclude[] = "�";	$arr_include[] = "&Auml;";
		$arr_exclude[] = "�";	$arr_include[] = "&Ouml;";

		foreach($this->arr_classes as $key_class => $arr_class)
		{
			$this->arr_classes[$key_class]['area'] = str_replace($arr_exclude, $arr_include, $arr_class['area']);

			foreach($arr_class['services'] as $key_service => $arr_service)
			{
				$this->arr_classes[$key_class]['services'][$key_service]['name'] = str_replace($arr_exclude, $arr_include, $arr_service['name']);
				$this->arr_classes[$key_class]['services'][$key_service]['description'] = str_replace($arr_exclude, $arr_include, $arr_service['description']);
			}
		}
	}

	function generate_sas_token($uri, $sasKeyName, $sasKeyValue) 
	{ 
		$targetUri = strtolower(rawurlencode(strtolower($uri))); 
		$expires = time();     
		$expiresInMins = 60; 
		$week = (60 * 60 * 24 * 7);
		$expires = ($expires + $week);
		$toSign = $targetUri."\n".$expires; 
		$signature = rawurlencode(base64_encode(hash_hmac('sha256', $toSign, $sasKeyValue, true)));

		return "SharedAccessSignature sr=".$targetUri."&sig=".$signature."&se=".$expires."&skn=".$sasKeyName;
	}

	function get_woocommerce_custom_orders_table_enabled()
	{
		if($this->woocommerce_custom_orders_table_enabled == '')
		{
			$this->woocommerce_custom_orders_table_enabled = get_option('woocommerce_custom_orders_table_enabled');
		}

		return $this->woocommerce_custom_orders_table_enabled;
	}

	function get_post_data($data)
	{
		global $wpdb;

		$success = true;

		$_customer_user = "";

		$arr_order = wc_get_order($data['order_id']);

		if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
		{
			$_billing_first_name = $arr_order->get_billing_first_name();
			$_billing_last_name = $arr_order->get_billing_last_name();
			$_billing_address_1 = $arr_order->get_billing_address_1();
			$_billing_postcode = $arr_order->get_billing_postcode();
			$_billing_city = $arr_order->get_billing_city();
			$_billing_email = $arr_order->get_billing_email();
			$_billing_phone = $arr_order->get_billing_phone();

			$_shipping_first_name = $arr_order->get_shipping_first_name();
			$_shipping_last_name = $arr_order->get_shipping_last_name();
			$_shipping_address_1 = $arr_order->get_shipping_address_1();
			$_shipping_postcode = $arr_order->get_shipping_postcode();
			$_shipping_city = $arr_order->get_shipping_city();

			$_dibs_payment_id = $arr_order->get_meta('_dibs_payment_id', true);

			$_order_shipping = 0;

			$shipping_methods = $arr_order->get_shipping_methods();

			foreach($shipping_methods as $shipping_method)
			{
				$method_id = $shipping_method->get_method_id();
				$method_title = $shipping_method->get_method_title();
				$_order_shipping = $shipping_method->get_total();
			}
		}

		else
		{
			$_billing_first_name = get_post_meta($data['order_id'], '_billing_first_name', true);
			$_billing_last_name = get_post_meta($data['order_id'], '_billing_last_name', true);
			$_billing_address_1 = get_post_meta($data['order_id'], '_billing_address_1', true);
			$_billing_postcode = get_post_meta($data['order_id'], '_billing_postcode', true);
			$_billing_city = get_post_meta($data['order_id'], '_billing_city', true);
			$_billing_email = get_post_meta($data['order_id'], '_billing_email', true);
			$_billing_phone = get_post_meta($data['order_id'], '_billing_phone', true);

			$_shipping_first_name = get_post_meta($data['order_id'], '_shipping_first_name', true);
			$_shipping_last_name = get_post_meta($data['order_id'], '_shipping_last_name', true);
			$_shipping_address_1 = get_post_meta($data['order_id'], '_shipping_address_1', true);
			$_shipping_postcode = get_post_meta($data['order_id'], '_shipping_postcode', true);
			$_shipping_city = get_post_meta($data['order_id'], '_shipping_city', true);

			$_dibs_payment_id = get_post_meta($data['order_id'], '_dibs_payment_id', true);
			$_order_shipping = get_post_meta($data['order_id'], '_order_shipping', true);
		}

		$post_data = '{
			"source": "korkort",
			"customer":
			{
				"firstName": "'.($_shipping_first_name != '' ? $_shipping_first_name : $_billing_first_name).'",
				"lastName": "'.($_shipping_last_name != "" ? $_shipping_last_name : $_billing_last_name).'",
				"identityNumber": "'.$_customer_user.'",
				"address": "'.($_shipping_address_1 != "" ? $_shipping_address_1 : $_billing_address_1).'",
				"postalCode": "'.($_shipping_postcode != "" ? $_shipping_postcode : $_billing_postcode).'",
				"city": "'.($_shipping_city != "" ? $_shipping_city : $_billing_city).'",
				"email": "'.$_billing_email.'",
				"mobilePhone": "'.$_billing_phone.'"
			},'
			//.'"shippingFee": "'.$_order_shipping.'",'
			.'"orderId": "'.$data['order_id'].'",
			"paymentId": "'.$_dibs_payment_id.'",
			"orderRows":
			[';

				$order_row_count = 0;

				$arr_order_items = $arr_order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));

				$i_limit = 1;

				foreach($arr_order_items as $item_id => $arr_item)
				{
					$product_id = $arr_item['product_id'];
					$variation_id = $arr_item['variation_id'];
					$quantity = $arr_item['quantity'];

					for($i = 1; $i <= $i_limit; $i++)
					{
						$is_bundled = false;

						if($variation_id > 0)
						{
							if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
							{
								$arr_variation = wc_get_product($variation_id);

								$product_virtual = ($arr_variation->is_virtual() ? 'yes' : 'no');
								$product_downloadable = ($arr_variation->is_downloadable() ? 'yes' : 'no');
								$product_sku = $arr_variation->get_sku();
							}

							else
							{
								$product_virtual = get_post_meta($variation_id, '_virtual', true);
								$product_downloadable = get_post_meta($variation_id, '_downloadable', true);
								$product_sku = get_post_meta($variation_id, '_sku', true);
							}

							$item_id = $product_id."_v".$variation_id;
						}

						else
						{
							if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
							{
								$arr_product = wc_get_product($product_id);

								$product_virtual = ($arr_product->is_virtual() ? 'yes' : 'no');
								$product_downloadable = ($arr_product->is_downloadable() ? 'yes' : 'no');
								$product_sku = $arr_product->get_sku();
							}

							else
							{
								$product_virtual = get_post_meta($product_id, '_virtual', true);
								$product_downloadable = get_post_meta($product_id, '_downloadable', true);
								$product_sku = get_post_meta($product_id, '_sku', true);
							}

							$result = $wpdb->get_results($wpdb->prepare("SELECT ID, bundled_item_id FROM ".$wpdb->prefix."woocommerce_bundled_items INNER JOIN ".$wpdb->prefix."posts ON ".$wpdb->prefix."woocommerce_bundled_items.product_id = ".$wpdb->prefix."posts.ID WHERE bundle_id = '%d'", $product_id));
							$num_rows = $wpdb->num_rows;

							if($num_rows > 0)
							{
								$is_bundled = true;
								$item_id = $product_id."_b";
							}

							else
							{
								$item_id = $product_id;
							}
						}

						if($item_id != '')
						{
							if($i > 1)
							{
								$item_id .= "_".$i;
							}

							if($product_virtual == 'yes' || $product_downloadable == 'yes')
							{
								if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
								{
									$product_ssn = $arr_order->get_meta($this->meta_prefix.'ssn_'.$item_id, true);
									$product_phone = $arr_order->get_meta($this->meta_prefix.'phone_'.$item_id, true);
									$product_email = $arr_order->get_meta($this->meta_prefix.'email_'.$item_id, true);
								}

								else
								{
									$product_ssn = get_post_meta($data['order_id'], $this->meta_prefix.'ssn_'.$item_id, true);
									$product_phone = get_post_meta($data['order_id'], $this->meta_prefix.'phone_'.$item_id, true);
									$product_email = get_post_meta($data['order_id'], $this->meta_prefix.'email_'.$item_id, true);
								}

								if($product_ssn != '')
								{
									$product_ssn = substr($product_ssn, 0, 6)."-".substr($product_ssn, 6);
								}

								if($product_phone != '')
								{
									$arr_exclude = $arr_include = array();
									$arr_exclude[] = "0046";	$arr_include[] = "0";

									$product_phone = str_replace($arr_exclude, $arr_include, $product_phone);
								}
							}

							else
							{
								$product_ssn = $product_phone = $product_email = "";
							}

							$unitPrice = ($arr_item['total'] / $quantity);

							if($is_bundled == false && !($unitPrice > 0))
							{
								do_log(__FUNCTION__." - No price: ".var_export($arr_item, true));

								$success = false;
							}

							$unitPrice = number_format((float)$unitPrice, 2, '.', '');

							$post_data .= ($order_row_count > 0 ? "," : "").'{
								"sku": "'.$product_sku.'",
								"description": "",
								"quantity": '.$quantity.',
								"unit": "S",
								"unitPrice": "'.$unitPrice.'",
								"user_idenifier": "'.$_customer_user.'",
								"identityNumber": "'.$product_ssn.'",
								"email": "'.$product_email.'",
								"mobilePhone": "'.$product_phone.'"
							}';

							$order_row_count++;
						}
					}
				}

				if($_order_shipping > 0)
				{
					$post_data .= ($order_row_count > 0 ? "," : "").'{
						"sku": "9123",
						"description": "",
						"quantity": 1,
						"unit": "S",
						"unitPrice": "'.number_format($_order_shipping, 2).'",
						"user_idenifier": "",
						"identityNumber": "",
						"email": "",
						"mobilePhone": ""
					}';
				}

			$post_data .= ']
		}';

		/*if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
		{
			//$arr_order->save();
			//$arr_order->save_meta_data();
		}*/

		return array($success, $post_data);
	}

	function send_to_optima($status, $order_id, $do_return)
	{
		$arr_order = wc_get_order($order_id);

		$woocommerce_dibs_easy_settings = get_option('woocommerce_dibs_easy_settings');

		if($woocommerce_dibs_easy_settings['test_mode'] == 'yes')
		{
			$base_url = get_option('setting_theme_child_api_url_test');
			$sas_key_name = get_option('setting_theme_child_api_name_test', 'korkort.nu_2');
			$sas_key_value = get_option('setting_theme_child_api_key_test');
		}

		else
		{
			$base_url = get_option('setting_theme_child_api_url_live');
			$sas_key_name = get_option('setting_theme_child_api_name_live', 'korkort.nu_2');
			$sas_key_value = get_option('setting_theme_child_api_key_live');
		}

		if($base_url != '' && $sas_key_value != '')
		{
			$url = $base_url."/sbq-orders/messages";
			list($success, $post_data) = $this->get_post_data(array('order_id' => $order_id));

			if($success == true)
			{
				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

				curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

				$arr_headers = array(
					"Authorization: ".$this->generate_sas_token(
						$base_url.'/sbq-orders',
						$sas_key_name,
						$sas_key_value
					),
					"Content-Type: application/js",
					"Content-Length: ".strlen($post_data),
				);
				curl_setopt($curl, CURLOPT_HTTPHEADER, $arr_headers);

				//for debug only!
				//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

				$content = curl_exec($curl);
				$headers = curl_getinfo($curl);
				curl_close($curl);

				if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
				{
					$arr_post_data = $arr_order->get_meta($this->meta_prefix.'optima_post_data');
				}

				else
				{
					$arr_post_data = get_post_meta($order_id, $this->meta_prefix.'optima_post_data');
				}

				if(!is_array($arr_post_data))
				{
					if($arr_post_data != '')
					{
						$arr_post_data_temp = $arr_post_data;

						if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
						{
							$http_code = $arr_order->get_meta($this->meta_prefix.'optima_http_code');
						}

						else
						{
							$http_code = get_post_meta($order_id, $this->meta_prefix.'optima_http_code');
						}

						$arr_post_data = array();

						$arr_post_data[] = array(
							'data' => $arr_post_data_temp,
							'http_code' => $http_code,
							'user' => 0,
							'created' => "",
						);

						if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
						{
							$arr_order->delete_meta_data($this->meta_prefix.'optima_http_code');

							//$arr_order->save();
							$arr_order->save_meta_data();
						}

						delete_post_meta($order_id, $this->meta_prefix.'optima_http_code');
					}

					else
					{
						$arr_post_data = array();
					}
				}

				if(is_array($arr_post_data))
				{
					$arr_post_data[] = array(
						'data' => $post_data,
						'http_code' => $headers['http_code'],
						'user' => get_current_user_id(),
						'created' => date("Y-m-d H:i:s"),
					);
				}

				if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
				{
					$arr_order->update_meta_data($this->meta_prefix.'optima_post_data', $arr_post_data);

					$arr_order->save_meta_data();
				}

				update_post_meta($order_id, $this->meta_prefix.'optima_post_data', $arr_post_data);

				switch($headers['http_code'])
				{
					case 200:
					case 201:
						if($do_return == true)
						{
							return true;
						}
					break;

					default:
						do_log("Error while sending data to Optima: ".$headers['http_code']." (#".$order_id.", ".htmlspecialchars($content).")");

						if($do_return == true)
						{
							return false;
						}
					break;
				}
			}

			else
			{
				do_log("Error while sending data to Optima: get_post_data() returned ".$post_data);
			}
		}

		else
		{
			do_log("Base URL and SAS Key must be set in <a href='".admin_url("options-general.php?page=settings_mf_base#settings_theme_child")."'>".__("Settings", 'lang_bb-theme-child')."</a>");
		}
	}

	function split_street_address($address)
	{
		$street_name = $street_number = "";

		$arr_parts = preg_split('/\s+/', $address);

		$count_temp = count($arr_parts);

		if($count_temp >= 2)
		{
			for($i = 0; $i < ($count_temp - 1); $i++)
			{
				$street_name .= ($street_name != '' ? " " : "").$arr_parts[$i];
			}

			$street_number = $arr_parts[$count_temp - 1];
		}

		return array($street_name, $street_number);
	}

	function validate_url($url)
	{
		if($url != '')
		{
			$is_full_link = false;

			$arr_link_start = array('http://', 'https://', '//');

			foreach($arr_link_start as $link_start)
			{
				if(substr($url, 0, strlen($link_start)) == $link_start)
				{
					$is_full_link = true;

					break;
				}
			}

			if($is_full_link == false)
			{
				$url = "http://".$url;
			}
		}

		return $url;
	}

	function get_company_item($data)
	{
		global $wpdb;

		if($data['debug'] == true)
		{
			//echo "<p><strong>".date("H:i:s")."</strong> Get company: ".$data['array']['name']." => ".var_export($data['array'], true)."</p>";
		}

		$school_id = $data['array']['_id'];

		if($data['array']['active'] == true && $data['array']['hideweb'] == false && in_array($data['array']['companytype']['id'], array('509201', '509301')))// && $data['array']['memberno'] != '' //509201 = F�retagsmedlem F�retag, 509301 = F�retagsmedlem Guld 
		{
			$post_id = 0;
			$post_modified = DEFAULT_DATE;

			$result = $wpdb->get_results($wpdb->prepare("SELECT ID, post_modified FROM ".$wpdb->posts." INNER JOIN ".$wpdb->postmeta." ON ".$wpdb->posts.".ID = ".$wpdb->postmeta.".post_id WHERE post_type = %s AND post_status != %s AND meta_key = %s AND meta_value = '%d' LIMIT 0, 1", $this->post_type_instructor, 'trash', 'school_id', $school_id));

			if($wpdb->num_rows > 0)
			{
				foreach($result as $r)
				{
					$post_id = $r->ID;
					$post_modified = $r->post_modified;
				}
			}

			$is_updated = ($data['array']['updated_website'] > DEFAULT_DATE && date("Y-m-d", strtotime($data['array']['updated_website'])) >= date("Y-m-d", strtotime($post_modified)));

			if($data['debug'] == true)
			{
				//echo "<p><strong>".date("H:i:s")."</strong> API Response #".$post_id.": ".var_export($data['array'], true)."</p>";
				//echo "<p><strong>".date("H:i:s")."</strong> Modified #".$post_id.": ".date("Y-m-d H:i:s", strtotime($data['array']['updated_website']))." > ".$post_modified."</p>";
			}

			$data['array']['www'] = $this->validate_url($data['array']['www']);

			if($data['array']['phone'] == ''){				$data['array']['phone'] = "-";}
			if($data['array']['email'] == ''){				$data['array']['email'] = "-";}
			if($data['array']['description'] == ''){		$data['array']['description'] = "-";}
			if($data['array']['visitingaddress'] == ''){	$data['array']['visitingaddress'] = "-";}
			if($data['array']['visitingzipcode'] == ''){	$data['array']['visitingzipcode'] = "-";}
			if($data['array']['visitingcity'] == ''){		$data['array']['visitingcity'] = "-";}

			$post_content = "";

			// Add searchable parameters
			##################################
			if($data['array']['visitingcity'] != '')
			{
				$post_content .= ($post_content != '' ? ", " : "").$data['array']['visitingcity'];
			}

			if($data['array']['searchcity'] != '' && $data['array']['searchcity'] != $data['array']['visitingcity'])
			{
				$post_content .= ($post_content != '' ? ", " : "").$data['array']['searchcity'];
			}

			if($data['array']['searchcity2'] != '')
			{
				$post_content .= ($post_content != '' ? ", " : "").$data['array']['searchcity2'];
			}

			if($data['array']['searchcity3'] != '')
			{
				$post_content .= ($post_content != '' ? ", " : "").$data['array']['searchcity3'];
			}

			if($data['array']['description'] != '' && $data['array']['description'] != '-')
			{
				$post_content .= ($post_content != '' ? ", " : "").$data['array']['description'];
			}

			if($data['array']['registrationno'] != '')
			{
				$post_content .= ($post_content != '' ? ", " : "").$data['array']['registrationno'];
			}
			##################################

			switch($data['array']['companytype']['id'])
			{
				case '509201':
					$membership_name = __("Company Member", 'lang_bb-theme-child');
					$this->arr_terms_id[] = 660;
				break;

				case '509301':
					$membership_name = __("Gold Member", 'lang_bb-theme-child');
					$this->arr_terms_id[] = 661;
				break;

				default:
					$membership_name = __("Unknown", 'lang_bb-theme-child');
				break;
			}

			$address = $data['array']['visitingaddress'].", ".$data['array']['visitingzipcode']." ".$data['array']['visitingcity'];

			list($street_name, $street_number) = $this->split_street_address($data['array']['visitingaddress']);

			$post_data = array(
				'post_title' => $data['array']['name'],
				'post_name' => sanitize_title_with_dashes(sanitize_title($data['array']['name'])),
				'post_type' => $this->post_type_instructor,
				'post_status' => ($data['array']['active'] == true && strpos($data['array']['name'], "[STR TEST] ") === false ? 'publish' : 'draft'),
				'post_content' => $post_content,
				'meta_input' => array(
					'school_id' => $school_id,
					'school_name' => $data['array']['name'],
					'membership' => $membership_name,
					//'membership_description' => ,
					'website' => $data['array']['www'],
					'contact_no' => $data['array']['phone'],
					'email_address' => $data['array']['email'],
					'address' => $address,
					'post_address' => $address,
					'location' => $data['array']['visitingcity'],
					'address_map' => array(
						'address' => $address,
						'lat' => $data['array']['map_lat'],
						'lng' => $data['array']['map_long'],
						'zoom' => 14,
						//'place_id' => "",
						'street_name' => $street_name,
						'street_number' => $street_number,
						'post_code' => $data['array']['visitingzipcode'],
						'city' => $data['array']['visitingcity'],
						//'state' => "",
						'country' => "Sweden",
						'country_short' => "SE",
					),
					'organisation_no' => $data['array']['registrationno'],
					'training_and_services' => "-", //$data['array']['description']
					'about_us' => $data['array']['description'],
				),
			);

			if($data['debug'] == true)
			{
				echo "<p><strong>".date("H:i:s")."</strong> Post data #".$post_id.": ".var_export($post_data, true)."</p>";
			}

			$post_data['meta_input']['_school_name'] = "field_64efe5bd91abf";
			$post_data['meta_input']['_membership'] = "field_64efe5f091ac0";
			$post_data['meta_input']['_website'] = "field_64efe62a91ac2";
			$post_data['meta_input']['_contact_no'] = "field_64efe64791ac3";
			$post_data['meta_input']['_email_address'] = "field_64efe68391ac4";
			$post_data['meta_input']['_address'] = "field_64efe69791ac5";
			$post_data['meta_input']['_address_map'] = "field_64efe6a891ac6";
			$post_data['meta_input']['_post_address'] = "field_64efe6f191ac7";
			$post_data['meta_input']['_location'] = "field_64f1cd5254cc6";
			$post_data['meta_input']['_organisation_no'] = "field_64efe70491ac8";
			$post_data['meta_input']['_training_and_services'] = "field_64efe72791ac9";
			$post_data['meta_input']['_about_us'] = "field_64efe73f91aca";

			// Get Properties
			#######################################
			/*if($is_updated)
			{*/
				if(strpos($data['array']['_links']['relation_propertylink']['href'], "_limit=") === false)
				{
					$data['array']['_links']['relation_propertylink']['href'] .= "?_limit=".$data['limit_amount'];
				}

				if($data['debug'] == true) //in_array($school_id, array(842501, 422001, 212501))
				{
					//echo "<p><strong>".date("H:i:s")."</strong> Property Request: ".$data['array']['_links']['relation_propertylink']['href']."</p>"; // - ".$data['array']['name'].": ".str_replace(array("\n", "\r"), "", var_export($data['array'], true))." -> ".var_export($post_data, true)
				}

				$data_temp = $data;
				$data_temp['url'] = $data['array']['_links']['relation_propertylink']['href'];
				$this->get_educators($data_temp);
			/*}

			else if($data['debug'] == true)
			{
				echo "<p><strong>".date("H:i:s")."</strong> NOT modified so ignoring properties #".$post_id.": ".date("Y-m-d H:i:s", strtotime($data['array']['updated_website']))." > ".$post_modified."</p>";
			}*/
			#######################################

			// Insert or Update
			#######################################
			if($data['debug'] == true)
			{
				echo "<p><strong>".date("H:i:s")."</strong> Insert or Update ".$school_id."</p>";
			}

			if($post_id > 0)
			{
				$post_data['ID'] = $post_id;

				// Add classes to T&s
				######################################
				$result = $wpdb->get_results($wpdb->prepare("SELECT ".$wpdb->prefix."terms.name FROM ".$wpdb->prefix."term_relationships INNER JOIN ".$wpdb->prefix."terms ON ".$wpdb->prefix."term_relationships.term_taxonomy_id = ".$wpdb->prefix."terms.term_id WHERE object_id = '%d' GROUP BY ".$wpdb->prefix."terms.name ORDER BY ".$wpdb->prefix."terms.name ASC", $post_id));

				if($wpdb->num_rows > 0)
				{
					$post_data['meta_input']['training_and_services'] = "";

					foreach($result as $r)
					{
						$post_data['meta_input']['training_and_services'] .= $r->name."\n";
					}

					if($data['debug'] == true)
					{
						echo "<p><strong>".date("H:i:s")."</strong> Added T&s ".$school_id." -> ".$post_id." -> ".get_the_title($post_id)." (".$wpdb->num_rows.")</p>"; // -> ".var_export($post_data, true)."
					}
				}
				######################################

				// Images
				#######################################
				if($is_updated)
				{
					if($data['debug'] == true)
					{
						echo "<p><strong>".date("H:i:s")."</strong> Get Images for ".$school_id." -> ".$post_id." -> ".get_the_title($post_id)."</p>";
					}

					$meta_key_count = 1;

					$arr_image_data = array(
						1 => 'field_64efe75191acb',
						2 => 'field_64efe78291acc',
						3 => 'field_64efe78e91acd',
					);

					$arr_image_types = array(
						'image' => array(
							'url' => get_option('setting_theme_child_lime_assets_url')."korkortnu-bild/".$school_id,
							'file_name' => "schoold_id_".$school_id,
						),
						'logo' => array(
							'url' => get_option('setting_theme_child_lime_assets_url')."korkortnu-logga/".$school_id,
							'file_name' => "school_logo_".$school_id,
						),
					);

					foreach($arr_image_types as $type_key => $arr_type)
					{
						$image_id = 0;
						$image_modified = DEFAULT_DATE;

						// Check if image already exists in media
						$result = $wpdb->get_results($wpdb->prepare("SELECT ID, post_modified FROM ".$wpdb->posts." WHERE post_type = %s AND post_title = %s ORDER BY post_modified DESC", 'attachment', $arr_type['file_name']));

						if($wpdb->num_rows > 0)
						{
							foreach($result as $r)
							{
								if($image_id == 0)
								{
									$image_id = $r->ID;
									$image_modified = $r->post_modified;

									if($data['debug'] == true)
									{
										echo "<p><strong>".date("H:i:s")."</strong> Image already exists ".$arr_type['file_name']." -> ".$image_id."</p>";
									}
								}

								else
								{
									if($data['debug'] == true)
									{
										echo "<p><strong>".date("H:i:s")."</strong> Image duplicate exists of ".$arr_type['file_name']." -> ".$image_id." and should be removed</p>";
									}
								}
							}
						}

						if($data['debug'] == true)
						{
							//echo "<p><strong>".date("H:i:s")."</strong> Query: ".$wpdb->last_query."</p>";
						}

						foreach(array('png', 'jpg') as $str_image_prefix)
						{
							list($file_content, $headers) = get_url_content(array(
								'url' => $arr_type['url'].".".$str_image_prefix,
								'catch_head' => true,
							));

							switch($headers['http_code'])
							{
								case 200:
								case 201:
									if($image_id > 0)
									{
										if(date("Y-m-d H:i:s", strtotime($headers['last-modified'])) > $image_modified)
										{
											wp_delete_post($image_id);

											unset($post_data['meta_input']['image_gallery_'.$meta_key_count]);
											unset($post_data['meta_input']['_image_gallery_'.$meta_key_count]);

											$image_id = 0;

											if($data['debug'] == true)
											{
												echo "<p><strong>".date("H:i:s")."</strong> Image already exists but was old (".date("Y-m-d H:i:s", strtotime($headers['last-modified']))." > ".$image_modified.")</p>";
											}
										}
									}

									if(!($image_id > 0))
									{
										$image_id = insert_attachment(array(
											'content' => $file_content,
											'mime' => 'image/png',
											'name' => $arr_type['file_name'].".".$str_image_prefix,
										));

										if($data['debug'] == true)
										{
											echo "<p><strong>".date("H:i:s")."</strong> Created ".$arr_type['file_name'].".".$str_image_prefix." -> ".$image_id."</p>";
										}
									}
								break;
							}
						}

						if($image_id > 0)
						{
							$post_data['meta_input']['image_gallery_'.$meta_key_count] = $image_id;
							$post_data['meta_input']['_image_gallery_'.$meta_key_count] = $arr_image_data[$meta_key_count];

							$meta_key_count++;
						}
					}
				}

				else if($data['debug'] == true)
				{
					if($data['array']['updated_website'] > DEFAULT_DATE)
					{
						echo "<p><strong>".date("H:i:s")."</strong> NOT modified so ignoring images #".$post_id.": ".date("Y-m-d H:i:s", strtotime($data['array']['updated_website']))." > ".$post_modified."</p>";
					}

					else
					{
						echo "<p><strong>".date("H:i:s")."</strong> NOT modified so ignoring images #".$post_id.": ".$data['array']['updated_website']." > ".$post_modified."</p>";
					}
				}
				#######################################

				wp_update_post($post_data);

				if($is_updated)
				{
					for($i = $meta_key_count; $i <= 3; $i++)
					{
						delete_post_meta($post_id, '_pods_image_gallery_'.$i);
						delete_post_meta($post_id, 'image_gallery_'.$i);
						delete_post_meta($post_id, '_image_gallery_'.$i);
					}
				}

				$this->update_count++;
			}

			else
			{
				$post_id = wp_insert_post($post_data);

				$this->insert_count++;
			}
			#######################################
		}

		else
		{
			// Delete old
			#######################################
			$post_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM ".$wpdb->posts." INNER JOIN ".$wpdb->postmeta." ON ".$wpdb->posts.".ID = ".$wpdb->postmeta.".post_id WHERE post_type = %s AND meta_key = %s AND meta_value = '%d' LIMIT 0, 1", $this->post_type_instructor, 'school_id', $school_id));

			if($post_id > 0)
			{
				if($data['debug'] == true)
				{
					echo "<p><strong>".date("H:i:s")."</strong> Delete ".$school_id."</p>";
				}

				wp_trash_post($post_id);

				$this->delete_count++;
			}

			else
			{
				if($data['debug'] == true)
				{
					echo "<p><strong>".date("H:i:s")."</strong> Company is not active (".var_export($data['array'], true).")</p>";
				}

				$this->ignore_count++;
			}
			#######################################
		}
	}

	function get_term($data)
	{
		global $wpdb;

		if(!isset($data['arr_service_id'])){	$data['arr_service_id'] = array();}
		if(!isset($data['parent'])){			$data['parent'] = 0;}

		$term_id = $rows = 0;

		if(count($data['arr_service_id']) > 0)
		{
			$result = $wpdb->get_results($wpdb->prepare("SELECT ".$wpdb->termmeta.".term_id FROM ".$wpdb->termmeta." INNER JOIN ".$wpdb->term_taxonomy." USING (term_id) WHERE taxonomy = %s AND meta_key = %s AND meta_value IN ('".implode("','", $data['arr_service_id'])."') GROUP BY ".$wpdb->termmeta.".term_id ORDER BY ".$wpdb->termmeta.".term_id ASC", $this->taxonomy_name, $this->meta_prefix.'service_id'));

			$rows = $wpdb->num_rows;

			if($data['debug'] == true)
			{
				if($rows > 0)
				{
					echo "<p><strong>".date("H:i:s")."</strong> Got term_id (".var_export($result, true).") from service_id #".var_export($data['arr_service_id'], true)."</p>";
				}

				else
				{
					echo "<p><strong>".date("H:i:s")."</strong> Did NOT get term_id (".$wpdb->last_query.") from service_id #".var_export($data['arr_service_id'], true)."</p>";
				}
			}
		}

		if($rows == 0)
		{
			$slug = sanitize_title_with_dashes(sanitize_title($data['name']));

			$result = $wpdb->get_results($wpdb->prepare("SELECT ".$wpdb->terms.".term_id FROM ".$wpdb->terms." INNER JOIN ".$wpdb->term_taxonomy." USING (term_id) WHERE (name = %s OR slug = %s) AND taxonomy = %s AND parent = '%d' GROUP BY ".$wpdb->terms.".term_id ORDER BY ".$wpdb->terms.".term_id ASC", $data['name'], $slug, $this->taxonomy_name, $data['parent']));

			$rows = $wpdb->num_rows;

			if($rows > 0 && $data['debug'] == true)
			{
				echo "<p><strong>".date("H:i:s")."</strong> Got term_id (".var_export($result, true).") from ".$data['name']."</p>";
			}
		}

		if($rows > 0)
		{
			foreach($result as $r)
			{
				if($term_id == 0)
				{
					$term_id = $r->term_id;
				}

				else
				{
					$wpdb->get_results($wpdb->prepare("DELETE FROM ".$wpdb->terms." WHERE term_id = '%d'", $r->term_id));
					$wpdb->get_results($wpdb->prepare("DELETE FROM ".$wpdb->term_taxonomy." WHERE term_id = '%d'", $r->term_id));
					$wpdb->get_results($wpdb->prepare("DELETE FROM ".$wpdb->termmeta." WHERE term_id = '%d'", $r->term_id));
				}
			}
		}

		else if($data['debug'] == true)
		{
			//echo "<p><strong>".date("H:i:s")."</strong> ".$wpdb->last_query."</p>";
		}

		return $term_id;
	}

	function insert_term($data)
	{
		global $wpdb;

		if(!isset($data['arr_service_id'])){	$data['arr_service_id'] = array();}
		if(!isset($data['description'])){		$data['description'] = "";}
		if(!isset($data['parent'])){			$data['parent'] = 0;}
		if(!isset($data['services'])){			$data['services'] = array();}

		$slug = sanitize_title_with_dashes(sanitize_title($data['name']));

		$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->terms." SET name = %s, slug = %s", $data['name'], $slug));
		$term_id = $wpdb->insert_id;

		if($term_id > 0)
		{
			// Terms
			$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->term_taxonomy." SET term_taxonomy_id = '%d', term_id = '%d', taxonomy = %s, description = %s, parent = '%d'", $term_id, $term_id, $this->taxonomy_name, $data['description'], $data['parent']));

			if(count($data['arr_service_id']) > 0)
			{
				foreach($data['arr_service_id'] as $service_id)
				{
					$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->termmeta." SET term_id = '%d', meta_key = %s, meta_value = %s", $term_id, $this->meta_prefix.'service_id', $service_id));

					if($data['debug'] == true)
					{
						echo "<p><strong>".date("H:i:s")."</strong> Inserted ".$wpdb->last_query."</p>";
					}
				}
			}

			// Facets
			if(count($data['services']) > 0)
			{
				$arr_include = array();

				foreach($data['services'] as $arr_service)
				{
					$term_id_temp = $this->get_term(array('arr_service_id' => $arr_service['id'], 'name' => $arr_service['name'], 'debug' => $data['debug']));

					if($term_id_temp > 0)
					{
						$arr_include[] = $term_id_temp;
					}
				}

				$count_temp = count($arr_include);

				$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix."wpgb_facets SET slug = %s, name = %s, date = NOW(), modified_date = NOW(), type = %s, source = %s, settings = %s", $slug, $data['name'], 'checkbox', 'taxonomy/'.$this->taxonomy_name, '{"name":"'.$data['name'].'","slug":"'.$slug.'","title":"'.$data['name'].'","action":"filter","filter_type":"checkbox","source":"taxonomy","taxonomy":"'.$this->taxonomy_name.'","parent":"'.$term_id.'","include":["'.implode('","', $arr_include).'"],"logic":"AND","hierarchical":1,"treeview":1,"show_empty":1,"show_count":0,"limit":'.$count_temp.',"display_limit":'.$count_temp.',"show_more_label":"+ Show [number] more","show_less_label":"- Show less","orderby":"facet_name","order":"ASC"}'));
			}
		}

		return $wpdb->insert_id;
	}

	function update_term($data)
	{
		global $wpdb;

		if(!isset($data['arr_service_id'])){	$data['arr_service_id'] = array();}
		if(!isset($data['description'])){		$data['description'] = "";}
		if(!isset($data['parent'])){			$data['parent'] = 0;}
		if(!isset($data['services'])){			$data['services'] = array();}

		// Terms
		$slug = sanitize_title_with_dashes(sanitize_title($data['name']));

		$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->terms." SET name = %s, slug = %s WHERE term_id = '%d'", $data['name'], $slug, $data['term_id']));
		$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->term_taxonomy." SET parent = '%d', description = %s WHERE term_id = '%d'", $data['parent'], $data['description'], $data['term_id']));

		if(count($data['arr_service_id']) > 0)
		{
			$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->termmeta." WHERE term_id = '%d' AND meta_key = %s AND meta_value NOT IN ('".implode("','", $data['arr_service_id'])."')", $data['term_id'], $this->meta_prefix.'service_id'));

			foreach($data['arr_service_id'] as $service_id)
			{
				$wpdb->get_results($wpdb->prepare("SELECT term_id FROM ".$wpdb->termmeta." WHERE term_id = '%d' AND meta_key = %s AND meta_value = %s", $data['term_id'], $this->meta_prefix.'service_id', $service_id));

				if($wpdb->num_rows > 0)
				{
					if($data['debug'] == true)
					{
						echo "<p><strong>".date("H:i:s")."</strong> Already exists ".$wpdb->last_query."</p>";
					}
				}

				else
				{
					$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->termmeta." SET term_id = '%d', meta_key = %s, meta_value = %s", $data['term_id'], $this->meta_prefix.'service_id', $service_id));

					if($data['debug'] == true)
					{
						echo "<p><strong>".date("H:i:s")."</strong> Inserted ".$wpdb->last_query."</p>";
					}
				}
			}
		}

		// Facets
		if(count($data['services']) > 0)
		{
			$slug = sanitize_title_with_dashes(sanitize_title($data['name']));

			$arr_include = array();

			foreach($data['services'] as $arr_service)
			{
				$arr_include[] = $this->get_term(array('arr_service_id' => $arr_service['id'], 'name' => $arr_service['name'], 'debug' => $data['debug']));
			}

			if($data['debug'] == true)
			{
				echo "<p><strong>".date("H:i:s")."</strong> Include '".implode("','", $arr_include)."'</p>";
			}

			$count_temp = count($arr_include);

			$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."wpgb_facets SET modified_date = NOW(), settings = %s WHERE slug = %s AND name = %s AND type = %s AND source = %s", '{"name":"'.$data['name'].'","slug":"'.$slug.'","title":"'.$data['name'].'","action":"filter","filter_type":"checkbox","source":"taxonomy","taxonomy":"'.$this->taxonomy_name.'","parent":"'.$data['term_id'].'","include":["'.implode('","', $arr_include).'"],"logic":"AND","hierarchical":1,"treeview":1,"show_empty":1,"show_count":0,"limit":'.$count_temp.',"display_limit":'.$count_temp.',"show_more_label":"+ Show [number] more","show_less_label":"- Show less","orderby":"facet_name","order":"ASC"}', $slug, $data['name'], 'checkbox', 'taxonomy/'.$this->taxonomy_name));
		}
	}

	function get_educators($data = array())
	{
		global $wpdb;

		sleep(1);
		set_time_limit(600);

		if(!isset($data['api_key'])){			$data['api_key'] = get_option('setting_theme_child_lime_api_key');}
		if(!isset($data['debug'])){				$data['debug'] = false;}
		if(!isset($data['limit_amount'])){		$data['limit_amount'] = 50;}
		if(!isset($data['date_start'])){		$data['date_start'] = date("Y-m-d H:i:s");}

		if(!isset($data['url']) || $data['url'] == '')
		{
			$option_theme_educators_url = get_option('option_theme_educators_url');

			if($option_theme_educators_url != '')
			{
				if(strpos($option_theme_educators_url, "_limit="))
				{
					$option_theme_educators_url_temp = preg_replace("/_limit=(.*?)&/", "_limit=".$data['limit_amount']."&", $option_theme_educators_url);

					if($option_theme_educators_url_temp != '')
					{
						$option_theme_educators_url = $option_theme_educators_url_temp;
					}
				}

				else
				{
					$option_theme_educators_url .= "&_limit=".$data['limit_amount'];
				}

				$data['url'] = $option_theme_educators_url;
			}

			else
			{
				$data['url'] = get_option('setting_theme_child_lime_api_url')."limeobject/company/?_limit=".$data['limit_amount'];
			}
		}

		if($data['debug'] == true)
		{
			echo "<p><strong>".date("H:i:s")."</strong> Request: ".$data['url']."</p>";
		}

		if($data['url'] != '' && $data['api_key'] != '')
		{
			$curl = curl_init($data['url']);
			curl_setopt($curl, CURLOPT_URL, $data['url']);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			$arr_headers = array(
				"x-api-key: ".$data['api_key'],
			);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arr_headers);

			$content = curl_exec($curl);
			$headers = curl_getinfo($curl);
			curl_close($curl);

			$log_message = "Error while getting data from Lime: ".$data['url'];

			switch($headers['http_code'])
			{
				case 200:
				case 201:
					$arr_content = json_decode($content, true);

					if(strpos($data['url'], "/propertylink/"))
					{
						if($data['debug'] == true)
						{
							echo "<p><strong>".date("H:i:s")."</strong> PropertyLink: ".count($arr_content['_embedded']['limeobjects'])."</p>";
						}

						$next_page = "";

						foreach($arr_content as $key => $arr_json)
						{
							/*"_links": 
							{
								"self": {"href": "[api_url]limeobject/company/541001/propertylink/"}
							}, 
							"_embedded": 
							{
								"limeobjects": 
								[
									{
										"property": 1001, 
										"company": 541001, 
										"person": 464301, 
										"propertyid": "", "companyid": "", "localsocietyid": "", "personid": "", 
										"_id": 1527801, 
										"_timestamp": "2012-02-05T21:46:38.097000+01:00", 
										"_descriptive": "1527801", 
										"_updateduser": 2001, "_createduser": 2201, 
										"_createdtime": "2011-11-02T13:14:07.673000+01:00", 
										"_links": 
										{
											"limetype": {"href": "[api_url]limetype/propertylink/", "name": "propertylink"}, 
											"self": {"href": "[api_url]limeobject/propertylink/1527801/"}, 
											"relation_property": {"href": "[api_url]limeobject/propertylink/1527801/property/", "name": "property"}, 
											"relation_company": {"href": "[api_url]limeobject/propertylink/1527801/company/", "name": "company"}, 
											"relation_person": {"href": "[api_url]limeobject/propertylink/1527801/person/", "name": "person"}, 
											"relation_region_person": {"href": "[api_url]limeobject/propertylink/1527801/region_person/", "name": "region_person"}, 
											"new_region_person": {"href": "[api_url]limeobject/propertylink/1527801/region_person/new/"}
										}
									},
									...
								]
							}*/

							switch($key)
							{
								case '_links':
									if(isset($arr_json['next']['href']))
									{
										$next_page = $arr_json['next']['href'];
									}
								break;

								case '_embedded':
									$post_id = 0;

									foreach($arr_json as $key => $arr_embedded)
									{
										if($key == 'limeobjects')
										{
											foreach($arr_embedded as $key => $arr_item)
											{
												if($data['debug'] == true)
												{
													//echo "<p><strong>".date("H:i:s")."</strong> Item: ".var_export($arr_item, true)."</p>";
												}

												$property_id = $arr_item['property'];
												$company_id = $arr_item['company'];

												if($property_id > 0 && $company_id > 0)
												{
													if(!($post_id > 0))
													{
														$post_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM ".$wpdb->prefix."posts INNER JOIN ".$wpdb->prefix."postmeta ON ".$wpdb->prefix."posts.ID = ".$wpdb->prefix."postmeta.post_id WHERE post_type = %s AND meta_key = %s AND meta_value = '%d'", $this->post_type_instructor, 'school_id', $company_id));

														if($data['debug'] == true && $post_id > 0)
														{
															echo "<p><strong>".date("H:i:s")."</strong> Got PostID: ".$company_id." -> ".$post_id." -> ".get_the_title($post_id)."</p>";
														}
													}

													if($post_id > 0)
													{
														$property_id_exists = false;

														foreach($this->arr_classes as $arr_class)
														{
															if(is_array($arr_class['services']) && count($arr_class['services']) > 0)
															{
																if($data['debug'] == true)
																{
																	//echo "<p><strong>".date("H:i:s")."</strong> Terms: ".var_export($arr_class['services'], true)."</p>";
																}

																foreach($arr_class['services'] as $arr_service)
																{
																	if($property_id == $arr_service['id'] || is_array($arr_service['id']) && in_array($property_id, $arr_service['id']))
																	{
																		$term_id = $this->get_term(array('arr_service_id' => $arr_service['id'], 'name' => $arr_service['name'], 'debug' => $data['debug']));

																		if($term_id > 0)
																		{
																			$this->arr_terms_id[] = $term_id;

																			if($data['debug'] == true)
																			{
																				echo "<p><strong>".date("H:i:s")."</strong> Term exists: ".$property_id.", ".$term_id." -> ".$arr_service['name']."</p>";
																			}
																		}

																		else if($data['debug'] == true)
																		{
																			echo "<p><strong>".date("H:i:s")."</strong> Term does NOT exist: ".$property_id." -> ".$arr_service['name']."</p>";
																		}

																		$property_id_exists = true;
																	}
																}
															}
														}

														if($property_id_exists == false && $data['debug'] == true)
														{
															echo "<p><strong>".date("H:i:s")."</strong> Property does NOT exist: ".$property_id." (".$arr_service['name'].") -> \$this->arr_classes</p>";
														}
													}

													else if($data['debug'] == true)
													{
														echo "<p><strong>".date("H:i:s")."</strong> Got NO PostID: ".$wpdb->last_query."</p>";
													}
												}

												else if($data['debug'] == true)
												{
													echo "<p><strong>".date("H:i:s")."</strong> Got NO Property or Company: ".var_export($arr_item, true)."</p>";
												}
											}
										}
									}
								break;
							}
						}

						if($next_page != '')
						{
							if(strpos($next_page, "_limit="))
							{
								$next_page_temp = preg_replace("/_limit=(.*?)&/", "_limit=".$data['limit_amount']."&", $next_page);

								if($next_page_temp != '')
								{
									$next_page = $next_page_temp;
								}
							}

							$data_temp = $data;
							$data_temp['url'] = $next_page;
							$this->get_educators($data_temp);
						}

						else
						{
							// Populate classes
							##############################
							if($data['debug'] == true && count($this->arr_terms_id) > 0)
							{
								echo "<p><strong>".date("H:i:s")."</strong> Populate #".$post_id." (".var_export($this->arr_terms_id, true).")</p>";
							}

							$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->term_relationships." WHERE object_id = '%d' AND term_taxonomy_id NOT IN('".implode("', '", $this->arr_terms_id)."')", $post_id));

							if($data['debug'] == true && $wpdb->rows_affected > 0)
							{
								echo "<p><strong>".date("H:i:s")."</strong> Removed ".$wpdb->rows_affected." classes from #".$post_id."</p>";
							}

							$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."wpgb_index WHERE object_id = '%d' AND facet_id NOT IN('".implode("', '", $this->arr_terms_id)."')", $post_id));

							if($data['debug'] == true && $wpdb->rows_affected > 0)
							{
								echo "<p><strong>".date("H:i:s")."</strong> Removed ".$wpdb->rows_affected." indexes from #".$post_id."</p>";
							}

							foreach($this->arr_terms_id as $term_id)
							{
								$wpdb->get_results($wpdb->prepare("SELECT object_id FROM ".$wpdb->term_relationships." WHERE object_id = '%d' AND term_taxonomy_id = '%d'", $post_id, $term_id));

								if($wpdb->num_rows == 0)
								{
									if($data['debug'] == true)
									{
										echo "<p><strong>".date("H:i:s")."</strong> Insert class ".$term_id." to #".$post_id." (".get_the_title($post_id).")</p>";
									}

									$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->term_relationships." SET object_id = '%d', term_taxonomy_id = '%d'", $post_id, $term_id));
								}

								$wpdb->get_results($wpdb->prepare("SELECT object_id FROM ".$wpdb->prefix."wpgb_index WHERE object_id = '%d' AND facet_id = '%d'", $post_id, $term_id));

								if($wpdb->num_rows > 0)
								{
									//$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."wpgb_index SET object_id = '%d' AND facet_id = '%d'", $post_id, $term_id));
								}

								else
								{
									$result = $wpdb->get_results($wpdb->prepare("SELECT name, slug FROM ".$wpdb->terms." WHERE term_id = '%d'", $term_id));

									foreach($result as $r)
									{
										$name = $r->name;
										$slug = $r->slug;

										$parent_slug = $wpdb->query($wpdb->prepare("SELECT slug FROM ".$wpdb->terms." INNER JOIN ".$wpdb->term_taxonomy." ON ".$wpdb->terms.".term_id = ".$wpdb->term_taxonomy.".parent WHERE ".$wpdb->term_taxonomy.".term_id = '%d'", $term_id));

										if($data['debug'] == true)
										{
											echo "<p><strong>".date("H:i:s")."</strong> Insert index ".$term_id."/".$name." to #".$post_id." (".get_the_title($post_id).")</p>";
										}

										$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix."wpgb_index SET object_id = '%d', slug = %s, facet_value = %s, facet_name = %s, facet_id = '%d'", $post_id, $parent_slug, $slug, $name, $term_id));
									}
								}
							}

							$this->arr_terms_id = array();
							##############################
						}
					}

					else
					{
						if(isset($arr_content['name']))
						{
							if($data['debug'] == true)
							{
								//echo "<p><strong>".date("H:i:s")."</strong> Get Company (".var_export($arr_content, true).")</p>";
							}

							$data_temp = $data;
							$data_temp['array'] = $arr_content;
							$this->get_company_item($data_temp);
						}

						else
						{
							if($data['debug'] == true)
							{
								echo "<p><strong>".date("H:i:s")."</strong> Get ".count($arr_content['_embedded']['limeobjects'])." Companies</p>";
							}

							$next_page = "";

							if(is_array($arr_content))
							{
								foreach($arr_content as $key => $arr_json)
								{
									/*"_links": 
									{
										"self": {"href": "[api_url]limeobject/company/"}, 
										"next": {"href": "[api_url]limeobject/company/?_offset=10"}
									}, 
									"_embedded": 
									{
										"limeobjects": 
										[
											{
												'name': '[text]', 'legalname' => '[text]', '_descriptive' => '[text]',
												'phone' => '[number]',	'phone2' => '',
												'www' => '[url]',
												'address' => '[text]', 'visitingaddress' => '[text]',
												'customerno' => '[number]',
												'registrationno' => '[osn]', 'gln' => '[osn]',
												'zipcode' => '[zipcode]',
												'city' => '[CITY]', 'searchcity' => '[CITY]', 'searchcity2' => '', 'searchcity3' => '',
												'visitingzipcode' => '[zipcode]', 'visitingcity' => '[CITY]',
												'relation' => array ( 'id' => [id], 'key' => '[id]', 'text' => 'Kund', ),
												'customertype' => array ( 'id' => [id], 'key' => '[id]', 'text' => '[text]', ),
												'memberno' => '[number]',
												'email' => '[email]',
												'active' => true,
												'invoiceaddress1' => '[text]','invoiceaddress2' => '[zipcode] [CITY]',
												'deliveryaddress1' => '[text]','deliveryaddress2' => '[zipcode] [CITY]',
												'properties' => array ( ),
												'address2' => '', 'visitingaddress2' => '', 'invoiceaddress3' => '', 'deliveryaddress3' => '',
												'description' => '[text]',
												'map_long' => '17.6386409', 'map_lat' => '59.8569079',
												'pricelist' => array ( 'id' => [id], 'key' => '1', 'text' => 'Guldmedlem', ),
												'hideweb' => true,
												'region' => 1004,
												'companytype' => array ( 'id' => [id], 'key' => 'FMG', 'text' => 'F�retagsmedlem Guld', ),
												'creditlimit' => 30000,
												'ismember' => true, 'iscustomer' => true,
												'companycolor' => array ( 'id' => [id], 'key' => '[id]', 'text' => 'Kund & Medlem', ),
												'teachercount' => 5,
												'edi' => array ( 'id' => [id], 'key' => 'INVOICGB', 'text' => 'INVOICGB', ),
												'iaid_member' => 'SVTRAFIKRIKSF_NYBRONSTRAFIKSK', 'iaid_service' => 'STRSERVICE_NYBRONSTRAFIKSK',
												'blanket_version' => 'E',
												'updated_website' => '2023-05-04T00:00:00+02:00',
												'_id' => 19401,
												'_links' => array (
													...
													'self' => array ( 'href' => '[api_url]limeobject/company/842501/', ), 
													...
													'relation_propertylink' => array ( 'href' => '[api_url]limeobject/company/19401/propertylink/', 'name' => 'propertylink', ),
													...
												),
											}
										]
									}*/

									switch($key)
									{
										case '_links':
											if(isset($arr_json['next']['href']))
											{
												$next_page = $arr_json['next']['href'];
											}
										break;

										case '_embedded':
											foreach($arr_json as $key => $arr_embedded)
											{
												if($key == 'limeobjects')
												{
													if($data['debug'] == true)
													{
														//echo "<p><strong>".date("H:i:s")."</strong> Get ".count($arr_embedded)." Companies...</p>";
													}

													foreach($arr_embedded as $key => $arr_item)
													{
														$data_temp = $data;
														$data_temp['array'] = $arr_item;
														$this->get_company_item($data_temp);
													}
												}
											}
										break;

										default:
											if($data['debug'] == true)
											{
												echo "<p><strong>".date("H:i:s")."</strong> Unknown key: ".$key."</p>";
											}
										break;
									}
								}
							}

							if($next_page != '')
							{
								$date_end = date("Y-m-d H:i:s");
								$time_difference = time_between_dates(array('start' => $data['date_start'], 'end' => $date_end, 'type' => 'ceil', 'return' => 'seconds'));

								if($time_difference < (6 * 60))
								{
									if(strpos($next_page, "_limit="))
									{
										$next_page_temp = preg_replace("/_limit=(.*?)&/", "_limit=".$data['limit_amount']."&", $next_page);

										if($next_page_temp != '')
										{
											$next_page = $next_page_temp;
										}
									}

									/*if($data['debug'] == true)
									{
										echo "<p><strong>".date("H:i:s")."</strong> Replace ".$next_page." -> ".$next_page_temp."</p>";
									}*/

									update_option('option_theme_educators_url', $next_page, 'no');

									$data_temp = $data;
									$data_temp['url'] = $next_page;
									$this->get_educators($data_temp);
								}

								else if($data['debug'] == true)
								{
									echo "<p><strong>".date("H:i:s")."</strong> Had to stop because it took ".$time_difference." seconds (".$data['date_start']." -> ".$date_end.") and I stopped at ".$data['url']."</p>";
								}
							}

							else
							{
								delete_option('option_theme_educators_url');
							}

							if($data['debug'] == true)
							{
								echo "<p><strong>".date("H:i:s")."</strong> Inserted: ".$this->insert_count.", Updated: ".$this->update_count.", Deleted: ".$this->delete_count.", Ignored: ".$this->ignore_count."</p>";

								$this->insert_count = $this->update_count = $this->delete_count = $this->ignore_count = 0;
							}
						}
					}

					do_log($log_message, 'trash');
				break;

				default:
					$log_message .= " -> ".$headers['http_code']." (".htmlspecialchars($content).")";
					//$log_message .= " + ".var_export($arr_headers, true)." -> ".var_export($headers, true)." (".htmlspecialchars($content).")";

					if($data['debug'] == true)
					{
						echo "<p><strong>".date("H:i:s")."</strong> ".$log_message."</p>";
					}

					else
					{
						do_log($log_message);
					}
				break;
			}
		}

		else
		{
			do_log("Lime API URL and API Key must be set in <a href='".admin_url("options-general.php?page=settings_mf_base#settings_theme_child")."'>".__("Settings", 'lang_bb-theme-child')."</a>");
		}
	}

	function insert_terms($data = array())
	{
		global $wpdb;

		if(!isset($data['debug'])){		$data['debug'] = false;}

		if($data['debug'] == true)
		{
			//echo "<p><strong>".date("H:i:s")."</strong> Taxonomy: ".$this->taxonomy_name."</p>";
		}

		$count_total = $count_main = (is_array($this->arr_classes) ? count($this->arr_classes) : 0);

		if($count_main > 0)
		{
			$terms_exists = $terms_added = 0;

			foreach($this->arr_classes as $arr_class)
			{
				$count_sub = (is_array($arr_class['services']) ? count($arr_class['services']) : 0);
				$count_total += $count_sub;

				if($count_sub > 0)
				{
					$term_id_parent = $this->get_term(array('name' => $arr_class['area'], 'debug' => $data['debug']));

					if($term_id_parent > 0)
					{
						if($data['debug'] == true)
						{
							echo "<p><strong>".date("H:i:s")."</strong> Term parent already exist: ".$arr_class['area']."</p>";
						}

						$this->update_term(array('term_id' => $term_id_parent, 'name' => $arr_class['area'], 'services' => $arr_class['services'], 'debug' => $data['debug']));

						$terms_exists++;
					}

					else
					{
						if($data['debug'] == true)
						{
							echo "<p><strong>".date("H:i:s")."</strong> Term parent does NOT exist: ".$arr_class['area']." (".$wpdb->last_query.")</p>";
						}

						$term_id_parent = $this->insert_term(array('name' => $arr_class['area'], 'services' => $arr_class['services'], 'debug' => $data['debug']));

						$terms_added++;
					}

					if($term_id_parent > 0)
					{
						foreach($arr_class['services'] as $arr_service)
						{
							$term_id = $this->get_term(array(
								'arr_service_id' => $arr_service['id'],
								'name' => $arr_service['name'],
								'parent' => $term_id_parent,
								'debug' => $data['debug']
							));

							if($term_id > 0)
							{
								if($data['debug'] == true)
								{
									echo "<p><strong>".date("H:i:s")."</strong> Term already exist: ".$arr_class['area']." -> ".$arr_service['name']." -> ".$arr_service['id']." (".$term_id.", ".$term_id_parent.")</p>";
								}

								$this->update_term(array('term_id' => $term_id, 'arr_service_id' => $arr_service['id'], 'name' => $arr_service['name'], 'description' => $arr_service['description'], 'parent' => $term_id_parent, 'debug' => $data['debug']));

								$terms_exists++;
							}

							else
							{
								if($data['debug'] == true)
								{
									echo "<p><strong>".date("H:i:s")."</strong> Term does NOT exist: ".$arr_class['area']." -> ".$arr_service['name']." -> ".var_export($arr_service['id'], true)."</p>";
								}

								$this->insert_term(array('arr_service_id' => $arr_service['id'], 'name' => $arr_service['name'], 'description' => $arr_service['description'], 'parent' => $term_id_parent, 'debug' => $data['debug']));

								$terms_added++;
							}
						}
					}
				}
			}

			if($data['debug'] == true)
			{
				echo "<p><strong>".date("H:i:s")."</strong> ".$terms_added." added and ".$terms_exists." already exists of ".$count_total."</p>";
			}
		}

		else if($data['debug'] == true)
		{
			echo "<p><strong>".date("H:i:s")."</strong> There are no classes: ".var_export($this->arr_classes, true)."</p>";
		}
	}

	function cron_base()
	{
		$obj_cron = new mf_cron();
		$obj_cron->start(__CLASS__);

		if($obj_cron->is_running == false)
		{
			// Get order that has not been sent to Optima
			#########################
			global $wpdb;

			$setting_theme_child_send_to_optima = get_option('setting_theme_child_send_to_optima');

			if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
			{
				$result = $wpdb->get_results($wpdb->prepare("SELECT ".$wpdb->prefix."wc_orders.id FROM ".$wpdb->prefix."wc_orders LEFT JOIN ".$wpdb->prefix."wc_orders_meta ON ".$wpdb->prefix."wc_orders.id = ".$wpdb->prefix."wc_orders_meta.order_id AND ".$wpdb->prefix."wc_orders_meta.meta_key = %s WHERE ".$wpdb->prefix."wc_orders.type = %s AND (".$wpdb->prefix."wc_orders.status = %s OR ".$wpdb->prefix."wc_orders.status = %s) AND ".$wpdb->prefix."wc_orders.date_updated_gmt < DATE_SUB(UTC_TIMESTAMP(), INTERVAL 15 MINUTE) AND ".$wpdb->prefix."wc_orders_meta.meta_value IS NULL ORDER BY id ASC LIMIT 0, 1", $this->meta_prefix.'optima_post_data', 'shop_order', 'wc-processing', 'wc-cancelled'));
			}

			else
			{
				$result = $wpdb->get_results($wpdb->prepare("SELECT ID FROM ".$wpdb->posts." LEFT JOIN ".$wpdb->postmeta." ON ".$wpdb->posts.".ID = ".$wpdb->postmeta.".post_id AND meta_key = %s WHERE post_type = %s AND post_status = %s AND post_modified < DATE_SUB(NOW(), INTERVAL 15 MINUTE) AND post_modified > DATE_SUB(NOW(), INTERVAL 36 HOUR) AND meta_value IS null ORDER BY ID ASC LIMIT 0, 1", $this->meta_prefix.'optima_post_data', 'shop_order', 'wc-processing'));
			}

			foreach($result as $r)
			{
				if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
				{
					$log_message = "<a href='".admin_url("admin.php?page=wc-orders&action=edit&id=".$r->id)."'>".sprintf(__("The order %s was not sent to Optima", 'lang_bb-theme-child'), $r->id)."</a>";
				}

				else
				{
					$log_message = "<a href='".admin_url("post.php?post=".$r->ID."&action=edit")."'>".sprintf(__("The order %s was not sent to Optima", 'lang_bb-theme-child'), $r->ID)."</a>";
				}

				switch($setting_theme_child_send_to_optima)
				{
					case 'log':
						do_log($log_message, 'publish', false);
					break;

					case 'email':
						if(get_option('setting_theme_child_order_email_sent') < date("Y-m-d H:i:s", strtotime("-24 hour")))
						{
							$mail_to = get_option('setting_theme_child_send_to_optima_email');
							$mail_subject = $mail_content = $log_message;

							send_email(array('to' => $mail_to, 'subject' => $mail_subject, 'content' => $mail_content));

							update_option('setting_theme_child_order_email_sent', date("Y-m-d H:i:s"), 'no');
						}
					break;

					case 'api':
						$this->send_to_optima('completed', $r->ID, true);
					break;
				}
			}
			#########################

			$this->get_educators();
		}

		$obj_cron->end();
	}

	function admin_init()
	{
		global $pagenow, $wpdb;

		if($pagenow == 'options-general.php' && check_var('page') == 'settings_mf_base')
		{
			$theme_include_url = get_stylesheet_directory_uri()."/include/";

			mf_enqueue_script('script_bb_theme_child_wp', $theme_include_url."script_wp.js", array(
				'ajax_url' => admin_url('admin-ajax.php'),
			));
		}
	}

	function settings_theme_child()
	{
		$options_area_orig = $options_area = __FUNCTION__;

		// Generic
		############################
		add_settings_section($options_area, "", array($this, $options_area."_callback"), BASE_OPTIONS_PAGE);

		$arr_settings = array();
		$arr_settings['setting_theme_child_info'] = __("Lime", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_mode'] = __("Optima", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_ssn'] = __("Social Security Number", 'lang_bb-theme-child');

		show_settings_fields(array('area' => $options_area, 'object' => $this, 'settings' => $arr_settings));
		############################

		// Lime
		############################
		$options_area = $options_area_orig."_lime";

		add_settings_section($options_area, "", array($this, $options_area."_callback"), BASE_OPTIONS_PAGE);

		$arr_settings = array();
		$arr_settings['setting_theme_child_lime_api_url'] = __("API URL", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_lime_api_key'] = __("API Key", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_lime_assets_url'] = __("Assets URL", 'lang_bb-theme-child');

		$arr_settings['setting_theme_child_company'] = __("Company", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_company_id'] = __("Company ID", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_type'] = __("Type", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_debug'] = __("Test API", 'lang_bb-theme-child');

		show_settings_fields(array('area' => $options_area, 'object' => $this, 'settings' => $arr_settings));
		############################

		// Optima
		############################
		$options_area = $options_area_orig."_optima";

		add_settings_section($options_area, "", array($this, $options_area."_callback"), BASE_OPTIONS_PAGE);

		$arr_settings = array();
		$arr_settings['setting_theme_child_api_url_test'] = __("API URL", 'lang_bb-theme-child')." (".__("Test", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_api_name_test'] = __("API Key Name", 'lang_bb-theme-child')." (".__("Test", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_api_key_test'] = __("API Key", 'lang_bb-theme-child')." (".__("Test", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_api_url_live'] = __("API URL", 'lang_bb-theme-child')." (".__("Live", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_api_name_live'] = __("API Key Name", 'lang_bb-theme-child')." (".__("Live", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_api_key_live'] = __("API Key", 'lang_bb-theme-child')." (".__("Live", 'lang_bb-theme-child').")";

		$arr_settings['setting_theme_child_send_to_optima'] = __("Send to", 'lang_bb-theme-child');

		if(get_option('setting_theme_child_send_to_optima') == 'email')
		{
			$arr_settings['setting_theme_child_send_to_optima_email'] = __("E-mail", 'lang_bb-theme-child');
		}

		show_settings_fields(array('area' => $options_area, 'object' => $this, 'settings' => $arr_settings));
		############################

		// Shipping
		############################
		$options_area = $options_area_orig."_shipping";

		add_settings_section($options_area, "", array($this, $options_area."_callback"), BASE_OPTIONS_PAGE);

		$arr_settings = array();
		$arr_settings['setting_theme_child_shipping_order_limit'] = __("Free Shipping Order Limit", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_shipping_cost'] = __("Shipping Cost incl. VAT", 'lang_bb-theme-child');

		show_settings_fields(array('area' => $options_area, 'object' => $this, 'settings' => $arr_settings));
		############################
	}

	function settings_theme_child_callback()
	{
		$setting_key = get_setting_key(__FUNCTION__);

		echo settings_header($setting_key, __("Theme Child", 'lang_bb-theme-child'));
	}

		function setting_theme_child_info_callback()
		{
			global $wpdb;

			$result = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title, post_modified FROM ".$wpdb->posts." WHERE post_type = %s AND post_status = %s ORDER BY post_modified ASC LIMIT 0, 1", $this->post_type_instructor, 'publish'));

			foreach($result as $r)
			{
				echo "<p><i class='".($r->post_modified > date("Y-m-d H:i:s", strtotime("-1 day")) ? "fa fa-check green" : "fa fa-times red display_warning")."'></i> ".sprintf(__("The oldest instructor to be updated was %s (%s)", 'lang_bb-theme-child'), "<a href='/wp-admin/edit.php?s=".$r->post_title."&post_type=".$this->post_type_instructor."'>".$r->post_title."</a>", format_date($r->post_modified))."</p>";
			}

			$result = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title, post_modified FROM ".$wpdb->posts." WHERE post_type = %s AND post_status = %s ORDER BY post_modified DESC LIMIT 0, 1", $this->post_type_instructor, 'publish'));

			foreach($result as $r)
			{
				echo "<p><i class='".($r->post_modified > date("Y-m-d H:i:s", strtotime("-1 day")) ? "fa fa-check green" : "fa fa-times red display_warning")."'></i> ".sprintf(__("The newest instructor to be updated was %s (%s)", 'lang_bb-theme-child'), "<a href='/wp-admin/edit.php?s=".$r->post_title."&post_type=".$this->post_type_instructor."'>".$r->post_title."</a>", format_date($r->post_modified))."</p>";
			}
		}

		function setting_theme_child_mode_callback()
		{
			global $wpdb;

			$woocommerce_dibs_easy_settings = get_option('woocommerce_dibs_easy_settings');

			$site_url = ($wpdb->blogid > 0 ? get_home_url($wpdb->blogid) : get_home_url());
			$site_url_clean = remove_protocol(array('url' => $site_url, 'clean' => true));

			echo "<p>";

				if($site_url_clean == "staging.korkort.nu" && $woocommerce_dibs_easy_settings['test_mode'] == 'yes' || $site_url_clean == "korkort.nu" && $woocommerce_dibs_easy_settings['test_mode'] != 'yes')
				{
					echo "<i class='fa fa-check green'></i> ";
				}

				else
				{
					echo "<i class='fa fa-times red display_warning'></i> ";
				}

				switch($woocommerce_dibs_easy_settings['test_mode'])
				{
					case 'yes':
						echo sprintf(__("The site URL is %s and test mode is activated", 'lang_bb-theme-child'), $site_url_clean);
					break;

					default:
						echo "<a href='".admin_url("admin.php?page=wc-settings&tab=checkout&section=dibs_easy")."'>".sprintf(__("The site URL is %s and test mode is NOT activated", 'lang_bb-theme-child'), $site_url_clean)."</a>";
					break;
				}

			echo "</p>";
		}

		function setting_theme_child_ssn_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('name' => $setting_key, 'value' => $option, 'placeholder' => __("YYMMDDXXXX", 'lang_bb-theme-child'), 'xtra' => "maxlength='13'"))
			."<div".get_form_button_classes().">"
				.show_button(array('type' => 'button', 'name' => 'btnDebugSSNRun', 'text' => __("Run Now", 'lang_bb-theme-child'), 'class' => 'button-secondary', 'xtra' => " rel='debug_ssn_run'"))
			."</div>
			<div id='debug_ssn_run'></div>";
		}

	function settings_theme_child_lime_callback()
	{
		$setting_key = get_setting_key(__FUNCTION__);

		echo settings_header($setting_key, __("Theme Child", 'lang_bb-theme-child')." - ".__("Lime", 'lang_bb-theme-child'));
	}

		function setting_theme_child_lime_api_url_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('type' => 'url', 'name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_lime_api_key_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_lime_assets_url_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('type' => 'url', 'name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_company_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			$arr_data_instructors = array();
			get_post_children(array('post_type' => $this->post_type_instructor, 'order_by' => 'post_title', 'add_choose_here' => true), $arr_data_instructors);

			echo show_select(array('data' => $arr_data_instructors, 'name' => $setting_key, 'value' => $option, 'suffix' => get_option_page_suffix(array('value' => $option))));
		}

		function setting_theme_child_company_id_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_type_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			$arr_data_types = array(
				'company' => __("Company", 'lang_bb-theme-child'),
				'properties' => __("Properties", 'lang_bb-theme-child'),
				'terms' => __("Terms", 'lang_bb-theme-child'),
			);

			echo show_select(array('data' => $arr_data_types, 'name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_debug_callback()
		{
			echo "<div".get_form_button_classes().">"
				.show_button(array('type' => 'button', 'name' => 'btnDebugLimeRun', 'text' => __("Run Now", 'lang_bb-theme-child'), 'class' => 'button-secondary', 'xtra' => " rel='debug_lime_run'"))
			."</div>
			<div id='debug_lime_run'></div>";

			$option_theme_educators_url = get_option('option_theme_educators_url');

			if($option_theme_educators_url != '')
			{
				echo "<p>".__("Last call", 'lang_bb-theme-child').": ".$option_theme_educators_url."</p>";
			}
		}

	function settings_theme_child_optima_callback()
	{
		$setting_key = get_setting_key(__FUNCTION__);

		echo settings_header($setting_key, __("Theme Child", 'lang_bb-theme-child')." - ".__("Optima", 'lang_bb-theme-child'));
	}

		function setting_theme_child_api_url_test_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('type' => 'url', 'name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_api_name_test_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_api_key_test_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_api_url_live_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('type' => 'url', 'name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_api_name_live_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_api_key_live_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_send_to_optima_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			$arr_data = array(
				'' => "-- ".__("Choose Here", 'lang_bb-theme-child')." --",
				'log' => __("Log", 'lang_bb-theme-child'),
				'email' => __("E-mail", 'lang_bb-theme-child'),
				'api' => __("API", 'lang_bb-theme-child'),
			);

			echo show_select(array('data' => $arr_data, 'name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_send_to_optima_email_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('type' => 'email', 'name' => $setting_key, 'value' => $option));
		}

	function settings_theme_child_shipping_callback()
	{
		$setting_key = get_setting_key(__FUNCTION__);

		echo settings_header($setting_key, __("Theme Child", 'lang_bb-theme-child')." - ".__("Shipping", 'lang_bb-theme-child'));
	}

		function setting_theme_child_shipping_order_limit_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('type' => 'number', 'name' => $setting_key, 'value' => $option));
		}

		function setting_theme_child_shipping_cost_callback()
		{
			$setting_key = get_setting_key(__FUNCTION__);
			$option = get_option($setting_key);

			echo show_textfield(array('type' => 'number', 'name' => $setting_key, 'value' => $option));
		}

	function column_header($columns)
	{
		global $post_type;

		$page = check_var('page');

		if(get_option('woocommerce_custom_orders_table_enabled') == 'yes' && $page == 'wc-orders' || $post_type == $this->post_type_shop_order)
		{
			$columns['optima_http_code'] = __("Optima", 'lang_bb-theme-child');
		}

		return $columns;
	}

	function format_post_data($data)
	{
		$arr_exclude = $arr_include = array();
		$arr_exclude[] = "\t";					$arr_include[] = "";
		$arr_exclude[] = "\r";					$arr_include[] = "";
		$arr_exclude[] = "\n";					$arr_include[] = "";
		$arr_exclude[] = " ";					$arr_include[] = "";
		$arr_exclude[] = "'";					$arr_include[] = '"';
		$arr_exclude[] = "},]";					$arr_include[] = "}]";
		$arr_exclude[] = '"quantity":"1"';		$arr_include[] = '"quantity":1';

		$data = str_replace($arr_exclude, $arr_include, $data);

		return $data;
	}

	function column_cell($column, $post_id)
	{
		if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
		{
			switch($column)
			{
				case 'optima_http_code':
					$arr_order = $post_id;
					$post_id = $arr_order->get_id();

					list($success, $post_data_send) = $this->get_post_data(array('order_id' => $post_id));
					$post_data_send = $this->format_post_data($post_data_send);

					$arr_post_data = $arr_order->get_meta($this->meta_prefix.'optima_post_data', true);

					$post_data_status = 'unknown';
					$post_data_sent_title = $http_code = "";

					if(is_array($arr_post_data) && count($arr_post_data) > 0)
					{
						foreach($arr_post_data as $post_data)
						{
							while(isset($post_data[0]))
							{
								$post_data = $post_data[0];
							}

							$post_data_temp = $this->format_post_data($post_data['data']);
							$http_code = $post_data['http_code'];
							$user_id = (isset($post_data['user']) ? $post_data['user'] : 0);
							$created = (isset($post_data['created']) && $post_data['created'] > DEFAULT_DATE ? format_date($post_data['created']) : "[?]");

							$user_name = ($user_id > 0 ? get_user_info(array('id' => $user_id)) : __("Unknown", 'lang_bb-theme-child'));

							$post_data_sent_title .= ($post_data_sent_title != '' ? "\n" : "").sprintf(__("Created %s by %s and got the answer %d", 'lang_bb-theme-child'), $created, $user_name, $http_code);

							if($post_data_temp == $post_data_send)
							{
								$post_data_status = 'correct';
							}

							else if($post_data_temp != '')
							{
								$post_data_status = 'old_format';
								$post_data_sent_title .= "\n".$post_data_temp;
							}

							else
							{
								$post_data_status = 'incorrect';
								$post_data_sent_title .= "\n".$post_data_temp;
							}

							if(!isset($post_data['data']))
							{
								$post_data_sent_title .= "\n".var_export($post_data, true);
							}
						}
					}

					else if($arr_post_data != '')
					{
						$post_data_temp = $this->format_post_data($arr_post_data);
						$http_code = $arr_order->get_meta($this->meta_prefix.'optima_http_code', true);

						if($post_data_temp == $post_data_send)
						{
							$post_data_status = 'correct';
						}

						else if($post_data_temp != '')
						{
							$post_data_status = 'old_format';
							$post_data_sent_title .= "\n".$post_data_temp;
						}

						else
						{
							$post_data_status = 'incorrect';
							$post_data_sent_title .= $post_data_temp;
						}
					}

					if($post_data_sent_title != '')
					{
						switch($post_data_status)
						{
							case 'correct':
								echo "<i class='fa fa-check green' title='".$post_data_sent_title."'></i>";
							break;

							case 'old_format':
								echo "<i class='fa fa-check grey' title='".$post_data_sent_title."'></i>";
							break;

							case 'incorrect':
								echo "<i class='fa fa-times red' title='".$post_data_sent_title."'></i>";
							break;

							default:
							case 'unknown':
								echo "<i class='far fa-question-circle grey' title='".$post_data_sent_title."'></i>";
							break;
						}
					}

					else
					{
						switch($http_code)
						{
							case 201:
								echo "<i class='fa fa-check green' title=\"".$http_code."\"></i>";
							break;

							case 401:
								echo "<i class='fa fa-times red' title=\"".$http_code."\"></i>";
							break;

							default:
								echo "<i class='far fa-question-circle grey' title=\"".$http_code."\"></i>";
							break;
						}
					}

					if(IS_SUPER_ADMIN)
					{
						echo " ";

						if(isset($_GET['resend_to_optima_'.$post_id]) && $post_id > 0 && wp_verify_nonce($_REQUEST['_wpnonce_optima_resend'], 'optima_resend_'.$post_id))
						{
							if($this->send_to_optima('completed', $post_id, true))
							{
								echo "<i class='fa fa-recycle green' title='".__("The information was successfully sent", 'lang_bb-theme-child')."'></i>";
							}

							else
							{
								echo "<i class='fa fa-recycle red' title='".__("The information could not be sent", 'lang_bb-theme-child')."'></i>";
							}
						}

						else
						{
							$post_search = check_var('s');
							$post_status = check_var('post_status');
							$post_paged = check_var('paged');

							if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
							{
								$link_url = "admin.php?page=wc-orders&resend_to_optima_".$post_id;
							}

							else
							{
								$link_url = "edit.php?post_type=".check_var('post_type')."&resend_to_optima_".$post_id;
							}

							if($post_search != '')
							{
								$link_url .= "&s=".$post_search;
							}

							if($post_status != '')
							{
								$link_url .= "&post_status=".$post_status;
							}

							if($post_paged > 0)
							{
								$link_url .= "&paged=".$post_paged;
							}

							echo "<a href='".wp_nonce_url($link_url, 'optima_resend_'.$post_id, '_wpnonce_optima_resend')."' rel='confirm'><i class='fa fa-recycle' title='".__("Send Again", 'lang_bb-theme-child').": ".$post_data_send."'></i></a>";
						}

						//$arr_order = wc_get_order($post_id);

						echo " <a href='".$arr_order->get_checkout_order_received_url()."'><i class='fas fa-vote-yea' title='".__("View Customer Checkout Page", 'lang_bb-theme-child')."'></i></a>";
					}
				break;
			}
		}

		else
		{
			global $post;

			switch($post->post_type)
			{
				case $this->post_type_shop_order:
					switch($column)
					{
						case 'optima_http_code':
							list($success, $post_data_send) = $this->get_post_data(array('order_id' => $post_id));
							$post_data_send = $this->format_post_data($post_data_send);

							$arr_post_data = get_post_meta($post_id, $this->meta_prefix.'optima_post_data', true);

							$post_data_status = 'unknown';
							$post_data_sent_title = $http_code = "";

							if(is_array($arr_post_data) && count($arr_post_data) > 0)
							{
								foreach($arr_post_data as $post_data)
								{
									while(isset($post_data[0]))
									{
										$post_data = $post_data[0];
									}

									$post_data_temp = $this->format_post_data($post_data['data']);
									$http_code = $post_data['http_code'];
									$user_id = (isset($post_data['user']) ? $post_data['user'] : 0);
									$created = (isset($post_data['created']) && $post_data['created'] > DEFAULT_DATE ? format_date($post_data['created']) : "[?]");

									$user_name = ($user_id > 0 ? get_user_info(array('id' => $user_id)) : __("Unknown", 'lang_bb-theme-child'));

									$post_data_sent_title .= ($post_data_sent_title != '' ? "\n" : "").sprintf(__("Created %s by %s and got the answer %d", 'lang_bb-theme-child'), $created, $user_name, $http_code);

									if($post_data_temp == $post_data_send)
									{
										$post_data_status = 'correct';
									}

									else if($post_data_temp != '')
									{
										$post_data_status = 'old_format';
										$post_data_sent_title .= "\n".$post_data_temp;
									}

									else
									{
										$post_data_status = 'incorrect';
										$post_data_sent_title .= "\n".$post_data_temp;
									}

									if(!isset($post_data['data']))
									{
										$post_data_sent_title .= "\n".var_export($post_data, true);
									}
								}
							}

							else if($arr_post_data != '')
							{
								$post_data_temp = $this->format_post_data($arr_post_data);
								$http_code = get_post_meta($post_id, $this->meta_prefix.'optima_http_code', true);
								//$user_id = $post_data['user_id'];
								//$created = $post_data['created'];

								if($post_data_temp == $post_data_send)
								{
									$post_data_status = 'correct';
								}

								else if($post_data_temp != '')
								{
									$post_data_status = 'old_format';
									$post_data_sent_title .= "\n".$post_data_temp;
								}

								else
								{
									$post_data_status = 'incorrect';
									$post_data_sent_title .= $post_data_temp;
								}
							}

							if($post_data_sent_title != '')
							{
								switch($post_data_status)
								{
									case 'correct':
										echo "<i class='fa fa-check green' title='".$post_data_sent_title."'></i>";
									break;

									case 'old_format':
										echo "<i class='fa fa-check grey' title='".$post_data_sent_title."'></i>";
									break;

									case 'incorrect':
										echo "<i class='fa fa-times red' title='".$post_data_sent_title."'></i>";
									break;

									default:
									case 'unknown':
										echo "<i class='far fa-question-circle grey' title='".$post_data_sent_title."'></i>";
									break;
								}
							}

							else
							{
								switch($http_code)
								{
									case 201:
										echo "<i class='fa fa-check green' title=\"".$http_code."\"></i>";
									break;

									case 401:
										echo "<i class='fa fa-times red' title=\"".$http_code."\"></i>";
									break;

									default:
										echo "<i class='far fa-question-circle grey' title=\"".$http_code."\"></i>";
									break;
								}
							}

							if(IS_SUPER_ADMIN)
							{
								echo " ";

								if(isset($_GET['resend_to_optima_'.$post_id]) && $post_id > 0 && wp_verify_nonce($_REQUEST['_wpnonce_optima_resend'], 'optima_resend_'.$post_id))
								{
									if($this->send_to_optima('completed', $post_id, true))
									{
										echo "<i class='fa fa-recycle green' title='".__("The information was successfully sent", 'lang_bb-theme-child')."'></i>";
									}

									else
									{
										echo "<i class='fa fa-recycle red' title='".__("The information could not be sent", 'lang_bb-theme-child')."'></i>";
									}
								}

								else
								{
									$post_search = check_var('s');
									$post_status = check_var('post_status');
									$post_paged = check_var('paged');

									if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
									{
										$link_url = "admin.php?page=wc-orders&resend_to_optima_".$post_id;
									}

									else
									{
										$link_url = "edit.php?post_type=".check_var('post_type')."&resend_to_optima_".$post_id;
									}

									if($post_search != '')
									{
										$link_url .= "&s=".$post_search;
									}

									if($post_status != '')
									{
										$link_url .= "&post_status=".$post_status;
									}

									if($post_paged > 0)
									{
										$link_url .= "&paged=".$post_paged;
									}

									echo "<a href='".wp_nonce_url($link_url, 'optima_resend_'.$post_id, '_wpnonce_optima_resend')."' rel='confirm'><i class='fa fa-recycle' title='".__("Send Again", 'lang_bb-theme-child').": ".$post_data_send."'></i></a>";
								}

								$arr_order = wc_get_order($post_id);

								echo " <a href='".$arr_order->get_checkout_order_received_url()."'><i class='fas fa-vote-yea' title='".__("View Customer Checkout Page", 'lang_bb-theme-child')."'></i></a>";
							}
						break;
					}
				break;
			}
		}
	}

	function get_group_sync_type($arr_data)
	{
		$arr_data['woocommerce_customers'] = __("WooCommerce Customers", 'lang_bb-theme-child');

		return $arr_data;
	}

	function woocommerce_product_options_general_product_data()
	{
		$post_id = check_var('post', 'int');

		woocommerce_wp_select(array(
			'id' => $this->meta_prefix.'display_ssn',
			'label' => __("Display Social Security Number", 'lang_bb-theme-child'),
			'options' => array(
				'' => "-- ".__("Choose Here", 'lang_bb-theme-child')." --",
                'yes' => __("Yes", 'lang_bb-theme-child'),
                'no' => __("No", 'lang_bb-theme-child'),
            ),
			'value' => get_post_meta_or_default($post_id, $this->meta_prefix.'display_ssn', true, 'yes')
		));

		// woocommerce_wp_text_input, woocommerce_wp_textarea_input, woocommerce_wp_checkbox, woocommerce_wp_hidden_input
	}

	function woocommerce_process_product_meta($post_id)
	{
		$post_meta = sanitize_text_field(check_var($this->meta_prefix.'display_ssn'));

		if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
		{
			$arr_order = wc_get_order($post_id);

			if($arr_order != false)
			{
				$arr_order->update_meta_data($this->meta_prefix.'display_ssn', $post_meta);

				$arr_order->save_meta_data();
			}
		}

		update_post_meta($post_id, $this->meta_prefix.'display_ssn', $post_meta);
	}

	function get_group_sync_addresses($arr_addresses, $sync_type)
	{
		global $wpdb;

		switch($sync_type)
		{
			case 'woocommerce_customers':
				$result = $wpdb->get_results($wpdb->prepare("SELECT ID, meta_value FROM ".$wpdb->posts." INNER JOIN ".$wpdb->postmeta." ON ".$wpdb->posts.".ID = ".$wpdb->postmeta.".post_id WHERE post_type = %s AND meta_key = %s GROUP BY meta_value", $this->post_type_shop_order, '_billing_email'));

				foreach($result as $r)
				{
					$arr_addresses[] = array(
						'email' => $r->meta_value,
						'first_name' => get_post_meta($r->ID, '_billing_first_name', true),
						'sur_name' => get_post_meta($r->ID, '_billing_last_name', true),
					);
				}
			break;
		}

		return $arr_addresses;
	}

	function wp_head()
	{
		global $post;

		$theme_include_url = get_stylesheet_directory_uri()."/include/";

		mf_enqueue_style('bb-theme-child-style', $theme_include_url."style.css");

		if(isset($post->post_type) && $post->post_type == $this->post_type_instructor)
		{
			mf_enqueue_script('script_bb_theme_instructor', $theme_include_url."script_instructor.js");
		}
	}

	function woocommerce_cart_shipping_method_full_label($label, $method)
	{
		$label = preg_replace('/^.+:/', '', $label);
		$label = str_replace($method->get_label(), "", $label);

		return $label;
	}

	function get_shipping_tax()
	{
		global $wpdb;

		$setting_theme_child_shipping_cost = get_option('setting_theme_child_shipping_cost');

		$tax_rate = $wpdb->get_var($wpdb->prepare("SELECT tax_rate FROM ".$wpdb->prefix."woocommerce_tax_rates WHERE tax_rate_class = %s", get_option('woocommerce_shipping_tax_class')));
		$shipping_tax_rate = (1 + ($tax_rate / 100));

		return ($setting_theme_child_shipping_cost - ($setting_theme_child_shipping_cost / $shipping_tax_rate));
	}

	function woocommerce_package_rates($rates, $package)
	{
		global $wpdb;

		$has_physical_products = false;

		foreach(WC()->cart->get_cart() as $cart_item)
		{
			$product_virtual = get_post_meta($cart_item['product_id'], '_virtual', true);

			if($product_virtual == 'no')
			{
				$has_physical_products = true;
				break;
			}
		}

		$cart_total = WC()->cart->subtotal;

		if($cart_total <= get_option('setting_theme_child_shipping_order_limit') && $has_physical_products == true)
		{
			foreach($rates as $rate_key => $rate)
			{
				$extra_cost = (get_option('setting_theme_child_shipping_cost') - $this->get_shipping_tax());
				$rates[$rate_key]->cost += $extra_cost;

				$arr_taxes = $rate->get_taxes();

				if(empty($arr_taxes))
				{
					$result = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id, tax_rate FROM ".$wpdb->prefix."woocommerce_tax_rates WHERE tax_rate_class = %s", get_option('woocommerce_shipping_tax_class')));

					foreach($result as $r)
					{
						$arr_taxes[$r->tax_rate_id] = ($extra_cost * ($r->tax_rate / 100));
					}
				}

				else
				{
					foreach($arr_taxes as $tax_id => $tax_amount)
					{
						$tax_rate = WC_Tax::get_rate_percent($tax_id);
						$arr_taxes[$tax_id] += ($extra_cost * ($tax_rate / 100));
					}
				}

				$rate->set_taxes($arr_taxes);
			}
		}

		return $rates;
	}

	function get_shipping_label()
	{
		global $wpdb;

		$out = "";

		$result = $wpdb->get_results($wpdb->prepare("SELECT instance_id, method_id FROM ".$wpdb->prefix."woocommerce_shipping_zone_methods WHERE is_enabled = '%d'", 1));

		foreach($result as $r)
		{
			$arr_value = get_option('woocommerce_'.$r->method_id.'_'.$r->instance_id.'_settings');

			$out = $arr_value['title'];
		}

		return $out;
	}

	function order_has_shipping($value)
	{
		global $wpdb;

		$this->order_has_shipping = true;

		if($value == $this->get_shipping_label() || $value == 0)
		{
			$this->order_has_shipping = false;
		}
	}

	function get_raw_price($html)
	{
		$woocommerce_price_decimal_sep = get_option('woocommerce_price_decimal_sep');
		$woocommerce_price_thousand_sep = get_option('woocommerce_price_thousand_sep');

		preg_match("/>(.*?)&nbsp;(<span class=\"woocommerce-Price-currencySymbol\">.*?<\/span>)</", $html, $arr_tax_value);

		if(!isset($arr_tax_value[1]))
		{
			//do_log(__FUNCTION__." Error: No #1 value in ".htmlspecialchars($html));

			$arr_tax_value = array(
				1 => 0,
				2 => "",
			);
		}

		else
		{
			$arr_tax_value[1] = str_replace($woocommerce_price_decimal_sep, ".", $arr_tax_value[1]);
			$arr_tax_value[1] = str_replace($woocommerce_price_thousand_sep, "", $arr_tax_value[1]);
			$arr_tax_value[1] = str_replace("<bdi>", "", $arr_tax_value[1]);
		}

		return array(floatval($arr_tax_value[1]), $arr_tax_value[2]);
	}

	function get_html_price($price, $suffix)
	{
		$woocommerce_price_num_decimals = get_option('woocommerce_price_num_decimals');
		$woocommerce_price_decimal_sep = get_option('woocommerce_price_decimal_sep');
		$woocommerce_price_thousand_sep = get_option('woocommerce_price_thousand_sep');

		return number_format($price, $woocommerce_price_num_decimals, $woocommerce_price_decimal_sep, $woocommerce_price_thousand_sep)."&nbsp;".$suffix;
	}

	function get_shipping_html()
	{
		$out = "";

		$get_cart_shipping_total = WC()->cart->get_cart_shipping_total();

		list($price, $suffix) = $this->get_raw_price($get_cart_shipping_total);

		$this->order_has_shipping($price);

		if($price > 0)
		{
			$out = "<tr class='woocommerce-shipping-totals shipping'>
				<th>".$this->get_shipping_label()."</th>
				<td>".$get_cart_shipping_total."</td>
			</tr>";
		}

		return $out;
	}

	function get_order_detail_row($order_id, $key, $total)
	{
		global $wpdb;

		$out = "";

		switch($key)
		{
			/*case 'order_total':
				$out .= preg_replace("/<small class=\"includes_tax\">(.*?)<\/small>/i", "", wp_kses_post($total['value']));
			break;*/

			case 'payment_method':
				$out .= esc_html($total['value']);

				$dibs_payment_method = get_post_meta($order_id, 'dibs_payment_method', true);

				if($dibs_payment_method != '')
				{
					$out .= " - ".$dibs_payment_method;
				}
			break;

			case 'shipping':
				$total['value'] = preg_replace("/<small class=\"shipped_via\">(.*?)<\/small>/i", "", wp_kses_post($total['value']));

				$this->order_has_shipping($total['value']);

				if($this->order_has_shipping == false)
				{
					$total['value'] = "";
				}

				$out .= $total['value'];
			break;

			case 'tax':
				$total['value'] = wp_kses_post($total['value']);
				list($price, $suffix) = $this->get_raw_price($total['value']);

				if($this->order_has_shipping == true)
				{
					$price += $this->get_shipping_tax();
				}

				$out .= $this->get_html_price($price, $suffix);
			break;

			case 'cart_subtotal':
				// Do nothing...
			break;

			default:
				$out .= wp_kses_post($total['value']);
			break;
		}

		return $out;
	}

	function woocommerce_checkout_fields($fields)
	{
		//$fields['order']['order_comments']['placeholder'] = 'My new placeholder';
		//$fields['order']['order_comments']['label'] = 'My new label';

		unset($fields['order']['order_comments']);

		return $fields;
	}

	function calculate_ssn_check_number($personal_numbers)
	{
		$weight = array(2, 1, 2, 1, 2, 1, 2, 1, 2);
		$sum = 0;

		for($i = 0; $i < 9; $i++)
		{
			$number_temp = substr($personal_numbers, $i, 1);

			if(!is_numeric($number_temp))
			{
				do_log(__FUNCTION__." - Not a number: ".$personal_numbers."[".$i."] -> ".$number_temp);
			}

			$product = ($number_temp * $weight[$i]);
			$sum += (floor($product / 10) + $product % 10);
		}

		return ((10 - ($sum % 10)) % 10);
	}

	function check_product_ssn($product_ssn)
	{
		$out = "";

		if(strpos($product_ssn, "-"))
		{
			list($product_ssn_date, $product_ssn_numbers) = explode("-", $product_ssn);

			if(strlen($product_ssn_numbers) > 4)
			{
				$out = sprintf(__("Please enter a Social Security Number according to the format YYMMDDXXXX with only ten digits. You entered a number with %d digits.", 'lang_bb-theme-child'), strlen($product_ssn));

				if(IS_SUPER_ADMIN)
				{
					$out .= " (".$product_ssn." -> ".strlen($product_ssn).")";
				}
			}

			else
			{
				$product_ssn = $product_ssn_date.$product_ssn_numbers;
			}
		}

		if(strlen($product_ssn) > 12)
		{
			$out = sprintf(__("Please enter a Social Security Number according to the format YYMMDDXXXX with only ten digits. You entered a number with %d digits.", 'lang_bb-theme-child'), strlen($product_ssn));

			if(IS_SUPER_ADMIN)
			{
				$out .= " (".$product_ssn." -> ".strlen($product_ssn).")";
			}
		}

		if(strlen($product_ssn) > 10)
		{
			if(substr($product_ssn, 0, 4) >= date("Y"))
			{
				$out = sprintf(__("Please enter a Social Security Number with a birth year that is in the past.", 'lang_bb-theme-child'), strlen($product_ssn));

				if(IS_SUPER_ADMIN)
				{
					$out .= " (".$product_ssn." -> ".strlen($product_ssn).")";
				}
			}

			else if(substr($product_ssn, 0, 2) >= 19)
			{
				$product_ssn = substr($product_ssn, 2);
			}

			else
			{
				$out = sprintf(__("Please enter a Social Security Number according to the format YYMMDDXXXX with only ten digits. You entered a number with %d digits.", 'lang_bb-theme-child'), strlen($product_ssn));

				if(IS_SUPER_ADMIN)
				{
					$out .= " (".$product_ssn." -> ".strlen($product_ssn).")";
				}
			}
		}

		$product_ssn_year = substr($product_ssn, 0, 2);
		$product_ssn_date = ($product_ssn_year >= date("y") ? "19" : "20").substr($product_ssn, 0, 6);

		$personal_numbers = substr($product_ssn, 0, 9);
		$check_number = substr($product_ssn, 9, 1);

		/*if($out == '' && strlen($product_ssn) != 10)
		{
			$out = sprintf(__("Please enter a Social Security Number according to the format YYMMDDXXXX with only ten digits. You entered a number with %d digits.", 'lang_bb-theme-child'), strlen($product_ssn));

			if(IS_SUPER_ADMIN)
			{
				$out .= " (".$product_ssn." -> ".strlen($product_ssn).")";
			}
		}*/

		if($out == '' && !ctype_digit($product_ssn))
		{
			$out = __("Please enter a Social Security Number with only digits in it", 'lang_bb-theme-child');

			if(IS_SUPER_ADMIN)
			{
				$out .= " (".($product_ssn != '' ? $product_ssn : "<em>".__("empty", 'lang_bb-theme-child')."</em>").")";
			}
		}

		if($out == '' && $product_ssn_date != date("Ymd", strtotime($product_ssn_date)))
		{
			$out = __("Please enter a Social Security Number with a correct YYMMDD", 'lang_bb-theme-child');

			if(IS_SUPER_ADMIN)
			{
				$out .= " (".$product_ssn." -> ".$product_ssn_date." != ".date("Ymd", strtotime($product_ssn_date)).")";
			}
		}

		if($out == '' && $check_number != $this->calculate_ssn_check_number($personal_numbers))
		{
			$out = __("Please enter a Social Security Number with the correct last check number", 'lang_bb-theme-child');

			if(IS_SUPER_ADMIN)
			{
				$out .= " (".$product_ssn." -> ".$check_number." != ".$this->calculate_ssn_check_number($personal_numbers).")";
			}
		}

		if($out != '')
		{
			global $product_title_temp;

			if($product_title_temp != '')
			{
				$out .= " (".$product_title_temp.")";
			}
		}

		return $out;
	}

	function run_checkout_part($data)
	{
		global $woocommerce;

		$arr_item_data = array();
		$out_physical = $out_software = "";

		foreach($woocommerce->cart->get_cart() as $item_key => $arr_item)
		{
			$product_id = $arr_item['product_id'];
			$variation_id = $arr_item['variation_id'];
			$quantity = $arr_item['quantity'];

			for($i = 1; $i <= $quantity; $i++)
			{
				if($variation_id > 0)
				{
					$product_virtual = get_post_meta($variation_id, '_virtual', true);
					$product_downloadable = get_post_meta($variation_id, '_downloadable', true);

					$product_title = mf_get_post_content($variation_id, 'post_title');

					$item_id = $product_id."_v".$variation_id;
				}

				else
				{
					$product_virtual = get_post_meta($product_id, '_virtual', true);
					$product_downloadable = get_post_meta($product_id, '_downloadable', true);

					$product_title = mf_get_post_content($product_id, 'post_title');

					$item_id = $product_id;
				}

				if($i > 1)
				{
					$item_id .= "_".$i;
				}

				if($product_virtual == 'yes' || $product_downloadable == 'yes')
				{
					$product_title_temp = $product_title;

					if($quantity > 1)
					{
						$product_title_temp .= " (".$i.")";
					}

					$post_meta_display_ssn = get_post_meta_or_default($product_id, $this->meta_prefix.'display_ssn', true, 'yes');

					switch($data['type'])
					{
						case 'display':
							$out_software .= "<h3><a href='".get_permalink($product_id)."'>".$product_title_temp."</a></h3>"
							."<p>".sprintf(__("Enter the details of the person who will use %s below", 'lang_bb-theme-child'), $product_title_temp)."</p>";

							if($post_meta_display_ssn == 'yes')
							{
								$out_software .= show_textfield(array('name' => $this->meta_prefix.'ssn_'.$item_id, 'text' => __("Social Security Number", 'lang_bb-theme-child'), 'value' => check_var($this->meta_prefix.'ssn_'.$item_id, 'soc'), 'placeholder' => __("YYMMDDXXXX", 'lang_bb-theme-child'), 'required' => true, 'xtra' => "maxlength='13'"));
							}

							$out_software .= "<div class='flex_flow'>"
								.show_textfield(array('type' => 'tel', 'name' => $this->meta_prefix.'phone_'.$item_id, 'text' => __("Mobile Number", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value($this->meta_prefix.'phone_'.$item_id), 'placeholder' => __("to the user", 'lang_bb-theme-child')))
								.show_textfield(array('type' => 'email', 'name' => $this->meta_prefix.'email_'.$item_id, 'text' => __("E-mail", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value($this->meta_prefix.'email_'.$item_id), 'placeholder' => __("to the user", 'lang_bb-theme-child')))
							."</div>";
						break;

						case 'validate':
							if($post_meta_display_ssn == 'yes')
							{
								$product_ssn = check_var($this->meta_prefix.'ssn_'.$item_id, 'soc');

								$ssn_error = $this->check_product_ssn($product_ssn);

								if($ssn_error != '')
								{
									wc_add_notice($ssn_error, 'error');

									break 3;
								}

								else if(check_var($this->meta_prefix.'phone_'.$item_id, 'telno') == '' && check_var($this->meta_prefix.'email_'.$item_id, 'email') == '')
								{
									wc_add_notice(__("Please enter a Phone Number or E-mail Address", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

									break 3;
								}

								else
								{
									$product_phone = check_var($this->meta_prefix.'phone_'.$item_id, 'telno');
									$product_email = check_var($this->meta_prefix.'email_'.$item_id, 'email');

									if($product_email != '')
									{
										if(!is_domain_valid($product_email))
										{
											wc_add_notice(__("Please enter a valid E-mail Address. The one you entered does not seam to be correct", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

											break 3;
										}
									}

									if(isset($arr_item_data[$product_ssn]))
									{
										if($product_phone != $arr_item_data[$product_ssn]['phone'])
										{
											wc_add_notice(__("The Social Security Number and Phone Number does not match on all products. If you enter the same Social Security Number on several products, you can't enter different Phone Numbers on those products.", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

											break 3;
										}

										else if($product_email != $arr_item_data[$product_ssn]['email'])
										{
											wc_add_notice(__("The Social Security Number and E-mail Address does not match on all products. If you enter the same Social Security Number on several products, you can't enter different E-mail Addresses on those products.", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

											break 3;
										}
									}

									else
									{
										$arr_item_data[$product_ssn] = array(
											'phone' => $product_phone,
											'email' => $product_email,
										);
									}
								}
							}

							else if(check_var($this->meta_prefix.'phone_'.$item_id, 'telno') == '' && check_var($this->meta_prefix.'email_'.$item_id, 'email') == '')
							{
								wc_add_notice(__("Please enter a Phone Number or E-mail Address", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

								break 3;
							}
						break;

						case 'save':
							$product_ssn = check_var($this->meta_prefix.'ssn_'.$item_id, 'soc');
							$product_phone = check_var($this->meta_prefix.'phone_'.$item_id, 'telno');
							$product_email = check_var($this->meta_prefix.'email_'.$item_id, 'email');

							if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
							{
								$arr_order = wc_get_order($data['order_id']);

								if($post_meta_display_ssn == 'yes')
								{
									$arr_order->update_meta_data($this->meta_prefix.'ssn_'.$item_id, $product_ssn);
								}

								$arr_order->update_meta_data($this->meta_prefix.'phone_'.$item_id, $product_phone);
								$arr_order->update_meta_data($this->meta_prefix.'email_'.$item_id, $product_email);

								$arr_order->save_meta_data();
							}

							if($post_meta_display_ssn == 'yes')
							{
								update_post_meta($data['order_id'], $this->meta_prefix.'ssn_'.$item_id, $product_ssn);
							}

							update_post_meta($data['order_id'], $this->meta_prefix.'phone_'.$item_id, $product_phone);
							update_post_meta($data['order_id'], $this->meta_prefix.'email_'.$item_id, $product_email);
						break;
					}
				}

				else
				{
					switch($data['type'])
					{
						case 'display':
							$out_physical = "<h2>".__("Ship to a different address?", 'lang_bb-theme-child')."</h2>
							<div class='mf_form'>"
								."<div class='flex_flow'>"
									.show_textfield(array('name' => '_shipping_first_name', 'text' => __("First Name", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value('_shipping_first_name')))
									.show_textfield(array('name' => '_shipping_last_name', 'text' => __("Last Name", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value('_shipping_last_name')))
								."</div>"
								.show_textfield(array('name' => '_shipping_address_1', 'text' => __("Street Address", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value('_shipping_address_1')))
								."<div class='flex_flow'>"
									.show_textfield(array('type' => 'number', 'name' => '_shipping_postcode', 'text' => __("Zipcode", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value('_shipping_postcode')))
									.show_textfield(array('name' => '_shipping_city', 'text' => __("City", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value('_shipping_city')))
								."</div>"
							."</div>";
						break;

						case 'validate':
							// Do nothing
						break;

						case 'save':
							$_shipping_first_name = check_var('_shipping_first_name');
							$_shipping_last_name = check_var('_shipping_last_name');
							$_shipping_address_1 = check_var('_shipping_address_1');
							$_shipping_postcode = check_var('_shipping_postcode');
							$_shipping_city = check_var('_shipping_city');

							if($this->get_woocommerce_custom_orders_table_enabled() == 'yes')
							{
								$arr_order = wc_get_order($data['order_id']);

								$arr_order->set_shipping_first_name($_shipping_first_name);
								$arr_order->set_shipping_last_name($_shipping_last_name);
								$arr_order->set_shipping_address_1($_shipping_address_1);
								$arr_order->set_shipping_postcode($_shipping_postcode);
								$arr_order->set_shipping_city($_shipping_city);

								$arr_order->save_meta_data();
							}

							update_post_meta($data['order_id'], '_shipping_first_name', $_shipping_first_name);
							update_post_meta($data['order_id'], '_shipping_last_name', $_shipping_last_name);
							update_post_meta($data['order_id'], '_shipping_address_1', $_shipping_address_1);
							update_post_meta($data['order_id'], '_shipping_postcode', $_shipping_postcode);
							update_post_meta($data['order_id'], '_shipping_city', $_shipping_city);
						break;
					}
				}
			}
		}

		switch($data['type'])
		{
			case 'display':
				if($out_physical != '')
				{
					echo $out_physical;
				}

				if($out_software != '')
				{
					echo "<div class='mf_form'>
						<h2>".__("Recipient", 'lang_bb-theme-child')."</h2>"
						.$out_software
					."</div>";

					if(IS_SUPER_ADMIN)
					{
						$woocommerce_dibs_easy_settings = get_option('woocommerce_dibs_easy_settings');

						if($woocommerce_dibs_easy_settings['test_mode'] == 'yes')
						{
							echo "<p><a href='https://developer.nexigroup.com/nexi-checkout/en-EU/docs/test-invoice-installment-processing/#build-sample-invoice-nordic-addresses'>".__("Test invoice & installment processing", 'lang_bb-theme-child')." <i class='fas fa-arrow-right'></i></a></p>
							<p><a href='https://developer.nexigroup.com/nexi-checkout/en-EU/docs/test-card-processing/#build-sample-credit-cards'>".__("Test Card Processing", 'lang_bb-theme-child')." <i class='fas fa-arrow-right'></i></a></p>";
						}
					}
				}
			break;
		}
	}

	function woocommerce_after_order_notes($obj_checkout)
	{
		$theme_include_url = get_stylesheet_directory_uri()."/include/";

		mf_enqueue_script('script_bb_theme_checkout', $theme_include_url."script_checkout.js");
		mf_enqueue_style('style_bb_theme_checkout', $theme_include_url."style_checkout.css");

		$this->run_checkout_part(array('type' => 'display', 'obj_checkout' => $obj_checkout));
	}

	function woocommerce_checkout_process()
	{
		$this->run_checkout_part(array('type' => 'validate'));
	}

	function woocommerce_checkout_update_order_meta($order_id)
	{
		$this->run_checkout_part(array('type' => 'save', 'order_id' => $order_id));
	}

	function send_payment_complete($function, $status, $order_id, $order)
	{
		$this->send_to_optima($status, $order_id, false);
	}

	function woocommerce_payment_complete($order_id)
	{
		$this->send_payment_complete(__FUNCTION__, 'completed', $order_id, array());
	}

	function woocommerce_proceed_to_checkout()
	{
		echo "<a href='".get_permalink(wc_get_page_id('shop'))."' class='checkout-button button alt wc-forward wp-element-button'>".__("Continue to shop", 'lang_bb-theme-child')."</a>";
	}

	function woocommerce_order_get_formatted_shipping_address($address, $raw_address, $order)
	{
		$order_id = $order->get_id();

		$_shipping_first_name = get_post_meta($order_id, '_shipping_first_name', true);
		$_shipping_last_name = get_post_meta($order_id, '_shipping_last_name', true);
		$_shipping_address_1 = get_post_meta($order_id, '_shipping_address_1', true);
		$_shipping_postcode = get_post_meta($order_id, '_shipping_postcode', true);
		$_shipping_city = get_post_meta($order_id, '_shipping_city', true);

		if($_shipping_address_1 != '')
		{
			$address = $_shipping_first_name." ".$_shipping_last_name."<br>"
			.$_shipping_address_1."<br>"
			.$_shipping_postcode." ".$_shipping_city;
		}

		return $address;
	}

	function debug_ssn_run()
	{
		$result = array(
			'success' => false,
		);

		$setting_theme_child_ssn = check_var('ssn');

		$ssn_error = $this->check_product_ssn($setting_theme_child_ssn);

		if($ssn_error != '')
		{
			$result['success'] = true;
			$result['message'] = "<i class='fa fa-times red'></i> ".$setting_theme_child_ssn." -> ".$ssn_error;
		}

		else
		{
			$result['success'] = true;
			$result['message'] = "<i class='fa fa-check green'></i> ".$setting_theme_child_ssn;
		}

		header('Content-Type: application/json');
		echo json_encode($result);
		die();
	}

	function debug_lime_run()
	{
		$result = array(
			'success' => false,
		);

		$data = array(
			'debug' => true,
			'limit_amount' => 10,
		);

		$setting_theme_child_company = check_var('company');
		$setting_theme_child_company_id = check_var('company_id');
		$setting_theme_child_type = check_var('type');

		ob_start();

		$obj_cron = new mf_cron();
		$obj_cron->start(__CLASS__);

		if($obj_cron->is_running == false || $setting_theme_child_company > 0 || $setting_theme_child_type == 'terms')
		{
			if($setting_theme_child_company > 0 || $setting_theme_child_company_id > 0)
			{
				$school_id = ($setting_theme_child_company_id > 0 ? $setting_theme_child_company_id : get_post_meta($setting_theme_child_company, 'school_id', true));

				switch($setting_theme_child_type)
				{
					default:
					case 'company':
						$data['url'] = get_option('setting_theme_child_lime_api_url')."limeobject/company/".$school_id."/";
					break;

					case 'properties':
						$data['url'] = get_option('setting_theme_child_lime_api_url')."limeobject/company/".$school_id."/propertylink/?_limit=50";
					break;

					case 'terms':
						// Do nothing here
					break;
				}
			}

			else
			{
				$option_theme_educators_url = get_option('option_theme_educators_url');

				if($option_theme_educators_url != '')
				{
					if(strpos($option_theme_educators_url, "_limit="))
					{
						$option_theme_educators_url_temp = preg_replace("/_limit=(.*?)&/", "_limit=".$data['limit_amount']."&", $option_theme_educators_url);

						if($option_theme_educators_url_temp != '')
						{
							$option_theme_educators_url = $option_theme_educators_url_temp;
						}
					}

					else
					{
						$option_theme_educators_url .= "&_limit=".$data['limit_amount'];
					}
				}

				$data['url'] = $option_theme_educators_url;
			}

			if($data['debug'] == true)
			{
				//echo "<p><strong>".date("H:i:s")."</strong> Init...</p>";
			}

			switch($setting_theme_child_type)
			{
				default:
				case 'company':
				case 'properties':
					$this->get_educators($data);
				break;

				case 'terms':
					$this->insert_terms($data);
				break;
			}

			$obj_cron->end();
		}

		else if($data['debug'] == true)
		{
			echo "<p>cron_base is already running</p>";
		}

		$result['success'] = true;
		$result['message'] = ob_get_contents();

		ob_end_clean();

		header('Content-Type: application/json');
		echo json_encode($result);
		die();
	}

	function wp_grid_builder_map_marker_content($content, $marker)
	{
		$title = get_the_title();
		$address = get_field("address");
		$phone = get_field("contact_no");
		$email = get_field("email_address");
		$website = get_field("website");

		$out = "<div class='pad--s'>
			<h4>".$title."</h4>";

			if($address != '')
			{
				$out .= "<p>".$address."</p>";
			}

			if($phone != '')
			{
				$out .= "<p><a href='tel:".$phone."'>".$phone."</a></p>";
			}

			if($email != '')
			{
				$out .= "<p><a href='mailto:".$email."'>".$email."</a></p>";
			}

			if($website != '')
			{
				$out .= "<p><a href='".$website."' target='_blank'>".$website."</a></p>";
			}

		$out .= "</div>";

		return $out;
	}
}