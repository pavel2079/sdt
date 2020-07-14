<?php
namespace Sdt\TransferMietwagen\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Stolberg <p.stolberg@gmx.de>
 */
class AutoTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Sdt\TransferMietwagen\Domain\Model\Auto
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Sdt\TransferMietwagen\Domain\Model\Auto();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getAdmNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdmName()
        );
    }

    /**
     * @test
     */
    public function setAdmNameForStringSetsAdmName()
    {
        $this->subject->setAdmName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'admName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKurzNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getKurzName()
        );
    }

    /**
     * @test
     */
    public function setKurzNameForStringSetsKurzName()
    {
        $this->subject->setKurzName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'kurzName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKlassReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getKlass()
        );
    }

    /**
     * @test
     */
    public function setKlassForStringSetsKlass()
    {
        $this->subject->setKlass('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'klass',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTabReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTab()
        );
    }

    /**
     * @test
     */
    public function setTabForStringSetsTab()
    {
        $this->subject->setTab('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'tab',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMaxPersonReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getMaxPerson()
        );
    }

    /**
     * @test
     */
    public function setMaxPersonForIntSetsMaxPerson()
    {
        $this->subject->setMaxPerson(12);

        self::assertAttributeEquals(
            12,
            'maxPerson',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMaxKofferReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getMaxKoffer()
        );
    }

    /**
     * @test
     */
    public function setMaxKofferForIntSetsMaxKoffer()
    {
        $this->subject->setMaxKoffer(12);

        self::assertAttributeEquals(
            12,
            'maxKoffer',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPreisReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPreis()
        );
    }

    /**
     * @test
     */
    public function setPreisForIntSetsPreis()
    {
        $this->subject->setPreis(12);

        self::assertAttributeEquals(
            12,
            'preis',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKoef20b40ReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getKoef20b40()
        );
    }

    /**
     * @test
     */
    public function setKoef20b40ForFloatSetsKoef20b40()
    {
        $this->subject->setKoef20b40(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'koef20b40',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getKoef40b50ReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getKoef40b50()
        );
    }

    /**
     * @test
     */
    public function setKoef40b50ForFloatSetsKoef40b50()
    {
        $this->subject->setKoef40b50(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'koef40b50',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getKoef50b70ReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getKoef50b70()
        );
    }

    /**
     * @test
     */
    public function setKoef50b70ForFloatSetsKoef50b70()
    {
        $this->subject->setKoef50b70(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'koef50b70',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getKoef70b100ReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getKoef70b100()
        );
    }

    /**
     * @test
     */
    public function setKoef70b100ForFloatSetsKoef70b100()
    {
        $this->subject->setKoef70b100(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'koef70b100',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getKoef100ReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getKoef100()
        );
    }

    /**
     * @test
     */
    public function setKoef100ForFloatSetsKoef100()
    {
        $this->subject->setKoef100(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'koef100',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getBeschreibungReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getBeschreibung()
        );
    }

    /**
     * @test
     */
    public function setBeschreibungForStringSetsBeschreibung()
    {
        $this->subject->setBeschreibung('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'beschreibung',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBeschreibungRuReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getBeschreibungRu()
        );
    }

    /**
     * @test
     */
    public function setBeschreibungRuForStringSetsBeschreibungRu()
    {
        $this->subject->setBeschreibungRu('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'beschreibungRu',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBeschreibungEnReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getBeschreibungEn()
        );
    }

    /**
     * @test
     */
    public function setBeschreibungEnForStringSetsBeschreibungEn()
    {
        $this->subject->setBeschreibungEn('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'beschreibungEn',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProvPauschReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getProvPausch()
        );
    }

    /**
     * @test
     */
    public function setProvPauschForIntSetsProvPausch()
    {
        $this->subject->setProvPausch(12);

        self::assertAttributeEquals(
            12,
            'provPausch',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProvProzReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getProvProz()
        );
    }

    /**
     * @test
     */
    public function setProvProzForIntSetsProvProz()
    {
        $this->subject->setProvProz(12);

        self::assertAttributeEquals(
            12,
            'provProz',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImgReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getImg()
        );
    }

    /**
     * @test
     */
    public function setImgForStringSetsImg()
    {
        $this->subject->setImg('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'img',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImgBigReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getImgBig()
        );
    }

    /**
     * @test
     */
    public function setImgBigForStringSetsImgBig()
    {
        $this->subject->setImgBig('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'imgBig',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTrPreisReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getTrPreis()
        );
    }

    /**
     * @test
     */
    public function setTrPreisForIntSetsTrPreis()
    {
        $this->subject->setTrPreis(12);

        self::assertAttributeEquals(
            12,
            'trPreis',
            $this->subject
        );
    }
}
