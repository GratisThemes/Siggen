const gulp = require('gulp')
const gutil = require('gulp-util')
const ftp = require('vinyl-ftp')
const notify = require('gulp-notify')
const ftpInfo = require('./local-ftp-info.json')
const refresh = require('gulp-refresh')

gulp.task('local-deploy', () => {
  const conn = ftp.create( {
    host: ftpInfo.host,
    user: ftpInfo.user,
    password: ftpInfo.password,
    parallel: 3,
    log: gutil.log,
    timeOffset: -120
  })
  
  const globs = [
    './**/*.*',
    '!./node_modules/**/*.*',
    '!./scss/*.*',
    '!./tasks/*.*',
    '!./gulpfile.js',
    '!./.gitignore',
    '!./LICENSE',
    '!./*.json'
  ]

  return gulp.src(globs, { base: '.', buffer: false })
    .pipe(conn.newer(ftpInfo.remotePath))
    .pipe(conn.dest(ftpInfo.remotePath))
    .pipe(refresh())
})