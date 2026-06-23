<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('db:backup', function () {
    $backupDir = storage_path('app/backups');

    if (!file_exists($backupDir)) {
        mkdir($backupDir, 0755, true);
    }

    $filename = 'backup-' . date('Y-m-d-His') . '.sql';
    $filepath = $backupDir . '/' . $filename;

    $dbHost = config('database.connections.mysql.host');
    $dbPort = config('database.connections.mysql.port');
    $dbName = config('database.connections.mysql.database');
    $dbUser = config('database.connections.mysql.username');
    $dbPass = config('database.connections.mysql.password');

    $mysqldump = 'mysqldump';

    // Try common Windows/Laragon paths
    if (PHP_OS_FAMILY === 'Windows') {
        $possiblePaths = [
            'C:\\laragon\\bin\\mysql\\mysql-8.0.30\\bin\\mysqldump.exe',
            'C:\\laragon\\bin\\mysql\\bin\\mysqldump.exe',
        ];

        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                $mysqldump = '"' . $path . '"';
                break;
            }
        }
    }

    $command = sprintf(
        '%s -h%s -P%s -u%s %s %s > %s',
        $mysqldump,
        escapeshellarg($dbHost),
        escapeshellarg($dbPort),
        escapeshellarg($dbUser),
        $dbPass ? '-p' . escapeshellarg($dbPass) : '',
        escapeshellarg($dbName),
        escapeshellarg($filepath)
    );

    exec($command, $output, $returnVar);

    if ($returnVar === 0 && file_exists($filepath)) {
        $this->info("Database backup created successfully: {$filename}");
        $this->info("Location: {$filepath}");
    } else {
        $this->error('Database backup failed.');
        $this->error('Make sure mysqldump is available in your PATH or adjust the path in routes/console.php');
    }
})->purpose('Create database backup');
