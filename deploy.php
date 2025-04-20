<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

// Config

set('repository', 'git@git.n2rtechnologies.com:kulwinder/bcrew-crm.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('38.242.196.238')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/php82/bcrew')
    ->set('keep_releases', 2);


// Hooks

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'npm:install',
    'npm:run:prod',
    'deploy:publish',
]);

task('npm:run:prod', function () {
    cd('{{release_or_current_path}}');
    run('composer install');
    run('npm run build');
});


after('deploy:failed', 'deploy:unlock');