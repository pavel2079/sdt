<?php
namespace Sdt\TransferMietwagen\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Stolberg <p.stolberg@gmx.de>
 */
class BuchungTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Sdt\TransferMietwagen\Domain\Model\Buchung
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Sdt\TransferMietwagen\Domain\Model\Buchung();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getIdUserReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getIdUser()
        );
    }

    /**
     * @test
     */
    public function setIdUserForIntSetsIdUser()
    {
        $this->subject->setIdUser(12);

        self::assertAttributeEquals(
            12,
            'idUser',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getIdFahrerReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getIdFahrer()
        );
    }

    /**
     * @test
     */
    public function setIdFahrerForIntSetsIdFahrer()
    {
        $this->subject->setIdFahrer(12);

        self::assertAttributeEquals(
            12,
            'idFahrer',
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
    public function getNameKundeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNameKunde()
        );
    }

    /**
     * @test
     */
    public function setNameKundeForStringSetsNameKunde()
    {
        $this->subject->setNameKunde('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nameKunde',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTelefonReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTelefon()
        );
    }

    /**
     * @test
     */
    public function setTelefonForStringSetsTelefon()
    {
        $this->subject->setTelefon('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'telefon',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTelKundeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTelKunde()
        );
    }

    /**
     * @test
     */
    public function setTelKundeForStringSetsTelKunde()
    {
        $this->subject->setTelKunde('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'telKunde',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailKundeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmailKunde()
        );
    }

    /**
     * @test
     */
    public function setEmailKundeForStringSetsEmailKunde()
    {
        $this->subject->setEmailKunde('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'emailKunde',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdresseReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdresse()
        );
    }

    /**
     * @test
     */
    public function setAdresseForStringSetsAdresse()
    {
        $this->subject->setAdresse('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'adresse',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStaatReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStaat()
        );
    }

    /**
     * @test
     */
    public function setStaatForStringSetsStaat()
    {
        $this->subject->setStaat('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'staat',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStadtReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStadt()
        );
    }

    /**
     * @test
     */
    public function setStadtForStringSetsStadt()
    {
        $this->subject->setStadt('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'stadt',
            $this->subject
        );
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
    public function getZeitControlReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getZeitControl()
        );
    }

    /**
     * @test
     */
    public function setZeitControlForIntSetsZeitControl()
    {
        $this->subject->setZeitControl(12);

        self::assertAttributeEquals(
            12,
            'zeitControl',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStart()
        );
    }

    /**
     * @test
     */
    public function setStartForStringSetsStart()
    {
        $this->subject->setStart('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'start',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEndReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEnd()
        );
    }

    /**
     * @test
     */
    public function setEndForStringSetsEnd()
    {
        $this->subject->setEnd('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'end',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartMktReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStartMkt()
        );
    }

    /**
     * @test
     */
    public function setStartMktForIntSetsStartMkt()
    {
        $this->subject->setStartMkt(12);

        self::assertAttributeEquals(
            12,
            'startMkt',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartZuruckReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStartZuruck()
        );
    }

    /**
     * @test
     */
    public function setStartZuruckForStringSetsStartZuruck()
    {
        $this->subject->setStartZuruck('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'startZuruck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEndZuruckReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEndZuruck()
        );
    }

    /**
     * @test
     */
    public function setEndZuruckForStringSetsEndZuruck()
    {
        $this->subject->setEndZuruck('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'endZuruck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartZuruckMktReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStartZuruckMkt()
        );
    }

    /**
     * @test
     */
    public function setStartZuruckMktForIntSetsStartZuruckMkt()
    {
        $this->subject->setStartZuruckMkt(12);

        self::assertAttributeEquals(
            12,
            'startZuruckMkt',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAbReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAb()
        );
    }

    /**
     * @test
     */
    public function setAbForIntSetsAb()
    {
        $this->subject->setAb(12);

        self::assertAttributeEquals(
            12,
            'ab',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAbzuruckReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAbzuruck()
        );
    }

    /**
     * @test
     */
    public function setAbzuruckForIntSetsAbzuruck()
    {
        $this->subject->setAbzuruck(12);

        self::assertAttributeEquals(
            12,
            'abzuruck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBisReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getBis()
        );
    }

    /**
     * @test
     */
    public function setBisForIntSetsBis()
    {
        $this->subject->setBis(12);

        self::assertAttributeEquals(
            12,
            'bis',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBiszuruckReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getBiszuruck()
        );
    }

    /**
     * @test
     */
    public function setBiszuruckForIntSetsBiszuruck()
    {
        $this->subject->setBiszuruck(12);

        self::assertAttributeEquals(
            12,
            'biszuruck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVonReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVon()
        );
    }

    /**
     * @test
     */
    public function setVonForStringSetsVon()
    {
        $this->subject->setVon('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'von',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVonAdressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVonAdress()
        );
    }

    /**
     * @test
     */
    public function setVonAdressForStringSetsVonAdress()
    {
        $this->subject->setVonAdress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'vonAdress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVonAdressZuruckReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVonAdressZuruck()
        );
    }

    /**
     * @test
     */
    public function setVonAdressZuruckForStringSetsVonAdressZuruck()
    {
        $this->subject->setVonAdressZuruck('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'vonAdressZuruck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNachReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNach()
        );
    }

    /**
     * @test
     */
    public function setNachForStringSetsNach()
    {
        $this->subject->setNach('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nach',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNachAdressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNachAdress()
        );
    }

    /**
     * @test
     */
    public function setNachAdressForStringSetsNachAdress()
    {
        $this->subject->setNachAdress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nachAdress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNachAdressZuruckReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNachAdressZuruck()
        );
    }

    /**
     * @test
     */
    public function setNachAdressZuruckForStringSetsNachAdressZuruck()
    {
        $this->subject->setNachAdressZuruck('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nachAdressZuruck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAidReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAid()
        );
    }

    /**
     * @test
     */
    public function setAidForIntSetsAid()
    {
        $this->subject->setAid(12);

        self::assertAttributeEquals(
            12,
            'aid',
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

    /**
     * @test
     */
    public function getArtReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getArt()
        );
    }

    /**
     * @test
     */
    public function setArtForIntSetsArt()
    {
        $this->subject->setArt(12);

        self::assertAttributeEquals(
            12,
            'art',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZArtReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZArt()
        );
    }

    /**
     * @test
     */
    public function setZArtForStringSetsZArt()
    {
        $this->subject->setZArt('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zArt',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBackReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getBack()
        );
    }

    /**
     * @test
     */
    public function setBackForIntSetsBack()
    {
        $this->subject->setBack(12);

        self::assertAttributeEquals(
            12,
            'back',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPersonReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPerson()
        );
    }

    /**
     * @test
     */
    public function setPersonForIntSetsPerson()
    {
        $this->subject->setPerson(12);

        self::assertAttributeEquals(
            12,
            'person',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKofferReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getKoffer()
        );
    }

    /**
     * @test
     */
    public function setKofferForIntSetsKoffer()
    {
        $this->subject->setKoffer(12);

        self::assertAttributeEquals(
            12,
            'koffer',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRentTimeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getRentTime()
        );
    }

    /**
     * @test
     */
    public function setRentTimeForIntSetsRentTime()
    {
        $this->subject->setRentTime(12);

        self::assertAttributeEquals(
            12,
            'rentTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKindersitzReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getKindersitz()
        );
    }

    /**
     * @test
     */
    public function setKindersitzForIntSetsKindersitz()
    {
        $this->subject->setKindersitz(12);

        self::assertAttributeEquals(
            12,
            'kindersitz',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVonFlugReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getVonFlug()
        );
    }

    /**
     * @test
     */
    public function setVonFlugForIntSetsVonFlug()
    {
        $this->subject->setVonFlug(12);

        self::assertAttributeEquals(
            12,
            'vonFlug',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZurFlugReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getZurFlug()
        );
    }

    /**
     * @test
     */
    public function setZurFlugForIntSetsZurFlug()
    {
        $this->subject->setZurFlug(12);

        self::assertAttributeEquals(
            12,
            'zurFlug',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFlugNrReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFlugNr()
        );
    }

    /**
     * @test
     */
    public function setFlugNrForStringSetsFlugNr()
    {
        $this->subject->setFlugNr('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'flugNr',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFlugZeitReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getFlugZeit()
        );
    }

    /**
     * @test
     */
    public function setFlugZeitForIntSetsFlugZeit()
    {
        $this->subject->setFlugZeit(12);

        self::assertAttributeEquals(
            12,
            'flugZeit',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFlugNrZuruckReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFlugNrZuruck()
        );
    }

    /**
     * @test
     */
    public function setFlugNrZuruckForStringSetsFlugNrZuruck()
    {
        $this->subject->setFlugNrZuruck('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'flugNrZuruck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFlugZeitZuruckReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getFlugZeitZuruck()
        );
    }

    /**
     * @test
     */
    public function setFlugZeitZuruckForIntSetsFlugZeitZuruck()
    {
        $this->subject->setFlugZeitZuruck(12);

        self::assertAttributeEquals(
            12,
            'flugZeitZuruck',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGrundpreisReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getGrundpreis()
        );
    }

    /**
     * @test
     */
    public function setGrundpreisForFloatSetsGrundpreis()
    {
        $this->subject->setGrundpreis(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'grundpreis',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getSummaReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getSumma()
        );
    }

    /**
     * @test
     */
    public function setSummaForFloatSetsSumma()
    {
        $this->subject->setSumma(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'summa',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getProvisionReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getProvision()
        );
    }

    /**
     * @test
     */
    public function setProvisionForFloatSetsProvision()
    {
        $this->subject->setProvision(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'provision',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getMwstReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getMwst()
        );
    }

    /**
     * @test
     */
    public function setMwstForIntSetsMwst()
    {
        $this->subject->setMwst(12);

        self::assertAttributeEquals(
            12,
            'mwst',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBezahltReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getBezahlt()
        );
    }

    /**
     * @test
     */
    public function setBezahltForFloatSetsBezahlt()
    {
        $this->subject->setBezahlt(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'bezahlt',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getVorkasseReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getVorkasse()
        );
    }

    /**
     * @test
     */
    public function setVorkasseForIntSetsVorkasse()
    {
        $this->subject->setVorkasse(12);

        self::assertAttributeEquals(
            12,
            'vorkasse',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSchildReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSchild()
        );
    }

    /**
     * @test
     */
    public function setSchildForStringSetsSchild()
    {
        $this->subject->setSchild('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'schild',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusForIntSetsStatus()
    {
        $this->subject->setStatus(12);

        self::assertAttributeEquals(
            12,
            'status',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKommentarReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getKommentar()
        );
    }

    /**
     * @test
     */
    public function setKommentarForStringSetsKommentar()
    {
        $this->subject->setKommentar('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'kommentar',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAgentReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAgent()
        );
    }

    /**
     * @test
     */
    public function setAgentForIntSetsAgent()
    {
        $this->subject->setAgent(12);

        self::assertAttributeEquals(
            12,
            'agent',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAutoReturnsInitialValueForAuto()
    {
        self::assertEquals(
            null,
            $this->subject->getAuto()
        );
    }

    /**
     * @test
     */
    public function setAutoForAutoSetsAuto()
    {
        $autoFixture = new \Sdt\TransferMietwagen\Domain\Model\Auto();
        $this->subject->setAuto($autoFixture);

        self::assertAttributeEquals(
            $autoFixture,
            'auto',
            $this->subject
        );
    }
}
