<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GoodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GoodsTable Test Case
 */
class GoodsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GoodsTable
     */
    public $Goods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.goods',
        'app.category_children',
        'app.brands',
        'app.materials',
        'app.goods_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Goods') ? [] : ['className' => 'App\Model\Table\GoodsTable'];
        $this->Goods = TableRegistry::get('Goods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Goods);

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
