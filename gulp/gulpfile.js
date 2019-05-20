// Gulp.js configuration
// LOAD MODULES
var gulp = require('gulp');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var uglify = require("gulp-uglify");
var cleanCSS = require('gulp-clean-css');
var clean = require('gulp-clean');
var plumber = require('gulp-plumber');
// var coffee = require('gulp-coffee');

// =======================================================
// CANDIDATE.SRC TASKS
// =======================================================

// SASS TASK
gulp.task('sass', function () {
 return gulp.src('../assets/scss/**/*.scss')
   .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
   .pipe(rename('styles.min.css'))
   .pipe(gulp.dest('../assets/css/'));
});

//BACKEND SASS TASK
gulp.task('be-sass', function () {
 return gulp.src('../assets/scss-be/*.scss')
   .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
   .pipe(rename('be-styles.min.css'))
   .pipe(gulp.dest('../assets/css/'));
});

// scripts task
gulp.task('minify-scripts', function () {
    gulp.src('../assets/js/**/*.js')
    .pipe(plumber(function(error) {
                console.error(error.message);
                gulp.emit('finish');
            }))
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('../assets/scripts/'));
});

// move plugins
gulp.task('plugins', [], function() {
  console.log("Moving all files in styles folder");
  gulp.src("../wp-plugins/**/*")
      .pipe(gulp.dest('../../../plugins/'));
});

gulp.task('watch', function () {
  gulp.watch('../assets/scss/**/*.scss', ['sass']);
  gulp.watch('../assets/scss-be/*.scss', ['be-sass']);
  // gulp.watch('../media/js/lib/**/*.js', ['minify-lib']);
  // gulp.watch('../media/js/plugins/**/*.js', ['minify-plugins']);
  gulp.watch('../assets/js/**/*.js', ['minify-scripts']);

});

gulp.task('default', ['watch']);