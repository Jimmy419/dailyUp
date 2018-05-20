'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
 
gulp.task('sass', function () {
  return gulp.src('./Admin/Tpl/Public/scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./Admin/Tpl/Public/css/'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('./Admin/Tpl/Public/scss/*.scss', ['sass']);
});