<?php
namespace Sdt\TransferMietwagen\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Stolberg <p.stolberg@gmx.de>
 */
class AutoControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Sdt\TransferMietwagen\Controller\AutoController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Sdt\TransferMietwagen\Controller\AutoController::class)
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
    public function listActionFetchesAllAutosFromRepositoryAndAssignsThemToView()
    {

        $allAutos = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $autoRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\AutoRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $autoRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAutos));
        $this->inject($this->subject, 'autoRepository', $autoRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('autos', $allAutos);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAutoToView()
    {
        $auto = new \Sdt\TransferMietwagen\Domain\Model\Auto();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('auto', $auto);

        $this->subject->showAction($auto);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenAutoToAutoRepository()
    {
        $auto = new \Sdt\TransferMietwagen\Domain\Model\Auto();

        $autoRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\AutoRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $autoRepository->expects(self::once())->method('add')->with($auto);
        $this->inject($this->subject, 'autoRepository', $autoRepository);

        $this->subject->createAction($auto);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAutoToView()
    {
        $auto = new \Sdt\TransferMietwagen\Domain\Model\Auto();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('auto', $auto);

        $this->subject->editAction($auto);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAutoInAutoRepository()
    {
        $auto = new \Sdt\TransferMietwagen\Domain\Model\Auto();

        $autoRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\AutoRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $autoRepository->expects(self::once())->method('update')->with($auto);
        $this->inject($this->subject, 'autoRepository', $autoRepository);

        $this->subject->updateAction($auto);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAutoFromAutoRepository()
    {
        $auto = new \Sdt\TransferMietwagen\Domain\Model\Auto();

        $autoRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\AutoRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $autoRepository->expects(self::once())->method('remove')->with($auto);
        $this->inject($this->subject, 'autoRepository', $autoRepository);

        $this->subject->deleteAction($auto);
    }
}
