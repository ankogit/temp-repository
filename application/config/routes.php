<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'delivery' => [
		'controller' => 'main',
		'action' => 'delivery',
	],

	'sendmsg' => [
		'controller' => 'main',
		'action' => 'sendmsg',
	],

	'about' => [
		'controller' => 'main',
		'action' => 'about',
	],

	'item/{category:\w+}/id/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'item',
	],

	'catalog/{category:\w+}' => [
		'controller' => 'main',
		'action' => 'catalog',
	],
	'catalog/{category:\w+}/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'catalog',
	],
	'catalog' => [
		'controller' => 'main',
		'action' => 'catalog',
	],
	'search' => [
		'controller' => 'main',
		'action' => 'search',
	],
	'search/{category:\w+}' => [
		'controller' => 'main',
		'action' => 'search',
	],
	'shares' => [
		'controller' => 'main',
		'action' => 'shares',
	],
	
	'news' => [
		'controller' => 'main',
		'action' => 'news',
	],

	'novelty/{category:\w+}/id/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'novelty',
	],

	
	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
	],
	// AdminController
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/edit/{category:\w+}/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],
	'admin/editnew/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'editnew',
	],
	'admin/delete/{category:\w+}/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
	'admin/items/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'items',
	],
	'admin/news/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'news',
	],
	'admin/news' => [
		'controller' => 'admin',
		'action' => 'news',
	],
	'admin/items' => [
		'controller' => 'admin',
		'action' => 'items',
	],
	'admin/info' => [
		'controller' => 'admin',
		'action' => 'info',
	],
	'admin/eindex' => [
		'controller' => 'admin',
		'action' => 'eindex',
	],
	'admin/addnew' => [
		'controller' => 'admin',
		'action' => 'addnew',
	],
	'admin/editbanner' => [
		'controller' => 'admin',
		'action' => 'editbanner',
	],
];