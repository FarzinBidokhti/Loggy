<?php

namespace FarzinBidokhti\Loggy;

use FarzinBidokhti\Loggy\Loggy;

trait Loggyable
{
    /**
   * create a log record
   *
   * @param integer  $userId The log message to write
   * @param string   $ipAddress The log level e.g. INFO, WARNING, ERROR
   * @param string   $action The log level e.g. INFO, WARNING, ERROR
   * @param string   $actionDetail The log level e.g. INFO, WARNING, ERROR
   * @param boolean  $status The log level e.g. INFO, WARNING, ERROR
   * @param string   $device The log level e.g. INFO, WARNING, ERROR
   * @param string   $browserAgent The log level e.g. INFO, WARNING, ERROR
   * @return integer return log id if created successfully
   */
    public static function log(
        $userId,
        $ipAddress    = null,
        $action       = null,
        $actionDetail = null,
        $status       = null,
        $device       = null,
        $browserAgent = null
    ) {
        $loggy                = new Loggy();
        $loggy->user_id       = $userId;
        $loggy->ip_address    = $ipAddress;
        $loggy->action        = $action;
        $loggy->action_detail = $actionDetail;
        $loggy->status        = $status;
        $loggy->device        = $device;
        $loggy->browser_agent = $browserAgent;
        $loggy->save();

        return $loggy->id;
    }
}
