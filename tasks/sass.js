const gulp = require('gulp')
const sass = require('gulp-sass')
const prefix = require('gulp-autoprefixer')

gulp.task('sass', () => {
  return gulp.src('./scss/*.scss')
    .pipe(sass({ outputStyle: 'expanded', includePaths: ['scss'] }))
    .on('error', err => {
      console.log(err.toString());
      this.emit('end');
    })
    .pipe(prefix(['last 30 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
    .pipe(gulp.dest('./'))
    .on('end', () => gulp.run('local-deploy'))
})