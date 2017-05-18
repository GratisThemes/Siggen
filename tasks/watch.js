const gulp = require('gulp')
const refresh = require('gulp-refresh')

gulp.task('watch', () => {
  gulp.watch('./scss/*.scss', ['sass'])
  gulp.watch('./**/*.php', ['pot'])
  gulp.watch('./js/*.js', ['local-deploy'])
  refresh.listen()
})