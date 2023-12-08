<?php

class mf_theme_child
{
	var $post_type = 'mf_campaign';
	var $meta_prefix = "";
	var $post_type_shop_order = 'shop_order';
	var $post_type_instructor = 'instructor';
	var $taxonomy_name = 'class';
	var $arr_classes = array();
	var $insert_count = 0;
	var $update_count = 0;
	var $delete_count = 0;
	var $ignore_count = 0;
	var $arr_terms_id = array();

	function __construct()
	{
		$this->meta_prefix = $this->post_type."_";

		$this->arr_classes = array(
			array(
				'area' => "Kvalitet och miljö", //"Kvalitet, miljö och övrigt"
				'services' => array(
					array('id' => array(43801), 'name' => "Miljöanpassade fordon", 'description' => "Erbjuder utbildning i fordon med miljöanpassade drivmedel"),
					//array('id' => array(43701), 'name' => "Vi mäter kundnöjdhet, NKI", 'description' => ""),
					array('id' => array(10901), 'name' => "FR2000", 'description' => "Trafikutbildare som genomgått kvalitets- och miljöledningssystemet FR2000"),
					array('id' => array(44901), 'name' => "Erbjuder e-handel", 'description' => "Skolor som erbjuder e-handel"),
				),
			),
			array(
				'area' => "Personbil",
				'services' => array(
					array('id' => array(11701), 'name' => "B - personbil", 'description' => "Förarutbildning för personbil"),
					array('id' => array(34401), 'name' => "B - personbil utökad", 'description' => "Förarutbildning med utökad behörighet för personbil och släp (max 4,25 ton)"),
					array('id' => array(11801), 'name' => "BE - tungt släp", 'description' => "Förarutbildning för personbil med tungt släp"),
					array('id' => array(10001), 'name' => "Introduktionsutbildning", 'description' => "Utbildning för handledare och elever som ska övningsköra privat med personbil (minst 3 tim)"),
					array('id' => array(14901), 'name' => "Riskutbildning del 1B", 'description' => "Riskutbildning 1B som handlar om alkohol, trötthet, riskfyllda beteenden mm (minst 3 tim)"),
					array('id' => array(30501), 'name' => "Riskutbildning del 2B", 'description' => "Riskutbildning 2B på trafikövningsplats (halkbana) som handlar om hastighet, säkerhet och körning under särskilda förhållanden (minst 3 tim)"),
					//array('id' => array(31501), 'name' => "Synprövning", 'description' => "Syntest (synscreening) som behövs för körkortstillstånd"),
					//array('id' => array(33301), 'name' => "Videoutrustning", 'description' => "Möjlighet att videofilma körlektionen som en del av förarutbildningen"),
					array('id' => array(12601), 'name' => "Körbedömning", 'description' => "Körbedömning i samarbete med sjukhusen för personer med försämrad körförmåga"),
					//array('id' => array(14601), 'name' => "Automatväxlat fordon", 'description' => "Förarutbildning för automatväxlat fordon"),
					array('id' => array(30701), 'name' => "Fordonsanpassning", 'description' => "Förarutbildning för personer med rörelsehinder som behöver anpassat fordon"),
					//array('id' => array(14701), 'name' => "Handreglage", 'description' => "Förarutbildning för personer med rörelsehinder som behöver anpassat fordon"),
					//array('id' => array(42001), 'name' => "CSN Körkortslån", 'description' => "Förarutbildning med CSN-avtal"),
					array('id' => array(42101), 'name' => "Språk - Engelska", 'description' => "Förarutbildning med engelsktalande utbildare"),
					array('id' => array(42201), 'name' => "Språk - Arabiska", 'description' => "Förarutbildning med arabisktalande utbildare"),
					array('id' => array(42301), 'name' => "Språk - Persiska", 'description' => "Förarutbildning med persisktalande utbildare"),
					array('id' => array(42701), 'name' => "Språk - Somaliska", 'description' => "Förarutbildning med somalisktalande utbildare"),
					//array('id' => array(32601), 'name' => "Teoristöd - extra", 'description' => ""),
					//array('id' => array(31901), 'name' => "Teoristöd - läs och skriv", 'description' => ""),
					//array('id' => array(45301), 'name' => "Extra stöd", 'description' => "För elever med t.ex. NPF och/eller läs- och skrivsvårigheter"),
					//array('id' => array(46001), 'name' => "Ansöker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare för att ansöka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Motorcykel",
				'services' => array(
					//array('id' => array(38801), 'name' => "A - låg motorcykel", 'description' => "Motorcykel vars höjd lämpar sig för korta personer"),
					array('id' => array(35001, 38801), 'name' => "A - tung motorcykel", 'description' => "MC-utbildning med tung motorcykel"),
					//array('id' => array(38901), 'name' => "A1 - låg motorcykel", 'description' => "Motorcykel vars höjd lämpar sig för korta personer"),
					array('id' => array(38901, 34801), 'name' => "A1 - lätt motorcykel", 'description' => "MC-utbildning med lätt motorcykel"),
					//array('id' => array(39001), 'name' => "A2 - låg motorcykel", 'description' => "Motorcykel vars höjd lämpar sig för korta personer"),
					array('id' => array(39001, 34901), 'name' => "A2 - mellantung motorcykel", 'description' => "MC-utbildning med mellantung motorcykel"),
					array('id' => array(15101), 'name' => "Riskutbildning del 1A", 'description' => "Riskutbildning 1A som handlar om alkohol, trötthet, riskfyllda faktorer och beteenden mm (minst 3 tim)"),
					array('id' => array(15201), 'name' => "Riskutbildning del 2A", 'description' => "Riskutbildning 2A som handlar om hastighet, säkerhet och körning under särskilda förhållanden (minst 4 tim)"),
					//array('id' => array(31601), 'name' => "Synprövning", 'description' => "Syntest (synscreening) som behövs för körkortstillstånd"),
					//array('id' => array(33401), 'name' => "Videoutrustning", 'description' => "Möjlighet att videofilma körlektionen som en del av förarutbildningen"),
					//array('id' => array(32701), 'name' => "Teoristöd - extra", 'description' => ""),
					//array('id' => array(32001), 'name' => "Teoristöd - läs och skriv", 'description' => ""),
					//array('id' => array(45401), 'name' => "Extra stöd", 'description' => "För elever med t.ex. NPF och/eller läs- och skrivsvårigheter"),
					//array('id' => array(46101), 'name' => "Ansöker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare för att ansöka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Moped",
				'services' => array(
					array('id' => array(11301), 'name' => "AM - moped klass 1", 'description' => "Utbildning för AM - moped klass 1 (minst 12 timmar)"),
					array('id' => array(15001), 'name' => "Moped klass 2", 'description' => "Utbildning för förarbevis för moped klass 2 (minst 10 timmar)"),
					//array('id' => array(31701), 'name' => "Synprövning", 'description' => "Syntest (synscreening) som behövs för körkortstillstånd"),
					//array('id' => array(32801), 'name' => "Teoristöd - extra", 'description' => ""),
					//array('id' => array(32101), 'name' => "Teoristöd - läs och skriv", 'description' => ""),
					//array('id' => array(33501), 'name' => "Videoutrustning", 'description' => "Möjlighet att videofilma körlektionen som en del av förarutbildningen"),
					//array('id' => array(45501), 'name' => "Extra stöd", 'description' => "För elever med t.ex. NPF och/eller läs- och skrivsvårigheter"),
					//array('id' => array(46201), 'name' => "Ansöker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare för att ansöka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Lastbil",
				'services' => array(
					array('id' => array(11901), 'name' => "C - tung lastbil", 'description' => "Förarutbildning för tung lastbil över 3,5 ton"),
					array('id' => array(12001, 12101), 'name' => "CE - tung lastbil med släp", 'description' => "Förarutbildning för tung lastbil med tungt släp"),
					//array('id' => array(12101), 'name' => "CE - tung lastbil påhängsvagn", 'description' => "Förarutbildning för tung lastbil med tungt släp (trailer)"),
					//array('id' => array(32901), 'name' => "Teoristöd - extra", 'description' => ""),
					//array('id' => array(32201), 'name' => "Teoristöd - läs och skriv", 'description' => ""),
					array('id' => array(33601), 'name' => "Videoutrustning", 'description' => "Möjlighet att videofilma körlektionen som en del av förarutbildningen"),
					array('id' => array(34601), 'name' => "C1 - tung lastbil (7,5 ton)", 'description' => "7,5 ton"),
					array('id' => array(34701), 'name' => "C1E - tung lastbil med släp (12 ton)", 'description' => "12 ton"),
					//array('id' => array(45601), 'name' => "Extra stöd", 'description' => "För elever med t.ex. NPF och/eller läs- och skrivsvårigheter"),
					//array('id' => array(46301), 'name' => "Ansöker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare för att ansöka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Buss",
				'services' => array(
					array('id' => array(12201), 'name' => "D - buss", 'description' => "Förarutbildning för buss"),
					array('id' => array(12301), 'name' => "DE - buss med tungt släp", 'description' => "Förarutbildning för buss med tungt släp"),
					array('id' => array(33701), 'name' => "Videoutrustning", 'description' => "Möjlighet att videofilma körlektionen som en del av förarutbildningen"),
					//array('id' => array(33001), 'name' => "Teoristöd - extra", 'description' => ""),
					//array('id' => array(32301), 'name' => "Teoristöd - läs och skriv", 'description' => ""),
					array('id' => array(34501), 'name' => "D1 - buss (16 sittplatser)", 'description' => "16 sittplatser"),
					array('id' => array(35101), 'name' => "D1E - buss (16 pl) med tungt släp", 'description' => "16 sittplatser"),
					//array('id' => array(45701), 'name' => "Extra stöd", 'description' => "För elever med t.ex. NPF och/eller läs- och skrivsvårigheter"),
					//array('id' => array(46401), 'name' => "Ansöker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare för att ansöka om anpassat prov hos Trafikverket"),
				),
			),
			array(
				'area' => "Övrigt",
				'services' => array(
					//array('id' => array(11201), 'name' => "Traktor", 'description' => "Förarutbildning för traktor"),
					//array('id' => array(30801), 'name' => "Terränghjuling", 'description' => "Förarutbildning för terränghjuling"),
					//array('id' => array(15401), 'name' => "Snöskoter", 'description' => "Förarutbildning för snöskoter"),
					array('id' => array(31801), 'name' => "Synprövning", 'description' => "Syntest (synscreening) som behövs för körkortstillstånd"),
					//array('id' => array(33801), 'name' => "Videoutrustning", 'description' => "Möjlighet att videofilma körlektionen som en del av förarutbildningen"),
					//array('id' => array(33101), 'name' => "Teoristöd - extra", 'description' => ""),
					//array('id' => array(32401), 'name' => "Teoristöd - läs och skriv", 'description' => ""),
					array('id' => array(45801), 'name' => "Extra stöd", 'description' => "För elever med t.ex. NPF och/eller läs- och skrivsvårigheter"),
					array('id' => array(10101, 10401, 11101, 31201), 'name' => "EcoDriving", 'description' => "EcoDriving för personbilförare"),
					//array('id' => array(10401), 'name' => "Heavy EcoDriving", 'description' => "EcoDriving för buss- och lastbilsförare"),
					//array('id' => array(11101), 'name' => "Working EcoDriving", 'description' => "EcoDriving för förare av arbetsfordon"),
					//array('id' => array(31201), 'name' => "EcoDriving Taxi", 'description' => "EcoDriving för taxiförare"),
					array('id' => array(46501), 'name' => "Ansöker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare för att ansöka om anpassat prov hos Trafikverket"),
					array('id' => array(47901), 'name' => "Simulator", 'description' => "Använder simulator i utbildningen"),
				),
			),
			array(
				'area' => "Yrkesförarutbildningar",
				'services' => array(
					array('id' => array(12801), 'name' => "YKB Grundutbildning lastbil", 'description' => "Grundutbildning i yrkeskompetens (YKB) för lastbilsförare"),
					array('id' => array(14101), 'name' => "YKB Fortbildning lastbil", 'description' => "Fortbildning i yrkeskompetens (YKB) för lastbilsförare"),
					array('id' => array(14301), 'name' => "YKB Grundutbildning buss", 'description' => "Grundutbildning i yrkeskompetens (YKB) för bussförare"),
					array('id' => array(14401), 'name' => "YKB Fortbildning buss", 'description' => "Fortbildning i yrkeskompetens (YKB) för bussförare"),
					//array('id' => array(33201), 'name' => "Teoristöd - extra", 'description' => ""),
					//array('id' => array(32501), 'name' => "Teoristöd - läs och skriv", 'description' => ""),
					//array('id' => array(45901), 'name' => "Extra stöd", 'description' => "För elever med t.ex. NPF och/eller läs- och skrivsvårigheter"),
					//array('id' => array(46601), 'name' => "Ansöker om anpassat prov hos Trafikverket", 'description' => "Intygsgivare för att ansöka om anpassat prov hos Trafikverket"),
					array('id' => array(12901), 'name' => "Taxiförarlegitimation", 'description' => "Utbildning för taxiförare"),
				),
			),
			/*array(
				'area' => "Specialiserade yrkesutbildningar",
				'services' => array(
					array('id' => array(13201), 'name' => "Trafiktillstånd", 'description' => "Utbildning för företagare med inriktning mot godstransporter för trafiktillstånd (Eget på väg)"),
					array('id' => array(13601), 'name' => "Lastsäkring", 'description' => "Kurs för personer som jobbar med lastsäkring av gods på väg"),
					array('id' => array(13701), 'name' => "Godshantering", 'description' => "Kurs för personer som jobbar med godshantering i samband med transporter"),
					array('id' => array(13801), 'name' => "Farligt gods (ADR)", 'description' => "Kontakta utbildaren gällande vilka delar de utbildar inom"),
					array('id' => array(14501), 'name' => "Fordonsmonterad kran", 'description' => "Kurs för personer som jobbar med lastning och lossning av virke eller gods med fordonsmonterad kran"),
					array('id' => array(14801), 'name' => "Bakgavellyft", 'description' => "Kurs i säker användning av bakgavellyft"),
					array('id' => array(13901), 'name' => "Truck", 'description' => "Utbildning för truckförare"),
					array('id' => array(14001), 'name' => "Hjullastare", 'description' => "Utbildning för förare av hjullastare"),
				),
			),*/
			/*array(
				'area' => "Utbildningar för arbete på väg",
				'services' => array(
					array('id' => array(13301), 'name' => "SPV (Nivå 1)", 'description' => "Grundutbildning för personer som utför vägarbeten"),
					array('id' => array(30901), 'name' => "SPV (Nivå 2)", 'description' => "Utbildning för förare av arbetsfordon mm. Krav: nivå 1-utbildning"),
					array('id' => array(31001), 'name' => "SPV (Nivå 3)", 'description' => "Utbildning för personer som utför utmärkning av vägmärken. Krav: nivå 2-utbildning"),
					array('id' => array(31101), 'name' => "Vakt- eller lotsutbildning", 'description' => "Kontakta utbildaren gällande vilka delar de utbildar inom"),
					array('id' => array(13401), 'name' => "Hjälp på väg", 'description' => "Kurs i första hjälpen, HLR, brandkunskap mm för personer som har vägen som arbetsplats"),
					array('id' => array(13501), 'name' => "Miljö", 'description' => "Miljökurs för personer som har vägen som arbetsplats"),
				),
			),*/
			/*array(
				'area' => "EcoDriving",
				'services' => array(
					array('id' => array(10101), 'name' => "EcoDriving", 'description' => "EcoDriving för personbilförare"),
					array('id' => array(10401), 'name' => "Heavy EcoDriving", 'description' => "EcoDriving för buss- och lastbilsförare"),
					array('id' => array(11101), 'name' => "Working EcoDriving", 'description' => "EcoDriving för förare av arbetsfordon"),
					array('id' => array(31201), 'name' => "EcoDriving Taxi", 'description' => "EcoDriving för taxiförare"),
				),
			),*/
		);

		$arr_exclude = $arr_include = array();
		$arr_exclude[] = "å";	$arr_include[] = "&aring;";
		$arr_exclude[] = "ä";	$arr_include[] = "&auml;";
		$arr_exclude[] = "ö";	$arr_include[] = "&ouml;";
		$arr_exclude[] = "Å";	$arr_include[] = "&Aring;";
		$arr_exclude[] = "Ä";	$arr_include[] = "&Auml;";
		$arr_exclude[] = "Ö";	$arr_include[] = "&Ouml;";

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

	function get_post_data($data)
	{
		global $wpdb;

		$_order_shipping = "";

		// Customer
		$_customer_user = "";

		$_billing_first_name = get_post_meta($data['order_id'], '_billing_first_name', true);
		$_billing_last_name = get_post_meta($data['order_id'], '_billing_last_name', true);
		$_billing_address_1 = get_post_meta($data['order_id'], '_billing_address_1', true);
		$_billing_postcode = get_post_meta($data['order_id'], '_billing_postcode', true);
		$_billing_city = get_post_meta($data['order_id'], '_billing_city', true);
		//$_billing_country = get_post_meta($data['order_id'], '_billing_country', true);
		$_billing_email = get_post_meta($data['order_id'], '_billing_email', true);
		$_billing_phone = get_post_meta($data['order_id'], '_billing_phone', true);

		$_shipping_first_name = get_post_meta($data['order_id'], '_shipping_first_name', true);
		$_shipping_last_name = get_post_meta($data['order_id'], '_shipping_last_name', true);
		$_shipping_address_1 = get_post_meta($data['order_id'], '_shipping_address_1', true);
		$_shipping_postcode = get_post_meta($data['order_id'], '_shipping_postcode', true);
		$_shipping_city = get_post_meta($data['order_id'], '_shipping_city', true);
		//$_shipping_phone = get_post_meta($data['order_id'], '_shipping_phone', true);

		$_dibs_payment_id = get_post_meta($data['order_id'], '_dibs_payment_id', true);

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
			},
			"shippingFee": "'.$_order_shipping.'",
			"orderId": "'.$data['order_id'].'",
			"paymentId": "'.$_dibs_payment_id.'",
			"orderRows":
			[';

				$order = wc_get_order($data['order_id']);
				$order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));

				$i_limit = 1;

				foreach($order_items as $item_id => $arr_item)
				{
					$product_id = $arr_item['product_id'];
					$variation_id = $arr_item['variation_id'];
					$quantity = $arr_item['quantity'];

					//do_log($product_id.": ".var_export($arr_item, true));

					for($i = 1; $i <= $i_limit; $i++)
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
							$product_ssn = get_post_meta($data['order_id'], $this->meta_prefix.'ssn_'.$item_id, true);
							//$product_name = get_post_meta($data['order_id'], $this->meta_prefix.'name_'.$item_id, true);
							$product_phone = get_post_meta($data['order_id'], $this->meta_prefix.'phone_'.$item_id, true);
							$product_email = get_post_meta($data['order_id'], $this->meta_prefix.'email_'.$item_id, true);
							//$product_street_address = get_post_meta($data['order_id'], $this->meta_prefix.'street_address_'.$item_id, true);
							//$product_zipcode = get_post_meta($data['order_id'], $this->meta_prefix.'zipcode_'.$item_id, true);
							//$product_city = get_post_meta($data['order_id'], $this->meta_prefix.'city_'.$item_id, true);

							if($product_ssn != '')
							{
								$product_ssn = substr($product_ssn, 0, 6)."-".substr($product_ssn, 6);
							}
						}

						else
						{
							$product_ssn = $product_phone = $product_email = "";
						}

						if($variation_id > 0)
						{
							$sku = get_post_meta($variation_id, '_sku', true);
						}

						else
						{
							$sku = get_post_meta($product_id, '_sku', true);
						}

						$description = "";
						//$quantity = 1;
						$unit = "S";
						$unitPrice = $arr_item['subtotal']; // - $arr_item['subtotal_tax']

						$post_data .= '{
							"sku": "'.$sku.'",
							"description": "'.$description.'",
							"quantity": '.$quantity.',
							"unit": "'.$unit.'",
							"unitPrice": "'.$unitPrice.'",
							"user_idenifier": "'.$_customer_user.'",
							"identityNumber": "'.$product_ssn.'",
							"email": "'.$product_email.'",
							"mobilePhone": "'.$product_phone.'"
						}'.($i < $i_limit ? "," : "");
					}
				}

			$post_data .= ']
		}';

		return $post_data;
	}

	function send_to_optima($status, $order_id, $do_return)
	{
		//global $wpdb;

		$woocommerce_dibs_easy_settings = get_option('woocommerce_dibs_easy_settings');

		if($woocommerce_dibs_easy_settings['test_mode'] == 'yes')
		{
			$base_url = get_option('setting_theme_child_api_url_test');
			$sas_key_value = get_option('setting_theme_child_api_key_test');
		}

		else
		{
			$base_url = get_option('setting_theme_child_api_url_live');
			$sas_key_value = get_option('setting_theme_child_api_key_live');
		}

		if($base_url != '' && $sas_key_value != '')
		{
			$url = $base_url."/sbq-orders/messages";
			$post_data = $this->get_post_data(array('order_id' => $order_id));

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

			$arr_headers = array(
				"Authorization: ".$this->generate_sas_token(
					$base_url.'/sbq-orders',
					'korkort.nu',
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

			$arr_post_data = get_post_meta($order_id, $this->meta_prefix.'optima_post_data');

			if(!is_array($arr_post_data))
			{
				if($arr_post_data != '')
				{
					$arr_post_data_temp = $arr_post_data;

					$http_code = get_post_meta($order_id, $this->meta_prefix.'optima_http_code');

					$arr_post_data = array();

					$arr_post_data[] = array(
						'data' => $arr_post_data_temp,
						'http_code' => $http_code,
						'user' => 0,
						'created' => "",
					);

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

			update_post_meta($order_id, $this->meta_prefix.'optima_post_data', $arr_post_data);

			switch($headers['http_code'])
			{
				case 200:
				case 201:
					//$arr_content = json_decode($content, true);

					//echo "Successful: ".$headers['http_code']." (".htmlspecialchars($content).")";
					//do_log("Order sent: #".$order_id." (Post: ".str_replace(array("\n", "\r"), "", var_export($arr_post_data, true)).")", 'notification');

					//"UPDATE ".$wpdb->prefix."wc_order_stats SET status = '' WHERE order_id = '%d'" // wc-on-hold -> wc-processing

					if($do_return == true)
					{
						return true;
					}
				break;

				default:
					$log_message = "Error while sending data to Optima: ".$headers['http_code']." (#".$order_id.", ".htmlspecialchars($content).")"; // (".var_export($arr_headers, true).")
					do_log($log_message);
					//echo $log_message;

					if($do_return == true)
					{
						return false;
					}
				break;
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

			//echo "<p>".$str_address." -> ".$street_name." + ".$street_number."</p>";
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

		if($data['array']['active'] == true && $data['array']['hideweb'] == false && $data['array']['memberno'] != '' && $data['array']['customertype']['id'] != '354601') //537701 = Trafikskola Guldmedlem, 354601 = Icke medlem, 144501 = Trafikskola Företagsmedlem
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

			$is_updated = (date("Y-m-d", strtotime($data['array']['updated_website'])) >= date("Y-m-d", strtotime($post_modified)));

			if($data['debug'] == true)
			{
				//echo "<p><strong>".date("H:i:s")."</strong> Modified #".$post_id.": ".date("Y-m-d H:i:s", strtotime($data['array']['updated_website']))." > ".$post_modified."</p>";
			}

			$data['array']['www'] = $this->validate_url($data['array']['www']);

			if($data['array']['phone'] == ''){				$data['array']['phone'] = "-";}
			if($data['array']['email'] == ''){				$data['array']['email'] = "-";}
			if($data['array']['description'] == ''){		$data['array']['description'] = "-";}
			if($data['array']['visitingaddress'] == ''){	$data['array']['visitingaddress'] = "-";}
			if($data['array']['zipcode'] == ''){			$data['array']['zipcode'] = "-";}
			if($data['array']['city'] == ''){				$data['array']['city'] = "-";}

			$post_content = "";

			if($data['array']['city'] != '')
			{
				$post_content .= ($post_content != '' ? ", " : "").$data['array']['city'];
			}

			if($data['array']['searchcity'] != '' && $data['array']['searchcity'] != $data['array']['city'])
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

			$address = $data['array']['visitingaddress'].", ".$data['array']['zipcode']." ".$data['array']['city'];

			list($street_name, $street_number) = $this->split_street_address($data['array']['visitingaddress']);

			$post_data = array(
				'post_title' => $data['array']['name'],
				'post_type' => $this->post_type_instructor,
				'post_status' => ($data['array']['active'] == true && strpos($data['array']['name'], "[STR TEST] ") === false ? 'publish' : 'draft'),
				'post_content' => $post_content,
				'meta_input' => array(
					'school_id' => $school_id,
					'school_name' => $data['array']['name'],
					'membership' => $data['array']['pricelist']['text'],
					//'membership_description' => ,
					'website' => $data['array']['www'],
					'contact_no' => $data['array']['phone'],
					'email_address' => $data['array']['email'],
					'address' => $address,
					'post_address' => $address,
					'location' => $data['array']['city'],
					'address_map' => array(
						'address' => $address,
						'lat' => $data['array']['map_lat'],
						'lng' => $data['array']['map_long'],
						'zoom' => 14,
						//'place_id' => "",
						'street_name' => $street_name,
						'street_number' => $street_number,
						'post_code' => $data['array']['zipcode'],
						'city' => $data['array']['city'],
						//'state' => "",
						'country' => "Sweden",
						'country_short' => "SE",
					),
					'organisation_no' => $data['array']['registrationno'],
					'training_and_services' => "-", //$data['array']['description']
					'about_us' => $data['array']['description'],

					'_school_name' => 'field_64efe5bd91abf',
					'_membership' => 'field_64efe5f091ac0',
					'_website' => 'field_64efe62a91ac2',
					'_contact_no' => 'field_64efe64791ac3',
					'_email_address' => 'field_64efe68391ac4',
					'_address' => 'field_64efe69791ac5',
					'_address_map' => 'field_64efe6a891ac6',
					'_post_address' => 'field_64efe6f191ac7',
					'_location' => 'field_64f1cd5254cc6',
					'_organisation_no' => 'field_64efe70491ac8',
					'_training_and_services' => 'field_64efe72791ac9',
					'_about_us' => 'field_64efe73f91aca',
				),
			);
					
			if($data['debug'] == true)
			{
				echo "<p><strong>".date("H:i:s")."</strong> Post data #".$post_id.": ".var_export($post_data, true)."</p>";
			}

			// Get Properties
			#######################################
			/*if($is_updated)
			{*/
				if($data['array']['customertype']['id'] == 537701)
				{
					$this->arr_terms_id[] = 661;
				}

				else if($data['array']['customertype']['id'] == 144501)
				{
					$this->arr_terms_id[] = 660;
				}

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
						echo "<p><strong>".date("H:i:s")."</strong> Added T&s ".$school_id." -> ".$post_id." -> ".get_post_title($post_id)." (".$wpdb->num_rows.")</p>"; // -> ".var_export($post_data, true)."
					}
				}
				######################################

				// Images
				#######################################
				if($is_updated)
				{
					if($data['debug'] == true)
					{
						echo "<p><strong>".date("H:i:s")."</strong> Get Images for ".$school_id." -> ".$post_id." -> ".get_post_title($post_id)."</p>";
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
							//$post_data['meta_input']['_pods_image_gallery_'.$meta_key_count] = array(0 => $image_id);
							$post_data['meta_input']['image_gallery_'.$meta_key_count] = $image_id;
							$post_data['meta_input']['_image_gallery_'.$meta_key_count] = $arr_image_data[$meta_key_count];

							$meta_key_count++;
						}
					}
				}

				else if($data['debug'] == true)
				{
					echo "<p><strong>".date("H:i:s")."</strong> NOT modified so ignoring images #".$post_id.": ".date("Y-m-d H:i:s", strtotime($data['array']['updated_website']))." > ".$post_modified."</p>";
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
					echo "<p><strong>".date("H:i:s")."</strong> Company is not active</p>"; //: ".var_export($data['array'], true)."
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
					$arr_include[] = $this->get_term(array('arr_service_id' => $arr_service['id'], 'name' => $arr_service['name'], 'debug' => $data['debug']));
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

		sleep(0.1);
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
							echo "<p><strong>".date("H:i:s")."</strong> PropertyLink: ".count($arr_content['_embedded']['limeobjects'])."</p>"; //str_replace(array("\n", "\r"), "", var_export($arr_content, true))
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
															echo "<p><strong>".date("H:i:s")."</strong> Got PostID: ".$company_id." -> ".$post_id." -> ".get_post_title($post_id)."</p>";
														}
													}

													if($post_id > 0)
													{
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
																	}
																}
															}
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
										echo "<p><strong>".date("H:i:s")."</strong> Insert class ".$term_id." to #".$post_id." (".get_post_title($post_id).")</p>";
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
											echo "<p><strong>".date("H:i:s")."</strong> Insert index ".$term_id."/".$name." to #".$post_id." (".get_post_title($post_id).")</p>";
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
											'name': 'Nybrons Trafikskola AB', 'legalname' => 'Nybrons Trafikskola AB', '_descriptive' => 'Nybrons Trafikskola AB',
											'phone' => '018122311',	'phone2' => '',
											'www' => 'www.nybronstrafikskola.se',
											'address' => 'Västra Ågatan 16', 'visitingaddress' => 'Västra Ågatan 16',
											'customerno' => '10482',
											'registrationno' => '556500-9205', 'gln' => '5565009205',
											'zipcode' => '753 09',
											'city' => 'UPPSALA', 'searchcity' => 'UPPSALA', 'searchcity2' => '', 'searchcity3' => '',
											'visitingzipcode' => '', 'visitingcity' => 'UPPSALA',
											'relation' => array ( 'id' => 99101, 'key' => '99101', 'text' => 'Kund', ),
											'customertype' => array ( 'id' => 537701, 'key' => '537701', 'text' => 'Trafikskola Guldmedlem', ),
											'memberno' => '2905',
											'email' => 'info@nybronstrafikskola.se',
											'active' => true,
											'invoiceaddress1' => 'Västra Ågatan 16','invoiceaddress2' => '753 09 UPPSALA',
											'deliveryaddress1' => 'Västra Ågatan 16','deliveryaddress2' => '753 09 UPPSALA',
											'properties' => array ( ),
											'address2' => '', 'visitingaddress2' => '', 'invoiceaddress3' => '', 'deliveryaddress3' => '',
											'description' => 'Att ta körkort...',
											'map_long' => '17.6386409', 'map_lat' => '59.8569079',
											'pricelist' => array ( 'id' => 514301, 'key' => '1', 'text' => 'Guldmedlem', ),
											'hideweb' => true,
											'region' => 1004,
											'companytype' => array ( 'id' => 509301, 'key' => 'FMG', 'text' => 'Företagsmedlem Guld', ),
											'creditlimit' => 30000,
											'ismember' => true, 'iscustomer' => true,
											'companycolor' => array ( 'id' => 513801, 'key' => '513801', 'text' => 'Kund & Medlem', ),
											'teachercount' => 5,
											'edi' => array ( 'id' => 532001, 'key' => 'INVOICGB', 'text' => 'INVOICGB', ),
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
							$term_id = $this->get_term(array('arr_service_id' => $arr_service['id'], 'name' => $arr_service['name'], 'parent' => $term_id_parent, 'debug' => $data['debug']));

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

			$result = $wpdb->get_results($wpdb->prepare("SELECT ID FROM ".$wpdb->posts." LEFT JOIN ".$wpdb->postmeta." ON ".$wpdb->posts.".ID = ".$wpdb->postmeta.".post_id AND meta_key = %s WHERE post_type = %s AND post_status = %s AND post_modified > DATE_SUB(NOW(), INTERVAL 150 MINUTE) AND meta_value IS null ORDER BY ID ASC LIMIT 0, 1", $this->meta_prefix.'optima_post_data', 'shop_order', 'wc-processing'));

			foreach($result as $r)
			{
				$log_message = "<a href='".admin_url("post.php?post=".$r->ID."&action=edit")."'>".sprintf(__("The order %s was not sent to Optima", 'lang_bb-theme-child'), $r->ID)."</a>";

				switch($setting_theme_child_send_to_optima)
				{
					case 'log':
						do_log($log_message);
					break;

					case 'email':
						if(get_option('setting_theme_child_order_email_sent') < date("Y-m-d H:i:s", strtotime("-2 hour")))
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
			$theme_version = get_theme_version();

			mf_enqueue_script('script_theme_child', $theme_include_url."script_wp.js", array(
				//'theme_url' => $theme_include_url,
				'ajax_url' => admin_url('admin-ajax.php'),
			), $theme_version);
		}
	}

	function settings_theme_child()
	{
		$options_area = __FUNCTION__;

		add_settings_section($options_area, "", array($this, $options_area."_callback"), BASE_OPTIONS_PAGE);

		$arr_settings = array();

		$arr_settings['setting_theme_child_mode'] = __("Optima", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_api_url_test'] = __("API URL", 'lang_bb-theme-child')." (".__("Test", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_api_key_test'] = __("API Key", 'lang_bb-theme-child')." (".__("Test", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_api_url_live'] = __("API URL", 'lang_bb-theme-child')." (".__("Live", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_api_key_live'] = __("API Key", 'lang_bb-theme-child')." (".__("Live", 'lang_bb-theme-child').")";
		$arr_settings['setting_theme_child_send_to_optima'] = __("Send to Optima", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_send_to_optima_email'] = __("E-mail", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_info'] = __("Lime", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_lime_api_url'] = __("API URL", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_lime_api_key'] = __("API Key", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_lime_assets_url'] = __("Assets URL", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_company'] = __("Company", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_type'] = __("Type", 'lang_bb-theme-child');
		$arr_settings['setting_theme_child_debug'] = __("Test API", 'lang_bb-theme-child');

		show_settings_fields(array('area' => $options_area, 'object' => $this, 'settings' => $arr_settings));
	}

	function settings_theme_child_callback()
	{
		$setting_key = get_setting_key(__FUNCTION__);

		echo settings_header($setting_key, __("Theme Child", 'lang_bb-theme-child'));
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
					echo sprintf(__("The site URL is %s and test mode is NOT activated", 'lang_bb-theme-child'), $site_url_clean);
				break;
			}
		
		echo "</p>";
	}

	function setting_theme_child_api_url_test_callback()
	{
		$setting_key = get_setting_key(__FUNCTION__);
		$option = get_option($setting_key);

		echo show_textfield(array('type' => 'url', 'name' => $setting_key, 'value' => $option));
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
			'email' => __("Send E-mail", 'lang_bb-theme-child'),
			'api' => __("Send Automatically to Optima", 'lang_bb-theme-child'),
		);

		echo show_select(array('data' => $arr_data, 'name' => $setting_key, 'value' => $option));
	}

	function setting_theme_child_send_to_optima_email_callback()
	{
		$setting_key = get_setting_key(__FUNCTION__);
		$option = get_option($setting_key);

		echo show_textfield(array('type' => 'email', 'name' => $setting_key, 'value' => $option));
	}

	function setting_theme_child_info_callback()
	{
		global $wpdb;

		$result = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title, post_modified FROM ".$wpdb->posts." WHERE post_type = %s AND post_status = %s ORDER BY post_modified ASC LIMIT 0, 1", $this->post_type_instructor, 'publish'));

		foreach($result as $r)
		{
			echo "<p>".sprintf(__("The oldest instructor to be updated was %s (%s)", 'lang_bb-theme-child'), "<a href='/wp-admin/edit.php?s=".$r->post_title."&post_type=".$this->post_type_instructor."'>".$r->post_title."</a>", format_date($r->post_modified))."</p>";
		}

		$result = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title, post_modified FROM ".$wpdb->posts." WHERE post_type = %s AND post_status = %s ORDER BY post_modified DESC LIMIT 0, 1", $this->post_type_instructor, 'publish'));

		foreach($result as $r)
		{
			echo "<p>".sprintf(__("The newest instructor to be updated was %s (%s)", 'lang_bb-theme-child'), "<a href='/wp-admin/edit.php?s=".$r->post_title."&post_type=".$this->post_type_instructor."'>".$r->post_title."</a>", format_date($r->post_modified))."</p>";
		}

		echo "<p>".get_option('option_theme_educators_url')."</p>";
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

		echo show_select(array('data' => $arr_data_instructors, 'name' => $setting_key, 'value' => $option));
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
		$text_suffix = "";

		/*$setting_theme_child_company = get_option('setting_theme_child_company');
		$setting_theme_child_type = get_option('setting_theme_child_type');

		if($setting_theme_child_company > 0 || $setting_theme_child_type != '')
		{
			$text_suffix .= " (";

				if($setting_theme_child_company > 0)
				{
					$text_suffix .= get_post_title($setting_theme_child_company);
				}

				if($setting_theme_child_type != '')
				{
					$text_suffix .= ($setting_theme_child_company > 0 ? ", " : "").$setting_theme_child_type;
				}

			$text_suffix .= ")";
		}*/

		echo "<div class='form_button'>"
			.show_button(array('type' => 'button', 'name' => 'btnDebugRun', 'text' => __("Run Now", 'lang_bb-theme-child').$text_suffix, 'class' => 'button-secondary'))
		."</div>
		<div id='debug_run'></div>";
	}

	function column_header($cols)
	{
		global $post_type;

		switch($post_type)
		{
			case $this->post_type_shop_order:
				$cols['optima_http_code'] = __("Optima", 'lang_bb-theme-child');
			break;
		}

		return $cols;
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

	function column_cell($col, $id)
	{
		global $post;

		switch($post->post_type)
		{
			case $this->post_type_shop_order:
				switch($col)
				{
					case 'optima_http_code':
						$post_data_send = $this->format_post_data($this->get_post_data(array('order_id' => $id)));

						$arr_post_data = get_post_meta($id, $this->meta_prefix.'optima_post_data', true);

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
							$http_code = get_post_meta($id, $this->meta_prefix.'optima_http_code', true);
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

						if(in_array(get_current_user_id(), array(1, 3, 5, 12))) // && $http_code != '' && $http_code == 401
						{
							echo " ";

							if(isset($_GET['resend_to_optima_'.$id]) && $id > 0 && wp_verify_nonce($_REQUEST['_wpnonce_optima_resend'], 'optima_resend_'.$id))
							{
								if($this->send_to_optima('completed', $id, true))
								{
									echo __("The information was successfully sent", 'lang_bb-theme-child');
								}

								else
								{
									echo __("The information could not be sent", 'lang_bb-theme-child');
								}
							}

							else
							{
								$post_search = check_var('s');
								$post_status = check_var('post_status');
								$post_paged = check_var('paged');

								$link_url = "edit.php?post_type=".check_var('post_type')."&resend_to_optima_".$id;

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

								echo "<a href='".wp_nonce_url($link_url, 'optima_resend_'.$id, '_wpnonce_optima_resend')."' rel='confirm'><i class='fa fa-recycle' title='".__("Send Again", 'lang_bb-theme-child').": ".$post_data_send."'></i></a>";
							}
						}
					break;
				}
			break;
		}
	}

	function wp_head()
	{
		global $post;

		$theme_include_url = get_stylesheet_directory_uri()."/include/";
		$theme_version = get_theme_version();

		mf_enqueue_style('child-style', $theme_include_url."style.php", $theme_version);

		if(isset($post->post_type) && $post->post_type == $this->post_type_instructor)
		{
			mf_enqueue_script('script_bb_theme_instructor', $theme_include_url."script_instructor.js", $theme_version);
		}
	}

	/*function pre_get_posts($query)
	{
		if($_SERVER['REMOTE_ADDR'] == "2a02:aa1:1040:d95c:2132:bfa8:3f0d:a0a4")
		{
			//echo ("pre_get_posts: ".var_export($query, true));
		}

		if(1 == 2 && $query->is_main_query() && $query->is_search)
		{
			$strSearch = check_var('s');

			$dteSearchDate = date("Y-m-d", strtotime($strSearch));

			if($dteSearchDate > DEFAULT_DATE)
			{
				list($intYear, $intMonth, $intDay) = explode("-", $dteSearchDate);

				$query->set('date_query', array(
					array(
						'column' => 'post_date_gmt',
						'year' => $intYear,
						'month' => $intMonth,
						'day' => $intDay,
						'inclusive' => true,
					)
				));
			}
		}

		return $query;
	}*/

	function woocommerce_checkout_fields($fields)
	{
		//$fields['order']['order_comments']['placeholder'] = 'My new placeholder';
		//$fields['order']['order_comments']['label'] = 'My new label';

		unset($fields['order']['order_comments']);

		return $fields;
	}

	/*function validate_ssn($ssn)
	{
		$ssn = str_replace(array('-', ' '), '', $ssn);

		if(strlen($ssn) != 10)
		{
			return false;
		}

		if(!ctype_digit($ssn))
		{
			return false;
		}

		$ssn_year = substr($ssn, 0, 2);
		$ssn_date = ($ssn_year > date("y") ? "19" : "20").substr($ssn, 0, 6);

		if($ssn_date != date("Ymd", strtotime($ssn_date)))
		{
			return false;
		}

		$personal_numbers = substr($ssn, 0, 9);
		$check_number = substr($ssn, 9, 1);

		if($check_number != $this->calculate_ssn_check_number($personal_numbers))
		{
			return false;
		}

		return true;
	}*/

	function calculate_ssn_check_number($personal_numbers)
	{
		$weight = array(2, 1, 2, 1, 2, 1, 2, 1, 2);
		$sum = 0;

		for($i = 0; $i < 9; $i++)
		{
			$product = ($personal_numbers[$i] * $weight[$i]);
			$sum += (floor($product / 10) + $product % 10);
		}

		return ((10 - ($sum % 10)) % 10);
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

					/*if(IS_ADMIN || 1 == 1)
					{
						$product_title_temp .= " (SKU: ".get_post_meta($variation_id, '_sku', true).")";
					}*/

					if($quantity > 1)
					{
						$product_title_temp .= " (".$i.")";
					}

					switch($data['type'])
					{
						case 'display':
							$out_software .= "<h3>".$product_title_temp."</h3>"
							."<p>".sprintf(__("Enter the details of the person who will use %s below", 'lang_bb-theme-child'), $product_title_temp)."</p>"
							."<div class='flex_flow'>"
								.show_textfield(array('name' => $this->meta_prefix.'ssn_'.$item_id, 'text' => __("Social Security Number", 'lang_bb-theme-child'), 'value' => check_var($this->meta_prefix.'ssn_'.$item_id, 'soc'), 'placeholder' => __("YYMMDDXXXX", 'lang_bb-theme-child'), 'required' => true, 'xtra' => "maxlength='10'")) //$data['obj_checkout']->get_value($this->meta_prefix.'ssn_'.$item_id)
								//.show_textfield(array('name' => $this->meta_prefix.'name_'.$item_id, 'text' => __("Name", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value($this->meta_prefix.'name_'.$item_id))) //, 'required' => true
							."</div>"
							."<div class='flex_flow'>"
								.show_textfield(array('type' => 'tel', 'name' => $this->meta_prefix.'phone_'.$item_id, 'text' => __("Phone Number", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value($this->meta_prefix.'phone_'.$item_id), 'placeholder' => __("to the user", 'lang_bb-theme-child')))
								.show_textfield(array('type' => 'email', 'name' => $this->meta_prefix.'email_'.$item_id, 'text' => __("E-mail", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value($this->meta_prefix.'email_'.$item_id), 'placeholder' => __("to the user", 'lang_bb-theme-child')))
							."</div>";
							/*$out .= show_textfield(array('name' => $this->meta_prefix.'street_address_'.$item_id, 'text' => __("Street Address", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value($this->meta_prefix.'street_address_'.$item_id))) //, 'required' => true
							."<div class='flex_flow'>"
								.show_textfield(array('type' => 'number', 'name' => $this->meta_prefix.'zipcode_'.$item_id, 'text' => __("Zip Code", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value($this->meta_prefix.'zipcode_'.$item_id), 'xtra' => "maxlength='5'")) //, 'required' => true
								.show_textfield(array('name' => $this->meta_prefix.'city_'.$item_id, 'text' => __("City", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value($this->meta_prefix.'city_'.$item_id))) //, 'required' => true
							."</div>";*/
						break;

						case 'validate':
							$product_ssn = check_var($this->meta_prefix.'ssn_'.$item_id, 'soc');
							//$product_ssn = str_replace(array('-', ' '), '', $product_ssn);

							$product_ssn_year = substr($product_ssn, 0, 2);
							$product_ssn_date = ($product_ssn_year > date("y") ? "19" : "20").substr($product_ssn, 0, 6);

							$personal_numbers = substr($product_ssn, 0, 9);
							$check_number = substr($product_ssn, 9, 1);

							if(strlen($product_ssn) != 10)
							{
								wc_add_notice(__("Please enter a Social Security Number according to the format YYMMDDXXXX with only ten digits", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

								break 3;
							}

							else if(!ctype_digit($product_ssn))
							{
								wc_add_notice(__("Please enter a Social Security Number with only digits in it", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

								break 3;
							}

							else if($product_ssn_date != date("Ymd", strtotime($product_ssn_date)))
							{
								wc_add_notice(__("Please enter a Social Security Number with a correct YYMMDD", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

								break 3;
							}

							else if($check_number != $this->calculate_ssn_check_number($personal_numbers))
							{
								wc_add_notice(__("Please enter a Social Security Number with the correct last check number", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

								break 3;
							}

							/*if($this->validate_ssn($product_ssn) == false)
							{
								wc_add_notice(__("Please enter a Social Security Number according to the format YYMMDDXXXX", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

								break 3;
							}*/

							else if(check_var($this->meta_prefix.'phone_'.$item_id, 'telno') == '' && check_var($this->meta_prefix.'email_'.$item_id, 'email') == '')
							{
								wc_add_notice(__("Please enter a Phone Number or E-mail Address", 'lang_bb-theme-child')." (".$product_title_temp.")", 'error');

								break 3;
							}

							else// if(is_user_logged_in())
							{
								$product_phone = check_var($this->meta_prefix.'phone_'.$item_id, 'telno');
								$product_email = check_var($this->meta_prefix.'email_'.$item_id, 'email');

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
						break;

						case 'save':
							update_post_meta($data['order_id'], $this->meta_prefix.'ssn_'.$item_id, check_var($this->meta_prefix.'ssn_'.$item_id, 'soc'));
							//update_post_meta($data['order_id'], $this->meta_prefix.'name_'.$item_id, check_var($this->meta_prefix.'name_'.$item_id));
							update_post_meta($data['order_id'], $this->meta_prefix.'phone_'.$item_id, check_var($this->meta_prefix.'phone_'.$item_id, 'telno'));
							update_post_meta($data['order_id'], $this->meta_prefix.'email_'.$item_id, check_var($this->meta_prefix.'email_'.$item_id, 'email'));
							/*update_post_meta($data['order_id'], $this->meta_prefix.'street_address_'.$item_id, check_var($this->meta_prefix.'street_address_'.$item_id));
							update_post_meta($data['order_id'], $this->meta_prefix.'zipcode_'.$item_id, check_var($this->meta_prefix.'zipcode_'.$item_id));
							update_post_meta($data['order_id'], $this->meta_prefix.'city_'.$item_id, check_var($this->meta_prefix.'city_'.$item_id));*/
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
								//.show_textfield(array('name' => '_shipping_address_2', 'text' => __("", 'lang_bb-theme-child'), 'value' => $data['obj_checkout']->get_value('_shipping_address_2')))
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
							update_post_meta($data['order_id'], '_shipping_first_name', check_var('_shipping_first_name'));
							update_post_meta($data['order_id'], '_shipping_last_name', check_var('_shipping_last_name'));
							update_post_meta($data['order_id'], '_shipping_address_1', check_var('_shipping_address_1'));
							//update_post_meta($data['order_id'], '_shipping_address_2', check_var('_shipping_address_2'));
							update_post_meta($data['order_id'], '_shipping_postcode', check_var('_shipping_postcode'));
							update_post_meta($data['order_id'], '_shipping_city', check_var('_shipping_city'));
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
				}
			break;
		}
	}

	function woocommerce_after_order_notes($obj_checkout)
	{
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

	/*function woocommerce_admin_order_data_after_billing_address($order)
	{
		global $woocommerce;

		echo "Test 1";

		echo "<p><strong>".__("Social Security Number", 'lang_bb-theme-child').":</strong> ".get_post_meta($order->id, $this->meta_prefix.'ssn', true)."</p>";
		echo "<p><strong>".__("Name", 'lang_bb-theme-child').":</strong> ".get_post_meta($order->id, $this->meta_prefix.'name', true)."</p>";
		echo "<p><strong>".__("Street Address", 'lang_bb-theme-child').":</strong> ".get_post_meta($order->id, $this->meta_prefix.'street_address', true)."</p>";
		echo "<p><strong>".__("Zip Code", 'lang_bb-theme-child').":</strong> ".get_post_meta($order->id, $this->meta_prefix.'zipcode', true)."</p>";
		echo "<p><strong>".__("City", 'lang_bb-theme-child').":</strong> ".get_post_meta($order->id, $this->meta_prefix.'city', true)."</p>";
	}*/

	/*function woocommerce_after_add_to_cart_button()
	{
		if(!session_id())
		{
			@session_start();
		}

		$session_campaign_id = check_var($this->meta_prefix.'campaign_id');
		$campaign_id = check_var('campaign_id');

		if($campaign_id > 0)
		{
			$_SESSION[$this->meta_prefix.'campaign_id'] = $campaign_id;

			if(IS_SUPER_ADMIN)
			{
				echo "Session saved for campaign #".$campaign_id;
			}
		}

		else if($session_campaign_id > 0)
		{
			if(IS_SUPER_ADMIN)
			{
				echo "Session already saved for campaign #".$session_campaign_id;
			}
		}
	}*/

	function send_payment_complete($function, $status, $order_id, $order)
	{
		$this->send_to_optima($status, $order_id, false);
	}

	function woocommerce_payment_complete($order_id)
	{
		//do_log(__FUNCTION__.": #".$order_id, 'notification');

		$this->send_payment_complete(__FUNCTION__, 'completed', $order_id, array());
	}

	function woocommerce_payment_complete_order_status($status, $order_id, $order)
	{
		do_log(__FUNCTION__.": #".$order_id, 'notification');

		//$this->send_payment_complete(__FUNCTION__, $status, $order_id, $order);
	}

	function woocommerce_order_status_changed($order_id, $status_transition_from, $status_transition_to)
	{
		do_log(__FUNCTION__.": #".$order_id." (".$status_transition_from." -> ".$status_transition_to.")", 'notification');
	}

	function dibs_easy_process_payment($order_id, $request)
	{
		do_log(__FUNCTION__.": #".$order_id." (".var_export($request, true).")", 'notification');
	}

	function woocommerce_pre_payment_complete($order_id, $transaction_id)
	{
		do_log(__FUNCTION__.": #".$order_id." (".$transaction_id.")", 'notification');
	}

	function woocommerce_payment_complete_order_status_on_hold($order_id, $transaction_id)
	{
		do_log(__FUNCTION__.": #".$order_id." (".$transaction_id.")", 'notification');
	}

	function woocommerce_payment_complete_order_status_pending($order_id, $transaction_id)
	{
		do_log(__FUNCTION__.": #".$order_id." (".$transaction_id.")", 'notification');
	}

	function woocommerce_payment_complete_order_status_failed($order_id, $transaction_id)
	{
		do_log(__FUNCTION__.": #".$order_id." (".$transaction_id.")", 'notification');
	}

	function woocommerce_payment_complete_order_status_cancelled($order_id, $transaction_id)
	{
		do_log(__FUNCTION__.": #".$order_id." (".$transaction_id.")", 'notification');
	}

	function woocommerce_payment_complete_order_status_processing($order_id, $transaction_id)
	{
		do_log(__FUNCTION__.": #".$order_id." (".$transaction_id.")", 'notification');
	}

	function woocommerce_payment_complete_order_status_completed($order_id, $transaction_id)
	{
		do_log(__FUNCTION__.": #".$order_id." (".$transaction_id.")", 'notification');
	}

	function woocommerce_proceed_to_checkout()
	{
		echo "<a href='".get_permalink(wc_get_page_id('shop'))."' class='checkout-button button alt wc-forward wp-element-button'>".__("Continue to shop", 'lang_bb-theme-child')."</a>";
	}

	/*function wc_tax_enabled($value)
	{
		$value = false;

		return $value;
	}*/

	function debug_run()
	{
		$result = array();

		$data = array(
			'debug' => true,
			'limit_amount' => 10,
		);

		$setting_theme_child_company = get_option('setting_theme_child_company');
		$setting_theme_child_type = get_option('setting_theme_child_type');

		ob_start();

		$obj_cron = new mf_cron();
		$obj_cron->start(__CLASS__);

		if($obj_cron->is_running == false || $setting_theme_child_company > 0 || $setting_theme_child_type == 'terms')
		{

			if($setting_theme_child_company > 0)
			{
				$school_id = get_post_meta($setting_theme_child_company, 'school_id', true);

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
}