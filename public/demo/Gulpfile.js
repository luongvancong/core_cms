_theme 			= 'tamnguyen',
 
gulp     		= require('gulp'),
sass 			= require('gulp-sass'),
sourcemaps 		= require('gulp-sourcemaps');
livereload 		= require('gulp-livereload');

gulp.task('sass', function(){
	return gulp.src('sass/**/*.scss')
	.pipe(sourcemaps.init())
	.pipe(sass().on('error', sass.logError))
	.pipe(sourcemaps.write())
	.pipe(gulp.dest('css'));
})

gulp.task('watch', function () {
    gulp.watch(['sass/**/*'], ['sass']);
});

gulp.task('default', ['sass', 'watch']);

 