@servers(['web' => 'root@47.99.47.169'])

@task('deploy', ['on' => ['web'], 'confirm' => true])
cd /etc/nginx/www/first/ym.blog
git pull
@endtask