<?php

// This is a bogus test. Remove this file, if you understand what it does.
class BogusTest extends PHPUnit_Framework_TestCase {
	public function test_succeeds() {
		$this->assertTrue(true);
	}

	public function test_fails() {
		$this->assertTrue(true);
	}

	public function test_empty()
	{
		$this->assertEmpty([]);     
	}

	public function test_counts()
	{
		$this->assertCount(1, ["Hello"]);
	}

	public function test_contains()
	{
		$this->assertContains(3, [1,2,3]);
	}

	public function test_file_exists()
	{
		$this->assertFileExists("/var/www/html");
	}

	public function test_greaterThan()
	{
		$this->assertGreaterThan(1,2);
	}

	public function test_fileisreadable()
	{
		$this->assertFileIsReadable("/var/www/html");
	}

	public function test_assertdirectoryexists()
	{
		$this->assertDirectoryExists("/var/www/html");
	}
	public function test_lessthan()
	{
		$this->assertLessThan(2,1);
	}

	public function test_Same()
	{
		$this->assertSame(2, 2);
	}
	public function test_nulls()
	{
		$this->assertNull(null);
	}	

}
