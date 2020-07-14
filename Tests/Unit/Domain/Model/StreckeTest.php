<?php
namespace Sdt\TransferMietwagen\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Stolberg <p.stolberg@gmx.de>
 */
class StreckeTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Sdt\TransferMietwagen\Domain\Model\Strecke
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Sdt\TransferMietwagen\Domain\Model\Strecke();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getPunktAReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPunktA()
        );
    }

    /**
     * @test
     */
    public function setPunktAForStringSetsPunktA()
    {
        $this->subject->setPunktA('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'punktA',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPunktBReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPunktB()
        );
    }

    /**
     * @test
     */
    public function setPunktBForStringSetsPunktB()
    {
        $this->subject->setPunktB('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'punktB',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDistanceReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getDistance()
        );
    }

    /**
     * @test
     */
    public function setDistanceForIntSetsDistance()
    {
        $this->subject->setDistance(12);

        self::assertAttributeEquals(
            12,
            'distance',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDistanceErwReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getDistanceErw()
        );
    }

    /**
     * @test
     */
    public function setDistanceErwForIntSetsDistanceErw()
    {
        $this->subject->setDistanceErw(12);

        self::assertAttributeEquals(
            12,
            'distanceErw',
            $this->subject
        );
    }
}
