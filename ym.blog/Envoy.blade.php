@servers(['web' => 'root@129.204.59.183'])

@task('deploy', ['on' => ['web'], 'confirm' => true])
cd /etc/nginx/www/first/ym.blog
@endtask