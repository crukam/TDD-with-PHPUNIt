<?php
namespace TDD\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase {
    public function setUp() {
        $this->Receipt = new Receipt();
    }

    public function tearDown(){
        unset($this->Receipt);
    }

    public function testTotal () {
        $input = [0,14,15];
        $coupon = null;
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(29, $output, 'when summing the total should equal 29');
    }

    public function testTotalAndcoupon () {
        $input = [0,14,16];
        $coupon = 0.15;
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(25.5, $output, 'when summing the total should equal 25.5');
    }

    public function testPostTaxTotal() {
        $Receipt = $this->getMockBuilder('TDD\Receipt')
                        ->setMethods(['total', 'tax'])
                        ->getMock();
        
    }

    public function testTax() {
        $inputAmount = 20;
        $taxInput = 0.1;
        $taxOutput = $this->Receipt->tax($inputAmount, $taxInput); 
        $this->assertEquals(2, $taxOutput, 'Tax calculations should equals 2');
    }
}