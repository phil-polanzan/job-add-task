<?php

namespace Unittests\Controllers;

use App\Requests\PostRequest;
use App\Responses\Response;
use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase
{
	protected PostRequest $request;

	public function setUp(): void {
		$this->request = new PostRequest();
	}

	protected function getResponse(array $args) : Response
	{
		$this->request->exec($args);
		return $this->request->getResponse();
	}

	protected function assertEqualsResponseStatus(Response $response, string $status) : void {
		$this->assertEquals($response->getData()['status'], $status);
	}
}
