<?php
namespace Sdt\TransferMietwagen\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Stolberg <p.stolberg@gmx.de>
 */
class StadtTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Sdt\TransferMietwagen\Domain\Model\Stadt
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Sdt\TransferMietwagen\Domain\Model\Stadt();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getPlzReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPlz()
        );
    }

    /**
     * @test
     */
    public function setPlzForStringSetsPlz()
    {
        $this->subject->setPlz('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'plz',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNameStadtReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNameStadt()
        );
    }

    /**
     * @test
     */
    public function setNameStadtForStringSetsNameStadt()
    {
        $this->subject->setNameStadt('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nameStadt',
            $this->subject
        );
    }
}
