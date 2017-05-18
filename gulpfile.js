const gulp = require('gulp')

require('./tasks/sass.js')
require('./tasks/pot.js')
require('./tasks/local-deploy.js')
require('./tasks/watch.js')

gulp.task('default', ['watch', 'sass', 'pot']);