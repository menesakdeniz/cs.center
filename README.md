Cs.Center Api
===========

Açıklama

Nasıl Kullanılır?
----------

### Example

PHP:
	require("CsCenterClass.php");
	$api = new CsCenter;
	$api->api_key = "Api KEY";
	$api->servis = "AdminSales";
	$api->urun_id = "";
	$api->post = [
	   'steamid' => 'steamid',
	   'immunity' => '50',
	   'flags' => 'abcfghijkopqrs',
	   'aciklama' => 'Cs.Center Api',
	   'tag' => 'Admin',
	   'tagkiskacstart' => '[',
	   'tagkiskacend' => ']',
	   'textcolor' => '{09}',
	   'namecolor' => '{06}',
	   'customerapi' => '0',
	   'tagcolor' => '{0B}'
	 ];
	$veri = $api->get();
