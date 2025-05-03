<?php

namespace Tests\Controllers;

use App\Responses\Response;

class JobControllerTest extends ControllerTest
{
	public function testControllerNotFound() : void
	{
		$response = $this->getResponse(['controller' => 'controller']);
		$this->assertEqualsResponseStatus($response, Response::STATUS_ERROR);
	}

	public function testJobValidationError() : void
	{
		$response = $this->getResponse([
			'controller' => 'job-controller',
			'title' => ''
		]);
		$this->assertEqualsResponseStatus($response, Response::STATUS_ERROR);
	}

	public function testSuccess() : void
	{
		$response = $this->getResponse([
			'controller' => 'job-controller',
			'title' => 'Title',
			'description' => 'Description',
			'estimated_hours' => '4.5',
			'entry_date' => '2023-03-17',
			'schedule_start_date' => '2023-03-20',
			'schedule_end_date' => '2023-03-23'
		]);
		$this->assertEqualsResponseStatus($response, Response::STATUS_SUCCESS);
	}
}
