<?php

namespace Models;

use App\Models\Job;
use PHPUnit\Framework\TestCase;

class JobTest extends TestCase
{
	private function getJob(array $args) : Job
	{
		$job = new Job();
		$job->setPropertiesValues($args);

		return $job;
	}

	public function testEmptyTitle() : void
	{
		$job = $this->getJob([
			'title' => '',
			'description' => '',
			'estimated_hours' => '',
			'entry_date' => '',
			'schedule_start_date' => '',
			'schedule_end_date' => '',
		]);
		$this->assertFalse($job->validate());
	}

	public function testLongerTitle() : void
	{
		$job = $this->getJob([
			'title' => '012345678901234567890123456789012345678901234567891',
			'description' => '',
			'estimated_hours' => '',
			'entry_date' => '',
			'schedule_start_date' => '',
			'schedule_end_date' => '',
		]);
		$this->assertFalse($job->validate());
	}

	public function testNotValidEntryDate() : void
	{
		$job = $this->getJob([
			'title' => 'Title',
			'description' => 'Description',
			'estimated_hours' => '4.2',
			'entry_date' => '2023-02-30',
			'schedule_start_date' => '',
			'schedule_end_date' => '',
		]);
		$this->assertFalse($job->validate());
	}

	public function testNotValidHours() : void
	{
		$job = $this->getJob([
			'title' => 'Title',
			'description' => 'Description',
			'estimated_hours' => '4.2',
			'entry_date' => '',
			'schedule_start_date' => '',
			'schedule_end_date' => '',
		]);
		$this->assertFalse($job->validate());
	}

	public function testNotStartDate() : void
	{
		$job = $this->getJob([
			'title' => 'Title',
			'description' => 'Description',
			'estimated_hours' => '4.2',
			'entry_date' => 'hello world',
			'schedule_start_date' => '2023-03-24',
			'schedule_end_date' => '2023-03-23',
		]);
		$this->assertFalse($job->validate());
	}

	public function testEmptyEndDate() : void
	{
		$job = $this->getJob([
			'title' => 'Title',
			'description' => 'Description',
			'estimated_hours' => '4.5',
			'entry_date' => '2023-03-17',
			'schedule_start_date' => '2023-03-23',
			'schedule_end_date' => '',
		]);
		$this->assertFalse($job->validate());
	}

	public function testEmptyStartDate() : void
	{
		$job = $this->getJob([
			'title' => 'Title',
			'description' => 'Description',
			'estimated_hours' => '4.5',
			'entry_date' => '2023-03-17',
			'schedule_start_date' => '',
			'schedule_end_date' => '2023-03-23',
		]);
		$this->assertFalse($job->validate());
	}

	public function testSuccess() : void
	{
		$job = $this->getJob([
			'title' => 'Title',
			'description' => 'Description',
			'estimated_hours' => '4.5',
			'entry_date' => '2023-03-17',
			'schedule_start_date' => '2023-03-20',
			'schedule_end_date' => '2023-03-23',
		]);
		$this->assertTrue($job->validate());
	}
}
