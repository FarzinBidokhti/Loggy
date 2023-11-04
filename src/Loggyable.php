<?php

namespace FarzinBidokhti\Loggy;

use FarzinBidokhti\Loggy\Loggy;

trait Loggyable
{
    /**
     * create a log record
     *
     * @param integer  $userId The log message to write
     * @param string   $action The log level e.g. INFO, WARNING, ERROR
     * @param string   $actionDetail The log level e.g. INFO, WARNING, ERROR
     * @param boolean  $status The log level e.g. INFO, WARNING, ERROR
     * @return integer return log id if created successfully
     */
    public static function log(
        $userId,
        $action       = null,
        $actionDetail = null,
        $status       = null
    ) {
        $loggy                = new Loggy();
        $loggy->user_id       = $userId;
        $loggy->ip_address    = self::getIp();
        $loggy->action        = $action;
        $loggy->action_detail = $actionDetail;
        $loggy->status        = $status;
        $loggy->device        = self::getDevice();
        $loggy->browser_agent = self::getBrowserAgent();
        $loggy->save();

        return Loggy::findOrFail($loggy->id);
    }

    private static function getIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if (!empty($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }

        if (filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) {
            return $_SERVER['REMOTE_ADDR'];
        }

        return 'Unable to get valid user IP';
    }

    private static function getBrowserAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    private static function getDevice()
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false) {
            return 'mobile';
        }

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Tablet') !== false) {
            return 'tablet';
        }

        return 'desktop';
    }
}
