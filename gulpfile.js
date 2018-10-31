'use strict';
var gulp = require('gulp');
var connect = require('gulp-connect-php');

var imagemin = require('gulp-imagemin');
var uglify = require('gulp-uglify-es').default;
var sass = require('gulp-sass');
var uglifycss = require('gulp-uglifycss');
var concat = require('gulp-concat');


//Logs Message
gulp.task('message', function(){
    return console.log('Gulp is running...');
});

// Optimize Images
gulp.task('imageMin', () =>
	gulp.src('src/images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('pub/images'))
);

// Minify JS
gulp.task('minify', function(){
    gulp.src('src/js/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('pub/js'));
});


//Compile Scss
gulp.task('sass', function(){
    return gulp.src('src/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('sassstyle.css'))
    .pipe(gulp.dest('src/css'));
});

//Scripts
gulp.task('scripts', function(){
    gulp.src('src/js/*.js')
    .pipe(concat('main.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('pub/js'));
});


//Compile Css
gulp.task('css', function(){
    gulp.src('src/css/*.css')
    .pipe(concat('style.min.css'))
    .pipe(uglifycss({
        "maxLineLen": 80,
        "uglyComments": true
      }))
    .pipe(gulp.dest('pub/css'));
});

//Copy all Php files
gulp.task('copyPhp', function(){
    gulp.src('src/*.php')
    .pipe(gulp.dest('pub'));
 });
 
 //Copy all Includes files
gulp.task('copyIncludes', function(){
    gulp.src('src/includes/*.php')
    .pipe(gulp.dest('pub/includes'));
 });
  //Copy all Classes
gulp.task('copyClasses', function(){
    gulp.src('src/classes/*.php')
    .pipe(gulp.dest('pub/classes'));
 });
   //Copy all Users
gulp.task('copyUsers', function(){
    gulp.src('src/users/*.php')
    .pipe(gulp.dest('pub/users'));
 });
 

//Compile Copy 
gulp.task('run',['sass', 'message', 'imageMin', 'scripts', 'css', 'copyPhp', 'copyIncludes', 'copyClasses', 'copyUsers']);

gulp.task('watch', function(){
    gulp.watch('src/sass//***/**/*.scss', ['sass']);
    gulp.watch('src/css/*.css', ['css']);
    gulp.watch('src/js/*.js', ['scripts']);
    gulp.watch('src/images/*', ['imageMin']);

    gulp.watch('src/**/*.php', ['copyPhp']);
    gulp.watch('src/includes/*.php', ['copyIncludes']);
    gulp.watch('src/classes/*.php', ['copyClasses']);
    gulp.watch('src/users/*.php', ['copyUsers']);

});

gulp.task('default', ['run', 'watch']);
