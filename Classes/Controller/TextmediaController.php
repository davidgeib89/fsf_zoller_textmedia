<?php
namespace FREESIXTYFIVE\FsfZollerTextmedia\Controller;


/***
 *
 * This file is part of the "Zoller Text Media" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 David Geib <d.geib@freesixtyfive.de>, FREESIXTYFIVE
 *
 ***/
/**
 * TextmediaController
 */
class TextmediaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * textmediaRepository
     * 
     * @var \FREESIXTYFIVE\FsfZollerTextmedia\Domain\Repository\TextmediaRepository
     */
    protected $textmediaRepository = null;

    /**
     * @param \FREESIXTYFIVE\FsfZollerTextmedia\Domain\Repository\TextmediaRepository $textmediaRepository
     */
    public function injectTextmediaRepository(\FREESIXTYFIVE\FsfZollerTextmedia\Domain\Repository\TextmediaRepository $textmediaRepository)
    {
        $this->textmediaRepository = $textmediaRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $textmedias = $this->textmediaRepository->findAll();
        $this->view->assign('textmedias', $textmedias);
    }
}
