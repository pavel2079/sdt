<?php
namespace Sdt\TransferMietwagen\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Stolberg <p.stolberg@gmx.de>
 */
class BuchungControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Sdt\TransferMietwagen\Controller\BuchungController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Sdt\TransferMietwagen\Controller\BuchungController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllBuchungsFromRepositoryAndAssignsThemToView()
    {

        $allBuchungs = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $buchungRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\BuchungRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $buchungRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBuchungs));
        $this->inject($this->subject, 'buchungRepository', $buchungRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('buchungs', $allBuchungs);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenBuchungToView()
    {
        $buchung = new \Sdt\TransferMietwagen\Domain\Model\Buchung();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('buchung', $buchung);

        $this->subject->showAction($buchung);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenBuchungToView()
    {
        $buchung = new \Sdt\TransferMietwagen\Domain\Model\Buchung();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('buchung', $buchung);

        $this->subject->editAction($buchung);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenBuchungInBuchungRepository()
    {
        $buchung = new \Sdt\TransferMietwagen\Domain\Model\Buchung();

        $buchungRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\BuchungRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $buchungRepository->expects(self::once())->method('update')->with($buchung);
        $this->inject($this->subject, 'buchungRepository', $buchungRepository);

        $this->subject->updateAction($buchung);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenBuchungFromBuchungRepository()
    {
        $buchung = new \Sdt\TransferMietwagen\Domain\Model\Buchung();

        $buchungRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\BuchungRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $buchungRepository->expects(self::once())->method('remove')->with($buchung);
        $this->inject($this->subject, 'buchungRepository', $buchungRepository);

        $this->subject->deleteAction($buchung);
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenBuchungToView()
    {
        $buchung = new \Sdt\TransferMietwagen\Domain\Model\Buchung();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('buchung', $buchung);

        $this->subject->showAction($buchung);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenBuchungToView()
    {
        $buchung = new \Sdt\TransferMietwagen\Domain\Model\Buchung();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('buchung', $buchung);

        $this->subject->editAction($buchung);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenBuchungToView()
    {
        $buchung = new \Sdt\TransferMietwagen\Domain\Model\Buchung();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('buchung', $buchung);

        $this->subject->editAction($buchung);
    }

}
