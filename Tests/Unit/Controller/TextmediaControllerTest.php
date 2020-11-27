<?php
namespace FREESIXTYFIVE\FsfZollerTextmedia\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author David Geib <d.geib@freesixtyfive.de>
 */
class TextmediaControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \FREESIXTYFIVE\FsfZollerTextmedia\Controller\TextmediaController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\FREESIXTYFIVE\FsfZollerTextmedia\Controller\TextmediaController::class)
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
    public function listActionFetchesAllTextmediasFromRepositoryAndAssignsThemToView()
    {

        $allTextmedias = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $textmediaRepository = $this->getMockBuilder(\FREESIXTYFIVE\FsfZollerTextmedia\Domain\Repository\TextmediaRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $textmediaRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTextmedias));
        $this->inject($this->subject, 'textmediaRepository', $textmediaRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('textmedias', $allTextmedias);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
