@servers(['web' => 'deploybot@139.162.175.121'])
{{--deploybot@139.162.175.121--}}

@task('deploy', ['on' => 'web'])
cd /var/www/hisfa
echo 'envoy command werkt'
@endtask

echo 'verbonden met deploybot'
cd /var/www/hisfa
echo 'hisfa map'
php artisan down
echo 'artisan down'
git reset --hard HEAD
echo 'reset hard head'
git pull origin master
echo 'pull origin master'
composer dump-autoload
echo 'composer dump'
php artisan migrate:refresh --seed
echo 'artisan migrate'
php artisan up
echo 'up'
