<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UrlMappingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UrlMappingTable Test Case
 */
class UrlMappingTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UrlMappingTable
     */
    public $UrlMapping;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.url_mapping',
        'app.layers',
        'app.retruns',
        'app.types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UrlMapping') ? [] : ['className' => 'App\Model\Table\UrlMappingTable'];
        $this->UrlMapping = TableRegistry::get('UrlMapping', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UrlMapping);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
