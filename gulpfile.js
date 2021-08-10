const gulp    = require( 'gulp' )
const plumber = require( 'gulp-plumber' )
const sass    = require( 'gulp-sass' )(require('sass'))
const prefix  = require( 'gulp-autoprefixer' )
const wpPot   = require( 'gulp-wp-pot' )
const sort    = require( 'gulp-sort' )
const zip     = require( 'gulp-zip' )
const rtlcss  = require( 'gulp-rtlcss' )
const rename  = require( 'gulp-rename' )

const pkg = require('./package.json')

// CSS
function css() { 
  return gulp.src('./scss/*.scss')
    .pipe(plumber())
    .pipe(sass({ outputStyle: 'expanded', includePaths: ['scss'] }).on('error', sass.logError))
    .pipe(prefix(['last 30 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
    .pipe(gulp.dest('./'))
}

// RTL CSS
function rtl() {
  return gulp.src('./style.css')
    .pipe(rtlcss())
    .pipe(rename({ suffix: '-rtl' }))
    .pipe(gulp.dest('./'))
}

// Pot
function pot() {
  return gulp.src('./**/*.php')
    .pipe(plumber())
    .pipe(sort())
    .pipe(wpPot({
      domain: pkg.name,
      package: pkg.name,
      bugReport: pkg.bugs.url,
      lastTranslator: `${pkg.author.name} <${pkg.author.email}>`,
      team: `${pkg.author.name} <${pkg.author.email}>`
    }))
    .pipe(gulp.dest(`./languages/${pkg.name}.pot`))
}

// Package
function package() {
  return gulp.src( [
      './*.php',
      './inc/**/*',
      './template-parts/**/*',
      './*.css',
      './assets/**/*',
      './languages/**/*',
      'LICENSE',
      'readme.txt',
      'screenshot.png',
    ], {
      base: '.'
    })
    .pipe(zip(`${pkg.name}_${pkg.version}.zip`))
    .pipe(gulp.dest('./releases'))
}

// Watch
function watch() {
  gulp.watch('scss/**/*.scss', {cwd: './', usePolling: true}, gulp.series( css, rtl ) )
  gulp.watch('**/*.php',       {cwd: './', usePolling: true}, pot)
}

module.exports.css   = css
module.exports.rtl   = rtl
module.exports.pot   = pot
module.exports.dev   = gulp.series(css, rtl, pot, watch)
module.exports.build = gulp.series(css, rtl, pot, package)