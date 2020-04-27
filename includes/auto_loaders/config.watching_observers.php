<?php
// -----
// Part of the "Watching Observers" plugin, provided under GPL 2.0 license by lat9.
// Copyright (C) 2020, Vinos de Frutas Tropicales.  All rights reserved.
//
// -----
// Note, the auto-load point is 'expected' to be after all other class and initialization
// files have been run to be effective.
//
$autoLoadConfig[99999][] = array(
    'autoType' => 'init_script',
    'loadFile' => 'init_watching_observers.php'
);
