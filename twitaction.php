<?php
class TwitAction
{
  const STAT_UPDATE = 'statuses/update'; //発言用

  static function getActions()
  {
    $stat_update=self::STAT_UPDATE;

    $actions = array(); //actions array(string method, string parameters) の形式

    //set actions
    //action1 現在の時刻をJSTの形式でtweet
    date_default_timezone_set('Asia/Tokyo');
    $status = date('----- Y-m-d D H:i \J\S\T -----');

    $actions[] = self::makeAction($stat_update, $status);

    return $actions;
  }

  private static function makeAction($targetstat, $parameter)
  {
    return array('method'=>$targetstat, 'parameters'=>array('status'=>$parameter));
  }

}