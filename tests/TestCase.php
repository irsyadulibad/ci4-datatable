<?php

namespace Irsyadulibad\DataTables\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Irsyadulibad\DataTables\Tests\Support\Database\Seeds\UserSeeder;

abstract class TestCase extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = false;
    protected $seed = UserSeeder::class;
    protected $basePath = __DIR__ . '/_support/Database/';
    protected $namespace = __NAMESPACE__ . '\Support';

    public function setUp(): void
    {
        parent::setUp();
    }
}
