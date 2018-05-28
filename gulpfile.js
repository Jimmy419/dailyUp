'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
 
gulp.task('sassAdmin', function () {
  return gulp.src('./Admin/Tpl/Public/scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./Admin/Tpl/Public/css/'));
});
 
gulp.task('sassAdmin:watch', function () {
  gulp.watch('./Admin/Tpl/Public/scss/*.scss', ['sassAdmin']);
});

gulp.task('sass', function () {
  return gulp.src('./Home/Tpl/Public/scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./Home/Tpl/Public/css/'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('./Home/Tpl/Public/scss/*.scss', ['sass']);
});