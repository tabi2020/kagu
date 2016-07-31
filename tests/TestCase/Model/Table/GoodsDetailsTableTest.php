<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GoodsDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GoodsDetailsTable Test Case
 */
class GoodsDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GoodsDetailsTable
     */
    public $GoodsDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.goods_details',
        'app.goods',
        'app.category_children',
        'app.brands',
        'app.materials',
        'app.colors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GoodsDetails') ? [] : ['className' => 'App\Model\Table\GoodsDetailsTable'];
        $this->GoodsDetails = TableRegistry::get('GoodsDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GoodsDetails);

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
