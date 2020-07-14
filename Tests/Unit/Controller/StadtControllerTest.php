<?php
namespace Sdt\TransferMietwagen\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Stolberg <p.stolberg@gmx.de>
 */
class StadtControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Sdt\TransferMietwagen\Controller\StadtController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Sdt\TransferMietwagen\Controller\StadtController::class)
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
    public function listActionFetchesAllStadtsFromRepositoryAndAssignsThemToView()
    {

        $allStadts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stadtRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\StadtRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $stadtRepository->expects(self::once())->method('findAll')->will(self::returnValue($allStadts));
        $this->inject($this->subject, 'stadtRepository', $stadtRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('stadts', $allStadts);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenStadtToStadtRepository()
    {
        $stadt = new \Sdt\TransferMietwagen\Domain\Model\Stadt();

        $stadtRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\StadtRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $stadtRepository->expects(self::once())->method('add')->with($stadt);
        $this->inject($this->subject, 'stadtRepository', $stadtRepository);

        $this->subject->createAction($stadt);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenStadtFromStadtRepository()
    {
        $stadt = new \Sdt\TransferMietwagen\Domain\Model\Stadt();

        $stadtRepository = $this->getMockBuilder(\Sdt\TransferMietwagen\Domain\Repository\StadtRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $stadtRepository->expects(self::once())->method('remove')->with($stadt);
        $this->inject($this->subject, 'stadtRepository', $stadtRepository);

        $this->subject->deleteAction($stadt);
    }
}
