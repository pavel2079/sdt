<?php
/**
 * SimpleEach ViewHelper
 *
 * @package EXT:transferMietwagen
 */
namespace Sdt\TransferMietwagen\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * SimpleEach ViewHelper class
 */
class SimpleEachViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
		$this->registerArgument('init', 'integer', 0, FALSE, 0);
		$this->registerArgument('max', 'integer', 0, FALSE, 0);
		$this->registerArgument('step', 'integer', 0, FALSE, 0);
		$this->registerArgument('rasmK', 'integer', 0, FALSE, 0); ## Dimension key, z.B. rasmK=2: 01
		$this->registerArgument('rasmV', 'integer', 0, FALSE, 0); ## Dimension value
    }

/**
   * the render method
   * @return string Rendered string
   */
    public static function renderStatic(
       array $arguments,
       \Closure $renderChildrenClosure,
       RenderingContextInterface $renderingContext
    )  {
        $arrEach = array();
	    for($i= intval($arguments['init']); $i<=intval($arguments['max']); $i+=intval($arguments['step'])){

	       if ($arguments['rasmK']>1 && $arguments['rasmV']>1) $arrEach[sprintf('%0'.$arguments['rasmK'].'d',$i)] = sprintf('%0'.$arguments['rasmV'].'d',$i);
	       elseif ($arguments['rasmK']>1) $arrEach[sprintf('%0'.$arguments['rasmK'].'d',$i)] = $i;
	       elseif ($arguments['rasmV']>1) $arrEach[$i] = sprintf('%0'.$arguments['rasmV'].'d',$i);
	       else $arrEach[$i] = $i;
	    }

      return $arrEach;
    }

}