<?php
namespace Sdt\TransferMietwagen\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Stolberg <p.stolberg@gmx.de>
 */
class FlughafenTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Sdt\TransferMietwagen\Domain\Model\Flughafen
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Sdt\TransferMietwagen\Domain\Model\Flughafen();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameAusReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNameAus()
        );
    }

    /**
     * @test
     */
    public function setNameAusForStringSetsNameAus()
    {
        $this->subject->setNameAus('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nameAus',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNameAusRuReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNameAusRu()
        );
    }

    /**
     * @test
     */
    public function setNameAusRuForStringSetsNameAusRu()
    {
        $this->subject->setNameAusRu('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nameAusRu',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNmReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNm()
        );
    }

    /**
     * @test
     */
    public function setNmForStringSetsNm()
    {
        $this->subject->setNm('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nm',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAirportReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAirport()
        );
    }

    /**
     * @test
     */
    public function setAirportForIntSetsAirport()
    {
        $this->subject->setAirport(12);

        self::assertAttributeEquals(
            12,
            'airport',
            $this->subject
        );
    }
}
