<?php
	header ("Content-Type:text/xml");
	$factory = $modules->get('SfWebServices');
	$factory->process($page->service, $input);
	echo $factory->api['response']->get_xml();
