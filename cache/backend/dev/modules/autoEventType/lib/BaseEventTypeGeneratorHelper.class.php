<?php

/**
 * eventType module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage eventType
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseEventTypeGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'event_type' : 'event_type_'.$action;
  }
}
