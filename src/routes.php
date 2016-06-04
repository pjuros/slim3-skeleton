<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    return $this->renderer->render($response, 'index.phtml', ["app_name" => $this->settings['app_name']]);
});

//API routes
$app->group('/api', function () {
	
	//test
	$this->get('/test', '\App\Controllers\Test:testdb');
	//login
	$this->post('/login', '\App\Controllers\Authentication:login');
	$this->post('/refreshToken', '\App\Controllers\Authentication:refresh_token');
	//users
	$this->get('/users', '\App\Controllers\Users:getall')->add(new AuthMw(['admin'], $this->getContainer()));
	$this->post('/users', '\App\Controllers\Users:add')->add(new AuthMw(['admin'], $this->getContainer()));

});
	

