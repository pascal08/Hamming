<?php

namespace Acme\Hamming;

class ComparatorTest extends \PHPUnit_Framework_TestCase
{

    public function testNoDifferenceBetweenIdenticalStrands()
    {
        $this->assertEquals(0, Comparator::distance('A', 'A'));
    }

    public function testCompleteHammingDistanceOfForSingleNucleotideStrand()
    {
        $this->assertEquals(1, Comparator::distance('A', 'G'));
    }

    public function testCompleteHammingDistanceForSmallStrand()
    {
        $this->assertEquals(2, Comparator::distance('AG', 'CT'));
    }

    public function testSmallHammingDistance()
    {
        $this->assertEquals(1, Comparator::distance('AT', 'CT'));
    }

    public function testSmallHammingDistanceInLongerStrand()
    {
        $this->assertEquals(1, Comparator::distance('GGACG', 'GGTCG'));
    }

    public function testLargeHammingDistance()
    {
        $this->assertEquals(4, Comparator::distance('GATACA', 'GCATAA'));
    }

    public function testHammingDistanceInVeryLongStrand()
    {
        $this->assertEquals(9, Comparator::distance('GGACGGATTCTG', 'AGGACGGATTCT'));
    }

    public function testExceptionThrownWhenStrandsAreDifferentLength()
    {
        $this->setExpectedException('InvalidArgumentException', 'DNA strands must be of equal length.');
        Comparator::distance('GGACG', 'AGGACGTGG');
    }
}