<?php
function file_manager($data, $path)
{
	if (file_exists($path) == TRUE)
	{
		$array = file_get_contents($path);
		$array = unserialize($array);
		$array[0] = $data;
		$content = $array;
	}
	else
		$content[0] = $data;
	if ($content != NULL)
	{
		$array = serialize($content);
		if (file_exists('database/') == FALSE)
			mkdir('database/');
		file_put_contents($path, $array);
	}
	else
		echo 'ERROR';
}

$data = NULL;
$data['login'] = 'admin';
$data['password'] = 'admin';
$data['firstname'] = 'admin';
$data['lastname'] = 'admin';
$data['address'] = 'admin';
$data['email'] = 'admin';
$data['rank'] = 'admin';
file_manager($data, 'database/account');

$data = NULL;
$data['katana'] = 'katanas';
$data['shuriken'] = 'shurikens';
$data['nunchuk'] = 'nunchuks';
$data['sales'] = 'sales';
file_manager($data, 'database/categories');

$data = NULL;

$data[0]['item'] = 'Thaitsuki Nihonto Katana';
$data[0]['type1'] = 'katana';
$data[0]['type2'] = 'sales';
$data[0]['id'] = 1;
$data[0]['picture'] = 'img/katana.jpg';
$data[0]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 200 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.
Overall: 41" (104.1 cm)
Blade: 29 1/2" (74.93 cm)
Tang: 10" (25.4 cm)
Tsuka: 11" (27.94 cm)
Weight: 2.5 lbs. (1.2 kg)
Balance Point: 5 1/2" (14cm)';
$data[0]['price'] = '1200.00';

$data[1]['item'] = 'Baka Katana';
$data[1]['type1'] = 'katana';
$data[1]['type2'] = '';
$data[1]['id'] = 2;
$data[1]['picture'] = 'img/katana2.jpg';
$data[1]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 200 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.';
$data[1]['price'] = '799.99';

$data[2]['item'] = 'Ellah Katana';
$data[2]['type1'] = 'katana';
$data[2]['type2'] = '';
$data[2]['id'] = 3;
$data[2]['picture'] = 'img/katana3.jpg';
$data[2]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 200 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.';
$data[2]['price'] = '347.93';

$data[3]['item'] = 'Shuriken 1';
$data[3]['type1'] = 'shuriken';
$data[3]['type2'] = '';
$data[3]['id'] = 4;
$data[3]['picture'] = 'img/shuriken.jpg';
$data[3]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 300 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.';
$data[3]['price'] = '49.99';

$data[4]['item'] = 'Shuriken 2';
$data[4]['type1'] = 'shuriken';
$data[4]['type2'] = 'sales';
$data[4]['id'] = 5;
$data[4]['picture'] = 'img/shuriken2.jpg';
$data[4]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 400 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.';
$data[4]['price'] = '99.99';

$data[5]['item'] = 'Shuriken 3';
$data[5]['type1'] = 'shuriken';
$data[5]['type2'] = '';
$data[5]['id'] = 6;
$data[5]['picture'] = 'img/shuriken3.jpg';
$data[5]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 500 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.';
$data[5]['price'] = '600';

$data[6]['item'] = 'Nunchuks 1';
$data[6]['type1'] = 'nunchuk';
$data[6]['type2'] = '';
$data[6]['id'] = 7;
$data[6]['picture'] = 'img/nunchuks.jpg';
$data[6]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 600 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.';
$data[6]['price'] = '149.99';

$data[7]['item'] = 'Nunchuks 2';
$data[7]['type1'] = 'nunchuk';
$data[7]['type2'] = 'sales';
$data[7]['id'] = 8;
$data[7]['picture'] = 'img/nunchuk2.jpeg';
$data[7]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 700 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.';
$data[7]['price'] = '147.99';

$data[8]['item'] = 'Nunchuks 3';
$data[8]['type1'] = 'nunchuk';
$data[8]['type2'] = 'sales';
$data[8]['id'] = 9;
$data[8]['picture'] = 'img/nunchuks3.jpeg';
$data[8]['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 800 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.';
$data[8]['price'] = '179.99';

print_r($data);

file_manager($data, 'database/products');
?>
