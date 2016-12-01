// Gulp
var gulp = require('gulp');

// Plugins
var sass = require('gulp-sass'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    browserSync = require('browser-sync'),
    reload = browserSync.reload,
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin');
  
// Paths
var paths = {
	scss: 'wp-content/themes/project_name/assets/sass/**/*.scss',
	scripts: ['wp-content/themes/project_name/assets/scripts/components/*.js',
	'wp-content/themes/project_name/assets/scripts/main.js'],
	images: 'wp-content/themes/project_name/assets/img/**',
	html: 'wp-content/themes/project_name/**/*.php'
};

gulp.task('browser-sync', function() {
    browserSync.init(['wp-content/themes/project_name/assets/dist/css/*.css', 'wp-content/themes/project_name/assets/dist/js/*.js'], {
        proxy: 'localhost',
        notify: false
    });
});

gulp.task('bs-reload', function () {
    browserSync.reload();
});
  
// CSS
gulp.task('styles', function() {
	return gulp.src(paths.scss)
		.pipe(sass())
		.pipe(minifycss())
		.pipe(gulp.dest('wp-content/themes/project_name/assets/dist/css'))
		.pipe(reload({stream:true}));
});

// JS
gulp.task('scripts', function() {
	return gulp.src(paths.scripts)
		.pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('wp-content/themes/project_name/assets/dist/js'));
});

// Images
gulp.task('images', function() {
	return gulp.src(paths.images)
	.pipe(imagemin())
	.pipe(gulp.dest('wp-content/themes/project_name/assets/img'));
});

// Default task
gulp.task('default', ['styles', 'browser-sync'], function() {
	gulp.watch(paths.scss, ['styles']);
	gulp.watch(paths.scripts, ['scripts']);
	gulp.watch(paths.images, ['images', 'bs-reload']);
	gulp.watch(paths.html, ['bs-reload']);
});