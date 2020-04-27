<?php
// -----
// A Zen Cart initialization file that creates a report identifying which notification-events
// are being monitored ... and by whom!
//
// Copyright (c) 2020, Vinos de Frutas Tropicales.  All rights reserved.
//
// -----
// You can identify a _specific_ IP address for which the report is created either by
// modifying the definition below or creating a file in /includes/extra_datafiles that contains the
// requested IP address.
//
if (!defined('WATCHING_OBSERVERS_IP')) define('WATCHING_OBSERVERS_IP', '');
if (WATCHING_OBSERVERS_IP != '' && WATCHING_OBSERVERS_IP != $_SERVER['REMOTE_ADDR']) {
    return;
}

$wiw_logfile = DIR_FS_LOGS . '/watching_observers_' . $current_page_base . '_' . date('Ymd_His') . '.log';
$observers = $zco_notifier->getStaticObserver();
if ($observers != null) {
    foreach ($observers as $key => $o) {
        $class_name = get_class($o['obs']);
        $event_id = $o['eventID'];
        error_log("Class ($class_name) is watching for $event_id." . PHP_EOL, 3, $wiw_logfile);
    }
}
